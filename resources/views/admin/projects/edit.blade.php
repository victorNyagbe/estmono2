@extends('admin.layouts.admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
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
                            <li class="breadcrumb-item active">Edition</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">
                @include('admin.includes.messageReturned')

                <div class="row justify-content-center mt-4">
                    <div class="col-12 col-lg-5 mb-4 mt-2">
                        <h4 class="actual-image mb-1">Image actuelle</h4>
                        <img src="{{ asset('storage/app/public/' . $project->image) }}" alt="" class="img-fluid img-thumbnail">
                    </div>

                    <div class="col-12 col-lg-7 mb-4">
                        <form action="{{ route('admin.projects.update', $project) }}" method="post" enctype="multipart/form-data" id="editForm">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="image">Image du projet:</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-4">
                                    <label for="project_type">Type de projet:</label>
                                    <select name="project_type" id="project_type" class="form-control">
                                        <option value="">Veuillez sélectionner le type projet</option>
                                        @foreach ($project_types as $project_type)
                                            <option value="{{ $project_type->id }}" {{ $project_type->id == $project->project_type_id ? 'selected' : '' }}>{{ $project_type->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 mb-4">
                                    <label for="title">Titre du projet:</label>
                                    <input type="text" name="title" id="title" value="{{ $project->title }}" class="form-control" placeholder="Saisir le titre ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Corps du projet:</label>
                                <textarea name="description" id="description" class="form-control description">{!! $project->text !!}</textarea>
                            </div>
                            <div class="form-group clearfix">
                                <label for="">Statut du projet:</label><br>
                                <div class="icheck-custom d-inline mr-3">
                                    <input type="radio" id="pending" name="status" {{ $project->status == 0 ? 'checked' : ''}} value="0">
                                    <label for="pending" style="font-weight: 400; font-size: 1.2rem;">En cours</label>
                                </div>
                                <div class="icheck-custom d-inline mr-3">
                                    <input type="radio" id="realized" name="status" {{ $project->status == 1 ? 'checked' : ''}} value="1">
                                    <label for="realized" style="font-weight: 400; font-size: 1.2rem;">Réalisé</label>
                                </div>
                                {{-- <div class="icheck-custom d-inline">
                                    <input type="radio" id="futured" name="status">
                                    <label for="futured">A venir</label>
                                </div> --}}
                            </div>
                            <div class="form-group clearfix" id="partner" style="display: none;">
                                <div class="icheck-custom d-inline">
                                    <input type="checkbox" id="toBePartner" name="toBePartner" {{ $project->to_be_partner ? 'checked' : ''}}>
                                    <label for="toBePartner" style="font-weight: 800; font-size: 1.2rem;">Autoriser la demande de partenariat</label>
                                </div>
                            </div>
                            <textarea name="descriptionText" id="descriptionText" class="form-control d-none"></textarea>
                            <div class="form-group">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success text-uppercase">Valider la modification</button>
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

            let realized = $('#realized').prop('checked');
            let pending = $('#pending').prop('checked');

            if (realized) {
                $('#partner').hide();
            } else {
                if (pending) {
                    $('#partner').show();
                }
            }

            $('#realized').click(function () {
                $('#partner').hide();
            })

            $('#pending').click(function () {
                $('#partner').fadeIn();
            })

            $('#editForm').on('submit', function(e) {
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
