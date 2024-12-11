@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/OwlCarousel2/dist/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/visitors/OwlCarousel2/dist/assets/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/about.css') }}">
@endsection

@section('content')
    <!--en tête-->
    <header class="header__section">
        <div class="header__section__filter">
            <div class="title-about">
                <h1>A propos de la commune Est-mono 2</h1>
            </div>
        </div>
    </header>


    <!--contenu-->
    <section class="contenu p-0">
        <div class="container">
            <div class="row justify-content-center mt-0">
                <div class="text-about col-12 text-justify">
                    <p>{!! $about->text !!}</p>

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
