@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/dansMaRue.css') }}">
@endsection

@section('content')
    {{-- <div class="banner-background">
        <div class="banner-filter">
            <h1 class="animate__animated animate__rotateInUpLeft animate__repeat-1 animate__slower">D</h1>
        </div>
    </div> --}}

    <div class="container-fluid py-4 breadcrumb-row">
        <div class="row justify-content-center ">
            <div class="col-12 col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('guests.bureauDuCitoyen') }}">Bureau du citoyen</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dans ma rue</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container-fluid custom-container">
        <div class="container py-5">
            <div class="row justify-content-center">
                {{-- <div class="col-12 mb-5">
                    <div class="d-flex justify-content-center">
                        <h4 class="text-center presentation-text">
                            Bureau du citoyen
                        </h4>
                    </div>
                    <p class="text-justify">
                        Le bureau du citoyen est une institution de contrôle de l’action publique locale par les citoyens.
                        II est un centre d’écoute et de recueil des attentes, préoccupations et suggestions des citoyens
                        de la collectivité territoriale.
                        Il est géré par un coordonnateur qui facilite la cohésion sociale entre l’autorité et les citoyens.
                        En somme, c’est un instrument de renforcement de la participation citoyenne.
                        Pour toutes fins utiles, contactez le coordonnateur du bureau du citoyen aux adresses suivantes :
                    </p>

                    <div class="d-flex justify-content-center">
                        <a href="{{ route('guests.conversation') }}" class="btn btn-md btn-info">Lancer une conversation <i class="fa fa-commenting"></i></a>
                    </div>
                </div> --}}
                {{-- <div class="col-12">
                    <div class="d-flex justify-content-center">
                        <h4 class="text-center presentation-text">
                            Dans ma rue
                        </h4>
                    </div>
                </div> --}}
                <div class="col-12 col-md-7 order-12 order-md-1 mb-4">
                    <p class="text-justify" style="font-weight: 600;">
                        En vue de promouvoir le développement de la commune, la mairie met à disposition de la population
                        une fonctionnalité permettant de dénoncer les espaces publics malsains.
                        Cette fonctionnalité permet d'envoyer des images  dans l'optique de participer à l'amélioration de la qualité des espaces
                        publics et autres de la commune.
                        Vous pouvez à partir du formulaire, envoyer des images ou du texte pour exprimer l'inquiétude dont vous voulez dénoncer
                    </p>
                </div>
                <div class="col-12 col-md-5 order-1 order-md-12 mb-4">
                    @if ($errors->any())
                        <div class="row justify-content-center mb-3">
                            <div class="col-12">
                                <ul class="alert alert-danger alert-dismissible list-unstyled" role="alert">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    <div type="button" class="close" aria-label="close" data-dismiss="alert" style="background-color: transparent;">
                                        <span aria-hidden="true">&times;</span>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    @endif

                    @if ($message = Session::get('error'))
                        <div class="row justify-content-center mb-3">
                            <div class="col-12">
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    {{ $message }}
                                    <div type="button" class="close" aria-label="close" data-dismiss="alert">
                                        <span aria-hidden="true">&times;</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($message = Session::get('success'))
                        <div class="row justify-content-center mb-3">
                            <div class="col-12 ">
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    {{ $message }}
                                    <div type="button" class="close" aria-label="close" data-dismiss="alert">
                                        <span aria-hidden="true">&times;</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('guests.dansMaRue.informationsSendByGuests') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="file" name="images[]" id="image" class="form-control" multiple>
                        </div>
                        <div class="form-group mb-4">
                            <textarea name="message" id="message" class="form-control" rows="7" placeholder="Votre message ici ...."></textarea>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-md sendImageButton"><i class="fa fa-send-o"></i> Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
