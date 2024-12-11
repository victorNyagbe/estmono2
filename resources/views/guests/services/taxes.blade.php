@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/services/taxes.css') }}">
@endsection

@section('content')
    <div class="banner-background">
        <div class="banner-filter">
            <h4 class="banner-title text-center animate__animated animate__rotateInUpLeft animate__repeat-1 animate__slower">Taxes</h4>
        </div>
    </div>

    <div class="container-fluid custom-banner">
        <div class="container py-4 px-4" style="background-color: rgba(255, 255, 255, 0.6)">
            <div class="row justify-content-center">
                {{-- <div class="col-12">
                    <h4 class="text-center presentation-text">
                        Politique de taxation de la commune
                    </h4>
                </div> --}}


                {{-- <div class="col-12">
                    <h4 class="school-title">
                        Services de taxations dans la commune
                    </h4>
                </div> --}}
            </div>

            <div class="row justify-content-center">
                <div class="col-12 mt-2">
                    <div class="d-flex justify-content-center">
                        <h4 class="school-section-title">Service de taxation public</h4>
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
                                    <td>La comptabilité</td>
                                    <td>93 31 99 91</td>
                                    <td>OSSENI Boladji</td>
                                    <td><a href="tel:+93319991" class="btn btn-sm btn-primary text-white"><i class="fa fa-phone"></i></a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Le recouvrement</td>
                                    <td>90 24 55 54</td>
                                    <td>AGUIDI Séna</td>
                                    <td><a href="tel:+90245554" class="btn btn-sm btn-primary text-white"><i class="fa fa-phone"></i></a></td>
                                </tr>
                                 <tr>
                                    <td>3</td>
                                    <td>La régie des recettes</td>
                                    <td>91 64 24 19</td>
                                    <td>KOMLAN Yao</td>
                                    <td><a href="tel:+91642419" class="btn btn-sm btn-primary text-white"><i class="fa fa-phone"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- <div class="col-12 mt-2">
                    <div class="d-flex justify-content-center">
                        <h4 class="school-section-title">Service de taxation privée</h4>
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
            </div> --}}
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('document').ready(function () {

        });
    </script>
@endsection
