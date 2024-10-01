@extends('layouts.app')

@section('content')
<h1>Edit Book</h1>

<form action="{{ route('books.update', $book->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Title:</label>
    <input type="text" name="title" value="{{ $book->title }}">
    <label>Author:</label>
    <input type="text" name="author" value="{{ $book->author }}">
    <label>Price:</label>
    <input type="text" name="price" value="{{ $book->price }}">
    <label>ISBN:</label>
    <input type="text" name="isbn" value="{{ $book->isbn }}">
    <button type="submit">Update Book</button>
</form>
@endsection
