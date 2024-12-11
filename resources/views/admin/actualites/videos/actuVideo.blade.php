@extends('admin.layouts.admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/admin/actualites/actuVideo.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Actualité vidéo</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item active">Actualité vidéo</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mb-4 mt-2">
                        <a href="#!" data-toggle="modal" data-target="#addActuVideo" class="btn btn-primary text-uppercase"><i class="fa fa-plus-circle"></i> Ajouter une actualité vidéo</a>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            @include('admin.includes.messageReturned')
            <div class="block-type-title">
                <h6 class="type-title">
                    videos youtube
                </h6>
            </div>
            <div class="row justify-content-center custom">
                @foreach ($youtubes as $youtube)
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="panel">
                            <iframe class="panel-video" src="https://www.youtube.com/embed/{{ $youtube->lien }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="panel-info">
                                <h4 class="panel-title" title="">
                                    {{ $youtube->titre }}
                                </h4>
                                <div class="video-btn">
                                    <a href="{{ route('admin.actualites.videos.actuVideo.show', $youtube) }}" class="btn btn-warning btn-sm link-btn"><i class="fa fa-edit"></i> Modifier</a>
                                    <a href="{{ route('admin.actualites.videos.actuVideo.destroy', $youtube) }}" onclick="return confirm('Êtes-vous certain de vouloir supprimer cette vidéo youtube ? Cette action est irréversible.');" class="btn btn-danger btn-sm link-btn"><i class="fa fa-trash"></i> Supprimer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="block-type-title">
                <h6 class="type-title">
                    videos locales
                </h6>
            </div>
            <div class="row justify-content-center custom">
                @foreach ($locals as $local)
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="panel">
                            <video class="panel-video" controls poster="{{ asset('storage/app/public/' . $local->poster) }}">
                                <source src="{{ asset('storage/app/public/' . $local->video) }}" type="video/mp4">
                            </video>
                            <div class="panel-info">
                                <h4 class="panel-title" title="">{{ $local->titre }}</h4>
                                <div class="video-btn">
                                    <a href="{{ route('admin.actualites.videos.actuVideo.show', $local) }}" class="btn btn-warning btn-sm link-btn"><i class="fa fa-edit"></i> Modifier</a>
                                    <a href="{{ route('admin.actualites.videos.actuVideo.destroy', $local) }}" onclick="return confirm('Êtes-vous certain de vouloir supprimer cette vidéo ? Cette action est irréversible.');" class="btn btn-danger btn-sm link-btn"><i class="fa fa-trash"></i> Supprimer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="modal fade" id="addActuVideo" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter une vidéo d'actualité</h5>
                        <button type="button" class="close" aria-label="close" data-dismiss="modal" style="outline: 0;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.actualites.videos.actuVideo.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="type">Choisissez le type de la video</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="">Choisir le type de la vidéo</option>
                                    @foreach($types as $type)
                                        <option id="{{ $type->nom }}" value="{{ $type->id }}">{{ $type->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group title-video">
                                <label for="title">Saisissez le titre de la vidéo</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Saisir le titre de la vidéo">
                            </div>
                            <div class="form-group img-video">
                                <label for="image">Choisissez l'image de la vidéo</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <div class="form-group video">
                                <label for="video">Choisissez la vidéo</label>
                                <input type="file" name="video" id="video" class="form-control">
                            </div>
                            <div class="form-group video-link">
                                <label for="url">Saisissez le lien de la video youtube</label>
                                <input type="url" name="url" id="url" class="form-control" placeholder="Saisir le lien youtube">
                            </div>
                            <div class="form-group">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success text-uppercase">Enregistrer la vidéo</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script>
        $(document).ready(function () {
            $("select").change(function() {
                var str = "";
                $("select option:selected").each(function() {
                    str = $(this).attr("id");
                    if(str == "local") {
                        $('.title-video').fadeIn();
                        $('.img-video').fadeIn();
                        $('.video').fadeIn();
                        $('.video-link').hide();
                    }
                    else if(str == "youtube")  {
                        $('.title-video').fadeIn();
                        $('.img-video').hide();
                        $('.video').hide();
                        $('.video-link').fadeIn();
                    }
                });
            });
        });
    </script>

@endsection
