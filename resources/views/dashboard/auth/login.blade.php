<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="icon" href="{{asset("front/img/favicon.png")}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('front/css')}}/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>

<body>
    <!--::header part start::-->
    <header class="">
        <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand text-center" href="index.html">
                    <img src="{{asset("uploads/settings/alt-logo.png")}}" alt="logo"> </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav align-items-center text-center mx-auto">
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Header part end-->
    <div class="container p-5 m-5">
        @include('partials.errors')
        <form method="POST" action="{{ route('admin.attempt') }}">
            @csrf
            <div class="form-group">
                <label for="">Email:</label>
                <input type="email" class="form-control" name="email" placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label for="">Password:</label>
                <input type="password" class="form-control" name="password" placeholder="Enter your password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


    <!-- jquery -->
    <script src="{{asset('front/js')}}/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="{{asset('front/js')}}/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="{{asset('front/js')}}/bootstrap.min.js"></script>
</body>

</html>
