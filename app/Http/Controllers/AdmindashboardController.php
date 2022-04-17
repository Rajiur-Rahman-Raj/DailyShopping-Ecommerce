<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdmindashboardController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
    // $this->middleware('rolechecker');
  }
   function admindashboard(){
     if (Auth::user()->role ==2) {
       return view('admindashboard');
     }else{
       return view('errors/404');
     }

   }
}
