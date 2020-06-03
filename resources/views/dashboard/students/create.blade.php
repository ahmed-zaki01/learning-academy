@extends('dashboard.layout')

@section('content')
@include('partials.errors')
<div class="d-flex justify-content-between align-items-center pb-3">
    <div><span>Students: Add New</span></div>
    <div><a href="{{ route('admin.students') }}" class="btn btn-primary">Back</a></div>
</div>
<form action="{{ route('admin.students.store') }}" method="POST">
    @csrf

    <input type="text" class="form-control mb-3" name="name" placeholder="Enter student name">
    <input type="email" class="form-control mb-3" name="email" placeholder="Enter student email">
    <input type="text" class="form-control mb-3" name="phone" placeholder="Enter student phone">
    <input type="text" class="form-control mb-3" name="spec" placeholder="Enter student speciality">
    <button type="submit" class="btn btn-primary">ADD</button>
</form>
@endsection
