<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors    = Author::all();
        $categories = Category::all();
        return view('books.create',compact('authors','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'           => 'required',
            'description'     => 'required',
            /* 'author_id'       => 'required|exist:authors,id',
            'categories_id'   => 'required|array',
            'categories_id.*' => 'integer|exist:categories,id' */
        ]);
        $book = Book::create([
            'title'       => $request->title,
            'description' => $request->description,
            'author_id'   => $request->author_id,
        ]);

        $book->categories()->sync($request->categories_ids);
        
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $book = Book::findOrFail($book->id);
        return view('books.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $book = Book::findOrFail($book->id);
        $authors    = Author::all();
        $categories = Category::all();
        $selected = $book->categories->pluck('id')->toArray();
        return view('books.edit',compact('book','authors','categories','selected'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $book = Book::findOrFail($book->id);
        $request->validate([
            'title'       => 'required',
            'description' => 'required',
            'author_id'   => 'required',
        ]);attributes: 
        $book->update([
            'title'       =>$request->title,
            'description'  =>$request->description,
            'author_id'    =>$request->author_id,
            'categories_id'=>$request->categories_ids
        ]);

        $book->categories()->sync($request->categories_ids);
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function softDelete(Book $book)
    {
        $book = Book::findOrFail($book->id);
        $book->delete();
        return redirect()->route('books.index');
    }
    public function archive()
    {
        $books = Book::onlyTrashed()->get();
        return view('books.archive',compact('books'));
    }
    public function restore($id)
    {
        Book::withTrashed()->where('id',$id)->restore();
        return redirect()->route('books.archive');
    }
    public function forceDelete($id)
    {
        Book::withTrashed()->where('id',$id)->forceDelete();
        return redirect()->back();
    }
}
