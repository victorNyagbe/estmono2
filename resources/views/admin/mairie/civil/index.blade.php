@extends('admin.layouts.admin')

@section('style')
    <link rel="stylesheet" href="">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Etat Civil</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item active">Etat Civil</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">
                @include('admin.includes.messageReturned')

                <div class="row justify-content-center">
                    <div class="col-12 p-4">
                        {{-- <form action="{{ route('admin.mairie.civil.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="intro">Présentation</label>
                                <textarea name="intro" id="intro" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-warning text-uppercase">Modifier</button>
                                </div>
                            </div>
                        </form> --}}
                        <form action="{{ route('admin.mairie.civil.update', $presentations) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="intro">Présentation</label>
                                <textarea name="intro" id="intro" class="form-control">{{ $presentations->text }}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-warning text-uppercase">Modifier</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mb-4 mt-4">
                        <a href="#!" data-toggle="modal" data-target="#addEtatCivil" class="btn btn-primary text-uppercase"><i class="fa fa-plus-circle"></i> Ajouter un acte d'état civil</a>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="table-responsive table-responsive-md">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th>N°</th>
                                        <th>Titre</th>
                                        <th>Description</th>
                                        <th>Document</th>
                                        <th width="100">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $cpt = 0; ?>
                                    @forelse ($civils as $civil)
                                        <tr class="text-center">
                                            <td>{{ $cpt+=1 }}</td>
                                            <td>{{ $civil->title }}</td>
                                            <td>{{ $civil->description }}</td>
                                            @if ($civil->fichier_civils->first() != null)
                                                <td>{{ \Illuminate\Support\Str::substr($civil->fichier_civils->first()->file, 14, 60) }}</td>
                                            @else
                                                <td>Pas de fichier</td>
                                            @endif
                                            <td>
                                                <a href="{{ route('admin.mairie.civil.edit', $civil) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('admin.mairie.acte.destroy', $civil) }}" onclick="return confirm('Êtes-vous certain de vouloir supprimer cet acte d\'etat civil ? Cette action est irréversible.');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="5">Aucun information n'a été enregistré</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="addEtatCivil" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Ajouter un acte d'état-civil</h5>
                                <button type="button" class="close" aria-label="close" data-dismiss="modal" style="outline: 0;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.mairie.acte.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">Titre</label>
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Saisir le titre de l'acte d'état-civil">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="file">Selectionner le document</label>
                                        <input type="file" name="file" id="file" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-success text-uppercase">Enregistrer l'acte</button>
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
