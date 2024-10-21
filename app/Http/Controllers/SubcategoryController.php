<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function add_subcategory()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.subcategory.add_subcategory', [
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }
    public function store_subcategory(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required|unique:subcategories',
        ]);
        if (Subcategory::where('category_id', $request->category_id)->where('subcategory_name', $request->subcategory_name)->exists()) {
            return back()->with('exist','Subcategory Already Exist in this Category!');
        } else {
            Subcategory::insert([
                'category_id' => $request->category_id,
                'Subcategory_name' => $request->subcategory_name,
                'created_at' => Carbon::now(),
            ]);
            return back();
        }
    }
    public function edit_subcategory($id)
    {
        $categories = Category::all();
        $subcategories = Subcategory::find($id);
        return view('admin.subcategory.edit_subcategory', [
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }
    public function update_subcategory(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required',
        ]);
        Subcategory::find($id)->update([
            'category_id' => $request->category_id,
            'Subcategory_name' => $request->subcategory_name,
            'updated_at' => Carbon::now(),
        ]);
        return back()->with('updated', 'Subcategory Updated');
    }
    public function delete_subcategory($id)
    {
        Subcategory::find($id)->delete();
        return back()->with('deleted', 'Deleted Successfully');
    }
}
