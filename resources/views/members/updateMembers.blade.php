@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Update Member</h2>
    <form action="{{ route('members.update', $member->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="fname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="fname" name="fname" value="{{ $member->fname }}" required>
        </div>
        <div class="mb-3">
            <label for="lname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lname" name="lname" value="{{ $member->lname }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $member->email }}" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $member->address }}">
        </div>
        <div class="mb-3">
            <label for="phone_num" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone_num" name="phone_num" value="{{ $member->phone_num }}">
        </div>
        <div class="mb-3">
            <label for="membership_type" class="form-label">Membership Type</label>
            <input type="text" class="form-control" id="membership_type" name="membership_type" value="{{ $member->membership_type }}">
        </div>
          <div class="mb-3">
              <label for="membership_type" class="form-label">Membership Type</label>
              <select class="form-control" id="membership_type" name="membership_type" required>
                  <option value="Regular" {{ $member->membership_type == 'Regular' ? 'selected' : '' }}>Regular</option>
                  <option value="Student" {{ $member->membership_type == 'Student' ? 'selected' : '' }}>Student</option>
                  <option value="Premium" {{ $member->membership_type == 'Premium' ? 'selected' : '' }}>Premium</option>
              </select>
          </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="1" {{ $member->status ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$member->status ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Member</button>
    </form>
</div>
@endsection
