<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title','Admin Role Permission')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('backend.layouts.partial.style')
    @yield('styles')
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        @include('backend.layouts.partial.sidebar')
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            @include('backend.layouts.partial.header')
            <!-- header area end -->
            <!-- page title area start -->
            @yield('content')
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        @include('backend.layouts.partial.footer')
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    @include('backend.layouts.partial.offset')
    <!-- offset area end -->
    <!-- jquery latest version -->
    @include('backend.layouts.partial.scripts')
    @yield('scripts')
</body>
</html>
