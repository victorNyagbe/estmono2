@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/mairie/decouverte/plage.css') }}">
@endsection

@section('content')

    <div class="banner-background">
        <div class="banner-filter">
            <h4 class="banner-title text-center animate__animated animate__rotateInUpLeft animate__repeat-1 animate__slower">Plages</h4>
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
                                        <img src="{{ asset('assets/images/decouv/beach.png') }}" alt="">
                                    </div>
                                    <div class="icon-title">
                                        Les plages au sein de la commune
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
                                        Plages
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
                        <div class="beach-img" style="background-image: url('{{ asset('assets/images/standplage.jpeg') }}');"></div>
                    </div>
                    <div class="col-12 col-md-8">
                        <table class="table table-white">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Adresse</th>
                                    <th scope="col">Ville</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Palm Beach</td>
                                    <td>En face de l'hôtel PALM BEACH</td>
                                    <td>Lomé</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Onomo Plage</td>
                                    <td>En face de l'hôtel ONOMO</td>
                                    <td>Lomé</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="title">
                    <h4>Galerie</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-3">
                <div class="galery-img" style="background-image: url('{{ asset('assets/images/standplage.jpeg') }}');">
                    <div class="galery-filter">
                        <div class="galery-name">
                            <h4> Onomo </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="galery-img" style="background-image: url('{{ asset('assets/images/plage.jpeg') }}');">
                    <div class="galery-filter">
                        <div class="galery-name">
                            <h4> Palm beach </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="galery-img" style="background-image: url('{{ asset('assets/images/standplage.jpeg') }}');">
                    <div class="galery-filter">
                        <div class="galery-name">
                            <h4> Onomo </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="galery-img" style="background-image: url('{{ asset('assets/images/plage.jpeg') }}');">
                    <div class="galery-filter">
                        <div class="galery-name">
                            <h4> Palm beach </h4>
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
        });
    </script>
@endsection
