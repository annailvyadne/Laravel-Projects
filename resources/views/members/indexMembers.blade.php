@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="mb-3">
        <a href="{{ route('members.create') }}" class="btn btn-primary">Create New Member</a>
    </div>
    <table id="membersTable" class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Membership Type</th>
                <th>Membership Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
            <tr>
                <td>{{ $member->id }}</td>
                <td>{{ $member->fname }}</td>
                <td>{{ $member->lname }}</td>
                <td>{{ $member->email }}</td>
                <td>{{ $member->address }}</td>
                <td>{{ $member->phone_num }}</td>
                <td>{{ $member->membership_type }}</td>
                <td>{{ $member->membership_date }}</td>
                <td>{{ $member->status ? 'Active' : 'Inactive' }}</td>
                <td>
                    <a href="{{ route('members.edit', $member->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.datatables.net/2.1.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#membersTable').DataTable();
    });
</script>
@endsection
