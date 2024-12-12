<?php

namespace App\Http\Controllers\Guests;

use App\Http\Controllers\Controller;
use App\Models\Culture;
use App\Models\CultureType;
use Illuminate\Http\Request;

class CultureController extends Controller
{
    public function culture()
    {
        $page = 'mairie';

        $culture_publiques = Culture::where('culture_type_id', function ($query) {
            $query->select('id')
                  ->from('culture_types')
                  ->where('libelle', "Centre culturel public");
        })->get();

        $culture_privees = Culture::where('culture_type_id', function ($query) {
            $query->select('id')
                  ->from('culture_types')
                  ->where('libelle', "Centre culturel prive");
        })->get();



        return view('guests.services.culture', compact('page', 'culture_privees', 'culture_publiques'));
    }
}
