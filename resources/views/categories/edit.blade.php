@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="d-flex" style="color:#f8b806e5;">
        <a href="{{ route('categories.index') }}"><button class="btn btn-primary ml-0">Back</button></a>
        <h2 class="m-auto">Edit The Category</h2>
    </div>
    <form action="{{ route('categories.update',$category->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="inputField mt-4">
        <div class="form-group mt-2">
            <h5>Category Name:</h5>
            <input required type="text" class="form-control" name="name" value="{{ $category->name }}" class="@error('name') is-invalid @enderror">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-flex justify-content-start mt-4">
            <button href="{{ route('categories.index') }}" type="submit" name="add" class="btn btn-warning btn-lg"> Update Category </button>
        </div>
        </div>
    </form>
</div>
@endsection