@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/OwlCarousel2/dist/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/visitors/OwlCarousel2/dist/assets/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/investor.css') }}">
    <style>
        .text span{
            font-weight: 800;
        }

        .custom-container {
            background-color: rgba(255, 255, 255, 0.95);
        }

        .custom-btn {
            border-bottom-right-radius: 0.5rem;
            border-bottom-left-radius: 0.5rem;
            font-size: 1.2rem;
            text-transform: uppercase;
        }

        .btn-custom-info, .btn-custom-info:hover, .btn-custom-info:focus, .btn-custom-info:focus-visible{
            background-color: var(--secondary);
            border-color: var(--secondary);
            color: #fff;
        }

        .btn-custom-primary, .btn-custom-primary:hover, .btn-custom-primary:focus, .btn-custom-primary:focus-visible, .btn-custom-primary:focus-within {
            background-color: #240602;
            border-color: #240602;
            border-radius: 0.25rem;
            color: #fff;
        }
    </style>
@endsection

@section('content')
    <!--en tête-->
    <header class="index">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="title-index">
                        <h1>Investisseurs</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <!--contenu-->
    <section class="contenu p-0">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <a href="#!" data-toggle="modal" data-target="#beInvestor" class="btn btn-custom-info custom-btn">Devenir investisseur <i class="fas fa-hands-helping"></i></a>
                    <div class="modal fade" id="beInvestor" role="dialog">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Devenir investisseur</h5>
                                    <div class="close" aria-label="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <form action="#" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="enterprise_name">Nom de société:</label>
                                            <input type="text" name="enterprise_name" id="enterprise_name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="enterprise_email">Email:</label>
                                            <input type="email" name="enterprise_email" id="enterprise_email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="enterprise_message">Message:</label>
                                            <textarea name="enterprise_message" id="enterprise_message" class="form-control" rows="6" placeholder="Parlez de vous brièvement"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" onclick="event.preventDefault(); alert('fonctionnalite en maintenance...');" class="btn btn-success" style="border-radius: 0.4rem; text-transform: uppercase;">envoyer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center py-5">
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="investor-card">
                        <div class="investor-card-imgBx">
                            <div class="investor-card-img">
                                <img src="{{ asset('assets/images/investisseurs/part1.png') }}" alt="">
                            </div>
                        </div>
                        <div class="investor-card-header">
                            <h3 class="investor-name">PARTENAIRE</h3>
                        </div>
                        <div class="investor-card-body">
                            <div class="investor-text">
                                La Faitière des Communes du TOGO (FCT) est créée le 14 Novembre 2020 à Kara. Elle est une association qui vise la bonne gouvernance locale inclusive.
                            </div>
                            {{-- <h4 class="investor-phone"><i class="fa fa-phone-alt"></i> 97 37 48 62 / 22 24 87 45</h4>
                            <h4 class="investor-ceo"><i class="fa fa-user-tie"></i> NYAGBE Koffitse Mensa See</h4> --}}
                            <a href="https://faitiere.sogevo.com" class="text-center btn btn-outline-success mt-5">Plus de détails</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="investor-card">
                        <div class="investor-card-imgBx">
                            <div class="investor-card-img">
                                <img src="{{ asset('assets/images/investisseurs/part2.png') }}" alt="">
                            </div>
                        </div>
                        <div class="investor-card-header">
                            <h3 class="investor-name">ANADEB</h3>
                        </div>
                        <div class="investor-card-body">
                             <div class="investor-text">
                                Créée par décret n° 2011-017/PR du 19 janvier 2011, ANADEB est un établissement public doté d’une autonomie financière.
                            </div>
                            {{--<h4 class="investor-phone"><i class="fa fa-phone-alt"></i> 97 37 48 62 / 22 24 87 45</h4>
                            <h4 class="investor-ceo"><i class="fa fa-user-tie"></i> NYAGBE Koffitse Mensa See</h4> --}}
                            <a href="http://anadeb.org/" class="text-center btn btn-outline-success mt-3">Plus de détails</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="investor-card">
                        <div class="investor-card-imgBx">
                            <div class="investor-card-img">
                                <img src="{{ asset('assets/images/investisseurs/part3.png') }}" alt="">
                            </div>
                        </div>
                        <div class="investor-card-header">
                            <h3 class="investor-name">Plan International</h3>
                        </div>
                        <div class="investor-card-body">
                            <div class="investor-text">
Fondée en 1937, Plan International est une organisation de développement et humanitaire qui travaille avec des enfants, des jeunes, des sympathisants et des partenaires pour lutter pour un monde juste.
                            </div>
                             {{--<h4 class="investor-phone"><i class="fa fa-phone-alt"></i> 97 37 48 62 / 22 24 87 45</h4>
                            <h4 class="investor-ceo"><i class="fa fa-user-tie"></i> NYAGBE Koffitse Mensa See</h4> --}}
                            <a href="https://plan-international.org/" class="text-center btn btn-outline-success mt-3">Plus de détails</a>
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

{{-- <div class="card">
    <div class="view overlay">
        <img class="card-img-top" src="{{ asset('assets/images/photos/urbanisme.jpg') }}"
            alt="Card image cap">
        <a href="#!">
            <div class="mask rgba-white-slight"></div>
        </a>
    </div>
    <div class="card-body">
        <h4 class="card-title">CIMTOGO</h4>
        <p class="card-text">
            Cimtogo, "Ciments du Togo" a été fondée le 20 Février 1969 par décret n°69/145 du 12 Juillet 1969
            dans le cadre d’un projet régional CIMAO ...
        </p>
        <a href="#!" data-toggle="modal" data-target="#cimtogo" class="btn btn-custom-primary">Découvrir brièvement</a>
    </div>
    <div class="modal fade" id="cimtogo" role="dialog">
        <div class="modal-dialog modal-full-height modal-top" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-label="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h1>Bienvenue a CIMTOGO</h1>
                </div>
            </div>
        </div>
    </div>
</div> --}}
