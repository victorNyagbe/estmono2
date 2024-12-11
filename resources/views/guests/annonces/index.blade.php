@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/annonces/index.css') }}">
@endsection

@section('content')
    <header class="contact">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="title-contact">
                        <h1>Annonces</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container customized py-4">
        <div class="row justify-container-center">
            <?php $i = 1; ?>
            @foreach ($annonces as $annonce)
                <div class="col-12 col-md-6 mb-4">
                    <div class="annonce-card">
                        <div class="annonce-card-id">
                            <span>{{ __('#') . $i++ }}</span>
                        </div>
                        <div class="annonce-card-text">
                            <h5>{{ $annonce->title }}</h5>
                        </div>
                        <div class="annonce-card-link">
                            <a href="{{ route('guests.annonces.show', $annonce) }}">En savoir plus</a>
                        </div>
                        <div class="annonce-published-at">
                            <small>{{ __('publié le ') . \Carbon\Carbon::parse($annonce->created_at)->format('d-m-Y') }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
