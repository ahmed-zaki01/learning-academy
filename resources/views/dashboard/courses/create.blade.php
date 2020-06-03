@extends('dashboard.layout')

@section('content')
@include('partials.errors')
<div class="d-flex justify-content-between align-items-center pb-3">
    <div><span>Courses: Add New</span></div>
    <div><a href="{{ route('admin.courses') }}" class="btn btn-primary">Back</a></div>
</div>
<form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" class="form-control mb-3" name="name" placeholder="Enter course name">
    <input type="text" class="form-control mb-3" name="price" placeholder="Enter course price">
    <input type="text" class="form-control mb-3" name="short_desc" placeholder="Enter course short description">

    <textarea class="form-control mb-3" name="desc" rows="5" placeholder="Enter course description"></textarea>

    <select class="form-control mb-3" name="cat_id">
        <option value="" disabled selected>Choose your category</option>
        @foreach ($cats as $cat)
        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
        @endforeach
    </select>
    <select class="form-control mb-3" name="trainer_id">
        <option value="" disabled selected>Choose your trainer</option>
        @foreach ($trainers as $trainer)
        <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
        @endforeach
    </select>
    <div class="d-flex">
        <div>Choose Image:&nbsp;&nbsp;</div>
        <input type="file" class=" mb-3" name="img">
    </div>


    <button type="submit" class="btn btn-primary">ADD</button>
</form>
@endsection
