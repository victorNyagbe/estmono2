@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/project/pdc.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/guest/OwlCarousel2/dist/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/guest/OwlCarousel2/dist/assets/owl.theme.default.css') }}">
@endsection

@section('content')
    <div class="banner-background">
        <div class="banner-filter">
            <h4 class="banner-title text-center animate__animated animate__rotateInUpLeft animate__repeat-1 animate__slower">Plan de developpement communal</h4>
        </div>
    </div>

    <div class="container-fluid custom-banner">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h4 class="text-center first-title">
                        Le contexte du pdc
                    </h4>
                </div>
                <div class="col-12">
                    <p class="text">
                        A renseigner
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('styles/guest/OwlCarousel2/dist/owl.carousel.js') }}"></script>
    <script>
        $('document').ready(function () {

            $('#partnerCarousel').owlCarousel({
                loop:true,
                margin:10,
                nav:false,
                autoplay:true,
                autoplayTimeout:1000,
                autoplayHoverPause:true,
                dots: false,
                responsive:{
                    0:{
                        items:2
                    },
                    768:{
                        items:5
                    },
                    992:{
                        items:7
                    }
                }
            });


        });
    </script>
@endsection
