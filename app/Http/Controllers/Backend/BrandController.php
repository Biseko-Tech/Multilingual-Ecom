<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function BrandView()
    {
        $brands = Brand::latest()->get();
        return view('backend.brand.brand-view', compact('brands'));
    }

    public function BrandStore(Request $request)
    {
        $request->validate([
            'brand_name_en' => 'required|string',
            'brand_name_sw' => 'required|string',
            'brand_image' => 'required'
        ], [
            'brand_name_en.required' => 'English brand name is required',
            'brand_name_sw.required' => 'Swahili brand name is required',
        ]);

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/brand-images/' . $name_gen);

        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_sw' => $request->brand_name_sw,
            'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
            'brand_slug_sw' => strtolower(str_replace(' ', '-', $request->brand_name_sw)),
            'brand_image' => $name_gen,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'The brand inserted successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function BrandEdit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('backend.brand.brand-edit', compact('brand'));
    }

    public function BrandUpdate(Request $request, $id)
    {
        $request->validate([
            'brand_name_en' => 'required|string',
            'brand_name_sw' => 'required|string',
        ], [
            'brand_name_en.required' => 'English brand name is required',
            'brand_name_sw.required' => 'Swahili brand name is required',
        ]);

        $brand = Brand::findOrFail($id);

        if ($request->file('brand_image') && $brand->brand_image) {
            @unlink(public_path('upload/brand-images/' . $brand->brand_image));
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/brand-images/' . $name_gen);

            Brand::findOrFail($id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_sw' => $request->brand_name_sw,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_sw' => strtolower(str_replace(' ', '-', $request->brand_name_sw)),
                'brand_image' => $name_gen,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'The brand updated successfully',
                'alert-type' => 'info',
            );
        } else {
            Brand::findOrFail($id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_sw' => $request->brand_name_sw,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_sw' => strtolower(str_replace(' ', '-', $request->brand_name_sw)),
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'The brand updated successfully',
                'alert-type' => 'info',
            );
        }

        return redirect()->route('all.brand')->with($notification);
    }

    public function BrandDelete($id)
    {
        $brand = Brand::findOrFail($id);
        $image = public_path('upload/brand-images/');
        @unlink($image . $brand->brand_image);

        Brand::findOrFail($id)->delete();
        $notification = array(
            'message' => 'The brand deleted successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    }
}
