@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/OwlCarousel2/dist/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/visitors/OwlCarousel2/dist/assets/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/project/projetRealise.css') }}">
@endsection

@section('content')
    <!--en tête-->
    <header class="index">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="title-index">
                        <h1>Projets réalisés</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <!--contenu-->

        <section id="list" class="list section-bg">
            <div class="container" data-aos="fade-up">
                {{-- <div class="row">
                    <div class="col-12 mb-5">
                        <div class="d-flex justify-content-start">
                            <a href="#" class="btn top-btn mr-2">Proposer un projets <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div> --}}
                <div class="row">
                    @foreach ($projects as $project)
                        <div class="col-md-12 col-lg-4 d-flex align-items-stretch cadre-projet" data-aos="fade-up" data-aos-delay="100">
                            <div class="projet">
                                <div class="projet-img" style="background-image: url('{{ asset('storage/app/public/' . $project->image) }}');"></div>
                                <div class="projet-info">
                                    <h4 title="{{ $project->title }}">{{ strlen($project->title)  > 60 ? \Illuminate\Support\Str::substr($project->title, 0, 60) . '...' : $project->title }}</h4>
                                    <p class="card-text">
                                        <span>
                                            <i class="bi bi-calendar-date"></i>
                                        </span> 
                                        <small class="text-muted" style="font-style:italic;">Publiée le {{ \Carbon\Carbon::parse($project->created_at)->format('d/m/Y') }}</small>
                                    </p>
                                    <p>{{ $project->subtitle . '...' }}</p>
                                    <a href="{{ route('guests.projects.projetRealiseShow', $project) }}" >TOUT LIRE</a>
                                </div>
                            </div>
                        </div>
                     @endforeach
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
