<?php

namespace App\Http\Controllers\Admin;

use App\Models\Actualite;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ActualiteController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $actualites = Actualite::latest()->get();

        $page = 'admin.actualites';
        $page_item = '';

        return view('admin.actualites.index', compact('actualites', 'page', 'page_item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $page = 'admin.actualites';
        $page_item = '';

        return view('admin.actualites.create', compact('page', 'page_item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|file|image|mimes:png,jpg,jpeg,jfif,webp',
            'title' => 'required',
            'description' => 'required'
        ], [
            'image.required' => 'Veuillez choisir l\'image',
            'image.file' => 'Le fichier choisi est invalide',
            'image.image' => 'Le fichier choisi est invalide',
            'image.mimes' => 'Veuillez choisir une image valide',
            'title.required' => 'Veuillez renseigner le titre',
            'description.required' => 'Veuillez renseigner le corps de l\'actualité'
        ]);

        Actualite::create([
            'image' => request('image')->store('actualites', 'public'),
            'title' => $request->title,
            'subtitle' => Str::substr($request->descriptionText, 0, 70),
            'text' => $request->description
        ]);

        return redirect()->route('admin.actualites.index')->with('success', 'L\'actualité a été ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Actualite  $actualite
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Actualite $actualite)
    {
        $verify_actu = Actualite::where('id', $actualite->id)->first();

        if ($verify_actu == null) {
            abort('404');
        }

        $page = 'admin.actualites';
        $page_item = '';

        return view('admin.actualites.show', compact('actualite', 'page', 'page_item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Actualite  $actualite
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Actualite $actualite)
    {
        $verify_actu = Actualite::where('id', $actualite->id)->first();

        if ($verify_actu == null) {
            abort('404');
        }

        $page = 'admin.actualites';
        $page_item = '';

        return view('admin.actualites.edit', compact('actualite', 'page', 'page_item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Actualite  $actualite
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Actualite $actualite)
    {
        $verify_actu = Actualite::where('id', $actualite->id)->first();

        if ($verify_actu == null) {
            return redirect()->back()->with('error', 'Opération échouée');
        }

        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ], [
            'title.required' => 'Veuillez renseigner le titre',
            'description.required' => 'Veuillez renseigner le corps de l\'actualité'
        ]);

        if (request('image')) {
            if ($request->hasFile('image')) {
                if (in_array($request->file('image')->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'jfif', 'webp'])) {

                    $old_image = $actualite->image;

                    $actualite->update([
                        'image' => request('image')->store('actualites', 'public')
                    ]);

                    if (Storage::disk('public')->exists($old_image)) {
                        File::delete('storage/app/public/' . $old_image);
                    }

                } else {
                    return redirect()->back()->with('error', 'Erreur! Fichier image invalide');
                }
            } else {
                return redirect()->back()->with('error', 'Erreur! Fichier choisi invalide');
            }
        }

        $actualite->update([
            'title' => $request->title,
            'subtitle' => Str::substr($request->descriptionText, 0, 70),
            'text' => $request->description
        ]);

        return redirect()->back()->with('success', 'Opération de modification réussie!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actualite  $actualite
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Actualite $actualite)
    {
        $verify_actu = Actualite::where('id', $actualite->id)->first();

        if ($verify_actu == null) {
            abort('404');
        }

        $old_image = $actualite->image;

        $actualite->delete();

        if (Storage::disk('public')->exists($old_image)) {
            File::delete('storage/app/public/' . $old_image);
        }

        return redirect()->back()->with('success', 'Opération de suppression réussie');
    }
}
