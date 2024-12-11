@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/galerie.css') }}">
@endsection

@section('content')
    <div class="banner-background">
        <div class="banner-filter">
            <h1 class="animate__animated animate__rotateInUpLeft animate__repeat-1 animate__slower">Galerie</h1>
        </div>
    </div>
    <div class="container-fluid section-custom pt-5">
        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            @foreach ($galleries as $gallery)
                <div class="col-6 col-md-4 col-lg-3 portfolio-item mb-4">
                    <a href="{{ asset('storage/app/public/' . $gallery->image ) }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="">
                        <div class="gallery-image" style="background-image: url('{{ asset('storage/app/public/' . $gallery->image ) }}')"></div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('script')
    
@endsection