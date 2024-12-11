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
                        <h1 class="m-0">Conversations</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.discussions.list') }}">Discussions</a></li>
                            <li class="breadcrumb-item active">Conversations</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">
                @include('admin.includes.messageReturned')

                <div class="row justify-content-center">
                    {{-- <div class="col-12 mb-5 mt-2">
                        <div class="d-flex flex-column flex-md-row justify-content-start">
                            <a href="{{ route('admin.user.register_view') }}" class="btn btn-danger text-uppercase mr-3"><i class="fa fa-comment-slash"></i> Discussions clôturées</a>
                            <a href="{{ route('admin.user.register_view') }}" class="btn btn-success text-uppercase mr-3"><i class="fa fa-comment"></i> Discussions lues</a>
                        </div>
                    </div> --}}

                   <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between flex-column flex-md-row">
                                <h4><i class="fa fa-commenting"></i> Panel de Discussion </h4>
                                @if (!$discussion->status)
                                    <button type="button" class="btn btn-sm btn-danger" id="quitDiscussion">Fermer la discussion</button>
                                @endif
                            </div>
                            <div class="card-body messages" id="messages">
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
                                <div class="writing">Le citoyen est en train d'écrire...</div>
                            </div>
                            <div class="card-footer">
                                @if (!$discussion->status)
                                    <div class="discussionQuit" style="display: none;">
                                        <span class="fa fa-lock"></span> Cette discussion a été fermée. Vous ne pouvez plus continuer cette conversation
                                    </div>
                                    <div class="form-group toBeDisplayed">
                                        <textarea id="message" rows="5" class="form-control" placeholder="Veuillez saisir votre message ici"></textarea>
                                    </div>
                                    <div class="form-group toBeDisplayed mb-0">
                                        <div class="d-flex justify-content-center">
                                            <button class="btn btn-md btn-primary" id="sendMessage"><span class="send">Envoyer</span> <i class="fa fa-send-o"></i></button>
                                        </div>
                                    </div>
                                @else
                                    <div class="discussionQuit" style="display: none;">
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
    <script src="{{ url('public/js/app.js') }}"></script>
    <script>
        $(function () {
            const Http = window.axios;
            const Echo = window.Echo;
            const message = $('#message');
            const messages = document.getElementById('messages');
            const token = $('#token');
            const getDiscussion = $('#converse').attr('data-converse');

            $('textarea').keyup(function () {
                $(this).removeClass('is-invalid');
            });

            shouldScroll = messages.scrollTop + messages.clientHeight === messages.scrollHeight;

            if (!shouldScroll) {
                messages.scrollTop = messages.scrollHeight;
                console.log(messages.scrollHeight)
            }

            //Administrator send a message
            $('#sendMessage').click(function () {
                if (message.val() == "") {
                    message.addClass('is-invalid');
                } else {
                    message.attr('disabled', true);
                    $('#sendMessage').attr('disabled', true);
                    $('.send').html('Envoi en cours ...');
                    Http.post("{{ route('admin.sendMessageByAdmin') }}", {
                        'message' : message.val(),
                        '_token' : token.attr('content')
                    }).then(() => {
                        message.val('');
                        message.attr('disabled', false);
                        $('#sendMessage').attr('disabled', false);
                        $('.send').html('Envoyer');

                        if (!shouldScroll) {
                            messages.scrollTop = messages.scrollHeight;
                        }

                    }).catch(function (error) {
                        message.val('');
                        message.attr('disabled', false);
                        $('#sendMessage').attr('disabled', false);
                        $('.send').html('Envoyer');
                        if (error.response) {
                            // The request was made and the server responded with a status code
                            // that falls out of the range of 2xx
                            console.log(error.response.data);
                            console.log(error.response.status);
                            console.log(error.response.headers);
                        } else if (error.request) {
                            // The request was made but no response was received
                            // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
                            // http.ClientRequest in node.js
                            console.log(error.request);
                        } else {
                            // Something happened in setting up the request that triggered an Error
                            console.log('Error', error.message);
                        }
                            console.log(error.config);
                    })
                }
            });

            //Administrator leaves the chat
            $('#quitDiscussion').click(function () {
                Http.get("{{ route('admin.discussions.quit') }}")
                .then((response) => {
                    Echo.leaveChannel(`discussions.${getDiscussion}`)
                    window.location.href = response.data.url
                }).catch(function (error) {
                    if (error.response) {
                        console.log(error.response.data);
                        console.log(error.response.status);
                        console.log(error.response.headers);
                    } else if (error.request) {
                        console.log(error.request);
                    } else {
                        console.log('Error', error.message);
                    }
                        console.log(error.config);
                })
            });

            let listenToQuitChannel = Echo.channel(`quit-discussion-${getDiscussion}`);
            listenToQuitChannel.listen('QuitDiscussionEvent', function(data) {
                $('.toBeDisplayed').css('display', 'none');
                $('.discussionQuit').fadeIn();
            });

            message.keyup(function () {

            let messageValLength = $(this).val().length;

            let getUrlForTyping = "{{ route('admin.discussions.typing',  ":messageValLength") }}";
            getUrlForTyping = getUrlForTyping.replace(":messageValLength", messageValLength)


                $.ajax({
                    type: "GET",
                    url: getUrlForTyping,
                    success: function (status) {
                        console.log(status)
                        Echo.channel(`typing-in.${getDiscussion}`)
                    },
                    error: function (response) {
                        console.log('error: '+response)
                    }
                });
            });

            let typingChannel = Echo.channel(`guests-typing-in.${getDiscussion}`)
            typingChannel.listen('GuestTypingEvent', function(data) {
                if (data.messageVal > 0) {
                    $('.writing').fadeIn();
                } else {
                    $('.writing').fadeOut();
                }
            })

            //Listen to any event of chat message according to the creator
            let channel = Echo.channel(`discussions.${getDiscussion}`);

            channel.listen('DiscussionEvent', function(data) {

                $('.writing').fadeOut();

                if (data.message.author == 'Vous') {
                    $('#data-message')
                    .append(`<div class="client-message mb-4">
                                    <div><span class="author">${data.message.author},</span> <span class="published-date">${data.message.published_date}</span></div>
                                    <p>${data.message.message}</p>
                                </div>`)
                } else {
                    $('#data-message')
                    .append(`<div class="server-message mb-4">
                                <div><span class="author">${data.message.author},</span> <span class="published-date">${data.message.published_date}</span></div>
                                <p>${data.message.message}</p>
                            </div>`)
                }
                if (!shouldScroll) {
                    messages.scrollTop = messages.scrollHeight;
                }
            });
        });
    </script>
@endsection


