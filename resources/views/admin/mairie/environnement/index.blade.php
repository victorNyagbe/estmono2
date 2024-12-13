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
                        <h1 class="m-0">Service environnemental</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item active">Service environnemental</li>
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
                        <a href="#!" data-toggle="modal" data-target="#addEnvironnement" class="btn btn-primary text-uppercase"><i class="fa fa-plus-circle"></i> Ajouter un service environnemental</a>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="table-responsive table-responsive-md text-nowrap">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th>Nom</th>
                                        <th>Responsable</th>
                                        <th>Type</th>
                                        <th>Contact</th>
                                        <th width="100">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($environnements as $environnement)
                                        <tr class="text-center">
                                            <td>{{ $environnement->name }}</td>

                                            <td>{{ $environnement->responsable == null ? '-' : $environnement->responsable }}</td>
                                            <td>{{ $environnement->environnement_type->libelle }}</td>
                                            <td>{{ $environnement->contact ==null ? '-' : $environnement->contact }}</td>
                                            <td>
                                                <a href="#!" data-toggle="modal" data-target="#editEnvironnement{{ $environnement->id }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('admin.mairie.environnement.destroy', $environnement) }}" onclick="return confirm('Êtes-vous certain de vouloir supprimer ce service environnemental ? Cette action est irréversible.');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>


                                        <div class="modal fade" id="editEnvironnement{{ $environnement->id }}" role="dialog">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Modifier un service environnemental</h5>
                                                        <button type="button" class="close" aria-label="close" data-dismiss="modal" style="outline: 0;">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('admin.mairie.environnement.update', $environnement) }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PATCH')
                                                            <div class="form-group">
                                                                <label for="type">Type de Service environnemental</label>
                                                                <select name="environnement_type_id" id="type" class="form-control">
                                                                    <option value="">Sélectionner le type de Service environnemental</option>
                                                                    @foreach ($environnement_types as $environnement_type)
                                                                        <option  value="{{ $environnement_type->id }}" {{ $environnement_type->id == $environnement->environnement_type_id ? 'selected' : '' }}>{{ $environnement_type->libelle }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="name">Nom du service environnemental</label>
                                                                <input type="text" name="name" id="name" value="{{ $environnement->name }}" class="form-control" placeholder="Saisir le nom du service environnemental">
                                                            </div>

                                                            <div class="form-row">
                                                                <div class="col-12 col-md-6 mb-4">
                                                                    <label for="responsable">Responsable du service environnemental</label>
                                                                    <input type="text" name="responsable" id="responsable" value="{{ $environnement->responsable }}" class="form-control" placeholder="Saisir le responsable du service environnemental">
                                                                </div>
                                                                <div class="col-12 col-md-6 mb-4">
                                                                    <label for="contact">Contact du service environnemental</label>
                                                                    <input type="text" name="contact" id="contact" value="{{ $environnement->contact }}" class="form-control" placeholder="Saisir le contact du service environnemental">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="d-flex justify-content-center">
                                                                    <button type="submit" class="btn btn-success text-uppercase">Enregistrer le Service environnemental</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="6">Aucun service environnemental n'a été enregistré</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="addEnvironnement" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Ajouter un service environnemental</h5>
                                <button type="button" class="close" aria-label="close" data-dismiss="modal" style="outline: 0;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.mairie.environnement.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="type">Type de service environnemental</label>
                                        <select name="environnement_type_id" id="type" class="form-control">
                                            <option value="">Sélectionner le type de service environnemental'</option>
                                            @foreach ($environnement_types as $environnement_type)
                                                <option value="{{ $environnement_type->id }}"> {{ $environnement_type->libelle }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Nom du service environnemental</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Saisir le nom du service environnemental">
                                    </div>

                                    <div class="form-row">
                                        <div class="col-12 col-md-6 mb-4">
                                            <label for="responsable">Responsable du service environnemental</label>
                                            <input type="text" name="responsable" id="responsable" class="form-control" placeholder="Saisir le responsable du service environnemental">
                                        </div>
                                        <div class="col-12 col-md-6 mb-4">
                                            <label for="contact">Contact du service environnemental</label>
                                            <input type="text" name="contact" id="contact" class="form-control" placeholder="Saisir le contact du service environnemental">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-success text-uppercase">Enregistrer le service environnemental</button>
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
