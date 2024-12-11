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
                            <li class="breadcrumb-item active">Détails</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">
                @include('admin.includes.messageReturned')

                <div class="row justify-content-center mt-4">
                    <div class="col-12 col-lg-5 mb-3 mt-2">
                        <img src="{{ asset('storage/app/public/' . $actualite->image) }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-12 col-lg-7 mb-4">
                        <h4 class="text-uppercase">{{ $actualite->title }}</h4>
                        <h6 class="font-italic"><small>Postée le {{ \Carbon\Carbon::parse($actualite->created_at)->format('d-m-Y') }}</small></h6>
                        <div class="text-justify actualite-description">
                            {!! $actualite->text !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
