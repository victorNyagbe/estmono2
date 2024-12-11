<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProjectType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectTypeController extends Controller
{

    public function index()
    {
        $project_types = ProjectType::all();

        $page = 'admin.projects';
        $page_item = 'admin.projects.type';

        return view('admin.project-types.index', compact('project_types', 'page', 'page_item'));
    }

    public function show(ProjectType $project_type)
    {
        $checkIfTypeExist = ProjectType::where('slug', $project_type->slug);

        if ($checkIfTypeExist->doesntExist()) {
            return redirect()->back()->with('error', 'Erreur!! Opération échouée. Type de projet invalide');
        }

        $page = 'admin.projects';
        $page_item = 'admin.projects.list';

        return view('admin.project-types.show', compact('project_type', 'page', 'page_item'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_type' => 'required|unique:project_types,title'
        ], [
            'project_type.required' => 'Veuillez renseigner le nom du type de projet',
            'project_type.unique' => 'Ce type de projet existe déjà'
        ]);

        $project_types = ProjectType::all();

        $availables = [];

        $types = ["indépendant", "education", "santé", "culture", "urbanisme", "environnement", "tourisme", "sécurité", "social", "emploi", "jumelage", "taxe"];

        if (count($project_types) > 0) {
            foreach ($project_types as $project_type) {

                $key = array_search($project_type->title, $types);

                if ($key !== false) {
                    unset($types[$key]);
                }
            }

            $availables = $types;
        } else {
            $availables = $types;
        }

        if (in_array($request->project_type, $availables)) {

            ProjectType::create([
                'title' => Str::lower($request->project_type),
                'slug' => Str::slug($request->project_type)
            ]);

        } else {
            return redirect()->back()->with('error', 'Erreur de type de projet. Le type doit être l\'un des types suivants : ' . implode(', ', $availables));
        }

        return redirect()->back()->with('success', 'Le type de projet a été enregistré avec succès');
    }

    public function update(Request $request, ProjectType $project_type)
    {
        $request->validate([
            'project_type' => 'required'
        ], [
            'project_type.required' => 'Veuillez renseigner le nom du type de projet'
        ]);

        $checkIfTypeExist = ProjectType::where('slug', $project_type->slug);

        $findTypeByRequest = ProjectType::where('title', $request->project_type);

        if ($checkIfTypeExist->doesntExist()) {
            return redirect()->back()->with('error', 'Erreur!! Opération échouée');
        }

        if ($project_type->id == 1) {
            return redirect()->back()->with('error', 'Erreur!! Opération de modification refusée');
        }

        if ($request->project_type != $project_type->title && $findTypeByRequest->exists()) {
            return redirect()->back()->with('error', 'Erreur!! Opération de modification refusée. Type déjà existant');
        }

        $availables = [];

        $types = ["education", "santé", "culture", "urbanisme", "environnement", "tourisme", "sécurité", "social", "emploi", "jumelage", "taxe"];

        $availables = $types;

        if (in_array($request->project_type, $availables)) {

            $project_type->update([
                'title' => Str::lower($request->project_type),
                'slug' => Str::slug($request->project_type)
            ]);

        } else {
            return redirect()->back()->with('error', 'Erreur de type de projet. Le type doit être l\'un des types suivants : ' . implode(', ', $availables));
        }

        return redirect()->back()->with('success', 'Le type de projet a été modifié avec succès');
    }

    public function destroy(ProjectType $project_type)
    {
        $checkIfTypeExist = ProjectType::where('slug', $project_type->slug);

        if ($checkIfTypeExist->doesntExist()) {
            return redirect()->back()->with('error', 'Erreur!! Opération échouée');
        }

        if ($project_type->id == 1) {
            return redirect()->back()->with('error', 'Erreur!! Opération de suppression refusée');
        }

        $projects = Project::where('id', $project_type->id)->get();

        foreach ($projects as $project) {
            $project->delete();
        }

        $project_type->delete();

        return redirect()->back()->with('success', 'Le type de projet a bien été supprimé ainsi que tous les projets liés à ce type de projet.');
    }
}
