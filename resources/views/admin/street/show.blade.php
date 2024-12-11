@extends('admin.layouts.admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/admin/actualites/index.css') }}">
    <style>
        .street_image_back {
            background-position: top;
            background-size: auto;
            background-repeat: no-repeat;
            position: relative;
            height: 100vh;
        }
    </style>
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.street.index') }}">Dans Ma Rue</a></li>
                            <li class="breadcrumb-item active">Détails</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">
                @include('admin.includes.messageReturned')

                <div class="row mt-4">
                    <div class="col-12 mb-4">
                        <div class="d-flex flex-column flex-md-row justify-content-center justify-content-md-between">
                            <h5>Numéro Info: {{ $street->number_unique }}</h5>
                            <h5>Date d'envoi: {{ \Carbon\Carbon::parse($street->created_at)->format('d-m-Y') }}</h5>
                        </div>
                    </div>
                </div>

                @if ($street->status == 0)
                    <a href="#!" onclick="event.preventDefault(); document.getElementById('street_information_confirmation').submit();" class="btn btn-success text-uppercase mb-3"><i class="fa fa-check-circle"></i> Confimer l'information</a>
                @endif

                @if ($street->status == 1)
                    <a class="btn btn-primary text-uppercase mb-3"><i class="fa fa-check-double"></i> Déjà confirmée</a>
                @endif


                <div class="row justify-content-center">
                    <?php
                        $street_image = $street->image;
                        $street_description = $street->description;
                    ?>

                    @if ($street->image == 'Oui' && $street->description != "")
                        <div class="col-12 col-md-6 col-lg-7">
                            <h5 class="text-center text-uppercase mb-4">Description</h5>
                            <div class="text-justify">{{ $street_description }}</div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-5">
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <h5 class="text-center text-uppercase mb-4">Image(s)</h5>
                                </div>
                                @foreach ($street->street_images()->get() as $item)
                                    <div class="col-12 mb-4">
                                        <center><img src="{{ asset('storage/app/public/' . $item->image) }}" alt="" class="img-fluid w-75"></center>
                                        {{-- <div class="street_image_back" style="background-image: url(')"></div> --}}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if ($street->image == 'Oui' && $street->description == "")
                    <div class="col-12">
                            <h5 class="text-center text-uppercase mb-4">Image(s)</h5>
                        </div>
                        @foreach ($street->street_images()->get() as $item)
                            <div class="col-12 col-md-4 mb-4">
                                <center><img src="{{ asset('storage/app/public/' . $item->image) }}" alt="" class="img-fluid w-75"></center>
                                {{-- <div class="street_image_back" style="background-image: url('{{ asset('storage/app/public/' . $item->image) }}')"></div> --}}
                            </div>
                        @endforeach
                    @endif

                    @if ($street->image == 'Non' && $street->description != "")
                        <div class="col-12 col-md-10 col-lg-8">
                            <h4 class="text-center text-uppercase mb-4">Description</h5>
                            <h5 class="text-justify">{{ $street_description }}</div>
                        </div>
                    @endif
                </div>

                <form action="{{ route('admin.street.confirm_information', $street) }}" method="post" id="street_information_confirmation">
                    @csrf
                    <input type="hidden" name="street_information" value="{{ $street->number_unique }}">
                </form>
            </div>
        </section>
    </div>
@endsection

@section('script')

@endsection
