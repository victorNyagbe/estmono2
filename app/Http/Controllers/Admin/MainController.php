<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{

    public function dashboard()
    {
        $page = 'admin.dashboard';
        $page_item = '';

        return view('admin.dashboard', compact('page', 'page_item'));
    }

    public function organigramme_index()
    {
        $organigramme = Picture::where([
            ['id', '<>', null],
            ['type', 'organigramme']
        ])->first();

        $page = 'admin.mairie';
        $page_item = 'admin.organigramme';

        return view('admin.organigramme', compact('organigramme', 'page', 'page_item'));
    }

    public function organigramme_update(Request $request, Picture $picture)
    {
        $verify_picture = Picture::where([
            ['id', $picture->id],
            ['type', 'organigramme']
        ])->first();

        if ($verify_picture == null) {
            return redirect()->back()->with('error', 'Opération échouée');
        }

        $request->validate([
            'image' => 'required|file|image|mimes:png,jpg,jpeg,jfif,webp'
        ], [
            'image.required' => 'Veuillez choisir l\'image',
            'image.file' => 'Le fichier choisi est invalide',
            'image.image' => 'Le fichier choisi est invalide',
            'image.mimes' => 'Veuillez choisir une image valide'
        ]);

        $old_image = $picture->image;

        $picture->update([
            'image' => request('image')->store('picture/organigramme', 'public'),
            'type' => 'organigramme'
        ]);

        if (Storage::disk('public')->exists($old_image)) {
            File::delete('storage/app/public/' . $old_image);
        }

        return redirect()->back()->with('success', 'Opération réussie');
    }

    public function galleries()
    {
        $galleries = Gallery::latest()->get();

        $page = 'admin.gallery';
        $page_item = '';

        return view('admin.gallery', compact('galleries', 'page', 'page_item'));
    }

    public function store_gallery(Request $request)
    {
        if($request->has('images')) {
            if ($request->hasFile('images')) {

                $images = Collection::wrap($request->file('images'));

                $images->each(function ($image) {

                    if (in_array($image->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'jfif', 'webp'])) {
                        Gallery::create([
                            'image' => $image->store('gallery', 'public')
                        ]);
                    }
                });
                return redirect()->back()->with('success', 'Opération réussie');
            } else {
                return redirect()->back()->with('success', 'Opération d\'insertion d\'images échouée');
            }
        } else {
            return redirect()->back()->with('error', 'Veuillez sélectionner vos images');
        }
    }

    public function update_gallery(Request $request, Gallery $gallery)
    {
        $verify_gallery = Gallery::where('id', $gallery->id)->first();

        if ($verify_gallery == null) {
            return redirect()->back()->with('error', 'Opération de modification échouée');
        }

        $request->validate([
            'image' => 'required|file|image|mimes:png,jpg,jpeg,jfif,webp'
        ], [
            'image.required' => 'Veuillez renseigner l\'image',
            'image.file' => 'Fichier invalide',
            'image.image' => 'Fichier invalide',
            'image.mimes' => 'Fichier incorrect. Veuillez prendre le bon format'
        ]);

        $old_image = $gallery->image;

        $gallery->update([
            'image' => request('image')->store('gallery', 'public')
        ]);

        if ($old_image) {
            if (Storage::disk('public')->exists($old_image)) {
                File::delete('storage/app/public/' . $old_image);
            }
        }

        return redirect()->back()->with('suceess', 'La modification a été faite avec succès');

    }

    public function banniere_index()
    {

        $banners = Picture::where([
            ['id', '<>', null],
            ['type', 'banner']
        ])->get();

        $page = 'admin.banner';
        $page_item = '';

        return view('admin.banniere', compact('banners', 'page', 'page_item'));
    }

    public function banner_store(Request $request)
    {
        $request->validate([
            'image' => 'required|file|image|mimes:png,jpg,jpeg,jfif,webp'
        ], [
            'image.required' => 'Veuillez choisir l\'image',
            'image.file' => 'Le fichier choisi est invalide',
            'image.image' => 'Le fichier choisi est invalide',
            'image.mimes' => 'Veuillez choisir une image valide'
        ]);

        Picture::create([
            'image' => request('image')->store('picture/banner', 'public'),
            'type' => 'banner'
        ]);
        return redirect()->back()->with('success', 'Enregistrement effectué');
    }

    public function banner_update(Request $request, Picture $picture)
    {
        $verify_banner = Picture::where([
            ['id', $picture->id],
            ['type', "banner"]
        ])->first();

        if($verify_banner == null) {
            return redirect()->back()->with('error', 'Opération échoué');
        }

        if (request('image')) {
            if($request->hasFile('image')) {
                if (in_array($request->file('image')->getClientOriginalExtension(), ['png', 'jpeg', 'jfif', 'webp', 'jpg'])) {

                    $old_image = $verify_banner->image;

                    $verify_banner->update([
                        'image' => request('image')->store('picture/banner', 'public')
                    ]);

                    if (Storage::disk('public')->exists($old_image)) {
                        File::delete('storage/app/public/' . $old_image);
                    }

                } else {
                    return redirect()->back()->with('error', 'Erreur. Veuillez choisir une image valide');
                }
            } else {
                return redirect()->back()->with('error', 'Erreur. Veuillez choisir une image valide');
            }
        }

        $verify_banner->update([
            'description' => $request->description
        ]);

        return redirect()->back()->with('success', 'Opération de modification réussie');
    }

    public function destroy_gallery(Gallery $gallery)
    {
        $verify_gallery = Gallery::where('id', $gallery->id)->first();

        if ($verify_gallery == null) {
            return redirect()->back()->with('error', 'Opération de suppression échouée');
        }

        $old_image = $gallery->image;

        $gallery->delete();

        if (Storage::disk('public')->exists($old_image)) {
            File::delete('storage/app/public/' . $old_image);
        }

        return redirect()->back()->with('success', 'Opération de suppression réussie');

        // $old_image = $gallery->image;

        // $gallery->update([
        //     'image' => request('image')->store('', 'gallery'),
        //     'type' => 'banner'
        // ]);

        // if (Storage::disk('public')->exists($old_image)) {
        //     File::delete('storage/app/public/' . $old_image);
        // }

        // return redirect()->back()->with('success', 'Opération réussie');
    }
}
