@extends('admin.layouts.admin')

@section('style')
    <style>
        .gallery-image-back {
            background-position: top;
            background-size: cover;
            background-repeat: no-repeat;
            position: relative;
            height: 33vh;
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Galerie</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item active">Galerie</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">

                @include('admin.includes.messageReturned')

                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8 mb-4">
                        <form action="{{ route('admin.store_gallery') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="file" name="images[]" id="image" class="form-control" multiple>
                            </div>
                            <div class="form-group">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success text-uppercase">Enregistrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row justify-content-center">
                    @foreach ($galleries as $gallery)
                        <div class="col-12 col-md-4 col-lg-3 mb-4">
                            <div class="gallery-image-back" style="background-image: url('{{ asset('storage/app/public/' . $gallery->image) }}');"></div>
                            <div class="d-flex justify-content-center mt-3">
                                <a href="#!" data-toggle="modal" data-target="#edit-gallery{{ $gallery->id }}" class="btn btn-sm btn-warning text-uppercase mr-3">Modifier</a>
                                <a href="{{ route('admin.destroy_gallery', $gallery) }}" class="btn btn-sm btn-danger text-uppercase" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette image de la galerie? Cette action est irréversible.')">Supprimer</a>
                            </div>

                            <div class="modal fade" id="edit-gallery{{ $gallery->id }}" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Modifier une image</h5>
                                            <button type="button" class="close" aria-label="close" data-dismiss="modal" style="outline: 0;">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.update_gallery', $gallery) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
                                                <div class="form-group">
                                                    <input type="file" name="image" id="image" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <div class="d-flex justify-content-center">
                                                        <button type="submit" class="btn btn-success text-uppercase">Valider</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
        });
    </script>
@endsection
