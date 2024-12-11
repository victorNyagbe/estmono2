@extends('admin.layouts.admin')

@section('style')

@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Annonces</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.annonces.index') }}">Annonces</a></li>
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
                        <img src="{{ asset('storage/app/public/' . $annonce->image) }}" alt="" class="img-fluid img-thumbnail">
                    </div>

                    <div class="col-12 col-lg-7 mb-4">
                        <form action="{{ route('admin.annonces.update', $annonce) }}" method="post" enctype="multipart/form-data" id="editForm">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="title">Titre de l'annonce:</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ $annonce->title }}" placeholder="Saisir le titre ...">
                            </div>
                            <div class="form-group">
                                <label for="image">Image de l'annonce:</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-4">
                                    <label for="expiration_date">Date d'expiration</label>
                                    <input type="date" name="expiration_date" id="expiration_date" value="{{ \Carbon\Carbon::parse($annonce->expiration_date)->format('Y-m-d') }}" class="form-control">
                                </div>
                                <div class="col-12 col-md-6 mb-4">
                                    <label for="expiration_hour">Heure d'expiration</label>
                                    <input type="time" name="expiration_hour" id="expiration_hour" value="{{ \Carbon\Carbon::parse($annonce->expiration_date)->format('H:i') }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Corps de l'annonce:</label>
                                <textarea name="description" id="description" class="form-control description">
                                    {!! $annonce->body !!}
                                </textarea>
                            </div>
                            <textarea name="descriptionText" id="descriptionText" class="d-none"></textarea>
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
