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
    <div><span>Courses of: {{$studentName->name}} </span></div>
    <div>
        <a href="{{ route('admin.students.addCourse', $studentId) }}" class="btn btn-info">Add to course</a>
        <a href="{{ route('admin.students') }}" class="btn btn-primary">Back</a>
    </div>
</div>
@include('partials.errors')
<table class="table table-striped table-inverse text-center">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if (!$courses)
        <tr nowrap="nowrap">
            <td scope="row">{{ $studentName->name }} does not enroll in any courses yet!</td>
        </tr>
        @else
        @foreach ($courses as $course)
        <tr id="row-data">
            <td scope="row">{{ $loop->iteration }}</td>
            <td>{{ $course->name }}</td>
            <td>{{ $course->pivot->status }}</td>
            <td>
                @if ($course->pivot->status !== 'approved')
                <a href="{{ route('admin.students.approveCourse', [$studentId, $course->id]) }}" class="btn btn-info">Approve</a>
                @endif
                @if ($course->pivot->status !== 'rejected')
                <a href="{{ route('admin.students.rejectCourse', [$studentId, $course->id]) }}" class="btn btn-danger">Reject</a>
                @endif
                @if ($course->pivot->status !== 'pending')
                <a href="{{ route('admin.students.pendingCourse', [$studentId, $course->id]) }}" class="btn btn-info">Pending</a>
                @endif

            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
@endsection
