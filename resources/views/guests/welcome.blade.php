@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/OwlCarousel2/dist/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/visitors/OwlCarousel2/dist/assets/owl.theme.default.css') }}">
@endsection

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div id="heroCarousel" data-bs-interval="10000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

            @if (count($banners) > 0)
                <?php $compteur_banniere = 0; ?>
                @foreach ($banners as $banner)
                    <div class="carousel-item slider {{ $compteur_banniere == 0 ? 'active' : '' }}" style="background-image: url('{{ asset('storage/app/public/' . $banner->image) }}');margin: 0;" >
                        <div class="custom-mask">
                            <div class="custom-container">
                                <div class="custom-text">
                                    <span class="welcome";>BIENVENUE SUR LE SITE OFFICIEL</span> <br>
                                    <h2 style="display: inline-block;">de la Commune du Golfe1-Apedomé TOGO</h2>
                                </div>
                                <!-- <h5>Ma Commune, ma belle Cité</h5> -->
                                <p></p>
                            </div>
                            <div class="filter">
                                <div class=" container-fluid">
                                    <div class="row">
                                        <div class="col-12 description">
                                            <p style="color: #000000;">
                                                {{ $banner->description }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="carousel-caption d-none d-md-flex" style="background-color: rgba(0,0,0,0.3);top:0;bottom: 0;left:0 0;right: 0;position: absolute;margin: 0;">
                            <span class="welcome" style="color: #fff;">BIENVENUE SUR</span>
                            <h2 style="color: #ae5501;float: left; margin-right: 300px;">Kozah3</h2>
                            <h5 style="color: #4d2600;float: left; margin-right: 180px; font-size: 25px;">Ma Commune, ma belle Cité</h5>
                            <p></p>
                        </div> -->

                    </div>
                    <?php $compteur_banniere++; ?>
                @endforeach
            @endif


            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>
    </section><!-- End Hero -->

    <main id="main">


        <!-- ======= About Section ======= -->
        <section id="about" class="about section-bg">
            <div class="about-section-filter">
                <div class="container" data-aos="fade-up">

                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="section-title">
                                <h1>A propos</h1>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                            <img src="{{ asset('storage/app/public/' . $about->image) }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                            <div class="about-back-img">
                                <div class="about-filter">
                                    <div class="container">
                                        <div class="row d-flex flex-column justify-content-center">
                                            <div class="col-12 d-flex flex-column justify-content-center">
                                                <h3 class="about-title">La Commune Golfe1.</h3>
                                                <p class="about-text">{{ $about->subtitle . '...' }}</p>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('guests.about') }}" class="btn text-white" style="background-color: #006130; color: white;">En savoir plus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End About Section -->


        <!--Discours du maire-->
        <section id="mot" class="mot section-bg">
            <div class="mot-filter">
                <div class="container" data-aos="fade-up">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-5 col-lg-4" data-aos="fade-right" data-aos-delay="100">
                            <center><img src="{{ asset('storage/app/public/' . $maire->image) }}" class="mot-maire-img" alt=""></center>
                        </div>
                        <div class="col-12 col-md-7 col-lg-8 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                            <h3 class="text-center">Mot du Maire</h3>
                            <p class="text-center mot-paragraph">{!! $maire->text !!} </p>

                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!--/Discours du maire-->

        <!-- ======= Services Section ======= -->
        <section id="services" class="sections services">
            <div class="container">
                <div class="section-title">
                    <h1>Commune</h1>
                </div>

                <div class="row justify-content-center mb-2">
                    <div class="col-md-4 col-xs-12">
                        <div class="serv">
                            <i class="icon fa fa-book fa-lg"></i>
                            <h3 class="serv-title">Conseil Municipal</h3>
                            <p class="serc-desc">Découvrir notre conseil municipal.</p>

                                <a href="{{ route('guests.mairie.municipal') }}" class="btn btn-success" style="display: inline-flex;">Voir</a>
                        </div>
                    </div>
                </div>

                <div class="section-title">
                    <h1>mairie</h1>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-4 col-xs-12">
                        <div class="serv">
                            <i class="icon fa fa-book fa-lg"></i>
                            <h3 class="serv-title">Bureau exécutif</h3>
                            <p class="serc-desc">Découvrer les membres du bureau exécutif de la commune.</p>
                            <a href="{{ route('guests.services.bureauExecutif') }}" class="btn btn-success" style="display: inline-flex;">Voir</a>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-4 col-xs-12">
                        <div class="serv">
                            <i class="icon fa-solid fa bi bi-building fa-lg"></i>
                            <h3 class="serv-title">Etat Civil</h3>
                            <p class="serc-desc">Découvrer les informations de notre etat civil.</p>
                             <a href="{{ route('guests.services.etatCivil') }}" class="btn btn-success" style="display: inline-flex;">Voir</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="serv">
                            <i class="icon fa fa-graduation-cap fa-lg"></i>
                            <h3 class="serv-title">Education</h3>
                            <p class="serc-desc">Découvrer nos activités dans le domaine de l'éducation.</p>
                             <a href="{{ route('guests.services.education') }}" class="btn btn-success" style="display: inline-flex;">Voir</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="serv">
                            <i class="icon  fa fa-heart fa-lg"></i>
                            <h3 class="serv-title">Santé</h3>
                            <p class="serc-desc">Découvrer nos activités dans le domaine de la Santé.</p>
                             <a href="{{ route('guests.services.sante') }}" class="btn btn-success" style="display: inline-flex;">Voir</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div href="#" class="serv">
                            <i class="icon fa fa-user fa-lg"></i>
                            <h3 class="serv-title">Culture</h3>
                            <p class="serc-desc">Découvrer nos activités dans le domaine de la Culture.</p>
                             <a href="{{ route('guests.services.culture') }}" class="btn btn-success" style="display: inline-flex;">Voir</a>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="serv">
                            <i class="icon fa fa-industry fa-lg"></i>
                            <h3 class="serv-title">Urbanisme</h3>
                            <p class="serc-desc">Découvrer nos activités dans le domaine de l'Urbanisme.</p>
                             <a href="{{ route('guests.services.urbanisme') }}" class="btn btn-success" style="display: inline-flex;">Voir</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="serv">
                            <i class="icon fa fa-book fa-lg"></i>
                            <h3 class="serv-title">Environnement</h3>
                            <p class="serc-desc">Découvrer nos activités dans le domaine de l'Environnement.</p>
                             <a href="{{ route('guests.services.environnement') }}" class="btn btn-success" style="display: inline-flex;">Voir</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="serv">
                            <i class="icon fa-solid fa bi bi-signpost fa-lg"></i>
                            <h3 class="serv-title">Tourisme</h3>
                            <p class="serc-desc">Découvrer nos activités dans le domaine du tourisme.</p>
                             <a href="{{ route('guests.services.tourisme') }}" class="btn btn-success" style="display: inline-flex;">Voir</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="serv">
                            <i class="icon fa-solid fa fa-shield fa-lg"></i>
                            <h3 class="serv-title">Sécurité</h3>
                            <p class="serc-desc">Découvrer nos activités dans le domaine de la Sécurité.</p>
                             <a href="{{ route('guests.services.securite') }}" class="btn btn-success" style="display: inline-flex;">Voir</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="serv">
                            <i class="icon fa-solid fa fa-briefcase fa-lg"></i>
                            <h3 class="serv-title">Emploi</h3>
                            <p class="serc-desc">Découvrer plus sur nos opportinutés d'emplois.</p>
                             <a href="{{ route('guests.services.emplois') }}" class="btn btn-success" style="display: inline-flex;">Voir</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="serv">
                            <i class="icon fa-solid fa fa-users fa-lg"></i>
                            <h3 class="serv-title">Social</h3>
                            <p class="serc-desc">Découvrer nos activités dans le domaine social.</p>
                             <a href="{{ route('guests.services.social') }}" class="btn btn-success" style="display: inline-flex;">Voir</a>
                        </div>
                    </div>

                    <div class="col-md-4 col-xs-12">
                        <div class="serv">
                            <i class="icon fa-solid fa fbi bi-paperclip fa-lg"></i>
                            <h3 class="serv-title">Jumelages</h3>
                            <p class="serc-desc">Découvrer plus par rapport à nos jumelages.</p>
                             <a href="{{ route('guests.mairie.jumelage-index') }}" class="btn btn-success" style="display: inline-flex;">Voir</a>
                        </div>
                    </div>

                    <div class="col-md-4 col-xs-12">
                        <div class="serv">
                            <i class="icon fa-solid fa bi bi-cash fa-lg"></i>
                            <h3 class="serv-title">Taxes</h3>
                            <p class="serc-desc">Découvrer plus sur les taxes de notre commune.</p>
                             <a href="{{ route('guests.services.taxes') }}" class="btn btn-success" style="display: inline-flex;">Voir</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="serv">
                            <i class="icon fa-solid fa bi bi-shop fa-lg"></i>
                            <h3 class="serv-title">Marchés publics</h3>
                            <p class="serc-desc">Découvrer nos activités dans le domaine du marché public.</p>
                             <a href="{{ route('guests.services.marchePublic') }}" class="btn btn-success" style="display: inline-flex;">Voir</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Services Section -->


            <!-- ======= Team Section ======= -->
        {{-- <section id="team" class="team section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h1>commune</h1>
                    <h3 style="color: #fff;">Membres du conseil municipal de ma commune <span>Golfe1</span></h3>
                </div>

                <div class="owl-carousel" id="teamOwl">
                    @foreach ($municipals as $municipal)
                        <div class="item">
                            <div class="member">
                                <div class="member-img" style="background-image: url('{{ asset('storage/app/public/' . $municipal->image) }}');"></div>
                                <div class="member-info">
                                    <h4>{{ $municipal->lastname . ' ' . $municipal->firstname }}</h4>
                                    <span>{{ $municipal->occupation }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row justify-content-center">
                    <div class="col-12 mt-3">
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('guests.mairie.municipal') }}" class="team-link" style="color: #fff;">Tous nos membres</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>End Team Section --}}

        <!-- ======= Actualites Section ======= -->
        <section id="news" class="news section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h1>Actualités</h1>
                </div>

                <div class="row">
                    @foreach ($actualites as $actualite)
                        <div class="col-lg-4 col-md-12 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                            <div class="actu">
                                <div class="actu-img" style="background-image: url('{{ asset('storage/app/public/' . $actualite->image) }}')"></div>
                                <div class="actu-info">
                                    <h4 class="actu-title" title="{{ $actualite->title }}">{{ strlen($actualite->title)  > 60 ? \Illuminate\Support\Str::substr($actualite->title, 0, 60) . '...' : $actualite->title }}</h4>
                                    <p>{{ $actualite->subtitle . '...' }}</p>
                                    <a href="{{ route('guests.actualites.show', $actualite) }}" >Tout lire <i class="bi bi-arrow-right"></i></a>

                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-12 mt-3">
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('guests.actualites.index') }}" class="btn  news-button mr-1">Voir toutes nos actualités <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- End Actualites Section -->


        <!-- ======= ptojets Section ======= -->
        <section id="list" class="list section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h1>Projets</h1>
                </div>

                <div class="row">
                    @foreach ($projects as $project)
                        <div class="col-lg-4 col-md-12 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                            <div class="projet">
                                <div class="projet-img" style="background-image: url('{{ asset('storage/app/public/' . $project->image) }}');"></div>
                                <div class="projet-info">
                                    <h4 title="{{ $project->title }}">{{ strlen($project->title)  > 60 ? \Illuminate\Support\Str::substr($project->title, 0, 60) . '...' : $project->title }}</h4>
                                    <p class="date">
                                        <span>
                                            <i class="bi bi-calendar-date"></i>
                                        </span>
                                        <small style="font-style:italic;">Publiée le {{ \Carbon\Carbon::parse($project->created_at)->format('d/m/Y') }}</small>
                                    </p>
                                    <p class="card-text" >{{ $project->subtitle . '...' }}</p>
                                    <a href="#" >TOUT LIRE <i class="bi bi-arrow-right"></i></a>

                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-12 mt-3">
                        <div class="d-flex justify-content-start">
                            <a href="{{ route('guests.projects.projetEnCour') }}" class="btn projet-button mr-2">Voir tous nos projets <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                    {{-- <div class="col-12 mt-3">
                        <div class="d-flex justify-content-start">
                            <a href="#" class="btn projet-button mr-2">Proposer un projets <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div> --}}
                </div>
        </section><!-- End projets Section -->

        <!--La carte-->
        <section id="carte" class="carte section-bg">
            <div class="carte-filter">
                <h1 class="carte-section-title">Ma commune</h1>
                <div data-aos="fade-right" data-aos-delay="100">
                    <center><img src="{{ asset('storage/app/public/' . $cartes->image) }}" class="carte-img" alt=""></center>
                </div>
            </div>
        </section>
        <!--/La carte-->

        <!--Dans ma rue-->
        <section id="DansMaRue">
            <div class="footer-rue">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="d-flex justify-content-center">
                                <div class="section-title">
                                    <h1>Dans ma rue</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <p>
                                En vue de promouvoir le développement de la commune, la mairie met à disposition de la population
                                une fonctionnalité permettant de dénoncer les espaces publics malsains.
                                Cette fonctionnalité permet d'envoyer des images  dans l'optique de participer à l'amélioration de la qualité des espaces
                                publics et autres de la commune.
                                Vous pouvez à partir du formulaire, envoyer des images ou du texte pour exprimer l'inquiétude dont vous voulez dénoncer
                            </p>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-back">
                                <form action="{{ route('guests.dansMaRue.informationsSendByGuests') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <input type="file" name="images[]" id="image" class="form-control" multiple>
                                    </div>
                                    <div class="form-group mb-4">
                                        <textarea name="message" id="message" class="form-control" rows="7" placeholder="Votre message ici ...."></textarea>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-md sendImageButton"><i class="fa fa-send-o"></i> Envoyer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="backError" role="dialog">
                        <div class="modal-dialog modal-dialog-centered modal-sm">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="text-center mb-4"><i class="fa fa-times-circle" style="color: rgb(161, 2, 2); font-size: 3rem;"></i></div>
                                    <h5 class="text-center">
                                        {{ Session::get('error') }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="backSuccess" role="dialog">
                        <div class="modal-dialog modal-dialog-centered modal-sm">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="text-center mb-4"><i class="fa fa-check-circle" style="color: #06aa7c; font-size: 3rem;"></i></div>
                                    <h5 class="text-center">
                                        {{ Session::get('success') }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/Dans ma rue-->

        <!-- Localisation -->
        <section class="details-commune p-2">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="section-title">
                        <h1>Mairie et annexes</h1>
                         <h3 class="pt-4"> Siège<span> Akodesséwa </span></h3>
                    </div>

                    <div class="col-12">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.4094395777624!2d1.1768366147058908!3d6.209604828455625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1021584ead60792b%3A0x2880b392b6f7baff!2sLA%20VOLONTE!5e0!3m2!1sfr!2stg!4v1646676641561!5m2!1sfr!2stg" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>

                    <div class="container">
                        <div class="row d-flex justify-content-center">
                            <div class="section-title">
                                <h3 style="">Annexes de la Mairie <span>Golfe1</span></h3>
                            </div>
                            <div class="container">
                                <div class="row d-flex justify-content-center align-items-center">
                                    <div class="col-6 col-md-4 mt-2 d-flex justify-content-center align-items-center">
                                        <div class="commune">
                                            <h4>Annexe Bè Apédomé</h4>
                                        </div>
                                    </div>
                                    <div class="line"></div>
                                    <div class="col-6 col-md-4 mt-2 d-flex justify-content-center align-items-center">
                                        <div class="button">
                                            <a href="#" class="btn btn-success text-white"><i class="bi bi-geo-alt-fill"> Localiser</i></a>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row d-flex justify-content-center align-items-center">
                                    <div class="col-6 col-md-4 mt-2 d-flex justify-content-center align-items-center">
                                        <div class="commune">
                                            <h4>Annexe Ablogamé</h4>
                                        </div>
                                    </div>
                                    <div class="line"></div>
                                    <div class="col-6 col-md-4 mt-2 d-flex justify-content-center align-items-center">
                                        <div class="button">
                                            <a href="#" class="btn btn-success text-white"><i class="bi bi-geo-alt-fill"> Localiser</i></a>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row d-flex justify-content-center align-items-center">
                                    <div class="col-6 col-md-4 mt-2 d-flex justify-content-center align-items-center">
                                        <div class="commune">
                                            <h4>Annexe Adidomé</h4>
                                        </div>
                                    </div>
                                    <div class="line"></div>
                                    <div class="col-6 col-md-4 mt-2 d-flex justify-content-center align-items-center">
                                        <div class="button">
                                            <a href="#" class="btn btn-success text-white"><i class="bi bi-geo-alt-fill"> Localiser</i></a>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row d-flex justify-content-center align-items-center">
                                    <div class="col-6 col-md-4 mt-2 d-flex justify-content-center align-items-center">
                                        <div class="commune">
                                            <h4>Annexe Adapkamé</h4>
                                        </div>
                                    </div>
                                    <div class="line"></div>
                                    <div class="col-6 col-md-4 mt-2 d-flex justify-content-center align-items-center">
                                        <div class="button">
                                            <a href="#" class="btn btn-success text-white"><i class="bi bi-geo-alt-fill"> Localiser</i></a>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end localisation -->

       <!-- Details communes sections -->
        {{-- <section class="details-commune">
            <div class="details-commune-filter">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-12 details-title" style="text-align: center;">
                            <h1>Ma commune, ses cantons et quartiers</h1>
                        </div>
                    </div>
                    <div class="row justify-content-center align-items-center pt-3">
                        <div class="col-12 col-md-4 justify-content-center align-items-center details">
                            <h4>Canton Awandjelo</h4>
                            <p>est composé des quartiers comme:</p>
                            <ul>
                                <li>quartier</li>
                                <li>quartier</li>
                            </ul>
                        </div>
                            <div class="ligne"></div>

                        <div class="col-12 col-md-4 justify-content-center align-items-center details">
                            <h4>Canton Kpinzindè</h4>
                            <p>est composé des quartiers comme:</p>
                            <ul>
                                <li>quartier</li>
                                <li>quartier</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- End of details communes sections -->


        <!-- ======= Photos Section ======= -->
        <section id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
            <h1>Galerie</h1>
            </div>


            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                @foreach ($galleries as $gallery)
                    <div class="col-md-4 col-6 portfolio-item ">
                        <a href="{{ asset('storage/app/public/' . $gallery->image) }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="">
                            <div class="gallery-image" style="background-image: url('{{ asset('storage/app/public/' . $gallery->image) }}')"></div>
                        </a>

                        {{-- <div class="portfolio-info">
                            <a href="{{ asset('storage/app/public/' . $gallery->image) }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title=""><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                        </div> --}}
                    </div>
                @endforeach
            </div>

            <div class="row justify-content-center">
                <div class="col-12 mt-3">
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('guests.galerie') }}" class="gallery-link">Découvrir notre galerie <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section><!-- End photos Section -->


    </main><!-- End #main -->

@endsection

@section('script')
    <script src="{{ asset('styles/mdb/js/jquery.js') }}"></script>
    <script src="{{ asset('styles/mdb/js/popper.js') }}"></script>
    <script src="{{ asset('styles/mdb/js/bootstrap.js') }}"></script>
    <script src="{{ asset('styles/visitors/OwlCarousel2/dist/owl.carousel.js') }}"></script>
    <script>
        $(document).ready(function () {
            let error_message = "{{ Session::get('error') }}";
            let success_message = "{{ Session::get('success') }}";

            if (error_message != "") {
                $('#backError').modal();
            }

            if (success_message != "") {
                $('#backSuccess').modal();
            }

            $('#teamOwl').owlCarousel({
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
