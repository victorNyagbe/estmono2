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
                        <h1 class="m-0">Centre culturel</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item active">Centre culturel</li>
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
                        <a href="#!" data-toggle="modal" data-target="#addCulture" class="btn btn-primary text-uppercase"><i class="fa fa-plus-circle"></i> Ajouter un centre culturel</a>
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
                                    @forelse ($cultures as $culture)
                                        <tr class="text-center">
                                            <td>{{ $culture->name }}</td>

                                            <td>{{ $culture->responsable == null ? '-' : $culture->responsable }}</td>
                                            <td>{{ $culture->culture_type->libelle }}</td>
                                            <td>{{ $culture->contact ==null ? '-' : $culture->contact }}</td>
                                            <td>
                                                <a href="#!" data-toggle="modal" data-target="#editCulture{{ $culture->id }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('admin.mairie.culture.destroy', $culture) }}" onclick="return confirm('Êtes-vous certain de vouloir supprimer ce centre culturel ? Cette action est irréversible.');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>


                                        <div class="modal fade" id="editCulture{{ $culture->id }}" role="dialog">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Modifier un centre culturel</h5>
                                                        <button type="button" class="close" aria-label="close" data-dismiss="modal" style="outline: 0;">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('admin.mairie.culture.update', $culture) }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PATCH')
                                                            <div class="form-group">
                                                                <label for="type">Type de centre culturel</label>
                                                                <select name="culture_type_id" id="type" class="form-control">
                                                                    <option value="">Sélectionner le type de centre culturel</option>
                                                                    @foreach ($culture_types as $culture_type)
                                                                        <option  value="{{ $culture_type->id }}" {{ $culture_type->id == $culture->culture_type_id ? 'selected' : '' }}>{{ $culture_type->libelle }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="name">Nom de la culture</label>
                                                                <input type="text" name="name" id="name" value="{{ $culture->name }}" class="form-control" placeholder="Saisir le nom du centre culturel">
                                                            </div>

                                                            <div class="form-row">
                                                                <div class="col-12 col-md-6 mb-4">
                                                                    <label for="responsable">Responsable du centre culturel</label>
                                                                    <input type="text" name="responsable" id="responsable" value="{{ $culture->responsable }}" class="form-control" placeholder="Saisir le responsable du centre culturel">
                                                                </div>
                                                                <div class="col-12 col-md-6 mb-4">
                                                                    <label for="contact">Contact du centre culturel</label>
                                                                    <input type="text" name="contact" id="contact" value="{{ $culture->contact }}" class="form-control" placeholder="Saisir le contact du centre culturel">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="d-flex justify-content-center">
                                                                    <button type="submit" class="btn btn-success text-uppercase">Enregistrer le centre culturel</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="6">Aucune centre culturel n'a été enregistré</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="addCulture" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Ajouter un centre culturel</h5>
                                <button type="button" class="close" aria-label="close" data-dismiss="modal" style="outline: 0;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.mairie.culture.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="type">Type de centre culturel</label>
                                        <select name="culture_type_id" id="type" class="form-control">
                                            <option value="">Sélectionner le type de centre culturel</option>
                                            @foreach ($culture_types as $culture_type)
                                                <option value="{{ $culture_type->id }}"> {{ $culture_type->libelle }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Nom de la culture</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Saisir le nom du centre culturel">
                                    </div>

                                    <div class="form-row">
                                        <div class="col-12 col-md-6 mb-4">
                                            <label for="responsable">Responsable du centre culturel</label>
                                            <input type="text" name="responsable" id="responsable" class="form-control" placeholder="Saisir le responsable du centre culturel">
                                        </div>
                                        <div class="col-12 col-md-6 mb-4">
                                            <label for="contact">Contact du centre culturel</label>
                                            <input type="text" name="contact" id="contact" class="form-control" placeholder="Saisir le contact du centre culturel">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-success text-uppercase">Enregistrer le centre culturel</button>
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
