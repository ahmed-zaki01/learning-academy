@extends('dashboard.layout')

@section('content')
@include('partials.errors')
<div class="d-flex justify-content-between align-items-center pb-3">
    <div><span>Trainers: Add New</span></div>
    <div><a href="{{ route('admin.trainers') }}" class="btn btn-primary">Back</a></div>
</div>
<form action="{{ route('admin.trainers.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" class="form-control mb-3" name="name" placeholder="Enter Trainer Name">
    <input type="email" class="form-control mb-3" name="email" placeholder="Enter Trainer Email">
    <input type="text" class="form-control mb-3" name="phone" placeholder="Enter Trainer Phone">
    <input type="text" class="form-control mb-3" name="spec" placeholder="Enter Trainer Speciality">
    <div class="d-flex">
        <div>Choose Image:&nbsp;&nbsp;</div>
        <input type="file" class=" mb-3" name="img">
    </div>


    <button type="submit" class="btn btn-primary">ADD</button>
</form>
@endsection
