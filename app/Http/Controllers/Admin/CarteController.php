<?php

namespace App\Http\Controllers\Admin;

use App\Models\Carte;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CarteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */

    public function index()
    {
        $carte = Carte::where('id', 1)->first();

        $page = 'admin.carte';
        $page_item = '';

        return view('admin.carte', compact('carte', 'page', 'page_item'));
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
        ], [
            'image.required' => 'Veuillez choisir l\'image',
            'image.file' => 'Le fichier choisi est invalide',
            'image.image' => 'Le fichier choisi est invalide',
            'image.mimes' => 'Veuillez choisir une image valide',
        ]);

        Carte::create([
            'image' => request('image')->store('carte-geographique', 'public'),
        ]);

        return redirect()->back()->with('success', 'Opération réussie!');
    }


       /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carte  $carte
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Carte $carte)
    {
        $verify_carte = Carte::where('id', $carte->id)->first();

        if ($verify_carte == null) {
            return redirect()->back()->with('error', 'Opération échouée');
        }

        if (request('image')) {
            if ($request->hasFile('image')) {
                if (in_array($request->file('image')->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'jfif', 'webp'])) {

                    $old_image = $carte->image;

                    $carte->update([
                        'image' => request('image')->store('carte-geographique', 'public')
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

        return redirect()->back()->with('success', 'Opération réussie!');
    }
}
