@extends('layouts.admin')
@section('content')
<div class="container">
<div class="d-flex justify-content-between" style="color:#f8b806e5;">
    <a  href="{{ route('categories.create') }}"><button class="btn btn-primary">Add Category</button></a>
    <h2>The Categories</h2>
    <a  href="{{ route('categories.archive') }}"><button class="btn btn-primary">Archive Categories</button></a>
</div>
<div class="col-12 fs-5 mt-3">
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Date added</th>
                <th>Date updated</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 0;
            @endphp
            @foreach($categories as $category)
            @php
                $i++;
            @endphp
            <tr>   
                <td>{{ $i}}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->created_at }}</td>
                <td>{{ $category->updated_at }}</td>
                <td>
                    <a href="{{ route('categories.show',$category->id) }}"><button class="btn btn-success">Show</button></a>
                </td>
                <td>
                    <a href="{{ route('categories.edit',$category->id) }}"><button class="btn btn-primary">Edit</button></a>
                </td>
                <td>
                    <form action="{{ route('categories.softdelete',$category->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-warning" style="color: white; margin=0;" name="Archive">Archive</button>
                    </form>
                </td>
                <td>
                    <a href="{{ route('categories.forceDelete',$category->id) }}"><button class="btn btn-danger">Delete</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>                    
</div>
@endsection