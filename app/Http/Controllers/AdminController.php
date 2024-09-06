<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Admin;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Laravel\Prompts\Prompt;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

use function PHPUnit\Framework\fileExists;

class AdminController extends Controller
{



   public function view_category()
   {
      $data = Category::all();
      return view('admin.category', compact('data'));
   }

   public function add_category(Request $request)
   {
      $category = new Category;
      $category->category_name = $request->category;
      $category->save();
      toastr()->timeOut(10000)->closeButton()->addSuccess('Your Category has been added.');
      return redirect()->back();
   }
   public function delete_category($id)
   {

      $data = Category::find($id);
      $data->delete();
      toastr()->timeOut(10000)->closeButton()->success('Your Category has been deleted.');

      return redirect()->back();
   }

   public function edit_category($id)
   {
      $data = Category::find($id);
      return view('admin.edit_category', compact('data'));
   }
   public function update_category(Request $request, $id)
   {
      $data = Category::find($id);
      $data->category_name = $request->category;
      $data->save();
      return redirect('/view_category');
   }
   public function add_product()
   {
      $category = Category::all();

      return view('admin.add_product', compact('category'));
   }
   public function upload_product(Request $request)
   {
      $data = new Product;
      $data->title = $request->title;
      $data->description = $request->description;
      $data->price = $request->price;
      $data->category = $request->category;
      $data->quantity = $request->quantity;
      $data->version = $request->version;
      $data->size = $request->size;
      $data->delivery = $request->delivery;
      $data->delivery_m = $request->delivery_m;
      $data->year = $request->year;

      $image = $request->image;
      if ($image) {
         $imagename = time() . '.' . $image->getClientOriginalExtension();
         $request->image->move('Products', $imagename);
         $data->image = $imagename;
      }
      $gallery_2 = $request->gallery_2;
      if ($gallery_2) {
         $galleryname = time() . '2.' . $gallery_2->getClientOriginalExtension();
         $request->gallery_2->move('Products', $galleryname);
         $data->gallery_2 = $galleryname;
      }
      $gallery_1 = $request->gallery_1;
      if ($gallery_1) {
         $galleryname = time() . '1.' . $gallery_1->getClientOriginalExtension();
         $request->gallery_1->move('Products', $galleryname);
         $data->gallery_1 = $galleryname;
      }
      $gallery_3 = $request->gallery_3;
      if ($gallery_3) {
         $galleryname = time() . '3.' . $gallery_3->getClientOriginalExtension();
         $request->gallery_3->move('Products', $galleryname);
         $data->gallery_3 = $galleryname;
      }
      $gallery_4 = $request->gallery_4;
      if ($gallery_4) {
         $galleryname = time() . '4.' . $gallery_4->getClientOriginalExtension();
         $request->gallery_4->move('Products', $galleryname);
         $data->gallery_4 = $galleryname;
      }


      $gallery_5 = $request->gallery_5;
      if ($gallery_5) {
         $galleryname = time() . '5.' . $gallery_5->getClientOriginalExtension();
         $request->gallery_5->move('Products', $galleryname);
         $data->gallery_5 = $galleryname;
      }
      $gallery_6 = $request->gallery_6;
      if ($gallery_6) {
         $galleryname = time() . '6.' . $gallery_6->getClientOriginalExtension();
         $request->gallery_6->move('Products', $galleryname);
         $data->gallery_6 = $galleryname;
      }
      $gallery_7 = $request->gallery_7;
      if ($gallery_7) {
         $galleryname = time() . '7.' . $gallery_7->getClientOriginalExtension();
         $request->gallery_7->move('Products', $galleryname);
         $data->gallery_7 = $galleryname;
      }
      $gallery_8 = $request->gallery_8;
      if ($gallery_8) {
         $galleryname = time() . '8.' . $gallery_8->getClientOriginalExtension();
         $request->gallery_8->move('Products', $galleryname);
         $data->gallery_8 = $galleryname;
      }


      $data->save();
      toastr()->timeOut(10000)->closeButton()->addSuccess('Your Category has been deleted.');

      return redirect()->back();
   }

   public function view_product()
   {
      $product = Product::paginate(20);
      return view('admin.view_product', compact('product'));
   }

   public function delete_product($id)
   {

      $data = Product::find($id);
      $image_path1 = public_path('products/' . $data->gallery_1);
      if (file_exists($image_path1)) {
         unlink($image_path1);
      }
      $image_path2 = public_path('products/' . $data->gallery_2);
      if (file_exists($image_path2)) {
         unlink($image_path2);
      }
      $image_path3 = public_path('products/' . $data->gallery_3);
      if (file_exists($image_path3)) {
         unlink($image_path3);
      }
      $image_path4 = public_path('products/' . $data->gallery_4);
      if (file_exists($image_path4)) {
         unlink($image_path4);
      }
      $image_path5 = public_path('products/' . $data->gallery_5);
      if (file_exists($image_path5)) {
         unlink($image_path5);
      }
      $image_path6 = public_path('products/' . $data->gallery_6);
      if (file_exists($image_path6)) {
         unlink($image_path6);
      }
      $image_path7 = public_path('products/' . $data->gallery_7);
      if (file_exists($image_path7)) {
         unlink($image_path7);
      }
      $image_path8 = public_path('products/' . $data->gallery_8);
      if (file_exists($image_path8)) {
         unlink($image_path8);
      }
      $image_path = public_path('products/' . $data->image);
      if (file_exists($image_path)) {
         unlink($image_path);
      }
      $data->delete();
      toastr()->timeOut(10000)->closeButton()->success('Your product has been deleted.');

      return redirect()->back();
   }
   public function edit_product($id)
   {
      $data = Product::find($id);
      $category = Category::all();
      return view('admin.edit_product', compact('data', 'category'));
   }
   public function update_product(Request $request, $id)
   {
      $data = Product::find($id);


      $data->title = $request->title;
      $data->description = $request->description;
      $data->price = $request->price;
      $data->category = $request->category;
      $data->quantity = $request->quantity;
      $data->version = $request->version;
      $data->size = $request->size;
      $data->delivery = $request->delivery;
      $data->delivery_m = $request->delivery_m;
      $data->year = $request->year;

      $image = $request->image;
      if ($image) {
         $imagename = time() . '.' . $image->getClientOriginalExtension();
         $request->image->move('Products', $imagename);
         $data->image = $imagename;
      }
      $gallery_2 = $request->gallery_2;
      if ($gallery_2) {
         $galleryname = time() . '2.' . $gallery_2->getClientOriginalExtension();
         $request->gallery_2->move('Products', $galleryname);
         $data->gallery_2 = $galleryname;
      }
      $gallery_1 = $request->gallery_1;
      if ($gallery_1) {
         $galleryname = time() . '1.' . $gallery_1->getClientOriginalExtension();
         $request->gallery_1->move('Products', $galleryname);
         $data->gallery_1 = $galleryname;
      }
      $gallery_3 = $request->gallery_3;
      if ($gallery_3) {
         $galleryname = time() . '3.' . $gallery_3->getClientOriginalExtension();
         $request->gallery_3->move('Products', $galleryname);
         $data->gallery_3 = $galleryname;
      }
      $gallery_4 = $request->gallery_4;
      if ($gallery_4) {
         $galleryname = time() . '4.' . $gallery_4->getClientOriginalExtension();
         $request->gallery_4->move('Products', $galleryname);
         $data->gallery_4 = $galleryname;
      }

      $gallery_5 = $request->gallery_5;
      if ($gallery_5) {
         $galleryname = time() . '6.' . $gallery_5->getClientOriginalExtension();
         $request->gallery_5->move('Products', $galleryname);
         $data->gallery_5 = $galleryname;
      }
      $gallery_6 = $request->gallery_6;
      if ($gallery_6) {
         $galleryname = time() . '5.' . $gallery_6->getClientOriginalExtension();
         $request->gallery_6->move('Products', $galleryname);
         $data->gallery_6 = $galleryname;
      }
      $gallery_7 = $request->gallery_7;
      if ($gallery_7) {
         $galleryname = time() . '7.' . $gallery_7->getClientOriginalExtension();
         $request->gallery_7->move('Products', $galleryname);
         $data->gallery_7 = $galleryname;
      }
      $gallery_8 = $request->gallery_8;
      if ($gallery_8) {
         $galleryname = time() . '8.' . $gallery_8->getClientOriginalExtension();
         $request->gallery_8->move('Products', $galleryname);
         $data->gallery_8 = $galleryname;
      }
      $data->save();
      return redirect('/view_product')->with('success', 'Item updated successfully!');
   }
   public function product_search(Request $request)
   {
      $search = $request->search;
      $product = Product::where('title', 'LIKE', '%' . $search . '%')->orWhere('category', 'LIKE', '%' . $search . '%')->paginate(3);
      return view('admin.view_product', compact('product'));
   }

   public function view_orders()
   {
      $data = Order::orderByRaw("
    FIELD(status, 'in_progress', 'confirmed', 'delivered')
")->get();


      return view('admin.view_orders', compact('data'));
   }
   public function filter_orders(Request $request)
   {
      $status = $request->get('status');
      $data = Order::where('status', $status)->get();

      return view('admin.view_orders', compact('data'));
   }

   public function filter_new()
   {
     
      $data = Order::where('status', 'in_progress')->get();

      return view('admin.view_orders', compact('data'));
   }
   public function filter_confirmed()
   {
     
      $data = Order::where('status', 'confirmed')->get();

      return view('admin.view_orders', compact('data'));
   }
   public function filter_delivered()
   {
     
      $data = Order::where('status', 'delivered')->get();

      return view('admin.view_orders', compact('data'));
   }
   
   

   public function update_order_status(Request $request, $id)
   {
      $order = Order::find($id);
      $order->status = $request->get('status');
      $order->save();

      return redirect()->back();
   }


   public function user_admin(){
      $data = User::where('usertype','user')->get();

      return view('admin.users',compact('data'));
   }

   public function make_admin(Request $request, $id)
   {
      $data = User::where ('usertype','admin');
      $user = User::find($id);
      $user->usertype = 'admin';
      $user->save();
      return redirect()->back();
   }

      public function delete_user(Request $request, $id)
   {
      $data = User::where ('usertype','user');

      $user = User::find($id);
      $user->delete();
      
      return redirect()->back();
   } 
 
   public function admin_user(){
      $data = User::where('usertype','admin')->get();

      return view('admin.admins',compact('data'));
   }
   public function demote(Request $request, $id)
   {
      $data = User::where ('usertype','user');
      $user = User::find($id);
      $user->usertype = 'user';
      $user->save();
      return redirect()->back();
   }
   public function delete_admin(Request $request, $id)
   {
      $data = User::where ('usertype','admin');

      $user = User::find($id);
      $user->delete();
      
      return redirect()->back();
   }



}
