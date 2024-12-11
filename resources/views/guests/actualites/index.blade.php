@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/actualites/index.css') }}">
@endsection

@section('content')
    <div class="banner-background">
        <div class="banner-filter">
            <h1 class="animate__animated animate__rotateInUpLeft animate__repeat-1 animate__slower">Nos Actualités</h1>
        </div>
    </div>

    <div class="container-custom">
        <div class="article-container">
            @foreach ($actualites as $actualite)
            <div class="panel" data-aos="fade-up" data-aos-delay="100">
                <figure class="panel-img">
                   <img src="{{ asset('storage/app/public/' . $actualite->image) }}" alt="" loading="lazy">
                </figure>
                <div class="panel-info">
                    <h4 class="panel-title" title="{{ $actualite->title }}">{{ $actualite->title }}</h4>
                    <p class="panel-info-header">
                        <span>
                            <i class="bi bi-calendar-date"></i>
                        </span>
                        <small class="text-muted" style="font-style:italic;">Publiée le {{ \Carbon\Carbon::parse($actualite->created_at)->format('d/m/Y') }}</small>
                    </p>
                    <p class="panel-subtitle">{{ $actualite->subtitle }}</p>
                    <a href="{{ route('guests.actualites.show', $actualite) }}">Tout lire</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

@section('script')

@endsection
