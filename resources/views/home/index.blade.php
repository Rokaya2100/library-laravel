@extends('layouts.app')
@section('content')
<div class="container d-flex justify-content-start">
    <form action="{{ route('home.index') }}" method="get">
    <button href="" type="submit" name="" class="btn btn-warning active me-2">All Books</button>
    </form> 
    @foreach($categories as $category)
    <form action="{{ route('home.category',$category) }}" method="get">
    <button href="" type="submit" name="" class="btn btn-outline-warning me-2">{{ $category->name }}</button>
    </form>
    @endforeach
    </div>
<div class="container text-center mt-4">
    <div class="row row-cols-2">
        @foreach($books as $book)
        <div class="card col-4 m-3" style="width: 253px;">
            <div class="card-body">
              <h1><i class="bi bi-book"></i></h1>
              <h4 class="card-title" style="color: #f8b806e5">{{ $book->title }}</h4>
              <h6 style="color:rgb(80, 80, 80);"><i class="bi bi-pencil-square"></i>  {{ $book->author?->name}}</h6>
              <p class="card-text">{{ $book->description }}</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <i class="bi bi-tags"></i> 
                 @foreach($book->categories as $category)
                {{ $category->name }}<br>
                @endforeach
            </li>
              <li class="list-group-item">Added Date:<br>{{ $book->created_at }}</li>
            </ul>
            <div class="card-body">
              <a href="{{ route('home.show',$book->id) }}" class="card-link">Show the book</a>
            </div>
          </div>
          @endforeach
    </div>      
</div>
@endsection