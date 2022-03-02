<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = [
            'page' => 'index',
            'categories' => Category::orderBy('created_at', 'desc')->get()
        ];

        return view('backend.category.index', compact('data'));
    }

    public function create()
    {
        $data = [
            'page' => 'create',
            'categories' => Category::orderBy('created_at', 'desc')->get()
        ];

        return view('backend.category.index', compact('data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = str_replace(' ', '-', strtolower($request->name));
        if($request->cat_id){
            $category->cat_id = $request->cat_id;
        }
        $category->save();
        return redirect()->back()->with('success', 'Category has been created.');
    }

    public function edit(Category $category)
    {
        $data = [
            'page' => 'edit',
            'categories' => Category::orderBy('created_at', 'desc')->get()
        ];

        return view('backend.category.index', compact('data', 'category'));
    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $category->name = $request->name;
        $category->slug = str_replace(' ', '-', strtolower($request->name));
        if($request->cat_id){
            $category->cat_id = $request->cat_id;
        }
        $category->save();
        return redirect()->back()->with('success', 'Category has been updated.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('success', 'Category has been successfuly deleted.');
    }
}
