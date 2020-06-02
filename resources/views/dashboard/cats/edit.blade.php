@extends('dashboard.layout')

@section('content')
@include('partials.errors')
<div class="d-flex justify-content-between align-items-center pb-3">
    <div><span>Categories: Edit / {{ucwords($cat->name)}}</span></div>
    <div><a href="{{ route('admin.cats') }}" class="btn btn-primary">Back</a></div>
</div>
<form action="{{ route('admin.cats.update', $cat->id) }}" method="POST">
    @csrf
    <input type="hidden" class="form-control mb-3" name="id" value={{$cat->id}}>
    <input type="text" class="form-control mb-3" name="name" value={{$cat->name}}>
    <button type="submit" class="btn btn-primary">EDIT</button>
</form>
@endsection
