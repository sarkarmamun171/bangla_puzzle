<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
class CategoryController extends Controller
{
    public function add_category(){
        $categories = Category::paginate(10);
        return view('admin.category.add_category',[
            'categories'=>$categories,
        ]);
    }
    public function store_category(Request $request){
        $request->validate([
            'category_name'=>'required|unique:categories',
            'category_img'=>'required|image',
        ]);
        $img = $request->category_img;
        $extension = $img->extension();
        $file_name = Str::lower(str_replace(' ','-',$request->category_name))."-".random_int(100000, 900000)."." .$extension;
        Image::make($img)->save(public_path('uploads/category/'.$file_name));

        Category::insert([
            'category_name'=>$request->category_name,
            'category_img'=>$file_name,
            'created_at'=>Carbon::now(),
            // 'reviews'=>'good',
        ]);

        return back()->with('success','Category Added Successfully!');
    }
    public function edit_category($id){
        $category_info =Category::find($id);
        return view('admin.category.edit_category',[
            'category_info'=>$category_info,
        ]);
    }
    public function update_category(Request $request,$id){
        $category = Category::find($id);
        // print_r($id);
        if($request->category_img == ''){
            Category::find($request->category_id)->update([
                'category_name'=>$request->category_name,
                'created_at'=>Carbon::now(),
                // 'updated_at'=>Carbon::now(),
            ]);

            // return redirect()->route('category.edit')->with('update-success','Category Updated Successfully!');
            return back()->with('success','Category update Successfully!');
        }
        else{
            $current_img = public_path('uploads/category/'.$category->category_img);
            unlink($current_img);

            $img = $request->category_img;
            $extension = $img->extension();
            $file_name = Str::lower(str_replace(' ','-',$request->category_name))."-".random_int(100000, 900000)."." .$extension;
            Image::make($img)->save(public_path('uploads/category/'.$file_name));

            Category::find($request->category_id)->update([
                'category_img'=>$file_name,
                // 'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]);
            // return redirect()->route('category.edit')->with('success','Category Updated Successfully!');
            return back()->with('success','Category update Successfully!');
        }
    }
    public function delete_category($id){
        Category::find($id)->delete();
        return back()->with('delete','Deleted Successfully');
    }
}
