<?php

namespace App\Http\Controllers\Admin;

use App\Models\Marche;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MarcheController extends Controller
{
    public function index()
    {
        $page = "admin.mairie";
        $page_item = "admin.marche";
        $marches = Marche::orderByDesc('created_at')->get();
        return view('admin.mairie.marches.index', compact('page', 'page_item', 'marches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'archiveDate' => 'required|date',
            'marcheTitle' => 'required',
            'marcheFile' => 'required|file|mimes:pdf'
        ], [
            // 'marcheDate.required' => 'La date de l\'marche est requise',
            // 'marcheDate.date' => 'La date renseignée est incorrecte',
            'marcheTitle.required' => 'Le titre du marche est requis',
            'marcheFile.required' => 'Le fichier du marche est requis',
            'marcheFile.file' => 'Le fichier est invalide',
            'marcheFile.mimes' => 'Uploader un fichier d\'extension PDF. Merci',
        ]);

        Marche::create([
            'title' => $request->marcheTitle,
            // 'archive_date' => $request->archiveDate,
            // 'archive_type_id' => $archiveType->id,
            'file' => request('marcheFile')->store('marches', 'public')
        ]);

        return redirect()->back()->with('success', 'Marché public ajouté avec succès');
    }

    public function update(Request $request, Marche $marche)
    {
        $request->validate([
            // 'archiveDate' => 'required|date',
            'marcheTitle' => 'required'
        ], [
            // 'marcheDate.required' => 'La date de l\'marche est requise',
            // 'marcheDate.date' => 'La date renseignée est incorrecte',
            'marcheTitle.required' => 'Le titre du marché est requis',
        ]);

        if (request('marcheFile')) {
            if ($request->hasFile('marcheFile')) {
                if (in_array($request->file('marcheFile')->getClientOriginalExtension(), ['pdf'])) {

                    $old_file = $marche->file;

                    $marche->update([
                        'file' => request('marcheFile')->store('marches', 'public')
                    ]);

                    if (Storage::disk('public')->exists($old_file)) {
                        File::delete('storage/app/public/' . $old_file);
                    }

                } else {
                    return redirect()->back()->with('error', 'Erreur! Fichier PDF invalide');
                }
            } else {
                return redirect()->back()->with('error', 'Erreur! Fichier choisi invalide');
            }
        }

        $marche->update([
            'title' => $request->marcheTitle,
            // 'marche_date' => $request->marcheDate,
            // 'marche_type_id' => $marcheType->id
        ]);

        return redirect()->back()->with('success', 'Marché modifié avec suuccès');
    }

    public function destroy(Marche $marche)
    {
        $verify_marche = Marche::where('id', $marche->id)->first();

        if ($verify_marche == null) {
            abort('404');
        }

        $old_file = $marche->file;

        $marche->delete();

        if (Storage::disk('public')->exists($old_file)) {
            File::delete('storage/app/public/' . $old_file);
        }

        return redirect()->back()->with('success', 'Opération de suppression réussie');
    }

    public function download(Marche $marche)
    {
        return response()->download('storage/app/public/'. Marche::where('id', $marche->id)->value('file'), $marche->title . '.' . "pdf");
    }
}
