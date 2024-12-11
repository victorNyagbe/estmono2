@extends('admin.layouts.admin')

@section('style')

@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <h1 class="m-0">Organigramme</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item active">Organigramme</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">

                @include('admin.includes.messageReturned')

                @isset($organigramme)
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-6 mb-4">
                            <form action="{{ route('admin.mairie.organigramme.update', $organigramme) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="image">Modifier l'image</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                                <div class="form-group">
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success text-uppercase">Valider la modification</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-12 col-lg-10 mb-4">
                            <img src="{{ asset('storage/app/public/' . $organigramme->image) }}" alt="" class="img-fluid">
                        </div>
                    </div>
                @else

                @endisset
            </div>
        </section>
    </div>
@endsection

