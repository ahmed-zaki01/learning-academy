@extends('dashboard.layout')
@section('styles')
<style>
    #row-data td {
        vertical-align: middle;
    }
</style>
@endsection
@section('content')
<div class="d-flex justify-content-between align-items-center pb-3">
    <div><span>Trainers:</span></div>
    <div><a href="{{ route('admin.trainers.create') }}" class="btn btn-primary">Add New</a></div>
</div>
<table class="table table-striped table-inverse text-center">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Speciality</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($trainers as $trainer)
        <tr id="row-data">
            <td scope="row">{{ $loop->iteration }}</td>
            <td><img src="{{ asset('uploads/trainers/'.$trainer->img) }}" height="50px" style="border-radius: 50%;" alt="{{ $trainer->img }}"></td>
            <td>{{ $trainer->name }}</td>
            <td>{{ $trainer->email }}</td>
            <td>
                @if ($trainer->phone)
                {{ $trainer->phone }}
                @else
                Not Exist
                @endif
            </td>
            <td>{{ $trainer->spec }}</td>
            <td>
                <a href="{{ route('admin.trainers.edit', $trainer->id) }}" class="btn btn-info">Edit</a>
                <a href="{{ route('admin.trainers.delete', $trainer->id) }}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
