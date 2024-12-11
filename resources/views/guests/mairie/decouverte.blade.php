@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/mairie/decouverte.css') }}">
@endsection

@section('content')
    <div class="banner-background">
        <div class="banner-filter">
            <h4 class="banner-title text-center animate__animated animate__rotateInUpLeft animate__repeat-1 animate__slower">A la decouverte de la commune Est-Mono 2</h4>
        </div>
    </div>

    <div class="container-fluid custom-banner">
        <div class="container pb-4 pt-5">
            <div class="row justify-content-center">
                <!-- <div class="row"> -->
                    <!--<div class="col-12">-->
                    <!--    <div class="decouverte-vid">-->
                    <!--        <video controls poster="{{ asset('assets/images/miniature.jpg') }}">-->
                    <!--            <source src="{{ asset('assets/videos/1.mp4') }}" type="video/mp4">-->
                    <!--        </video>-->
                    <!--    </div>-->
                    <!--</div>-->


                    <div class="col-12 col-md-4 my-4">
                        <div class="decouv py-2">
                            <div>
                                <div class="decouv-img" style="background-image: url('{{ asset('assets/images/educ.png') }}')"></div>
                            </div>
                            <div class="decouv-title">
                                Ecoles / universités
                            </div>
                            <hr>
                            <div class="decouv-text">
                                les ecoles  au sein de la commune
                            </div>
                            <div class="col-12 decouv-btn">
                                <a href="{{ route('guests.mairie.decouverte.ecoles') }}" class="btn">Visiter</a>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-12 col-md-4 my-4">
                        <div class="decouv py-2">
                            <div>
                                <div class="decouv-img" style="background-image: url('{{ asset('assets/images/hotel.jpeg') }}')"></div>
                            </div>
                            <div class="decouv-title">
                                Hôtels
                            </div>
                            <hr>
                            <div class="decouv-text">
                                Les hôtels au sein de la commune
                            </div>
                            <div class="col-12 decouv-btn">
                                <a href="{{ route('guests.mairie.decouverte.hotel') }}" class="btn">Visiter</a>
                            </div>
                        </div>
                    </div> --}}

                    <div class="col-12 col-md-4 my-4">
                        <div class="decouv py-2">
                            <div>
                                <div class="decouv-img" style="background-image: url('{{ asset('assets/images/marche.jpg') }}')"></div>
                            </div>
                            <div class="decouv-title">
                                Marchés
                            </div>
                            <hr>
                            <div class="decouv-text">
                                Les marchés au sein de la commune
                            </div>
                            <div class="col-12 decouv-btn">
                                <a href="{{ route('guests.mairie.decouverte.market') }}" class="btn">Visiter</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 my-4">
                        <div class="decouv py-2">
                            <div>
                                <div class="decouv-img" style="background-image: url('{{ asset('assets/images/culte.png') }}')"></div>
                            </div>
                            <div class="decouv-title">
                                Les lieux de cultes
                            </div>
                            <hr>
                            <div class="decouv-text">
                                les lieux de cultes au sein de la commune
                            </div>
                            <div class="col-12 decouv-btn">
                                <a href="{{ route('guests.mairie.decouverte.worship') }}" class="btn">Visiter</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 my-4">
                        <div class="decouv py-2">
                            <div>
                                <div class="decouv-img" style="background-image: url('{{ asset('assets/images/hopitale.png') }}')"></div>
                            </div>
                            <div class="decouv-title">
                                Centre médicaux / Hôpitaux
                            </div>
                            <hr>
                            <div class="decouv-text">
                                Les Hôpitaux au sein de la commune
                            </div>
                            <div class="col-12 decouv-btn">
                                <a href="{{ route('guests.mairie.decouverte.hospital') }}" class="btn">Visiter</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12 col-md-4 my-4">
                        <div class="decouv py-2">
                            <div>
                                <div class="decouv-img" style="background-image: url('{{ asset('assets/images/cooperative.png') }}')"></div>
                            </div>
                            <div class="decouv-title">
                                Coopératives
                            </div>
                            <hr>
                            <div class="decouv-text">
                                Les services de coopérative au sein de la commune
                            </div>
                            <div class="col-12 decouv-btn">
                                <a href="{{ route('guests.mairie.decouverte.transport') }}" class="btn">Visiter</a>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col-12 col-md-4 my-4">
                        <div class="decouv py-2">
                            <div>
                                <div class="decouv-img" style="background-image: url('{{ asset('assets/images/site.jpg') }}')"></div>
                            </div>
                            <div class="decouv-title">
                                Sites Touristiques
                            </div>
                            <hr>
                            <div class="decouv-text">
                                Les sites touristiques au sein de la commune
                            </div>
                            <div class="col-12 decouv-btn">
                                <a href="{{ route('guests.mairie.decouverte.touristicSite') }}" class="btn">Visiter</a>
                            </div>
                        </div>
                    </div> --}}
                <!-- </div> -->
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
