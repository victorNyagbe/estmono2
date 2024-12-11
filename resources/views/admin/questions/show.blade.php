@extends('admin.layouts.admin')

@section('style')
    <style>
        .user-image {
            background-position: top;
            background-size: cover;
            background-repeat: no-repeat;
            position: relative;
            height: 5vh;
        }

        .table tbody tr td {
            vertical-align: middle;
            text-align: center;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('styles/admin/questions/show.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $category_question->name }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.questions.index') }}">Foire aux questions</a></li>
                            <li class="breadcrumb-item active">{{ $category_question->name }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">
                @include('admin.includes.messageReturned')

                <div class="row">
                    <div class="col-6 col-lg-12 mb-5 mt-2">
                        <div class="d-flex flex-column flex-md-row justify-content-start">
                            <a href="#!" data-toggle="modal" data-target="#addQuestion" class="btn btn-primary text-uppercase mr-3"><i class="fa fa-plus-circle"></i> Ajouter une question</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @if (count($questions) > 0)
                        <div class="col-12">
                            <div class="accordion" id="accordionExample275">
                                <?php $compteur=0; ?>
                                @foreach ($questions as $question)
                                    <div class="card z-depth-0 bordered">
                                        <div class="card-header {{ $compteur == 0 ? 'headingOne2' : '' }}" id="headingQuestion{{ $question->id }}">
                                            <h5 class="mb-0 d-flex justify-content-between" data-toggle="collapse" data-target="#collapseQuestion{{ $question->id }}"
                                            aria-expanded="true" aria-controls="collapseQuestion{{ $question->id }}">
                                                <a href="#!" onclick="event.preventDefault();">
                                                    {{ $compteur+1 . '- ' . $question->title }}
                                                </a>
                                                <span style="transform: rotate(90deg);">&gt;</span>
                                            </h5>
                                        </div>
                                        <div id="collapseQuestion{{ $question->id }}" class="collapse {{ $compteur == 0 ? 'show' : '' }}" aria-labelledby="headingQuestion{{ $question->id }}"
                                            data-parent="#accordionExample275">
                                            <div class="card-body">
                                                <div>{!! $question->text !!}</div>
                                                <div class="buttons">
                                                    <a href="#!" data-toggle="modal" data-target="#editQuestion{{ $question->id }}" class="btn btn-warning mr-1">Modifier</a>
                                                    <a href="{{ route('admin.questions.destroy', $question) }}" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette question ? Cette action est irréversible.')">Supprimer</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="editQuestion{{ $question->id }}" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Ajouter une question</h5>
                                                    <button type="button" class="close" aria-label="close" data-dismiss="modal">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.questions.update', [$category_question, $question]) }}" method="post">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="form-group">
                                                            <input type="text" name="title" id="edit_title" class="form-control" value="{{ $question->title }}" placeholder="Saisir la question...">
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea name="text" id="edit_text" class="form-control description" placeholder="Saisir la réponse référant à la question...">{!! $question->text !!}</textarea>
                                                        </div>
                                                        {{--<textarea name="descriptionText" id="descriptionText" class="form-control d-none"></textarea>--}}
                                                        <div class="form-group">
                                                            <div class="d-flex justify-content-center">
                                                                <button type="submit" class="btn btn-success text-uppercase">Modifier la question</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $compteur++; ?>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="col-12">
                            <h4 class="text-center">Aucune question n'a encore été enregistrée dans cette catégorie</h4>
                        </div>
                    @endif

                    <div class="modal fade" id="addQuestion" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Modifier une question</h5>
                                    <button type="button" class="close" aria-label="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin.questions.store', $category_question) }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="title" id="title" class="form-control" placeholder="Saisir la question...">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="text" id="text" class="form-control description" placeholder="Saisir la réponse référant à la question..."></textarea>
                                        </div>
                                        {{--<textarea name="descriptionText" id="descriptionText" class="form-control d-none"></textarea>--}}
                                        <div class="form-group">
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="btn btn-success text-uppercase">Enregister la question</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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

            // $('#createForm').on('submit', function(e) {
            //     const editorCode = $('.description').summernote('code').replace(/<\/?[^>]+(>|$)/g, " ");

            //     $('#descriptionText').val(editorCode);
            // });

            $('.description').summernote({
                lang: 'fr-FR',
                minHeight: 150,
                tabsize: 2,
                placeholder: 'Saisir la réponse référant à la question...',
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']]
                ]
            });

            $('.collapse').on('shown.bs.collapse', function () {
                let getCollapseId = $(this).attr('aria-labelledby');

                $('#' + getCollapseId).css({
                    'background-color' : '#78b140',
                    'color' : 'white'
                });

                $('#' + getCollapseId + ' a').css({
                    'color' : 'white'
                });

                $('#' + getCollapseId + ' span').css({
                    'transform' : 'rotate(90deg)'
                });
            });

            $('.collapse').on('hidden.bs.collapse', function () {
                let getCollapseId = $(this).attr('aria-labelledby');

                $('#' + getCollapseId).css({
                    'background-color' : '#fff',
                    'color' : '#006130'
                });

                $('#' + getCollapseId + ' a').css({
                    'color' : '#006130'
                });

                $('#' + getCollapseId + ' span').css({
                    'transform' : 'rotate(0deg)'
                });
            });
        });
    </script>
@endsection
