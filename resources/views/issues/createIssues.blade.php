<!-- resources/views/reservations/createReservations.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Issues</h2>
    <form action="{{ route('issues.store') }}" method="POST">
        @csrf
<div class="form-group">
    <label for="memberId">Member:</label>
    <select class="form-control" id="memberId" name="memberId" required>
        <option value="">Select Member</option>
        @foreach($members as $member)
            <option value="{{ $member->id }}">{{ $member->fname }} {{ $member->lname }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="bookId">Book:</label>
    <select class="form-control" id="bookId" name="bookId" required>
        <option value="">Select Book</option>
        @foreach($books as $book)
            <option value="{{ $book->id }}">{{ $book->title }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="reservation_date">Due Date:</label>
    <input type="date" class="form-control" id="dueDate" name="dueDate">

</div>

<div class="form-group">
    <label for="reservation_date">Return Date:</label>
   <input type="date" class="form-control" id="returnDate" name="returnDate">

</div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status" required>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

<div class="form-group">
    <label for="reservation_date">Amount:</label>
   <input type="number" class="form-control" id="amount" name="amount">

</div>

        <button type="submit" class="btn btn-primary">Create Issue</button>
    </form>

</div>
@endsection
