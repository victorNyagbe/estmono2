@extends('guests.layouts.master')

@section('style')
    
@endsection

@section('content')
<section class="contenu">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9 col-lg-8">
                <form action="" method="" enctype="" id="createForm">
                    <div class="form-group">
                        <label for="lastname">Proposer un projet </label>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Titre </label>
                        <input type="text" name="lastname" id="lastname" value="" class="form-control" placeholder="Saisir le nom">
                    </div>
                    <div class="form-group">
                        <label for="type">Maturité du projet</label>
                        <select name="type" id="type" class="form-control">
                            <option value="">Selectionner le niveau de maturité du projet</option>
                            <option value="">Idée</option>
                            <option value="">Preuve de concept</option>
                            <option value="">Produit minimum viable</option>
                            <option value="">Produit fini et mis en production</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="type">Niveau de progression du projet</label>
                        <select name="" id="" class="form-control">
                            <option value="">Selectionner le niveau de progression du projet</option>
                            <option value="">Stade de pré-amorçage</option>
                            <option value="">Stade d'amorçage</option>
                            <option value="">Stade précoce</option>
                            <option value="">Stade de croissance</option>
                            <option value="">Phase d'extension</option>
                            <option value="">phase de sortie</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="text">Faire une description</label>
                        <textarea name="text" id="text" class="form-control text" style="font-size: 3rem;" placeholder="Ecrire le texte de votre projet"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-success text-uppercase">valider</button>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</section>
@endsection

@section('script')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        $(document).ready(function () {
            
            CKEDITOR.replace('text', {
                language: 'fr',
                contentsCss: "body {font-size: 27px;}"
            });
        });
       
    </script>
    <!-- $(document).ready(function () {

            $('#createForm').on('submit', function(e) {
                const editorCode = $('.description').summernote('code').replace(/<\/?[^>]+(>|$)/g, " ");

                $('#descriptionText').val(editorCode);
            });

            $('#text').summernote({
                lang: 'fr-FR',
                minHeight: 400,
                tabsize: 2,
                placeholder: 'Veuillez rensigner le texte ici...',
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']]
                ]
            });
        }); -->
@endsection
