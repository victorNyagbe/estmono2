@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/services/sante.css') }}">
@endsection

@section('content')
    <div class="banner-background">
        <div class="banner-filter">
            <h4 class="banner-title text-center animate__animated animate__rotateInUpLeft animate__repeat-1 animate__slower">Santé</h4>
        </div>
    </div>

    <div class="container-fluid custom-banner">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h4 class="text-center presentation-text">
                        Politique sanitaire de la commune
                    </h4>
                </div>
                <div class="col-12">
                    <p class="text-center">
                        La mairie met en place des actions visant à sensibiliser les habitants aux bonnes pratiques de santé comme la prévention des maladies cardiovasculaires, la lutte contre le tabagisme, la promotion de l’activité physique et d’une alimentation équilibrée.
                    </p>
                </div>

                <div class="col-12 projet-title">
                    <h4>
                        Projets et réalisations de la commune dans le domaine sanitaire
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
                            Création d'un centre de santé
                        </h6>
                    </div>
                </div>
                <div class="col-12 col-md-4 py-4">
                   <div class="educ-img"></div>
                   <p class="statut1">Réalisé</p>
                    <div class="description">
                        <h6>
                            Création d'un centre de santé
                        </h6>
                    </div>
                </div>
                <div class="col-12 col-md-4 py-4">
                    <div class="educ-img"></div>
                    <p class="statut">En cours</p>
                    <div class="description">
                        <h6>
                            Création d'un centre de santé
                        </h6>
                    </div>
                </div> -->

                <!-- <div class="col-12 school-title">
                    <h4>
                        Institutions sanitaires dans la commune
                    </h4>
                </div>
                <div class="col-12">
                    <p>
                        ici sera inserer un descriptif sur les institutions sanitaires de la commune de la commune ici sera inserer un descriptif sur les institutions sanitaires de la commune de la commune
                        ici sera inserer un descriptif sur les institutions sanitaires de la commune de la commune ici sera inserer un descriptif sur les institutions sanitaires de la commune de la commune
                        ici sera inserer un descriptif sur les institutions sanitaires de la commune de la commune ici sera inserer un descriptif sur les institutions sanitaires de la commune de la commune
                    </p>
                </div> -->
            </div>

            <!-- <div class="row justify-content-center">
                <div class="col-12 mt-2">
                    <div class="d-flex justify-content-center">
                        <h4 class="school-section-title">Hôpital public</h4>
                    </div>
                </div>

                <div class="col-12 mt-3 mb-4">
                    <div class="table-responsive table-responsive-md text-nowrap" data-aos="flip-left"
                    data-aos-easing="ease-out-cubic"
                    data-aos-duration="2000">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr style="background-color: #006130; color: white; text-align: center;">
                                    <th width="50">N°</th>
                                    <th>Hôpital</th>
                                    <th>STATUTS</th>
                                    <th>CONTACT</th>
                                    <th>RESPONSABLE</th>
                                    <th width="80">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>CMS ......</td>
                                    <td>General</td>
                                    <td>90 XX XX XX</td>
                                    <td>M. INCONNU anonymous</td>
                                    <td><a href="tel:+" class="btn btn-sm btn-primary text-white"><i class="fa fa-phone"></i></a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Clinique ......</td>
                                    <td>Pediatrie</td>
                                    <td>90 XX XX XX</td>
                                    <td>M. ANONYLOUS Inconnu</td>
                                    <td><a href="tel:+" class="btn btn-sm btn-primary text-white"><i class="fa fa-phone"></i></a></td>
                                </tr>
                                 <tr>
                                    <td>3</td>
                                    <td>CMS ........</td>
                                    <td>Ophtamologie</td>
                                    <td>90 XX XX XX</td>
                                    <td>M. INCONNU anonymous</td>
                                    <td><a href="tel:+" class="btn btn-sm btn-primary text-white"><i class="fa fa-phone"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-12 mt-2">
                    <div class="d-flex justify-content-center">
                        <h4 class="school-section-title">Hôpital privé</h4>
                    </div>
                </div>

                <div class="col-12 my-3">
                    <div class="table-responsive table-responsive-md text-nowrap" data-aos="flip-left"
                    data-aos-easing="ease-out-cubic"
                    data-aos-duration="1000">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr style="background-color: #006130; color: white; text-align: center;">
                                    <th width="50">N°</th>
                                    <th>Hôpital</th>
                                    <th>STATUTS</th>
                                    <th>CONTACT</th>
                                    <th>RESPONSABLE</th>
                                    <th width="80">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Clinique .......</td>
                                    <td>Gynécologie</td>
                                    <td>90 XX XX XX</td>
                                    <td>M. INCONNU anonymous</td>
                                    <td><a href="tel:+" class="btn btn-sm btn-primary text-white"><i class="fa fa-phone"></i></a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Centre de santé .......</td>
                                    <td>Pediatrie</td>
                                    <td>90 XX XX XX</td>
                                    <td>M. ANONYLOUS Inconnu</td>
                                    <td><a href="tel:+" class="btn btn-sm btn-primary text-white"><i class="fa fa-phone"></i></a></td>
                                </tr>
                                 <tr>
                                    <td>3</td>
                                    <td>Clinique .......</td>
                                    <td>Maternité</td>
                                    <td>90 XX XX XX</td>
                                    <td>M. INCONNU anonymous</td>
                                    <td><a href="tel:+" class="btn btn-sm btn-primary text-white"><i class="fa fa-phone"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('document').ready(function () {

        });
    </script>
@endsection
