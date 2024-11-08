@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="d-flex" style="color:#f8b806e5;">
        <a href="{{ route('authors.index') }}"><button class="btn btn-primary ml-0">Back</button></a>
        <h2 class="m-auto">Edit The Author</h2>
    </div>
    <form action="{{ route('authors.update',$author->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="inputField mt-4">
        <div class="form-group mt-2">
            <h5>Author Name:</h5>
            <input required type="text" class="form-control" name="name" value="{{ $author->name }}" class="@error('name') is-invalid @enderror">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mt-2">
            <h5>Author Email:</h5>
            <input required type="text" class="form-control" name="email" value="{{ $author->email }}" class="@error('email') is-invalid @enderror">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-flex justify-content-start mt-4">
            <button href="{{ route('authors.index') }}" type="submit" name="add" class="btn btn-warning btn-lg"> Update Author </button>
        </div>
        </div>
    </form>
</div>
@endsection