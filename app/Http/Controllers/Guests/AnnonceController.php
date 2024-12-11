<?php

namespace App\Http\Controllers\Guests;

use App\Models\Annonce;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnnonceController extends Controller
{
    public function index()
    {
        $annonces = Annonce::orderByDesc('expiration_date')->get();
        $page = "actualite";

        return view('guests.annonces.index', compact('annonces', 'page'));
    }

    public function show(Annonce $annonce)
    {
        $page = "actualite";
        return view('guests.annonces.show', compact('annonce', 'page'));
    }
}
