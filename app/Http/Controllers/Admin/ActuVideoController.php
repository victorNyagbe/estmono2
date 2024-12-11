<?php

namespace App\Http\Controllers\Admin;

use App\Models\ActuVideo;
use App\Models\VideoType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ActuVideoController extends Controller
{
    public function index()
    {

        $page = 'admin.actualites';
        $page_item = 'actualites.videos';

        $types = VideoType::all();
        $youtubes = ActuVideo::where('video_type_id', '2')->get();
        $locals = ActuVideo::where('video_type_id', '1')->get();

        return view('admin.actualites.videos.actuVideo', compact('types', 'youtubes', 'locals', 'page', 'page_item'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'file|image|mimes:png,jpg,jpeg,jfif,webp',
            'video' => 'file|mimes:mp4,mkv,ogg'
        ], [
            'title.required' => 'Veuillez renseigner le titre',
            'image.file' => 'Le fichier choisi est invalide',
            'image.image' => 'Le fichier choisi est invalide',
            'image.mimes' => 'Veuillez choisir une image valide',
            'video.file' => 'Le fichier choisi est invalide',
            'video.mimes' => 'Veuillez choisir une video valide'
        ]);

        if (isset($request->type))
        {
            if ($request->type == 1)
            {
                if ($request->image == null || $request->video == null)
                {
                    return redirect()->back()->with('error', 'Veuiller renseigner tous les champs');
                }
                else
                {
                    ActuVideo::create([
                        'titre' => $request->title,
                        'poster' => request('image')->store('poster', 'public'),
                        'video' => request('video')->store('actuVideo', 'public'),
                        'video_type_id' => $request->type
                    ]);

                    return redirect()->back()->with('success', 'La video a été enregistée avec succès');
                }
            }
            else if ($request->type == 2)
            {
                if ($request->url == null)
                {
                    return redirect()->back()->with('error', 'Veuiller saisir le lien');
                }
                else
                {
                    ActuVideo::create([
                        'titre' => $request->title,
                        'video_type_id' => $request->type,
                        'lien' => Str::substr($request->url, 17)
                    ]);

                    return redirect()->back()->with('success', 'La video youtube a été enregistée avec succès');
                }
            }
            else
            {
                return redirect()->back()->with('error', 'Option video invalide');
            }
        }
        else
        {
            return redirect()->back()->with('error', 'Veuiller choisir le type de la vidéo');
        }
    }

    public function show(ActuVideo $actuVideo)
    {
        $types = VideoType::where('id', $actuVideo->video_type_id)->first();
        $video = ActuVideo::where('id', $actuVideo->id)->first();

        if ($video == null) {
            abort('404');
        }

        $page = 'admin.actualites';
        $page_item = 'actualites.videos';


        return view('admin.actualites.videos.edit-actuVideo', compact('types', 'video', 'page', 'page_item'));
    }

    public function update(Request $request, ActuVideo $actuVideo)
    {
        $verify_video = ActuVideo::where('id', $actuVideo->id)->first();

        if ($verify_video == null) {
            return redirect()->back()->with('error', 'Opération échouée');
        }
        else if($actuVideo->video_type_id == 2)
        {
            $request->validate([
            'title' => 'required',
            ], [
                'title.required' => 'Veuillez renseigner le titre',
            ]);

            $actuVideo->update([
                'titre' => $request->title,
                'lien' => Str::substr($request->url, 17)
            ]);

            return redirect()->back()->with('success', 'Opération de modification réussie!');

        }
        else if($actuVideo->video_type_id == 1)
        {
            $request->validate([
            'title' => 'required',
            'image' => 'file|image|mimes:png,jpg,jpeg,jfif,webp',
            'video' => 'file|mimes:mp4,mkv,ogg'
            ], [
                'title.required' => 'Veuillez renseigner le titre',
                'image.file' => 'Le fichier choisi est invalide',
                'image.image' => 'Le fichier choisi est invalide',
                'image.mimes' => 'Veuillez choisir une image valide',
                'video.file' => 'Le fichier choisi est invalide',
                'video.mimes' => 'Veuillez choisir une video valide'
            ]);

            if (request('image'))
            {
                if ($request->hasFile('image'))
                {
                    if (in_array($request->file('image')->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'jfif', 'webp']))
                    {

                        $old_image = $actuVideo->image;

                        $actuVideo->update([
                            'poster' => request('image')->store('poster', 'public')
                        ]);

                        if (Storage::disk('public')->exists($old_image)) {
                            File::delete('storage/app/public/' . $old_image);
                        }

                    } else
                    {
                        return redirect()->back()->with('error', 'Erreur! Fichier image invalide');
                    }
                }
                else
                {
                    return redirect()->back()->with('error', 'Erreur! Fichier choisi invalide');
                }

                $actuVideo->update([
                    'titre' => $request->title,
                    'poster' => request('image')->store('poster', 'public'),
                ]);
            }

            if (request('video'))
            {
                if ($request->hasFile('video'))
                {
                    if (in_array($request->file('video')->getClientOriginalExtension(), ['mp4', 'mkv', 'ogg']))
                    {

                        $old_video = $actuVideo->video;

                        $actuVideo->update([
                            'video' => request('video')->store('actuVideo', 'public')
                        ]);

                        if (Storage::disk('public')->exists($old_video)) {
                            File::delete('storage/app/public/' . $old_video);
                        }

                    }
                    else
                    {
                        return redirect()->back()->with('error', 'Erreur! Fichier video invalide');
                    }
                }
                else
                {
                    return redirect()->back()->with('error', 'Erreur! Fichier choisi invalide');
                }

                $actuVideo->update([
                    'titre' => $request->title,
                    'video' => request('video')->store('actuVideo', 'public')
                 ]);
            }

                $actuVideo->update([
                    'titre' => $request->title,
                 ]);

            return redirect()->back()->with('success', 'Opération de modification réussie!');
        }
    }

    public function destroy(ActuVideo $actuVideo)
    {
        $verify_video = ActuVideo::where('id', $actuVideo->id)->first();

        if ($verify_video == null) {
            return redirect()->back()->with('error', 'Opération échouée');
        }

        $old_video = $actuVideo->video;

        $actuVideo->delete();

        if (Storage::disk('public')->exists($old_video)) {
            File::delete('storage/app/public/' . $old_video);
        }

        return redirect()->back()->with('success', 'Opération de suppression réussie!');
    }
}
