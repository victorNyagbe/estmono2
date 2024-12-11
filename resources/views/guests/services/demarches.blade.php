@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/services/demarches.css') }}">
@endsection

@section('content')
    <div class="banner-background">
        <div class="banner-filter">
            <h4 class="banner-title text-center animate__animated animate__rotateInUpLeft animate__repeat-1 animate__slower">Démarches administratives</h4>
        </div>
    </div>
    <div class="container-fluid custom-banner">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-12">
                    <p class="text-center">
                        Un texte descriptif définissant les démarches administratives et présentant
                        globalement toutes les démarches administratives.
                        Un texte descriptif définissant les démarches administratives et présentant
                        globalement toutes les démarches administratives.
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="accordion" id="accordionExample275">
                        <div class="card z-depth-0 bordered">
                            <div class="card-header" id="headingOne2">
                                <h5 class="mb-0 d-flex justify-content-between" data-toggle="collapse" data-target="#collapseOne2"
                                aria-expanded="true" aria-controls="collapseOne2">
                                    <a href="#!" onclick="event.preventDefault();">
                                        Etat civil
                                    </a>
                                    <span>&minus;</span>
                                </h5>
                            </div>
                            <div id="collapseOne2" class="collapse show" aria-labelledby="headingOne2"
                                data-parent="#accordionExample275">
                                <div class="card-body">
                                    Un texte decriptif concernant la demarche administrative sera renseignée ici et plus
                                    Un texte decriptif concernant la demarche administrative sera renseignée ici et plus
                                    Un texte decriptif concernant la demarche administrative sera renseignée ici et plus
                                    Un texte decriptif concernant la demarche administrative sera renseignée ici et plus
                                    Un texte decriptif concernant la demarche administrative sera renseignée ici et plus
                                    Un texte decriptif concernant la demarche administrative sera renseignée ici et plus
                                    Un texte decriptif concernant la demarche administrative sera renseignée ici et plus
                                </div>
                            </div>
                        </div>
                        <div class="card z-depth-0 bordered">
                            <div class="card-header" id="headingTwo2">
                                <h5 class="mb-0 d-flex justify-content-between" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="false"
                                aria-controls="collapseTwo2">
                                    <a href="#!" onclick="event.preventDefault();">PROCES VERBAL DU CONSEIL DE FAMILLE ET CERTIFICAT D'HEREDITE</a>
                                    <span>&plus;</span>
                                </h5>
                            </div>
                            <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo2"
                                data-parent="#accordionExample275">
                                <div class="card-body">
                                    Un texte decriptif concernant la demarche administrative sera renseignée ici et plus
                                    Un texte decriptif concernant la demarche administrative sera renseignée ici et plus
                                    Un texte decriptif concernant la demarche administrative sera renseignée ici et plus
                                    Un texte decriptif concernant la demarche administrative sera renseignée ici et plus
                                    Un texte decriptif concernant la demarche administrative sera renseignée ici et plus
                                    Un texte decriptif concernant la demarche administrative sera renseignée ici et plus
                                    Un texte decriptif concernant la demarche administrative sera renseignée ici et plus
                                </div>
                            </div>
                        </div>
                        <div class="card z-depth-0 bordered">
                            <div class="card-header" id="headingThree2">
                                <h5 class="mb-0 d-flex justify-content-between" data-toggle="collapse"
                                data-target="#collapseThree2" aria-expanded="false" aria-controls="collapseThree2">
                                    <a href="#!" onclick="event.preventDefault();">EXTRAIT D'ACTE DE NAISSANCE</a>
                                    <span>&plus;</span>
                                </h5>
                            </div>
                            <div id="collapseThree2" class="collapse" aria-labelledby="headingThree2"
                                data-parent="#accordionExample275">
                                <div class="card-body">
                                    Un texte decriptif concernant la demarche administrative sera renseignée ici et plus
                                    Un texte decriptif concernant la demarche administrative sera renseignée ici et plus
                                    Un texte decriptif concernant la demarche administrative sera renseignée ici et plus
                                    Un texte decriptif concernant la demarche administrative sera renseignée ici et plus
                                    Un texte decriptif concernant la demarche administrative sera renseignée ici et plus
                                    Un texte decriptif concernant la demarche administrative sera renseignée ici et plus
                                    Un texte decriptif concernant la demarche administrative sera renseignée ici et plus
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('.collapse').on('shown.bs.collapse', function () {
                let getCollapseId = $(this).attr('aria-labelledby');

                $('#' + getCollapseId).css({
                    'background-image' : 'linear-gradient(to right, #6d8d3d, #8dbf44, #8bcd28)',
                    'color' : 'white'
                });

                $('#' + getCollapseId + ' a').css({
                    'color' : 'white'
                });

                $('#' + getCollapseId + ' span').html('&minus;');
            });

            $('.collapse').on('hidden.bs.collapse', function () {
                let getCollapseId = $(this).attr('aria-labelledby');

                $('#' + getCollapseId).css({
                    'background-image' : 'none',
                    'background-color' : 'white',
                    'color' : '#006130'
                });

                $('#' + getCollapseId + ' a').css({
                    'color' : '#006130'
                });

                $('#' + getCollapseId + ' span').html('&plus;');
            });
        });
    </script>
@endsection
