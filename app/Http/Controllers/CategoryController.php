<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Category;
use App\Subcategory;
use Carbon\Carbon;
use Auth;
class CategoryController extends Controller
{

    //add view categoryview
    function categoryview(){
      if(Auth::user()->role == 2){
        $categories = Category::paginate(5);
        $all_categories = Category::all();
        $all_sub_categories = Subcategory::paginate(5);
        return view('category/categoryview', compact('categories', 'all_categories', 'all_sub_categories'));
      }else{
        return view('errors/404');
      }
    }

    // insert category

    function categoryinsert(Request $request){
      if(Auth::user()->role == 2){
        $request->validate([
          'category_name'=>'required|unique:categories,category_name',
        ],[
          'category_name.required' => 'Category name field must be required',
          'category_name.unique' => 'This Category name already taken!',
        ]);

        Category::insert([
          'category_name' => $request->category_name,
          'created_at' => Carbon::now(),
        ]);
        return back()->with('message', 'Your Category added successfully!');
      }else{
        return view('errors/404');
      }
    }

    function subcategoryinsert(Request $request){
      if(Auth::user()->role == 2){
        $request->validate([
          'category_id'=>'required',
          'sub_category_name'=>'required'
        ],[
          'category_id.required' => 'Please Select Parent Category!',
          'sub_category_name.required' => 'sub category field is required!',
        ]);

        Subcategory::insert([
          'category_id' => $request->category_id,
          'sub_category_name' => $request->sub_category_name,
          'created_at' => Carbon::now(),
        ]);
        return back()->with('sub_category_message', 'Your Sub Category added successfully!');
      }else{
        return view('errors/404');
      }
    }

    // category ediv viwe

    function categoryeditview($category_id){
      if(Auth::user()->role == 2){
        $single_category_info = Category::findOrFail($category_id);
        return view('category/category_edit_view', compact('single_category_info'));
      }else{
        return view('errors/404');
      }
    }


    function categoryeditinsert(Request $request){
      if(Auth::user()->role == 2){

        $request->validate([
          'category_name'=>'required|unique:categories,category_name',
        ],[
          'category_name.required' => 'Category name field must be required',
          'category_name.unique' => 'This Category name already taken!',
        ]);

        Category::findOrFail($request->category_id)->update([
          'category_name' => $request->category_name,
        ]);
        return back()->with('edit_msg', 'category name update successfully!..');
      }else{
        return view('errors/404');
      }
    }



    function subcategoryedit($category_id){
      if(Auth::user()->role == 2){
        $single_sub_category_info = Subcategory::findOrFail($category_id);
        $all_categories = Category::all();
        return view('category/sub_category_edit_view', compact('single_sub_category_info', 'all_categories'));
      }else{
        return view('errors/404');
      }
    }

    function subcategoryeditinsert(Request $request){
      if(Auth::user()->role == 2){

        $request->validate([
          'category_name'=>'required',
          'sub_category_name'=>'required'
        ],[
          'category_name.required' => 'Please Select Parent Category!',
          'sub_category_name.required' => 'sub category field is required!',
        ]);

        Subcategory::findOrFail($request->sub_category_id)->update([
          'category_id' => $request->category_name,
          'sub_category_name' => $request->sub_category_name,
        ]);
        return back()->with('edit_msg', 'Sub category name update successfully!..');
      }else{
        return view('errors/404');
      }
    }



    //delete category_id

    function categorydelete($category_id){
      if(Auth::user()->role == 2){
        Category::findOrFail($category_id)->delete();
        return back()->with('delete_message', 'category deleted successfully!');
      }else{
        return view('errors/404');
      }
    }

    function subcategorydelete($category_id){
      if(Auth::user()->role == 2){
        Subcategory::findOrFail($category_id)->delete();
        return back()->with('sub_category_delete_message', 'Your Sub category deleted successfully!');
      }else{
        return view('errors/404');
      }
    }

    // get value json format sub category using ajax
    public function findsubWithcatId($id){

        // $subcategory = DB::table('subcategories')
        //                     ->where('category_id',$id)
        //                     ->get();

        $subcategory = Subcategory::where('category_id', $id)->get();

        return response()->json($subcategory);
    }
}
