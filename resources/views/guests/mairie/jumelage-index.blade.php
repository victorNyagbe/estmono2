@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/mairie/jumelage-index.css') }}">
@endsection

@section('content')
    <div class="banner-background">
        <div class="banner-filter">
            <h4 class="banner-title text-center animate__animated animate__rotateInUpLeft animate__repeat-1 animate__slower">Jumelage</h4>
        </div>
    </div>

    <div class="custom-banner">
        <div class="container-fluid py-4 px-5">
            <div class="row justify-content-center">

                <div class="col-12 mb-4">
                    <h4 class="school-title">
                        Jumelages de la commune Est-Mono 2
                    </h4>
                </div>

                <div class="col-12">
                </div>

                <div class="col-12">
                    <p class="text-center">
                        <b>A renseigner !!</b>
                    </p>
                </div>
                <div class="col-12 mt-4">
                    <h4 class="school-title">
                        Demander un jumelages de la commune est-Mono 2
                    </h4>
                </div>
                <div class="col-12 col-md-8 jumelag my-4">
                    <!--Section: Contact v.2-->
                    <section class="jumelag-content">

                        <!--Section heading-->
                        <h1 class="h1-responsive font-weight-bold text-center mb-4">Faire une demande</h1>
                        <!--Section description-->
                        <p class="text-center w-responsive mx-auto mb-4 text-danger">NB: Uniquement pour les communes.</p>

                        <div class="row d-flex justify-content-center">

                            <!--Grid column-->
                            <div class="col-12 mb-5">
                                <form action="mail.php" method="POST">

                                    <div class="form-row">
                                        <div class="col-12 col-md-6">
                                            <label for="name" class="form-title">NOM DU PAYS * :</label>
                                            <select name="country" id="country" class="form-control">
                                                <option value="">Sélectionner votre pays</option>
                                                @foreach ($countries as $pays)
                                                    <option value="{{ $pays->id }}">{{ $pays->nom_fr_fr }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6 mb-4">
                                            <label for="name" class="form-title">NOM DE LA COMMUNE * :</label>
                                            <input type="text" id="name" name="name" class="form-control" placeholder="Saisir le nom de la commune">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-12 col-md-6 mb-4">
                                            <label for="email" class="form-title">EMAIL DE LA COMMUNE * :</label>
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Saisir le mail de la commune">
                                        </div>
                                        <div class="col-12 col-md-6 mb-4">
                                            <label for="maire" class="form-title">NOM DU MAIRE :</label>
                                            <input type="text" id="maire" name="maire" class="form-control" placeholder="Saisir le maire de la commune">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="message" class="form-title">DESCRIPTION :</label>
                                        <textarea type="text" id="message" name="message" rows="7" class="form-control md-textarea" placeholder="Parlez nous un peu de l'objectif de votre demande ici...."></textarea>
                                    </div>
                                    <!--Grid row-->

                                    <div class="form-group">
                                        <button type="submit" class="btn validate-btn text-uppercase">valider</button>
                                    </div>

                                </form>
                            </div>
                            <!--Grid column-->

                        </div>

                    </section>
                    <!--Section: Contact v.2-->
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
