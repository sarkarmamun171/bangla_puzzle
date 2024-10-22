<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Models\Product;
use Carbon\Carbon;
class ProductController extends Controller
{
    public function index(){
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.product.index',[
            'categories'=>$categories,
            'subcategories'=>$subcategories,
        ]);
    }
    public function getSubcategory(Request $request){
        // echo $request->category_id;
         $str = '<option value="">Select Category</option>';
         $subcategories  = Subcategory::where('category_id',$request->category_id)->get();
        foreach ($subcategories as $subcategory) {
           // echo $subcategory;
              $str .='<option value="'.$subcategory->id.'">'.$subcategory->Subcategory_name.'</option>';
         }
         echo $str;
      }
      public function store_product(Request $request){
        $request->validate([
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'product_name'=>'required',
            'price'=>'required',
            'long_desp'=>'required',
            'preview_img'=>'required|image',
        ]);
        $preview = $request->preview_img;
        $extension = $preview->extension();
        $file_name = Str::lower(str_replace(' ','-',$request->product_name))."-".random_int(100000, 900000)."." .$extension;
        Image::make($preview)->save(public_path('uploads/product/preview/'.$file_name));

         Product::insert([
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'product_name'=>$request->product_name,
            'price'=>$request->price,
            'discount'=>$request->discount,
            'after_discount'=>$request->price - ($request->price * $request->discount/100),
            'short_desp'=>$request->short_desp,
            'long_desp'=>$request->long_desp,
            'preview_img'=>$file_name,
            'slug'=>Str::lower(str_replace(' ','-',$request->product_name))."-".random_int(10000000, 90000000),
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success','Product Inserted Siccessfully');
      }
      public function list_product(){
        $products = Product::all();
        return view('admin.product.product_list',[
            'products'=>$products,
        ]);
      }
      public function edit_product($id){
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $products = Product::find($id);
        return view('admin.product.edit_product',[
            'categories'=>$categories,
            'subcategories'=>$subcategories,
            'products'=>$products,
        ]);
      }
      public function getSubcategory2(Request $request){
        $str = '<option value="">Select Sub Category</option>';
        $subcategories = Subcategory::where('category_id', $request->category_id)->get();
        foreach($subcategories as $subcategory){
            $str .= '<option value="'.$subcategory->id.'">'.$subcategory->Subcategory_name.'</option>';
        }
        echo $str;
      }
      public function update_product(Request $request,$id){
        //image niya kaz korte hobe
        // $preview = $request->preview_img;
        // $extension = $preview->extension();
        // $file_name = Str::lower(str_replace(' ','-',$request->product_name))."-".random_int(100000, 900000)."." .$extension;
        // Image::make($preview)->save(public_path('uploads/product/preview/'.$file_name));

         Product::find($id)->update([
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'product_name'=>$request->product_name,
            'price'=>$request->price,
            'discount'=>$request->discount,
            'after_discount'=>$request->price - ($request->price * $request->discount/100),
            'short_desp'=>$request->short_desp,
            'long_desp'=>$request->long_desp,
            // 'preview_img'=>$file_name,
            'slug'=>Str::lower(str_replace(' ','-',$request->product_name))."-".random_int(10000000, 90000000),
            'updated_at'=>Carbon::now(),
        ]);
        return back()->with('success','Product Updated Successfully');
      }
      public function delete_product($id){
        Product::find($id)->delete();
        return back()->with('delete','Product Deleted Successfully');
      }
}
