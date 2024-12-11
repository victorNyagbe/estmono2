@extends('admin.layouts.admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/admin/mairie/municipal.css') }}">
    <style>
        .municipal-image {
            background-position: top;
            background-size: cover;
            background-repeat: no-repeat;
            position: relative;
            height: 37vh;
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Conseil Municipal</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.mairie.municipal.index') }}">Conseil Municipal</a></li>
                            <li class="breadcrumb-item active">Détails</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">
                @include('admin.includes.messageReturned')

                <div class="row justify-content-center">
                    <div class="col-12 col-md-4 col-lg-5 mb-4">
                        <h3 class="mb-3">Image Actuelle</h3>
                        <div class="municipal-image" style="background-image: url('{{ asset('storage/app/public/' . $municipal->image) }}')"></div>
                    </div>
                    <div class="col-12 col-md-8 col-lg-7">
                        <form action="{{ route('admin.mairie.municipal.update', $municipal) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="type">Titre du membre</label>
                                <select name="type" id="type" class="form-control">
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}" {{ $type->id == $municipal->municipal_type_id ? "selected" : "" }}>{{ $type->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Image du membre</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="lastname">Nom du membre</label>
                                <input type="text" name="lastname" id="lastname" value="{{ $municipal->lastname }}" class="form-control" placeholder="Saisir le nom du membre">
                            </div>
                            <div class="form-group">
                                <label for="firstname">Prénoms du membre</label>
                                <input type="text" name="firstname" id="firstname" value="{{ $municipal->firstname }}" class="form-control" placeholder="Saisir le(s) prénom(s) du membre">
                            </div>
                            <div class="form-group">
                                <label for="occupation">Poste du membre</label>
                                <input type="text" name="occupation" id="occupation" value="{{ $municipal->occupation }}" class="form-control" placeholder="Saisir le poste du membre">
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Numero de telephone</label>
                                <input type="text" name="phone_number" id="phone_number" value="{{ $municipal->contact }}" class="form-control" placeholder="Saisir le numéro de téléphone">
                            </div>
                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input type="url" name="facebook" id="facebook" value="{{ $municipal->facebook }}" class="form-control" placeholder="Lien profil facebook">
                            </div>
                            <div class="form-group">
                                <label for="whatsapp">Whatsapp</label>
                                <input type="text" name="whatsapp" id="whatsapp" value="{{ $municipal->whatsapp }}" class="form-control" placeholder="Numéro whatsapp">
                            </div>
                            <div class="form-group">
                                <label for="linkedin">Linkedin</label>
                                <input type="url" name="linkedin" id="linkedin" value="{{ $municipal->linkedin }}" class="form-control" placeholder="Lien profil linkedin">
                            </div>
                            <div class="form-group">
                                <label for="twitter">Twitter</label>
                                <input type="text" name="twitter" id="twitter" value="{{ $municipal->twitter }}" class="form-control" placeholder="Lien profil twitter">
                            </div>
                            <div class="form-group">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success text-uppercase">Modifier le membre</button>
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

@endsection
