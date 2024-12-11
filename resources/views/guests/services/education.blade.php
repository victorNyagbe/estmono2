@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/services/education.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/guest/OwlCarousel2/dist/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/guest/OwlCarousel2/dist/assets/owl.theme.default.css') }}">
@endsection

@section('content')
    <div class="banner-background">
        <div class="banner-filter">
            <h4 class="banner-title text-center animate__animated animate__rotateInUpLeft animate__repeat-1 animate__slower">Education</h4>
        </div>
    </div>

    <div class="container-fluid custom-banner">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h4 class="text-center presentation-text">
                        Politique educative de la commune
                    </h4>
                </div>
                <div class="col-12">
                    <p class="text-center">
                        La commune met l’éducation au cœur de ses préoccupations en veillant sur chaque enfant quelles que soit ses origines socio-économiques ses aptitudes ou ses besoins spéciaux, ait accès à une éducation de qualité. La politique éducative de la commune vise à développer les compétences des élèves dans différent domaines. La mairie encourage la participation des parents dans la vie scolaire de leurs enfants en organisant des réunions régulières.
                    </p>
                </div>
                <div class="col-12 projet-title">
                    <h4>
                        Projets et réalisations de la commune dans le domaine éducatif
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
                            Création d'une école à Lomé
                        </h6>
                    </div>
                </div>
                <div class="col-12 col-md-4 py-4">
                   <div class="educ-img"></div>
                   <p class="statut1">Réalisé</p>
                    <div class="description">
                        <h6>
                            Création d'une école à Lomé
                        </h6>
                    </div>
                </div>
                <div class="col-12 col-md-4 py-4">
                    <div class="educ-img"></div>
                    <p class="statut">En cours</p>
                    <div class="description">
                        <h6>
                            Création d'une école à Lomé
                        </h6>
                    </div>
                </div> -->

                <div class="col-12 school-title">
                    <h4>
                        Académies scolaires dans la commune
                    </h4>
                </div>
                <!-- <div class="col-12">
                    <p>
                        ici sera inserer un descriptif sur les academies de la commune de la commune ici sera inserer un descriptif sur les academies de la commune de la commune
                        ici sera inserer un descriptif sur les academies de la commune de la commune ici sera inserer un descriptif sur les academies de la commune de la commune
                        ici sera inserer un descriptif sur les academies de la commune de la commune ici sera inserer un descriptif sur les academies de la commune de la commune
                    </p>
                </div> -->
            </div>

            <div class="row justify-content-center">
                <div class="col-12 mt-2">
                    <div class="d-flex justify-content-center">
                        <h4 class="school-section-title">Académie publique</h4>
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
                                    <th>ETABLISSEMEMENT</th>
                                    <th>STATUTS</th>
                                    <th>CONTACT</th>
                                    <th>RESPONSABLE</th>
                                    <th width="80">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $compteur1 = 1; $compteur2 = 1; ?>
                                @forelse ($academie_publiques as $academie_publique)
                                    <tr>
                                        <td>{{ $compteur1 }}</td>
                                        <td>{{ $academie_publique->name }}</td>
                                        <td>{{ $academie_publique->status }}</td>
                                        <td>{{ $academie_publique->responsable == null ? '-' : $academie_publique->responsable }}</td>
                                        <td>{{ $academie_publique->contact == null ? '-' : $academie_publique->contact  }}</td>
                                        <td><a href="tel:{{$academie_publique->contact  }}" class="btn btn-sm btn-primary text-white"><i class="fa fa-phone"></i></a></td>
                                    </tr>
                                    <?php $compteur1++; ?>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="6">Information en cours ...</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-12 mt-2">
                    <div class="d-flex justify-content-center">
                        <h4 class="school-section-title">Académie privée</h4>
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
                                    <th>ETABLISSEMEMENT</th>
                                    <th>STATUTS</th>
                                    <th>CONTACT</th>
                                    <th>RESPONSABLE</th>
                                    <th width="80">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($academie_privees as $academie_privee)
                                    <tr>
                                        <td>{{ $compteur2 }}</td>
                                        <td>{{ $academie_privee->name }}</td>
                                        <td>{{ $academie_privee->status }}</td>
                                        <td>{{ $academie_privee->responsable == null ? '-' :  $academie_privee->responsable }}</td>
                                        <td>{{ $academie_privee->contact == null ? '-' : $academie_privee->contact }}</td>
                                        <td><a href="tel:{{$academie_privee->contact  }}" class="btn btn-sm btn-primary text-white"><i class="fa fa-phone"></i></a></td>
                                    </tr>
                                    <?php $compteur2++; ?>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="6">Information en cours ...</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <h4 class="text-center presentation-text">
                    Nos partenaires dans le domaine de l'éducation
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
