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
                        <h1 class="m-0">Dans Ma Rue</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.street.index') }}">Les demandes</a></li>
                            <li class="breadcrumb-item active">Confirmées</li>
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
                        <a href="{{ route('admin.street.index') }}" class="btn btn-warning text-uppercase"><i class="fa fa-stopwatch"></i> Les demandes en attente</a>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="table-responsive table-responsive-md text-nowrap">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th width="180">N°</th>
                                        <th>Date d'envoi</th>
                                        <th width="300">Image</th>
                                        <th width="300">Texte descriptif</th>
                                        <th width="180">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($streets as $street)
                                        <tr class="text-center">
                                            <td>{{ $street->number_unique }}</td>
                                            <td>{{ \Carbon\Carbon::parse($street->created_at)->format('d-m-Y') }}</td>
                                            <td class="text-uppercase">{{ $street->image }}</td>
                                            <td>{{ $street->description == null ? 'NON' : 'OUI' }}</td>
                                            <td>
                                                <a href="{{ route('admin.street.show', $street) }}" class="btn btn-info btn-sm"><i class="fa fa-plus-circle"></i> voir détails</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="5">Aucune information nouvelle n'a été reçue</td>
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
