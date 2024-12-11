@extends('admin.layouts.admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/admin/actualites/actuVideo.css') }}">
    <style>
        .NewsVideo {
            background-position: top;
            background-size: cover;
            background-repeat: no-repeat;
            position: relative;
            height: 37vh;
        }
    </style>
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.actualites.videos.actuVideo') }}">Actualité vidéo</a></li>
                            <li class="breadcrumb-item active">Détails</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">
                @include('admin.includes.messageReturned')

                <div class="row justify-content-center">
                    @if ($video->videoType()->first()->id == 2)
                        <div class="col-12 col-md-4 col-lg-5 mb-4">
                            <h3 class="mb-3">Video Actuelle</h3>
                            <div class="panel">
                                <iframe class="panel-video" src="https://www.youtube.com/embed/{{ $video->lien }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="col-12 col-md-8 col-lg-7">
                            <form action="{{ route('admin.actualites.videos.actuVideo.update', $video) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="title">Saisissez le titre de la vidéo</label>
                                    <input type="text" name="title" id="title" value="{{ $video->titre }}" class="form-control" placeholder="Saisir le titre de la vidéo">
                                </div>
                                <div class="form-group">
                                    <label for="url">Saisissez le lien de la video youtube</label>
                                    <input type="url" name="url" id="url" value="https://youtu.be/{{ $video->lien }}" class="form-control" placeholder="Saisir le lien youtube">
                                </div>
                                <div class="form-group">
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success text-uppercase">Valider la modification</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @elseif ($video->videoType()->first()->id == 1)
                        <div class="col-12 col-md-4 col-lg-5 mb-4">
                            <h3 class="mb-3">Video Actuelle</h3>
                            <div class="panel">
                                <video class="panel-video" controls poster="{{ asset('storage/app/public/' . $video->poster) }}">
                                    <source src="{{ asset('storage/app/public/' . $video->video) }}" type="video/mp4">
                                </video>
                            </div>
                        </div>
                        <div class="col-12 col-md-8 col-lg-7">
                            <form action="{{ route('admin.actualites.videos.actuVideo.update', $video) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="title">Saisissez le titre de la vidéo</label>
                                    <input type="text" name="title" id="title" value="{{ $video->titre }}" class="form-control" placeholder="Saisir le titre de la vidéo">
                                </div>
                                <div class="form-group">
                                    <label for="image">Choisissez l'image de la vidéo</label>
                                    <input type="file" name="image" id="image" value="{{ $video->poster}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="video">Choisissez la vidéo</label>
                                    <input type="file" name="video" id="video" class="form-control">
                                </div>
                                <div class="form-group">
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success text-uppercase">Valider la modification</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')

@endsection
