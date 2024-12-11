@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/services/etatCivil.css') }}">
@endsection

@section('content')
    <div class="banner-background">
        <div class="banner-filter">
            <h4 class="banner-title text-center animate__animated animate__rotateInUpLeft animate__repeat-1 animate__slower">Etat Civil</h4>
        </div>
    </div>
    <div class="container-fluid custom-banner">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-12">
                    <p class="text-center">
                        {{ $presentations == null ? "Présentation" : $presentations->text}}

                        <h4 class="civil-section-title py-4">
                            Les actes d'Etat Civil
                        </h4>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="accordion" id="accordionExample275">

                        <?php $cpt = 1; ?>
                        @foreach ($civils as $civil)

                            <div class="card z-depth-0 bordered">
                                <div class="card-header" id="heading{{ $cpt }}">
                                    <h5 class="mb-0 d-flex justify-content-between" data-toggle="collapse" data-target="#collapse{{ $cpt }}" aria-expanded="{{ $cpt == 1 ? true : false }}"
                                    aria-controls="collapse{{ $cpt }}">
                                        <a href="#!" onclick="event.preventDefault();"> {{ $civil->title }} </a>
                                        <span>&plus;</span>
                                    </h5>
                                </div>
                                <div id="collapse{{ $cpt }}" class="collapse {{ $cpt == 1 ? 'show' : '' }}" aria-labelledby="heading{{ $cpt }}"
                                    data-parent="#accordionExample275">
                                    <div class="card-body">
                                        <div>
                                            {{ $civil->description }}
                                        </div>

                                        @if ($civil->fichier_civils->first() != null)
                                            <div class="civil-info pt-3">
                                                <p>Télécharger le document détaillant pièces à fournir ci-dessous:</p>
                                            </div>
                                            <div class="download-link pt-1">
                                                <span class="civil-list">{{ \Illuminate\Support\Str::substr($civil->fichier_civils->first()->file, 14, 60) }}</span> : <a href="{{ route('guests.services.etatCivil.download', $civil->fichier_civils->first()->civil_id) }}">Télécharger le document <i class="bi bi-download"></i></a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <?php $cpt++; ?>
                        @endforeach
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
                    'background-image' : 'linear-gradient(to right, #17182a, #6469c7, #d1dcf4)',
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
