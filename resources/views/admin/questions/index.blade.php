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
    <link rel="stylesheet" href="{{ asset('styles/admin/questions/index.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Foire aux questions</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item active">Foire aux questions</li>
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
                            <a href="#!" data-toggle="modal" data-target="#addCategory" class="btn btn-primary text-uppercase mr-3"><i class="fa fa-plus-circle"></i> Ajouter une catégorie</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach ($categories as $category_question)
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-4">
                            <div class="category-panel">
                                <h5>{{ $category_question->name }}</h5>
                                <p class="small">Cette rubrique comprend {{ $category_question->questions()->count() . ' ' . \Illuminate\Support\Str::plural('question', $category_question->questions()->count()) }}</p>
                                <p class="link">
                                    <a href="{{ route('admin.questions.show', $category_question) }}" class="btn btn-sm btn-info mb-3 mr-1">Découvrir la rubrique</a>
                                    <a href="#!" data-toggle="modal" data-target="#editCategory{{ $category_question->id }}" class="btn btn-sm btn-warning mb-3 mr-1">Modifier</a>
                                    <a href="{{ route('admin.questions.categories.destroy', $category_question) }}" onclick="return confirm('Vous voulez vraiment supprimer cette catégorie? Toutes les quetions concernant cette catégorie seront aussi supprimées. Cette action est irréversible.')" class="btn btn-sm btn-danger mb-3">Supprimer</a>
                                </p>
                                <a class="more" href="{{ route('admin.questions.show', $category_question) }}"></a>
                            </div>
                        </div>

                        <div class="modal fade" id="editCategory{{ $category_question->id }}" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modifier une catégorie</h5>
                                        <button type="button" class="close" aria-label="close" data-dismiss="modal">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.questions.categories.update', $category_question) }}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <div class="form-group">
                                                <input type="text" name="name" id="name" class="form-control" value="{{ $category_question->name }}" placeholder="Saisir le nom de la catégorie...">
                                            </div>
                                            <div class="form-group">
                                                <div class="d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-success text-uppercase">Enregister la catégorie</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="modal fade" id="addCategory" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Ajouter une catégorie</h5>
                                    <button type="button" class="close" aria-label="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin.questions.categories.index') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Saisir le nom de la catégorie...">
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="btn btn-success text-uppercase">Enregister la catégorie</button>
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

@endsection
