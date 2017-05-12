<!DOCTYPE html>
<html>

<!-- Mirrored from webapplayers.com/luna_admin-v1.3/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Apr 2017 19:55:00 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{asset(env('FAVICON'))}}" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900' rel='stylesheet' type='text/css'>

    <!-- Page title -->
    <title>{{env('APP_NAME')}} | @yield('titulo')</title>

    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{asset('public/xpanel/assets/vendor/fontawesome/css/font-awesome.css')}}" />
    <link rel="stylesheet" href="{{asset('public/xpanel/assets/vendor/animate.css/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('public/xpanel/assets/vendor/bootstrap/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('public/xpanel/assets/vendor/toastr/toastr.min.css')}}" />

    <!-- App styles -->
    <link rel="stylesheet" href="{{asset('public/xpanel/assets/styles/pe-icons/pe-icon-7-stroke.css')}}" />
    <link rel="stylesheet" href="{{asset('public/xpanel/assets/styles/pe-icons/helper.css')}}" />
    <link rel="stylesheet" href="{{asset('public/xpanel/assets/styles/stroke-icons/style.css')}}" />
    <link rel="stylesheet" href="{{asset('public/xpanel/assets/styles/style.css')}}">

    <script src="{{asset('public/libs/jquery/jquery-2.2.3.min.js')}}"></script>    
    <script src="{{asset('public/xpanel/assets/vendor/pacejs/pace.min.js')}}"></script>
    <script src="{{asset('public/xpanel/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('public/xpanel/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/xpanel/assets/vendor/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('public/xpanel/assets/vendor/sparkline/index.js')}}"></script>
    <script src="{{asset('public/xpanel/assets/vendor/flot/jquery.flot.min.js')}}"></script>
    <script src="{{asset('public/xpanel/assets/vendor/flot/jquery.flot.resize.min.js')}}"></script>
    <script src="{{asset('public/xpanel/assets/vendor/flot/jquery.flot.spline.js')}}"></script>

    <!-- App scripts -->
    <script src="{{asset('public/xpanel/assets/scripts/luna.js')}}"></script>
    <script src="{{asset('public/xpanel/assets/vendor/bootstrap3-typeahead/bootstrap3-typeahead.min.js')}}"></script>
    <script src="{{asset('public/libs/xCode/xCode.js')}}"></script>
    
</head>

<body>

    <!-- Wrapper-->
    <div class="wrapper">

        <!-- Header-->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <div id="mobile-menu">
                        <div class="left-nav-toggle">
                            <a href="#">
                                <i class="stroke-hamburgermenu"></i>
                            </a>
                        </div>
                    </div>
                    <a class="navbar-brand" href="{{asset('xpanel')}}" style="background-color: #f7f7f7">
                        <img src="{{asset(env('LOGO'))}}" height="400%" style="margin-top: -16%;margin-left: 10%">
                    </a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <div class="left-nav-toggle">
                        <a href="#">
                            <i class="stroke-hamburgermenu"></i>
                        </a>
                    </div>
                    <form class="navbar-form navbar-left" action="{{asset('xpanel/palestras')}}" method="get">
                        <input type="text" class="form-control" placeholder="@lang('dashboard.search')" style="width: 175px" name="search">
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="{{asset('xpanel/versao')}}">@lang('dashboard.versao')
                                <span class="label label-warning pull-right">{{env('VERSION')}}</span>
                            </a>
                        </li>
                        <li class=" profil-link">
                            <a href="{{asset('xpanel/user/profile')}}">
                                <span class="profile-address">{{Auth::user()->email}}</span>
                                @if(Auth::user()->sexo=="F")
                                    <img src="{{asset('public/xpanel/assets/images/woman.png')}}" class="img-circle" alt="">
                                @else
                                    <img src="{{asset('public/xpanel/assets/images/man.png')}}" class="img-circle" alt="">
                                @endif
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End header-->

        <!-- Navigation-->
        <aside class="navigation">
            <nav>
                <ul class="nav luna-nav">
                    <li class="nav-category">
                        @lang('dashboard.principal')
                    </li>
                    <li id="mn_dashboard">
                        <a href="{{asset('xpanel')}}">@lang('dashboard.inicio')</a>
                    </li>

                    <li id="mn_usuarios">
                        <a href="#mn_usuarios_opcoes" data-toggle="collapse" aria-expanded="false">
                            @lang('usuarios.usuario')<span class="sub-nav-icon"> <i class="stroke-arrow"></i> </span>
                        </a>
                        <ul id="mn_usuarios_opcoes" class="nav nav-second collapse">
                            <li id='mn_usuarios_profile'><a href="{{asset('xpanel/user/profile')}}">@lang('usuarios.profile')</a></li>
                        </ul>
                    </li>

                    <li id="mn_palestras">
                        <a href="#mn_palestras_opcoes" data-toggle="collapse" aria-expanded="false">
                            @lang('palestras.palestras')<span class="sub-nav-icon"> <i class="stroke-arrow"></i> </span>
                        </a>
                        <ul id="mn_palestras_opcoes" class="nav nav-second collapse">
                            <li id='mn_palestras_procurar'><a href="{{asset('xpanel/palestras')}}">@lang('palestras.procurar')</a></li>
                        </ul>
                    </li>
                                    
                    
                </ul>
            </nav>
        </aside>
        <!-- End navigation-->


        <!-- Main content-->
        <section class="content">
            <div class="container-fluid">
                @yield('conteudo')
            </div>
        </section>
        <!-- End main content-->

    </div>
    <!-- End wrapper-->
    
    <!-- Vendor scripts -->



</body>



</html>