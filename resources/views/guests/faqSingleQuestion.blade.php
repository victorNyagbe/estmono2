@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/faqSingleQuestion.css') }}">
@endsection

@section('content')
    <div class="container-fluid py-4 breadcrumb-row">
        <div class="row justify-content-center ">
            <div class="col-12 col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('guests.bureauDuCitoyen') }}">Bureau du citoyen</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Foire aux questions</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="container customized py-4">
        <div class="row">
            <div class="col-12">
                <span><a href="{{ route('guests.faq') }}">Foire aux questions</a> </span>
                <span>> </span>
                <span>{{ $category_question->name }}</span>
            </div>
            <div class="col-12 mt-4">
                <h3 class="text-center mt-3"><i class="fa fa-question-circle"></i> {{ $question->title }}</h3>
                <p class="response">
                    {!! $question->text !!}
                </p>
            </div>
        </div>
    </div>
@endsection
