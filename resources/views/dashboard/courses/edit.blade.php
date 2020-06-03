@extends('dashboard.layout')

@section('content')
@include('partials.errors')
<div class="d-flex justify-content-between align-items-center pb-3">
    <div><span>Courses: Edit / {{$course->name}}</span></div>
    <div><a href="{{ route('admin.courses') }}" class="btn btn-primary">Back</a></div>
</div>
<form action="{{ route('admin.courses.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$course->id}}">
    <input type="text" class="form-control mb-3" name="name" value="{{$course->name}}">
    <input type="text" class="form-control mb-3" name="price" value="{{$course->price}}">
    <input type="text" class="form-control mb-3" name="short_desc" value="{{$course->short_desc}}">

    <textarea class="form-control mb-3" name="desc" rows="5" placeholder="Enter course description">{{$course->desc}}</textarea>

    <select class="form-control mb-3" name="cat_id">
        <option disabled selected>Choose your category</option>
        @foreach ($cats as $cat)
        <option value="{{ $cat->id }}" @if ($course->cat_id == $cat->id) selected @endif>{{ $cat->name }}</option>
        @endforeach
    </select>
    <select class="form-control mb-3" name="trainer_id">
        <option disabled selected>Choose your trainer</option>
        @foreach ($trainers as $trainer)
        <option value="{{ $trainer->id }}" @if ($course->trainer_id == $trainer->id) selected @endif>{{ $trainer->name }}</option>
        @endforeach
    </select>
    <div class="d-flex">
        <div>Choose Image:&nbsp;&nbsp;</div>
        <input type="file" class=" mb-3" name="img">
    </div>


    <button type="submit" class="btn btn-primary">EDIT</button>
</form>
@endsection
