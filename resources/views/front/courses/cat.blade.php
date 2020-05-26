@extends('front.layout')

@section('content')
<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner text-center">
                    <div class="breadcrumb_iner_item">
                        <h2>Our Courses</h2>
                        <p>Home Page<span>/</span>Courses<span>/</span>{{ucwords($cat->name)}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->

<!--::review_part start::-->
<section class="special_cource padding_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <p>popular courses</p>
                    <h2>Special Courses</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($catCourses as $catC)
            <div class="col-sm-6 col-lg-4">
                <div class="single_special_cource">
                    <img src="{{asset('uploads/courses/'.$catC->img)}}" class="special_img" alt="">
                    <div class="special_cource_text">
                        <a href="course-details.html" class="btn_4">{{$catC->cat->name}}</a>
                        <h4>${{$catC->price}}</h4>
                        <a href="course-details.html">
                            <h3>{{$catC->name}}</h3>
                        </a>
                        <p>{{$catC->short_desc}}</p>
                        <div class="author_info">
                            <div class="author_img">
                                <img src="{{asset('uploads/trainers/'.$catC->trainer->img)}}" alt="">
                                <div class="author_info_text pl-5">
                                    <p>Conduct by:</p>
                                    <h5><a href="#">{{$catC->trainer->name}}</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
            <div class="w-100 d-flex justify-content-center p-5">
                {!! $catCourses->render() !!}
            </div>
        </div>
    </div>
</section>
<!--::blog_part end::-->
@endsection
