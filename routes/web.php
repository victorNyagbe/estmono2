<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\CarteController;
use App\Http\Controllers\Admin\MaireController;
use App\Http\Controllers\Guests\MainController;
use App\Http\Controllers\Admin\MarcheController;
use App\Http\Controllers\Admin\StreetController;
use App\Http\Controllers\Admin\AnnonceController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Guests\ProjectController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\EtatCivilController;
use App\Http\Controllers\Admin\MunicipalController;
use App\Http\Controllers\Admin\DiscussionController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Guests\ActualiteController;
use App\Http\Controllers\Admin\ProjectTypeController;
use App\Http\Controllers\Admin\CategoryQuestionController;
use App\Http\Controllers\Admin\MainController as AdminMainController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Guests\AnnonceController as GuestsAnnonceController;
use App\Http\Controllers\Admin\ActualiteController as AdminActualiteController;
use App\Http\Controllers\Admin\ActuVideoController as AdminActuVideoController;
use App\Http\Controllers\Admin\CultureController;
use App\Http\Controllers\Guests\CultureController as GuestCultureController;
use App\Http\Controllers\Guests\DiscussionController as GuestsDiscussionController;

// Route::get('/', [MainController::class, 'home_maintenance'])->name('guests.maintenance');

/** Routes des utilisateurs visiteurs */
Route::prefix('')->as('guests.')->group(function () {

    Route::get('', [MainController::class, 'home'])->name('welcome');

    Route::get('/investisseurs', [MainController::class, 'investor'])->name('investor');

    /* A propos */
    Route::prefix('/a-propos')->group(function () {

        Route::get('/a-propos-de-la-decentralisation', [Maincontroller::class, 'decentralisation'])->name('decentralisation');

        Route::get('/a-propos-de-la-commune-estmono2', [Maincontroller::class, 'about'])->name('about');

        Route::get('notre-vision', [MainController::class, 'vision'])->name('vision');

        Route::get('notre-mission', [MainController::class, 'mission'])->name('mission');
    });

    /* commune */
    Route::prefix('/commune')->as('mairie.')->group(function () {

        /*lois organisationnelles */
        Route::get('/organisation', [Maincontroller::class, 'lois'])->name('lois');

        /*conseil municipal */
        Route::get('/conseil-municipal', [Maincontroller::class, 'municipal'])->name('municipal');

        /*opportunités d'affaires */
        Route::get('/opportunites-d-affaires', [MainController::class, 'opportunite'])->name('opportuniteAff');

        /*commision permanente */
        Route::get('/commission-permanente', [Maincontroller::class, 'commissions'])->name('commissions');

        Route::get('/statistiques', [Maincontroller::class, 'stats'])->name('stats');

        /*organigramme de la mairie */
        Route::get('/organigramme', [Maincontroller::class, 'organigramme'])->name('organigramme');

        /*Quartiers et cantons */
        Route::get('/cantons-et-quartiers', [Maincontroller::class, 'cantonQuartier'])->name('cantonQuartier');

        Route::get('/programme-des-activites', [Maincontroller::class, 'programme'])->name('programme');

        /*A la decouverte de ma commune */
        Route::prefix('/a-la-decouverte-de-la-commune')->as('decouverte.')->group(function () {

            Route::get('', [Maincontroller::class, 'decouverte'])->name('index');

            Route::get('/plages', [Maincontroller::class, 'plage'])->name('plage');

            Route::get('/ecoles-universités', [Maincontroller::class, 'ecole'])->name('ecoles');

            Route::get('/hôtels', [Maincontroller::class, 'hotel'])->name('hotel');

            Route::get('/marchés', [Maincontroller::class, 'market'])->name('market');

            Route::get('/cooperative', [Maincontroller::class, 'station'])->name('transport');

            Route::get('/lieux-de-cultes', [Maincontroller::class, 'culte'])->name('worship');

            Route::get('/centres-medicaux', [Maincontroller::class, 'hospital'])->name('hospital');

            Route::get('/sites-touristiques', [Maincontroller::class, 'site'])->name('touristicSite');
        });
    });

    /* index de la partie projets */
    Route::prefix('/projets')->as('projects.')->group(function () {

        Route::get('/plan-developpement-communal', [ProjectController::class, 'pdc'])->name('pdc');

        Route::prefix('/projets-realise')->group(function () {
           /* projet realise */
            Route::get('', [ProjectController::class, 'projetRealise'])->name('projetRealise');

            /* show de la partie projet realisé */
            Route::get('/{project}/details', [ProjectController::class, 'projetRealiseShow'])->name('projetRealiseShow');
        });

        Route::prefix('/projets-en-cours')->group(function () {
            /* projet en cour */
            Route::get('', [ProjectController::class, 'projetEnCour'])->name('projetEnCour');

            /* show de la partie projet en cour */
            Route::get('/{project}/details', [ProjectController::class, 'projetEnCourShow'])->name('projetEnCourShow');
        });


        /* poposer un projets */
        Route::get('/proposer-un-projet', [ProjectController::class, 'proposerIndex'])->name('proposerProjet');

        Route::prefix('/devenir-partenaire-sur-un-projet')->group(function () {
            /* devenir partenaire sur un projet */
            Route::get('', [ProjectController::class, 'devenirPartenaire'])->name('devenirPartenaire');

            /* show de la partie devenir partenaire sur un projet */
            Route::get('/{project}/details', [ProjectController::class, 'devenirPartenaireShow'])->name('devenirPartenaireShow');
        });
    });

    /* contact */
    Route::get('/contact', [Maincontroller::class, 'contact'])->name('contact');

    /* Galerie */
    Route::get('/galerie', [MainController::class, 'galerie'])->name('galerie');

    /* Bureau du citoyen */
    Route::prefix('/bureau-du-citoyen')->group(function () {

        Route::get('', [MainController::class, 'bureauDuCitoyen'])->name('bureauDuCitoyen');

        Route::get('/dans-ma-rue', [MainController::class, 'dansMaRue'])->name('dansMaRue');

        Route::get('/faq', [MainController::class, 'faq'])->name('faq');

        Route::get('/{category_question}/{question}', [MainController::class, 'faqSingleQuestion'])->name('faqSingleQuestion');

        Route::get('/{category_question}', [MainController::class, 'faqAllQuestions'])->name('faqAllQuestions');

        /* Conversation */
        Route::get('/typing/{messageVal}', [GuestsDiscussionController::class, 'typing'])->name('discussions.typing');

        Route::get('/demarrer-conversation', [MainController::class, 'startConversation'])->name('startConversation');

        Route::get('/demarrer-conservation', [MainController::class, 'initializeDiscussion'])->name('initializeDiscussion');

        Route::get('/quitter-conservation', [GuestsDiscussionController::class, 'leaveDiscussion'])->name('leaveDiscussion');

        Route::get('/conversation', [MainController::class, 'conversation'])->name('conversation');
    });

    Route::post('envoyer-message', [GuestsDiscussionController::class, 'sendMessageByClient'])->name('send.message');

    Route::post('send-information', [StreetController::class, 'informationsSendByGuests'])->name('dansMaRue.informationsSendByGuests');

    /* Nos services */
    Route::prefix('/nos-services')->as('services.')->group(function () {
        // Route::get('/demarches-administratives', [MainController::class, 'demarches'])->name('guests.services.demarches');

        Route::get('/etat-civil', [MainController::class, 'etatCivil'])->name('etatCivil');

        Route::get('/{civil_id}/download-processing', [MainController::class, 'download'])->name('etatCivil.download');

        Route::get('/bureau-executif', [MainController::class, 'bureauExecutif'])->name('bureauExecutif');

        Route::get('/education', [MainController::class, 'education'])->name('education');

        Route::get('/urbanisme', [MainController::class, 'urbanisme'])->name('urbanisme');

        Route::get('/sante', [MainController::class, 'sante'])->name('sante');

        Route::get('/culture', [GuestCultureController::class, 'culture'])->name('culture');

        Route::get('/securite', [MainController::class, 'securite'])->name('securite');

        Route::get('/environnement', [MainController::class, 'environnement'])->name('environnement');

        Route::get('/tourisme', [MainController::class, 'tourisme'])->name('tourisme');

        Route::get('/emplois', [MainController::class, 'emploi'])->name('emplois');

        Route::prefix('/social')->group(function () {
            Route::get('', [MainController:: class, 'social'])->name('social');

            Route::get('/handicapes', [MainController:: class, 'handicape'])->name('social.handicape');

            Route::get('/femmes', [MainController:: class, 'femme'])->name('social.femme');
        });

        Route::get('/jumelage', [Maincontroller::class, 'jumelageIndex'])->name('jumelage-index');

        Route::get('/jumelage/show', [Maincontroller::class, 'jumelageShow'])->name('jumelage-show');

        Route::get('/taxes', [MainController::class, 'taxe'])->name('taxes');

        Route::get('/finances', [MainController::class, 'finances'])->name('finances');

        Route::get('/marches-publics', [MainController::class, 'marchePublic'])->name('marchePublic');
    });

    /* Actualites */
    Route::prefix('/actualites')->as('actualites.')->group(function () {

        Route::prefix('/presse')->group(function () {
            Route::get('', [ActualiteController::class, 'index'])->name('index');

            Route::get('/{actualite}/details', [ActualiteController::class, 'show'])->name('show');
        });

        Route::prefix('/video')->group(function () {
            Route::get('', [ActualiteController::class, 'actuVideo'])->name('actuVideo');

            Route::get('/{actualite}/details', [ActualiteController::class, 'actuVideoShow'])->name('actuVideoShow');
        });
    });

    /* Annonces */
    Route::prefix('annonces/')->as('annonces.')->group(function () {
        Route::get('', [GuestsAnnonceController::class, 'index'])->name('index');

        Route::get('{annonce}/details', [GuestsAnnonceController::class, 'show'])->name('show');
    });

    /* Newsletter */
    Route::post('subscription', [MainController::class, 'subscribeToNewsletter'])->name('subscribeToNewsletter');
});



/* Administrateur */
Route::prefix('admin/')->as('admin.')->group(function () {
    Route::get('', [AdminMainController::class, 'dashboard'])->name('dashboard')->middleware('check.authenticated.admin');

    /* Bannière */
    Route::prefix('Bannières/')->middleware('check.authenticated.admin')->group(function () {
        Route::get('', [AdminMainController::class, 'banniere_index'])->name('banniere.index');

        Route::patch('update-processing/{picture}', [AdminMainController::class, 'banner_update'])->name('banner.update');

        Route::post('store-processing', [AdminMainController::class, 'banner_store'])->name('banner.store');

    });

    /* A Propos */
    Route::prefix('a-propos/')->middleware('check.authenticated.admin')->group(function () {
        Route::get('', [AboutController::class, 'index'])->name('about.index');

        // Route::post('store-processing', [AboutController::class, 'store'])->name('about.store');

        Route::patch('update-processing/{about}', [AboutController::class, 'update'])->name('about.update');
    });

    /* Projets */
    Route::prefix('projets/')->middleware('check.authenticated.admin')->group(function () {
        Route::get('', [AdminProjectController::class, 'index'])->name('projects.index');

        Route::get('ajout', [AdminProjectController::class, 'create'])->name('projects.create');

        Route::post('store-processing', [AdminProjectController::class, 'store'])->name('projects.store');

        Route::get('{project}/details', [AdminProjectController::class, 'show'])->name('projects.show');

        Route::get('{project}/edition', [AdminProjectController::class, 'edit'])->name('projects.edit');

        Route::patch('{project}/update-processing', [AdminProjectController::class, 'update'])->name('projects.update');

        Route::get('{project}/destroy-processing', [AdminProjectController::class, 'destroy'])->name('projects.destroy');
    });

    /* Type de projets */
    Route::prefix('type-projets/')->middleware('check.authenticated.admin')->group(function () {
        Route::get('', [ProjectTypeController::class, 'index'])->name('project-type.index');

        Route::get('{project_type}/details', [ProjectTypeController::class, 'show'])->name('project-type.show');

        Route::post('store-processing', [ProjectTypeController::class, 'store'])->name('project-type.store');

        Route::patch('{project_type}/update-processing', [ProjectTypeController::class, 'update'])->name('project-type.update');

        Route::get('{project_type}/destroy-processing', [ProjectTypeController::class, 'destroy'])->name('project-type.destroy');
    });

    /* Actualites */
    Route::prefix('actualites/')->middleware('check.authenticated.admin')->group(function () {
        Route::get('', [AdminActualiteController::class, 'index'])->name('actualites.index');

        Route::get('ajout', [AdminActualiteController::class, 'create'])->name('actualites.create');

        Route::post('store-processing', [AdminActualiteController::class, 'store'])->name('actualites.store');

        Route::get('{actualite}/details', [AdminActualiteController::class, 'show'])->name('actualites.show');

        Route::get('{actualite}/edition', [AdminActualiteController::class, 'edit'])->name('actualites.edit');

        Route::patch('{actualite}/update-processing', [AdminActualiteController::class, 'update'])->name('actualites.update');

        Route::get('{actualite}/destroy-processing', [AdminActualiteController::class, 'destroy'])->name('actualites.destroy');
    });

    /* Annonces */
    Route::prefix('annonces/')->middleware('check.authenticated.admin')->group(function() {
        Route::get('', [AnnonceController::class, 'index'])->name('annonces.index');

        Route::get('ajouter', [AnnonceController::class, 'create'])->name('annonces.create');

        Route::post('store-processing', [AnnonceController::class, 'store'])->name('annonces.store');

        Route::get('{annonce}/details', [AnnonceController::class, 'edit'])->name('annonces.edit');

        Route::patch('{annonce}/modification', [AnnonceController::class, 'update'])->name('annonces.update');

        Route::get('{annonce}/suppression', [AnnonceController::class, 'destroy'])->name('annonces.destroy');
    });

    Route::prefix('video/')->middleware('check.authenticated.admin')->group(function () {
        Route::get('', [AdminActuVideoController::class, 'index'])->name('actualites.videos.actuVideo');

        Route::get('{actuVideo}/details', [AdminActuVideoController::class, 'show'])->name('actualites.videos.actuVideo.show');

        Route::post('store-actu-video-processing', [AdminActuVideoController::class, 'store'])->name('actualites.videos.actuVideo.store');

        Route::patch('{actuVideo}/update-actu-video-processing', [AdminActuVideoController::class, 'update'])->name('actualites.videos.actuVideo.update');

        Route::get('{actuVideo}/destroy-actu-video-processing', [AdminActuVideoController::class, 'destroy'])->name('actualites.videos.actuVideo.destroy');
    });

    /* Mairie */
    Route::prefix('mairie/')->middleware('check.authenticated.admin')->group(function () {
        /* Conseil municipal */
        Route::prefix('conseil-municipal/')->group(function() {
            Route::get('', [MunicipalController::class, 'index'])->name('mairie.municipal.index');

            Route::post('store-member-processing', [MunicipalController::class, 'store'])->name('mairie.municipal.store');

            Route::get('{municipal}/details', [MunicipalController::class, 'show'])->name('mairie.municipal.show');

            Route::patch('{municipal}/update-member-processing', [MunicipalController::class, 'update'])->name('mairie.municipal.update');

            Route::get('{municipal}/destroy-member-processing', [MunicipalController::class, 'destroy'])->name('mairie.municipal.destroy');
        });

        Route::prefix('marches-publics/')->as('mairie.marches.')->group(function () {
            Route::get('', [MarcheController::class, 'index'])->name('index');

            Route::post('store-processing', [MarcheController::class, 'store'])->name('store');

            Route::patch('{marche}/update-processing', [MarcheController::class, 'update'])->name('update');

            Route::get('{marche}/destroy-processing', [MarcheController::class, 'destroy'])->name('destroy');

            Route::get('download-marches/{marche}', [MarcheController::class, 'download'])->name('download.downloadMarche');
        });

        Route::prefix('organigramme/')->group(function () {
            Route::get('', [AdminMainController::class, 'organigramme_index'])->name('mairie.organigramme.index');

            Route::patch('/{picture}/update-processing', [AdminMainController::class, 'organigramme_update'])->name('mairie.organigramme.update');
        });

        Route::prefix('etat-civil/')->group(function() {
            Route::get('', [EtatCivilController::class, 'index'])->name('mairie.civil.index');

            // Route::post('store-intro-processing', [EtatCivilController::class, 'intro_store'])->name('mairie.civil.store');

            Route::patch('/{presentation}/update-intro-processing', [EtatCivilController::class, 'intro_update'])->name('mairie.civil.update');

            Route::post('store-processing', [EtatCivilController::class, 'store'])->name('mairie.acte.store');

            Route::get('{civil}/edition', [EtatCivilController::class, 'edit'])->name('mairie.civil.edit');

            Route::patch('{civil}/update-processing', [EtatCivilController::class, 'update'])->name('mairie.acte.update');

             Route::get('{civil}/destroy-processing', [EtatCivilController::class, 'destroy'])->name('mairie.acte.destroy');

        });

        Route::prefix('education/')->group(function () {
            Route::get('', [EducationController::class, 'index'])->name('mairie.education.index');

            Route::post('store-processing', [EducationController::class, 'store'])->name('mairie.education.store');

            Route::patch('{education}/update-processing', [EducationController::class, 'update'])->name('mairie.education.update');

            Route::get('{education}/destroy-processing', [EducationController::class, 'destroy'])->name('mairie.education.destroy');
        });

        Route::prefix('culture/')->group(function () {
            Route::get('', [CultureController::class, 'index'])->name('mairie.culture.index');

            Route::post('store-processing', [CultureController::class, 'store'])->name('mairie.culture.store');

            Route::patch('{culture}/update-processing', [CultureController::class, 'update'])->name('mairie.culture.update');

            Route::get('{culture}/destroy-processing', [CultureController::class, 'destroy'])->name('mairie.culture.destroy');
        });

    });

    /* Mot Du Maire */
    Route::prefix('mot-du-maire/')->middleware('check.authenticated.admin')->group(function () {
        Route::get('', [MaireController::class, 'index'])->name('motDuMaire.index');

       // Route::post('store-processing', [MaireController::class, 'store'])->name('motDuMaire.store');

        Route::patch('update-processing/{maire}', [MaireController::class, 'update'])->name('motDuMaire.update');
    });


    /* Carte */
    Route::prefix('carte/')->middleware('check.authenticated.admin')->group(function () {
        Route::get('', [CarteController::class, 'index'])->name('carte.index');

        //Route::post('store-processing', [CarteController::class, 'store'])->name('carte.store');

        Route::patch('update-processing/{carte}', [CarteController::class, 'update'])->name('carte.update');
    });

    /* Dans Ma Rue */
    Route::prefix('dans-ma-rue/')->middleware('check.authenticated.admin')->group(function () {
        Route::get('', [StreetController::class, 'index'])->name('street.index');

        Route::get('information-confirmee', [StreetController::class, 'information_confirmed'])->name('street.information_confirmed');

        Route::get('{street}/details', [StreetController::class, 'show'])->name('street.show');

        Route::post('{street}/confirm', [StreetController::class, 'confirm_information'])->name('street.confirm_information');

        Route::post('add-number', [StreetController::class, 'storeAlertNumber'])->name('street.storeAlertNumber');

        Route::patch('{alert}/update-number', [StreetController::class, 'updateAlertNumber'])->name('street.updateAlertNumber');

        Route::get('{alert}/supprimer-numero', [StreetController::class, 'destroyAlertNumber'])->name('street.destroyAlertNumber');
    });


    /* Newsletter */
    Route::prefix('Newsletter')->middleware('check.authenticated.admin')->group(function () {
        Route::get('', [NewsletterController::class, 'index'])->name('newsletter.index');

        Route::get('/liste-des-abonnes', [NewsletterController::class, 'inscritToNewsletter'])->name('inscritToNewsletter');
    });

    /* Galerie */
    Route::prefix('galerie/')->middleware('check.authenticated.admin')->group(function () {
        Route::get('', [AdminMainController::class, 'galleries'])->name('galleries');

        Route::post('store-processing', [AdminMainController::class, 'store_gallery'])->name('store_gallery');

        Route::patch('{gallery}/update-processing', [AdminMainController::class, 'update_gallery'])->name('update_gallery');

        Route::get('{gallery}/destroy-processing', [AdminMainController::class, 'destroy_gallery'])->name('destroy_gallery');
    });

    /* Admin */

    Route::prefix('administrateurs/')->middleware('check.authenticated.admin')->group(function () {
        Route::get('', [UserController::class, 'admins'])->name('user.admins');

        Route::get('/inscription', [UserController::class, 'register_view'])->name('user.register_view');

        Route::post('/store-proccessing', [UserController::class, 'register'])->name('user.register');

        Route::get('mon-profil', [UserController::class, 'editConnectedUser'])->name('user.editConnectedUser');

        Route::patch('update-current-user', [UserController::class, 'updateConnectedUser'])->name('user.updateConnectedUser');

        Route::patch('update-current-user-password', [UserController::class, 'updateConnectedUserPassword'])->name('user.updateConnectedUserPassword');

        Route::get('{user}/details', [UserController::class, 'showUser'])->name('user.showUser');
    });

    /* Discussions */
    Route::prefix('discussions/')->middleware('check.authenticated.admin')->group(function () {
        Route::get('', [DiscussionController::class, 'listOfChannels'])->name('discussions.list');

        Route::get('typing/{messageVal}', [DiscussionController::class, 'typing'])->name('discussions.typing');

        Route::get('quitter-conversation', [DiscussionController::class, 'quitDiscussion'])->name('discussions.quit');

        Route::get('{discussion}/conversations', [DiscussionController::class, 'conversationByAdmin'])->name('conversationByAdmin');

        Route::post('send-conversation-message', [DiscussionController::class, 'sendMessageByAdmin']) ->name('sendMessageByAdmin');

        Route::get('lues', [DiscussionController::class, 'conversationNotClosedButReadIndex'])->name('conversationNotClosedButReadIndex');

        Route::get('fermees', [DiscussionController::class, 'conversationClosedIndex'])->name('conversationClosedIndex');

        Route::get('{discussion}/fermees', [DiscussionController::class, 'conversationClosedShow'])->name('conversationClosedShow');

        Route::get('expirees', [DiscussionController::class, 'conversationNotClosedButExpiredIndex'])->name('conversationNotClosedButExpiredIndex');

        Route::get('{discussion}/expirees', [DiscussionController::class, 'conversationNotClosedButExpiredShow'])->name('conversationNotClosedButExpiredShow');

        Route::get('{discussion}/expirees/fermer', [DiscussionController::class, 'closeExpiredDiscussion'])->name('closeExpiredDiscussion');
    });

    /* Foire aux questions */
    Route::prefix('questions/')->middleware('check.authenticated.admin')->group(function () {
        Route::get('', [QuestionController::class, 'index'])->name('questions.index');

        Route::get('{category_question}', [QuestionController::class, 'show'])->name('questions.show');

        Route::post('{category_question}/store-processing', [QuestionController::class, 'store'])->name('questions.store');

        Route::patch('{category_question}/{question}/update-processing', [QuestionController::class, 'update'])->name('questions.update');

        Route::get('{question}/destroy-processing', [QuestionController::class, 'destroy'])->name('questions.destroy');

        Route::prefix('categorie/')->group(function () {
            Route::post('store-processing', [CategoryQuestionController::class, 'store'])->name('questions.categories.index');

            Route::patch('{categoryQuestion}/update-processing', [CategoryQuestionController::class, 'update'])->name('questions.categories.update');

            Route::get('{categoryQuestion}/destroy-processing', [CategoryQuestionController::class, 'destroy'])->name('questions.categories.destroy');
        });
    });

    Route::get('login', [UserController::class, 'login_view'])->name('user.login_view');

    Route::post('login-processing', [UserController::class, 'login'])->name('user.login');

    Route::get('deconnexion', [UserController::class, 'logout'])->name(('user.logout'));

});


