<!-- resources/views/books/createBooks.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create New Book</h2>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="author">Title:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" class="form-control" id="author" name="author" required>
        </div>
        <div class="form-group">
            <label for="isbn">ISBN:</label>
            <input type="text" class="form-control" id="isbn" name="isbn" required>
        </div>
        <div class="form-group">
            <label for="categoryId">Category:</label>
            <select class="form-control" id="categoryId" name="categoryId" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->categoryId }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
<div class="form-group">
    <label>Status:</label><br>
    <label>
        <input type="radio" name="status" value="1" {{ old('status', $book->status ?? 1) ? 'checked' : '' }}>
        Available
    </label>
    <label>
        <input type="radio" name="status" value="0" {{ old('status', $book->status ?? 0) ? 'checked' : '' }}>
        Unavailable
    </label>
</div>


        <button type="submit" class="btn btn-primary">Create Book</button>
    </form>
</div>
@endsection
