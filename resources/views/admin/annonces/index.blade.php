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
                        <h1 class="m-0">Annonces</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item active">Annonces</li>
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
                        <a href="{{ route('admin.annonces.create') }}" class="btn btn-primary text-uppercase"><i class="fa fa-plus-circle"></i> Ajouter une annonce</a>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="table-responsive table-responsive-md">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr style="background-color: #333; color: white;">
                                        <th>#</th>
                                        <th>Titre</th>
                                        <th width="250">Date d'expiration</th>
                                        <th width="100">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $cpt = 1; ?>
                                    @forelse ($annonces as $annonce)
                                        <tr class="text-center">
                                            <td>{{ $cpt++ }}</td>
                                            <td>{{ $annonce->title }}</td>
                                            <td>{{ \Carbon\Carbon::parse($annonce->expiration_date)->format('d-m-Y à H:i') }}</td>
                                            <td >
                                                <a href="{{ route('admin.annonces.edit', $annonce) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('admin.annonces.destroy', $annonce) }}" class="btn btn-sm btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette annonce ? ');"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center" style="background-color: #343a40;">
                                            <td colspan="5" class="text-center">Aucune annonce n'est enregistrée</td>
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
