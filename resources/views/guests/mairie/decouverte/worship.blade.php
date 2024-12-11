@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/mairie/decouverte/worship.css') }}">
@endsection

@section('content')

    <div class="banner-background">
        <div class="banner-filter">
            <h4 class="banner-title text-center animate__animated animate__rotateInUpLeft animate__repeat-1 animate__slower">Lieux de cultes</h4>
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
                                        <img src="{{ asset('assets/images/culte.png') }}" alt="">
                                    </div>
                                    <div class="icon-title">
                                        Les lieux de cultes au sein de la commune
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
                                        Lieux
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
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Lieu culte</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Eglise</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mosquée</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-5">
            <div class="col-12">
                <h4 class="title">LISTES DES LIEUX DE CULTE AU SEIN DE LA COMMUNE</h4>
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
                                    Eglises
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Eglise Catholique de Morétan</th>
                                            <td>Morétan</td>
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
                                <a href="#!" onclick="event.preventDefault();">Mosquées</a>
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

                                        </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                            <th scope="row">La mosquée centrale de Morétan</th>
                                            <td>Morétan</td>
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
                toValue: 2
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
