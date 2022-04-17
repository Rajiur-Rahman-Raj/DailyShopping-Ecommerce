<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Hash;

class ChangepasswordController extends Controller
{
    function userpasswordchange(){
      return view('auth/passwords/userpasswordchange');
    }

    function userchangepasswordinsert(Request $request){

      $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
        'confirm_password' => 'required|min:6'
      ],[
        'current_password.required' => 'please enter your old password!',
        'new_password.required' => 'please enter your new password!',
        'new_password.regex' => 'Password must contain at least one number and both uppercase and lowercase letters',
        'confirm_password.required' => 'please enter your confirm password!',
      ]);

      $hased_password = Auth::user()->password;

      $new_password = $request->new_password;
      $confirm_password = $request->confirm_password;

      if( $new_password == $confirm_password ){
        if(Hash::check($request->current_password, $hased_password)){

          $user = User::find(Auth::id());
          $user->password = Hash::make($request->new_password);
          $user->save();
          return back()->with('success_msg', 'Your password Changed successfully!');
        }else{
          return back()->with('err_msg', 'your current password does not match!');
        }
      }else{
          return back()->with('no_match', 'new password does not match with confirm password!');
      }

    }
}
