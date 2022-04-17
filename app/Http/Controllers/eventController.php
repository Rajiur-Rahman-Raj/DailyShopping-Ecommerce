<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Image;
use Auth;
use Carbon\Carbon;
class eventController extends Controller
{
    function recentevents(){
      if(Auth::user()->role == 2){
        return view('events/recentevent');
      }else{
        return redirect('/');
      }
    }

    function addeventinsert(Request $request){
      if(Auth::user()->role == 2){
        $request->validate([
          'event_title' => 'required',
          'event_description' => 'required',
          'author' => 'required',
          'event_date' => 'required',
        ],[
          'event_title.required' => 'event title must be required!',
          'event_description.required' => 'event description must be required!',
          'author.required' => 'please write author name!',
          'event_date.required' => 'select a event date!',
        ]);

        $lastinsertedid = Event::insertGetId([
          'event_title' => $request->event_title,
          'event_description' => $request->event_description,
          'author' => $request->author,
          'event_date' => $request->event_date,
          'created_at' => Carbon::now(),
        ]);

        if($request->hasFile('event_image')){
          $uploaded_image = $request->event_image;
          $our_uploaded_img_extension = $uploaded_image->getClientOriginalExtension();
          $new_img_name = $lastinsertedid.'.'.$our_uploaded_img_extension;
          Image::make($uploaded_image)->resize(800, 533)->save(base_path('public/uploads/event_img/'.$new_img_name));

          Event::find($lastinsertedid)->update([
            'event_image' => $new_img_name,
          ]);
        }
        return back()->with('event_success_msg', 'Your Event added successfully');
      }else{
        return redirect('/');
      }
    }

    function vieweventslist(){
      if(Auth::user()->role == 2){
        $all_events = Event::paginate();
        // $deleted_events = Event::onlyTrashed()->get();
        return view('events/vieweventslist', compact('all_events'));
      }else{
        return redirect('/');
      }
    }

    function eventdelete($event_id){
      Event::findOrFail($event_id)->delete();
      return back()->with('delete_message', 'Event Deleted Successfully!');
    }

    function eventedit($event_id){
      if(Auth::user()->role == 2){
        $single_events =  Event::findOrFail($event_id);
        return view('events/event_edit', compact('single_events'));
      }else{
        return redirect('/');
      }
    }

    function editeventinsert(Request $request){
      if(Auth::user()->role == 2){

        $request->validate([
          'event_title' => 'required',
          'event_description' => 'required',
          'author' => 'required',
          'event_date' => 'required',
          'event_image' => 'required',
        ],[
          'event_title.required' => 'event title must be required!',
          'event_description.required' => 'event description must be required!',
          'author.required' => 'please write author name!',
          'event_date.required' => 'select a event date!',
          'event_image.required' => 'select a event image!',
        ]);

        Event::find($request->event_id)->update([
          'event_title' => $request->event_title,
          'event_description' => $request->event_description,
          'author' => $request->author,
          'event_date' => $request->event_date,
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
        ]);

        if($request->hasFile('event_image')){
          if(Event::find($request->event_id)->event_image !='default_event_image.jpg'){
            $nametodelete = Event::find($request->event_id)->event_image;
            unlink(base_path('public/uploads/event_img/'.$nametodelete));
          }
        }

        $uploaded_image = $request->event_image;
        $our_uploaded_img_extension = $uploaded_image->getClientOriginalExtension();
        $new_img_name = $request->event_id.'.'.$our_uploaded_img_extension;
        Image::make($uploaded_image)->resize(800, 533)->save(base_path('public/uploads/event_img/'.$new_img_name));

        Event::find($request->event_id)->update([
          'event_image' => $new_img_name,
        ]);

        return back()->with('edit_msg', 'Your Event update successfully!');
      }else{
        return redirect('/');
      }
    }
}
