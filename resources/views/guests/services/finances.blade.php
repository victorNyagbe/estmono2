@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/services/finances.css') }}">
@endsection

@section('content')
    <div class="banner-background">
        <div class="banner-filter">
            <h4 class="banner-title text-center animate__animated animate__rotateInUpLeft animate__repeat-1 animate__slower">Finances</h4>
        </div>
    </div>

    <div class="container-fluid custom-banner">
        <div class="container-re py-4 px-4">
            <div class="row justify-content-center">
                <div class="col-12 col-md-4 mb-4">
                    <h5>A renseigner</h5>
                </div>
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
