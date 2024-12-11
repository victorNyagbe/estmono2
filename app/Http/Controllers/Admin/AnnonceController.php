<?php

namespace App\Http\Controllers\Admin;

use App\Models\Annonce;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AnnonceController extends Controller
{

    public function index()
    {
        $annonces = Annonce::where([
            ['expiration_date', '>', now()]
        ])->orderByDesc('expiration_date')->get();

        $page = 'admin.annonces';
        $page_item = '';

        return view('admin.annonces.index', compact('annonces', 'page', 'page_item'));
    }

    public function create()
    {
        $page = 'admin.annonces';
        $page_item = '';

        return view('admin.annonces.create', compact('page', 'page_item'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'expiration_date' => 'required',
            'expiration_hour' => 'required'
        ], [
            'title.required' => 'Le titre de l\'annonce est requis.',
            'description.required' => 'Le message de l\'annonce est requis',
            'expiration_date.required' => 'La date d\'expiration de l\'annonce est requise',
            'expiration_hour.required' => 'L\'heure d\'expiration de l\'annonce est requise'
        ]);

        if (!$this->validateDate($request->expiration_date)) {
            return redirect()->back()->with('error', 'Date d\'expiration invalide');
        }

        if (!$this->validateHour($request->expiration_hour)) {
            return redirect()->back()->with('error', 'Heure d\'expiration invalide');
        }

        $formExpirationDate = $request->expiration_date . ' ' . $request->expiration_hour . ':00';

        $expiration_date = date_create($formExpirationDate);

        if (request('image')) {
            if ($request->hasFile('image')) {
                if (in_array($request->file('image')->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'jfif', 'webp'])) {

                    Annonce::create([
                        'user_id' => session()->get('id'),
                        'title' => $request->title,
                        'slug' => time() . '-' . Str::slug($request->title),
                        'body' => $request->description,
                        'expiration_date' => $expiration_date,
                        'image' => request('image')->store('annonces', 'public')
                    ]);

                } else {
                    return redirect()->back()->with('error', 'Erreur! Fichier image invalide');
                }
            } else {
                return redirect()->back()->with('error', 'Erreur! Fichier choisi invalide');
            }
        } else {
            Annonce::create([
                'user_id' => session()->get('id'),
                'title' => $request->title,
                'slug' => time() . '-' . Str::slug($request->title),
                'body' => $request->description,
                'expiration_date' => $expiration_date
            ]);
        }

        return redirect()->back()->with('success', 'Annonce ajoutée avec succès');

    }

    public function edit(Annonce $annonce)
    {
        $page = 'admin.annonces';
        $page_item = '';
        return view('admin.annonces.edit', compact('annonce', 'page', 'page_item'));
    }

    public function update(Request $request, Annonce $annonce)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'expiration_date' => 'required',
            'expiration_hour' => 'required'
        ], [
            'title.required' => 'Le titre de l\'annonce est requis.',
            'description.required' => 'Le message de l\'annonce est requis',
            'expiration_date.required' => 'La date d\'expiration de l\'annonce est requise',
            'expiration_hour.required' => 'L\'heure d\'expiration de l\'annonce est requise'
        ]);

        if (!$this->validateDate($request->expiration_date)) {
            return redirect()->back()->with('error', 'Date d\'expiration invalide');
        }

        if (!$this->validateHour($request->expiration_hour)) {
            return redirect()->back()->with('error', 'Heure d\'expiration invalide');
        }

        $formExpirationDate = $request->expiration_date . ' ' . $request->expiration_hour . ':00';

        $expiration_date = date_create($formExpirationDate);

        $image = $annonce->image == "" ? "" : $annonce->image;

        if (request('image')) {
            if ($request->hasFile('image')) {
                if (in_array($request->file('image')->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'jfif', 'webp'])) {

                    $old_image = $image;

                    $annonce->update([
                        'user_id' => session()->get('id'),
                        'title' => $request->title,
                        'slug' => time() . '-' . Str::slug($request->title),
                        'body' => $request->description,
                        'expiration_date' => $expiration_date,
                        'image' => request('image')->store('annonces', 'public')
                    ]);

                    if ($old_image) {
                        if (Storage::disk('public')->exists($old_image)) {
                            File::delete('storage/app/public/' . $old_image);
                        }
                    }

                } else {
                    return redirect()->back()->with('error', 'Erreur! Fichier image invalide');
                }
            } else {
                return redirect()->back()->with('error', 'Erreur! Fichier choisi invalide');
            }
        } else {
            $annonce->update([
                'user_id' => session()->get('id'),
                'title' => $request->title,
                'slug' => time() . '-' . Str::slug($request->title),
                'body' => $request->description,
                'expiration_date' => $expiration_date
            ]);
        }
        return redirect()->route('admin.annonces.index')->with('success', 'Annonce modifiée avec succès');
    }

    public function destroy(Annonce $annonce)
    {
        $image = $annonce->image == "" ? "" : $annonce->image;

        $old_image = $image;

        if ($old_image) {
            if (Storage::disk('public')->exists($old_image)) {
                File::delete('storage/app/public/' . $old_image);
            }
        }

        $annonce->delete();

        return redirect()->back()->with('success', 'Annonce supprimée avec succès');
    }

    private function validateDate($date)
    {
        if (false === strtotime($date)) {
            return false;
        }

        list($year, $month, $day) = explode('-', $date);
        return checkdate($month, $day, $year);
    }

    private function validateHour($hour)
    {
        return preg_match("/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/", $hour);
    }
}
