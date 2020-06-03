@extends('dashboard.layout')

@section('content')
@include('partials.errors')
<div class="d-flex justify-content-between align-items-center pb-3">
    <div><span>Students: Edit / {{$student->name}}</span></div>
    <div><a href="{{ route('admin.students') }}" class="btn btn-primary">Back</a></div>
</div>
<form action="{{ route('admin.students.update') }}" method="POST">
    @csrf

    <input type="hidden" name="id" value={{$student->id}}>
    <input type="text" class="form-control mb-3" name="name" value="{{$student->name}}">
    <input type="email" class="form-control mb-3" name="email" value="{{$student->email}}">
    <input type="text" class="form-control mb-3" name="phone" value="{{$student->phone}}">
    <input type="text" class="form-control mb-3" name="spec" value="{{$student->spec}}">
    <button type="submit" class="btn btn-primary">EDIT</button>
</form>
@endsection
