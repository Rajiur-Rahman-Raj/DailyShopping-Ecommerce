<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deliverycharge;
use Carbon\Carbon;
use Auth;

class DeliverychargeController extends Controller
{
    function deliverycharge(){
      if(Auth::user()->role == 2){
        $all_deliveries = Deliverycharge::paginate();
        return view('DeliveryCharge/deliverycharge', compact('all_deliveries'));
      }else{
        return redirect('/');
      }
    }

    function deliverychargeinsert(Request $request){
      if(Auth::user()->role == 2){
        $request->validate([
          'delivery_name' => 'required',
          'delivery_charge' => 'required|numeric|min:0',
        ],[
          'delivery_name.required' => 'This field is required',
          'delivery_charge.required' => 'This field is also required',
          'delivery_charge.numeric' => 'delivery charge must be a number',
        ]);

        Deliverycharge::insert([
          'delivery_name' => $request->delivery_name,
          'delivery_charge' => $request->delivery_charge,
          'created_at' => Carbon::now()
        ]);
        return back()->with('message', 'delivery charge is added');
      }else{
      return redirect('/');
      }
    }

    function deliverychargedelete($deliverychargeid){
      if(Auth::user()->role == 2){
        DeliveryCharge::find($deliverychargeid)->delete();
        return back()->with('delete_msg', 'delevery charge deleted successfully!');
      }else{
        return redirect('/');
      }
    }
}
