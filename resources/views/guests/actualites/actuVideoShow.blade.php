@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/actualites/show.css') }}">
    <style>
        .panel-video {
            width: 100%;
            height: 40vh;
        }

        .panel-video2 {
            width: 100%;
            height: 25vh;
        }

        @media screen and (max-width: 768px) {
            .card-body{
                padding: 0
            }

            .panel-video {
                width: 100%;
                height: 25vh;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center py-5" style="background-color: white;">
            <div class="col-12 col-lg-8 mb-4">
                <div class="card">
                    <div class="card-body">
                        @if ($actualite->video_type_id == 1)
                            <video class="panel-video" controls poster="{{ asset('storage/app/public/' . $actualite->poster) }}">
                                <source src="{{ asset('storage/app/public/' . $actualite->video) }}" type="video/mp4">
                            </video>
                        @else
                            <iframe class="panel-video" src="https://www.youtube.com/embed/{{ $actualite->lien }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        @endif

                    </div>
                </div>
                <div class="actualite-title mt-3">
                    <h4>{{ $actualite->titre }}</h4>
                </div>
                {{-- <div class="actualite-calendar"><span class="bx bx-calendar-event"></span> Postée le, {{ \Carbon\Carbon::parse($actualite->created_at)->format('d/m/Y') }}</div>
                <div class="actualite-description">
                    {!! $actualite->text !!}
                </div> --}}
            </div>
            <div class="col-12 col-lg-4 mt-5 mt-lg-0">
                <h4 class="other-actualites mt-5 mt-lg-0"><span class="bx bx-news"></span> Voir autres</h4>
                <div class="row">
                    @foreach ($other_actualites as $other_actualite)
                        <div class="col-12" data-aos="fade-up" data-aos-delay="100">
                            <div class="other-actualites-panel">
                                @if ($other_actualite->video_type_id == 1)
                                    <video class="panel-video2" controls poster="{{ asset('storage/app/public/' . $other_actualite->poster) }}">
                                        <source src="{{ asset('storage/app/public/' . $other_actualite->video) }}" type="video/mp4">
                                    </video>
                                @else
                                    <iframe class="panel-video2" src="https://www.youtube.com/embed/{{ $other_actualite->lien }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                @endif
                                <div class="other-actualites-info">
                                    <h6 class="other-actualites-title text-uppercase" title="{{ $other_actualite->titre }}">{{ $other_actualite->titre }}</h6>
                                    <p class="other-actualites-date">
                                        <small>Postée le {{ \Carbon\Carbon::parse($other_actualite->created_at)->format('d/m/Y') }}</small>
                                        <a href="{{ route('guests.actualites.actuVideoShow', $other_actualite) }}" class="show-more">Lire la vidéo</a>
                                    </p>
                                </div>
                            </div>
                            <hr style="background-color: #4d2600;">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
