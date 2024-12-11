@extends('admin.layouts.admin')

@section('style')

@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Actualités</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.actualites.index') }}">Actualités</a></li>
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
                        <img src="{{ asset('storage/app/public/' . $actualite->image) }}" alt="" class="img-fluid img-thumbnail">
                    </div>

                    <div class="col-12 col-lg-7 mb-4">
                        <form action="{{ route('admin.actualites.update', $actualite) }}" method="post" enctype="multipart/form-data" id="editForm">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="image">Image de l'actualité:</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="title">Titre de l'actualité:</label>
                                <input type="text" name="title" id="title" value="{{ $actualite->title }}" class="form-control" placeholder="Saisir le titre ...">
                            </div>
                            <div class="form-group">
                                <label for="description">Corps de l'actualité:</label>
                                <textarea name="description" id="description" class="form-control description">{!! $actualite->text !!}</textarea>
                            </div>
                            <textarea name="descriptionText" id="descriptionText" class="d-none"></textarea>
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
