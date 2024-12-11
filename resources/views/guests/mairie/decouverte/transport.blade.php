@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/mairie/decouverte/transport.css') }}">
@endsection

@section('content')

    <div class="banner-background">
        <div class="banner-filter">
            <h4 class="banner-title text-center animate__animated animate__rotateInUpLeft animate__repeat-1 animate__slower">Les cooperatives</h4>
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
                                        <img src="{{ asset('assets/images/cooperative.png') }}" alt="">
                                    </div>
                                    <div class="icon-title">
                                        Les coopératives au sein de la commune
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="cadre">
                                <div class="counter">
                                    <div class="number">
                                        <span class="number-counter">300</span>
                                    </div>
                                    <div class="number-name">
                                        Coopératives
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
                                    <th scope="col">Nom</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Coopératives</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h4 class="title">LISTE DES COOPERATIVES AU SEIN DE LA COMMUNE</h4>
            </div>
        </div>

        {{-- <div class="row justify-content-center list-title">
            <div class="col-12">
                <div class="accordion" id="accordionExample275">
                    <div class="card z-depth-0 bordered">
                        <div class="card-header" id="headingOne2">
                            <h5 class="mb-0 d-flex justify-content-between list-name" data-toggle="collapse" data-target="#collapseOne2"
                            aria-expanded="true" aria-controls="collapseOne2">
                                <a href="#!" onclick="event.preventDefault();">
                                    Les coopératives
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
                                            <th scope="row">Nom Station</th>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="galery-img" style="background-image: url('{{ asset('assets/images/cooperative.png') }}');">
                    <div class="galery-filter">
                        <div class="galery-name">
                            <h4> Coopérative kadjogbé de Kamina </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="galery-img" style="background-image: url('{{ asset('assets/images/coop2.png') }}');">
                    <div class="galery-filter">
                        <div class="galery-name">
                            <h4> La FUCEC Katchéré de Morétan </h4>
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
