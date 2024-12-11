<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\ProjectType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $projects = Project::latest()->get();

        $page = 'admin.projects';
        $page_item = 'admin.projects.list';

        return view('admin.projects.index', compact('projects', 'page', 'page_item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $project_types = ProjectType::all();

        $page = 'admin.projects';
        $page_item = 'admin.projects.list';

        return view('admin.projects.create', compact('project_types', 'page', 'page_item'));
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
            'description' => 'required',
            'project_type' => 'required|exists:project_types,id'
        ], [
            'image.required' => 'Veuillez choisir l\'image',
            'image.file' => 'Le fichier choisi est invalide',
            'image.image' => 'Le fichier choisi est invalide',
            'image.mimes' => 'Veuillez choisir une image valide',
            'title.required' => 'Veuillez renseigner le titre',
            'description.required' => 'Veuillez renseigner le corps du projet',
            'project_type.required' => 'Veuillez sélectionner un type de projet',
            'project_type.exists' => 'Le type de projet selectionné est invalide'
        ]);

        $toBePartner = 0;

        if ($request->toBePartner != null && $request->toBePartner != "on") {
            return redirect()->back()->with('error', 'Opération échouée. Une erreur s\'est produite.');
        } else {
            if ($request->toBePartner == null) {
                $toBePartner = 0;
            } else {
                $toBePartner = 1;
            }
        }

        Project::create([
            'project_type_id' => $request->project_type,
            'image' => request('image')->store('projects', 'public'),
            'title' => $request->title,
            'subtitle' => Str::substr($request->descriptionText, 0, 70),
            'text' => $request->description,
            'to_be_partner' => $toBePartner
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Le projet a été ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Project $project)
    {
        $verify_project = Project::where('id', $project->id)->first();

        if ($verify_project == null) {
            abort('404');
        }

        $page = 'admin.projects';
        $page_item = 'admin.projects.list';

        return view('admin.projects.show', compact('project', 'page', 'page_item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Project $project)
    {
        $verify_project = Project::where('id', $project->id)->first();

        if ($verify_project == null) {
            abort('404');
        }

        $project_types = ProjectType::all();

        $page = 'admin.projects';
        $page_item = 'admin.projects.list';

        return view('admin.projects.edit', compact('project', 'project_types', 'page', 'page_item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Project $project)
    {
        $verify_project = Project::where('id', $project->id)->first();

        if ($verify_project == null) {
            return redirect()->back()->with('error', 'Opération échouée');
        }

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'project_type' => 'required|exists:project_types,id'
        ], [
            'title.required' => 'Veuillez renseigner le titre',
            'description.required' => 'Veuillez renseigner le corps du projet',
            'project_type.required' => 'Veuillez sélectionner un type de projet',
            'project_type.exists' => 'Le type de projet selectionné est invalide'
        ]);

        if ($request->status != 0 && $request->status != 1) {
            return redirect()->back()->with('error', 'Opération échouée. Le statut choisi est invalide');
        }

        $toBePartner = 0;

        if ($request->toBePartner != null && $request->toBePartner != "on") {
            return redirect()->back()->with('error', 'Opération échouée. Une erreur s\'est produite.');
        } else {
            if ($request->toBePartner == null) {
                $toBePartner = 0;
            } else {
                $toBePartner = 1;
            }
        }

        if (request('image')) {
            if ($request->hasFile('image')) {
                if (in_array($request->file('image')->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'jfif', 'webp'])) {

                    $old_image = $project->image;

                    $project->update([
                        'image' => request('image')->store('projects', 'public')
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

        $project->update([
            'title' => $request->title,
            'subtitle' => Str::substr($request->descriptionText, 0, 70),
            'text' => $request->description,
            'status' => $request->status,
            'to_be_partner' => $toBePartner,
            'project_type_id' => $request->project_type,
        ]);

        return redirect()->back()->with('success', 'Opération de modification réussie!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Project $project)
    {
        $verify_project = Project::where('id', $project->id)->first();

        if ($verify_project == null) {
            abort('404');
        }

        $old_image = $project->image;

        $project->delete();

        if (Storage::disk('public')->exists($old_image)) {
            File::delete('storage/app/public/' . $old_image);
        }

        return redirect()->back()->with('success', 'Opération de suppression réussie');
    }
}
