@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Fines List</h2>
<a href="{{ route('fines.create') }}" class="btn btn-primary mb-3">Add New Issue</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Member</th>
                <th>Issue</th>
                <th>Amount</th>
                <th>Paid Date</th>
                <th>Reason</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fines as $fine)
                <tr>
                    <td>{{ $fine->id }}</td>
                    <td>{{ $fine->member->fname }} {{ $fine->member->lname }}</td>
                    <td>{{ $fine->issue->id }}</td>
                    <td>{{ $fine->amount }}</td>
                    <td>{{ $fine->paidDate }}</td>
                    <td>{{ $fine->reason }}</td>
                    <td>{{ $fine->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="{{ route('fines.edit', $fine->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('fines.destroy', $fine->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
