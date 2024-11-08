@extends('layouts.admin')
@section('content')
<div class="container">

<div class="d-flex justify-content-between" style="color:#f8b806e5;">
    <div class="flex-container">
        <a class="btn btn-primary" href="{{ route('categories.index') }}">Back</a>
    </div>
    <h2 class="m-auto">Archice The Categories</h2>
</div>
<div class="col-12 fs-5 mt-3">
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Date added</th>
                <th>Date deleted</th>
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
                <td>{{ $category->deleted_at }}</td>
                <td>
                    <form action="{{ route('categories.restore',$category) }}" method="POST">
                        @csrf
                        <button class="btn btn-primary">Restore</button></a>
                    </form>
                </td>
                <td>
                    <form action="{{ route('categories.forceDelete',$category->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>                    
</div>
@endsection