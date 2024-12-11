@extends('admin.layouts.admin')

@section('style')
    <style>
        .custom-img-fluid {
            width: 30%;
            border-radius: 50%;
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center pt-5">
                    <div class="col-12">
                        <div class="dashboard-logo mb-4">
                            <center><img src="{{ asset('assets/images/logo.jpeg') }}" alt="" class="img-fluid custom-img-fluid"></center>
                        </div>
                        <h2 class="text-uppercase text-center font-weight-bold">ADMINISTRATION EST MONO 2</h3>
                        <h6 class="mt-4 text-center">Bienvenue, {{ session()->get('name') }}</h6>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
