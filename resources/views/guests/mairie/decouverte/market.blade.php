@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/mairie/decouverte/market.css') }}">
@endsection

@section('content')

    <div class="banner-background">
        <div class="banner-filter">
            <h4 class="banner-title text-center animate__animated animate__rotateInUpLeft animate__repeat-1 animate__slower">Marchés</h4>
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
                                        <img src="{{ asset('assets/images/decouv/marché.png') }}" alt="">
                                    </div>
                                    <div class="icon-title">
                                        Les marchés au sein de la commune
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="cadre">
                                <div class="counter">
                                    <div class="number">
                                        <span class="number-counter">1000</span>
                                    </div>
                                    <div class="number-name">
                                        Marchés
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
                        <div class="place-img" style="background-image: url('{{ asset('assets/images/marche.jpg') }}');"></div>
                    </div>
                    <div class="col-12 col-md-8">
                        <table class="table table-white">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">type de marché</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Marchés Inter-régionaux</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Marchés régionaux</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Marchés préfectoraux</td>
                                </tr>
                                <tr>
                                    <th scope="row">12</th>
                                    <td>Marchés communaux</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-5">
            <div class="col-12">
                <h4 class="title">LISTES DES MARCHES AU SEIN DE LA COMMUNE</h4>
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
                                    Marchés Inter-régionaux
                                </a>
                                <span>&plus;</span>
                            </h5>
                        </div>
                        <div id="collapseOne2" class="collapse" aria-labelledby="headingOne2"
                            data-parent="#accordionExample275">
                            <div class="card-body">
                                <table class="table table-white">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Quartier</th>
                                            <th scope="col">Jours d'animation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Marché de Morétan</th>
                                            <td>Morétan</td>
                                            <td>Lundi</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Marché d'Issati</th>
                                            <td>Issati</td>
                                            <td>Vendredi</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Marché de Yanda</th>
                                            <td>Yanda</td>
                                            <td>Mardi</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card z-depth-0 bordered">
                        <div class="card-header" id="headingTwo2">
                            <h5 class="mb-0 d-flex justify-content-between list-name" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="false"
                            aria-controls="collapseTwo2">
                                <a href="#!" onclick="event.preventDefault();">Marchés régionaux</a>
                                <span>&plus;</span>
                            </h5>
                        </div>
                        <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo2"
                            data-parent="#accordionExample275">
                            <div class="card-body">
                                <table class="table table-white">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Quartier</th>
                                            <th scope="col">Jours d'animation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Marché d'Igboloudja</th>
                                            <td>Igboloudja</td>
                                            <td>Mercredi</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card z-depth-0 bordered">
                        <div class="card-header" id="headingTwo3">
                            <h5 class="mb-0 d-flex justify-content-between list-name" data-toggle="collapse" data-target="#collapseTwo3" aria-expanded="false"
                            aria-controls="collapseTwo3">
                                <a href="#!" onclick="event.preventDefault();">Marchés préfectoraux</a>
                                <span>&plus;</span>
                            </h5>
                        </div>
                        <div id="collapseTwo3" class="collapse" aria-labelledby="headingTwo3"
                            data-parent="#accordionExample275">
                            <div class="card-body">
                                <table class="table table-white">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Quartier</th>
                                            <th scope="col">Jours d'animation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Marché d'Adjogba</th>
                                            <td>Adjogba</td>
                                            <td>Vendredi</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Marché de Kamina</th>
                                            <td>Kamina</td>
                                            <td>Dimanche</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Marché d'Afodji</th>
                                            <td>Afodji</td>
                                            <td>Jeudi</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card z-depth-0 bordered">
                        <div class="card-header" id="headingTwo4">
                            <h5 class="mb-0 d-flex justify-content-between list-name" data-toggle="collapse" data-target="#collapseTwo4" aria-expanded="false"
                            aria-controls="collapseTwo4">
                                <a href="#!" onclick="event.preventDefault();">Marchés communaux</a>
                                <span>&plus;</span>
                            </h5>
                        </div>
                        <div id="collapseTwo4" class="collapse" aria-labelledby="headingTwo4"
                            data-parent="#accordionExample275">
                            <div class="card-body">
                                <table class="table table-white">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Quartier</th>
                                            <th scope="col">Jours d'animation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Marché de Tchékita</th>
                                            <td>Tchékita</td>
                                            <td>Samedi</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Marché de Yébou-Yébou</th>
                                            <td>Yébou-Yébou</td>
                                            <td>Jeudi</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Marché de Badin-Copé</th>
                                            <td>Badin-Copé</td>
                                            <td>Mercredi</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Marché de Konadabo</th>
                                            <td>Konadabo</td>
                                            <td>Samedi</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Marché d'Ogou Kinko</th>
                                            <td>Ogou Kinko</td>
                                            <td>Jeudi</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Marché d'Eko</th>
                                            <td>Eko</td>
                                            <td>Vendredi</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Marché d'Ogou-Allah</th>
                                            <td>Ogou-Allah</td>
                                            <td>Mardi</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Marché de Kokolo</th>
                                            <td>Kokolo</td>
                                            <td>Jeudi</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Marché d'Ogou-Agrani</th>
                                            <td>Ogou-Agrani</td>
                                            <td>Mardi</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Marché de Modokouté</th>
                                            <td>Modokouté</td>
                                            <td>Vendredi</td>
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
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('script/jquery-numerator.js') }}"></script>
    <script>
        $('document').ready(function () {

            $('.number-counter').numerator({
                duration: 2000,
                toValue: 19
            });

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
