@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/OwlCarousel2/dist/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/visitors/OwlCarousel2/dist/assets/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/mairie/programme.css') }}">
@endsection

@section('content')
    <!--en tête-->
    <header class="municipal">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="title-municipal">
                        <h1>Programme des activités</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- contenu -->
    <section id="schedule-bg" class="schedule-bg section-bg">
        <div class="schedule-bg-filter">
            <div class="container" style="background-color: white">
                <div class="row">

                    <div class="col-12 mb-5 today-schedule">
                        <h3 class="text-center mb-3"><i class="fa fa-calendar"></i> Aujourd'hui, le 08/07/2022</h3>
                        <ul class="mb-4">
                            <li>
                                08h30 - 10h : Réunion des conseillers municipaux
                            </li>
                            <li>
                                15h30 - 17h : Rencontre entre le maire et les futurs partenaires dans le domaine éducatif
                            </li>
                        </ul>
                    </div>

                    <div class="col-12">
                        <h4 class="text-center mb-4"><i class="fa fa-flash"></i> Programme de la semaine</h4>
                        <div class="row">
                            <div class="col-5 col-md-3">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="v-pills-monday-tab" data-toggle="pill" href="#v-pills-monday"
                                        role="tab" aria-controls="v-pills-monday" aria-selected="true">
                                        <i class="fa fa-calendar"></i> Lundi
                                    </a>
                                    <a class="nav-link" id="v-pills-tuesday-tab" data-toggle="pill" href="#v-pills-tuesday"
                                        role="tab" aria-controls="v-pills-tuesday" aria-selected="false">
                                        <i class="fa fa-calendar"></i> Mardi
                                    </a>
                                    <a class="nav-link" id="v-pills-wednesday-tab" data-toggle="pill" href="#v-pills-wednesday"
                                        role="tab" aria-controls="v-pills-wednesday" aria-selected="false">
                                        <i class="fa fa-calendar"></i> Mercredi
                                    </a>
                                    <a class="nav-link" id="v-pills-thursday-tab" data-toggle="pill" href="#v-pills-thursday"
                                        role="tab" aria-controls="v-pills-thursday" aria-selected="false">
                                        <i class="fa fa-calendar"></i> Jeudi
                                    </a>
                                    <a class="nav-link" id="v-pills-friday-tab" data-toggle="pill" href="#v-pills-friday"
                                        role="tab" aria-controls="v-pills-friday" aria-selected="false">
                                        <i class="fa fa-calendar"></i> Vendredi
                                    </a>
                                    <a class="nav-link" id="v-pills-saturday-tab" data-toggle="pill" href="#v-pills-saturday"
                                        role="tab" aria-controls="v-pills-saturday" aria-selected="false">
                                        <i class="fa fa-calendar"></i> Samedi
                                    </a>
                                </div>
                            </div>
                            <div class="col-7 col-md-9" style="background-color: #2b3481; border-radius: 10px;">
                              <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active schedule-list" id="v-pills-monday" role="tabpanel" aria-labelledby="v-pills-monday-tab">
                                    <small>Lundi</small>
                                    <ul>
                                        <li>
                                            08h30 - 10h : Réunion des conseillers municipaux
                                        </li>
                                        <li>
                                            15h30 - 17h : Rencontre entre le maire et les futurs partenaires dans le domaine éducatif
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade schedule-list" id="v-pills-tuesday" role="tabpanel" aria-labelledby="v-pills-tuesday-tab">
                                    <small>Mardi</small>
                                    <ul>
                                        <li>
                                            08h30 - 10h : Réunion entre le maire et les exécutifs
                                        </li>
                                        <li>
                                            14h30 - 16h : Entrevue pour la mise en place du nouveau bureau interne du recouvrement
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade schedule-list" id="v-pills-wednesday" role="tabpanel" aria-labelledby="v-pills-wednesday-tab">
                                    <small>Mercredi</small>
                                    <ul>
                                        <li>
                                            08h30 - 10h : Réunion des conseillers municipaux
                                        </li>
                                        <li>
                                            15h30 - 17h : Rencontre entre le maire et les futurs partenaires dans le domaine éducatif
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade schedule-list" id="v-pills-thursday" role="tabpanel" aria-labelledby="v-pills-thursday-tab">
                                    <small>Jeudi</small>
                                    <ul>
                                        <li>
                                            08h30 - 10h : Réunion entre le maire et les exécutifs
                                        </li>
                                        <li>
                                            14h30 - 16h : Entrevue pour la mise en place du nouveau bureau interne du recouvrement
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade schedule-list" id="v-pills-friday" role="tabpanel" aria-labelledby="v-pills-friday-tab">
                                    <small>Vendredi</small>
                                    <ul>
                                        <li>
                                            08h30 - 10h : Réunion des conseillers municipaux
                                        </li>
                                        <li>
                                            15h30 - 17h : Rencontre entre le maire et les futurs partenaires dans le domaine éducatif
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade schedule-list" id="v-pills-saturday" role="tabpanel" aria-labelledby="v-pills-saturday-tab">
                                    <small>Samedi</small>
                                    <ul>
                                        <li>
                                            08h30 - 10h : Réunion entre le maire et les exécutifs
                                        </li>
                                        <li>
                                            14h30 - 16h : Entrevue pour la mise en place du nouveau bureau interne du recouvrement
                                        </li>
                                    </ul>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@section('script')
    <script src="{{ asset('styles/mdb/js/jquery.js') }}"></script>
    <script src="{{ asset('styles/visitors/OwlCarousel2/dist/owl.carousel.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#municipalOwl').owlCarousel({
                loop:true,
                margin:10,
                nav:false,
                autoplay:true,
                autoplayTimeout:5000,
                autoplayHoverPause:true,
                dots: false,
                responsive:{
                    0:{
                        items:1
                    },
                    768:{
                        items:2
                    },
                    992:{
                        items:3
                    },
                    1200: {
                        items:4
                    }
                }
            });
        });
    </script>
@endsection
