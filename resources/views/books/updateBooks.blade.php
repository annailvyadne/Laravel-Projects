<!-- resources/views/books/updateBooks.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Update Book</h2>
    <form action="{{ route('books.update', $book->bookId) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}" required>
        </div>
        <div class="form-group">
            <label for="isbn">ISBN:</label>
            <input type="text" class="form-control" id="isbn" name="isbn" value="{{ $book->isbn }}" required>
        </div>
        <div class="form-group">
            <label for="categoryId">Category:</label>
            <select class="form-control" id="categoryId" name="categoryId" required>
                @foreach($categories as $category)
                    <option value="{{ $category->categoryId }}" {{ $book->categoryId == $category->categoryId ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status" required>
                <option value="1" {{ $book->status ? 'selected' : '' }}>Available</option>
                <option value="0" {{ !$book->status ? 'selected' : '' }}>Unavailable</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Book</button>
    </form>
</div>
@endsection
