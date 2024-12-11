@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/services/marchePublic.css') }}">
@endsection

@section('content')
    <div class="banner-background">
        <div class="banner-filter">
            <h4 class="banner-title text-center animate__animated animate__rotateInUpLeft animate__repeat-1 animate__slower">Marchés publics</h4>
        </div>
    </div>

    <div class="container-fluid custom-banner">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h4 class="text-center presentation-text">
                        Presentation
                    </h4>
                </div>
                <div class="col-12">
                    <p class="">
                        La procédure de passation des marchés publics de la commune consiste à élaborer le dossier d'appel à concurrence ouvrant un délai précis aux soummissaires de postuler.
                    </p>
                    <p>
                        À la fin de ce délai a lieu l'ouverture des offres sanctionnée par un procès verbal. 
Les offres subiront une évaluation par la cellule de gestion des marchés publics, aboutissant à une attribution provisoire qui sera validée ou non par la commission de contrôle des marchés publics.

                    </p>
                    <p>
                        Ensuite est ouverte une période de recours pour tous soummissaires qui se voit évincer lors de la phase d'attribution du marché. Cette période s'étend sur 7 jours ouvrables.
A l'expiration de cette période, l'autorité contractante passera à la signature du contrat avec le soumissionnaire attributaire.
A l'issue de ce contrat, l'autorité contractante prescrit le démarrage des travaux par un ordre de service. 
Une fois les travaux exécutés ou fournitures faites, l'attributaire demande la réception provisoire. Ainsi il sera payé à hauteur de 95% du montant TTC du marché.
Douze (12) mois plus tard, la réception définitive a lieu pour permettre à l'entreprise attributaire d'être payé du reste (5%) du montant du marché.  

                    </p>
                </div>

                <div class="col-12">
                    <h4 class="text-center presentation-text">
                        les Appels d'offres
                    </h4>
                </div>
                <div class="col-12">
                    <div class="row">
                        @foreach ($marches as $marche)
                            <div class="col-12 col-sm-6 col-md-4 mb-4">
                                <div class="document-panel">
                                    <div class="document-pdfIconBox">
                                        <div class="document-pdfIcon">
                                            <img src="{{ asset('assets/images/pdf.png') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="document-infos">
                                        <div class="document-titleBox">
                                            <h5 class="document-title">{{ $marche->title }}</h5>
                                            <h6 class="document-title-date">{{ \Carbon\Carbon::parse($marche->created_at)->locale('fr')->isoFormat('MMMM YYYY') }}</h6>
                                        </div>
                                        <div class="document-separator"></div>
                                        <div class="document-actions text-center">
                                            <a href="{{ asset('storage/app/public/' . $marche->file . '#toolbar=0') }}" target="_blank" class="btn btn-warning seePdf text-dark mr-1"><i class="fa fa-eye"></i></a>
                                            <a href="{{ route('admin.mairie.marches.download.downloadMarche', $marche) }}" class="btn btn-primary text-white downloadBtn"><i class="fas fa-file-download"></i> Télécharger</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>


                    <!-- <div class="col-12 col-md-4 my-4">
                        <div class="marche py-4">
                            <div>
                                <h4 class="marche-title">
                                    Assistance technique au programme d'appui à la lutte contre le changement climatique, la protection de
                                    la biodiversité et l’agroécologie au Togo – PALCC+
                                </h4>
                            </div>
                            <hr>
                            <div class="col-12 marche-btn">
                                <a href="" class="btn btn-success">Télécharger l'offre <i class="bi bi-download"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 my-4">
                        <div class="marche py-4">
                            <div>
                                <h4 class="marche-title">
                                    Assistance technique au programme d'appui à la lutte contre le changement climatique, la protection de
                                    la biodiversité et l’agroécologie au Togo – PALCC+
                                </h4>
                            </div>
                            <hr>
                            <div class="col-12 marche-btn">
                                <a href="" class="btn btn-success">Télécharger l'offre <i class="bi bi-download"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 my-4">
                        <div class="marche py-4">
                            <div>
                                <h4 class="marche-title">
                                    Assistance technique au programme d'appui à la lutte contre le changement climatique, la protection de
                                    la biodiversité et l’agroécologie au Togo – PALCC+
                                </h4>
                            </div>
                            <hr>
                            <div class="col-12 marche-btn">
                                <a href="" class="btn btn-success">Télécharger l'offre <i class="bi bi-download"></i></a>
                            </div>
                        </div>
                    </div> -->

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
