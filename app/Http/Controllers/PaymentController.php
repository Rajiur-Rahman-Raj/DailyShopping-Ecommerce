<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shipping;
use App\Sale;
use App\Billing_detail;
use App\Cart;
use App\Product;
use Auth;
use Carbon\Carbon;
use Session;
use Stripe;
use Illuminate\Support\Facades\Mail;
use App\Mail\Ordersend;


class PaymentController extends Controller
{

    function shippinginfoinsert(Request $request){

      $customer_ip = $_SERVER['REMOTE_ADDR'];

      $sipping_id = Shipping::insertGetId([
        'user_id' => Auth::id(),
        'customer_ip' => $customer_ip,
        'first_name' => $request->first_name,
        'last_name' =>  $request->last_name,
        'address' =>  $request->address,
        'country_id' => $request->country_id,
        'state_id' =>  $request->state_id,
        'city_id' =>  $request->city_id,
        'zip_code' => $request->zip_code,
        'email' => $request->email,
        'phone' => $request->phone,
        'payment_type' => $request->payment_type,
        'payment_status' => 1,
        'created_at' => Carbon::now()
      ]);

      if ($request->payment_type == 2) {
        Shipping::find($sipping_id)->update([
          'payment_status' => 2,
        ]);
      }

      $sale_id = Sale::insertGetId([
        'user_id' => Auth::id(),
        'shipping_id' => $sipping_id,
        'grand_total' => $request->grand_total,
        'created_at' => Carbon::now()
      ]);

      $cart_items = Cart::where('customer_ip',$customer_ip)->get();
      foreach ($cart_items as  $cart_item) {
        Billing_detail::insert([
          'user_id' => Auth::id(),
          'sale_id' => $sale_id,
          'shipping_id' => $sipping_id,
          'customer_name' => Auth::user()->name,
          'product_id' => $cart_item->product_id,
          'product_name' => Product::find($cart_item->product_id)->product_name,
          'product_unit_price' => Product::find($cart_item->product_id)->product_price,
          'product_quantity' => $cart_item->product_quantity,
          'Total_amount' => Sale::find($sale_id)->grand_total,
          'created_at' => Carbon::now()
        ]);
        Product::find($cart_item->product_id)->decrement('product_quantity', $cart_item->product_quantity);
        $cart_item->delete();
      }

      if ($request->payment_type == 2) {
          Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            Stripe\Charge::create ([
                  "amount" => $request->grand_total * 100,
                  "currency" => "usd",
                  "source" => $request->stripeToken,
                  "description" => "Test payment from itsolutionstuff.com."
          ]);

          Session::flash('success', 'Payment successful! your order also completed successfully');
      }
      $order = Billing_detail::where('sale_id', $sale_id)->get();
      $user_email = Auth::user()->email;
      Mail::to($user_email)->send(new Ordersend($order));

      return redirect('product/order/complete')->with('message', 'Thank you for purchasing, Your order is complete');
    }
}
