<?php

namespace App\Http\Controllers\Admin;

use App\Enums\AboutTypes;
use App\Http\Controllers\Controller;
use App\Http\Requests\AboutCommuneRequest;
use App\Http\Requests\AboutRequest;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AboutCommuneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $about = About::where('type', AboutTypes::Commune)->first();

        $page = 'admin.about';
        $page_item = '';

        return view('admin.about.commune', compact('about', 'page', 'page_item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AboutCommuneRequest $request, About $about)
    {
        $verify_about = About::where('id', $about->id)->first();
        $fields = $request->validated(
    );
   if($verify_about != null && $verify_about->image != null){
    $oldImage = $verify_about->image;
   }
   $image = $request->hasFile('image') ? $request->file('image')->store('about', 'public') : $image = null;
    if($fields['commune']){
        About::updateOrCreate([
            // $verify_about,
            'type' => $about->type,
            // $oldImage

        ],[
            'image' => $image,
            'type' => AboutTypes::Commune,
            'subtitle' => Str::substr($request->descriptionText, 0, 500),
            'text' => $fields['commune']
        ]);
    }        

        return redirect()->back()->with('success', 'Opération réussie!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\REdirectResponse
     */
    public function update(AboutRequest $request, About $about)
    {
        $verify_about = About::where('id', $about->id)->first();

        if ($verify_about == null) {
            return redirect()->back()->with('error', 'Opération échouée');
        }

        $request->validated();

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
            'text' => $request->text,
            'type' => $about->type
        ]);

        return redirect()->back()->with('success', 'Opération réussie!');
    } 
}
