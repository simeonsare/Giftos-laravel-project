<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Stmt\Else_;
use Safaricom\Mpesa\Mpesa;


class HomeController extends Controller
{
    public function index() {
        $users = User::where('usertype', 'user')->count();
        $admins = User::where('usertype', 'admin')->count();
        $orders = Order::all()->count();
        $categories = Category::all()->count();
        $incomplete = Order::where('status','in_progress')->orWhere('status','confirmed')->count();
        $confirmed = Order::where('status','confirmed')->count();
        $new = Order::where('status','in_progress')->count();
        $delivered =  Order::where('status','delivered')->count();
        $products = Product::all()->count();
        $inventory = Product::where('quantity', '<=', 5)->get();


        return view('admin.index', compact('inventory','admins', 'users','orders','categories','products','new','incomplete','confirmed','delivered'));
    }

    public function home(){
        $product = Product::where('quantity', '>=', 1)->get();
        $products = Product::where('quantity', '>=', 1)->get();

        if (Auth::id()) {

            $user =Auth::user();
            $userid = $user->id;
            $count =Cart::where('user_id',$userid)->count();
            $data  = Order::where('user_id', $userid)->whereIn('status', ['in_progress', 'confirmed'])->get();
    
            $count1 = $data->count();
        }
        else{
            $count = '';
             $count1 = '';
        }
    

        return view('home.index',compact('product','products','count','count1'));
    }
    public function login_home(){
        $product = Product::where('quantity', '>=', 1)->get();
        $products = Product::where('quantity', '>=', 1)->get();

        if (Auth::id()) {

            $user =Auth::user();
            $userid = $user->id;
            $count =Cart::where('user_id',$userid)->count();
            $data  = Order::where('user_id', $userid)->whereIn('status', ['in_progress', 'confirmed'])->get();
    
            $count1 = $data->count();
        }
        else{
            $count = '';
                        $count = '';

        }
    
        return view('home.index',compact('count1','products','product','count'));

    }
    public function details($id) {
        $product = Product::find($id);
        if (Auth::id()) {

            $user =Auth::user();
            $userid = $user->id;
            $count =Cart::where('user_id',$userid)->count();
            $data  = Order::where('user_id', $userid)->whereIn('status', ['in_progress', 'confirmed'])->get();
    
            $count1 = $data->count();
        }
        else{
            $count = '';
             $count1 = '';
        }
    
        return view('home.details',compact( 'count1', 'product','count'));
        
    }
/*     public function add_cart($id){
        $product_id = $id;
        $user = Auth::user();
        $user_id = $user->id;
        $data = new Cart;
        $data->user_id = $user_id;
        $data->product_id = $product_id;
        $data->save();
        return redirect()->back()->with('success', 'Item added to cart successfully!');
    } */
   public function mycart()
    {
        $count = 0;
        $grandTotal = 0.00;

        if (Auth::check()) {
            $user = Auth::user();
            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();
            $cart = Cart::where('user_id', $userid)->get();
            $data  = Order::where('user_id', $userid)->whereIn('status', ['in_progress', 'confirmed'])->get();
    
            $count1 = $data->count();

            // Calculate the grand total for the user's cart
            $grandTotal = Cart::where('user_id', $userid)->sum('total');
            $totalDeliveryFee = $cart->sum(function($item) {
                return $item->product->delivery_fee;
            });
                
        }

        return view('home.mycart',[
            'cart' => $cart,
            'grandTotal' => $grandTotal,
            'totalDeliveryFee' => $totalDeliveryFee
        ], compact('count1','count'));
    }






    public function add_cart($id)
    {
        $userId = Auth::id();
        $product = Product::find($id);
 
    
        // Check if the product exists
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found!');
        }
    
        // Check if the product is already in the cart
        $cartItem = Cart::where('user_id', $userId)->where('product_id', $id)->first();
    
        if ($cartItem) {
            // Increment quantity by 1 if item already exists
            $cartItem->quantity += 1;
        } else {
            // Add new item with quantity 1 and set the price
            $cartItem = new Cart;
            $cartItem->user_id = $userId;
            $cartItem->product_id = $id;
            $cartItem->quantity = 1;
            $cartItem->price = $product->price;  // Store the product's price
        }
    
        // Calculate and set the total
/*         $cartItem->total = $cartItem->quantity * $cartItem->price;
 */        $cartItem->save();
    
        return redirect()->back()->with('success', 'Product added to cart!');
    }
    public function buy_details($id){
        $userId = Auth::id();
        $product = Product::find($id);
 
    
        // Check if the product exists
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found!');
        }
    
        // Check if the product is already in the cart
        $cartItem = Cart::where('user_id', $userId)->where('product_id', $id)->first();
    
        if ($cartItem) {
            // Increment quantity by 1 if item already exists
            $cartItem->quantity += 1;
        } else {
            // Add new item with quantity 1 and set the price
            $cartItem = new Cart;
            $cartItem->user_id = $userId;
            $cartItem->product_id = $id;
            $cartItem->quantity = 1;
            $cartItem->price = $product->price;  // Store the product's price
        }
    
        // Calculate and set the total
/*         $cartItem->total = $cartItem->quantity * $cartItem->price;
 */        $cartItem->save();
        if (Auth::check()) {
            $user = Auth::user();
            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();
            $cart = Cart::where('user_id', $userid)->get();
            $data  = Order::where('user_id', $userid)->whereIn('status', ['in_progress', 'confirmed'])->get();

            $count1 = $data->count();

            // Calculate the grand total for the user's cart
            $grandTotal = Cart::where('user_id', $userid)->sum('total');
            $totalDeliveryFee = $cart->sum(function($item) {
                return $item->product->delivery_fee;
            });
                
        }

        return view('home.mycart',[
            'cart' => $cart,
            'grandTotal' => $grandTotal,
            'totalDeliveryFee' => $totalDeliveryFee
        ], compact('count1','count'));

    
 



    }

    public function updateQuantity(Request $request, $id, $change)
    {
        $cartItem = Cart::find($id);
        $cartItem->quantity += $change;

        if ($cartItem->quantity < 1) {
            $cartItem->quantity = 1; // Prevent quantity from being less than 1
        }

       /*  $cartItem->total = $cartItem->quantity * $cartItem->product->price; */
        $cartItem->save();

        return redirect()->back()->with('success', 'Quantity updated!');
    }

    public function deleteItem($id)
    {
        $cartItem = Cart::find($id);
        $cartItem->delete();

        return redirect()->back()->with('success', 'Item removed from cart!');
    }

    public function confirm_order(Request $request)
    {
        $name = $request->name;
        $phone = $request->phone;
        $address = $request->rec_address;
        $userid = Auth::user()->id;
        $cart = Cart::where('user_id', $userid)->get();
    
        // Generate a unique order ID
        $orderId = uniqid('order_');
    
        foreach ($cart as $carts) {
            $order = new Order;
            $order->order_id = $orderId; // Set the order ID
            $order->name = $name;
            $order->phone = $phone;
            $order->rec_address = $address;
            $order->user_id = $userid;
            $order->product_id = $carts->product_id;
            $order->quantity = $carts->quantity;
            $order->total = $carts->total;
            $order->save();
    
            // Update product quantity in the inventory
            $product = Product::find($carts->product_id);
            if ($product) {
                $product->quantity -= $carts->quantity;
    
                // Check if quantity falls below 5 and flag for restock
                if ($product->quantity < 5) {
                    // Assuming you have a `restock` column or method to handle this
                    $product->restock_needed = true;
                }
    
                $product->save();
            }
        }
    
        // Clear the cart after confirming the order
        Cart::where('user_id', $userid)->delete();
        $count = Cart::where('user_id', $userid)->count();
        $data  = Order::where('user_id', $userid)->whereIn('status', ['in_progress', 'confirmed'])->get();
        $count1 = $data->count();
        $product = Product::where('quantity', '>=', 1)->get();
        $products = Product::where('quantity', '>=', 1)->get();
    
        return view('home.index', compact('count', 'products', 'count1', 'product'))->with('message', 'Order confirmed and cart cleared successfully!');
    }
    
public function buy(Request $request, $id)
{
    $userId = Auth::id();
    $productId = $request->product_id; 
    $product = Product::find($id);

    if (!$product) {
        return view('home.index',compact('product','products','count','count1'));
    }

    $order = new Order;
    $orderId = uniqid('order_');
    $order->name = Auth::user()->name;
    $order->phone = $request->mpesa_number;
    $order->rec_address = $request->delivery_address;
    $order->user_id = $userId;
    $order->product_id = $product->id;
    $order->quantity = $request->quantity;
    $order->total = $product->price * $request->quantity;  // Ensure total is calculated
    $order->status = "in_progress";
    $order->payment_status = "pending";  // Or set the appropriate default status
    $order->order_id = $orderId;  // If you want to save this unique order ID

    if ($order->save()) {
        $data = Order::where('user_id', $userId)->whereIn('status', ['in_progress', 'confirmed'])->get();
        $count1 = $data->count();
        $count = Cart::where('user_id', $userId)->count();

        return view('home.myorders', compact('count1', 'count', 'data'));
    } else {
        return redirect()->back()->with('error', 'Failed to place the order. Please try again.');
    }
}







public function myorders()
{
    $user= Auth::user()->id;
    $count = Cart::where('user_id', $user)->count();
    $data  = Order::where('user_id', $user)->whereIn('status', ['in_progress', 'confirmed'])->get();
    
    $count1 = $data->count();
    return view('home.myorders',compact('count','count1','data'));
}

public function why(){

     if (Auth::id()) {
    $user= Auth::user()->id;
    $count = Cart::where('user_id', $user)->count();
    $data  = Order::where('user_id', $user)->whereIn('status', ['in_progress', 'confirmed'])->get();
    
    $count1 = $data->count();
         }
        else{
            $count = '';
             $count1 = '';
        }
        $products = Product::where('quantity', '>=', 1)->get();



    return view('home.why',compact('count','products','count1'));
}

 public function contact(){

     if (Auth::id()) {
    $user= Auth::user()->id;
    $count = Cart::where('user_id', $user)->count();
    $data  = Order::where('user_id', $user)->whereIn('status', ['in_progress', 'confirmed'])->get();
    
    $count1 = $data->count();
         }
        else{
            $count = '';
             $count1 = '';
        }


    return view('home.contactus',compact('count','count1'));
}   
public function slider()
{
    // Fetch products from the database
    // You could add logic here to customize the products for each user
    $products = Product::all();

    // Return the products as a JSON response
    return response()->json($products);
}

public function showBuyForm($id)
{
    // Fetch all products or a specific number of products for the slider
    $product = Product::find($id);

    // Pass the products to the view
    return view('home.buy_form', compact('product'));
}
/* public function stkPush(Request $request)
{
    $amount =1 ;
    $phone = 254716735799 ;

    $mpesa = new \Safaricom\Mpesa\Mpesa();
    $BusinessShortCode =  174379;
    $LipaNaMpesaOnlinePasskey =env('MPESA_PASS_KEY');
    $TransactionType = 'CustomerPayBillOnline';
    $Amount = $amount;
    $PartyA = $phone;
    $PartyB =174379;
    $PhoneNumber = $phone;
    $CallBackURL = env('MPESA_CALLBACK_URL');
    $AccountReference = "Test123";
    $TransactionDesc = "Testing";
    $Remarks = "Payment for order";

    $response = $mpesa->STKPushSimulation(
        $BusinessShortCode,
        $LipaNaMpesaOnlinePasskey,
        $TransactionType,
        $Amount,
        $PartyA,
        $PartyB,
        $PhoneNumber,
        $CallBackURL,
        $AccountReference,
        $TransactionDesc,
        $Remarks 
    );

    return response()->json($response);
} */


    






    
}
  