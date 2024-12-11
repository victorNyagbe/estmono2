@extends('admin.layouts.admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/admin/discussions/conversations.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" id="token">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Details de conversation</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.discussions.list') }}">Discussions</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.conversationClosedIndex') }}">Fermees</a></li>
                            <li class="breadcrumb-item active">Details de conversation</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">
                @include('admin.includes.messageReturned')

                <div class="row justify-content-center">

                   <div class="col-12">
                       <div class="d-flex justify-content-center my-4">
                           <h3 class="text-center">{{ __('Discussion #') . $discussion->custom_id }}</h3>
                       </div>
                        <div class="card">
                            <div class="card-header d-flex justify-content-between flex-column flex-md-row">
                                <h4><i class="fa fa-commenting"></i> Panel de Discussion </h4>
                                @if (!$discussion->status)
                                    <button type="button" class="btn btn-sm btn-danger" id="quitDiscussion">Fermer la discussion</button>
                                @endif
                            </div>
                            <div class="card-body">
                                <div id="data-message">
                                    <div class="d-none" id="converse" data-converse="{{ $discussion->creator }}"></div>
                                    @if (count($conversations) > 0)
                                        @foreach ($conversations as $conversation)
                                            @if ($conversation->person_status == 'client')
                                                <div class="client-message mb-4">
                                                    <div><span class="author">Vous,</span> <span class="published-date">{{ \Carbon\Carbon::parse($conversation->created_at)->format('d/m/Y') . " à " . \Carbon\Carbon::parse($conversation->created_at)->format('H:i') }}</span></div>
                                                    <p>{{ $conversation->message }}</p>
                                                </div>
                                            @endif
                                            @if ($conversation->person_status == 'server')
                                                <div class="server-message mb-4">
                                                    <div><span class="author">Bureau Golfe1,</span> <span class="published-date">{{ \Carbon\Carbon::parse($conversation->created_at)->format('d/m/Y') . " à " . \Carbon\Carbon::parse($conversation->created_at)->format('H:i') }}</span></div>
                                                    <p>{{ $conversation->message }}</p>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                                {{ session()->put('tahc_ad', $discussion->custom_id) }}
                                @if (!$discussion->status)
                                    <div class="discussionQuit" style="display: none;">
                                        <span class="fa fa-lock"></span> Cette discussion a été fermée. Vous ne pouvez plus continuer cette conversation
                                    </div>
                                    <div class="form-group toBeDisplayed">
                                        <textarea id="message" rows="5" class="form-control" placeholder="Veuillez saisir votre message ici"></textarea>
                                    </div>
                                    <div class="form-group toBeDisplayed">
                                        <div class="d-flex justify-content-center">
                                            <button class="btn btn-md btn-primary" id="sendMessage">Envoyer <i class="fa fa-send-o"></i></button>
                                        </div>
                                    </div>
                                @else
                                    <div class="discussionQuit" style="display: block;">
                                        <span class="fa fa-lock"></span> Cette discussion a été fermée. Vous ne pouvez plus continuer cette conversation
                                    </div>
                                @endif
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


