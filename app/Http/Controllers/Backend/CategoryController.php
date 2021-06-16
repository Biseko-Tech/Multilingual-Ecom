<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function CategoryView()
    {
        $category = Category::latest()->get();
        return view('backend.category.category-view', compact('category'));
    }

    public function CategoryStore(Request $request)
    {
        $request->validate([
            'category_name_en' => 'required|string',
            'category_name_sw' => 'required|string',
            'category_icon' => 'required'
        ], [
            'category_name_en.required' => 'English category name is required',
            'category_name_sw.required' => 'Swahili category name is required',
        ]);

        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_sw' => $request->category_name_sw,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_sw' => strtolower(str_replace(' ', '-', $request->category_name_sw)),
            'category_icon' => $request->category_icon,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'The category inserted successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function CategoryEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.category-edit', compact('category'));
    }

    public function CategoryUpdate(Request $request, $id)
    {
        $request->validate([
            'category_name_en' => 'required|string',
            'category_name_sw' => 'required|string',
            'category_icon' => 'required'
        ], [
            'category_name_en.required' => 'English category name is required',
            'category_name_sw.required' => 'Swahili category name is required',
        ]);

        Category::findOrFail($id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_sw' => $request->category_name_sw,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_sw' => strtolower(str_replace(' ', '-', $request->category_name_sw)),
            'category_icon' => $request->category_icon,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'The category updated successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.category')->with($notification);
    }

    public function CategoryDelete($id)
    {

        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'The category deleted successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    }
}
