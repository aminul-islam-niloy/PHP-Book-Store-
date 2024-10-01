@extends('layouts.app')

@section('content')
<h1>Add Book</h1>

<form action="{{ route('books.store') }}" method="POST">
    @csrf
    <label>Title:</label>
    <input type="text" name="title">
    <label>Author:</label>
    <input type="text" name="author">
    <label>Price:</label>
    <input type="text" name="price">
    <label>ISBN:</label>
    <input type="text" name="isbn">
    <button type="submit">Add Book</button>
</form>
@endsection
