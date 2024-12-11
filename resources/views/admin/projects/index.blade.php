@extends('admin.layouts.admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/admin/projects/index.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Projets</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item active">Projets</li>
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
                        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary text-uppercase"><i class="fa fa-plus-circle"></i> Ajouter un projet</a>
                        <a href="#!" data-toggle="modal" data-target="#addCategory" class="btn btn-info text-uppercase"><i class="fa fa-plus-circle"></i> Ajouter un type de projet</a>


                        <div class="modal fade" id="addCategory" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Ajouter un type de projet</h5>
                                        <button type="button" class="close" aria-label="close" data-dismiss="modal">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.project-type.store') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" name="project_type" id="project_type" class="form-control" placeholder="Renseigner le type du projet">
                                            </div>
                                            <div class="form-group">
                                                <div class="d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-success text-uppercase">Enregistrer</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="table-responsive table-responsive-md text-nowrap">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th width="100">Image</th>
                                        <th>Titre</th>
                                        <th width="300">Type de projet</th>
                                        <th width="200">Postée le</th>
                                        <th width="100">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($projects as $project)
                                        <tr class="text-center">
                                            <td><div class="project-image" style="background-image: url('{{ asset('storage/app/public/' . $project->image) }}')"></div></td>
                                            <td title="{{ $project->title  }}">{{ \Illuminate\Support\Str::substr($project->title, 0, 50) . '...' }}</td>
                                            <td>{{ \Illuminate\Support\Str::upper($project->project_type->title) }}</td>
                                            <td>{{ \Carbon\Carbon::parse($project->created_at)->format('d-m-Y') }}</td>
                                            <td>
                                                <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('admin.projects.destroy', $project) }}" onclick="return confirm('Êtes-vous certain de vouloir supprimer ce projet ? Cette action est irréversible.');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="5">Aucun projet n'a été enregistrée</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')

@endsection
