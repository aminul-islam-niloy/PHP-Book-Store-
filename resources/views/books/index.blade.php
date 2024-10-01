@extends('layouts.app')

@section('content')
<br>
<h3 style="margin-bottom: 15px;">Books</h3>

<a style="margin-bottom: 15px; display: inline-block;" href="{{ route('books.create') }}" class="btn btn-primary">Add New Book</a>

<table id="booksTable" class="table table-bordered" style="margin-top: 20px; border: 1px solid #dee2e6;">
    <thead style="background-color: #f8f9fa;">
        <tr>
            <th style="padding: 10px;">Id</th>
            <th style="padding: 10px;">Title</th>
            <th style="padding: 10px;">Author</th>
            <th style="padding: 10px;">Price</th>
            <th style="padding: 10px;">ISBN</th>
            <th style="padding: 10px;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
            <tr>
                <td style="padding: 10px;">{{ $book->id }}</td>
                <td style="padding: 10px;">{{ $book->title }}</td>
                <td style="padding: 10px;">{{ $book->author }}</td>
                <td style="padding: 10px;">{{ $book->price }}</td>
                <td style="padding: 10px;">{{ $book->isbn }}</td>
                <td style="padding: 10px;">
                    <a class="btn btn-info" style="margin-right: 5px;" href="{{ route('books.show', $book->id) }}">View</a>
                    <a class="btn btn-warning" style="margin-right: 5px;" href="{{ route('books.edit', $book->id) }}">Edit</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete btn btn-danger" data-title="{{ $book->title }}" style="margin-right: 5px;">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Laravel pagination links -->
<div class="pagination" style="margin-top: 20px; ">
    <style>
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .pagination li {
            list-style: none;
            display: inline;
            margin: 0 2px;
        }
     
        .pagination .active span {
            background-color: #007bff;
            color: white;
            border: 1px solid #007bff;
        }
        .pagination a:hover {
            background-color: #e9ecef;
        }
        .pagination svg {
            width: 16px;
            height: 16px;
        }
    </style>
    {{ $books->links() }}
</div>

 <div class="footer">
<p>This is footer</p>
    </div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#booksTable').DataTable({
            "paging": false,
            "ordering": true,
            "info": false
        });

        // Confirmation before delete
        $('.btn-delete').on('click', function(e) {
            e.preventDefault(); // Prevent form submission

            var bookTitle = $(this).data('title'); // Get book title from data attribute

            var confirmDelete = confirm("Are you sure you want to delete the book: " + bookTitle + "?");

            if (confirmDelete) {
                $(this).closest('form').submit(); // Submit the form if confirmed
            }
        });
    });
</script>
@endsection
