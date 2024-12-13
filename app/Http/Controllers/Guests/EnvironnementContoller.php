<?php

namespace App\Http\Controllers\Guests;

use App\Http\Controllers\Controller;
use App\Models\Environnement;
use Illuminate\Http\Request;

class EnvironnementContoller extends Controller
{
    public function environnement()
    {
        $page = 'mairie';

        $environnement_publiques = Environnement::where('environnement_type_id', function ($query) {
            $query->select('id')
                  ->from('environnement_types')
                  ->where('libelle', "Service environnemental public");
        })->get();

        $environnement_privees = Environnement::where('environnement_type_id', function ($query) {
            $query->select('id')
                  ->from('environnement_types')
                  ->where('libelle', "Service environnemental prive");
        })->get();



        return view('guests.services.environnement', compact('page', 'environnement_privees', 'environnement_publiques'));



    }
}
