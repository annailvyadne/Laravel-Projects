@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="mb-3">
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Create New Category</a>
    </div>
    <table id="categoriesTable" class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                <a href="{{ route('categories.edit', ['category' => $category->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST" style="display:inline;">
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
        $('#categoriesTable').DataTable();
    });
</script>
@endsection
