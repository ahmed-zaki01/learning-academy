@extends('front.layout')

@section('style')

@endsection

@section('content')


<!-- banner part start-->
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-xl-6">
                <div class="banner_text">
                    <div class="banner_text_iner">
                        <h5>{{ json_decode($bannerContent->content)->title }}</h5>
                        <h1>{{ json_decode($bannerContent->content)->subtitle }}</h1>
                        <p>{{ json_decode($bannerContent->content)->desc }}</p>
                        <a href="{{ route('contact') }}" class="btn_2">Get Started </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner part start-->

<!-- feature_part start-->
<section class="feature_part">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-xl-3 align-self-center">
                <div class="single_feature_text ">
                    <h2>Awesome <br> Feature</h2>
                    <p>Set have great you male grass yielding an yielding first their you're
                        have called the abundantly fruit were man </p>
                    <a href="{{ route('about') }}" class="btn_1">Read More</a>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="single_feature">
                    <div class="single_feature_part">
                        <span class="single_feature_icon"><i class="ti-layers"></i></span>
                        <h4>Better Future</h4>
                        <p>Set have great you male grasses yielding yielding first their to
                            called deep abundantly Set have great you male</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="single_feature">
                    <div class="single_feature_part">
                        <span class="single_feature_icon"><i class="ti-new-window"></i></span>
                        <h4>Qualified Trainers</h4>
                        <p>Set have great you male grasses yielding yielding first their to called
                            deep abundantly Set have great you male</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="single_feature">
                    <div class="single_feature_part single_feature_part_2">
                        <span class="single_service_icon style_icon"><i class="ti-light-bulb"></i></span>
                        <h4>Job Oppurtunity</h4>
                        <p>Set have great you male grasses yielding yielding first their to called
                            deep
                            abundantly Set have great you male</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- upcoming_event part start-->


<!-- member_counter counter start -->
<section class="member_counter">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="single_member_counter">
                    <span class="counter">{{$courseNum}}</span>
                    <h4>All Courses</h4>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="single_member_counter">
                    <span class="counter">{{$trainerNum}}</span>
                    <h4>All Trainers</h4>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="single_member_counter">
                    <span class="counter">{{$studentNum}}</span>
                    <h4>All Students</h4>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- member_counter counter end -->

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
            @foreach ($courses as $course)
            <div class="col-sm-6 col-lg-4">
                <div class="single_special_cource">
                    <img src="{{asset('uploads/courses/'.$course->img)}}" class="special_img" alt="">
                    <div class="special_cource_text">
                        <a href="{{ route('coursesCat', $course->cat->id) }}" class="btn_4">{{$course->cat->name}}</a>
                        <h4>${{$course->price}}</h4>
                        <a href="{{ route('courseDetails', $course->id) }}">
                            <h3>{{$course->name}}</h3>
                        </a>
                        <p>{{$course->short_desc}}</p>
                        <div class="author_info">
                            <div class="author_img">
                                <img src="{{asset('uploads/trainers/'.$course->trainer->img)}}" alt="">
                                <div class="author_info_text pl-5">
                                    <p>Conduct by:</p>
                                    <h5><a href="#">{{$course->trainer->name}}</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach


        </div>
    </div>
</section>
<!--::blog_part end::-->

<!-- learning part start-->
<section class="advance_feature learning_part">
    <div class="container">
        <div class="row align-items-sm-center align-items-xl-stretch">
            <div class="col-md-6 col-lg-6">
                <div class="learning_member_text">
                    <h5>Advance feature</h5>
                    <h2>Our Advance Educator
                        Learning System</h2>
                    <p>Fifth saying upon divide divide rule for deep their female all hath brind mid
                        Days
                        and beast greater grass signs abundantly have greater also use over face
                        earth
                        days years under brought moveth she star</p>
                    <div class="row">
                        <div class="col-sm-6 col-md-12 col-lg-6">
                            <div class="learning_member_text_iner">
                                <span class="ti-pencil-alt"></span>
                                <h4>Learn Anywhere</h4>
                                <p>There earth face earth behold she star so made void two given and
                                    also
                                    our</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12 col-lg-6">
                            <div class="learning_member_text_iner">
                                <span class="ti-stamp"></span>
                                <h4>Expert Teacher</h4>
                                <p>There earth face earth behold she star so made void two given and
                                    also
                                    our</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="learning_img">
                    <img src="{{asset('front/img')}}/advance_feature_img.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- learning part end-->

<!--::review_part start::-->
<section class="testimonial_part pb-5">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <p>tesimonials</p>
                    <h2>Happy Students</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="textimonial_iner owl-carousel">
                    @foreach ($tests as $test)
                    <div class="testimonial_slider">
                        <div class="row">
                            <div class="col-lg-12 col-xl-4 col-sm-8 align-self-center">
                                <div class="testimonial_slider_text">
                                    <p>{{$test->desc}}</p>
                                    <h4>{{$test->student->name}}</h4>
                                    @if ($test->student->spec)
                                    <h5>{{$test->student->spec}}</h5>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-4 col-xl-2 col-sm-4">
                                <div class="testimonial_slider_img">
                                    <img src="{{asset('uploads/tests/'.$test->img)}}" alt="#">
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</section>
<!--::blog_part end::-->
@endsection
