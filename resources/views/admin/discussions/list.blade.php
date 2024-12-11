@extends('admin.layouts.admin')

@section('style')
    <style>
        .user-image {
            background-position: top;
            background-size: cover;
            background-repeat: no-repeat;
            position: relative;
            height: 5vh;
        }

        .table tbody tr td {
            vertical-align: middle;
            text-align: center;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('styles/admin/discussions/list.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Discussions en attente</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item active">Discussions</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">
                @include('admin.includes.messageReturned')

                <div class="row justify-content-center" id="NotifyUserCard">
                    <div class="col-12 mb-5 mt-2">
                        <div class="d-flex flex-column flex-md-row justify-content-start">
                            <a href="{{ route('admin.conversationClosedIndex') }}" class="btn btn-danger text-uppercase mr-3"><i class="fa fa-comment-slash"></i> Discussions clôturées</a>
                            <a href="{{ route('admin.conversationNotClosedButReadIndex') }}" class="btn btn-success text-uppercase mr-3"><i class="fa fa-comment"></i> Discussions lues</a>
                            <a href="{{ route('admin.conversationNotClosedButExpiredIndex') }}" class="btn btn-warning text-uppercase mr-3"><i class="fa fa-comment"></i> Discussions expirées</a>
                        </div>
                    </div>

                    @forelse ($discussions as $discussion)
                        @if ($discussion->conversations()->count() > 0)
                            <div class="col-12 col-md-7 mb-4">
                                <div class="message-panel unread" >
                                    <h5>Discussion #{{ $discussion->custom_id }} <span>{{ \Carbon\Carbon::parse($discussion->conversations()->latest()->limit(1)->value('created_at'))->diffForHumans() }}</span></h5>
                                    <a href="{{ route('admin.conversationByAdmin', $discussion) }}" class="btn btn-info">Ouvrir la discussion</a>
                                </div>
                            </div>
                        @endif
                    @empty

                    @endforelse
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="{{ url('public/js/app.js') }}"></script>
    <script>
        $(function () {
            const Http = window.axios;
            const Echo = window.Echo;
            let userId = "{{ session()->get('id') }}";

            let listenToNewDiscussion = Echo.channel('notify');
            listenToNewDiscussion.listen('NotifyUserEvent', function(data) {

                let unreadDiscussion = document.getElementById(`unread${data.discussion.custom_id}`);

                if (unreadDiscussion == null) {

                    let getDiscussion = data.discussion.id;

                    let getUrl = "{{ route('admin.conversationByAdmin',  ":getDiscussion") }}";
                    getUrl = getUrl.replace(':getDiscussion', getDiscussion);

                    $('#NotifyUserCard').append(
                        `<div class="col-12 col-md-7 mb-4">
                            <div class="message-panel unread" id="unread${data.discussion.custom_id}">
                                <h5>Discussion #${data.discussion.custom_id}<span>Il y a quelques instants</span></h5>
                                <a href="${getUrl}" class="btn btn-info">Ouvrir la discussion</a>
                            </div>
                        </div>`
                    )
                }
            });
        })
    </script>
@endsection

{{-- ${data.message.published_date} --}}
