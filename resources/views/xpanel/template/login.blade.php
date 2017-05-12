<!DOCTYPE html>
<html>

<!-- Mirrored from webapplayers.com/luna_admin-v1.3/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Apr 2017 19:55:59 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{asset(env('FAVICON'))}}" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900' rel='stylesheet' type='text/css'>

    <!-- Page title -->
    <title>{{env('APP_NAME')}} | @yield('titulo')</title>

    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{asset('public/xpanel/assets/vendor/fontawesome/css/font-awesome.css')}}"/>
    <link rel="stylesheet" href="{{asset('public/xpanel/assets/vendor/animate.css/animate.css')}}"/>
    <link rel="stylesheet" href="{{asset('public/xpanel/assets/vendor/bootstrap/css/bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{asset('public/xpanel/assets/vendor/toastr/toastr.min.css')}}"/>

    <!-- App styles -->
    <link rel="stylesheet" href="{{asset('public/xpanel/assets/styles/pe-icons/pe-icon-7-stroke.css')}}"/>
    <link rel="stylesheet" href="{{asset('public/xpanel/assets/styles/pe-icons/helper.css')}}"/>
    <link rel="stylesheet" href="{{asset('public/xpanel/assets/styles/stroke-icons/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('public/xpanel/assets/styles/style.css')}}">



    
    <!-- jQuery 2.2.3 -->
    <script src="{{asset('public/libs/jquery/jquery-2.2.3.min.js')}}"></script>
    <script src="{{asset('public/libs/sweetalert/sweetalert.min.js')}}"></script>  
    <link rel="stylesheet" type="text/css" href="{{asset('public/libs/sweetalert/sweetalert.css')}}">
    <script src="{{asset('public/xpanel/assets/vendor/toastr/toastr.min.js')}}"></script>

    <script src="{{asset('public/xpanel/assets/vendor/pacejs/pace.min.js')}}"></script>
    <script src="{{asset('public/xpanel/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('public/xpanel/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- App scripts -->
    
    <script src="{{asset('public/xpanel/assets/scripts/luna.js')}}"></script>
    <script src="{{asset('public/libs/xCode/xCode.js')}}"></script>
    
</head>
<body class="blank">

<!-- Wrapper-->
<div class="wrapper">


    <!-- Main content-->
    <section class="content">
        @yield('conteudo')
    </section>
    <!-- End main content-->

</div>
<!-- End wrapper-->

<!-- Vendor scripts -->


</body>


<!-- Mirrored from webapplayers.com/luna_admin-v1.3/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Apr 2017 19:55:59 GMT -->
</html>