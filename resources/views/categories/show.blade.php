@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="d-flex" style="color:#f8b806e5;">
        <a href="{{ route('categories.index') }}"><button class="btn btn-primary ml-0">Back</button></a>
        <h2 class="m-auto">Show The Category</h2>
    </div>
        <div class="inputField mt-4">
        <div class="form-group mt-2">
            <h5>Category Name:</h5>
            <input disabled type="text" class="form-control" name="name" value="{{ $category->name }}" class="@error('name') is-invalid @enderror">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-flex justify-content-start mt-4">
            <a href="{{ route('categories.edit',$category->id) }}"><button class="btn btn-primary btn-lg">Edit</button></a>
            <form action="{{ route('categories.softdelete',$category->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-warning btn-lg mx-3" style="color: white" name="Archive">Archive</button>
            </form>
           <form action="{{ route('categories.forceDelete',$category->id) }}" method="POST">
                @method('DELETE') 
                @csrf
                <button class="btn btn-danger btn-lg mr-3">Delete</button>
            </form>
        </div>
        </div>
</div>
@endsection