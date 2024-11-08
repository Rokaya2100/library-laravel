@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="d-flex" style="color:#f8b806e5;">
        <a href="{{ route('authors.index') }}"><button class="btn btn-primary ml-0">Back</button></a>
        <h2 class="m-auto">Show The Author</h2>
    </div>
        <div class="inputField mt-4">
        <div class="form-group mt-2">
            <h5>Author Name:</h5>
            <input disabled type="text" class="form-control" name="name" value="{{ $author->name }}" class="@error('name') is-invalid @enderror">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mt-2">
            <h5>Author Email:</h5>
            <input disabled type="text" class="form-control" name="email" value="{{ $author->email }}" class="@error('email') is-invalid @enderror">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <h5>The Books: </h5>
                @if($author->books->count())
                @foreach($author->books as $book)
                <input disabled type="text" class="form-control" value="{{ $book->title }}">
                @endforeach   
                @endif
                @if($author->books->isEmpty())                
                <input disabled type="text" class="form-control" placeholder="No Book">
                @endif
                
        </div>
        <div class="d-flex justify-content-start mt-4">
            <a href="{{ route('authors.edit',$author->id) }}"><button class="btn btn-primary btn-lg">Edit</button></a>
            <form action="{{ route('authors.softdelete',$author->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-warning btn-lg mx-3" style="color: white" name="Archive">Archive</button>
            </form>
           <form action="{{ route('authors.forceDelete',$author->id) }}" method="POST">
                @method('DELETE') 
                @csrf
                <button class="btn btn-danger btn-lg mr-3">Delete</button>
            </form>
        </div>
        </div>
</div>
@endsection