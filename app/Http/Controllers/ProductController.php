<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Subcategory;
use App\Pricerange;
use Carbon\Carbon;
use Auth;
use Image;
class ProductController extends Controller
{
  // if(Auth::user()->role == 2){
  //
  // }else{
  //   return redirect('/');
  // }

    function view_product(){
      if(Auth::user()->role == 2){
        $categories = Category::all();
        $sub_categories = Subcategory::all();
        return view('products/productview', compact('categories', 'sub_categories'));
      }else{
        return redirect('/');
      }
    }

    function productviewlist(){
      if(Auth::user()->role == 2){
        $products = Product::paginate(3);
        $deleted_products = Product::onlyTrashed()->get();
        return view('products/productviewlist', compact('products', 'deleted_products'));
      }else{
        return redirect('/');
      }
    }

    function insert_product(Request $request){
      if(Auth::user()->role == 2){
        $request->validate([
          'category_id' => 'required',
          'subcategory_id' => 'required',
          'product_name' => 'required',
          'product_price' => 'required|numeric|min:1',
          'product_quantity' => 'required|numeric|min:1',
          'alert_quantity' => 'required|numeric|min:1',
          'product_image' => 'required',
        ],[
          'category_id.required' => 'please select your categroy name!',
          'subcategory_id.required' => 'please select your Sub categroy name!',
          'product_name.required' => 'product name must be required!',
          'product_price.required' => 'product price must be required!',
          'product_price.numeric' => 'product price must be a number!',
          'product_price.min' => 'product price value start at least 1!',
          'product_quantity.required' => 'product quantity must be required!',
          'alert_quantity.required' => 'alert quantity must be required!',
          'product_image.required' => 'please select your product image',
        ]);

        $lastinsertedid = Product::insertGetId([
          'category_id' => $request->category_id,
          'subcategory_id' => $request->subcategory_id,
          'product_name' => $request->product_name,
          'product_price' => $request->product_price,
          'product_description' => $request->product_description,
          'product_quantity' => $request->product_quantity,
          'alert_quantity' => $request->alert_quantity,
          'created_at' => Carbon::now(),
        ]);

        if($request->hasFile('product_image')){
          $uploaded_image = $request->product_image;
          $our_uploaded_img_extension = $uploaded_image->getClientOriginalExtension();
          $new_img_name = $lastinsertedid.'.'.$our_uploaded_img_extension;
          Image::make($uploaded_image)->resize(600, 750)->save(base_path('public/uploads/product_img/'.$new_img_name));

          Product::find($lastinsertedid)->update([
            'product_image' => $new_img_name,
          ]);
        }
        return back()->with('message', 'Your product added successfully');
      }else{
      return redirect('/');
      }
    }


    function delete_product($product_id){
      if(Auth::user()->role == 2){
        Product::findOrFail($product_id)->delete();
        return back()->with('delete_message', "Your Product Deleted Successfully");
      }else{
        return redirect('/');
      }
    }

    // price range
    function productspricerange(){

      $all_price_ranges = Pricerange::paginate(5);
      return view('products/productspricerange', compact('all_price_ranges'));
    }

    function productpricerangeinsert(Request $request){


      if(Auth::user()->role == 2){
        $request->validate([
          'price_from' => 'required|numeric|min:1',
          'price_to' => 'required|numeric|min:1',
        ],[
          'price_from.required' => 'please select product price range!',
          'price_to.required' => 'please select product price range!',
        ]);

        Pricerange::insert([
          'price_from' => $request->price_from,
          'price_to' => $request->price_to,
          'created_at' => Carbon::now(),
        ]);
        return back()->with('message', 'Your product price range added successfully!');
      }else{
        return view('errors/404');
      }
    }

    function pricerangedelete($delete_id){

      if(Auth::user()->role == 2){
        Pricerange::find($delete_id)->delete();
        return back()->with('delete_msg', 'Your product price range Deleted successfully!');
      }else{
        return view('errors/404');
      }
    }

    function pricerangeedit($edit_id){
      if(Auth::user()->role == 2){
        $single_price_range_info = Pricerange::findOrFail($edit_id);
        return view('products/price_range_edit', compact('single_price_range_info'));
      }else{
        return view('errors/404');
      }
    }

    function pricerangeeditinsert(Request $request){
      if(Auth::user()->role == 2){
        $request->validate([
          'price_from' => 'required|numeric|min:1',
          'price_to' => 'required|numeric|min:1',
        ],[
          'price_from.required' => 'please select product price range!',
          'price_to.required' => 'please select product price range!',
        ]);

        Pricerange::findOrFail($request->price_range_id)->update([
          'price_from' => $request->price_from,
          'price_to' => $request->price_to,
        ]);
        return back()->with('edit_msg', 'price range update successfully!..');
      }else{
        return view('errors/404');
      }
    }

    function edit_product($product_id){
      if(Auth::user()->role == 2){
        $single_products = Product::findOrFail($product_id);
        $sub_category_id = Product::findOrFail($product_id)->subcategory_id;
        $sub_category_name = Subcategory::find($sub_category_id)->sub_category_name;
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('products/product_edit', compact('single_products', 'categories', 'subcategories', 'sub_category_name', 'sub_category_id'));
      }else{
        return redirect('/');
      }
    }

    function edit_insert_product(Request $request){
      if(Auth::user()->role == 2){
        $request->validate([
          'category_id' => 'required',
          'subcategory_id' => 'required',
          'product_name' => 'required',
          'product_price' => 'required|numeric|min:1',
          'product_quantity' => 'required|numeric|min:1',
          'alert_quantity' => 'required|numeric|min:1',
          'product_image' => 'required',
        ],[
          'category_id.required' => 'please select your categroy name!',
          'subcategory_id.required' => 'please select your Sub categroy name!',
          'product_name.required' => 'product name must be required!',
          'product_price.required' => 'product price must be required!',
          'product_price.numeric' => 'product price must be a number!',
          'product_price.min' => 'product price value start at least 1!',
          'product_quantity.required' => 'product quantity must be required!',
          'alert_quantity.required' => 'alert quantity must be required!',
          'product_image.required' => 'please select your product image',
        ]);

        Product::find($request->product_id)->update([
          'category_id' => $request->category_id,
          'subcategory_id' => $request->subcategory_id,
          'product_name' => $request->product_name,
          'product_price' => $request->product_price,
          'product_description' => $request->product_description,
          'product_quantity' => $request->product_quantity,
          'alert_quantity' => $request->alert_quantity,
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
        ]);

        if($request->hasFile('product_image')){
          if(Product::find($request->product_id)->product_image !='default_product_image.jpg'){
            $nametodelete = Product::find($request->product_id)->product_image;
            unlink(base_path('public/uploads/product_img/'.$nametodelete));
          }
        }

        $uploaded_image = $request->product_image;
        $our_uploaded_img_extension = $uploaded_image->getClientOriginalExtension();
        $new_img_name = $request->product_id.'.'.$our_uploaded_img_extension;
        Image::make($uploaded_image)->resize(600, 750)->save(base_path('public/uploads/product_img/'.$new_img_name));

        Product::find($request->product_id)->update([
          'product_image' => $new_img_name,
        ]);

        return back()->with('edit_msg', 'Your Product update successfully!');
      }else{
        return redirect('/');
      }
    }

    function product_restore($deleted_product_id){
      if(Auth::user()->role == 2){
        Product::onlyTrashed()->find($deleted_product_id)->restore();
        return back()->with('restore_msg', 'Your Product again stored..');
      }else{
        return redirect('/');
      }
    }

    function product_parmanet_delete($deleted_product_id){
      if(Auth::user()->role == 2){
        $p_image_name =  Product::onlyTrashed()->findOrFail($deleted_product_id)->product_image;
        if($p_image_name != 'default_product_image.jpg'){
          unlink(base_path('public/uploads/product_img/'.$p_image_name));
        }
        Product::onlyTrashed()->findOrFail($deleted_product_id)->forceDelete();
        return back()->with('par_delete', 'your product is permanently deleted!..');
      }else{
        return redirect('/');
      }
    }
}
