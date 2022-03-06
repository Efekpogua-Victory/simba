<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
    <link href="{{ asset('images/favicon.png') }}" rel="icon">
    <title>Payswap - @yield('title')</title>

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
    <livewire:styles />
</head>

<body>

    <!-- Preloader -->
    <div id="preloader">
        <div data-loader="dual-ring"></div>
    </div>
    <!-- Preloader End -->
    <div id="main-wrapper" class="min-vh-100 d-flex flex-column">
        <!-- Login Form
        ============================================= -->
        <div class="container my-auto">
            <div class="row g-0">
                <div class="col-11 col-sm-9 col-md-7 col-lg-5 col-xl-4 m-auto py-5">
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- Login Form End -->

        <!-- Footer
        ============================================= -->
        <div class="container-fluid bg-white py-2">
            <p class="text-center text-muted mb-0">Built By Efekpogua Victory
            </p>
        </div>


    </div>

    <!-- Back to Top
============================================= -->
    <a id="back-to-top" data-bs-toggle="tooltip" title="Back to Top" href="javascript:void(0)"><i
            class="fa fa-chevron-up"></i></a>

    <livewire:scripts />
    <!-- Script -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Style Switcher -->
    <script src="{{ asset('js/switcher.min.js') }}"></script>
    <script src="{{ asset('js/theme.js') }}"></script>
</body>

</html>
