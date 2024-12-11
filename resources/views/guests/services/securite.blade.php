@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/services/securite.css') }}">
@endsection

@section('content')
    <div class="banner-background">
        <div class="banner-filter">
            <h4 class="banner-title text-center animate__animated animate__rotateInUpLeft animate__repeat-1 animate__slower">Sécurité</h4>
        </div>
    </div>

    <div class="container-fluid custom-banner">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h4 class="text-center presentation-text">
                        Politique sécuritaire de la commune
                    </h4>
                </div>
                <div class="col-12">
                    <p class="text-center">
                                    Sur les efforts du gouvernement au plan sécuritaire la commune de l’Est-     
             Mono 2 est doté de 4 postes de la gendarmerie et d’un commissariat de       
               Police.
La commune place la sécurité de ses habitants au cœur de ses priorités en mettant en place des mesures de prévention efficaces. Des patrouilles régulières sont effectuées par les agents de police municipale pour dissuader toute forme de délinquance.
La mairie travaille en étroite collaboration avec les forces de l’ordre en assurant une coordination efficace avec la police communale et la gendarmerie.

                    </p>
                </div>
                <div class="col-12 projet-title">
                    <h4>
                        Projets et réalisations de la commune dans le domaine de la sécurité
                    </h4>
                </div>
                <div class="col-12">
                    <p class="text-center">
                        <b>A renseigner !!</b>
                    </p>
                </div>

                <!-- <div class="col-12 col-md-4 py-4">
                    <div class="secu-img"></div>
                    <p class="statut">En cours</p>
                    <div class="description">
                        <h6>
                            Formation d'adaptation aux ménaces
                        </h6>
                    </div>
                </div>
                <div class="col-12 col-md-4 py-4">
                   <div class="secu-img"></div>
                   <p class="statut1">Réalisé</p>
                    <div class="description">
                        <h6>
                            Formation d'adaptation aux ménaces
                        </h6>
                    </div>
                </div>
                <div class="col-12 col-md-4 py-4">
                    <div class="secu-img"></div>
                    <p class="statut">En cours</p>
                    <div class="description">
                        <h6>
                            Formation d'adaptation aux ménaces
                        </h6>
                    </div>
                </div> -->

                <div class="col-12 school-title">
                    <h4>
                        Services de sécurité dans la commune
                    </h4>
                </div>
                <!-- <div class="col-12">
                    <p>
                        Un texte descriptif ou tout autre sera renseigné ici. Un texte descriptif ou tout autre sera renseigné
                        ici. Un texte descriptif ou tout autre sera renseigné ici. Un texte descriptif ou tout autre sera
                        renseigné ici. Un texte descriptif ou tout autre sera renseigné ici. Un texte descriptif ou tout
                        autre sera renseigné ici. Un texte descriptif ou tout autre sera renseigné ici. Un texte descriptif
                        ou tout autre sera renseigné ici. Un texte descriptif ou tout autre sera renseigné ici. Un texte
                        descriptif ou tout autre sera renseigné ici.
                    </p>
                </div> -->
            </div>

            <div class="row justify-content-center">
                <div class="col-12 mt-2">
                    <div class="d-flex justify-content-center">
                        <h4 class="school-section-title">Service sécuritaire public</h4>
                    </div>
                </div>

                <div class="col-12 mt-3 mb-4">
                    <div class="table-responsive table-responsive-md text-nowrap" data-aos="flip-left"
                    data-aos-easing="ease-out-cubic"
                    data-aos-duration="2000">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr style="background-color: #2b3481; color: white; text-align: center;">
                                    <th width="50">N°</th>
                                    <th>SERVICE</th>
                                    <th>CONTACT</th>
                                    <th>RESPONSABLE</th>
                                    <th width="80">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>A renseigner !!</td>
                                    <td>A renseigner !!</td>
                                    <td>A renseigner !!</td>
                                    <td><a href="tel:+" class="btn btn-sm btn-primary text-white"><i class="fa fa-phone"></i></a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>A renseigner !!</td>
                                    <td>A renseigner !!</td>
                                    <td>A renseigner !!</td>
                                    <td><a href="tel:+" class="btn btn-sm btn-primary text-white"><i class="fa fa-phone"></i></a></td>
                                </tr>
                                 <tr>
                                    <td>3</td>
                                    <td>A renseigner !!</td>
                                    <td>A renseigner !!</td>
                                    <td>A renseigner !!</td>
                                    <td><a href="tel:+" class="btn btn-sm btn-primary text-white"><i class="fa fa-phone"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-12 mt-2">
                    <div class="d-flex justify-content-center">
                        <h4 class="school-section-title">Service sécurtitaire privée</h4>
                    </div>
                </div>

                <div class="col-12 my-3">
                    <div class="table-responsive table-responsive-md text-nowrap" data-aos="flip-left"
                    data-aos-easing="ease-out-cubic"
                    data-aos-duration="1000">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr style="background-color: #2b3481; color: white; text-align: center;">
                                    <th width="50">N°</th>
                                    <th>SERVICE</th>
                                    <th>CONTACT</th>
                                    <th>RESPONSABLE</th>
                                    <th width="80">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>A renseigner !!</td>
                                    <td>A renseigner !!</td>
                                    <td>A renseigner !!</td>
                                    <td><a href="tel:+" class="btn btn-sm btn-primary text-white"><i class="fa fa-phone"></i></a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>A renseigner !!</td>
                                    <td>A renseigner !!</td>
                                    <td>A renseigner !!</td>
                                    <td><a href="tel:+" class="btn btn-sm btn-primary text-white"><i class="fa fa-phone"></i></a></td>
                                </tr>
                                 <tr>
                                    <td>3</td>
                                    <td>A renseigner !!</td>
                                    <td>A renseigner !!</td>
                                    <td>A renseigner !!</td>
                                    <td><a href="tel:+" class="btn btn-sm btn-primary text-white"><i class="fa fa-phone"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
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
