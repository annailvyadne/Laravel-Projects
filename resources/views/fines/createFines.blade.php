@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Fine</h2>
    <form action="{{ route('fines.store') }}" method="POST">
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
            <label for="issueId">Issue:</label>
            <select class="form-control" id="issueId" name="issueId" required>
                <option value="">Select Issue</option>
                @foreach($issues as $issue)
                    <option value="{{ $issue->id }}">{{ $issue->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="number" class="form-control" id="amount" name="amount" required>
        </div>

        <div class="form-group">
            <label for="paidDate">Paid Date:</label>
            <input type="date" class="form-control" id="paidDate" name="paidDate">
        </div>

        <div class="form-group">
            <label for="reason">Reason:</label>
            <input type="text" class="form-control" id="reason" name="reason" required>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status" required>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Fine</button>
    </form>
</div>
@endsection
