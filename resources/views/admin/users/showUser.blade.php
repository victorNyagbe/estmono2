@extends('admin.layouts.admin')

@section('style')
    <style>
        .user-image {
            background-position: top;
            background-size: cover;
            background-repeat: no-repeat;
            position: relative;
            height: 50vh;
        }
        .detail-text{
            font-size: 1.5rem;
            
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Administrateurs</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.user.admins') }}">Administrateurs</a></li>
                            <li class="breadcrumb-item active">Details</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">

                <div class="row justify-content-center mt-4 mt-md-5 mb-3">
                    <div class="col-12 col-md-4 mb-4">
                        @if ($checkUser->profile)
                            <div class="user-image" style="background-image: url('{{ asset('storage/app/public/' . $checkUser->profile) }}')"></div>

                        @else
                            <div class="user-image" style="background-image: url('{{ asset('assets/images/avatar.svg') }}')"></div>
                        @endif
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="row">
                            <div class="col-12 mb-4 detail-text">
                                <h5 style="font-weight: bold;">Nom et Prénom(s):</h5> <p>{{ $checkUser->name }}</p>
                            </div>
                            <div class="col-12 mb-4 detail-text">
                                <h5 style="font-weight: bold;">Adresse électronique:</h5> <p>{{ $checkUser->email }}</p>
                            </div>
                            <div class="col-12 mb-4 detail-text">
                                <h5 style="font-weight: bold;">Contact:</h5> <p>{{ $checkUser->contact }}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#checkPassword').change(function () {
                if ($(this).is(':checked')) {
                    $('.password').attr('type', 'text')
                } else {
                    $('.password').attr('type', 'password')
                }
            });
        });
    </script>
@endsection
