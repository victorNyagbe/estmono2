@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/OwlCarousel2/dist/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/visitors/OwlCarousel2/dist/assets/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/about.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/swiper.min.css') }}">
@endsection

@section('content')
    <!--en tête-->
    <div class="swiper">
        <div class="swiper-wrapper">
        @foreach ($about as $about)
        <!--contenu-->
        <section class="contenu p-0">
                <header class="header__section">
                    <div class="header__section__filter">
                        <div class="title-about">
                            <h1>A propos de la commune Est-mono 2</h1>
                            <h2>{!! $about->type !!}</h2>
                        </div>
                    </div>
                </header>
                <div class="container">
                    <div class="row justify-content-center mt-0">
                        <div class="text-about col-12 text-justify">
                            <p>{!! $about->text !!}</p>

                        </div>
                    </div>
                </div>
            </section>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        @endforeach
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('styles/mdb/js/jquery.js') }}"></script>
    <script src="{{ asset('styles/visitors/OwlCarousel2/dist/owl.carousel.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#teamOwl').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                dots: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    992: {
                        items: 3
                    },
                    1200: {
                        items: 4
                    }
                }
            });
        });
    </script>
    <script src="{{ asset('assets/scripts/swiper.min.js') }}"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
            },

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },
        });
        const swiperContainer = document.querySelector('.swiper');

        swiperContainer.addEventListener('mouseenter', function() {
            swiper.autoplay.stop();
        });

        swiperContainer.addEventListener('mouseleave', function() {
            swiper.autoplay.start();
        });
    </script>
@endsection
