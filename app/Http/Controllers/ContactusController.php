<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Contact;

class ContactusController extends Controller
{
    function contactusmessage(){

      $contact_msg = Contact::paginate(10);
      return view('contact/contact_message', compact('contact_msg'));
    }

    function contactmessagedelete($contact_id){
      Contact::findOrFail($contact_id)->delete();
      return back()->with('delete_message', "Your Message Deleted Successfully");
    }
}
