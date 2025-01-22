<?php

namespace App\Http\Controllers;

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Controller;
use App\Models\JobProposal;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{

    public function khaltiPayment(Request $request)
    {
        $user = User::all();
        // $proposal = JobProposal::all();
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
                "return_url" => "http://127.0.0.1:8000/epayment/verify",
                "website_url" => "http://127.0.0.1:8000/",
                "amount" => 1000,
                "purchase_order_id" => "Order01",
                "purchase_order_name" => "test",
                "customer_info" => [
                    "name" => $request->user()->name,
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
        curl_close($curl);

        $responseArray = json_decode($response, true);

        if (isset($responseArray['payment_url'])) {
            return redirect($responseArray['payment_url']);
        }

        return back()->withErrors('Failed to initiate payment.');
    }


    public function verifyPayment(Request $request)
    {
        // Extract query parameters
        $data = $request->all();

        // Pass the data to the view
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
