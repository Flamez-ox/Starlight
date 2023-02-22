<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield("title")</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/assets/images/logo.jfif')}}">

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/slick.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/slick-theme.cs')}}s">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/base.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/plugins/plugins.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">

</head>

<body>

    <!--page start-->
    <div class="main-wrapper">

    <!-- <div class="mouse-cursor cursor-outer"></div>
        <div class="mouse-cursor cursor-inner"></div> -->

        <div id="my_switcher" class="my_switcher">
            <ul>
                <li>
                    <a href="javascript: void(0);" data-theme="light" class="setColor light">
                        <span title="Light Mode">Light</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" data-theme="dark" class="setColor dark">
                        <span title="Dark Mode">Dark</span>
                    </a>
                </li>
            </ul>
        </div>

        <!--header start-->
    @include('frontend.body.header')
        <!--header end-->

    @yield("main")

    <!--footer start-->
    @include("frontend.body.footer")
    <!--footer end-->

    <!--back-to-top start-->
    <a id="totop" href="#top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!--back-to-top end-->

    <!-- Color Palate / Color Switcher
    <div class="color-switcher">
        <div class="color-trigger">
            <i class="fa fa-gear"></i>
        </div>
        <div class="color-switcher-header">
            <h6>Switcher Colors</h6>
        </div>
        <div class="various-color clearfix">
            <div class="colors-list">
                <span class="theme-color default-color active" data-file="css/colors/default-color.css"></span>
                <span class="theme-color theme-color1" data-file="css/colors/theme-color1.css"></span>
                <span class="theme-color theme-color2" data-file="css/colors/theme-color2.css"></span>
                <span class="theme-color theme-color3" data-file="css/colors/theme-color3.css"></span>
                <span class="theme-color theme-color4" data-file="css/colors/theme-color4.css"></span>
                <span class="theme-color theme-color5" data-file="css/colors/theme-color5.css"></span>
            </div>
        </div>
    </div> -->

</div><!-- page end -->

    <!-- Javascript -->

     <!-- Modernizer JS -->
     <script src="{{asset('frontend/assets/js/vendor/modernizr.min.j')}}s"></script>
    <!-- jQuery JS -->
    <script src="{{asset('frontend/assets/js/vendor/jquery.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('frontend/assets/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/slick.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/tweenmax.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/js.cookie.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/jquery.style.switcher.js')}}"></script>


    <!-- Main JS -->
    <script src="{{asset('frontend/assets/js/main.js')}}"></script>

    <!-- Javascript end-->

</body>

</html>