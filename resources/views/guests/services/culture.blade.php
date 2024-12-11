@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/services/culture.css') }}">
@endsection

@section('content')
    <div class="banner-background">
        <div class="banner-filter">
            <h4 class="banner-title text-center animate__animated animate__rotateInUpLeft animate__repeat-1 animate__slower">Culture</h4>
        </div>
    </div>

    <div class="container-fluid custom-banner">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h4 class="text-center presentation-text">
                        Politique culturelle de la commune
                    </h4>
                </div>
                <div class="col-12">
                    <p class="text-center">
 La politique culturelle de la commune vise à sensibiliser les habitants à la diversité culturelle en proposant des manifestations pluridisciplinaires mettant en avant différentes expressions artistiques, tradition, langue et cultures présentes sur le territoire.
La commune met en avant les artistes locaux et reconnait des talents locaux.

                    </p>
                </div>
                <div class="col-12 projet-title">
                    <h4>
                        Projets et réalisations de la commune dans le domaine culturel
                    </h4>
                </div>
                <div class="col-12">
                    <p class="text-center">
                        <b>A renseigner !!</b>
                    </p>
                </div>

                <!-- <div class="col-12 col-md-4 py-4">
                    <div class="educ-img"></div>
                    <p class="statut">En cours</p>
                    <div class="description">
                        <h6>
                            Ouverture d'un centre culturel
                        </h6>
                    </div>
                </div>
                <div class="col-12 col-md-4 py-4">
                   <div class="educ-img"></div>
                   <p class="statut1">Réalisé</p>
                    <div class="description">
                        <h6>
                            Ouverture d'un centre culturel
                        </h6>
                    </div>
                </div>
                <div class="col-12 col-md-4 py-4">
                    <div class="educ-img"></div>
                    <p class="statut">En cours</p>
                    <div class="description">
                        <h6>
                            Ouverture d'un centre culturel
                        </h6>
                    </div>
                </div> -->

                <div class="col-12 school-title">
                    <h4>
                        Centres culturels dans la commune
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
                        <h4 class="school-section-title">Centre culturel public</h4>
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
                                    <th>CENTRE CULTUREL</th>
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
                        <h4 class="school-section-title">Centre culturel privé</h4>
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
                                    <th>CENTRE CULTUREL</th>
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
