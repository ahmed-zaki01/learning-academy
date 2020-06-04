@extends('dashboard.layout')

@section('content')
@include('partials.errors')
<div class="d-flex justify-content-between align-items-center pb-3">
    <div><span>Students: Add New</span></div>
    <div><a href="{{ route('admin.students.showCourses', $studentId) }}" class="btn btn-primary">Back</a></div>
</div>
<form action="{{ route('admin.students.storeCourse', $studentId) }}" method="POST">
    @csrf

    <select class="form-control mb-3" name="course_id">
        <option value="" disabled selected>Choose your course</option>
        @foreach ($courses as $course)
        <option value="{{ $course->id }}">{{ $course->name }}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-primary">ADD</button>
</form>
@endsection
