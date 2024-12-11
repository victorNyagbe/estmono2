@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/guest/OwlCarousel2/dist/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/guest/OwlCarousel2/dist/assets/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/services/social/handicape.css') }}">
@endsection

@section('content')
    <div class="banner-background">
        <div class="banner-filter">
            <h4 class="banner-title text-center animate__animated animate__rotateInUpLeft animate__repeat-1 animate__slower">Handicapés</h4>
        </div>
        <div class="links-btn">
            <div id="slide1" class="links-title slide pointerCursor">
                <a href="{{ route('guests.services.social.age') }}">Personnes agées</a>
            </div>
            <div id="slide2" class="links-title slide pointerCursor">
                <a href="{{ route('guests.services.social.femme') }}">Femmes</a>
            </div>
            <div id="slide-btn" class="links-title pointerCursor">Autres actions <span><i class="bi bi-caret-up-fill"></i></span></div>
        </div>
    </div>

    <div class="container-fluid custom-banner">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h4 class="text-center presentation-text">
                        Politique social de la commune
                    </h4>
                </div>
                <div class="col-12">
                    <p>
                        La commune met en place des actions de prévention et de promotion de la santé pour sensibiliser les habitants aux bonnes pratiques et favoriser leur bien-être.
Sur le plan associative et participative la commune encourage la participation et l’implication des habitants dans la vie locale en soutenant le tissu associatives citoyennes.

                    </p>
                </div>
                <div class="col-12">
                    <h4 class="text-center projet-title">
                        Projets et réalisations de la commune pour les handicapés
                    </h4>
                </div>
                <div class="col-12">
                    <p>
                        Un texte descriptif ou tout autre sera renseigné ici. Un texte descriptif ou tout autre sera renseigné 
                        ici. Un texte descriptif ou tout autre sera renseigné ici. Un texte descriptif ou tout autre sera 
                        renseigné ici. Un texte descriptif ou tout autre sera renseigné ici. Un texte descriptif ou tout 
                        autre sera renseigné ici. Un texte descriptif ou tout autre sera renseigné ici. Un texte descriptif 
                        ou tout autre sera renseigné ici. Un texte descriptif ou tout autre sera renseigné ici. Un texte 
                        descriptif ou tout autre sera renseigné ici.
                    </p>
                </div>

                <div class="col-12 col-md-4 py-4">
                    <div class="handica-img"></div>
                    <p class="statut">En cours</p>
                    <div class="description">
                        <h6>
                            Clôture du projet impact 3d
                        </h6>
                    </div>
                </div>
                <div class="col-12 col-md-4 py-4">
                   <div class="handica-img"></div>
                   <p class="statut1">Réalisé</p>
                    <div class="description">
                        <h6>
                            Clôture du projet impact 3d
                        </h6>
                    </div>
                </div>
                <div class="col-12 col-md-4 py-4">
                    <div class="handica-img"></div>
                    <p class="statut">En cours</p>
                    <div class="description">
                        <h6>
                            Clôture du projet impact 3d
                        </h6>
                    </div>
                </div>

                <div class="col-12">
                    <h4 class="text-center projet-title">
                        Services sociaux (pour handicapé) dans la commune
                    </h4>
                </div>
                <div class="col-12">
                    <p>
                        Un texte descriptif ou tout autre sera renseigné ici. Un texte descriptif ou tout autre sera renseigné 
                        ici. Un texte descriptif ou tout autre sera renseigné ici. Un texte descriptif ou tout autre sera 
                        renseigné ici. Un texte descriptif ou tout autre sera renseigné ici. Un texte descriptif ou tout 
                        autre sera renseigné ici. Un texte descriptif ou tout autre sera renseigné ici. Un texte descriptif 
                        ou tout autre sera renseigné ici. Un texte descriptif ou tout autre sera renseigné ici. Un texte 
                        descriptif ou tout autre sera renseigné ici.
                    </p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 mt-2">
                    <div class="d-flex justify-content-center">
                        <h4 class="school-section-title">Service social public</h4>
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
                                    <th>SERVICE</th>
                                    <th>CONTACT</th>
                                    <th>RESPONSABLE</th>
                                    <th width="80">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Affaires social</td>
                                    <td>91 01 92 45</td>
                                    <td>M. INCONNU anonymous</td>
                                    <td><a href="tel:+" class="btn btn-sm btn-primary text-white"><i class="fa fa-phone"></i></a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Affaires social</td>
                                    <td>96 28 71 65</td>
                                    <td>M. ANONYLOUS Inconnu</td>
                                    <td><a href="tel:+" class="btn btn-sm btn-primary text-white"><i class="fa fa-phone"></i></a></td>
                                </tr>
                                 <tr>
                                    <td>3</td>
                                    <td>Affaires social</td>
                                    <td>91 01 92 45</td>
                                    <td>M. INCONNU anonymous</td>
                                    <td><a href="tel:+" class="btn btn-sm btn-primary text-white"><i class="fa fa-phone"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-12 mt-2">
                    <div class="d-flex justify-content-center">
                        <h4 class="school-section-title">Service social privée</h4>
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
                                    <td>ONG</td>
                                    <td>91 01 92 45</td>
                                    <td>M. INCONNU anonymous</td>
                                    <td><a href="tel:+" class="btn btn-sm btn-primary text-white"><i class="fa fa-phone"></i></a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>ONG</td>
                                    <td>96 28 71 65</td>
                                    <td>M. ANONYLOUS Inconnu</td>
                                    <td><a href="tel:+" class="btn btn-sm btn-primary text-white"><i class="fa fa-phone"></i></a></td>
                                </tr>
                                 <tr>
                                    <td>3</td>
                                    <td>ONG</td>
                                    <td>91 01 92 45</td>
                                    <td>M. INCONNU anonymous</td>
                                    <td><a href="tel:+" class="btn btn-sm btn-primary text-white"><i class="fa fa-phone"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12">
                <h4 class="text-center presentation-text">
                    Nos partenaires
                </h4>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel" id="partnerCarousel">
                    <div class="item">
                        <div class="partner-content">
                            <div class="partner-box">
                                <div class="partner-imgBx">
                                    <!-- <img src="{{ asset('assets/logos/RT.png') }}" alt=""> -->
                                    <h4 class="logo">Logo</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="partner-content">
                            <div class="partner-box">
                                <div class="partner-imgBx">
                                    <!-- <img src="{{ asset('assets/logos/nunya.jpg') }}" alt=""> -->
                                    <h4 class="logo">Logo</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="partner-content">
                            <div class="partner-box">
                                <div class="partner-imgBx">
                                    <!-- <img src="{{ asset('assets/logos/id.jpg') }}" alt=""> -->
                                    <h4 class="logo">Logo</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="item">
                        <div class="partner-content">
                            <div class="partner-box">
                                <div class="partner-imgBx">
                                    <!-- <img src="{{ asset('assets/logos/RT.png') }}" alt=""> -->
                                    <h4 class="logo">Logo</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="partner-content">
                            <div class="partner-box">
                                <div class="partner-imgBx">
                                    <!-- <img src="{{ asset('assets/logos/nunya.jpg') }}" alt=""> -->
                                    <h4 class="logo">Logo</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="partner-content">
                            <div class="partner-box">
                                <div class="partner-imgBx">
                                    <!-- <img src="{{ asset('assets/logos/id.jpg') }}" alt=""> -->
                                    <h4 class="logo">Logo</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="partner-content">
                            <div class="partner-box">
                                <div class="partner-imgBx">
                                    <!-- <img src="{{ asset('assets/logos/nunya.jpg') }}" alt=""> -->
                                    <h4 class="logo">Logo</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('styles/guest/OwlCarousel2/dist/owl.carousel.js') }}"></script>
    <script>
        $('document').ready(function () {

            $("#slide-btn").click(function(){
                $("#slide1").slideToggle();
                $("#slide2").slideToggle();
            });

            $("#slide1").click(function(){
                window.location.href="http://localhost/golfe1/nos-services/social/personnes-agees"
            });

            $("#slide2").click(function(){
                window.location.href="http://localhost/golfe1/nos-services/social/femmes"
            });

            $('#partnerCarousel').owlCarousel({
                loop:true,
                margin:10,
                nav:false,
                autoplay:true,
                autoplayTimeout:1000,
                autoplayHoverPause:true,
                dots: false,
                responsive:{
                    0:{
                        items:2
                    },
                    768:{
                        items:5
                    },
                    992:{
                        items:7
                    }
                }
            });

        });
    </script>
@endsection
