@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Create New Member</h2>
    <form action="{{ route('members.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="fname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="fname" name="fname" required>
        </div>
        <div class="mb-3">
            <label for="lname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lname" name="lname" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address">
        </div>
        <div class="mb-3">
            <label for="phone_num" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone_num" name="phone_num">
        </div>
        <div class="mb-3">
            <label for="membership_type" class="form-label">Membership Type</label>
            <select class="form-control" id="membership_type" name="membership_type" required>
                <option value="" disabled selected>Select Membership Type</option> <!-- Placeholder option -->
                <option value="Regular">Regular</option>
                <option value="Student">Student</option>
                <option value="Premium">Premium</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="membership_date" class="form-label">Membership Date</label>
            <input type="date" class="form-control" id="membership_date" name="membership_date">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit Member</button>
    </form>
</div>
@endsection
