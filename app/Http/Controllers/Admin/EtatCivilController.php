<?php

namespace App\Http\Controllers\Admin;

use App\Models\Civil;
use App\Models\FichierCivil;
use App\Models\Presentation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class EtatCivilController extends Controller
{
    public function index()
    {
        $presentations = Presentation::where('id', 1)->first();
        $civils = Civil::all();
        // $fichiers = FichierCivil::where('civil_id', $civils->id)->get();
        $page = 'admin.civil';
        $page_item = '';
        return view('admin.mairie.civil.index', compact('presentations','civils','page', 'page_item'));
    }

    // public function intro_store(Request $request)
    // {
    //     $request->validate([
    //         'intro' => 'required',
    //     ], [
    //         'intro.required' => 'Veuillez renseigner votre texte de présentation',
    //     ]);

    //     Presentation::create([
    //         'text' => $request->intro
    //     ]);

    //     return redirect()->back()->with('success', 'Enregistrement de la présentation effectuée avec succès');
    // }

    public function intro_update(Request $request, Presentation $presentation)
    {
        $verify_intro = Presentation::where('id', $presentation->id)->first();

        if ($verify_intro == null) {
            return redirect()->back()->with('error', 'Opération échouée');
        }

        $request->validate([
            'intro' => 'required',
        ], [
            'intro.required' => 'Veuillez renseigner votre texte de présentation',
        ]);

        $presentation->update([
            'text' => $request->intro
        ]);

        return redirect()->back()->with('success', 'Modification de la présentation effectuée avec succès');
    }

    public function store(Request $request,)
    {
        $request->validate([
            'title' => 'required',
            // 'description' => 'required',
            'file' => 'file|mimes:pdf,docx'
        ], [
            'title.required' => 'Veuillez renseigner le titre de l\'acte civique',
            // 'description.required' => 'Veuillez renseigner la description',
            'file.file' => 'Le fichier choisi est invalide',
            'fichier.mimes' => 'Veuillez choisir un document valide'
        ]);

        $verify_exist_title = Civil::where('title', $request->title)->first();

        if ($verify_exist_title != null) {
            return redirect()->back()->with('error', 'Vous ne pouvez pas renseigner ce titre. Ce titre est déjà existant!');
        }


        $civils = Civil::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        if (request('file')) {
            if ($request->hasFile('file')) {

                $pdf_name = $request->file('file')->getClientOriginalName();
                FichierCivil::create([
                    'civil_id' => $civils->id,
                    'file' => request('file')->storeAs('fichier_civil', $pdf_name, 'public')
                ]);
            }
        }
        return redirect()->back()->with('success', 'Opération d\'ajout de l\'acte réussie');
    }

    public function edit(Civil $civil)
    {
        $verify_civil = Civil::where('id', $civil->id)->first();
        $fichiers = FichierCivil::where('civil_id', $civil->id)->first();

        if ($verify_civil == null) {
            abort('404');
        }

        $page = 'admin.civil';
        $page_item = '';

        return view('admin.mairie.civil.edit-civil', compact('civil', 'fichiers', 'page', 'page_item'));
    }

    public function update(Request $request, Civil $civil)
    {
        $verify_civil = Civil::where('id', $civil->id)->first();

        $fichiers = FichierCivil::where('civil_id', $civil->id)->first();

        if ($verify_civil == null) {
            return redirect()->back()->with('error', 'Opération échouée');
        }

        $request->validate([
            'title' => 'required',
            // 'description' => 'required',
            'file' => 'file|mimes:pdf'
        ], [
            'title.required' => 'Veuillez renseigner le titre de l\'acte civique',
            // 'description.required' => 'Veuillez renseigner la description',
            'file.file' => 'Le fichier choisi est invalide',
            'fichier.mimes' => 'Veuillez choisir un document valide'
        ]);

        // if (request('title')) {

        //     $verify_exist_title = Civil::where('title', $request->title)->first();

        //     if ($verify_exist_title != null) {
        //         return redirect()->back()->with('error', 'Modification échouée. Ce titre est déjà existant!');
        //     }

        // }

        $civils = $civil->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        if (request('file')) {
            if ($request->hasFile('file')) {
                if (in_array($request->file('file')->getClientOriginalExtension(), ['pdf', 'docx'])) {

                    $pdf_name = $request->file('file')->getClientOriginalName();

                    if ($civil->fichier_civils->first() != null) {

                        $old_pdf = $fichiers->file;

                        $fichiers->update([
                            'file' => request('file')->storeAs('fichier_civil', $pdf_name, 'public')
                        ]);

                        if (Storage::disk('public')->exists($old_pdf)) {
                            File::delete('storage/app/public/' . $old_pdf);
                        }

                    } else {
                        FichierCivil::create([
                            'civil_id' => $civil->id,
                            'file' => request('file')->storeAs('fichier_civil', $pdf_name, 'public')
                        ]);
                    }

                } else {
                    return redirect()->back()->with('error', 'Erreur! Fichier pdf invalide');
                }
            } else {
                return redirect()->back()->with('error', 'Erreur! Fichier choisi invalide');
            }
        }

        return redirect()->back()->with('success', 'Opération d\'ajout de l\'acte réussie');
    }

    public function destroy(Civil $civil)
    {
        $verify_civil = Civil::where('id', $civil->id)->first();

        // $fichiers = FichierCivil::where('civil_id', $civil->id)->first();

        if ($verify_civil == null) {
            abort('404');
        }

        // $old_pdf = $fichiers->file;

        $civil->delete();

        // $fichiers->delete();

        // if (Storage::disk('public')->exists($old_pdf)) {
        //     File::delete('storage/app/public/' . $old_pdf);
        // }

        return redirect()->back()->with('success', 'Opération de suppression réussie');
    }

}
