@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/mairie/lois.css') }}">
@endsection

@section('content')
    <div class="banner-background">
        <div class="banner-filter">
            <h4 class="banner-title text-center animate__animated animate__rotateInUpLeft animate__repeat-1 animate__slower">Lois organisationnelles de la commune</h4>
        </div>
    </div>

    <div class="container-fluid custom-banner">
        <div class="container-re py-4 px-4" style="background-color: rgba(255, 255, 255, 0.6)">
            <div class="row justify-content-center">
                <div class="col-12 mb-4">
                    <p>
                        La commune Est-Mono 2 est une commune essentiellement agricole et qui possède d’énorme atout de développement. Elle est dirigée par le maire et deux (02) adjoints, plus les conseillers qui se réunissent et prennent des décisions ou des actions de développement. Elle est subdivisée en trois (03) grands cantons et cent (100) villages. Ces cantons sont dirigés par les chefs cantons et les villages par les chefs de village. Ceux-ci exercent leur action de développement en étroite collaboration avec les comités de développement à la base.
                    </p>
                </div>

            {{--    <div class="col-12 col-md-4 mb-4">
                    <div class="file__card">
                        <div class="file__card__body">
                            <iframe src="{{ asset('assets/documents/organisation2.pdf#toolbar=0') }}" frameborder="0"></iframe>
                            <div class="file__card__filter">
                                <h6 class="file__title text-uppercase font-weight-bold">
                                    Arrêté municipal portant modification de l'organisation des services de la commune du Golfe1
                                </h6>
                                <a href="{{ asset('assets/documents/organisation2.pdf#toolbar=0') }}" target="_blank" class="file__link"><i class="fa fa-eye"></i> Aperçu</a>
                            </div>
                        </div>
                        <div class="file__card__footer"></div>
                    </div>
                </div>--}}
            </div>
        </div>
    </div>
@endsection

@section('script')
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
                    'color' : '#006130'
                });

                $('#' + getCollapseId + ' a').css({
                    'color' : '#006130'
                });

                $('#' + getCollapseId + ' span').html('&plus;');
            });
        });
    </script>
@endsection
