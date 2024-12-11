@extends('admin.layouts.admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/admin/discussions/conversations.css') }}">
    <style>
        .readMore:hover{
            text-decoration-line: underline;
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Conversations Fermées</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.discussions.list') }}">Discussions</a></li>
                            <li class="breadcrumb-item active">Conversations Fermées</li>
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
                        <div class="table-responsive table-responsive-md text-nowrap">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Discussions</th>
                                        <th>Date de Fermerture</th>
                                        <th width="300">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($discussions as $discussion)
                                        <tr>
                                            <td>{{ __('#') . $discussion->custom_id }}</td>
                                            <td>{{ \Carbon\Carbon::parse($discussion->updated_at)->format('d/m/Y à H:i') }}</td>
                                            <td><a href="{{ route('admin.conversationClosedShow', $discussion) }}" class="readMore">Lire la conversation</a></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3">Aucune discussion fermée n'a été retrouvée</td>
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


