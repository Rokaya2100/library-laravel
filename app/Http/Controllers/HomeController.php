<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $authors = Author::all();
        $categories = Category::all();
        return view('home.index',compact('books','authors','categories'));
    }
    public function show(Book $book)
    {
        $book = Book::findOrFail($book->id);
        return view('home.show',compact('book'));
    }
    public function search(Request $request)
    {
        $search = $request->search;
        $categories = Category::all();
        $books = Book::where('title','LIKE','%'.$search.'%')->get();
        return view('home.index',compact('books','categories'));
    }
    public function searchCategory(Category $category)
    {
        $categories = Category::all();
        $books = $category->books;
        return view('home.index',compact('books','categories'));
    }
}
