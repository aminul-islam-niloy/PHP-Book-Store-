@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Edit Book</h1>

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $book->title }}" required>
        </div>

        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" name="author" class="form-control" id="author" value="{{ $book->author }}" required>
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" name="price" class="form-control" id="price" value="{{ $book->price }}" required>
        </div>

        <div class="form-group">
            <label for="isbn">ISBN:</label>
            <input type="text" name="isbn" class="form-control" id="isbn" value="{{ $book->isbn }}" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Update Book</button>
    </form>
</div>
@endsection
