<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

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
}
