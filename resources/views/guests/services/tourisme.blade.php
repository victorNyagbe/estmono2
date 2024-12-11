@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/services/tourisme.css') }}">
@endsection

@section('content')
    <div class="banner-background">
        <div class="banner-filter">
            <h4 class="banner-title text-center animate__animated animate__rotateInUpLeft animate__repeat-1 animate__slower">Tourisme</h4>
        </div>
    </div>

    <div class="container-fluid custom-banner">
        <div class="container py-4">
            <div class="row">
                <div class="col-12">
                    <div class="presentation">
                        <h4 class="presentation-title">
                            Presentation
                        </h4>
                    </div>
                </div>
                <!-- <div class="presentation">

                    <p class="presentation-text text-center">
                        <b>A renseigner !!</b>
                    </p>
                </div> -->
                <div class="col-12">
                    <p class="text-center">
                        La commune Est-Mono 2 possède une riche culture traditionnelle avec des festivals des danses et des artisanats locaux.
Dans le cadre de la promotion culturelle la mairie met en avant ses paysages pittoresques, ses forêts et ses rivières en encourageant des activités comme la randonnée, l’écotourisme et les excursions en plein air.
Pour la pérennisation des sites touristiques la mairie investit dans l’amélioration des infrastructures telles que les routes, les hébergements et les services de restauration.

                    </p>
                </div>
            </div>
            <div class="row justify-content-center">

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
