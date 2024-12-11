@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/OwlCarousel2/dist/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/visitors/OwlCarousel2/dist/assets/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/mairie/municipal.css') }}">
@endsection

@section('content')
    <!--en tête-->
    <header class="municipal">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="title-municipal">
                        <h1>Bureau exécutif </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- contenu -->
    <section id="person" class="person section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h1>MAIRE DE LA COMMUNE Est-Mono 2</h1>
                </div>

                <div class="row justify-content-center">

                    <div class="col-lg-4 col-md-12" data-aos="fade-up" data-aos-delay="100">
                        <div class="muni">
                            <div class="muni-img" style="background-image: url('{{ asset('storage/app/public/' . $maire->image) }}')"></div>
                            <div class="muni-info">
                                <h4>{{ $maire->lastname . ' ' . $maire->firstname }}</h4>
                                <p>{{ $maire->occupation }}</p>
                                {{-- <div class="social">
                                    <a href=""><i class="bi bi-envelope"></i></a>
                                    <a href=""><i class="bi bi-whatsapp"></i></a>
                                    <a href=""><i class="bi bi-telephone"></i></a>
                                </div> --}}

                            </div>
                        </div>
                    </div>

                </div>

                <div class="section-title mt-5">
                    <h1>MEMBRES DU BUREAU EXECUTIF DE LA COMMUNE EST-MONO 2</h1>
                </div>

                <div class="row">
                    @foreach ($executifs as $executif)
                        <div class="col-lg-4 col-md-12" data-aos="fade-up" data-aos-delay="100">
                            <div class="muni">
                                <div class="muni-img" style="background-image: url('{{ asset('storage/app/public/' . $executif->image) }}')"></div>
                                <div class="muni-info">
                                    <h4>{{ $executif->lastname . ' ' . $executif->firstname }}</h4>
                                    <p>{{ $executif->occupation }}</p>
                                    {{-- <div class="social">
                                        <a href=""><i class="bi bi-envelope"></i></a>
                                        <a href=""><i class="bi bi-whatsapp"></i></a>
                                        <a href=""><i class="bi bi-telephone"></i></a>
                                    </div> --}}

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- <div class="section-title">
                    <h1>MEMBRES DU CONSEIL MUNICIPAL DE LA COMMUNE GOLFE 1</h1>
                </div>

                <div class="row">
                    @foreach ($conseillers as $conseiller)
                        <div class="col-lg-4 col-md-12" data-aos="fade-up" data-aos-delay="100">
                            <div class="muni">
                                <div class="muni-img" style="background-image: url('{{ asset('storage/app/public/' . $conseiller->image) }}')"></div>
                                <div class="muni-info">
                                    <h4>{{ $conseiller->lastname . ' ' . $conseiller->firstname }}</h4>
                                    <p>{{ $conseiller->occupation }}</p>
                                    <div class="social">
                                        <a href=""><i class="bi bi-envelope"></i></a>
                                        <a href=""><i class="bi bi-whatsapp"></i></a>
                                        <a href=""><i class="bi bi-telephone"></i></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div> --}}

            </div>

        </section>


@endsection

@section('script')
    <script src="{{ asset('styles/mdb/js/jquery.js') }}"></script>
    <script src="{{ asset('styles/visitors/OwlCarousel2/dist/owl.carousel.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#municipalOwl').owlCarousel({
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
