@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/stats.css') }}">
@endsection

@section('content')
    <div class="banner-background">
        <div class="banner-filter">
            <h4 class="banner-title text-center animate__animated animate__rotateInUpLeft animate__repeat-1 animate__slower">Statistiques</h4>
        </div>
    </div>
    <div class="container-fluid custom-banner">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="accordion" id="accordionExample275">

                        <div class="card z-depth-0 bordered">
                            <div class="card-header" id="heading0">
                                <h5 class="mb-0 d-flex justify-content-between" data-toggle="collapse" data-target="#collapse0" aria-expanded="true"
                                aria-controls="collapse0">
                                    <a href="#!" onclick="event.preventDefault();"> FInances </a>
                                    <span>&plus;</span>
                                </h5>
                            </div>
                            <div id="collapse0" class="collapse show" aria-labelledby="heading0"
                                data-parent="#accordionExample275">
                                <div class="card-body">
                                    <div class="download-link pt-1">
                                        <span class="civil-list">Année 2023</span> : <a href="#!">Télécharger le document <i class="bi bi-download"></i></a>
                                    </div>
                                    <div class="download-link pt-1">
                                        <span class="civil-list">Année 2022</span> : <a href="#!">Télécharger le document <i class="bi bi-download"></i></a>
                                    </div>
                                    <div class="download-link pt-1">
                                        <span class="civil-list">Année 2021</span> : <a href="#!">Télécharger le document <i class="bi bi-download"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card z-depth-0 bordered">
                            <div class="card-header" id="heading1">
                                <h5 class="mb-0 d-flex justify-content-between" data-toggle="collapse" data-target="#collapse1" aria-expanded="true"
                                aria-controls="collapse1">
                                    <a href="#!" onclick="event.preventDefault();"> Education </a>
                                    <span>&plus;</span>
                                </h5>
                            </div>
                            <div id="collapse1" class="collapse" aria-labelledby="heading1"
                                data-parent="#accordionExample275">
                                <div class="card-body">
                                    <div class="download-link pt-1">
                                        <span class="civil-list">Année 2023</span> : <a href="#!">Télécharger le document <i class="bi bi-download"></i></a>
                                    </div>
                                    <div class="download-link pt-1">
                                        <span class="civil-list">Année 2022</span> : <a href="#!">Télécharger le document <i class="bi bi-download"></i></a>
                                    </div>
                                    <div class="download-link pt-1">
                                        <span class="civil-list">Année 2021</span> : <a href="#!">Télécharger le document <i class="bi bi-download"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card z-depth-0 bordered">
                            <div class="card-header" id="heading2">
                                <h5 class="mb-0 d-flex justify-content-between" data-toggle="collapse" data-target="#collapse2" aria-expanded="true"
                                aria-controls="collapse2">
                                    <a href="#!" onclick="event.preventDefault();"> Santé </a>
                                    <span>&plus;</span>
                                </h5>
                            </div>
                            <div id="collapse2" class="collapse" aria-labelledby="heading2"
                                data-parent="#accordionExample275">
                                <div class="card-body">
                                    <div class="download-link pt-1">
                                        <span class="civil-list">Année 2023</span> : <a href="#!">Télécharger le document <i class="bi bi-download"></i></a>
                                    </div>
                                    <div class="download-link pt-1">
                                        <span class="civil-list">Année 2022</span> : <a href="#!">Télécharger le document <i class="bi bi-download"></i></a>
                                    </div>
                                    <div class="download-link pt-1">
                                        <span class="civil-list">Année 2021</span> : <a href="#!">Télécharger le document <i class="bi bi-download"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card z-depth-0 bordered">
                            <div class="card-header" id="heading3">
                                <h5 class="mb-0 d-flex justify-content-between" data-toggle="collapse" data-target="#collapse3" aria-expanded="true"
                                aria-controls="collapse3">
                                    <a href="#!" onclick="event.preventDefault();"> Culture </a>
                                    <span>&plus;</span>
                                </h5>
                            </div>
                            <div id="collapse3" class="collapse" aria-labelledby="heading3"
                                data-parent="#accordionExample275">
                                <div class="card-body">
                                    <div class="download-link pt-1">
                                        <span class="civil-list">Année 2023</span> : <a href="#!">Télécharger le document <i class="bi bi-download"></i></a>
                                    </div>
                                    <div class="download-link pt-1">
                                        <span class="civil-list">Année 2022</span> : <a href="#!">Télécharger le document <i class="bi bi-download"></i></a>
                                    </div>
                                    <div class="download-link pt-1">
                                        <span class="civil-list">Année 2021</span> : <a href="#!">Télécharger le document <i class="bi bi-download"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card z-depth-0 bordered">
                            <div class="card-header" id="heading4">
                                <h5 class="mb-0 d-flex justify-content-between" data-toggle="collapse" data-target="#collapse4" aria-expanded="true"
                                aria-controls="collapse4">
                                    <a href="#!" onclick="event.preventDefault();"> Urbanisme </a>
                                    <span>&plus;</span>
                                </h5>
                            </div>
                            <div id="collapse4" class="collapse" aria-labelledby="heading4"
                                data-parent="#accordionExample275">
                                <div class="card-body">
                                    <div class="download-link pt-1">
                                        <span class="civil-list">Année 2023</span> : <a href="#!">Télécharger le document <i class="bi bi-download"></i></a>
                                    </div>
                                    <div class="download-link pt-1">
                                        <span class="civil-list">Année 2022</span> : <a href="#!">Télécharger le document <i class="bi bi-download"></i></a>
                                    </div>
                                    <div class="download-link pt-1">
                                        <span class="civil-list">Année 2021</span> : <a href="#!">Télécharger le document <i class="bi bi-download"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script language="javascript" src="{{ asset('styles/admin/dist/js/changeToLetter.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.collapse').on('shown.bs.collapse', function () {
                let getCollapseId = $(this).attr('aria-labelledby');

                $('#' + getCollapseId).css({
                    'background-image' : 'linear-gradient(to right, #6d8d3d, #8dbf44, #8bcd28)',
                    'color' : 'white'
                });

                $('#' + getCollapseId + ' a').css({
                    'color' : 'white'
                });

                $('#' + getCollapseId + ' span').html('&minus;');
            });

            $('.collapse').on('hidden.bs.collapse', function () {
                let getCollapseId = $(this).attr('aria-labelledby');

                $('#' + getCollapseId).css({
                    'background-image' : 'none',
                    'background-color' : 'white',
                    'color' : '#2b3481'
                });

                $('#' + getCollapseId + ' a').css({
                    'color' : '#2b3481'
                });

                $('#' + getCollapseId + ' span').html('&plus;');
            });
        });

    </script>

@endsection
