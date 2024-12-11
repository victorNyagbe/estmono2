@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/services/environnement.css') }}">
@endsection

@section('content')
    <div class="banner-background">
        <div class="banner-filter">
            <h4 class="banner-title text-center animate__animated animate__rotateInUpLeft animate__repeat-1 animate__slower">Environnement</h4>
        </div>
    </div>

    <div class="container-fluid custom-banner">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h4 class="text-center presentation-text">
                        Politique environnemental de la commune
                    </h4>
                </div>
                <div class="col-12">
                    <p class="text-center">
                        La commune Est-Mono 2 est reconnue pour sa politique environnementale ambitieuse et son engagement en faveur de la préservation de la nature et de la durabilité.
La commune favorise la gestion la gestion responsable des déchets en mettant en place des systèmes de collecte sélective.
Des actions de sensibilisation sont également menées pour encourager les habitants à réduire leur production de déchets et à adopter des pratiques plus durables.

                    </p>
                </div>
                <div class="col-12 projet-title">
                    <h4>
                        Projets et réalisations de la commune dans le domaine environnemental
                    </h4>
                </div>
                <div class="col-12">
                    <p class="text-center">
                        <b>A renseigner !!</b>
                    </p>
                </div>

                <!-- <div class="col-12 col-md-4 py-4">
                    <div class="environ-img"></div>
                    <p class="statut">En cours</p>
                    <div class="description">
                        <h6>
                            Etude technico-economique et environnemental
                        </h6>
                    </div>
                </div>
                <div class="col-12 col-md-4 py-4">
                   <div class="environ-img1"></div>
                   <p class="statut1">Réalisé</p>
                    <div class="description">
                        <h6>
                            Journée nationale de l'arbre
                        </h6>
                    </div>
                </div>
                <div class="col-12 col-md-4 py-4">
                    <div class="environ-img2"></div>
                    <p class="statut1">Réalisé</p>
                    <div class="description">
                        <h6>
                            Opération de ville propre
                        </h6>
                    </div>
                </div> -->

                <div class="col-12 school-title">
                    <h4>
                        Services en charges de l'environement dans la commune
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
                        <h4 class="school-section-title">Service environnemental public</h4>
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
                        <h4 class="school-section-title">Service environnemental privé</h4>
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
