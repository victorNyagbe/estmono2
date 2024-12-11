@extends('admin.layouts.admin')

@section('style')

@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">A Propos</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item active">A Propos</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">

                @include('admin.includes.messageReturned')

                <div class="row justify-content-center">
                    <div class="col-12 col-lg-5 mb-4">
                        <h4 class="actual-image mb-1">Image actuelle</h4>
                        <img src="{{ asset('storage/app/public/' . $about->image) }}" alt="" class="img-fluid img-thumbnail">
                    </div>

                    <div class="col-12 col-lg-7">
                        <form action="{{ route('admin.about.update', $about) }}" method="post" enctype="multipart/form-data" id="createForm">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="image">Modifier l'image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="text">Texte:</label>
                                <textarea name="text" id="text" class="form-control description">{!! $about->text !!}</textarea>
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

            
            $('#createForm').on('submit', function(e) {
                const editorCode = $('.description').summernote('code').replace(/<\/?[^>]+(>|$)/g, " ");

                $('#descriptionText').val(editorCode);
            });

            $('#text').summernote({
                lang: 'fr-FR',
                minHeight: 150,
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
