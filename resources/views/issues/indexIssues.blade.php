<!-- resources/views/reservations/indexReservations.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Reservations</h2>
    <a href="{{ route('issues.create') }}" class="btn btn-primary mb-3">Add New Issue</a>
    <table class="table">
        <thead>
            <tr>
                <th>Member ID</th>
                <th>Book ID</th>
                <th>Due Date</th>
                <th>Return Date</th>
                <th>Status</th>
                <th>Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($issues as $issue)
                <tr>
                    <td>{{ $issue->memberId }}</td>
                    <td>{{ $issue->bookId }}</td>
                    <td>{{ $issue->dueDate->format('Y-m-d') }}</td>
                    <td>{{ $issue->returnDate->format('Y-m-d') }}</td>
                    <td>
                        {{ $issue->status ? 'Active' : 'Inactive' }}
                    </td>
                    <td>{{ $issue->amount }}</td>
                    <td>
                        <a href="{{ route('issues.edit', $issue->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('issues.destroy', $issue->id) }}" method="POST" style="display:inline;">
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
