@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/conversation.css') }}">
    <style>
        .startConversation {
            background-color: #009432;
            color: #fff;
            text-decoration: none;
            font-size: 1.5rem;
        }

        .startConversation:hover {
            color: white;
        }
    </style>
@endsection

@section('content')
    <div class="container py-5" style="background-color: #fff;">
        <div class="row justify-content-center align-items-center py-3">
            <div class="col-12">
                <p class="px-4 mb-5">
                    Cette page vous permet de rentrer en discussion avec le bureau chargé des affaires publiques de la mairie.
                    Nous vous conseillons d'abord de vérifier dans la foire aux questions fréquentes pour voir si votre préoccupation
                    n'a pas été au préalable répondue. Merci
                </p>
                <div class="d-flex justify-content-center">
                    <a href="{{ route('guests.initializeDiscussion') }}" class=" btn btn-lg startConversation"><i class="fa fa-gears"></i> Démarrer la conversation</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
