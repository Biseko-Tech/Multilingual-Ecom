<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\SubSubCategory;

class SubCategoryController extends Controller
{
    public function SubCategoryView()
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::latest()->get();
        return view('backend.category.subcategory-view', compact('categories', 'subcategory'));
    }

    public function SubCategoryStore(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_sw' => 'required',
        ], [
            'subcategory_name_en.required' => 'English subcategory name is required',
            'subcategory_name_sw.required' => 'Swahili subcategory name is required',
            'category_id.required' => 'Category selection is required',
        ]);

        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_sw' => $request->subcategory_name_sw,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_sw' => strtolower(str_replace(' ', '-', $request->subcategory_name_sw)),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'The subcategory inserted successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function SubCategoryEdit($id)
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.category.subcategory-edit', compact('categories', 'subcategory'));
    }

    public function SubCategoryUpdate(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_sw' => 'required',
        ], [
            'subcategory_name_en.required' => 'English subcategory name is required',
            'subcategory_name_sw.required' => 'Swahili subcategory name is required',
            'category_id.required' => 'Category selection is required',
        ]);

        SubCategory::findOrFail($id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_sw' => $request->subcategory_name_sw,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_sw' => strtolower(str_replace(' ', '-', $request->subcategory_name_sw)),
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'The subcategory updated successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.subcategory')->with($notification);
    }

    public function SubCategoryDelete($id)
    {
        SubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'The subcategory deleted successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    }


    //////////////////// METHODS FOR SUB-SUBCATEGORY \\\\\\\\\\\\\\\\\\\\\\\
    public function SubSubCategoryView()
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subsubcategory = SubSubCategory::latest()->get();
        return view('backend.category.sub-subcategory-view', compact('categories', 'subsubcategory'));
    }

    public function GetSubCategory($category_id)
    {
        $subcat = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name_en', 'ASC')->get();
        return json_encode($subcat);
    }

    public function SubSubCategoryStore(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_sw' => 'required',
        ], [
            'subsubcategory_name_en.required' => 'English sub-sub category name is required',
            'subsubcategory_name_sw.required' => 'Swahili sub-sub category name is required',
            'category_id.required' => 'Category selection is required',
            'subcategory_id.required' => 'Subcategory selection is required',
        ]);

        SubSubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_sw' => $request->subsubcategory_name_sw,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_sw' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_sw)),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'The sub-subcategory inserted successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function SubSubCategoryEdit($id)
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name_en', 'ASC')->get();
        $subsubcategory = SubSubCategory::findOrFail($id);
        return view('backend.category.sub-subcategory-edit', compact('categories', 'subcategories', 'subsubcategory'));
    }

    public function SubSubCategoryUpdate(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_sw' => 'required',
        ], [
            'subsubcategory_name_en.required' => 'English sub-sub category name is required',
            'subsubcategory_name_sw.required' => 'Swahili sub-sub category name is required',
            'category_id.required' => 'Category selection is required',
            'subcategory_id.required' => 'Subcategory selection is required',
        ]);

        SubSubCategory::findOrFail($id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_sw' => $request->subsubcategory_name_sw,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_sw' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_sw)),
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'The sub-subcategory updated successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.subsubcategory')->with($notification);
    }

    public function SubSubCategoryDelete($id)
    {
        SubSubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'The sub-subcategory deleted successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    }
}
