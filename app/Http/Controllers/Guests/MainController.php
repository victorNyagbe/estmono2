<?php

namespace App\Http\Controllers\Guests;

use Carbon\Carbon;
use App\Models\Pays;
use App\Models\About;
use App\Models\Carte;
use App\Models\Civil;
use App\Models\Maire;
use App\Models\Marche;
use App\Models\Annonce;
use App\Models\Gallery;
use App\Models\Picture;
use App\Models\Project;
use App\Models\Question;
use App\Models\Actualite;
use App\Models\ActuVideo;
use App\Models\Education;
use App\Models\Municipal;
use App\Models\Discussion;
use App\Models\Newsletter;
use Illuminate\Support\Str;
use App\Models\Conversation;
use App\Models\FichierCivil;
use App\Models\Presentation;
use Illuminate\Http\Request;
use App\Models\MunicipalType;
use App\Models\CategoryQuestion;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;

class MainController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('maintenance')->except('home_maintenance');
    // }

    // public function home_maintenance()
    // {
    //     return view('guests.maintenance');
    // }

    public function home()
    {
        $page = 'welcome';

        $about = About::where('id', 1)->first();

        $maire = Maire::where('id', 1)->first();

        $actualite_presses = Actualite::latest()->limit(3)->get();

        $actualite_videos = ActuVideo::latest()->limit(3)->get();

        $actualites_array = [];

        $actualites_presses = $actualite_presses->toArray();

        $actualites_videos = $actualite_videos->toArray();

        // $actualites_array[] = $actualite_presses;

        // $actualites_array[] = $actualite_videos;

        // $actualites_collection = collect($actualites_array);

        $actualites = $actualite_presses->concat($actualite_videos);

        $actualites = $actualites->sortByDesc('created_at');

        $actualites = $actualites->take(3)->all();

        $projects = Project::latest()->limit(3)->get();

        $municipals = Municipal::all();

        $cartes = Carte::where('id', 1)->first();

        $galleries = Gallery::all();

        $banners = Picture::where('type', 'banner')->get();

        $annonces = $this->checkCookiesAnnonces();

        return view('guests.home', compact('banners', 'about', 'maire', 'actualites', 'projects', 'municipals', 'cartes', 'galleries', 'page'));
    }

    private function checkCookiesAnnonces()
    {
        $annonces = Annonce::where([
            ['expiration_date', '>', now()]
        ])->get();

        if (count($annonces) <= 0) {
            return $annonces;
        } else {

            $oneAnnonceCookieName = "__Annonce_Adn__";

            $allAnnonceCookieName = "__allAnnonce_Adn__";

            if (isset($_COOKIE[$oneAnnonceCookieName]) && isset($_COOKIE[$allAnnonceCookieName])) {

                $oneAnnonceCookieValue = $_COOKIE[$oneAnnonceCookieName];

                $allAnnonceCookieValue = $_COOKIE[$allAnnonceCookieName];

                $getOneAnnonceExpiration = Annonce::where([
                    ['slug', $oneAnnonceCookieValue]
                ])->value('expiration_date');

                $getAllAnnonceExpiration = Annonce::where([
                    ['slug', $allAnnonceCookieValue]
                ])->value('expiration_date');

                if ($getOneAnnonceExpiration > $getAllAnnonceExpiration) {

                    return $this->__createCookies__($getOneAnnonceExpiration, $oneAnnonceCookieName, $allAnnonceCookieName);

                } else {

                    return $this->__createCookies__($getAllAnnonceExpiration, $oneAnnonceCookieName, $allAnnonceCookieName);

                }

            } elseif (isset($_COOKIE[$oneAnnonceCookieName])) {

                $oneAnnonceCookieValue = $_COOKIE[$oneAnnonceCookieName];

                $getOneAnnonceExpiration = Annonce::where([
                    ['slug', $oneAnnonceCookieValue]
                ])->value('expiration_date');

                return $this->__createCookies__($getOneAnnonceExpiration, $oneAnnonceCookieName, $allAnnonceCookieName);

            } elseif (isset($_COOKIE[$allAnnonceCookieName])) {

                $allAnnonceCookieValue = $_COOKIE[$allAnnonceCookieName];

                $getAllAnnonceExpiration = Annonce::where([
                    ['slug', $allAnnonceCookieValue]
                ])->value('expiration_date');

                return $this->__createCookies__($getAllAnnonceExpiration, $oneAnnonceCookieName, $allAnnonceCookieName);

            } else {

                return $this->__createCookies__(now(), $oneAnnonceCookieName, $allAnnonceCookieName);

            }
        }
    }

    private function __createCookies__($comparativeDate, $cookieOneAnnonceName, $cookieAllAnnonceName)
    {
        if ($comparativeDate == null) {
            $comparativeDate = "1980-01-01 00:00:00";
            $comparativeDate = strtotime($comparativeDate);
            $comparativeDate = date('Y-m-d h:i:s', $comparativeDate);
        } else {
            $comparativeDate = $comparativeDate;
        }

        $annonces = Annonce::where([
            ['expiration_date', '>', $comparativeDate]
        ])->get();

        if (count($annonces) <= 0) {
            return $annonces;
        }

        if (count($annonces) == 1) {

            $getCookieValue = Annonce::where([
                ['expiration_date', '>', $comparativeDate]
            ])->value('slug');

            $getExpirationDate = Annonce::where([
                ['expiration_date', '>', $comparativeDate]
            ])->value('expiration_date');

            $getExpirationDate = Carbon::parse($getExpirationDate)->format('Y-m-d H:i:s');

            $getExpirationDate = strtotime($getExpirationDate);

            setcookie($cookieOneAnnonceName, $getCookieValue, $getExpirationDate, "/");

            session()->put('oneAnnonce', true);
            session()->put('annonceValue', 1);

            $annonces = Annonce::where([
                ['expiration_date', '>', $comparativeDate]
            ])->first();

            return $annonces;

        } else {

            $getCookieValue = Annonce::where([
                ['expiration_date', '>', $comparativeDate]
            ])->orderByDesc('expiration_date')->first();

            $getExpirationDate = $getCookieValue->expiration_date;

            $getExpirationDate = Carbon::parse($getExpirationDate)->format('Y-m-d H:i:s');

            $getExpirationDate = strtotime($getExpirationDate);

            setcookie($cookieAllAnnonceName, $getCookieValue->slug, $getExpirationDate, "/");

            session()->put('someAnnonce', true);
            session()->put('annonceValue', count($annonces));

            return $annonces;

        }
    }

    public function welcome()
    {
        $about = About::where('id', 1)->first();

        $maire = Maire::where('id', 1)->first();

        $actualites = Actualite::latest()->limit(3)->get();

        $projects = Project::latest()->limit(3)->get();

        $municipals = Municipal::all();

        $cartes = Carte::where('id', 1)->first();

        $galleries = Gallery::all();

        $banners = Picture::where('type', 'banner')->get();

        $page = 'welcome';

        return view('guests.welcome', compact('about', 'maire', 'actualites', 'banners', 'projects', 'municipals', 'cartes', 'galleries', 'page'));
    }

    public function about()
    {
        $about = About::where('id', 1)->first();

        $page = 'about';

        return view('guests.about', compact('about', 'page'));
    }

    public function decentralisation()
    {
        $about = About::where('id', 1)->first();

        $page = 'about';

        return view('guests.decentralisation', compact('about', 'page'));
    }

    public function vision()
    {
        $page = 'about';

        return view('guests.vision', compact('page'));
    }

    public function mission()
    {
        $page = 'about';

        return view('guests.mission', compact('page'));
    }

    public function investor()
    {
        $page = 'welcome';

        return view('guests.investor', compact('page'));
    }

    /* Mairie */

    public function municipal()
    {
        // $municipals = Municipal::all();

        $maire = Municipal::where('municipal_type_id', '1')->first();

        $executifs = Municipal::where('municipal_type_id', '2')->get();

        $conseillers = Municipal::where('municipal_type_id', '3')->get();

        $types = MunicipalType::all();

        $page = 'commune';

        return view('guests.mairie.municipal', compact('maire', 'executifs', 'conseillers', 'types', 'page'));
    }

    public function programme()
    {
        $page = 'commune';

        return view('guests.mairie.programme', compact('page'));
    }

    public function stats()
    {
        $page = "commune";
        return view('guests.mairie.stats', compact('page'));
    }

    /*organigramme */
    public function organigramme()
    {
        $organigrams = Picture::where('type', 'organigramme')->first();

        $page = 'commune';

        return view('guests.mairie.organigramme', compact('organigrams', 'page'));
    }

     public function lois()
    {
        $page = 'commune';

        return view('guests.mairie.lois', compact('page'));
    }

     public function commissions()
    {
        $page = 'commune';

        return view('guests.mairie.commissions', compact('page'));
    }

     public function cantonQuartier()
    {
        $page = 'commune';

        return view('guests.mairie.cantonQuartier', compact('page'));
    }

     public function decouverte()
    {
        $page = 'commune';

        return view('guests.mairie.decouverte', compact('page'));
    }

    /* Start decouverte */

        public function plage()
        {
            $page = 'commune';

            return view('guests.mairie.decouverte.plage', compact('page'));
        }

        public function ecole()
        {
            $page = 'commune';

            return view('guests.mairie.decouverte.ecoles', compact('page'));
        }

        public function hotel()
        {
            $page = 'commune';

            return view('guests.mairie.decouverte.hotel', compact('page'));
        }

        public function market()
        {
            $page = 'commune';

            return view('guests.mairie.decouverte.market', compact('page'));
        }

        public function station()
        {
            $page = 'commune';

            return view('guests.mairie.decouverte.transport', compact('page'));
        }

        public function culte()
        {
            $page = 'commune';

            return view('guests.mairie.decouverte.worship', compact('page'));
        }

        public function hospital()
        {
            $page = 'commune';

            return view('guests.mairie.decouverte.hospital', compact('page'));
        }

        public function site()
        {
            $page = 'commune';

            return view('guests.mairie.decouverte.touristicSite', compact('page'));
        }

     /* End decouverte */



    /*contact */
    public function contact()
    {
        $page = 'contact';

        return view('guests.contact', compact('page'));
    }

    /* Nos services */

    // public function demarches()
    // {
    //     return view('guests.services.demarches');
    // }

    public function etatCivil()
    {

        $civils = Civil::all();

        $presentations = Presentation::where('id', 1)->first();

        $page = 'mairie';

        return view('guests.services.etatCivil', compact('presentations', 'civils', 'page'));
    }

    public function bureauExecutif()
    {
        $maire = Municipal::where('municipal_type_id', '1')->first();

        $executifs = Municipal::where('municipal_type_id', '2')->get();

        $conseillers = Municipal::where('municipal_type_id', '3')->get();

        $types = MunicipalType::all();

        $page = 'mairie';

        return view('guests.services.bureauExecutif', compact('maire', 'executifs', 'conseillers', 'types', 'page'));
    }

    public function education()
    {
        $page = 'mairie';

        $academie_publiques = Education::where('education_type_id', 1)->get();

        $academie_privees = Education::where('education_type_id', 2)->get();

        return view('guests.services.education', compact('page', 'academie_publiques', 'academie_privees'));
    }

    public function urbanisme()
    {
        $page = 'mairie';

        return view('guests.services.urbanisme', compact('page'));
    }

    public function sante()
    {
        $page = 'mairie';

        return view('guests.services.sante', compact('page'));
    }



    public function securite()
    {
        $page = 'mairie';

        return view('guests.services.securite', compact('page'));
    }

    public function environnement()
    {
        $page = 'mairie';

        return view('guests.services.environnement', compact('page'));
    }

    public function tourisme()
    {
        $page = 'mairie';

        return view('guests.services.tourisme', compact('page'));
    }


    public function emploi()
    {
        $page = 'mairie';

        return view('guests.services.emplois', compact('page'));
    }

    /*social */

    public function social()
    {
        $page = 'mairie';

        return view('guests.services.social.index', compact('page'));
    }

    public function handicape()
    {
        $page = 'mairie';

        return view('guests.services.social.handicape', compact('page'));
    }

    public function femme()
    {
        $page = 'mairie';

        return view('guests.services.social.femme', compact('page'));
    }

    /* end social */

    /*suite services */

    public function jumelageIndex()
    {
        $page = 'mairie';

        $countries = Pays::all();

        return view('guests.mairie.jumelage-index', compact('page', 'countries'));
    }

    public function jumelageShow()
    {
        $page = 'mairie';

        return view('guests.mairie.jumelage-show', compact('page'));
    }

    public function opportunite()
    {
        $page = 'commune';

        return view('guests.services.opportuniteAff', compact('page'));
    }

    public function taxe()
    {
        $page = 'mairie';

        return view('guests.services.taxes', compact('page'));
    }

    public function finances()
    {
        $page = 'mairie';

        return view('guests.services.finances', compact('page'));
    }

    public function marchePublic()
    {
        $page = 'mairie';
        $marches = Marche::latest()->get();
        return view('guests.services.marchePublic', compact('page', 'marches'));
    }


    /* Galerie */
    public function galerie()
    {
        $galleries = Gallery::all();

        $page = 'gallery';

        return view('guests.galerie', compact('galleries', 'page'));
    }

    /* Dans ma rue */
    public function dansMaRue()
    {
        $page = 'bureau';

        return view('guests.dansMaRue', compact('page'));
    }

    /* Bureau du citoyen */
    public function bureauDuCitoyen()
    {
        $page = 'bureau';

        return view('guests.bureauDuCitoyen', compact('page'));
    }

    public function faq()
    {
        $category_questions = CategoryQuestion::all();

        $page = 'bureau';

        return view('guests.faq', compact('category_questions', 'page'));
    }

    public function faqSingleQuestion(CategoryQuestion $category_question, Question $question)
    {
        $findCategoryQuestion = CategoryQuestion::where('slug', $category_question->slug);

        if ($findCategoryQuestion->doesntExist()) {
            abort(404);
        }

        $findQuestion = Question::where('slug', $question->slug);

        if ($findQuestion->doesntExist()) {
            abort(404);
        }

        $page = 'bureau';

        return view('guests.faqSingleQuestion', compact('category_question', 'question', 'page'));
    }

    public function faqAllQuestions(CategoryQuestion $category_question)
    {
        $findCategoryQuestion = CategoryQuestion::where('slug', $category_question->slug);

        if ($findCategoryQuestion->doesntExist()) {
            abort(404);
        }

        $questions = Question::where('category_question_id', $category_question->id)->get();

        $page = 'bureau';

        return view('guests.faqAllQuestions', compact('category_question', 'questions', 'page'));
    }

    /* Newsletter */
    public function subscribeToNewsletter(Request $request)
    {
        $request->validate([
            'email' => 'required|email:rfc,dns|unique:newsletters,email'
        ], [
            'email.required' => 'Veuillez saisir votre email',
            'email.email' => 'email invalide',
            'email.unique' => 'Cet email existe déjà'
        ]);

        Newsletter::create([
            'email' => $request->email
        ]);

        return redirect()->back()->with('success', 'Inscription réussie');
    }

    public function startConversation()
    {
        dd("Done");
        $cookie_name = "tahc_live";

        if (isset($_COOKIE[$cookie_name])) {

            $discussion = Discussion::where('creator', $_COOKIE[$cookie_name])->first();

            if ($discussion != null && $discussion->status == 0) {
                return $this->accessConversation($discussion);
            } else {
                setcookie($cookie_name, '', time() - (3600), "/");
                return view('guests.startConversation');
            }
        }

        $page = 'bureau';

        return view('guests.startConversation', compact('page'));
    }

    public function initializeDiscussion(Request $request)
    {
        dd("Not Done");
        $getCustomId = random_int(10000, 9999999);

        $getCreator = bin2hex(random_bytes(10));

        $checkIfCustomIdAlreadyExist = Discussion::where('custom_id', $getCustomId)->first();

        while ($checkIfCustomIdAlreadyExist != null) {
            $getCustomId = random_int(10000, 9999999);

            $checkIfCustomIdAlreadyExist = Discussion::where('custom_id', $getCustomId)->first();
        }

        $discussion = Discussion::create([
            'custom_id' => $getCustomId,
            'creator' => $getCreator
        ]);

        $cookie_name = "tahc_live"; //création du nom cookies

        $cookie_value = $getCreator; //assignation de valeur

        setcookie($cookie_name, $cookie_value, time() + (7200), "/");

        $page = 'bureau';

        return redirect()->route('guests.conversation');
    }

    public function conversation()
    {
        $cookie_name = "tahc_live";

        if (isset($_COOKIE[$cookie_name])) {
            $checkIfDiscussionExist = Discussion::where('creator', $_COOKIE[$cookie_name])->first();

            if ($checkIfDiscussionExist == null) {
                setcookie($cookie_name, '', time() - (3600), "/");
                return redirect()->route('guests.startConversation');
            }

            if ($checkIfDiscussionExist->status) {
                setcookie($cookie_name, '', time() - (3600), "/");
                return redirect()->route('guests.startConversation');
            }

            return $this->accessConversation($checkIfDiscussionExist);
        } else {
            setcookie($cookie_name, '', time() - (3600), "/");
            return redirect()->route('guests.startConversation');
        }
    }

    private function accessConversation(Discussion $discussion)
    {
        $conversations = Conversation::where('discussion_id', $discussion->id)->get();

        $page = 'bureau';

        return view('guests.conversation' , compact('conversations', 'page'));
    }

    public function download(Request $request, $civil_id)
    {

        $fichier = FichierCivil::where('civil_id', $civil_id)->first();

        $pdf_name = Str::substr($fichier->file, 14, 60);

        return response()->download('storage/app/public/'. $fichier->file, $pdf_name);

    }
}
