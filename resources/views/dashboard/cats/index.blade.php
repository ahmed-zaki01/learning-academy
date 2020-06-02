@extends('dashboard.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center pb-3">
    <div><span>Categories:</span></div>
    <div><a href="{{ route('admin.cats.create') }}" class="btn btn-primary">Add New</a></div>
</div>
<table class="table table-striped table-inverse text-center">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cats as $cat)
        <tr>
            <td scope="row">{{ $loop->iteration }}</td>
            <td>{{ $cat->name }}</td>
            <td>
                <a href="{{ route('admin.cats.edit', $cat->id) }}" class="btn btn-info">Edit</a>
                <a href="{{ route('admin.cats.delete', $cat->id) }}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
