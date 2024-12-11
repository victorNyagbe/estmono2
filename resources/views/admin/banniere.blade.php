@extends('admin.layouts.admin')

@section('style')

@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Bannières</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item active">Bannières</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <a href="#!" data-toggle="modal" data-target="#addBanner" class="btn btn-primary">Enregistrer une banniere</a>

                        <div class="modal fade" id="addBanner" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Ajouter une bannière</h5>
                                        <button type="button" class="close" aria-label="close" data-dismiss="modal" style="outline: 0;">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.banner.store') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <input type="file" name="image" id="image" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <div class="d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-success">Valider l'enregistrement</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @include('admin.includes.messageReturned')

                <?php $i = 1; ?>

                <div class="row justify-content-center">
                    @foreach($banners as $banner)
                        <div class="col-12 col-lg-4 mb-4">

                            <h4 class="actual-image mb-1">Image {{ $i }}</h4>
                            <img src="{{ asset('storage/app/public/' . $banner->image) }}" alt="" class="img-fluid img-thumbnail">
                            <div class="d-flex justify-content-center mt-3">
                                <a data-toggle="modal" data-target="#editBanner{{ $banner->id }}" class="btn btn-success text-uppercase">Modifier l'image</a>
                            </div>
                        </div>

                        <div class="modal fade" id="editBanner{{ $banner->id }}" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modifier une bannière</h5>
                                        <button type="button" class="close" aria-label="close" data-dismiss="modal" style="outline: 0;">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.banner.update', $banner) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <div class="form-group">
                                                <input type="file" name="image" id="image" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="description" id="description" class="form-control" value="{{ $banner->description }}" placeholder="Le texte descriptif de l'image">
                                            </div>
                                            <div class="form-group">
                                                <div class="d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-success">Valider la modification</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php $i += 1; ?>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')

@endsection
