@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/mairie/decouverte/ecoles.css') }}">
@endsection

@section('content')

    <div class="banner-background">
        <div class="banner-filter">
            <h4 class="banner-title text-center animate__animated animate__rotateInUpLeft animate__repeat-1 animate__slower">Etablissements scolaires</h4>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <div class="back-icons">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="cadre">
                                <div class="icon">
                                    <div class="icon-img">
                                        <img src="{{ asset('assets/images/educ.png') }}" alt="">
                                    </div>
                                    <div class="icon-title">
                                        Les etablissement scolaires au sein de la commune
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="cadre">
                                <div class="counter">
                                    <div class="number">
                                        +<span class="number-counter">1000</span>
                                    </div>
                                    <div class="number-name">
                                        Etablissements
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="place-img"></div>
                    </div>
                    <div class="col-12 col-md-8">
                        <table class="table table-white">
                            <thead>
                                <tr>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">types etablissements</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">13</th>
                                    <td>ECOLES PRESCOLAIRES ET PRIMAIRES</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>COLLEGES ET LYCEES</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>UNIVERSITES</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-12 pt-5">
                <div class="back-icons">
                    <div class="row">
                        <div class="col-12 col-md-3">
                            <div class="block">
                                <div class="icon2">
                                    <div class="icon2-img">
                                        <img src="{{ asset('assets/images/decouv/primaire.png') }}" alt="">
                                    </div>
                                    <div class="icon2-title">
                                        ECOLES PRESCOLAIRES ET PRIMAIRES PUBLIQUES
                                    </div>
                                    <div class="other-numbers">
                                        5
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="block">
                                <div class="icon2">
                                    <div class="icon2-img">
                                        <img src="{{ asset('assets/images/decouv/primaire.png') }}" alt="">
                                    </div>
                                    <div class="icon2-title">
                                        ECOLES  PRESCOLAIRES ET PRIMAIRES CATHOLIQUES
                                    </div>
                                    <div class="other-numbers">
                                        3
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="block">
                                <div class="icon2">
                                    <div class="icon2-img">
                                        <img src="{{ asset('assets/images/decouv/primaire.png') }}" alt="">
                                    </div>
                                    <div class="icon2-title">
                                        ECOLES  PRESCOLAIRES ET PRIMAIRES PROTESTANTES
                                    </div>
                                    <div class="other-numbers">
                                        2
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="block">
                                <div class="icon2">
                                    <div class="icon2-img">
                                        <img src="{{ asset('assets/images/decouv/primaire.png') }}" alt="">
                                    </div>
                                    <div class="icon2-title">
                                        ECOLES  PRESCOLAIRES ET PRIMAIRES ISLAMIQUES
                                    </div>
                                    <div class="other-numbers">
                                        1
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="block">
                                <div class="icon2">
                                    <div class="icon2-img">
                                        <img src="{{ asset('assets/images/decouv/primaire.png') }}" alt="">
                                    </div>
                                    <div class="icon2-title">
                                        ECOLES  PRESCOLAIRES ET PRIMAIRES  PRIVEES LAIQUES
                                    </div>
                                    <div class="other-numbers">
                                        2
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="block">
                                <div class="icon2">
                                    <div class="icon2-img">
                                        <img src="{{ asset('assets/images/decouv/college.png') }}" alt="">
                                    </div>
                                    <div class="icon2-title">
                                        SECONDAIRES I : CEG PUBLICS – Collèges (6e en 3e)
                                    </div>
                                    <div class="other-numbers">
                                        2
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="block">
                                <div class="icon2">
                                    <div class="icon2-img">
                                        <img src="{{ asset('assets/images/decouv/college.png') }}" alt="">
                                    </div>
                                    <div class="icon2-title">
                                        SECONDAIRES II : LYCEES PUBLICS cycle long (6e en Terminale)
                                    </div>
                                    <div class="other-numbers">
                                        1
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="block">
                                <div class="icon2">
                                    <div class="icon2-img">
                                        <img src="{{ asset('assets/images/decouv/college.png') }}" alt="">
                                    </div>
                                    <div class="icon2-title">
                                        SECONDAIRES I : COLLEGES (6e en 3e) ET LYCEES CONFESSIONNELS (6e en Tle)
                                    </div>
                                    <div class="other-numbers">
                                        1
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="block">
                                <div class="icon2">
                                    <div class="icon2-img">
                                        <img src="{{ asset('assets/images/decouv/college.png') }}" alt="">
                                    </div>
                                    <div class="icon2-title">
                                        SECONDAIRES I : COLLEGES  (6een 3e)
                                    </div>
                                    <div class="other-numbers">
                                        1
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="block">
                                <div class="icon2">
                                    <div class="icon2-img">
                                        <img src="{{ asset('assets/images/decouv/school1.jpg') }}" alt="">
                                    </div>
                                    <div class="icon2-title">
                                        UNIVERSITES
                                    </div>
                                    <div class="other-numbers">
                                        2
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-5">
            <div class="col-12">
                <h4 class="title">LISTES DES ETABLISSEMENTS SCOLAIRE AU SEIN DE LA COMMUNE</h4>
            </div>
        </div>

        <div class="row justify-content-center list-title">
            <div class="col-12">
                <div class="accordion" id="accordionExample275">
                    <div class="card z-depth-0 bordered">
                        <div class="card-header" id="headingOne2">
                            <h5 class="mb-0 d-flex justify-content-between list-name" data-toggle="collapse" data-target="#collapseOne2"
                            aria-expanded="true" aria-controls="collapseOne2">
                                <a href="#!" onclick="event.preventDefault();">
                                    ECOLES PRESCOLAIRES ET PRIMAIRES PUBLIQUES
                                </a>
                                <span>&plus;</span>
                            </h5>
                        </div>
                        <div id="collapseOne2" class="collapse" aria-labelledby="headingOne2"
                            data-parent="#accordionExample275">
                            <div class="card-body">
                                <div class="table-responsive table-responsive-md text-nowrap">
                                    <table class="table table-white">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Quartier</th>
                                                <th scope="col">Contact</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="col">1</th>
                                                <th scope="row">Nom Etablissement</th>
                                                <td>Le quartier</td>
                                                <td>90 xx xx xx</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">2</th>
                                                <th scope="row">Nom Etablissement</th>
                                                <td>Le quartier</td>
                                                <td>90 xx xx xx</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">3</th>
                                                <th scope="row">Nom Etablissement</th>
                                                <td>Le quartier</td>
                                                <td>90 xx xx xx</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">4</th>
                                                <th scope="row">Nom Etablissement</th>
                                                <td>Le quartier</td>
                                                <td>90 xx xx xx</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">5</th>
                                                <th scope="row">Nom Etablissement</th>
                                                <td>Le quartier</td>
                                                <td>90 xx xx xx</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card z-depth-0 bordered">
                        <div class="card-header" id="headingTwo2">
                            <h5 class="mb-0 d-flex justify-content-between list-name" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="false"
                            aria-controls="collapseTwo2">
                                <a href="#!" onclick="event.preventDefault();">ECOLES PRESCOLAIRES ET PRIMAIRES CATHOLIQUES</a>
                                <span>&plus;</span>
                            </h5>
                        </div>
                        <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo2"
                            data-parent="#accordionExample275">
                            <div class="card-body">
                                <div class="table-responsive table-responsive-md text-nowrap">
                                    <table class="table table-white">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Quartier</th>
                                                <th scope="col">Contact</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="col">1</th>
                                                <th scope="row">Nom Etablissement</th>
                                                <td>Le quartier</td>
                                                <td>90 xx xx xx</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">2</th>
                                                <th scope="row">Nom Etablissement</th>
                                                <td>Le quartier</td>
                                                <td>90 xx xx xx</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">3</th>
                                                <th scope="row">Nom Etablissement</th>
                                                <td>Le quartier</td>
                                                <td>90 xx xx xx</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card z-depth-0 bordered">
                        <div class="card-header" id="headingThree2">
                            <h5 class="mb-0 d-flex justify-content-between list-name" data-toggle="collapse"
                            data-target="#collapseThree2" aria-expanded="false" aria-controls="collapseThree2">
                                <a href="#!" onclick="event.preventDefault();">ECOLES PRESCOLAIRES ET PRIMAIRES PROTESTANTES</a>
                                <span>&plus;</span>
                            </h5>
                        </div>
                        <div id="collapseThree2" class="collapse" aria-labelledby="headingThree2"
                            data-parent="#accordionExample275">
                            <div class="card-body">
                                <div class="table-responsive table-responsive-md text-nowrap">
                                    <table class="table table-white">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Quartier</th>
                                                <th scope="col">Contacte</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="col">1</th>
                                                <th scope="row">Nom Etablissement</th>
                                                <td>Le quartier</td>
                                                <td>90 xx xx xx</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">2</th>
                                                <th scope="row">Nom Etablissement</th>
                                                <td>Le quartier</td>
                                                <td>90 xx xx xx</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card z-depth-0 bordered">
                        <div class="card-header" id="headingFour2">
                            <h5 class="mb-0 d-flex justify-content-between list-name" data-toggle="collapse"
                            data-target="#collapseFour2" aria-expanded="false" aria-controls="collapseFour2">
                                <a href="#!" onclick="event.preventDefault();">ECOLES PRESCOLAIRES ET PRIMAIRES ISLAMIQUES</a>
                                <span>&plus;</span>
                            </h5>
                        </div>
                        <div id="collapseFour2" class="collapse" aria-labelledby="headingFour2"
                            data-parent="#accordionExample275">
                            <div class="card-body">
                                <div class="table-responsive table-responsive-md text-nowrap">
                                    <table class="table table-white">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Quartier</th>
                                                <th scope="col">Contacte</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="col">1</th>
                                                <th scope="row">Nom Etablissement</th>
                                                <td>Le quartier</td>
                                                <td>90 xx xx xx</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card z-depth-0 bordered">
                        <div class="card-header" id="headingFive2">
                            <h5 class="mb-0 d-flex justify-content-between list-name" data-toggle="collapse"
                            data-target="#collapseFive2" aria-expanded="false" aria-controls="collapseFive2">
                                <a href="#!" onclick="event.preventDefault();">ECOLES PRESCOLAIRES ET PRIMAIRES PRIVEES LAIQUES</a>
                                <span>&plus;</span>
                            </h5>
                        </div>
                        <div id="collapseFive2" class="collapse" aria-labelledby="headingFive2"
                            data-parent="#accordionExample275">
                            <div class="card-body">
                                <div class="table-responsive table-responsive-md text-nowrap">
                                    <table class="table table-white">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Quartier</th>
                                                <th scope="col">Contact</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="col">1</th>
                                                <th scope="row">Nom Etablissement</th>
                                                <td>Le quartier</td>
                                                <td>90 xx xx xx</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">2</th>
                                                <th scope="row">Nom Etablissement</th>
                                                <td>Le quartier</td>
                                                <td>90 xx xx xx</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card z-depth-0 bordered">
                        <div class="card-header" id="headingSix2">
                            <h5 class="mb-0 d-flex justify-content-between list-name" data-toggle="collapse"
                            data-target="#collapseSix2" aria-expanded="false" aria-controls="collapseSix2">
                                <a href="#!" onclick="event.preventDefault();">SECONDAIRES I : CEG PUBLIC – Collèges (6e en 3e)</a>
                                <span>&plus;</span>
                            </h5>
                        </div>
                        <div id="collapseSix2" class="collapse" aria-labelledby="headingSix2"
                            data-parent="#accordionExample275">
                            <div class="card-body">
                                <div class="table-responsive table-responsive-md text-nowrap">
                                    <table class="table table-white">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Quartier</th>
                                                <th scope="col">Contact</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="col">1</th>
                                                <th scope="row">Nom Etablissement</th>
                                                <td>Le quartier</td>
                                                <td>90 xx xx xx</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">2</th>
                                                <th scope="row">Nom Etablissement</th>
                                                <td>Le quartier</td>
                                                <td>90 xx xx xx</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card z-depth-0 bordered">
                        <div class="card-header" id="headingSeven2">
                            <h5 class="mb-0 d-flex justify-content-between list-name" data-toggle="collapse"
                            data-target="#collapseSeven2" aria-expanded="false" aria-controls="collapseSeven2">
                                <a href="#!" onclick="event.preventDefault();">SECONDAIRES II : LYCEE PUBLIC cycle long (6e en Terminale)</a>
                                <span>&plus;</span>
                            </h5>
                        </div>
                        <div id="collapseSeven2" class="collapse" aria-labelledby="headingSeven2"
                            data-parent="#accordionExample275">
                            <div class="card-body">
                                <div class="table-responsive table-responsive-md text-nowrap">
                                    <table class="table table-white">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Quartier</th>
                                                <th scope="col">Contact</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="col">1</th>
                                                <th scope="row">Le lycée de Morétan</th>
                                                <td>Morétan</td>
                                                <td>90 xx xx xx</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card z-depth-0 bordered">
                        <div class="card-header" id="headingEight2">
                            <h5 class="mb-0 d-flex justify-content-between list-name" data-toggle="collapse"
                            data-target="#collapseEight2" aria-expanded="false" aria-controls="collapseEight2">
                                <a href="#!" onclick="event.preventDefault();">SECONDAIRES I : COLLEGE (6e en 3e) ET LYCEE CONFESSIONNEL (6e en Tle)</a>
                                <span>&plus;</span>
                            </h5>
                        </div>
                        <div id="collapseEight2" class="collapse" aria-labelledby="headingEight2"
                            data-parent="#accordionExample275">
                            <div class="card-body">
                                <div class="table-responsive table-responsive-md text-nowrap">
                                    <table class="table table-white">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Quartier</th>
                                                <th scope="col">Contact</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="col">1</th>
                                                <th scope="row">Nom Etablissement</th>
                                                <td>Le quartier</td>
                                                <td>90 xx xx xx</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card z-depth-0 bordered">
                        <div class="card-header" id="headingNine2">
                            <h5 class="mb-0 d-flex justify-content-between list-name" data-toggle="collapse"
                            data-target="#collapseNine2" aria-expanded="false" aria-controls="collapseNine2">
                                <a href="#!" onclick="event.preventDefault();">SECONDAIRES I : COLLEGES (6e en 3e)</a>
                                <span>&plus;</span>
                            </h5>
                        </div>
                        <div id="collapseNine2" class="collapse" aria-labelledby="headingNine2"
                            data-parent="#accordionExample275">
                            <div class="card-body">
                                <div class="table-responsive table-responsive-md text-nowrap">
                                    <table class="table table-white">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Quartier</th>
                                                <th scope="col">Contact</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="col">1</th>
                                                <th scope="row">Nom Etablissement</th>
                                                <td>Le quartier</td>
                                                <td>90 xx xx xx</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card z-depth-0 bordered">
                        <div class="card-header" id="headingTen2">
                            <h5 class="mb-0 d-flex justify-content-between list-name" data-toggle="collapse"
                            data-target="#collapseTen2" aria-expanded="false" aria-controls="collapseTen2">
                                <a href="#!" onclick="event.preventDefault();">UNIVERSITES</a>
                                <span>&plus;</span>
                            </h5>
                        </div>
                        <div id="collapseTen2" class="collapse" aria-labelledby="headingTen2"
                            data-parent="#accordionExample275">
                            <div class="card-body">
                                <div class="table-responsive table-responsive-md text-nowrap">
                                    <table class="table table-white">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Quartier</th>
                                                <th scope="col">Contact</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="col">1</th>
                                                <th scope="row">Nom université</th>
                                                <td>Le quartier</td>
                                                <td>90 xx xx xx</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">2</th>
                                                <th scope="row">Nom université</th>
                                                <td>Le quartier</td>
                                                <td>90 xx xx xx</td>
                                            </tr>
                                        </tbody>
                                    </table>
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
    <script type="text/javascript" src="{{ asset('script/jquery-numerator.js') }}"></script>
    <script>
        $('document').ready(function () {

            $('.number-counter').numerator({
                duration: 2000,
                toValue: 20
            })

            $('.collapse').on('shown.bs.collapse', function () {
                let getCollapseId = $(this).attr('aria-labelledby');

                $('#' + getCollapseId).css({
                    'background-image' : 'linear-gradient(to right, #17182a, #6469c7, #d1dcf4)',
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
                    'color' : '#2b3481'
                });

                $('#' + getCollapseId + ' a').css({
                    'color' : '#2b3481'
                });

                $('#' + getCollapseId + ' span').html('&plus;');
            });

        });
    </script>
@endsection
