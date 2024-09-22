<!-- resources/views/reservations/indexReservations.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Reservations</h2>
    <a href="{{ route('reservations.create') }}" class="btn btn-primary mb-3">Add New Reservation</a>
    <table class="table">
        <thead>
            <tr>
                <th>Member ID</th>
                <th>Book ID</th>
                <th>Reservation Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->memberId }}</td>
                    <td>{{ $reservation->bookId }}</td>
                    <td>{{ $reservation->reservation_date->format('Y-m-d') }}</td>
                    <td>
                        {{ $reservation->status ? 'Active' : 'Inactive' }}
                    </td>
                    <td>
                        <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
