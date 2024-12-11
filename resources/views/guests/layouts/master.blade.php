<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Est-mono 2</title>
    <link href="{{ asset('assets/images/logo.jpeg') }}" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('styles/visitors/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('styles/mdb/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('animate/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('styles/visitors/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('styles/visitors/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('styles/visitors/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('styles/visitors/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('styles/visitors/remixicon/remixicon.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('styles/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/fontawesome/css/brands.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/home.css') }}">

    <!--  Main CSS File -->
    <link href="{{ asset('styles/visitors/css/style.css') }}" rel="stylesheet">

    @yield('style')
</head>
<body>

    <div class="navbarCustomized">
        @include('guests.includes.header')
        @include('guests.includes.navbar')
    </div>

    @yield('content')

    @include('guests.includes.footer')

    {{-- <div id="preloader">
        <div id="preloader-filter">
            <span class="preloader-logo">
                <img src="{{ asset('assets/images/logo.jpeg') }}" alt="">
            </span>
            {{-- <span id="preloader-text">Golfe1 - Bè Apédomé</span>
            <div id="preloader-desc">Site officiel</div> -}}
        </div>
    </div> --}}

    {{-- <div id="preloader" style="overflow-x: hidden;">
        <div class="preloader-custom d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset('assets/images/logo.jpeg') }}" alt="">
                </div>
            </div>
        </div>
    </div> --}}

    <a href="https://wa.me/22890XXXXXX" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-whatsapp d-flex align-items-center"></i>
    </a>

    <div class="modal fade" id="backNewsletterError" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center mb-4"><i class="fa fa-times-circle" style="color: rgb(161, 2, 2); font-size: 3rem;"></i></div>
                    <h5 class="text-center">
                        <ul class="list-unstyled">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </h5>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="backNewsletterSuccess" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center mb-4"><i class="fa fa-check-circle" style="color: #06aa7c; font-size: 3rem;"></i></div>
                    <h5 class="text-center">
                        {{ Session::get('success') }}
                    </h5>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('styles/mdb/js/jquery.js') }}"></script>
    <script src="{{ asset('styles/mdb/js/popper.js') }}"></script>
    <script src="{{ asset('styles/mdb/js/bootstrap.js') }}"></script>
    <script src="{{ asset('styles/visitors/purecounter/purecounter.js') }}"></script>
    <script src="{{ asset('styles/visitors/aos/aos.js') }}"></script>
    <script src="{{ asset('styles/visitors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('styles/visitors/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('styles/visitors/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('styles/visitors/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('styles/visitors/waypoints/noframework.waypoints.js') }}"></script>

    {{-- <script src="{{ asset('styles/visitors/php-email-form/validate.js') }}"></script> --}}

    <!-- Main JS File -->
    <script src="{{ asset('styles/visitors/js/main.js') }}"></script>
    <script src="{{ asset('styles/visitors/js/slide.js') }}"></script>
    <script>
        $(document).ready(function () {
            let error_message = "{{ $errors->any() }}";
            let success_message = "{{ Session::get('success') }}";

            if (error_message != "") {
                $('#backNewsletterError').modal();
            }

            if (success_message != "") {
                $('#backNewsletterSuccess').modal();
            }
        });
    </script>
    @yield('script')

</body>
</html>
