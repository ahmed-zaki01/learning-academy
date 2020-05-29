@if ($errors->any())
<ul class="list-unstyled">
    @foreach ($errors->all() as $error)
    <li class="alert alert-danger my-3 text-center">{{$error}}</li>
    @endforeach
</ul>
@endif
