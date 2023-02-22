<!doctype html>
<html lang="en">

    
<head>

    <meta charset="utf-8" />
    <title>Starlight | Admin & Dashboard   </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Admin & Dashboard" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <!-- <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }} "> -->
    <link rel="shortcut icon" href="{{ asset ('backend/assets/images/logo.jfif') }}">


    <!-- DataTables -->
    <link href="{{ asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }} " rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }} " rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('backend/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }} " rel="stylesheet" type="text/css" /> 


    <!-- plugin css -->
    <link href="{{asset('backend/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />

    <!-- preloader css -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/preloader.min.css')}}" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{asset('backend/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('backend/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    
</head>


<body data-layout-mode="dark" data-sidebar="dark" data-topbar="dark">

    <!-- <body data-layout="horizontal"> -->
    

        <!-- Begin page -->
        @include("admin.body.header") 
        <!-- END layout-wrapper -->

         
        <!-- Right Sidebar -->
        @include("admin.body.sidebar") 
        <!-- /Right-bar -->

        @yield("main1")

        @include("admin.body.footer")

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{asset('backend/assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('backend/assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('backend/assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('backend/assets/libs/node-waves/waves.min.js')}}"></script>
        <script src="{{asset('backend/assets/libs/feather-icons/feather.min.js')}}"></script>
        <!-- pace js -->
        <script src="{{asset('backend/assets/libs/pace-js/pace.min.js')}}"></script>

         <!-- ckeditor -->
         <script src="{{ asset('backend/assets/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js') }} "></script>

         <!-- pristine js -->
       <script src="{{ asset('backend/assets/libs/pristinejs/pristine.min.js') }} "></script>
        <!-- form validation -->
       <script src="{{ asset('backend/assets/js/pages/form-validation.init.js') }} "></script>

        <!-- init js -->
        <script src="{{ asset('backend/assets/js/pages/form-editor.init.js') }} "></script>

        <!-- apexcharts -->
        <script src="{{asset('backend/assets/libs/apexcharts/apexcharts.min.js')}}"></script>

        <!-- Plugins js-->
        <script src="{{asset('backend/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script src="{{asset('backend/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js')}}"></script>

        <!-- dashboard init -->
        <script src="{{asset('backend/assets/js/pages/dashboard.init.js')}}"></script>

         <!-- Required datatable js -->
         <script src="{{asset ('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{asset ('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <!-- Buttons examples -->
        <script src="{{asset ('backend/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{asset ('backend/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{asset ('backend/assets/libs/jszip/jszip.min.js') }}"></script>
        <script src="{{asset ('backend/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
        <script src="{{asset ('backend/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
        <script src="{{asset ('backend/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{asset ('backend/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{asset ('backend/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

        <!-- Responsive examples -->
        <script src="{{asset ('backend/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{asset ('backend/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

        <!-- Datatable init js -->
        <script src="{{asset ('backend/assets/js/pages/datatables.init.js') }}"></script> 
        
      

        <script src=" {{asset('backend/assets/js/app.js') }}"></script>

        

</body>


</html>