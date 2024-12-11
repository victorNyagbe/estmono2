@extends('admin.layouts.admin')

@section('style')
    <style>
        .user-image {
            background-position: top;
            background-size: cover;
            background-repeat: no-repeat;
            position: relative;
            height: 50vh;
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
                            <li class="breadcrumb-item active">Mon Profil</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">
                @include('admin.includes.messageReturned')

                <div class="row justify-content-center mt-4 mt-md-5 mb-3">
                    <div class="col-12 col-md-4 mb-4">
                        @if (session()->get('image'))
                            <div class="user-image" style="background-image: url('{{ asset('storage/app/public/' . session()->get('image')) }}')"></div>

                        @else
                            <div class="user-image" style="background-image: url('{{ asset('assets/images/avatar.svg') }}')"></div>
                        @endif
                    </div>
                    <div class="col-12 col-md-8">
                        <form action="{{ route('admin.user.updateConnectedUser') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-4">
                                    <label for="fullname">Nom et Prénom(s):</label>
                                    <input type="text" name="fullname" id="fullname" value="{{ $user->name }}" class="form-control" placeholder="Saisir le nom complet...">
                                </div>
                                <div class="col-12 col-md-6 mb-4">
                                    <label for="email">Adresse électronique:</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" placeholder="Saisir l'adresse électronique...">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-4">
                                    <label for="avatar">Avatar:</label>
                                    <input type="file" name="avatar" id="avatar" class="form-control">
                                </div>
                                <div class="col-12 col-md-6 mb-4">
                                    <label for="contact">Contact:</label>
                                    <input type="text" name="contact" id="contact" class="form-control" value="{{ $user->contact }}" placeholder="Saisir le contact...">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-flex justify-content-center flex-column flex-md-row align-items-center">
                                    <button type="submit" class="btn btn-success text-uppercase mr-3 mb-4 mb-md-0">Valider la modification</button>
                                    <a href="#!" data-toggle="modal" data-target="#changePassword" class="btn btn-warning text-uppercase">Modifier mot de passe</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="modal fade" id="changePassword" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modifier mot de passe</h5>
                                <button type="button" class="close" aria-label="close" data-dismiss="modal" style="outline: 0;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.user.updateConnectedUserPassword') }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group">
                                        <label for="old_password">Ancien mot de passe:</label>
                                        <input type="password" name="old_password" id="old_password" class="form-control password" placeholder="Saisir l'ancien mot de passe">
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password">Nouveau mot de passe:</label>
                                        <input type="password" name="new_password" id="new_password" class="form-control password" placeholder="Saisir le nouveau mot de passe">
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password_confirmation">Confirmation:</label>
                                        <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control password" placeholder="Confirmer le nouveau mot de passe">
                                    </div>
                                    <div class="form-group">
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" id="checkPassword">
                                            <label for="checkPassword">Afficher les mots de passe</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-success text-uppercase">Valider</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
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
