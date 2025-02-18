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
            // dd($userid);

            // Retrieve job proposals with additional relations if needed
            $jobProposals = JobProposal::where('job_id', $jobId)->where('user_id', $userid)->get();
            // $jobProposals = JobProposal::with('user')->where('job_id', $jobId)->where('user_id', $userid)->get();

            // Prepare data as an associative array
            $contractData = [
                'jobDetails' => $jobPost,
                'proposals' => $jobProposals,
            ];

            // dd($contractData);
            // Pass the prepared array to the view
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

    public function verifyPayment(Request $request, $pid, $jid, $uId)
    {
        // $proposalId = JobProposal::all();
        // dd($proposalId);
        // $proposal = JobProposal::where('id', $request->proposal_id)->first(); //CHANGED
        // dd($proposal);   
        // Extract query parameters
        // echo $pid;
        // echo $jid;
        $data = $request->all();
        // dd($request);
        $client_id = Auth::user()->id; // Get logged-in client ID



        // dd($proposalId[0]);

        // Store data in database
        $payment = Payment::create([
            'client_id' => $client_id,
            'freelancer_id' => $uId,
            'job_id' => $jid,
            'proposal_id' => $pid,
            'amount' => $data['amount'] ?? 0,  // Ensure to get the correct key
            'status' => $data['status'] ?? 'pending',
            'purchase_order_id' => $data['purchase_order_id'] ?? null,
            'transaction_id' => $data['transaction_id'] ?? null,
            'pidx' => $data['pidx'] ?? null,
            'payment_url' => 'http://127.0.0.1:8000/epayment/verify',  //CHANGED
        ]);
        // dd($payment);

        // Return response or view
        return view('verify.verify', compact('data'));
    }

    // public function verifyPayment(Request $request)
    // {
    //     return view('verify.verify');

    //     // $khalti = env('KHALTI');

    //     // $pidx = $request->pidx;

    //     // $data = ([
    //     //     "pidx" => $pidx,
    //     // ]);

    //     // $response = Http::withHeaders([
    //     //     'Authorization' => 'key bba77349f1814301a97167471b241aea',
    //     //     'Content-Type' => 'application/json',
    //     // ])->post($khalti . "epayment/lookup/", $data);

    //     // $payment = Payment::where('ref_id', $pidx)->get()->first();
    //     // $payment->txn_id = $response['transaction_id'];
    //     // $payment->payment_mode = "khalti";
    //     // $payment->payment_status = $response['status'];
    //     // $payment->response_date = Carbon::now();

    //     // $payment->save();




    //     //https://test-pay.khalti.com/wallet?pidx=tdcUrw3ZJVxYEXRtG74K3S
    //     //  return $response;

    //     // if()

    //     // return "djd";

    //     // return view('khaltiPayment.success');
    // }
    // public function khaltiPayment(Request $request)
    // {
    //     // Client to Admin Payment Logic
    //     $data = [
    //         "return_url" => route('payment.verify'),
    //         "website_url" => env('APP_URL'),
    //         "amount" => $request->amount * 100, // Khalti accepts amount in paisa
    //         "purchase_order_id" => $request->purchase_order_id,
    //         "purchase_order_name" => "Job Payment",
    //     ];

    //     $response = Http::withHeaders([
    //         'Authorization' => 'key ' . env('KHALTI_SECRET_KEY'),
    //         'Content-Type' => 'application/json',
    //     ])->post(env('KHALTI_API_URL') . "epayment/initiate/", $data);

    //     if ($response->successful()) {
    //         // Update payment record with client payment status
    //         Payment::where('purchase_order_id', $request->purchase_order_id)
    //             ->update(['client_paid' => true, 'payment_url' => $response['payment_url']]);

    //         return redirect($response['payment_url']);
    //     }

    //     return back()->withErrors('Payment initiation failed.');
    // }

    // public function verifyPayment(Request $request)
    // {
    //     $response = Http::withHeaders([
    //         'Authorization' => 'key ' . env('KHALTI_SECRET_KEY'),
    //     ])->post(env('KHALTI_API_URL') . "epayment/lookup/", ['pidx' => $request->pidx]);

    //     if ($response->successful()) {
    //         $payment = Payment::where('purchase_order_id', $request->purchase_order_id)->first();
    //         $payment->update([
    //             'admin_paid' => true,
    //             'admin_transaction_id' => $response['transaction_id'],
    //         ]);

    //         return view('payments.success', compact('payment'));
    //     }

    //     return back()->withErrors('Payment verification failed.');
    // }

    public function payFreelancer(Request $request)
    {
        $payment = Payment::find($request->payment_id);

        // Implement logic to pay the freelancer using your preferred payment gateway
        $response = $this->processFreelancerPayment($payment);

        if ($response->successful()) {
            $payment->update([
                'admin_paid' => true,
                'freelancer_transaction_id' => $response['transaction_id'],
            ]);

            return back()->with('success', 'Freelancer has been paid successfully.');
        }

        return back()->withErrors('Freelancer payment failed.');
    }

    private function processFreelancerPayment($payment)
    {
        // Placeholder for actual payment gateway logic
        // Example: return Http::post('https://paymentgateway.com/api/pay', [...]);
        return response()->json(['transaction_id' => 'FREELANCER_TXN12345'], 200);
    }
}
