<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $data = [
            'page' => 'index',
            'brands' => Brand::orderBy('created_at', 'desc')->get()
        ];

        return view('backend.brand.index', compact('data'));
    }

    public function create()
    {
        $data = [
            'page' => 'create',
            'brands' => Brand::orderBy('created_at', 'desc')->get()
        ];

        return view('backend.brand.index', compact('data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = str_replace(' ', '-', strtolower($request->name));
        $brand->save();
        return redirect()->back()->withSuccess('Brand has been successfully created.');
    }

    public function edit(Brand $brand)
    {
        $data = [
            'page' => 'edit',
            'brands' => Brand::orderBy('created_at', 'desc')->get()
        ];

        return view('backend.brand.index', compact('data', 'brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $brand->name = $request->name;
        $brand->slug = str_replace(' ', '-', strtolower($request->name));
        $brand->save();
        return redirect()->back()->withSuccess('Brand has been successfully updated.');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->back()->withSuccess('Brand has been successfully deleted.');
    }
}
