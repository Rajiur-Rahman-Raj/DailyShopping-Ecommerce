<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Cart;
use App\Coupon;
use App\Deliverycharge;
use Carbon\Carbon;
use App\Customerreview;
use App\Pricerange;
use App\User;
use App\Banner;
use App\Event;
use App\Contact;

class FrontendController extends Controller
{

    //home page
    function index(){
      $arival_products = Product::limit(4)->orderby('id', 'DESC')->get();
      // $our_products = Product::limit(8)->orderby('id', 'ASC')->get();
      $our_products = Product::paginate(15);
      $all_customer_reviews = Customerreview::all();
      $banners = Banner::all();
      $all_events = Event::all();
      return view('welcome', compact('arival_products', 'our_products', 'all_customer_reviews','banners', 'all_events'));
    }

    function categorywiseshop($category_id='', $subcategory_id=''){
      $products = Product::paginate(12);
      $categories = Category::all();
      $product_price_ranges = Pricerange::all();
      return view('categorywiseshop', compact('products', 'categories', 'category_id', 'subcategory_id', 'product_price_ranges'));
    }

    // price range filter method
    function pricerangefilter(Request $request){
      $min_range = intval($request->range_from);
      $max_range = intval($request->range_to);
      $category_id = $request->category_id;
      $subcategory_id = $request->sub_category_id;


      $all_products = Product::whereBetween('product_price', [$min_range, $max_range])->paginate(12);
      $products = Product::where('category_id', $category_id)->where('subcategory_id', $subcategory_id)->whereBetween('product_price', [$min_range, $max_range])->paginate(12);
      $categories = Category::all();
      $product_price_ranges = Pricerange::all();
      return view('categorywiseshop_price_range', compact('products', 'all_products', 'categories', 'category_id', 'subcategory_id', 'product_price_ranges'));
    }

    function allcategorywiseproducts($category_id, $subcategory_id){
      $products =  Product::where('category_id', $category_id)->where('subcategory_id', $subcategory_id)->paginate(6);
      $categories = Category::all();
      $product_price_ranges = Pricerange::all();
      return view('categorywiseshop', compact('products', 'categories', 'category_id', 'subcategory_id', 'product_price_ranges'));
    }

    function ourblog(){
      $all_events = Event::all();
      return view('blog', compact('all_events'));
    }

    function about(){
      return view('about');

    }

    function contact(){
      return view('contact');

    }

    //i am here
    function cart($coupon_code = ''){

      if($coupon_code == ''){

        $customer_ip = $_SERVER['REMOTE_ADDR'];
        $cart_info = Cart::where('customer_ip', $customer_ip)->get();
        $delivery_infos = Deliverycharge::all();
        $coupon_discount_amount = 0;
        return view('cart', compact('cart_info', 'coupon_discount_amount', 'delivery_infos'));
      }else{
        if(Coupon::where('coupon_code', $coupon_code)->exists()){
          $customer_ip = $_SERVER['REMOTE_ADDR'];
          $cart_info = Cart::where('customer_ip', $customer_ip)->get();
          $delivery_infos = Deliverycharge::all();
          $current_date = Carbon::now()->format('Y-m-d');
          $coupon_date = Coupon::where('coupon_code', $coupon_code)->first()->valid_date;
          if($current_date <= $coupon_date){
            $coupon_discount_amount = Coupon::where('coupon_code', $coupon_code)->first()->coupon_discount;
            return view('cart', compact('cart_info', 'coupon_discount_amount', 'delivery_infos'));
          }else{
            return back()->with('expired_coupon', 'Your Coupon Date is Expired!');
          }
        }else{
          return back()->with('coupon_not_exists', 'coupon code does not exists');
        }
      }

    }

    function productdetails(){
      return view('productdetails');
    }

    function singleproductdetails($product_id){
      $single_product_info = Product::findOrFail($product_id);
      $related_products = Product::where('category_id', $single_product_info->category_id)->where('id', '!=', $product_id)->get();
      return view('productdetails', compact('single_product_info', 'related_products'));
    }

    function shipingcart(){
      return view('shipingcart');
    }

    function checkout(){
      return view('checkout');
    }

    function ordercomplete(){
      return view('ordercomplete');
    }

    function wishlist(){
      return view('wishlist');
    }

    function addtocart(Request $request){
      $customer_ip = $_SERVER['REMOTE_ADDR'];

      // echo "done ";

      if(Cart::where('customer_ip', $customer_ip)->where('product_id', $request->product_id)->where('color', $request->color)->where('size', $request->size)->exists()){
        Cart::where('customer_ip', $customer_ip)->where('product_id', $request->product_id)->increment('product_quantity', 1);
      }
      else{
        Cart::insert([
          'customer_ip' => $customer_ip,
          'product_id' => $request->product_id,
          'color' => $request->color,
          'size' => $request->size,
          'created_at' => Carbon::now()
        ]);
      }
      return back()->with('message', 'your cart added successfully!');
    }

  function cartdelete(){
    $ip_address = $_SERVER['REMOTE_ADDR'];
    Cart::where('customer_ip', $ip_address)->delete();
      return back()->with('message', 'Your All cart id cleared!');
  }

  function singlecartdelete($cart_id){
    Cart::find($cart_id)->delete();
      return back()->with('message', 'your cart deleted successfully!');
  }


  function updatecart(Request $request){
    foreach ($request->product_id as $index_of_product_id => $value_of_product_id) {

      $user_given_quantity = $request->user_given_product_quantity[$index_of_product_id];
      $user_given_color = $request->user_given_color[$index_of_product_id];
      $user_given_size = $request->user_given_size[$index_of_product_id];
       if(Product::find($value_of_product_id)->product_quantity >= $user_given_quantity &&  $user_given_quantity > 0){
          $ip_address = $_SERVER['REMOTE_ADDR'];
          cart::where('customer_ip', $ip_address)->where('product_id', $value_of_product_id)->where('color', $user_given_color)->where('size', $user_given_size)->update([
          'product_quantity' => $request->user_given_product_quantity[$index_of_product_id]
        ]);
        return back()->with('update_quantity', 'Quantity update successfully!');
      }elseif($user_given_quantity > 0){
        $user_given_quantity = $request->user_given_product_quantity[$index_of_product_id];
        return back()->with('error_msg', 'Stock Not Available! Please Select the product quantity below ' . $user_given_quantity);
       }
    }
    return back();
  }

  function contactmessageinsert(Request $request){

    $request->validate([
      'fname' => 'required',
      'lname' => 'required',
      'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
      'phone' => 'required|numeric',
      'message' => 'required'
    ],[
      'fname.required' => 'First name field is required!',
      'lname.required' => 'Lirst name field is required!',
      'email.required' => 'Email name field is required!',
      'email.regex' => 'please enter Your valid email address! [ include @ . ]',
      'phone.required' => 'please enter your phone number!',
      'phone.numeric' => 'phone number field contains only interger value!',
      'message.required' => 'message field is required!'
    ]);

    Contact::insert([
      'fname' => $request->fname,
      'lname' => $request->lname,
      'email' => $request->email,
      'phone' => $request->phone,
      'subject' => $request->subject,
      'message' => $request->message,
      'created_at' => Carbon::now()
    ]);

    return back()->with('message', 'your message successfully sent!');

  }

  function eventdetails($event_id){
    $single_events = Event::find($event_id);
    return view('event_details', compact('single_events'));
  }

  //search porduct method start
  function searchProductList(Request $request){
      $request->validate([
        'search' => 'required',
      ]);

      $products = Product::where("product_name", "LIKE", "%". $request->search . "%")->paginate(12);
      $categories = Category::all();

      return view('search/search_result', compact('products', 'categories'));
  }



  function findproducts(Request $request){
      $request->validate([
        'search' => 'required',
      ]);

      $products = Product::where("product_name", "LIKE", "%". $request->search . "%")->take(10)->get();

      return view('search/search_product', compact('products'));
  }

}
