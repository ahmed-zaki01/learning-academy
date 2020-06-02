@extends('dashboard.layout')

@section('content')
@include('partials.errors')
<div class="d-flex justify-content-between align-items-center pb-3">
    <div><span>Trainers: Edit / {{$trainer->name}}</span></div>
    <div><a href="{{ route('admin.trainers') }}" class="btn btn-primary">Back</a></div>
</div>
<form action="{{ route('admin.trainers.update') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="id" value={{$trainer->id}}>
    <input type="text" class="form-control mb-3" name="name" value="{{$trainer->name}}">
    <input type="email" class="form-control mb-3" name="email" value="{{$trainer->email}}">
    <input type="text" class="form-control mb-3" name="phone" value="{{$trainer->phone}}">
    <input type="text" class="form-control mb-3" name="spec" value="{{$trainer->spec}}">
    <img src="{{ asset('uploads/trainers/'.$trainer->img) }}" class="img-fluid mb-2" alt="{{$trainer->img}}">
    <div class="d-flex">
        <div>Choose Image:&nbsp;&nbsp;</div>
        <input type="file" class=" mb-3" name="img">
    </div>


    <button type="submit" class="btn btn-primary">EDIT</button>
</form>
@endsection
