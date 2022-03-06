<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
    <link href="{{ asset('images/favicon.png') }}" rel="icon">
    <title>Payswap - @yield('title')</title>

    @section('styles')
            <!-- Web Fonts
    ============================================= -->
        <link rel="stylesheet"
            href="{{ asset('css2.css?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap') }}">

        <!-- Stylesheet
    ============================================= -->
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/font-awesome/css/all.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/stylesheet.css') }}">
        <!-- Colors Css -->
        
    @show
    <livewire:styles />
</head>

<body>

    <!-- Preloader -->
    <div id="preloader">
        <div data-loader="dual-ring"></div>
    </div>
    <!-- Preloader End -->

    <!-- Document Wrapper
============================================= -->
    <div id="main-wrapper">
        <!-- Header
  ============================================= -->
        <header id="header">
            <div class="container">
                <div class="header-row">
                    <div class="header-column justify-content-start">
                        <!-- Logo
          ============================= -->
                        <div class="logo me-3"> <a class="d-flex" href="/dashboard"><img
                                    src="{{ asset('images/logo.png') }}" alt="Payyed"></a> </div>
                        <!-- Logo end -->
                        <!-- Collapse Button
          ============================== -->
                        {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#header-nav"> <span></span> <span></span> <span></span> </button> --}}
                        <!-- Collapse Button end -->

                        <!-- Primary Navigation
          ============================== -->
                        <nav class="primary-menu navbar navbar-expand-lg">
                            <div id="header-nav" class="collapse navbar-collapse">
                                <ul class="navbar-nav me-auto">
                                </ul>
                            </div>
                        </nav>
                        <!-- Primary Navigation end -->
                    </div>
                    <div class="header-column justify-content-end">
                        <!-- My Profile
          ============================== -->
                        <nav class="login-signup navbar navbar-expand">
                            <ul class="navbar-nav">
                                <li class="dropdown profile ms-2"> 
                                    <a class="px-0 dropdown-toggle" href="#">
                                        <img class="rounded-circle" src="{{asset('images/profile-thumb-sm.jpg')}}" alt="">
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="text-center text-3 py-2">Hi, {{Auth::user()->name}}</li>
                                        <li><a class="dropdown-item" href="{{route('dashboard')}}">Account</a></li>
                                        <li class="dropdown-divider mx-n3"></li>
                                        <li><a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logoutform').submit();"><i class="fas fa-sign-out-alt"></i>Sign
                                                Out</a></li>
                                        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        <!-- My Profile end -->
                    </div>
                </div>
            </div>
        </header>
        <!-- Header End -->

        <!-- Content
  ============================================= -->
        <div id="content" class="py-4">
            <div class="container">
                @yield('content')
                
            </div>
        </div>
        <!-- Content end -->

        <!-- Footer
  ============================================= -->
        <footer id="footer">
            <div class="container">
                <div class="footer-copyright pt-3 pt-lg-2 mt-2">
                    <div class="row">
                        <div class="col-lg">
                            <p class="text-center text-lg-start mb-2 mb-lg-0">Built By Efekpogua Victory</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer end -->

    </div>
    <!-- Document Wrapper end -->

    <!-- Back to Top
============================================= -->
    <a id="back-to-top" data-bs-toggle="tooltip" title="Back to Top" href="javascript:void(0)"><i
            class="fa fa-chevron-up"></i></a>
<livewire:scripts />
    @section('scripts')
        <!-- Script -->
        <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- Style Switcher -->
        <script src="{{asset('js/switcher.min.js')}}"></script>
        <script src="{{asset('js/theme.js')}}"></script>   
    @show
    
</body>

</html>
