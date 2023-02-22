 
 @php

$ringlights = App\Models\Home\Ringlight::all();
$shoes = App\Models\Home\Shoes::all();



@endphp
 
 <!-- Start Header -->
 <header class="header axil-header  header-light header-sticky ">
            <div class="header-wrap">
                <div class="row justify-content-between align-items-center">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-3 col-12">
                        <div class="logo">
                            <a href="/">
                                
                                <!-- <img class="dark-logo" src="{{asset('frontend/assets/images/logo/logo.jfif')}}" alt="starlight logo"> -->
                                <!-- <img class="light-logo" src="{{asset('frontend/assets/images/logo/logo-white2.png')}}" alt="Blogar logo"> -->
                            </a>
                        </div>
                    </div>

                    <div class="col-xl-6 d-none d-xl-block">
                        <div class="mainmenu-wrapper">
                            <nav class="mainmenu-nav">
                                <!-- Start Mainmanu Nav -->
                                <ul class="mainmenu">
                                    <li class="menu-item"><a href="/">Home</a>
                                       
                                    </li>

                                    <li class="menu-item"><a href="{{ route('shoes') }}">Shoes</a>
                                       
                                    </li>
                                    <li class="menu-item"><a href="{{ route('ringlights') }}">Ringlights</a>
                                       
                                    </li>
                                    <!-- <li class="menu-item"><a href="#">Watches</a>
                                       
                                    </li> -->
                                    <li class="menu-item"><a href="{{ route('contact') }}">contact</a>
                                       
                                    </li>
                                    <li class="menu-item"><a href="{{ route('login') }}">Log in</a></li>

                                    <li class="menu-item-has-children megamenu-wrapper"><a>Mega view of Goods</a>
                                        <ul class="megamenu-sub-menu">
                                            <li class="megamenu-item">

                                                <!-- Start Verticle Nav  -->
                                                <div class="axil-vertical-nav">
                                                    <ul class="vertical-nav-menu">
                                                        <li class="vertical-nav-item active">
                                                            <a class="hover-flip-item-wrapper" href="#tab1">
                                                                <span class="hover-flip-item">
                                                                    <span data-text="Ringlights">Ringlights</span>
                                    
                                                                </span>
                                                                
                                                            </a>
                                                        </li>
                                                        <li class="vertical-nav-item active">
                                                            <a class="hover-flip-item-wrapper" href="#tab2">
                                                                <span class="hover-flip-item">
                                                                    <span data-text="Shoes">Shoes</span>
                                    
                                                                </span>
                                                                
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- Start Verticle Nav  -->

                                                <!-- Start Verticle Menu  -->
                                                <div class="axil-vertical-nav-content">
                                                    <!-- Start One Item  -->
                                                    <div class="axil-vertical-inner tab-content" id="tab1" style="display: block;">
                                                        <div class="axil-vertical-single">
                                                            <div class="row">
                                                                <!-- Start Post List  -->
                                                                @foreach($ringlights as $ringlight)
                                                                <div class="col-lg-3">
                                                                    <div class="content-block image-rounded">
                                                                        <div class="post-thumbnail mb--20">
                                                                            <a href="post-details.html">
                                                                                <img class="w-100" src="{{ asset($ringlight->team_image)}}" alt="Post Images">
                                                                            </a>
                                                                        </div>
                                                                        <div class="post-content">
                                                                            <div class="post-cat">
                                                                                <div class="post-cat-list">
                                                                                    <a class="hover-flip-item-wrapper" href="#">
                                                                                        <span class="hover-flip-item">
                                                            <span data-text="{{$ringlight->name}}">{{$ringlight->name}}</span>
                                                                                        </span>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <h5 class="title"><a href="post-details.html">{{$ringlight->title}}</a></h5>
                                                                        </div>
                                                                    </div>
                                                                    
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                        </div>
                                                    </div>
        
                                                                
                                                                <!-- End Post List  -->

                                                                <!-- Start One Item  -->
                                                   <!-- Start One Item  -->
                                                   <div class="axil-vertical-inner tab-content" id="tab2">
                                                        <div class="axil-vertical-single">
                                                            <div class="row">
                                                                <!-- Start Post List  -->
                                                                @foreach($shoes as $shoe)
                                                                <div class="col-lg-3">
                                                                    <div class="content-block image-rounded">
                                                                        <div class="post-thumbnail mb--20">
                                                                            <a href="{{ route('shoes')}}">
                                                                                <img class="w-100" src="{{ asset($shoe->team_image)}}" alt="Shoes Images">
                                                                            </a>
                                                                        </div>
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
                                                                            <h5 class="title"><a href="{{ route('shoes')}}">{{$shoe->title}}</a></h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                                <!-- End Post List  -->
                                                               
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End two Item  -->
                            </nav>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-8 col-md-8 col-sm-9 col-12">
                            <ul class="metabar-block">
                                
                            <li><a href="/"><img src="{{asset('frontend/assets/images/others/logo.jfif')}}" alt="Author Images"></a></li>
                
                        </ul>
                            <!-- Start Hamburger Menu  -->
                            <div class="hamburger-menu d-block d-xl-none">
                                <div class="hamburger-inner">
                                    <div class="icon"><i class="fal fa-bars"></i></div>
                                </div>
                            </div>
                            <!-- End Hamburger Menu  -->
                        </div>
                    </div>
                </div>
            </div>
</header>
<!-- Start Header -->



 <!-- Start Mobile Menu Area  -->
 <div class="popup-mobilemenu-area">
            <div class="inner">
                <div class="mobile-menu-top">
                    <div class="logo">
                        <a href="/">
                            
                            <img class="dark-logo" src="{{asset('frontend/assets/images/logo/logo.jfif')}}" alt="Logo Images">
                            <!-- <img class="light-logo" src="{{asset('frontend/assets/images/logo/logo-white2.png')}}" alt="Logo Images"> -->
                        </a>
                    </div>
                    <div class="mobile-close">
                        <div class="icon">
                            <i class="fal fa-times"></i>
                        </div>
                    </div>
                </div>
                <ul class="mainmenu">
                    <li class=""><a href="/">Home</a>
                        
                    </li>
                   
                    <li class=""><a href="{{ route('ringlights') }}">Ringlights</a>

                    <li class=""><a href="{{ route('shoes')}}">Shoes</a>
                        
                    </li>
                    <!-- <li class="menu-item"><a href="#">Watches</a>
                        
                    </li> -->
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                </ul>
                <div class="buy-now-btn">
                    <a href="{{ route('login') }}">LOG IN</span></a>
                </div>
            </div>
        </div>
        <!-- End Mobile Menu Area  -->