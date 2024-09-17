<!-- resources/views/reservations/createReservations.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Reservation</h2>
    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="memberId">Member:</label>
            <select class="form-control" id="memberId" name="memberId" required>
                <option value="">Select Member</option>
                @foreach($members as $member)
                    <option value="{{ $member->memberId }}">{{ $member->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="bookId">Book:</label>
            <select class="form-control" id="bookId" name="bookId" required>
                <option value="">Select Book</option>
                @foreach($books as $book)
                    <option value="{{ $book->bookId }}">{{ $book->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="reservation_date">Reservation Date:</label>
            <input type="date" class="form-control" id="reservation_date" name="reservation_date" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status" required>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create Reservation</button>
    </form>
</div>
@endsection
