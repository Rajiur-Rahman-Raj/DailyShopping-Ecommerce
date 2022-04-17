<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use App\Userprofile;
use Auth;
use App\Sale;
use App\Shipping;
use App\Billing_detail;
use App\Customerreview;
use Image;

class UserdashboardController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
    // $this->middleware('rolechecker');
  }

    function userdashboard(){
      if (Auth::user()->role==1) {
        $total_sales = Sale::where('user_id', Auth::id())->count();
        $order_dates = Sale::where('user_id', Auth::id())->get();
        $payment_type = Shipping::where('user_id', Auth::id())->get();
        return view('userdashboard', compact('total_sales', 'order_dates', 'payment_type'));

      }else{
        return view('errors/404');
      }

    }

    function adduserprofile(){
      return view('adduserprofile');
    }

    function adduserprofileinsert(Request $request){
      $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'current_address' => 'required',
        'phone_number' => 'required|numeric',
        'profile_image' => 'required',
        'about_you' => 'required',
      ],[
        'first_name.required' => 'please enter your first name!',
        'last_name.required' => 'please enter your last name!',
        'current_address.required' => 'please enter your current address!',
        'phone_number.required' => 'phone number is required!',
        'profile_image.required' => 'must select your profile image!',
        'about_you.required' => 'please write something about you!',
      ]);

      $lastinsertedid = Userprofile::insertGetId([
        'user_id' => Auth::id(),
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'current_address' => $request->current_address,
        'phone_number' => $request->phone_number,
        'facebook' => $request->facebook,
        'instagram' => $request->instagram,
        'twitter' => $request->twitter,
        'linkedin' => $request->linkedin,
        'youtube' => $request->youtube,
        'about_you' => $request->about_you,
        'created_at' => Carbon::now(),
      ]);

      if($request->hasFile('profile_image')){
        $uploaded_image = $request->profile_image;
        $our_uploaded_img_extension = $uploaded_image->getClientOriginalExtension();
        $new_img_name = $lastinsertedid.'.'.$our_uploaded_img_extension;
        Image::make($uploaded_image)->resize(250, 200)->save(base_path('public/uploads/user_profile_img/'.$new_img_name));

         Userprofile::find($lastinsertedid)->update([
          'profile_image' => $new_img_name,
        ]);
      }
      return back()->with('message', 'Your profile Added successfully!');
    }
    function userprofileupdate(Request $request){

      Userprofile::where('user_id', Auth::id())->update([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'current_address' => $request->current_address,
        'phone_number' => $request->phone_number,
        'facebook' => $request->facebook,
        'instagram' => $request->instagram,
        'twitter' => $request->twitter,
        'linkedin' => $request->linkedin,
        'youtube' => $request->youtube,
        'about_you' => $request->about_you,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);

      if($request->hasFile('profile_image')){
        $uploaded_image = $request->profile_image;
        $our_uploaded_img_extension = $uploaded_image->getClientOriginalExtension();
        $new_img_name = $request->user_profile_id.'.'.$our_uploaded_img_extension;
        Image::make($uploaded_image)->resize(250, 200)->save(base_path('public/uploads/user_profile_img/'.$new_img_name));

         Userprofile::find($request->user_profile_id)->update([
          'profile_image' => $new_img_name,
        ]);
      }
      return back()->with('edit_msg', 'Your Profile Updated successfully!');

    }

    function updateuserprofileimage(Request $request){
      if($request->hasFile('update_profile_image')){
        $uploaded_image = $request->update_profile_image;
        $our_uploaded_img_extension = $uploaded_image->getClientOriginalExtension();
        $new_img_name = $request->user_profile_id.'.'.$our_uploaded_img_extension;
        Image::make($uploaded_image)->resize(250, 200)->save(base_path('public/uploads/user_profile_img/'.$new_img_name));

         Userprofile::find($request->user_profile_id)->update([
          'profile_image' => $new_img_name,
        ]);
      }
      return back()->with('edit_msg', 'Your picture changed successfully!');
    }

    function uploaduserprofileimage(Request $request){
      if($request->hasFile('upload_profile_image')){
        $uploaded_image = $request->upload_profile_image;
        $our_uploaded_img_extension = $uploaded_image->getClientOriginalExtension();
        $new_img_name = rand().'.'.$our_uploaded_img_extension;
        Image::make($uploaded_image)->resize(250, 200)->save(base_path('public/uploads/user_profile_img/'.$new_img_name));

         Userprofile::insert([
           'user_id' => Auth::id(),
          'profile_image' => $new_img_name,
        ]);
      }
      return back()->with('message', 'Your profile picture uploaded successfully!');
    }

    function viewuserprofile(){

      return view('userprofileview');
    }

    function customertotalorderlist(){
      $all_orders = Sale::where('user_id', Auth::id())->get();
      $all_payments = Shipping::where('user_id', Auth::id())->get();
      return view('customertotalorderlist', compact('all_orders','all_payments'));
    }

    function customersingleorderdetails($sale_id){
      $billing_details = Billing_detail::where('sale_id', $sale_id)->get();
      $customer_name = Billing_detail::where('sale_id', $sale_id)->first();
      return view('customersingleorderdetails', compact('billing_details', 'sale_id', 'customer_name'));
    }

    function singleproductreview($billing_id){
      return view('singleproductreview', compact('billing_id'));
    }

    function singleproductreviewinsert(Request $request){
      Customerreview::insert([
        'billing_id' => $request->billing_id,
        'user_id' => Auth::id(),
        'product_id' => Billing_detail::find($request->billing_id)->product_id,
        'product_name' => Billing_detail::find($request->billing_id)->product_name,
        'customer_comments' => $request->customer_comments,
        'customer_rating' => $request->customer_rating,
        'created_at' => Carbon::now()

      ]);
      return back()->with('message', 'Product review added successfully! you can not add review again for this product');
    }
}
