@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/OwlCarousel2/dist/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/visitors/OwlCarousel2/dist/assets/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/fontawesome/css/all.css') }}">
    <style>
        .annonceBell span {
            font-size: 5rem;
            color: brown;
            transform: rotate(-20deg);
        }

        .btn-adn, .btn-adn:hover {
            background-color: #2b3481;
            color: #fff;
            text-decoration: none;
            border-radius: 10px;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/styles/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/guest/home.css') }}">
@endsection

@section('content')

    <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            @foreach ($banners as $banner)
                <div class="swiper-slide">
                    <figure class="slide-img">
                        <img src="{{ asset('storage/app/public/' . $banner->image) }}" alt="">
                        <div class="banniere-mask">
                            <div class="commune-panel">
                                <h5 class="first">Bienvenue</h5>
                                <h5 class="second">à la commune</h5>
                                <h3 data-aos="fade-up" data-aos-delay="100" class="commune-name">EST-MONO 2 </h3>
                                <div class="commune-panel-links" data-aos="fade-up" data-aos-delay="100">
                                    <div class="first-links">
                                        <a href="{{ route('guests.mairie.decouverte.index') }}" class="btn btn-outline-success">Découvrir la commune</a>
                                        <a class="btn btn-outline-success dropdown-toggle mr-2" type="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">Démarches administratives</a>

                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('guests.services.etatCivil') }}">Etat-civil</a>
                                            <a class="dropdown-item" href="#">Légalisations</a>
                                            <a class="dropdown-item" href="#">Autorisation d'espaces</a>
                                        </div>
                                    </div>
                                    <div class="second-links mt-4">
                                        <a href="#" class="btn btn-outline-success"><i class="bi bi-tv"></i> Est-Mono2 en brève</a>
                                        <a href="{{ route('guests.investor') }}" class="btn btn-outline-success"><i class="bi bi-handbag"></i> Investisseurs</a>
                                        <a href="{{ route('guests.annonces.index') }}" class="btn btn-outline-success"><i class="bi bi-bell"></i> Annonces</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </figure>
                </div>
            @endforeach
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>

    <main id="main">

        <div class="container-fluid py-4 d-block d-md-none">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="commune-panel2">
                        <div class="commune-panel-filter">
                            <h5 class="first">Bienvenue</h5>
                            <h5 class="second">à la commune</h5>
                            <h3 data-aos="fade-up" data-aos-delay="100" class="commune-name">EST-MONO 2 </h3>
                            <div class="commune-panel-links">
                                <div class="first-links">
                                    <a href="{{ route('guests.mairie.decouverte.index') }}" class="btn btn-outline-success mb-3" data-aos="fade-up" data-aos-delay="30">Découvrir la commune</a>
                                    <a class="btn btn-outline-success dropdown-toggle mr-2" type="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" data-aos="fade-up" data-aos-delay="30">Démarches administratives</a>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('guests.services.etatCivil') }}">Etat-civil</a>
                                        <a class="dropdown-item" href="#">Légalisations</a>
                                        <a class="dropdown-item" href="#">Autorisation d'espaces</a>
                                    </div>
                                </div>
                                <div class="second-links mt-3" data-aos="fade-up" data-aos-delay="100">
                                    <a href="#" class="btn btn-outline-success"><i class="bi bi-tv"></i> Est-mono2 en brève</a>
                                    <a href="{{ route('guests.investor') }}" class="btn btn-outline-success"><i class="bi bi-handbag"></i> Investisseurs</a>
                                    <a href="{{ route('guests.annonces.index') }}" class="btn btn-outline-success"><i class="bi bi-bell"></i> Annonces</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ======= About Section ======= -->
        <section id="about" class="about section-bg">
            <div class="about-section-filter">
                <div class="container-fluid container-md" data-aos="fade-up">

                    <div class="row justify-content-center align-items-center">
                        <div class="col-12 col-lg-12">
                            <div class="section-title">
                                <h1>A propos</h1>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 pt-1" data-aos="fade-right" data-aos-delay="100">
                            <div class="decouverte">
                                {{-- <div class="decouverte-phrase">
                                    <h5 class="text-center">A la découverte de Golfe1, ma commune</h5>
                                </div> --}}

                                <div class="decouverte-video-bg">
                                    <div class="decouverte-video">
                                        <video controls poster="{{ asset('assets/images/miniature.png') }}">
                                            <source src="{{ asset('assets/videos/1.mp4') }}" type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                            </div>
                            {{-- <img src="{{ asset('storage/app/public/' . $about->image) }}" class="img-fluid" alt=""> --}}
                        </div>
                        <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                            <div class="about-back-img">
                                <div class="about-filter">
                                    <div class="container">
                                        <div class="row d-flex flex-column justify-content-center">
                                            <div class="col-12 d-flex flex-column justify-content-center">
                                                <h3 class="about-title">La Commune Est-Mono 2</h3>
                                                <p class="about-text">{!! $about->subtitle !!}</p>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('guests.about') }}" class="btn text-white" style="background-color: #2b3481; color: white;">En savoir plus</a>
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
                            <p class="text-center mot-paragraph">{!!  $maire->subtitle  !!} </p>

                            <div class="row">
                                <div class="col-12 d-flex justify-content-center">
                                    <a href="#!" data-toggle="modal" data-target="#edit-motMaire"  class="btn btn-success">Voir plus</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="edit-motMaire" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Mot du Maire</h5>
                            <p type="button" class="close" aria-label="close" data-dismiss="modal" style="outline: 0; width: 50px;">
                                <span aria-hidden="true" style="font-size: 2rem;">&times;</span>
                            </p>
                        </div>
                        <div class="modal-body">
                            <div class="mod-img">
                                <center><img src="{{ asset('storage/app/public/' . $maire->image) }}" width="30%" alt=""></center>
                            </div>
                            <hr>
                            <div class="mod-text">
                                <p class="text-center mot-paragraph">
                                    {!! $maire->text !!}
                                </p>
                            </div>
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

                <div class="row justify-content-center mb-3">
                    <div class="col-md-4 col-xs-12">
                        <div class="serv">
                            <i class="icon fa fa-book fa-lg"></i>
                            <h3 class="serv-title">Conseil Municipal</h3>
                            <p class="serc-desc">Découvrir notre conseil municipal.</p>

                                <a href="{{ route('guests.mairie.municipal') }}" class="btn btn-success" style="display: inline-flex;">consulter</a>
                        </div>
                    </div>
                </div>

                <div class="section-title">
                    <h1>mairie</h1>
                </div>

                <div class="row justify-content-center mb-3">
                    <div class="col-md-4 col-xs-12">
                        <div class="serv">
                            <i class="icon fa fa-book fa-lg"></i>
                            <h3 class="serv-title">Bureau exécutif</h3>
                            <p class="serc-desc">Découvrez les membres du bureau exécutif de la commune.</p>
                            <a href="{{ route('guests.services.bureauExecutif') }}" class="btn btn-success" style="display: inline-flex;">consulter</a>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-4 col-xs-12">
                        <div class="serv">
                            <i class="icon fa-solid fa bi bi-building fa-lg"></i>
                            <h3 class="serv-title">Etat Civil</h3>
                            <p class="serc-desc">Découvrez les informations de notre etat civil.</p>
                            <a href="{{ route('guests.services.etatCivil') }}" class="btn btn-success" style="display: inline-flex;">consulter</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="serv">
                            <i class="icon fa fa-graduation-cap fa-lg"></i>
                            <h3 class="serv-title">Education</h3>
                            <p class="serc-desc">Découvrez nos activités dans le domaine de l'éducation.</p>
                            <a href="{{ route('guests.services.education') }}" class="btn btn-success" style="display: inline-flex;">consulter</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="serv">
                            <i class="icon  fa fa-heart fa-lg"></i>
                            <h3 class="serv-title">Santé</h3>
                            <p class="serc-desc">Découvrez nos activités dans le domaine de la Santé.</p>
                            <a href="{{ route('guests.services.sante') }}" class="btn btn-success" style="display: inline-flex;">consulter</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div href="#" class="serv">
                            <i class="icon fa fa-user fa-lg"></i>
                            <h3 class="serv-title">Culture</h3>
                            <p class="serc-desc">Découvrez nos activités dans le domaine de la Culture.</p>
                            <a href="{{ route('guests.services.culture') }}" class="btn btn-success" style="display: inline-flex;">consulter</a>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="serv">
                            <i class="icon fa fa-industry fa-lg"></i>
                            <h3 class="serv-title">Urbanisme</h3>
                            <p class="serc-desc">Découvrez nos activités dans le domaine de l'Urbanisme.</p>
                            <a href="{{ route('guests.services.urbanisme') }}" class="btn btn-success" style="display: inline-flex;">consulter</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="serv">
                            <i class="icon fa fa-book fa-lg"></i>
                            <h3 class="serv-title">Environnement</h3>
                            <p class="serc-desc">Découvrez nos activités dans le domaine de l'Environnement.</p>
                            <a href="{{ route('guests.services.environnement') }}" class="btn btn-success" style="display: inline-flex;">consulter</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="serv">
                            <i class="icon fa-solid fa bi bi-signpost fa-lg"></i>
                            <h3 class="serv-title">Tourisme</h3>
                            <p class="serc-desc">Découvrez nos activités dans le domaine du tourisme.</p>
                            <a href="{{ route('guests.services.tourisme') }}" class="btn btn-success" style="display: inline-flex;">consulter</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="serv">
                            <i class="icon fa-solid fa
                            fa-shield-alt fa-lg"></i>
                            <h3 class="serv-title">Sécurité</h3>
                            <p class="serc-desc">Découvrez nos activités dans le domaine de la Sécurité.</p>
                            <a href="{{ route('guests.services.securite') }}" class="btn btn-success" style="display: inline-flex;">consulter</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="serv">
                            <i class="icon fa-solid fa fa-briefcase fa-lg"></i>
                            <h3 class="serv-title">Emploi</h3>
                            <p class="serc-desc">Découvrez plus sur nos opportinutés d'emplois.</p>
                            <a href="{{ route('guests.services.emplois') }}" class="btn btn-success" style="display: inline-flex;">consulter</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="serv">
                            <i class="icon fa-solid fa fa-users fa-lg"></i>
                            <h3 class="serv-title">Social</h3>
                            <p class="serc-desc">Découvrez nos activités dans le domaine social.</p>
                            <a href="{{ route('guests.services.social') }}" class="btn btn-success" style="display: inline-flex;">consulter</a>
                        </div>
                    </div>

                    <div class="col-md-4 col-xs-12">
                        <div class="serv">
                            <i class="icon fa-solid fa fbi bi-paperclip fa-lg"></i>
                            <h3 class="serv-title">Jumelages</h3>
                            <p class="serc-desc">Découvrez plus par rapport à nos jumelages.</p>
                            <a href="{{ route('guests.services.jumelage-index') }}" class="btn btn-success" style="display: inline-flex;">consulter</a>
                        </div>
                    </div>

                    <div class="col-md-4 col-xs-12">
                        <div class="serv">
                            <i class="icon fa-solid fa bi bi-cash fa-lg"></i>
                            <h3 class="serv-title">Taxes</h3>
                            <p class="serc-desc">Découvrez plus sur les taxes de notre commune.</p>
                            <a href="{{ route('guests.services.taxes') }}" class="btn btn-success" style="display: inline-flex;">consulter</a>
                        </div>
                    </div>

                    <div class="col-md-4 col-xs-12">
                        <div class="serv">
                            <i class="icon fa-solid fa bi bi-cash-stack fa-lg"></i>
                            <h3 class="serv-title">Finances</h3>
                            <p class="serc-desc">Découvrez plus sur les finances de notre commune.</p>
                            <a href="{{ route('guests.services.finances') }}" class="btn btn-success" style="display: inline-flex;">consulter</a>
                        </div>
                    </div>

                    <div class="col-md-4 col-xs-12">
                        <div class="serv">
                            <i class="icon fa-solid fa bi bi-shop fa-lg"></i>
                            <h3 class="serv-title">Marchés publics</h3>
                            <p class="serc-desc">Découvrez nos activités dans le domaine du marché public.</p>
                            <a href="{{ route('guests.services.marchePublic') }}" class="btn btn-success" style="display: inline-flex;">consulter</a>
                        </div>
                    </div>

                    <div class="col-md-4 col-xs-12">
                        <div class="serv">
                            <i class="icon fa-solid fa fa-chart-line fa-lg"></i>
                            <h3 class="serv-title">Statistiques</h3>
                            <p class="serc-desc">Découvrez plus sur les différentes statistiques de la commune.</p>
                            <a href="{{ route('guests.mairie.stats') }}" class="btn btn-success" style="display: inline-flex;">consulter</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Services Section -->

        <!-- ======= Actualites Section ======= -->
        <section id="news" class="news section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h1>Actualités</h1>
                </div>

                <div class="row">
                    @foreach ($actualites as $actualite)
                        @isset($actualite->video_type_id)
                            @if ($actualite->video_type_id == 1)
                                <div class="col-lg-4 col-md-12 d-flex align-items-stretch">
                                    <div class="actu">
                                        <video class="panel-video" controls poster="{{ asset('storage/app/public/' . $actualite->poster) }}">
                                            <source src="{{ asset('storage/app/public/' . $actualite->video) }}" type="video/mp4">
                                        </video>
                                        <div class="actu-info">
                                            <h4 class="actu-title" title="{{ $actualite->titre }}">{{ $actualite->titre }}</h4>
                                            <p class="date">
                                                <span>
                                                    <i class="bi bi-calendar-date"></i>
                                                </span>
                                                <small style="font-style:italic;">Publiée le {{ \Carbon\Carbon::parse($actualite->created_at)->format('d/m/Y') }}</small>
                                            </p>
                                            <a href="{{ route('guests.actualites.actuVideoShow', $actualite) }}" >Lire la vidéo <i class="bi bi-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-lg-4 col-md-12 d-flex align-items-stretch">
                                    <div class="actu">
                                        <iframe class="panel-video" src="https://www.youtube.com/embed/{{ $actualite->lien }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        <div class="actu-info">
                                            <h4 class="actu-title" title="{{ $actualite->titre }}">{{ $actualite->titre }}</h4>
                                            <p class="date">
                                                <span>
                                                    <i class="bi bi-calendar-date"></i>
                                                </span>
                                                <small style="font-style:italic;">Publiée le {{ \Carbon\Carbon::parse($actualite->created_at)->format('d/m/Y') }}</small>
                                            </p>
                                            <a href="{{ route('guests.actualites.actuVideoShow', $actualite) }}" >Lire la vidéo <i class="bi bi-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        @endisset

                        @isset($actualite->title)
                            <div class="col-lg-4 col-md-12 d-flex align-items-stretch">
                                <div class="actu">
                                    <div class="actu-img" style="background-image: url('{{ asset('storage/app/public/' . $actualite->image) }}')"></div>
                                    <div class="actu-info">
                                        <h4 class="actu-title" title="{{ $actualite->title }}">{{ $actualite->title }}</h4>
                                        <p class="date">
                                            <span>
                                                <i class="bi bi-calendar-date"></i>
                                            </span>
                                            <small style="font-style:italic;">Publiée le {{ \Carbon\Carbon::parse($actualite->created_at)->format('d/m/Y') }}</small>
                                        </p>
                                        <p>{!! $actualite->subtitle . '...' !!}</p>
                                        <a href="{{ route('guests.actualites.show', $actualite) }}" >Tout lire <i class="bi bi-arrow-right"></i></a>

                                    </div>
                                </div>
                            </div>
                        @endisset
                    @endforeach
                </div>
            </div>

        </section><!-- End Actualites Section -->

        <!-- ======= projets Section ======= -->
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

                                    <p class="card-text" >{!! $project->subtitle . '...' !!}</p>
                                    <a href="{{ route('guests.projects.projetEnCourShow', $project) }}" >TOUT LIRE <i class="bi bi-arrow-right"></i></a>

                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-12 mt-3">
                        <div class="d-flex justify-content-start">
                            <a href="{{ route('guests.projects.projetEnCour') }}" class="btn projet-button mr-2">Voir tous nos projets <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
        </section><!-- End projets Section -->

        <!--La carte-->
        <section id="carte" class="carte section-bg">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 py-4">
                        <h1 class="carte-section-title">Cartographie de la commune Est-Mono 2</h1>
                        <div data-aos="fade-right" data-aos-delay="100">
                            <center><img src="{{ asset('storage/app/public/' . $cartes->image) }}" class="carte-img" alt=""></center>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 legends">
                        <div class="row justify-content-center">
                            <div class="col-12 carte-legend">
                                <div id="legend-1" class="legend-1 p-3">
                                    <span class="legend-icon"><i class="fa fa-archway"></i></span>
                                    <div class="legend-desc">
                                        <h4 class="legend-title"> <span class="number-counter-1">3</span> Cantons</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 carte-legend">
                                <div id="legend-2" class="legend-2 p-3">
                                    <div class="legend-desc">
                                        <h4 class="legend-title"> <span class="number-counter-2">100</span> villages</h4>
                                    </div>
                                    <span class=" ml-4 legend-icon"><i class="fa fa-city"></i></span>
                                </div>
                            </div>
                            <div class="col-12 carte-legend">
                                <div id="legend-3" class="legend-3 p-3">
                                    <span class="legend-icon"><i class="fa fa-users"></i></span>
                                    <div class="legend-desc">
                                        <h4 class="legend-title"> +<span class="number-counter-3">1 000 000</span> habitants</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

        @if(session()->get('oneAnnonce') != null)
            <p class="d-none oneAnnonceValue" aria-valuetext="1"></p>
            <?php session()->forget('oneAnnonce') ?>
        @else
            <p class="d-none oneAnnonceValue" aria-valuetext="0"></p>
        @endif

        @if(session()->get('someAnnonce') != null)
            <p class="d-none someAnnonceValue" aria-valuetext="1"></p>
            <?php session()->forget('someAnnonce') ?>
        @else
            <p class="d-none someAnnonceValue" aria-valuetext="0"></p>
        @endif

        <div class="modal fade" id="one_annonce" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="border-radius: 15px;">
                    <div class="modal-header">
                        <h5 class="modal-title">Annonce</h5>
                        <button type="button" class="close oneAnnonceCloseButton" aria-label="close" data-dismiss="modal" style="width: auto; margin-left: 0px; border-radius: 0px; background-color: transparent;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-center annonceBell">
                            <span class="fa fa-bell"></span>
                        </div>
                        <div class="d-flex justify-content-center flex-column mt-3">
                            <p class="text-center">Une (1) nouvelle annonce a été publiée par la mairie Est-Mono2</p>
                            <p class="text-center">
                                <?php
                                    $annonce = \App\Models\Annonce::where([
                                        ['expiration_date', '>', now()]
                                    ])->first();
                                ?>
                                @if ($annonce != null)
                                    <a href="{{ route('guests.annonces.show', $annonce) }}" class="btn btn-adn">Voir l'annonce</a>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="some_annonce" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="border-radius: 15px;">
                    <div class="modal-header">
                        <h5 class="modal-title">Annonces</h5>
                        <button type="button" class="close moreAnnonceCloseButton" aria-label="close" data-dismiss="modal" style="width: auto; margin-left: 0px; border-radius: 0px; background-color: transparent;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-center annonceBell">
                            <span class="fa fa-bell"></span>
                        </div>
                        <div class="d-flex justify-content-center flex-column mt-3">
                            <p class="text-center">{{ session()->get('annonceValue') <= 1 ? __('Des ') : __('(') . session()->get('annonceValue') . __(')') }} nouvelles annonces ont été publiées par la mairie du Golfe1</p>
                            <p class="text-center">
                                <a href="{{ route('guests.annonces.index') }}" class="btn btn-adn">Voir les annonces</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </main><!-- End #main -->

@endsection

@section('script')
    {{-- <script src="{{ asset('styles/visitors/OwlCarousel2/dist/owl.carousel.js') }}"></script> --}}
    <script type="text/javascript" src="{{ asset('script/jquery-numerator.js') }}"></script>
    <script>


        $(document).ready(function () {
            $(window).on('scroll', function () {
                let legend1 =  document.getElementById('legend-1').getBoundingClientRect().top;

                let legend2 =  document.getElementById('legend-2').getBoundingClientRect().top;

                let legend3 =  document.getElementById('legend-3').getBoundingClientRect().top;

                let windowTop = $(window).scrollTop()

                let result1 = windowTop - legend1
                let result2 = windowTop - legend2
                let result3 = windowTop - legend3

                getWindowMediaQuerySm = window.matchMedia("(max-width: 900px)");


                if (getWindowMediaQuerySm.matches) {
                    if (result1 > 9950) {
                        $('.number-counter-1').numerator({
                            duration: 500,
                            toValue: 3
                        });
                    }

                    if (result2 > 10100) {
                        $('.number-counter-2').numerator({
                            duration: 500,
                            toValue: 100
                        });
                    }

                    if (result3 > 10300) {
                        $('.number-counter-3').numerator({
                            duration: 1000,
                            toValue: 395190
                        });
                    }
                } else {
                    if (result1 > 4500) {
                        $('.number-counter-1').numerator({
                            duration: 500,
                            toValue: 3
                        });
                    }

                    if (result2 > 4700) {
                        $('.number-counter-2').numerator({
                            duration: 500,
                            toValue: 100
                        });
                    }

                    if (result3 > 4800) {
                        $('.number-counter-3').numerator({
                            duration: 1000,
                            toValue: 395190
                        });
                    }
                }

            })

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
    <script>
        $(document).ready(function() {
            $('.carousel').carousel({
                interval: 5000
            });

            setTimeout(() => {
                $('.anime').removeClass('d-none');
            }, 2000);

            let triggerAnnonce = $('.oneAnnonceValue').attr('aria-valuetext')

            console.log(triggerAnnonce)

            if (triggerAnnonce == 1) {
                $('#one_annonce').modal('show')
                $('.oneAnnonceCloseButton').click(function () {
                    $('#one_annonce').modal('hide')
                })
            }

            let triggerAnnonces = $('.someAnnonceValue').attr('aria-valuetext')

            console.log(triggerAnnonces)

            if (triggerAnnonces == 1) {
                $('#some_annonce').modal('show')
                $('.moreAnnonceCloseButton').click(function () {
                    $('#some_annonce').modal('hide')
                })
            }
        });
    </script>
    <script src="{{ asset('assets/scripts/swiper.min.js') }}"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
            },

            // If we need pagination
            pagination: {
            el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            scrollbar: {
            el: '.swiper-scrollbar',
            },
        });

        const swiperContainer = document.querySelector('.swiper');

        swiperContainer.addEventListener('mouseenter', function() {
            swiper.autoplay.stop();
        });

        swiperContainer.addEventListener('mouseleave', function() {
            swiper.autoplay.start();
        });
    </script>
@endsection
