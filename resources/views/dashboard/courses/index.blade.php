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
    <div><span>Courses:</span></div>
    <div><a href="{{ route('admin.courses.create') }}" class="btn btn-primary">Add New</a></div>
</div>
<table class="table table-striped table-inverse text-center">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Trainer</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($courses as $i => $course)
        <tr id="row-data">
            <td scope="row">{{ ($courses->currentPage() * 10 - 10) + ($i+1) }}</td>
            <td><img src="{{ asset('uploads/courses/'.$course->img) }}" height="50px" style="border-radius: 50%;" alt="{{ $course->img }}"></td>
            <td>{{ $course->name }}</td>
            <td>${{ $course->price }}</td>
            <td>{{ $course->cat->name }}</td>
            <td>{{ $course->trainer->name }}</td>
            <td>
                <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-info">Edit</a>
                <a href="{{ route('admin.courses.delete', $course->id) }}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
<div class="w-100 d-flex justify-content-center p-5">
    {!! $courses->render() !!}
</div>
@endsection
