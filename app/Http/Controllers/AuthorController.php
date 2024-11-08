<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();
        return view('authors.index',compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|unique:authors'
        ]);
        $author = Author::create([
            'name'  => $request->name,
            'email' => $request->email
        ]);

        return redirect()->route('authors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        $author = Author::findOrFail($author->id);
        return view('authors.show',compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        $author = Author::findOrFail($author->id);
        return view('authors.edit',compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $author = Author::findOrFail($author->id);
        $request->validate([
            'name'  => 'required',
            'email' => 'required',
        ]);
        $author->update([
            'name'  => $request->name,
            'email' => $request->email
        ]);
        return redirect()->route('authors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function softDelete(Author $author)
    {
        $author = Author::findOrFail($author->id);
        $author->books()->delete();
        $author->delete();
        return redirect()->route('authors.index');
    }
    public function archive()
    {
        $authors = Author::onlyTrashed()->get();
        return view('authors.archive',compact('authors'));
    }
    public function restore($id)
    {
        $author = Author::withTrashed()->findOrFail($id);
        $author->books()->withTrashed()->restore();
        $author->restore();
        return redirect()->route('authors.archive');
    }
    public function forceDelete($id)
    {
        $author = Author::withTrashed()->findOrFail($id);
        $author->forceDelete();
        return redirect()->back();
    }
}
