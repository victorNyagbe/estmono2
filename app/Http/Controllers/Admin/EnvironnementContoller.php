<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EnvironnementRequest;
use App\Models\Environnement;
use App\Models\EnvironnementType;
use Illuminate\Http\Request;

class EnvironnementContoller extends Controller
{
    public function index()
    {
        $page = "admin.mairie";
        $page_item = "admin.environnement";

        $environnement_types = EnvironnementType::all();

        $environnements = Environnement::all();

        return view('admin.mairie.environnement.index', compact('page', 'page_item', 'environnement_types', 'environnements'));
    }

    public function store(EnvironnementRequest $request)
    {


        $fields = $request->validated();

        Environnement::create($fields);

        return redirect()->back()->with('success', "Culture enregistré avec succès");
    }

    public function update(Environnement $environnement, EnvironnementRequest $request)
    {
        $fields = $request->validated();

        $environnement->update($fields);

        return redirect()->back()->with('success', "Culture modifié avec succès");
    }

    public function destroy(Environnement $environnement)
    {
        $environnement->delete();

        return redirect()->back()->with("success", "Culture retiré avec succès");
    }
}
