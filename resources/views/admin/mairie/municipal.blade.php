@extends('admin.layouts.admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/admin/mairie/municipal.css') }}">
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
                            <li class="breadcrumb-item active">Conseil municipal</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">
                @include('admin.includes.messageReturned')

                <div class="row">
                    <div class="col-12 mb-4 mt-2">
                        <a href="#!" data-toggle="modal" data-target="#addMember" class="btn btn-primary text-uppercase"><i class="fa fa-plus-circle"></i> Ajouter un membre</a>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="table-responsive table-responsive-md text-nowrap">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th width="180">Image</th>
                                        <th>Nom</th>
                                        <th>Prénoms</th>
                                        <th>Titres</th>
                                        <th>Téléphone</th>
                                        <th width="100">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($municipals as $municipal)
                                        <tr class="text-center">
                                            <td><div class="municipal-image" style="background-image: url('{{ asset('storage/app/public/' . $municipal->image) }}')"></div></td>
                                            <td>{{ $municipal->lastname }}</td>
                                            <td>{{ $municipal->firstname }}</td>
                                            <td>{{ $municipal->municipal_type->nom }}</td>
                                            <td>{{ $municipal->contact }}</td>
                                            <td>
                                                <a href="{{ route('admin.mairie.municipal.show', $municipal) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('admin.mairie.municipal.destroy', $municipal) }}" onclick="return confirm('Êtes-vous certain de vouloir supprimer ce membre du conseil ? Cette action est irréversible.');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="5">Aucun membre n'a été enregistré</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="addMember" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Ajouter un membre</h5>
                                <button type="button" class="close" aria-label="close" data-dismiss="modal" style="outline: 0;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.mairie.municipal.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="type">Titre du membre</label>
                                        <select name="type" id="type" class="form-control">
                                            <option value="">Sélectionner le titre du membre</option>
                                            @foreach ($types as $type)
                                                <option value="{{ $type->id }}">{{ $type->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image du membre</label>
                                        <input type="file" name="image" id="image" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname">Nom du membre</label>
                                        <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Saisir le nom du membre">
                                    </div>
                                    <div class="form-group">
                                        <label for="firstname">Prénoms du membre</label>
                                        <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Saisir le(s) prénom(s) du membre">
                                    </div>
                                    <div class="form-group">
                                        <label for="occupation">Poste du membre</label>
                                        <input type="text" name="occupation" id="occupation" class="form-control" placeholder="Saisir le poste du membre">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_number">Numero de telephone</label>
                                        <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="Saisir le numéro de téléphone">
                                    </div>
                                    <div class="form-group">
                                        <label for="facebook">Facebook</label>
                                        <input type="url" name="facebook" id="facebook" class="form-control" placeholder="Lien profil facebook">
                                    </div>
                                    <div class="form-group">
                                        <label for="whatsapp">Whatsapp</label>
                                        <input type="text" name="whatsapp" id="whatsapp" class="form-control" placeholder="Numéro whatsapp">
                                    </div>
                                    <div class="form-group">
                                        <label for="linkedin">Linkedin</label>
                                        <input type="url" name="linkedin" id="linkedin" class="form-control" placeholder="Lien profil linkedin">
                                    </div>
                                    <div class="form-group">
                                        <label for="twitter">Twitter</label>
                                        <input type="text" name="twitter" id="twitter" class="form-control" placeholder="Lien profil twitter">
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-success text-uppercase">Enregistrer le membre</button>
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

@endsection
