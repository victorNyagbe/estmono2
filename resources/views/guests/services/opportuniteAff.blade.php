@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/services/opportuniteAff.css') }}">
@endsection

@section('content')
    <div class="banner-background">
        <div class="banner-filter">
            <h4 class="banner-title text-center animate__animated animate__rotateInUpLeft animate__repeat-1 animate__slower">Opportunités d'affaires</h4>
        </div>
    </div>

    <div class="container-fluid custom-banner">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h4 class="text-center presentation-text">
                        Presentation
                    </h4>
                </div>
                <div class="col-12">
                    <p class="text-center">
                        <b>A renseigner !! </b>
                    </p>
                </div>
                <div class="col-12">
                    <h4 class="projet-title">
                        Découvrer nos opportinutés d'afffaires
                    </h4>
                </div>
                <div class="col-12">
                    <p class="text-center">
                        <b>A renseigner !! </b>
                    </p>
                </div>

                <!-- <div class="col-12 col-md-4 py-4">
                    <div class="opport-img1"></div>
                    <div class="description">
                        <h6>
                            ici.Un texte descriptif ou tout autre sera renseigné ici. Un texte descriptif ou tout autre sera renseigné
                            Un texte descriptif ou tout autre sera renseigné ici. Un texte descriptif ou tout autre sera renseigné 
                            ici. 
                        </h6>
                    </div>
                </div>
                <div class="col-12 col-md-4 py-4">
                   <div class="opport-img2"></div>
                    <div class="description">
                        <h6>
                            ici.Un texte descriptif ou tout autre sera renseigné ici. Un texte descriptif ou tout autre sera renseigné
                            Un texte descriptif ou tout autre sera renseigné ici. Un texte descriptif ou tout autre sera renseigné 
                            ici.
                        </h6>
                    </div>
                </div>
                <div class="col-12 col-md-4 py-4">
                    <div class="opport-img3"></div>
                    <div class="description">
                        <h6>
                            Un texte descriptif ou tout autre sera renseigné ici. Un texte descriptif ou tout autre sera renseigné 
                            ici.Un texte descriptif ou tout autre sera renseigné ici. Un texte descriptif ou tout autre sera renseigné 
                            ici.
                        </h6>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('document').ready(function () {

        });
    </script>
@endsection
