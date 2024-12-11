@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/guests/css/annonces/show.css') }}">
    <style>
        .annonce-image img {
            width: 100%;
            aspect-ratio: 16/9;
            object-fit: cover;
            object-position: top;
            height: 60vh;
        }

        @media screen and (max-width: 769px) {
            .annonce-image img {
                height: 30vh;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container customized py-4  annonces-container">
        <div class="row mb-4">
            <div class="col-12 mb-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('guests.annonces.index') }}">Annonces</a></li>
                      <li class="breadcrumb-item active">Détails</li>
                    </ol>
                </nav>
            </div>
            <div class="col-12">
                <h5 class="text-center mb-5" style="font-weight: 900; font-size: 1.7rem">{{ $annonce->title }}</h5>
                <div class="annonce-image mb-4">
                    <img src="{{ asset('storage/app/public/' . $annonce->image) }}" alt="" loading="lazy">
                </div>
                <div>{!! $annonce->body !!}</div>
            </div>
        </div>
    </div>
@endsection
