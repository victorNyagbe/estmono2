@extends('admin.layouts.admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/admin/actualites/index.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/admin/street/index.css') }}">
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
                            <li class="breadcrumb-item active">Dans Ma Rue</li>
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
                        <div class="d-flex flex-column flex-md-row">
                            <a href="{{ route('admin.street.information_confirmed') }}" class="btn btn-primary text-uppercase mr-3 mb-3 mb-md-0"><i class="fa fa-check-double"></i> Les demandes closes</a>
                            <a href="!#" data-toggle="modal" data-target="#numero_alerte" class="btn btn-warning text-uppercase"><i class="fa fa-save"></i> Les numéros d'alerte</a>
                        </div>
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
                                            <td colspan="5">Aucune information n'a été confirmée</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="numero_alerte" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Numéros d'alerte</h5>
                                <button type="button" class="close" aria-label="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @isset($alertes)
                                    @if (count($alertes) < 3)
                                        <form action="{{ route('admin.street.storeAlertNumber') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" name="number" id="number" class="form-control" placeholder="Ajouter un numéro d'alerte">
                                            </div>
                                            <div class="form-group">
                                                <div class="d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-sm btn-success">Ajouter un nouveau</button>
                                                </div>
                                            </div>
                                        </form>
                                        <hr>
                                    @endif
                                @else
                                    <form action="{{ route('admin.street.storeAlertNumber') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="number" id="number" class="form-control" placeholder="Ajouter un numéro d'alerte">
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="btn btn-sm btn-success">Ajouter un nouveau</button>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                @endisset

                                @isset($alertes)
                                    @if ($alertes != null && count($alertes) > 0) <h5>Les numéros d'alerte</h5> @endif
                                @endisset

                                <div class="numbers">
                                    <?php $compteur = 1; ?>
                                    @isset($alertes)
                                        @foreach ($alertes as $alerte)
                                            <div class="number">
                                                <span class="numberCount">{{ $compteur }} - </span>
                                                <span class="alertNumber"> {{ $alerte->number }}</span>
                                                <span class="action">
                                                    <a href="#!" data-toggle="modal" data-target="#editNumber{{ $compteur }}" class="btn btn-sm btn-warning">Modifier</a>
                                                    <a href="{{ route('admin.street.destroyAlertNumber', $alerte) }}" class="btn btn-sm btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer ce numero ?')">Supprimer</a>
                                                </span>
                                            </div>
                                            <div class="modal fade" id="editNumber{{ $compteur }}" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" aria-label="close" data-dismiss="modal">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('admin.street.updateAlertNumber', $alerte) }}" method="post">
                                                                @csrf
                                                                @method('PATCH')
                                                                <div class="form-group">
                                                                    <input type="text" name="numberEdit" id="numberEdit" class="form-control" value="{{ $alerte->number }}" placeholder="Modifier un numéro d'alerte">
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="d-flex justify-content-center">
                                                                        <button type="submit" class="btn btn-sm btn-success">Modifier</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $compteur++; ?>

                                        @endforeach
                                    @endisset
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
