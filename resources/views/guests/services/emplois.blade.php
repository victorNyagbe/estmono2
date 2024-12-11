@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/services/emplois.css') }}">
@endsection

@section('content')
    <div class="banner-background">
        <div class="banner-filter">
            <h4 class="banner-title text-center animate__animated animate__rotateInUpLeft animate__repeat-1 animate__slower">Emplois</h4>
        </div>
    </div>

    <div class="container-fluid custom-banner">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h4 class="text-center presentation-text">
                        Politique d'emploi de la commune
                    </h4>
                </div>
                <div class="col-12">
                    <p class="text-center">
                        La commune met en place des mesures pour favoriser l’accès à l’emploi des jeunes au sein de la commune. Elle sensibilise les habitants de la commune sur l’entreprenariat et sur le monde du travail pour les jeunes afin de les encourager à se former et à créer leur propre emploi.
                    </p>
                </div>

                <div class="col-12">
                    <h4 class="text-center presentation-text">
                        Offre d'emploi
                    </h4>
                </div>
                <div class="col-12">
                    <p class="text-center">
                        <b>Aucun offre disponible en ce jour !</b>
                    </p>
                </div>

                <div class="col-12 projet-title">
                    <h4>
                        Projets et réalisations de la commune dans le domaine de l'emploi
                    </h4>
                </div>
                <div class="col-12">
                    <p class="text-center">
                        <b>A renseigner !!</b>
                    </p>
                </div>

                <div class="col-12 school-title">
                    <h4>
                        Services d'emploi dans la commune
                    </h4>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 mt-2">
                    <div class="d-flex justify-content-center">
                        <h4 class="school-section-title">Service d'emploi public</h4>
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
                        <h4 class="school-section-title">Service d'emploi privé</h4>
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
