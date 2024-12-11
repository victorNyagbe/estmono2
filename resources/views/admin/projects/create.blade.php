@extends('admin.layouts.admin')

@section('style')
    <style>
        .icheck-custom > input:first-child:not(:checked):not(:disabled):hover + label::before,
        .icheck-custom > input:first-child:not(:checked):not(:disabled):hover + input[type="hidden"] + label::before {
            border-color: #78b140;
        }

        .icheck-custom > input:first-child:checked + label::before,
        .icheck-custom > input:first-child:checked + input[type="hidden"] + label::before {
            background-color: #649b2c;
            border-color: #78b140;
        }
    </style>
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.projects.index') }}">Projets</a></li>
                            <li class="breadcrumb-item active">Création</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">
                @include('admin.includes.messageReturned')

                <div class="row justify-content-center mt-4">
                    <div class="col-12 col-md-10 col-lg-8">
                        <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data" id="createForm">
                            @csrf
                            <div class="form-group">
                                <label for="image">Image projet:</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-4">
                                    <label for="project_type">Type de projet:</label>
                                    <select name="project_type" id="project_type" class="form-control">
                                        <option value="">Veuillez sélectionner le type projet</option>
                                        @foreach ($project_types as $project_type)
                                            <option value="{{ $project_type->id }}">{{ $project_type->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 mb-4">
                                    <label for="title">Titre du projet:</label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Saisir le titre ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Corps du projet:</label>
                                <textarea name="description" id="description" class="form-control description"></textarea>
                            </div>
                            <div class="form-group clearfix">
                                <div class="icheck-custom d-inline">
                                    <input type="checkbox" id="toBePartner" name="toBePartner">
                                    <label for="toBePartner" style="font-weight: 800; font-size: 1.2rem;">Autoriser la demande de partenariat</label>
                                  </div>
                            </div>
                            <textarea name="descriptionText" id="descriptionText" class="form-control d-none"></textarea>
                            <div class="form-group">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success text-uppercase">Enregistrer</button>
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
    <script src="{{ asset('styles/admin/plugins/summernote/lang/summernote-fr-FR.js') }}"></script>
    <script src="{{ asset('styles/admin/plugins/summernote/lang/summernote-fr-FR.js.map') }}"></script>
    <script>
        $(document).ready(function () {

            $('#createForm').on('submit', function(e) {
                const editorCode = $('.description').summernote('code').replace(/<\/?[^>]+(>|$)/g, " ");

                $('#descriptionText').val(editorCode);
            });

            $('#description').summernote({
                lang: 'fr-FR',
                minHeight: 400,
                tabsize: 2,
                placeholder: 'Veuillez rensigner le texte ici...',
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']]
                ]
            });
        });
    </script>
@endsection
