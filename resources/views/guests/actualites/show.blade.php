@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/actualites/show.css') }}">
    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('storage/app/public/' . $actualite->image) }}">

    <!-- Twitter Card Meta Tags -->
    <meta property="twitter:title" content="{{ $actualite->title }}">
    <meta property="twitter:description" content="{!! $actualite->subtitle . '...' !!}">
    <meta property="twitter:image" content="{{ asset('storage/app/public/' . $actualite->image) }}">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="{{ $actualite->title }}">
    <meta property="og:description" content="{!! $actualite->subtitle . '...' !!}">
    <meta property="og:image" content="{{ asset('storage/app/public/' . $actualite->image) }}" style="width: 1200px; height: 630px;">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="article">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center py-5" style="background-color: white;">
            <div class="col-12 col-lg-8 mb-4">
                <div class="actualite-image mb-3" style="background-image: url('{{ asset('storage/app/public/' . $actualite->image) }}')"></div>
                <div class="actualite-title">
                    <h4>{{ $actualite->title }}</h4>
                </div>
                <div class="actualite-cal">
                    <div class="actualite-calendar"><span class="bx bx-calendar-event"></span> Postée le, {{ \Carbon\Carbon::parse($actualite->created_at)->format('d/m/Y') }}</div>
                    <div class="actualite-share"><span class="fa fa-share-nodes"></span> partager</div>
                    <span class="link-value d-none" aria-valuetext="{{ \Illuminate\Support\Facades\URL::current() }}"></span>
                </div>
                <div class="actualite-description">
                    {!! $actualite->text !!}
                </div>
            </div>
            <div class="col-12 col-lg-4 mt-5 mt-lg-0">
                <h4 class="other-actualites mt-5 mt-lg-0"><span class="bx bx-news"></span> Voir autres</h4>
                <div class="row">
                    @foreach ($other_actualites as $other_actualite)
                        <div class="col-12" data-aos="fade-up" data-aos-delay="500">
                            <div class="other-actualites-panel">
                                <div class="other-actualites-image" style="background-image: url('{{ asset('storage/app/public/' . $other_actualite->image) }}')"></div>
                                <div class="other-actualites-info">
                                    <h6 class="other-actualites-title text-uppercase" title="{{ $other_actualite->title }}">{{ strlen($other_actualite->title) > 60 ? \Illuminate\Support\Str::substr($other_actualite->title, 0, 60) . '...' : $other_actualite->title }}</h6>
                                    <p class="other-actualites-text">{{ $other_actualite->subtitle . '...' }}</p>
                                    <p class="other-actualites-date">
                                        <small>Postée le {{ \Carbon\Carbon::parse($other_actualite->created_at)->format('d/m/Y') }}</small>
                                        <a href="{{ route('guests.actualites.show', $other_actualite) }}" class="show-more">En savoir plus</a>
                                    </p>
                                </div>
                            </div>
                            <hr style="background-color: #4d2600;">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="notif_card">
            <h5 class="notif_text">Le lien a été copié avec succès</h5>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            let linkValue = $('.link-value').attr('aria-valuetext');

            $('.actualite-share').click(function (e) {
                e.preventDefault();

                navigator.clipboard.writeText(linkValue).then(() => {
                    $('.notif_card').addClass('fadeInOut');
                    setTimeout(function() {
                        $('.notif_card').removeClass('fadeInOut');
                    }, 5000);
                });
            });
        })
    </script>
@endsection
