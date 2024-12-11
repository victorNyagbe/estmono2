@extends('guests.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/visitors/css/faqAllQuestions.css') }}">
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
            @if ($category_question->questions()->count() > 0)
                <div class="col-12 mt-4">
                    <div class="accordion" id="accordionExample275">
                        <?php $compteur=0; ?>
                        @foreach ($questions as $question)
                            <div class="card z-depth-0 bordered">
                                <div class="card-header {{ $compteur == 0 ? 'headingOne2' : '' }}" id="headingQuestion{{ $question->id }}">
                                    <h5 class="mb-0 d-flex justify-content-between" data-toggle="collapse" data-target="#collapseQuestion{{ $question->id }}"
                                    aria-expanded="true" aria-controls="collapseQuestion{{ $question->id }}">
                                        <a href="#!" onclick="event.preventDefault();">
                                            {{ $question->title }}
                                        </a>
                                        <span style="transform: rotate(90deg);">&gt;</span>
                                    </h5>
                                </div>
                                <div id="collapseQuestion{{ $question->id }}" class="collapse {{ $compteur == 0 ? 'show' : '' }}" aria-labelledby="headingQuestion{{ $question->id }}"
                                    data-parent="#accordionExample275">
                                    <div class="card-body">
                                        <div>{!! $question->text !!}</div>
                                    </div>
                                </div>
                            </div>
                            <?php $compteur++; ?>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="col-12 mt-4">
                    <h4 class="text-center">Aucune question fréquente dans cette rubrique</h4>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('.collapse').on('shown.bs.collapse', function () {
                let getCollapseId = $(this).attr('aria-labelledby');

                $('#' + getCollapseId).css({
                    'background-color' : '#78b140',
                    'color' : 'white'
                });

                $('#' + getCollapseId + ' a').css({
                    'color' : 'white'
                });

                $('#' + getCollapseId + ' span').css({
                    'transform' : 'rotate(90deg)'
                });
            });

            $('.collapse').on('hidden.bs.collapse', function () {
                let getCollapseId = $(this).attr('aria-labelledby');

                $('#' + getCollapseId).css({
                    'background-color' : '#eee',
                    'color' : '#006130'
                });

                $('#' + getCollapseId + ' a').css({
                    'color' : '#006130'
                });

                $('#' + getCollapseId + ' span').css({
                    'transform' : 'rotate(0deg)'
                });
            });
        });
    </script>
@endsection
