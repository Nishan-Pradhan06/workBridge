<?php

namespace App\Http\Controllers;

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Controller;
use App\Models\JobPost;
use App\Models\JobProposal;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function showContractPage($jobId)
    {
        try {
            // Retrieve job details
            $jobPost = JobPost::find($jobId);

            $userid = request()->query('user_id');

            // Retrieve job proposals
            $jobProposals = JobProposal::where('job_id', $jobId)
                ->where('user_id', $userid)
                ->get();

            // Check if a payment has been made and verified
            $payment = Payment::where('job_id', $jobId)
                ->where('proposal_id', $jobProposals[0]->id ?? null)
                ->where('freelancer_id', $userid)
                ->where('status', 'success') // Ensure payment was successful
                ->exists();

            //check if the proposal is rejected
            $isRejected = $jobProposals[0]->status === 'rejected';
            //check if the proposal is accepted
            $isPending = $jobProposals[0]->status === 'pending';

            // Prepare data for the view
            $contractData = [
                'jobDetails' => $jobPost,
                'proposals' => $jobProposals,
                'is_hired' => $payment,
                'is_rejected' => $isRejected,
                'is_pending' => $isPending,
            ];

            return view('features.contracts.contract', compact('contractData'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to load contract details');
        }
    }


    public function khaltiPayment(Request $request)
    {
        // Fetch proposal details
        $proposal = JobProposal::where('id', $request->proposal_id)->first();
        // dd($proposal);

        if (!$proposal) {
            return back()->withErrors('Proposal not found.');
        }

        // Khalti expects the amount in paisa (multiply by 100)
        // $amount = $proposal->amount * 100;
        // $pay = route('payment.verify');
        // dd($pay);
        // $return_url = route('payment.verify') . '?' . http_build_query([
        //     'pid' => $request->proposal_id,

        // ]);
        $return_url = route('payment.verify', [
            // 'order_id' => $order_id,
            'id' => $request->proposal_id,
            'jId' => $proposal->job_id,
            'uId' => $proposal->user_id,
        ]);
        // dd($return_url);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://a.khalti.com/api/v2/epayment/initiate/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode([
                // "return_url" => "http://127.0.0.1:8000/epayment/verify/$request->proposal_id/",
                "return_url" => "$return_url",
                "website_url" => "http://127.0.0.1:8000/",
                "amount" => $proposal->amount * 100, // Use proposal amount
                "purchase_order_id" => "Proposal_" . $proposal->id,
                "purchase_order_name" => "Payment for Job Proposal",
                "customer_info" => [
                    "name" => Auth::user()->name,
                    "email" => $request->user()->email,
                    "phone" => "9800000001"
                ]
            ]),
            CURLOPT_HTTPHEADER => array(
                'Authorization: key 88a1d1a2b64b477c8554eca72e9222f5',
                'Content-Type: application/json',
            ),
        ));

        $response = curl_exec($curl);
        // dd($response);
        curl_close($curl);
        // dd($curl);

        $responseArray = json_decode($response, true);
        // dd($responseArray); 

        if (isset($responseArray['payment_url'])) {
            return redirect($responseArray['payment_url']);
        }

        return back()->withErrors('Failed to initiate payment.');
    }


    public function verifyPayment(Request $request, $pid, $jid, $uId)
    {
        $data = $request->all();
        $client_id = Auth::user()->id;

        // Create or update payment record
        $payment = Payment::updateOrCreate(
            [
                'client_id' => $client_id,
                'freelancer_id' => $uId,
                'job_id' => $jid,
                'proposal_id' => $pid,
            ],
            [
                'amount' => $data['amount'] ?? 0,
                'status' => 'success', // Mark payment as successful
                'purchase_order_id' => $data['purchase_order_id'] ?? null,
                'transaction_id' => $data['transaction_id'] ?? null,
                'pidx' => $data['pidx'] ?? null,
                'payment_url' => 'http://127.0.0.1:8000/epayment/verify',
            ]
        );

        return view('verify.verify', compact('data'));
    }

    public function releasePayment(Request $request)
    {
        // Validate the request

        // Find the payment record
        $payment = Payment::findOrFail($request->payment_id);

        // Update the release_status to 'success'
        $payment->release_status = 'completed';
        $payment->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Payment released successfully!');
    }
}



    // public function verifyPayment(Request $request)
    // {
    //     // Extract query parameters
    //     $data = $request->all();


    //     $client_id = Auth::user()->id; // Get logged-in client ID

    //     // Store data in database
    //     $payment = Payment::create([
    //         'client_id' => $client_id,
    //         // 'freelancer_id' => $freelancer_id,
    //         'job_id' => $request->proposal_id,
    //         'proposal_id' => $request->proposal_id,
    //         'amount' => $data['amount'] ?? 0,  // Ensure to get the correct key
    //         'status' => $data['status'] ?? 'pending',
    //         'purchase_order_id' => $data['purchase_order_id'] ?? null,
    //         'transaction_id' => $data['transaction_id'] ?? null,
    //         'pidx' => $data['pidx'] ?? null,
    //         'payment_url' => $data['payment_url'] ?? null,
    //     ]);

    //     // Return response or view
    //     return view('verify.verify', compact('data'));
    // }

    // public function verifyPayment(Request $request, $pid, $jid, $uId)
    // {
    //     // $proposalId = JobProposal::all();
    //     // dd($proposalId);
    //     // $proposal = JobProposal::where('id', $request->proposal_id)->first(); //CHANGED
    //     // dd($proposal);   
    //     // Extract query parameters
    //     // echo $pid;
    //     // echo $jid;
    //     $data = $request->all();
    //     // dd($request);
    //     $client_id = Auth::user()->id; // Get logged-in client ID



    //     // dd($proposalId[0]);

    //     // Store data in database
    //     $payment = Payment::create([
    //         'client_id' => $client_id,
    //         'freelancer_id' => $uId,
    //         'job_id' => $jid,
    //         'proposal_id' => $pid,
    //         'amount' => $data['amount'] ?? 0,  // Ensure to get the correct key
    //         'status' => $data['status'] ?? 'pending',
    //         'purchase_order_id' => $data['purchase_order_id'] ?? null,
    //         'transaction_id' => $data['transaction_id'] ?? null,
    //         'pidx' => $data['pidx'] ?? null,
    //         'payment_url' => 'http://127.0.0.1:8000/epayment/verify',  //CHANGED
    //     ]);
    //     // dd($payment);

    //     // Return response or view
    //     return view('verify.verify', compact('data'));
    // }
