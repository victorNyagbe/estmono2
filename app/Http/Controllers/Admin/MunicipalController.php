<?php

namespace App\Http\Controllers\Admin;

use App\Models\Municipal;
use Illuminate\Http\Request;
use App\Models\MunicipalType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MunicipalController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $municipals = Municipal::all();

        $types = MunicipalType::all();

        $page = 'admin.mairie';
        $page_item = 'admin.municipal';

        return view('admin.mairie.municipal', compact('municipals', 'types', 'page', 'page_item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|exists:municipal_types,id',
            'image' => 'required|file|image|mimes:png,jpg,jpeg,jfif,webp',
            'lastname' => 'required',
            'firstname' => 'required',
            // 'occupation' => 'required'
        ], [
            'type.required' => 'Veuillez choisir le titre du membre',
            'type.exists' => 'Votre titre est invalide',
            'image.required' => 'Veuillez choisir l\'image',
            'image.file' => 'Le fichier choisi est invalide',
            'image.image' => 'Le fichier choisi est invalide',
            'image.mimes' => 'Veuillez choisir une image valide',
            'lastname.required' => 'Veuillez renseigner le nom du membre',
            'firstname.required' => 'Veuillez renseigner le(s) prénom(s) du membre',
            // 'occupation.required' => 'Veuillez renseigner le poste du membre'
        ]);

        // $verify_exist_maire = Municipal::where('municipal_type_id', 1)->first();

        // if ($verify_exist_maire != null) {
        //     return redirect()->back()->with('error', 'vous ne pouvez pas renseigner un nouveau maire. Maire déjà existant!');
        // }

        Municipal::create([
            'municipal_type_id' => $request->type,
            'image' => request('image')->store('municipal', 'public'),
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'occupation' => $request->occupation,
            'contact' => $request->phone_number,
            'facebook' => $request->facebook,
            'whatsapp' => $request->whatsapp,
            'linkedin' => $request->linkedin,
            'twitter' => $request->twitter
        ]);

        return redirect()->back()->with('success', 'Opération d\'ajout de membre réussie');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Municipal  $municipal
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Municipal $municipal)
    {
        $verify_municipal = Municipal::where('id', $municipal->id)->first();
        $types = MunicipalType::all();

        if ($verify_municipal == null) {
            abort('404');
        }

        $page = 'admin.mairie';
        $page_item = 'admin.municipal';

        return view('admin.mairie.edit-municipal', compact('municipal', 'types', 'page', 'page_item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Municipal  $municipal
     * @return \Illuminate\Http\Response
     */
    // public function edit(Municipal $municipal)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Municipal  $municipal
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Municipal $municipal)
    {

        $verify_municipal = Municipal::where('id', $municipal->id)->first();

        if ($verify_municipal == null) {
            return redirect()->back()->with('error', 'Opération échouée');
        }

        $request->validate([
            'type' => 'required|exists:municipal_types,id',
            'lastname' => 'required',
            'firstname' => 'required',
            'occupation' => 'required'
        ], [
            'type.required' => 'Veuillez choisir le titre du membre',
            'type.exists' => 'Votre titre est invalide',
            'lastname.required' => 'Veuillez renseigner le nom du membre',
            'firstname.required' => 'Veuillez renseigner le(s) prénom(s) du membre',
            'occupation.required' => 'Veuillez renseigner le poste du membre'
        ]);

        $verify_exist_maire1 = Municipal::where('municipal_type_id', 1)->first();


        if (intval($request->type) == 1 && $municipal->municipal_type_id != intval($request->type)) {
            if ($verify_exist_maire1 != null) {
                return redirect()->back()->with('error', 'Modification échouée. Opération non autorisée');
            }
        }

        if ($municipal->municipal_type_id == 1 && intval($request->type) != 1) {
            return redirect()->back()->with('error', 'Modification échouée. Opération non autorisée');
        }

        if (request('image')) {
            if ($request->hasFile('image')) {
                if (in_array($request->file('image')->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'jfif', 'webp'])) {

                    $old_image = $municipal->image;

                    $municipal->update([
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

        $municipal->update([
            'municipal_type_id' => $request->type,
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'occupation' => $request->occupation,
            'contact' => $request->phone_number,
            'facebook' => $request->facebook,
            'whatsapp' => $request->whatsapp,
            'linkedin' => $request->linkedin,
            'twitter' => $request->twitter
        ]);

        return redirect()->back()->with('success', 'Opération de modification réussie!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Municipal  $municipal
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Municipal $municipal)
    {
        $verify_municipal = Municipal::where('id', $municipal->id)->first();

        if ($verify_municipal == null) {
            return redirect()->back()->with('error', 'Opération échouée');
        }

        $old_image = $municipal->image;

        $municipal->delete();

        if (Storage::disk('public')->exists($old_image)) {
            File::delete('storage/app/public/' . $old_image);
        }

        return redirect()->back()->with('success', 'Opération de suppression réussie!');
    }
}
