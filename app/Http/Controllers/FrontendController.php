<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;

class FrontendController extends Controller
{
    public function front_index(){
        $products = Product::all();
        return view('frontend.master',[
            'products'=>$products,
        ]);
    }
    public function index(){
        return view('frontend.index');
    }
    public function category_products($id){
        $categories = Category::find($id);
        $category_products = Product::where('category_id',$id)->get();
        return view('frontend.category_products',[
            'category_products'=>$category_products,
            'categories'=>$categories,
        ]);
    }
    public function subcategory_products($id){
        $subcategories = Subcategory::find($id);
        $subcategory_products = Product::where('subcategory_id',$id)->get();
        return view('frontend.subcategory_product',[
            'subcategory_products'=>$subcategory_products,
            'subcategories'=>$subcategories,
        ]);
    }
    public function product_detail($slug){
        $product_id = Product::where('slug',$slug)->first()->id;
        $product_details = Product::find($product_id);
        return view('frontend.product_details',[
            'product_details'=>$product_details,
        ]);
    }
}
