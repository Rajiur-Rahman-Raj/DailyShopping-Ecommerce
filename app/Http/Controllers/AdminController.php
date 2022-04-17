<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use Auth;
class AdminController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
    function adminregister(){
      if(Auth::user()->role == 2){
        return view('adminregister');
      }else{
        return view('errors/404');
      }

    }

    function adminregisterinsert(Request $request){
      $request->validate([
        'name' => 'required',
        'email' => 
        'password' => 'required||confirmed|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
        'password_confirmation' => 'required|min:6'
      ],[
        'name.required' => 'name field Must be required!',
        'email.required' => 'Email field must be required!',
        'email.regex' => 'please enter Your valid email address! [ include @ . ]',
        'password.required' => 'please enter your password!',
        'password.confirmed' => 'password does not match with confirm password!',
        'password.regex' => 'Password must contain at least one number and both uppercase and lowercase letters',
        'password_confirmation.required' => 'confirm password filed is required!',
      ]);

      // $password = $request->password;
      // $confirm_password = $request->password_confirmation;
      //
      // if ($password != $confirm_password) {
      //   return back()->with('no_match', 'password does not match with confirm password!');
      // }

      User::insert([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => '2',
        'created_at' => Carbon::now()
      ]);
      return redirect('login');
    }

    function adminuserprofile(){
      return view('adminuserprofile');
    }
    function viewadminprofile(){
      return view('viewadminprofile');
    }

    function welcomeadmindashboard(){
      return view('welcomeadmindashboard');
    }

}
