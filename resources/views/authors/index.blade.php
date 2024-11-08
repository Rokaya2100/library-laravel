@extends('layouts.admin')
@section('content')
<div class="container">
<div class="d-flex justify-content-between" style="color:#f8b806e5;">
    <a  href="{{ route('authors.create') }}"><button class="btn btn-primary">Add Author</button></a>
    <h2>The Authors</h2>
    <a  href="{{ route('authors.archive') }}"><button class="btn btn-primary">Archive Authors</button></a>
</div>
<div class="col-12 fs-5 mt-3">
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Books</th>
                <th>Added Date</th>
                <th>Updated Date</th>
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
            @foreach($authors as $author)
            @php
                $i++;
            @endphp
            <tr>   
                <td>{{ $i}}</td>
                <td>{{ $author->name }}</td>
                <td>{{ $author->email }}</td>
                <td>
                    @foreach($author->books as $book)
                    {{ $book->title }}<br>
                    @endforeach
                </td>
                <td>{{ $author->created_at }}</td>
                <td>{{ $author->updated_at }}</td>
                <td>
                    <a href="{{ route('authors.show',$author->id) }}"><button class="btn btn-success">Show</button></a>
                </td>
                <td>
                    <a href="{{ route('authors.edit',$author->id) }}"><button class="btn btn-primary">Edit</button></a>
                </td>
                <td>
                    <form action="{{ route('authors.softdelete',$author->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-warning" style="color: white; margin=0;" name="Archive">Archive</button>
                    </form>
                </td>
                <td>
                    <a href="{{ route('authors.forceDelete',$author->id) }}"><button class="btn btn-danger">Delete</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>                    
</div>
@endsection