@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/OwlCarousel2/dist/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/visitors/OwlCarousel2/dist/assets/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/project/projetEnCour.css') }}">
@endsection

@section('content')
    <!--en tête-->
    <header class="index">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="title-index">
                        <h1>Projets en cours</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <!--contenu-->

        <section id="list" class="section-bg">
            <div class="container">
                <div class="project-container">
                    @foreach ($projects as $project)
                    <div class="project" data-aos="fade-up" data-aos-delay="100">
                        <figure class="project-img">
                            <img src="{{ asset('storage/app/public/' . $project->image) }}" alt="Image de :{{ $project->title }}" loading="lazy">
                        </figure>
                        <div class="project-info">
                            <h4 class="project-title" title="{{ $project->title }}">{{ $project->title }}</h4>
                            <p class="card-text">
                                <span>
                                    <i class="bi bi-calendar-date"></i>
                                </span>
                                <small class="text-muted" style="font-style:italic;">Publiée le {{ \Carbon\Carbon::parse($project->created_at)->format('d/m/Y') }}</small>
                            </p>
                            <p class="project-subtitle">{{ $project->subtitle }}</p>
                            <a href="{{ route('guests.projects.projetEnCourShow', $project) }}" >TOUT LIRE</a>
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
