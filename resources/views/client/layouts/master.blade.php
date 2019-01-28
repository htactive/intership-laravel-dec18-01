<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>@yield('title') - Blog</title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('frontend/img/core-img/favicon.ico')}}">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('frontend/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="preload-content">
            <div id="original-load"></div>
        </div>
    </div>

    <!-- Subscribe Modal -->
    @include('client.layouts.elements.modallogin')

    <!-- Register Modal -->
    @include('client.layouts.elements.modalregister')

    <!-- ##### Header Area Start ##### -->
    @include('client.layouts.elements.header')
    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->
    @include('client.layouts.elements.slider')
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Blog Wrapper Start ##### -->
    <div class="blog-wrapper section-padding-100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9">
                    @yield('content')
                </div>
                <!-- ##### Sidebar Area ##### -->
                @include('client.layouts.elements.sidebar')
            </div>
        </div>
    </div>
    <!-- ##### Blog Wrapper End ##### -->

    <!-- ##### Footer Area Start ##### -->
    @include('client.layouts.elements.footer')
    <!-- ##### Footer Area End ##### -->

    <!-- Jquery notifition -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
    @if(Session::has('message'))
    var type = "{{Session::get('alert-type','info')}}"
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
    </script>
    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="{{asset('frontend/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('frontend/js/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src=" {{asset('frontend/js/bootstrap.min.js')}} "></script>
    <!-- Plugins js -->
    <script src="{{asset('frontend/js/plugins.js')}}"></script>
    <!-- Active js -->
    <script src="{{asset('frontend/js/active.js')}}"></script>
    @stack('scripts')
</body>

</html>
