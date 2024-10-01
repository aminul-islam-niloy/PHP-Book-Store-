@extends('layouts.app')

@section('content')
<h1>{{ $book->title }}</h1>
<p>Author: {{ $book->author }}</p>
<p>Price: {{ $book->price }}</p>
<p>ISBN: {{ $book->isbn }}</p>
<a href="{{ route('books.index') }}">Back to Books</a>
@endsection
