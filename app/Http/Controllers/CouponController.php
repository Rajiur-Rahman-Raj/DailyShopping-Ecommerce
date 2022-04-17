<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use Carbon\Carbon;
use Auth;
class CouponController extends Controller
{



  function couponaddview(){
    if(Auth::user()->role == 2){
      $coupons = Coupon::paginate(4);
      return view('coupon/couponaddview', compact('coupons'));
    }else{
      return redirect('/');
    }
  }

  function couponinsert(Request $request){
    if(Auth::user()->role == 2){
      $request->validate([
        'coupon_code' => 'required|unique:coupons,coupon_code',
        'coupon_discount' => 'required|numeric|min:1|max:99',
        'valid_date' => 'required',
      ],[
        'coupon_code.required' => 'Coupon code required',
        'coupon_code.unique' => 'This coupon code is already taken',
        'coupon_discount.required' => 'coupon_discount is required',
        'coupon_discount.numeric' => 'coupon_discount field must be numeric value less then 100',
        'valid_date.required' => 'valid_date field is required',
      ]);

      Coupon::insert([
        'coupon_code' => $request->coupon_code,
        'coupon_discount' => $request->coupon_discount,
        'valid_date' => $request->valid_date,
        'created_at' => Carbon::now()
      ]);
      return back()->with('message', 'Coupon is successfully added');
    }else{
      return redirect('/');
    }
  }

  function coupondelete($coupon_id){
    if(Auth::user()->role == 2){
      Coupon::findOrfail($coupon_id)->delete();
      return back()->with('delete_msg', 'coupon deleted successfully!');
    }else{
      return redirect('/');
    }
  }

}
