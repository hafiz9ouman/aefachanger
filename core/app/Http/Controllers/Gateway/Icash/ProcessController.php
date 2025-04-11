<?php

namespace App\Http\Controllers\Gateway;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IcashController extends Controller
{
    public static function process($deposit)
    {
        // Retrieve API key from gateway parameters
        $apiKey = $deposit->gatewayCurrency()->gateway_parameter->api_key;
        $amount = $deposit->final_amo;
        $currency = $deposit->method_currency;
        $orderId = $deposit->trx;

        // Define the API endpoint for creating a payment
        $apiUrl = 'https://api.icash.one/create-payment';

        // Prepare the request payload
        $payload = [
            'amount' => $amount,
            'currency' => $currency,
            'callback_url' => route('ipn.icash'),
            'order_id' => $orderId,
        ];

        // Send the POST request to iCash.one API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'Accept' => 'application/json',
        ])->post($apiUrl, $payload);

        // Decode the JSON response
        $result = $response->json();

        // Check if the payment creation was successful
        if (isset($result['status']) && $result['status'] == 'success') {
            $send['redirect'] = true;
            $send['redirect_url'] = $result['payment_url'];
        } else {
            $send['error'] = true;
            $send['message'] = $result['message'] ?? 'iCash API error';
        }

        return json_encode($send);
    }

    public function ipn(Request $request)
    {
        // Handle the Instant Payment Notification (IPN) from iCash.one
        $data = $request->all();

        // Verify the IPN data and update the transaction status accordingly
        // Example:
        // $order = Order::where('order_id', $data['order_id'])->first();
        // if ($order && $data['status'] == 'paid') {
        //     $order->update(['status' => 'completed']);
        // }

        // Respond to iCash.one to acknowledge receipt of the IPN
        return response()->json(['status' => 'success']);
    }
}