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
                        <h1 class="m-0">Education</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item active">Education</li>
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
                        <a href="#!" data-toggle="modal" data-target="#addEducation" class="btn btn-primary text-uppercase"><i class="fa fa-plus-circle"></i> Ajouter un établissement</a>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="table-responsive table-responsive-md text-nowrap">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th>Nom</th>
                                        <th>Type d'académie</th>
                                        <th>Statut</th>
                                        <th>Responsable</th>
                                        <th>Contact</th>
                                        <th width="100">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($educations as $education)
                                        <tr class="text-center">
                                            <td>{{ $education->name }}</td>
                                            <td>{{ $education->education_type->libelle }}</td>
                                            <td>{{ $education->status }}</td>
                                            <td>{{ $education->responsable == null ? '-' : $education->responsable }}</td>
                                            <td>{{ $education->contact ==null ? '-' : $education->contact }}</td>
                                            <td>
                                                <a href="#!" data-toggle="modal" data-target="#editEducation{{ $education->id }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('admin.mairie.education.destroy', $education) }}" onclick="return confirm('Êtes-vous certain de vouloir supprimer cet établissement ? Cette action est irréversible.');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>


                                        <div class="modal fade" id="editEducation{{ $education->id }}" role="dialog">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Modifier un établissement</h5>
                                                        <button type="button" class="close" aria-label="close" data-dismiss="modal" style="outline: 0;">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('admin.mairie.education.update', $education) }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PATCH')
                                                            <div class="form-group">
                                                                <label for="type">Type d'établissement</label>
                                                                <select name="type" id="type" class="form-control">
                                                                    <option value="">Sélectionner le type d'établissement</option>
                                                                    @foreach ($education_types as $education_type)
                                                                        <option value="{{ $education_type->id }}" {{ $education_type->id == $education->education_type_id ? 'selected' : '' }}>{{ $education_type->libelle }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="name">Nom de l'établissement</label>
                                                                <input type="text" name="name" id="name" value="{{ $education->name }}" class="form-control" placeholder="Saisir le nom de l'établissement">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="status">Statut de l'établissement</label>
                                                                <input type="text" name="status" id="status" value="{{ $education->status }}" class="form-control" placeholder="Saisir le statut de l'établissement">
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col-12 col-md-6 mb-4">
                                                                    <label for="responsable">Responsable de l'établissement</label>
                                                                    <input type="text" name="responsable" id="responsable" value="{{ $education->responsable }}" class="form-control" placeholder="Saisir le responsable de l'établissement">
                                                                </div>
                                                                <div class="col-12 col-md-6 mb-4">
                                                                    <label for="contact">Contact de l'établissement</label>
                                                                    <input type="text" name="contact" id="contact" value="{{ $education->contact }}" class="form-control" placeholder="Saisir le contact de l'établissement">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="d-flex justify-content-center">
                                                                    <button type="submit" class="btn btn-success text-uppercase">Enregistrer l'établissement</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="6">Aucun établissement n'a été enregistré</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="addEducation" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Ajouter un établissement</h5>
                                <button type="button" class="close" aria-label="close" data-dismiss="modal" style="outline: 0;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.mairie.education.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="type">Type d'établissement</label>
                                        <select name="type" id="type" class="form-control">
                                            <option value="">Sélectionner le type d'établissement</option>
                                            @foreach ($education_types as $education_type)
                                                <option value="{{ $education_type->id }}">{{ $education_type->libelle }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Nom de l'établissement</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Saisir le nom de l'établissement">
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Statut de l'établissement</label>
                                        <input type="text" name="status" id="status" class="form-control" placeholder="Saisir le statut de l'établissement">
                                    </div>
                                    <div class="form-row">
                                        <div class="col-12 col-md-6 mb-4">
                                            <label for="responsable">Responsable de l'établissement</label>
                                            <input type="text" name="responsable" id="responsable" class="form-control" placeholder="Saisir le responsable de l'établissement">
                                        </div>
                                        <div class="col-12 col-md-6 mb-4">
                                            <label for="contact">Contact de l'établissement</label>
                                            <input type="text" name="contact" id="contact" class="form-control" placeholder="Saisir le contact de l'établissement">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-success text-uppercase">Enregistrer l'établissement</button>
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
