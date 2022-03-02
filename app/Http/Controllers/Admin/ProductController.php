<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data = [
            'page' => 'index',
            'products' => Product::orderBy('created_at', 'desc')->get()
        ];

        return view('backend.product.index', compact('data'));
    }

    public function create()
    {
        $data = [
            'page' => 'create',
            'brands' => Brand::orderBy('created_at', 'desc')->get(),
            'categories' => Category::orderBy('created_at', 'desc')->get(),
        ];

        return view('backend.product.index', compact('data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'sub_cat_id' => 'required|integer',
            'brand_id' => 'required|integer',
            'price' => 'required',
            'qty' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'images' => 'required|image',
        ]);

        if($request->hasfile('images'))
         {
            foreach($request->file('images') as $file)
            {
                $name = time().'.'.$file->extension();
                $file->move(public_path().'/products/', $name);
                $data[] = $name;
            }
         }

        $product = new Product();
        $product->name = $request->name;
        $product->sub_cat_id = $request->sub_cat_id;
        $product->brand_id = $request->brand_id;
        $product->price = $request->price;
        if($request->discount_price){
           $product->discount_price = $request->discount_price;
        }
        $product->qty = $request->qty;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->images = json_encode($data);
        $product->save();
        return redirect()->back()->withSuccess('Product has been successfully created.');
    }

    public function edit(Product $product, Brand $brand, Category $category)
    {
        $data = [
            'page' => 'edit',
            'brands' => Brand::orderBy('created_at', 'desc')->get(),
            'categories' => Category::orderBy('created_at', 'desc')->get(),
        ];

        return view('backend.product.index', compact('data', 'brand', 'product', 'category'));
    }

    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'name' => 'required',
            'sub_cat_id' => 'required|integer',
            'brand_id' => 'required|integer',
            'price' => 'required',
            'qty' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
        ]);

        if($request->hasfile('images'))
         {
            foreach($request->file('images') as $file)
            {
                $name = time().'.'.$file->extension();
                $file->move(public_path().'/products/', $name);
                $data[] = $name;
            }
         }

        $product->name = $request->name;
        $product->sub_cat_id = $request->sub_cat_id;
        $product->brand_id = $request->brand_id;
        $product->price = $request->price;
        if($request->discount_price){
           $product->discount_price = $request->discount_price;
        }
        $product->qty = $request->qty;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->images = json_encode($data);
        $product->save();
        return redirect()->back()->withSuccess('Product has been successfully updated.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->withSuccess('Product has been successfully deleted.');
    }
}
