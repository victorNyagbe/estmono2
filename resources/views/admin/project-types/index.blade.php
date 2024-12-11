@extends('admin.layouts.admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/admin/project-types/index.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Types de projet</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item active">Types de projet</li>
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
                        <a href="#!" data-toggle="modal" data-target="#addCategory" class="btn btn-primary text-uppercase"><i class="fa fa-plus-circle"></i> Ajouter un type de projet</a>

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

                <div class="row">
                    @foreach ($project_types as $project_type)

                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-4">
                            <div class="category-panel">
                                <h5>{{ $project_type->title }}</h5>
                                <p class="small">Ce type comprend {{ $project_type->projects()->count() . ' ' . \Illuminate\Support\Str::plural('projet', $project_type->projects()->count()) }}</p>
                                <p class="link">
                                    <a href="{{ route('admin.project-type.show', $project_type) }}" class="btn btn-sm btn-info mb-3 mr-1">Découvrir le type</a>
                                    @if ($project_type->id != 1)
                                        <a href="#!" data-toggle="modal" data-target="#editType{{ $project_type->id }}" class="btn btn-sm btn-warning mb-3 mr-1">Modifier</a>
                                        <a href="{{ route('admin.project-type.destroy', $project_type) }}" onclick="return confirm('Vous voulez vraiment supprimer ce type? Tous les projets concernant ce type seront aussi supprimés. Cette action est irréversible.')" class="btn btn-sm btn-danger mb-3">Supprimer</a>
                                    @endif
                                </p>
                                <a class="more" href="{{ route('admin.project-type.show', $project_type) }}"></a>
                            </div>
                        </div>

                        <div class="modal fade" id="editType{{ $project_type->id }}" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modifier un type de projet</h5>
                                        <button type="button" class="close" aria-label="close" data-dismiss="modal">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.project-type.update', $project_type) }}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <div class="form-group">
                                                <input type="text" name="project_type" id="project_type" class="form-control" value="{{ $project_type->title }}" placeholder="Saisir le type de projet...">
                                            </div>
                                            <div class="form-group">
                                                <div class="d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-success text-uppercase">Modifier le type de projet</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')

@endsection
