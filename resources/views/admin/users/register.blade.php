@extends('admin.layouts.admin')

@section('style')
    <style>
        .user-image {
            background-position: top;
            background-size: cover;
            background-repeat: no-repeat;
            position: relative;
            height: 10vh;
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Administrateurs</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.user.admins') }}">Administrateurs</a></li>
                            <li class="breadcrumb-item active">Inscription</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">
                @include('admin.includes.messageReturned')

                <div class="row justify-content-center mt-4 mt-md-5 mb-3">
                    <div class="col-12 col-md-10 col-lg-8">
                        <form action="{{ route('admin.user.register') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-4">
                                    <label for="fullname">Nom et Prénom(s):</label>
                                    <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Saisir le nom complet...">
                                </div>
                                <div class="col-12 col-md-6 mb-4">
                                    <label for="email">Adresse électronique:</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Saisir l'adresse électronique...">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-4">
                                    <label for="avatar">Avatar:</label>
                                    <input type="file" name="avatar" id="avatar" class="form-control">
                                </div>
                                <div class="col-12 col-md-6 mb-4">
                                    <label for="contact">Contact:</label>
                                    <input type="text" name="contact" id="contact" class="form-control" placeholder="Saisir le contact...">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-4">
                                    <label for="password">Mot de passe:</label>
                                    <input type="password" name="password" id="password" class="form-control password" placeholder="Saisir le mot de passe...">
                                </div>
                                <div class="col-12 col-md-6 mb-4">
                                    <label for="password_confirmation">Confirmation:</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control password" placeholder="Confirmer le mot de passe...">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="checkPassword">
                                    <label for="checkPassword">Afficher le mot de passe</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success text-uppercase">Valider l'enregistrement</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#checkPassword').change(function () {
                if ($(this).is(':checked')) {
                    $('.password').attr('type', 'text')
                } else {
                    $('.password').attr('type', 'password')
                }
            });
        });
    </script>
@endsection
