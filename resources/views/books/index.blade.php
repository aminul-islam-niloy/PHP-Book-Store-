@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 style="margin-bottom: 15px;">Books</h3>

    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Add New Book</a>

    <div class="table-responsive">
        <table id="booksTable" class="table table-bordered">
            <thead class="thead-light">
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
                            <a  style="margin-right: 5px;" href="{{ route('books.show', $book->id) }}"> <i class="fa-solid fa-circle-info "></i></a>
                            <a  style="margin-right: 5px;" href="{{ route('books.edit', $book->id) }}"> <i class="fa-solid fa-pen-to-square "></i></a>
                            <button class="btn-delete btn btn-danger btn-sm" data-title="{{ $book->title }}" data-id="{{ $book->id }}" style="margin-right: 5px;">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $books->links() }}
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete the book: <strong id="bookTitle"></strong>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
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

        // Show confirmation modal
        $('.btn-delete').on('click', function() {
            var bookTitle = $(this).data('title');  // Get the book title
            var bookId = $(this).data('id');        // Get the book id

            // Set the book title in the modal
            $('#bookTitle').text(bookTitle);

            // Set the form action dynamically
            var formAction = "/books/" + bookId;
            $('#deleteForm').attr('action', formAction);

            // Show the modal
            $('#deleteModal').modal('show');
        });
    });
</script>
@endsection
