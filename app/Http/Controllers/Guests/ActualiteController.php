<?php

namespace App\Http\Controllers\Guests;

use App\Models\Actualite;
use App\Models\ActuVideo;
use App\Models\VideoType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActualiteController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('maintenance');
    // }

    public function index()
    {
        $actualites = Actualite::latest()->get();

        $page = 'actualite';

        return view('guests.actualites.index', compact('actualites', 'page'));
    }

    public function show(Actualite $actualite)
    {
        $check_actualite = Actualite::where('id', $actualite->id)->first();

        if ($check_actualite == null) {
            return redirect()->route('guests.actualites.index');
        }

        $other_actualites = Actualite::where([
            ['id', '<>', $actualite->id]
        ])->limit(3)->get()->shuffle();

        $page = 'actualite';

        return view('guests.actualites.show', compact('actualite', 'other_actualites', 'page'));
    }

    public function actuVideo()
    {

        $page = 'actualite';

        $videos = ActuVideo::latest()->get();

        $types = VideoType::all();

        return view('guests.actualites.actuVideo', compact('videos','types', 'page'));
    }

    public function actuVideoShow(ActuVideo $actualite)
    {
        $check_actualite = ActuVideo::where('id', $actualite->id)->first();

        if ($check_actualite == null) {
            return redirect()->route('guests.actualites.actuVideo');
        }

        $other_actualites = ActuVideo::where([
            ['id', '<>', $actualite->id]
        ])->get()->shuffle()->take(3);

        $page = 'actualite';

        return view('guests.actualites.actuVideoShow', compact('actualite', 'other_actualites', 'page'));
    }
}
