@extends('admin.layouts.admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/admin/mairie/marche.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Marchés publics</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item active">Marchés publics  - Mairie</li>
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
                        <a href="#!" data-toggle="modal" data-target="#addMarche" class="btn btn-primary text-uppercase"><i class="fa fa-plus-circle"></i> Ajouter un marché public</a>
                    </div>
                </div>

                <div class="row justify-content-center">
                    @foreach ($marches as $marche)
                        <div class="col-6 col-md-4 col-lg-3 mb-4">
                            <div class="document-panel">
                                <div class="document-pdfIconBox">
                                    <div class="document-pdfIcon">
                                        <img src="{{ asset('assets/images/pdf.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="document-infos">
                                    <div class="document-titleBox">
                                        <h5 class="document-title">{{ $marche->title }}</h5>
                                        <h6 class="document-title-date">{{ \Carbon\Carbon::parse($marche->marche_date)->locale('fr')->isoFormat('MMMM YYYY') }}</h6>
                                    </div>
                                    <div class="document-separator"></div>
                                    <div class="document-actions">
                                        <a href="#" data-toggle="modal" data-target="#editMarche{{ $marche->id }}" class="btn btn-warning mr-3"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin.mairie.marches.destroy', $marche) }}" onclick="return confirm('Etes-vous sûr de retirer le marche?')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="editMarche{{ $marche->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modfication d'un marche</h5>
                                        <button type="button" class="close" aria-label="close" data-dismiss="modal">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.mairie.marches.update', $marche) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <div class="form-group">
                                                <label for="marcheTitle">Titre du marche:</label>
                                                <input type="text" name="marcheTitle" id="marcheTitle" value="{{ $marche->title }}" class="form-control" placeholder="Saisir le titre">
                                            </div>
                                            <div class="form-group">
                                                <label for="marcheFile">Choisir le fichier: </label>
                                                <input type="file" name="marcheFile" id="marcheFIle" class="form-control" accept=".pdf">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success">Modifer</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div id="addMarche" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Ajout d'un marché</h5>
                                <button type="button" class="close" aria-label="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.mairie.marches.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    {{-- <div class="form-group">
                                        <label for="archiveDate">Date de l'archive : </label>
                                        <input type="date" name="archiveDate" id="archiveDate" class="form-control">
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="marcheTitle">Titre du marche:</label>
                                        <input type="text" name="marcheTitle" id="marcheTitle" class="form-control" placeholder="Saisir le titre">
                                    </div>
                                    <div class="form-group">
                                        <label for="marcheFile">Choisir le fichier: </label>
                                        <input type="file" name="marcheFile" id="marcheFIle" class="form-control" accept=".pdf">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Enregistrer</button>
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
