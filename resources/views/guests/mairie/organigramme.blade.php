@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/OwlCarousel2/dist/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/visitors/OwlCarousel2/dist/assets/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/mairie/organigramme.css') }}">
@endsection

@section('content')
    <!--en tête-->
    <header class="organigramme">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="title-organigramme">
                        <h1>Organigramme</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <!--contenu-->
<section class="contenu">
    <main class=" mb-4">
        <div class="container px-4">
            <div class="row justify-content-center">
                <div class="organigramme-img col-12 py-4" >
                    @isset($organigrams)
                        <img src="{{ asset('storage/app/public/' . $organigrams->image) }}" class="img-fluid" alt="" data-toggle="modal" data-target="#modalOrganigramme" onclick="showImage(this);">
                    @else
                        <h1 class="text-center">Organigramme non renseigné</h1>
                    @endisset
                </div>
            </div>
        </div>
    </main>
</section>

<div class="modal fade" id="modalOrganigramme" tabindex="-1" role="dialog" aria-labelledby="modalOrganigrammeTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal" style="background-color: #f44; padding: 2px; border: none; border-radius: 5px;">
                    <span aria-hidden="true" style="font-size: 1.5rem;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <center><img src="" alt="" class="img-fluid" id="imageExpanded"></center>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('styles/mdb/js/jquery.js') }}"></script>
    <script src="{{ asset('styles/mdb/js/popper.js') }}"></script>
    <script src="{{ asset('styles/mdb/js/bootstrap.js') }}"></script>
    <script src="{{ asset('styles/visitors/OwlCarousel2/dist/owl.carousel.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#teamOwl').owlCarousel({
                loop:true,
                margin:10,
                nav:false,
                autoplay:true,
                autoplayTimeout:5000,
                autoplayHoverPause:true,
                dots: false,
                responsive:{
                    0:{
                        items:1
                    },
                    768:{
                        items:2
                    },
                    992:{
                        items:3
                    },
                    1200: {
                        items:4
                    }
                }
            });
        });

        function showImage(image) {
            let getModalImageExpanded = document.getElementById('imageExpanded');

            getModalImageExpanded.src = image.src;
        }
    </script>
@endsection
