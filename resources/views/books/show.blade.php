@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">{{ $book->title }}</h1>
            <p class="card-text"><strong>Author:</strong> {{ $book->author }}</p>
            <p class="card-text"><strong>Price:</strong> ${{ $book->price }}</p>
            <p class="card-text"><strong>ISBN:</strong> {{ $book->isbn }}</p>
            <a href="{{ route('books.index') }}" class="btn btn-primary">Back to Books</a>
        </div>
    </div>
</div>
@endsection
