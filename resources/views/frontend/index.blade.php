@extends("frontend.home_master")

@section('title')
	Starlight stores | Home 
@endsection

@section("main")


@php

    $sliders = App\Models\Home\HomeSlider::all();
    $ringlights = App\Models\Home\Ringlight::all();
    $shoes = App\Models\Home\Shoes::all();


@endphp
        <!-- Start Banner Area -->
        <h1 class="d-none">Home Default Blog</h1>
        <div class="slider-area bg-color-grey">
            <div class="axil-slide slider-style-1">
                <div class="container">
                    <div class="row">
                      
                        <div class="col-lg-12">
                        
                            <div class="slider-activation axil-slick-arrow">
                                @foreach($sliders as $key => $slider)
                                <!-- Start Single Slide  -->
                                <div class="content-block">
                                  
                                    <!-- Start Post Thumbnail  -->
                                    <div class="post-thumbnail">
                                        <a href="">
                                            <img src="{{ asset($slider->slider_image) }}" alt="Post Images">
                                        </a>
                                        
                                    </div>
                                    <!-- End Post Thumbnail  -->

                                    <!-- Start Post Content  -->
                                    <div class="post-content">
                                        <div class="post-cat">
                                            <div class="post-cat-list">
                                                <a class="hover-flip-item-wrapper" href="">
                                                    <span class="hover-flip-item">
                                                        <span >{{$slider->tittle}}</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                        <h2 class="title"><a href="">{!!$slider->content!!}</a></h2>
                                        <!-- Post Meta  -->
                                        <!-- <div class="read-more-button cerchio">
                                                <a class="axil-button button-rounded hover-flip-item-wrapper" href=""> -->
                                                    <!-- <span class="hover-flip-item"> -->
                                                        <!-- <span data-text="Read Post">Read Post</span> -->
                                                    <!-- </span> -->
                                                <!-- </a>
                                        </div> -->
                                    </div>
                                    <!-- End Post Content  -->
                                </div>
                                <!-- End Single Slide  -->

                                @endforeach
                            </div>
                            
                        </div>
                         
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner Area -->

        <!-- Start Tab Area  -->
        <div class="axil-tab-area axil-section-gap bg-color-white">
            <div class="wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="axil-banner mb--30">
                                <div class="thumbnail">
                                    <a href="#">
                                        <img class="w-100" src="{{asset('frontend/assets/images/add-banner/mens-shoes-hero.jpg')}}" alt="Banner Images">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h2 class="title">Goods &#38; Services</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Start Tab Button  -->
                            <ul class="axil-tab-button nav nav-tabs mt--20" id="axilTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="tab-one" data-bs-toggle="tab" href="#tabone" role="tab" aria-controls="tab-one" aria-selected="true">Ringlights</a>
                                </li>
                                <!-- <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="tab-two" data-bs-toggle="tab" href="#tabtwo" role="tab" aria-controls="tab-two" aria-selected="false">Watches</a>
                                </li> -->
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="tab-three" data-bs-toggle="tab" href="#tabthree" role="tab" aria-controls="tab-three" aria-selected="false">Shoes</a>
                                </li>
                            </ul>
                            <!-- End Tab Button  -->

                            <!-- Start Tab Content Wrapper  -->
                            <div class="tab-content" id="axilTabContent">
                                <div class="single-tab-content tab-pane fade show active" id="tabone" role="tabpanel" aria-labelledby="tab-one">
                                    <div class="modern-post-activation slick-layout-wrapper axil-slick-arrow arrow-between-side">

                                        <!-- Start Single Post  -->
                                        @foreach($ringlights as $ringlight)
                                        <div class="slick-single-layout">
                                            <div class="content-block modern-post-style text-center content-block-column">
                                                <div class="post-content">
                                                    <div class="post-cat">
                                                        <div class="post-cat-list">
                                                            <a class="hover-flip-item-wrapper" href="{{ route('ringlights') }}">
                                                                <span class="hover-flip-item">
                                                                    <span data-text="{{$ringlight->name}}">{{$ringlight->name}}</span>
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <h4 class="title"><a href="{{ route('ringlights') }}">{{$ringlight->title}}</a></h4>
                                                </div>
                                                <div class="post-thumbnail">
                                                    <a href="{{ route('ringlights') }}">
                                                        <img src="{{ asset($ringlight->team_image)}}" alt="Post Images">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <!-- End Single Post  -->


                                        
                                    </div>
                                </div>

                                <div class="single-tab-content tab-pane fade" id="tabthree" role="tabpanel" aria-labelledby="tab-three">
                                    <div class="modern-post-activation slick-layout-wrapper axil-slick-arrow arrow-between-side">

                                       
                                        <!-- Start Single Post  -->
                                        @foreach($shoes as $shoe)
                                        <div class="slick-single-layout">
                                            <div class="content-block modern-post-style text-center content-block-column">
                                                <div class="post-content">
                                                    <div class="post-cat">
                                                        <div class="post-cat-list">
                                                            <a class="hover-flip-item-wrapper" href="{{ route('shoes')}}">
                                                                <span class="hover-flip-item">
                                                                    <span data-text="{{$shoe->name}}">{{$shoe->name}}</span>
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <h4 class="title"><a href="{{ route('shoes')}}">{{$shoe->title}}</a></h4>
                                                </div>
                                                <div class="post-thumbnail">
                                                    <a href="{{ route('shoes')}}">
                                                        <img src="{{ asset($shoe->team_image)}}" alt="Post Images">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <!-- End Single Post  -->
                                    </div>
                                </div>
                            </div>
                            <!-- End Tab Content Wrapper  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Tab Area  -->

        <!-- Start Post Grid Area  -->
        <!-- <div class="axil-post-grid-area axil-section-gap bg-color-grey">
            <div class="container">
                <div class="row axil-section-gapBottom">
                    <div class="col-lg-12">
                        <div class="axil-social-wrapper bg-color-white radius">
                            <ul class="social-with-text">
                                <li class="twitter"><a href="#"><i class="fab fa-twitter"></i><span>Twitter</span></a></li>
                                <li class="facebook"><a href="#"><i class="fab fa-facebook-f"></i><span>Facebook</span></a></li>
                                <li class="instagram"><a href="#"><i class="fab fa-instagram"></i><span>Instagram</span></a></li>
                                <li class="youtube"><a href="#"><i class="fab fa-youtube"></i><span>Youtube</span></a></li>
                                <li class="pinterest"><a href="#"><i class="fab fa-pinterest"></i><span>Pinterest</span></a></li>
                                <li class="discord"><a href="#"><i class="fab fa-discord"></i><span>Discord</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- End Post Grid Area  -->

       

 @endsection 