<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
        ]);
        $author = Category::create([
            'name'  => $request->name,
        ]);

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $category = Category::findOrFail($category->id);
        return view('categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $category = Category::findOrFail($category->id);
        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category = Category::findOrFail($category->id);
        $request->validate([
            'name'  => 'required',
        ]);
        $category->update([
            'name'  => $request->name,
        ]);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function softDelete(Category $category)
    {
        $category = Category::findOrFail($category->id);
        $category->delete();
        return redirect()->route('categories.index');
    }
    public function archive()
    {
        $categories = Category::onlyTrashed()->get();
        return view('categories.archive',compact('categories'));
    }
    public function restore($id)
    {
        Category::withTrashed()->where('id',$id)->restore();
        return redirect()->route('categories.archive');
    }
    public function forceDelete($id)
    {
        Category::withTrashed()->where('id',$id)->forceDelete();
        return redirect()->back();
    }
}