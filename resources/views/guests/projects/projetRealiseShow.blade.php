@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/OwlCarousel2/dist/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/visitors/OwlCarousel2/dist/assets/owl.theme.default.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('styles/visitors/css/boot/bootstrap.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/project/show.css') }}">
@endsection

@section('content')
<section class="contenu">
    <div class="fond-filter">
        <div class="container show">
        <!-- Stack the columns on mobile by making one full-width and the other half-width -->
            <div class="row mt-3">
                <div class="col-md-8">
                    <p><a href="{{ route('guests.projects.projetRealise') }}" style="font-size:1.2em;text-decoration:none;" class="return-projet">&larr; Les projets</a></p>
                    <div class="card mb-3 big-show">
                        <div class="big-show-img" style="background-image: url('{{ asset('storage/app/public/' . $project->image) }}');"></div>
                        <div class="card-body">
                            <h5 class="card-title big-show-title">{{ $project->title }}</h5>
                            <p class="card-text"><span><i class="bi bi-calendar-date"></i></span> <small class="text-muted" style="font-style:italic;"> Postée le, {{ \Carbon\Carbon::parse($project->created_at)->format('d/m/Y') }}</small></p>
                                <p class="card-text big-show-text"> {!! $project->text !!}  </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <p class="top-small-show">Autres projets</p>
                    <hr>
                    @foreach ($other_projects as $other_project)
                        <div class="card mb-3 small-card small-show">
                            <div class="row g-0">

                                    <div class="col-4">
                                        <div class="small-show-img" style="background-image: url('{{ asset('storage/app/public/' . $other_project->image) }}')"></div>
                                    </div>
                                    <div class="col-8">
                                        <div class="card-body">
                                            <h5 class="card-title small-show-title" title="{{ $other_project->title }}">{{ strlen($other_project->title) > 20 ? \Illuminate\Support\Str::substr($other_project->title, 0, 20) . '...' : $other_project->title }} </h5>
                                        <p class="card-text small-show-text">{{ strlen($other_project->subtitle) > 30 ? \Illuminate\Support\Str::substr($other_project->subtitle, 0, 30) . '...' : $other_project->subtitle  }} </p>
                                            <p class="card-text">
                                                <small class="text-muted small-show-date">Postée le {{ \Carbon\Carbon::parse($other_project->created_at)->format('d/m/Y') }}
                                                    <span style="font-size: 1.2em;font-style:normal;">
                                                        <a class="small-show-link" href="{{ route('guests.projects.projetRealiseShow', $other_project) }}">lire plus</a></br>
                                                    </span>
                                                </small>
                                            </p>
                                        </div>
                                    </div>

                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
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
