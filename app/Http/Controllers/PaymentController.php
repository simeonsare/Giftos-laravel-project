<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function buy(Request $request)
    {
        $userid = Auth::user()->id;
        $phone = $request->phone;
        $address = $request->rec_address; // Assuming address is provided in the request
        $name = $request->name; // Assuming name is provided in the request
    
        date_default_timezone_set('Africa/Nairobi');
    
        // Access token credentials
        $consumerKey = 'wwwhkPkMypeD1KpjdGEkTD0eb6tKfA7LFeQ7eCn6KRdhoZd4';
        $consumerSecret = '3S3h5NWw7jeAZYu82IPOjE6bKDP4mmfoLuZH6tLpoyaFQrnexZmPWPYGGMvMFa5P';
        $BusinessShortCode = '174379';
        $Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
    
        $PartyA = $phone;
        $AccountReference = 'Giftos';
        $TransactionDesc = 'Please confirm payment made to Giftos.';
    
        // Calculate total price from the cart
        $cart = Cart::where('user_id', $userid)->get();
        $Amount = $cart->sum('total');
    
        $Timestamp = date('YmdHis');
        $Password = base64_encode($BusinessShortCode . $Passkey . $Timestamp);
    
        // Get access token
        $access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        $initiate_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $headers = ['Content-Type:application/json; charset=utf8'];
    
        $curl = curl_init($access_token_url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_HEADER, FALSE);
        curl_setopt($curl, CURLOPT_USERPWD, $consumerKey . ':' . $consumerSecret);
        $result = curl_exec($curl);
        $result = json_decode($result);
        $access_token = $result->access_token;
        curl_close($curl);
    
        // Initiate the transaction
        $stkheader = ['Content-Type:application/json', 'Authorization:Bearer ' . $access_token];
    
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $initiate_url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $stkheader);
    
        $curl_post_data = [
            'BusinessShortCode' => $BusinessShortCode,
            'Password' => $Password,
            'Timestamp' => $Timestamp,
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $Amount,
            'PartyA' => $PartyA,
            'PartyB' => $BusinessShortCode,
            'PhoneNumber' => $PartyA,
            'CallBackURL' => 'https://a9de-41-90-189-99.ngrok-free.app/p', // Update to your actual callback URL
            'AccountReference' => $AccountReference,
            'TransactionDesc' => $TransactionDesc
        ];
    
        $data_string = json_encode($curl_post_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);
    
        $data_to = json_decode($curl_response);
    
        // Check if the ResponseCode exists
        if (isset($data_to->ResponseCode) && $data_to->ResponseCode == '0') {
            // Create an order with status "in_progress"
            $orderId = uniqid('order_');
            foreach ($cart as $carts) {
                Order::create([
                    'order_id' => $orderId,
                    'user_id' => $userid,
                    'name' => $name,
                    'phone' => $phone,
                    'rec_address' => $address,
                    'product_id' => $carts->product_id,
                    'quantity' => $carts->quantity,
                    'total' => $carts->total,
                    'payment_status' => 'pending',
                    'status' => 'in_progress',
                    'checkout_request_id' => $data_to->CheckoutRequestID
                ]);
            }
    
            // Clear the cart after creating the order
            Cart::where('user_id', $userid)->delete();
    
             // Redirect after 20 seconds
        return response()->json([
            'message' => 'STK Prompt Sent Successfully, order has been created. Redirecting to My Orders...'
        ])->header('Refresh', '20;url='.url('/myorders'));
    } else {
        return response()->json(['message' => 'Transaction Request Failed', 'error' => $data_to], 400);
    }
    }
    // Add the necessary logic to handle the response from Safaricom
public function handleCallback(Request $request)
{
    // Retrieve the request data
    $callbackData = $request->all();

    // Check if the request has the required fields
    if (isset($callbackData['Body']['stkCallback']['CheckoutRequestID'])) {
        $checkoutRequestID = $callbackData['Body']['stkCallback']['CheckoutRequestID'];
        $resultCode = $callbackData['Body']['stkCallback']['ResultCode'];

        // Find the order by CheckoutRequestID
        $order = Order::where('checkout_request_id', $checkoutRequestID)->first();

        if ($order) {
            // Update the order status based on the result code
            if ($resultCode == 0) {
                $order->payment_status = 'paid';
                $order->status = 'confirmed';
            } else {
                $order->payment_status = 'failed';
                $order->status = 'in_progress'; // or 'failed'
            }
            $order->save();
        }
    }
    return response()->json(['message' => 'Callback processed successfully']);
}

    
}
