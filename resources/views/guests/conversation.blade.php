@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/conversation.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" id="token">
@endsection

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between flex-column flex-md-row">
                        <h4><i class="fa fa-commenting"></i> Panel de Discussion</h4>
                        <button type="button" class="btn btn-sm btn-danger" id="closeDiscussion">Fermer la discussion</button>
                    </div>
                    <div class="card-body messages" id="messagesClient">
                        <div class="d-none" id="converse" data-converse="{{ $_COOKIE['tahc_live'] }}"></div>
                        @if (count($conversations) <= 0)
                            <div id="start-message">
                                <h4>Bienvenue sur le panel de discussion avec le bureau de la commune. Veuillez commencer à envoyer votre message.</h4>
                            </div>
                        @endif

                        <div id="data-message">
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
                        <div class="admin-writing">Le cordonnateur est en train d'écrire...</div>
                    </div>
                    <div class="card-footer">
                        <div class="discussionQuit" style="display: none;">
                            <span class="bi bi-lock-fill"></span> Cette discussion a été fermée. Vous ne pouvez plus continuer cette conversation
                        </div>
                        <div class="form-group toBeDisplayed">
                            <textarea id="message" rows="5" class="form-control" placeholder="Veuillez saisir votre message ici"></textarea>
                        </div>
                        <div class="form-group toBeDisplayed  mb-0">
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-md btn-primary" id="sendMessage"><span class="send">Envoyer</span> <i class="fa fa-send-o"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ url('public/js/app.js') }}"></script>
    <script>
        $(function () {
            const Http = window.axios;
            const Echor = window.Echo;
            const message = $('#message');
            const messagesClient = document.getElementById('messagesClient');
            const token = $('#token');

            const getDiscussion = $('#converse').attr('data-converse');

            $('textarea').keyup(function () {
                $(this).removeClass('is-invalid');
            });

            shouldScroll = messagesClient.scrollTop + messagesClient.clientHeight === messagesClient.scrollHeight;

            if (!shouldScroll) {
                messagesClient.scrollTop = messagesClient.scrollHeight;
            }

            $('#sendMessage').click(function () {
                if (message.val() == "") {
                    message.addClass('is-invalid');
                } else {
                    message.attr('disabled', true);
                    $('#sendMessage').attr('disabled', true);
                    $('.send').html('Envoi en cours ...');
                    Http.post("{{ route('guests.send.message') }}", {
                        'message' : message.val(),
                        '_token' : token.attr('content')
                    }).then(() => {

                        $('#start-message').css('display', 'none')
                        message.val('');
                        message.attr('disabled', false);
                        $('#sendMessage').attr('disabled', false);
                        $('.send').html('Envoyer');

                        if (!shouldScroll) {
                            messagesClient.scrollTop = messagesClient.scrollHeight;
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

            $('#closeDiscussion').click(function () {
                Http.get("{{ route('guests.leaveDiscussion') }}")
                .then((response) => {
                    Echor.leaveChannel(`discussions.${getDiscussion}`)
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

            let listenToQuitChannel = Echor.channel(`quit-discussion-${getDiscussion}`);
            listenToQuitChannel.listen('QuitDiscussionEvent', function(data) {
                $('.toBeDisplayed').css('display', 'none');
                $('.discussionQuit').fadeIn();
            });

            message.keyup(function () {

            let messageValLength = $(this).val().length;

            let getUrlForTyping = "{{ route('guests.discussions.typing',  ":messageValLength") }}";

            getUrlForTyping = getUrlForTyping.replace(":messageValLength", messageValLength)


                $.ajax({
                    type: "GET",
                    url: getUrlForTyping,
                    success: function (status) {
                        console.log(status)
                        Echor.channel(`guests-typing-in.${getDiscussion}`)
                    },
                    error: function (response) {
                        console.log('error: '+response)
                    }
                });
            });

            let typingChannel = Echor.channel(`typing-in.${getDiscussion}`)
            typingChannel.listen('DiscussionTypingEvent', function(data) {
                if (data.messageVal > 0) {
                    $('.admin-writing').fadeIn();
                } else {
                    $('.admin-writing').fadeOut();
                }
            })

            let channel = Echor.channel(`discussions.${getDiscussion}`);
            channel.listen('DiscussionEvent', function(data) {

                $('.admin-writing').fadeOut();

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
                    messagesClient.scrollTop = messagesClient.scrollHeight;
                }
            });
        });
    </script>
@endsection
