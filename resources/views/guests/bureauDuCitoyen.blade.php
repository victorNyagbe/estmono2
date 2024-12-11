@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/bureauDuCitoyen.css') }}">
@endsection

@section('content')
    <div class="banner-background">
        <div class="banner-filter">
            <h1 class="animate__animated animate__rotateInUpLeft animate__repeat-1 animate__slower">Bureau du citoyen</h1>
        </div>
    </div>
    <div class="container-fluid custom-container py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-4 mb-4">
                    <div class="faq-panel">
                        <span class="icon"><i class="fa fa-edit"></i></span>
                        <h5 class="title">Foire aux questions</h5>
                        <p class="description">
                            Ce panel vous dirige sur les questions fréquentes que la
                            population pose souvent au bureau de la commune. Les réponses
                            ont été données à chaque question énumérée.
                        </p>
                        <a href="{{ route('guests.faq') }}" class="btn btn-sm btn-success text-center"> Découvrir <i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="discuss-panel">
                        <span class="icon"><i class="fa fa-comments"></i></span>
                        <h5 class="title">Discuter avec le bureau</h5>
                        <p class="description">
                            Ce panel vous dirige sur une page vous permettant de rentrer en discussion
                            avec le bureau de la commune. Un coordonnateur répondra à vos préoccupations.
                        </p>
                        <a href="{{ route('guests.startConversation') }}" class="btn btn-sm btn-success text-center"> Découvrir <i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="rue-panel">
                        <span class="icon"><i class="fa fa-road"></i></span>
                        <h5 class="title">Dans ma rue</h5>
                        <p class="description">
                            Ce panel vous dirige sur la page vous permettant d'envoyer des images dans
                            l'optique de participer à l'amélioration de la qualité des espaces
                            publics et autres de la commune.
                        </p>
                        <a href="{{ route('guests.dansMaRue') }}" class="btn btn-sm btn-success text-center"> Découvrir <i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
