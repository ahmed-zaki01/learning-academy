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
    <div><span>Students:</span></div>
    <div><a href="{{ route('admin.students.create') }}" class="btn btn-primary">Add New</a></div>
</div>
<table class="table table-striped table-inverse text-center">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Speciality</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $i => $student)
        <tr id="row-data">
            <td scope="row">{{$loop->iteration}}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->phone }}</td>
            <td>
                @if ($student->spec)
                {{ $student->spec }}
                @else
                Not Exist
                @endif
            </td>
            <td>
                <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-info">Edit</a>
                <a href="{{ route('admin.students.delete', $student->id) }}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="w-100 d-flex justify-content-center p-5">
    {!! $students->render() !!}
</div>
@endsection
