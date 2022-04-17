<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Billing_detail;
use App\Shipping;

class customercontroller extends Controller
{
    function cusotmerinfo(){


      $customer_infos = Billing_detail::paginate(5);
      return view('customer/customerinfo', compact('customer_infos'));


    }

    function paymentpending($payment_id){

      $shipping_id = Billing_detail::find($payment_id)->shipping_id;
      Shipping::find($shipping_id)->update([
        'payment_status' => 2,
      ]);
      return back();
    }


    function customerorderdelete($order_id){
      Billing_detail::find($order_id)->delete();
      return back();
    }
}
