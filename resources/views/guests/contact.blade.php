@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/OwlCarousel2/dist/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/visitors/OwlCarousel2/dist/assets/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/contact.css') }}">
@endsection

@section('content')
    <!--en tête-->
    <header class="contact">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="title-contact">
                        <h1>Contact</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <!--contenu-->
<section class="contenu">
    <div class="container">
        <div class="row cadre">
            <div class="col-md-8 inputs">
                <P class="top-input">NOUS ENVOYER UN MESSAGE</P>
                <P class="top-input-alert">Les champs marqués à la fin par * sont obligatoires dans la soumission
                de votre message. Veuillez les remplir avant soumission.
                </P>
                <form>
                    <div class="mb-3">
                        <input type="email" class="form-control" id="exampleInputText1" placeholder="VOTRE NOM COMPLET*">
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="VOTRE EMAIL*">
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" id="exampleInputText2" placeholder="SUJET DU MESSAGE">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control space-message" id="exampleFormControlTextarea1" rows="3" type="text" placeholder="ÉCRIRE VOTRE COMMENTAIRE"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary button">SOUMETTRE LE MESSAGE</button>
                </form>
            </div>
            <div class="col-12 col-md-4">
                <P class="top-reseau">NOS CONTACTS ET RÉSEAUX</P>
                <div class="social">
                    <div >
                        <a href="mailto:communestmo2@gmail.com" class="ens-email">
                            <span class="email"><i class="bi bi-envelope"></i></span>
                            <span class="nom-social nom-email">communestmo2@gmail.com</span> </div>
                        </a>
                    <div >
                        <a href="https://wa.me/22890866891" class="ens-whatsapp">
                           <span class="whatsapp"><i class="bi bi-whatsapp"></i></span>
                           <span class="nom-social nom-whatsapp">+228 90 86 68 91</span>
                        </a>
                    </div>
                    <div >
                        <a href="https://www.facebook.com/groups/394177278900050" class="ens-facebook">
                           <span class="facebook"><i class="bi bi-facebook"></i></span>
                           <span class="nom-social nom-facebook">@estmono2</span>
                        </a>
                    </div>
                    <div >
                        <a href="https://x.com/EstMono2" class="ens-instagram">
                          <span class="instagram"><i class="fab fa-x-twitter"></i></span>
                          <span class="nom-social nom-instagram">@estmono2</span>
                        </a>
                    </div>
                    <div >
                        <a href="tel:+22890866891" class="ens-telephone">
                          <span class="telephone"><i class="bi bi-telephone"></i></span>
                          <span class="nom-social nom-telephone">+228 90 86 68 91</span>
                        </a>
                    </div>
                    <div >
                        <a href="https://www.linkedin.com/in/" class="ens-linkedin">
                          <span class="linkedin"><i class="bi bi-linkedin"></i></span>
                          <span class="nom-social nom-linkedin">@estmono2 Commune</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-5">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.4094395777624!2d1.1768366147058908!3d6.209604828455625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1021584ead60792b%3A0x2880b392b6f7baff!2sLA%20VOLONTE!5e0!3m2!1sfr!2stg!4v1646676641561!5m2!1sfr!2stg" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>

</section>
@endsection

@section('script')
    <script src="{{ asset('styles/mdb/js/jquery.js') }}"></script>
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
    </script>
@endsection
