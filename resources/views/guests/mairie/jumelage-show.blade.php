@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/mairie/jumelage-show.css') }}">
@endsection

@section('content')
    <div class="container-fluid custom-banner">
        <div class="container">
            <div class="row justify-content-center breadcrumb-row pt-5">
                <div class="col-12 col-md-8 col-xl-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('guests.mairie.jumelage-index') }}">Jumelages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Details de jumelage</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12">
                    <div class="details-jumelage p-0">
                        <div class="imgbx" style="background-image: url('{{ asset('assets/images/jum.jpg') }}');"></div>
                        <h2 class="details-text">jumelage entre la commune Golfe 1 et la france</h2>
                        <p><small><i class="bx bx-calendar-check"></i> Publié le 12-06-2022 à 18h00min</small></p>
                        <div class="details-jumelage-text">
                            <p>
                                Dans le but de
                                favoriser une plus large participation des habitants de la commune aux activités de jumelage,
                                marquer l'importance qu'elle attache à la vie associative et de privilégier cette dernière dans tous les
                                domaines où les interventions de type purement administratifs ne s'avèrent pas nécessaires,
                                soulager le Conseil Municipal et/ou ses commissions d'un certain nombre de tâches qui peuvent être
                                déléguées;
                                la commune mandate le comité de jumelage de mettre en œuvre, pour son compte, toutes les activités
                                normalement impliquées par les jumelages à l'exception de celles qui ne peuvent être entreprises qu'en vertu du
                                mandat électif détenu par le Maire et le Conseil Municipal ou qui engagent leur responsabilité propre.
                            </p>

                            <p>
                                Dans le respect des relations établies entre nos deux pays et en accord avec le principe de subsidiarité,
                                De maintenir des liens permanents entre les municipalités de nos communes afin de dialoguer,
                                d’échanger nos expériences et de mettre en œuvre toute action conjointe susceptible de nous enrichir
                                mutuellement dans tous les domaines relevant de notre compétence,
                                D’encourager et de soutenir les échanges entre nos concitoyens pour développer, par une meilleure
                                compréhension mutuelle et une coopération efficace, le sentiment vivant de la fraternité européenne au
                                service d’un destin désormais commun,
                                D’agir selon les règles de l’hospitalité, dans le respect de nos diversités, dans un climat de confiance et
                                dans un esprit de solidarité,
                                De garantir à toute personne la possibilité de participer aux échanges entre nos deux communes sans
                                discrimination de quelque nature que ce soit,
                                De promouvoir, à travers nos échanges et notre coopération, les valeurs universelles que constituent la
                                liberté, la démocratie, l’égalité, et l’Etat de droit,
                                De conjuguer nos efforts afin d'aider dans la pleine mesure de nos moyens au succès de cette nécessaire
                                entreprise de paix, de progrès et de prospérité :
                            </p>
                            <p>
                                Dans le but de
                                favoriser une plus large participation des habitants de la commune aux activités de jumelage,
                                marquer l'importance qu'elle attache à la vie associative et de privilégier cette dernière dans tous les
                                domaines où les interventions de type purement administratifs ne s'avèrent pas nécessaires,
                                soulager le Conseil Municipal et/ou ses commissions d'un certain nombre de tâches qui peuvent être
                                déléguées;
                                la commune mandate le comité de jumelage de mettre en œuvre, pour son compte, toutes les activités
                                normalement impliquées par les jumelages à l'exception de celles qui ne peuvent être entreprises qu'en vertu du
                                mandat électif détenu par le Maire et le Conseil Municipal ou qui engagent leur responsabilité propre.
                            </p>
                        </div>
                        <div class="jumelage-other-image">
                            <h5>Quelques photos illustratives:</h5>
                            <div class="row mt-3">
                                <div class="col-12 col-md-4 mb-4">
                                    <div class="other-img">
                                        <img src="{{ asset('assets/images/jum.jpg') }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mb-4">
                                    <div class="other-img">
                                        <img src="{{ asset('assets/images/jum.jpg') }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mb-4">
                                    <div class="other-img">
                                        <img src="{{ asset('assets/images/jum.jpg') }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mb-4">
                                    <div class="other-img">
                                        <img src="{{ asset('assets/images/jum.jpg') }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mb-4">
                                    <div class="other-img">
                                        <img src="{{ asset('assets/images/jum.jpg') }}" alt="" class="img-fluid">
                                    </div>
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
    <script>
        $('document').ready(function () {

        });
    </script>
@endsection
