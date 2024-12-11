@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/mairie/decouverte/hospital.css') }}">
@endsection

@section('content')

    <div class="banner-background">
        <div class="banner-filter">
            <h4 class="banner-title text-center animate__animated animate__rotateInUpLeft animate__repeat-1 animate__slower">Centre medicaux</h4>
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
                                        <img src="{{ asset('assets/images/hopitale.png') }}" alt="">
                                    </div>
                                    <div class="icon-title">
                                        Les centres medicaux au sein de la commune
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
                                        Hôpitaux
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
                        <div class="place-img" style="background-image: url('{{ asset('assets/images/hopitale.png') }}');"></div>
                    </div>
                    <div class="col-12 col-md-8">
                        <table class="table table-white">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Ville</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>CMS de Morétan</td>
                                    <td>Morétan</td>
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
                <div class="galery-img" style="background-image: url('{{ asset('assets/images/hopitale.png') }}');">
                    <div class="galery-filter">
                        <div class="galery-name">
                            <h4> CMS de Morétan </h4>
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
                toValue: 1
            });
        });
    </script>
@endsection
