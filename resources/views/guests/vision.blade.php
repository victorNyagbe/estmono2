@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/OwlCarousel2/dist/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/visitors/OwlCarousel2/dist/assets/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/decentralisation.css') }}">
    <style>
        .text span{
            font-weight: 800;
        }
    </style>
@endsection

@section('content')
    <!--en tête-->
    <header class="header__section">
        <div class="header__section__filter">
            <div class="title-about">
                <h1>Notre vision</h1>
            </div>
        </div>
    </header>

    <!--contenu-->
    <section class="contenu p-0">
        <div class="container-fluid" style="background-color: rgba(255, 255, 255, 0.6)">
            <div class="row justify-content-center mt-0">
                <div class="text-about col-12 text-md-justify">

                    <p class="text text-center">
                        La commune Est-Mono 2 a pour vision la conception, la programmation et l’exécution des actions de développement d’intérêt local de son ressort territorial, en particulier dans les domaines économique, sanitaire, éducatif, social et culturel.
                    </p>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('styles/mdb/js/jquery.js') }}"></script>
    <script src="{{ asset('styles/visitors/OwlCarousel2/dist/owl.carousel.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#teamOwl').owlCarousel({
                loop:true,
                margin:10,
                nav:false,
                autoplay:true,
                autoplayTimeout:5000,
                autoplayHoverPause:true,
                dots: false,
                responsive:{
                    0:{
                        items:1
                    },
                    768:{
                        items:2
                    },
                    992:{
                        items:3
                    },
                    1200: {
                        items:4
                    }
                }
            });
        });
    </script>
@endsection
