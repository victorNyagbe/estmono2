@extends('admin.layouts.admin')

@section('style')

@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Liste des abonnées</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item active">Liste des abonnées</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">
                <?php 
                    $i = 1;
                ?>
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="table-responsive table-responsive-md text-nowrap">
                            <table class="table table-striped table-bordered">

                                <thead>
                                    <tr class="text-center">
                                    <th width="200">N°</th>
                                    <th width="500">Email</th>
                                    </tr>
                                </thead>
                                @forelse($newsletters as $newsletter)
                                <tbody>
                                    <tr class="text-center">
                                        <td>{{ $i}}</td>
                                        <td>{{ $newsletter->email }}</td>
                                    </tr>
                                <?php 
                                    $i += 1;
                                ?>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="5">Aucune abonné n'a été enregistrée</td>
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
