<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use Image;

class BannerController extends Controller
{
    function banneraddview(){
      $banners = Banner::paginate();
      return view('banner/banneraddview', compact('banners'));
    }

    function bannerinsert(Request $request){
      $request->validate([
        'banner_title'=> 'required',
        'banner_img'=> 'required'
      ],[
        'banner_title.required' => 'Banner title field is required!',
        'banner_img.required' => 'please select your Banner image!'
      ]);

    $lastinsertedid = Banner::insertGetId([
        'banner_title' => $request->banner_title,
      ]);

      if($request->hasFile('banner_img')){
        $uploaded_image = $request->banner_img;
        $our_uploaded_img_extension = $uploaded_image->getClientOriginalExtension();
        $new_img_name = $lastinsertedid.'.'.$our_uploaded_img_extension;
        Image::make($uploaded_image)->resize(1920, 1409)->save(base_path('public/uploads/banner_img/'.$new_img_name));

        Banner::find($lastinsertedid)->update([
          'banner_img' => $new_img_name,
        ]);
      }
      return back()->with('message', 'Your Banner image uploaded successfully');

    }

    function bannerdelete($banner_id){
      Banner::findOrFail($banner_id)->delete();
      return back()->with('delete_msg', 'your banner content deleted successfully!');
    }

    function bannerupdate($banner_id){
      $single_banner = Banner::findOrFail($banner_id);
      return view('banner/bannerupdate', compact('single_banner'));
    }

    function updatebannerinsert(Request $request){

      $request->validate([
        'banner_title'=> 'required',
        'banner_img'=> 'required'
      ],[
        'banner_title.required' => 'Banner title field is required!',
        'banner_img.required' => 'please select your Banner image!'
      ]);

      Banner::find($request->banner_id)->update([
        'banner_title' => $request->banner_title,
      ]);

      if($request->hasFile('banner_img')){
        if(Banner::find($request->banner_id)->banner_img !='default_banner_img.jpg'){
          $nametodelete = Banner::find($request->banner_id)->banner_img;
          unlink(base_path('public/uploads/banner_img/'.$nametodelete));
        }
      }

      $uploaded_image = $request->banner_img;
      $our_uploaded_img_extension = $uploaded_image->getClientOriginalExtension();
      $new_img_name = $request->banner_id.'.'.$our_uploaded_img_extension;
      Image::make($uploaded_image)->resize(1920, 1409)->save(base_path('public/uploads/banner_img/'.$new_img_name));

      Banner::find($request->banner_id)->update([
        'banner_img' => $new_img_name,
      ]);

      return back()->with('edit_msg', 'Your Banner update successfully!');
    }
}
