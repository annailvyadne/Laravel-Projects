<!-- resources/views/reservations/updateReservations.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Update Reservation</h2>
    <form action="{{ route('reservations.update', $reservation->reservationId) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="memberId">Member ID:</label>
            <input type="text" class="form-control" id="memberId" name="memberId" value="{{ $reservation->memberId }}" required>
        </div>
        <div class="form-group">
            <label for="bookId">Book ID:</label>
            <input type="text" class="form-control" id="bookId" name="bookId" value="{{ $reservation->bookId }}" required>
        </div>
        <div class="form-group">
            <label for="reservation_date">Reservation Date:</label>
            <input type="date" class="form-control" id="reservation_date" name="reservation_date" value="{{ $reservation->reservation_date->format('Y-m-d') }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status" required>
                <option value="1" {{ $reservation->status ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$reservation->status ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Reservation</button>
    </form>
</div>
@endsection
