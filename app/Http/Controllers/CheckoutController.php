<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Country;
use App\State;
use App\City;
use Auth;
class CheckoutController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');

  }
  function cartcheckout(Request $request){
    $auth = Auth::user();
    $countries = Country::orderBy('name', 'asc')->get();
    $grand_total = $request->grand_total;
    $customer_ip = $_SERVER['REMOTE_ADDR'];
    $cart_info = Cart::where('customer_ip', $customer_ip)->get();
    return view('checkout', compact( 'grand_total','cart_info', 'countries', 'auth'));
  }

  function ajaxgetstate($country_id){
    $state = State::where('country_id', $country_id)->get();
    return $state;
  }

  function ajaxgetcity($state_id){
    $city = City::where('state_id',$state_id)->get();
    return $city;
  }
}
