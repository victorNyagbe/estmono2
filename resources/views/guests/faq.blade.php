@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/faq.css') }}">
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
        <div class="row justify-container-center">
            <div class="col-12">
                <h5 class="section-title">Foire aux questions</h5>
            </div>
            @if (count($category_questions) > 0)
                @foreach ($category_questions as $category_question)
                    @if ($category_question->questions()->count() > 0)
                        <div class="col-12 col-md-4 mb-5">
                            <div class="questions-panel">
                                <h6 class="faq-title">{{ $category_question->name }}</h6>
                                <div class="questions mb-0">
                                    @foreach ($category_question->questions()->get() as $question)
                                        <a href="{{ route('guests.faqSingleQuestion', [$category_question, $question]) }}" class="singleQuestion">{{ $question->title }}</a>
                                    @endforeach
                                </div>
                                <div><a href="{{ route('guests.faqAllQuestions', $category_question) }}" class="pl-3 pt-2 allQuestions">Voir toutes les questions</a></div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @else
                <div class="col-12">
                    <h4 class="text-center">Fonctionnalité en développement. Merci</h4>
                </div>
            @endif
        </div>
    </div>
@endsection
