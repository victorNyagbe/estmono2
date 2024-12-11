<?php

namespace App\Http\Controllers\Admin;

use App\Models\Education;
use Illuminate\Http\Request;
use App\Models\EducationType;
use App\Http\Controllers\Controller;

class EducationController extends Controller
{
    public function index()
    {
        $page = "admin.mairie";
        $page_item = "admin.education";

        $education_types = EducationType::all();

        $educations = Education::all();

        return view('admin.mairie.education.index', compact('page', 'page_item', 'education_types', 'educations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required|exists:education_types,id',
            'status' => 'required',
            'responsable' => 'sometimes',
            'contact' => 'sometimes'
        ], [
            'name.required' => 'Veuillez renseigner le nom de l\'établissement',
            "type.required" => "Veuillez sélectionner le type d'académie",
            "type.exists" => "Type d'académie invalide",
            "status.required" => "Veuillez renseigner le statut de l'établissement"
        ]);

        Education::create([
            "education_type_id" => $request->type,
            "name" => $request->name,
            "status" => $request->status,
            "responsable" => $request->responsable,
            "contact" => $request->contact
        ]);

        return redirect()->back()->with('success', "Etablissement enregistré avec succès");
    }

    public function update(Education $education, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required|exists:education_types,id',
            'status' => 'required',
            'responsable' => 'sometimes',
            'contact' => 'sometimes'
        ], [
            'name.required' => 'Veuillez renseigner le nom de l\'établissement',
            "type.required" => "Veuillez sélectionner le type d'académie",
            "type.exists" => "Type d'académie invalide",
            "status.required" => "Veuillez renseigner le statut de l'établissement"
        ]);

        $education->update([
            "education_type_id" => $request->type,
            "name" => $request->name,
            "status" => $request->status,
            "responsable" => $request->responsable,
            "contact" => $request->contact
        ]);

        return redirect()->back()->with('success', "Etablissement modifié avec succès");
    }

    public function destroy(Education $education)
    {
        $education->delete();

        return redirect()->back()->with("success", "Etablissement retiré avec succès");
    }
}
