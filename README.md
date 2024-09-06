

Table of Contents
 Introduction	2
Development Process	2
Setting Up the Project	2
Database Design and Eloquent Models	2
Users Table:	2
 Products Table:	3
 Orders Table:	4
 Orders Table:	5
Cart table	6
Admin and user roles	8
Admin dashboard	8
Implementing CRUD Operations	9
Create:	9
 Read:	10
 Update:	11
 Delete:	12
user dashoard	13
details page	14
Orders page	15
Dynamic Product Slider	16
Contact Us View with Google Maps API	17
Payment Integration with MPESA	18
The mpesa stk push and response handling code	19
Challenges and Solutions	24
Dynamic Product Slider	24
Google Maps API Integration	24
MPESA Payment Integration	24
Conclusion	24

Giftos E-commerce Project Report
 Introduction

The Giftos e-commerce platform is designed to provide users with a seamless online shopping experience. The platform allows users to browse, select, and purchase various gifts, with features that include dynamic product sliders, a user-friendly contact form, and integrated payment processing using Safaricom's MPESA. This report documents the development process, key features, challenges encountered, and the solutions implemented.
Development Process
Setting Up the Project

The project was set up using Laravel, a popular PHP framework known for its elegant syntax and powerful tools. Laravel Breeze was used for user authentication to ensure secure access to the platform.
Database Design and Eloquent Models

The database was designed to include tables for users, products, orders, and payments. Eloquent ORM was used to interact with these tables, providing a simple and efficient way to perform CRUD operations.






Users Table: 
Stores user information, including roles such as admin, agent, and customer.










 
  Products Table: 
Contains product details such as title, description, price, image, and stock quantity.







    Orders Table:
Tracks user orders, including product IDs, quantities, total prices, and status.












    Orders Table: 
Records payment transactions, including order IDs, payment status, and timestamps also records failed orders.











Cart table
This contains the cart items added by a user to the cart. Once the user confirms and order and initiates payments, the cart is automatically cleared.













Admin and user roles
Admin dashboard
The admin has the ability to make other admins and also demote admins to starndard user.  The admin has permission to complete orders and also reject orders. There is a button to manage the inventory when the quantity of a product reaches less than 5, they appear in the admin dashboard where the admin can update the quantities as needed. 

Implementing CRUD Operations

CRUD operations were implemented for the product management system:
Create: 
Admin users can add new products through a form that captures product details and uploads an image and product gallery.
    
    
    
    
    Read:
 Products are displayed on the home page, with detailed views available for each product.

    
    Update:
 Admin users can edit product details through an edit form.

    
    Delete:
 Admin users can delete products, removing them from the database.












user dashoard 
The user logs in and is directed to the user dashboard. Here they can view products details even if they are not logged in but a user has to be logged in to make an order or add a product to the cart. I used mpesa as my payment method with a sandbox environment for testing.
																																																																																																																																																																							dede														
details page
																					
	  																Carts
Orders page

Dynamic Product Slider


The home page features a dynamic product slider that showcases various products. The slider has a welcome page first then the products display with details on them  



Contact Us View with Google Maps API



The Contact Us page was enhanced with an embedded Google Map, showing the store's location. The map was integrated using the Google Maps API, allowing users to view the exact location.

   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d364.8849491375353!2d36.91437229475134!3d-1.239953085886227!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f145241c38f69%3A0xeaac6477ed073c98!2sDandora%2C%20Nairobi!5e0!3m2!1sen!2ske!4v1725036365358!5m2!1sen!2ske" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
   </iframe>





Payment Integration with MPESA
The platform was integrated with Safaricom's MPESA payment system, allowing users to complete transactions directly through the site. The integration included handling payment responses and updating order statuses.



The mpesa stk push and response handling code
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






Challenges and Solutions
Dynamic Product Slider

Challenge: Ensuring that different users see different products in the slider required an asynchronous data-fetching mechanism. Solution: Implemented AJAX calls to the backend API, which fetches products based on user sessions, ensuring a unique experience for each user.
Google Maps API Integration


Challenge: Displaying the correct location on the map based on user-provided coordinates. Solution: Utilized the Google Maps Embed API, allowing dynamic map updates based on the location coordinates shared by the user.
MPESA Payment Integration

Challenge: Handling the asynchronous nature of MPESA's payment confirmation. Solution: Implemented server-side validation and redirection after payment processing, ensuring users are informed of their payment status and redirected appropriately.




Conclusion

The Giftos e-commerce platform successfully integrates modern web technologies with robust backend processing to deliver a user-friendly shopping experience. Through the use of Laravel, AJAX, and third-party APIs, the platform is both dynamic and scalable, ensuring it meets the needs of its users.
