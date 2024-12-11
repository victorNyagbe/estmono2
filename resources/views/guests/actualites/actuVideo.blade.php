@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/actualites/actuVideo.css') }}">
@endsection

@section('content')
    <div class="banner-background">
        <div class="banner-filter">
            <h1 class="animate__animated animate__rotateInUpLeft animate__repeat-1 animate__slower">Nos Actualités/Vidéo</h1>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center custom">
            @foreach ($videos as $video)
                @if ($video->video_type_id == 2)
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="panel">
                            <iframe class="panel-video" src="https://www.youtube.com/embed/{{ $video->lien }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="panel-info">
                                <h4 class="panel-title" title=""> 
                                    {{ $video->titre }}
                                </h4>
                            </div>
                        </div>
                    </div>
                    
                @elseif ($video->video_type_id == 1)
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="panel">
                            <video class="panel-video" controls poster="{{ asset('storage/app/public/' . $video->poster) }}">
                                <source src="{{ asset('storage/app/public/' . $video->video) }}" type="video/mp4">
                            </video>
                            <div class="panel-info">
                                <h4 class="panel-title" title="">{{ $video->titre }}</h4>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            
        </div>
    </div>
@endsection

@section('script')

@endsection
