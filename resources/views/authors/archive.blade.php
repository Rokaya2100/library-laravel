@extends('layouts.admin')
@section('content')
<div class="container">
<div class="d-flex justify-content-between" style="color:#f8b806e5;">
    <div class="flex-container">
        <a class="btn btn-primary" href="{{ route('authors.index') }}">Back</a>
    </div>
    <h2 class="m-auto">Archice The Authors</h2>
</div>
<div class="col-12 fs-5 mt-3">
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Added Date</th>
                <th>Deleted Date</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 0;
            @endphp
            @foreach($authors as $author)
            @php
                $i++;
            @endphp
            <tr>   
                <td>{{ $i}}</td>
                <td>{{ $author->name }}</td>
                <td>{{ $author->email }}</td>
                <td>{{ $author->created_at }}</td>
                <td>{{ $author->deleted_at }}</td>
                <td>
                    <form action="{{ route('authors.restore',$author) }}" method="POST">
                        @csrf
                        <button class="btn btn-primary">Restore</button></a>
                    </form>
                </td>
                <td>
                    <form action="{{ route('authors.forceDelete',$author->id) }}">
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