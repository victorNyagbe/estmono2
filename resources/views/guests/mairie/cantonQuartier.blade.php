@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/mairie/cantonQuartier.css') }}">
@endsection

@section('content')
    <div class="banner-background">
        <div class="banner-filter">
            <h4 class="banner-title text-center animate__animated animate__rotateInUpLeft animate__repeat-1 animate__slower">Cantons et quartiers</h4>
        </div>
    </div>

    <div class="container-fluid custom-banner">
        <div class="container py-4">
            <div class="row">
                <div class="col-12">
                    <h4 class="text-center presentation-text">
                        Presentation
                    </h4>
                </div>
                <div class="col-12">
                    <p>
                        {{--A renseigner--}}
                    </p>
                </div>

                <div class="col-12 mt-3 mb-4">
                    <div class="table-responsive table-responsive-md text-nowrap" data-aos="flip-left"
                    data-aos-easing="ease-out-cubic"
                    data-aos-duration="2000">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr style="background-color: #2b3481; color: white; text-align: center;">
                                    <th width="50">N°</th>
                                    <th>CANTONS</th>
                                    <th>QUARTIERS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="toCenter">
                                        1
                                    </td>
                                    <td class="toCenter">
                                        Canton de Morétan
                                    </td>
                                    <td>
                                        <ul><li>A renseigner</li></ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="toCenter">
                                        2
                                    </td>
                                    <td class="toCenter">
                                        Canton de Badin
                                    </td>
                                    <td>
                                        <ul><li>A renseigner</li></ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="toCenter">
                                        3
                                    </td>
                                    <td class="toCenter">
                                        Canton de Kamina
                                    </td>
                                    <td>
                                        <ul><li>A renseigner</li></ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- <div class="col-12 col-md-5">
                    <div class="carte-img">
                        <center><img src="{{ asset('assets/images/carte-du-golfe1.jpg') }}" alt=""></center>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('document').ready(function () {

        });
    </script>
@endsection
