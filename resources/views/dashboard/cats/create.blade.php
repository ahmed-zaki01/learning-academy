@extends('dashboard.layout')

@section('content')
@include('partials.errors')
<div class="d-flex justify-content-between align-items-center pb-3">
    <div><span>Categories: Add New</span></div>
    <div><a href="{{ route('admin.cats') }}" class="btn btn-primary">Back</a></div>
</div>
<form action="{{ route('admin.cats.store') }}" method="POST">
    @csrf

    <input type="text" class="form-control mb-3" name="name" id="cat" placeholder="Enter Category Name">

    <button type="submit" class="btn btn-primary">ADD</button>
</form>
@endsection
