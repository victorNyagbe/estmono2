@extends('admin.layouts.admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/admin/actualites/index.css') }}">
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
                            <li class="breadcrumb-item active">Actualités</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">
                @include('admin.includes.messageReturned')

                <div class="row">
                    <div class="col-12 mb-4 mt-2">
                        <a href="{{ route('admin.actualites.create') }}" class="btn btn-primary text-uppercase"><i class="fa fa-plus-circle"></i> Ajouter une actualité</a>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="table-responsive table-responsive-md text-nowrap">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th width="100">Image</th>
                                        <th>Titre</th>
                                        <th width="300">Description</th>
                                        <th width="200">Postée le</th>
                                        <th width="100">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($actualites as $actualite)
                                        <tr class="text-center">
                                            <td><div class="actualite-image" style="background-image: url('{{ asset('storage/app/public/' . $actualite->image) }}')"></div></td>
                                            <td>{{ $actualite->title }}</td>
                                            <td>{{ __('Un texte descriptif') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($actualite->created_at)->format('d-m-Y') }}</td>
                                            <td>
                                                <a href="{{ route('admin.actualites.show', $actualite) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('admin.actualites.edit', $actualite) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('admin.actualites.destroy', $actualite) }}" onclick="return confirm('Êtes-vous certain de vouloir supprimer cette actualité ? Cette action est irréversible.');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="5">Aucune actualité n'a été enregistrée</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')

@endsection
