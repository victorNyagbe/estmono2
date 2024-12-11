<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $about = About::where('id', 1)->first();

        $page = 'admin.about';
        $page_item = '';

        return view('admin.about', compact('about', 'page', 'page_item'));
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
            'text' => 'required'
        ], [
            'image.required' => 'Veuillez choisir l\'image',
            'image.file' => 'Le fichier choisi est invalide',
            'image.image' => 'Le fichier choisi est invalide',
            'image.mimes' => 'Veuillez choisir une image valide',
            'text.required' => 'Veuillez renseigner le texte'
        ]);

        About::create([
            'image' => request('image')->store('about', 'public'),
            'subtitle' => Str::substr($request->descriptionText, 0, 500),
            'text' => $request->text
        ]);

        return redirect()->back()->with('success', 'Opération réussie!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\REdirectResponse
     */
    public function update(Request $request, About $about)
    {
        $verify_about = About::where('id', $about->id)->first();

        if ($verify_about == null) {
            return redirect()->back()->with('error', 'Opération échouée');
        }

        $request->validate([
            'text' => 'required'
        ], [
            'text.required' => 'Veuillez renseigner le texte'
        ]);

        if (request('image')) {
            if ($request->hasFile('image')) {
                if (in_array($request->file('image')->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'jfif', 'webp'])) {

                    $old_image = $about->image;

                    $about->update([
                        'image' => request('image')->store('about', 'public')
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

        $about->update([
            'subtitle' => Str::substr($request->descriptionText, 0, 500),
            'text' => $request->text
        ]);

        return redirect()->back()->with('success', 'Opération réussie!');
    }
}
