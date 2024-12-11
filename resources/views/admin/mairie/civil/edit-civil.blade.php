@extends('admin.layouts.admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/admin/mairie/municipal.css') }}">
    <style>
        .doc-image {
            background-position: top;
            background-size: 35%;
            background-repeat: no-repeat;
            position: relative;
            height: 30vh;
        }
        .doc-name {
            text-align : center;
            font-weight: bold;
            font-size: 1em;
        }
    </style>
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.mairie.civil.index') }}">Etat Civil</a></li>
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
                        <h3 class="mb-5">Document Actuelle</h3>
                        <div class="doc-image" style="background-image: url('{{ asset('assets/logos/doc_logo.png') }}')"></div>
                        @if ($civil->fichier_civils->first() != null)
                            <div class="doc-name">{{ \Illuminate\Support\Str::substr($civil->fichier_civils->first()->file, 14, 60) }}</div>
                        @else
                            <div class="doc-name">Pas de fichier</div>
                        @endif
                    </div>
                    <div class="col-12 col-md-8 col-lg-7 mt-5">
                        <form action="{{ route('admin.mairie.acte.update', $civil) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="title">Titre</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ $civil->title }}" placeholder="Saisir le titre de l'acte d'état-civil">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control">{{ $civil->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="file">Selectionner le document</label>
                                <input type="file" name="file" id="file" class="form-control">
                            </div>
                            <div class="form-group">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success text-uppercase">Modifier l'acte</button>
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
