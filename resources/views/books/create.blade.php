@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Add Book</h1>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Enter book title" required>
        </div>

        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" name="author" class="form-control" id="author" placeholder="Enter author name" required>
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" name="price" class="form-control" id="price" placeholder="Enter book price" required>
        </div>

        <div class="form-group">
            <label for="isbn">ISBN:</label>
            <input type="text" name="isbn" class="form-control" id="isbn" placeholder="Enter ISBN" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Add Book</button>
    </form>
</div>
@endsection
