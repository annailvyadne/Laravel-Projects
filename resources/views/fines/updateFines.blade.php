@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Fine</h2>
    <form action="{{ route('fines.update', $fine->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="memberId">Member:</label>
            <select class="form-control" id="memberId" name="memberId" required>
                @foreach($members as $member)
                    <option value="{{ $member->id }}" {{ $fine->memberId == $member->id ? 'selected' : '' }}>
                        {{ $member->fname }} {{ $member->lname }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="issueId">Issue:</label>
            <select class="form-control" id="issueId" name="issueId" required>
                @foreach($issues as $issue)
                    <option value="{{ $issue->id }}" {{ $fine->issueId == $issue->id ? 'selected' : '' }}>
                        {{ $issue->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="number" class="form-control" id="amount" name="amount" value="{{ $fine->amount }}" required>
        </div>

        <div class="form-group">
            <label for="paidDate">Paid Date:</label>
            <input type="date" class="form-control" id="paidDate" name="paidDate" value="{{ $fine->paidDate }}">
        </div>

        <div class="form-group">
            <label for="reason">Reason:</label>
            <input type="text" class="form-control" id="reason" name="reason" value="{{ $fine->reason }}" required>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status" required>
                <option value="1" {{ $fine->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $fine->status == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Fine</button>
    </form>
</div>
@endsection
