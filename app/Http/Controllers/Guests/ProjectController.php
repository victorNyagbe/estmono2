<?php

namespace App\Http\Controllers\Guests;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('maintenance');
    // }
    
       /* index de partie projets */

       public function index()
       {
            $projects = Project::latest()->get();

            $page = 'project';

           return view('guests.projects.index', compact('projects', 'page'));
       }

       /* show de partie projets */

       public function show(Project $project)
       {
            $check_project = Project::where('id', $project->id)->first();

            if ($check_project == null) {
                return redirect()->route('guests.projects.index');
            }

            $other_projects = Project::where([
                ['id', '<>', $project->id]
            ])->limit(5)->get()->shuffle();

            $page = 'project';

           return view('guests.projects.show', compact('project', 'other_projects', 'page'));
       }

       /* pdc */

       public function pdc()
       {
            $page = 'project';

           return view('guests.projects.pdc', compact('page'));
       }

       /* projet realise */

       public function projetRealise()
       {
           $projects = Project::where('status', 1)->latest()->get();

           $page = 'project';

           return view('guests.projects.projetRealise', compact('projects', 'page'));
       }

       /* show de partie projet realise*/

       public function projetRealiseShow(Project $project)
       {
            $check_project = Project::where('id', $project->id)->first();

            if ($check_project == null) {
                return redirect()->route('guests.projects.index');
            }

            $other_projects = Project::where([
                ['id', '<>', $project->id],
                ['status', 1]
            ])->limit(5)->get()->shuffle();

            $page = 'project';

           return view('guests.projects.projetRealiseShow', compact('project', 'other_projects', 'page'));
       }

       /* projet en cour */

       public function projetEnCour()
       {
           $projects = Project::latest()->get();

           $page = 'project';

           return view('guests.projects.projetEnCour', compact('projects', 'page'));
       }

       /* show de partie projet en cour*/

       public function projetEnCourShow(Project $project)
       {
            $check_project = Project::where('id', $project->id)->first();

            if ($check_project == null) {
                return redirect()->route('guests.projects.index');
            }

            $other_projects = Project::where([
                ['id', '<>', $project->id]
            ])->limit(5)->get()->shuffle();

            $page = 'project';

           return view('guests.projects.projetEnCourShow', compact('project', 'other_projects', 'page'));
       }

       /* Proposer un projet */

       public function proposerIndex()
       {
            $page = 'project';

           return view('guests.projects.proposerProjet', compact('page'));
       }

       /* devenir partenaire sur un projet */

       public function devenirPartenaire()
       {
           $projects = Project::where('to_be_partner', 1)->latest()->get();

           $page = 'project';

           return view('guests.projects.devenirPartenaire', compact('projects', 'page'));
       }

       /* show de partie devenir partenaire un projet */

       public function devenirPartenaireShow(Project $project)
       {
            $check_project = Project::where('id', $project->id)->first();

            if ($check_project == null) {
                return redirect()->route('guests.projects.index');
            }

            $other_projects = Project::where([
                ['id', '<>', $project->id],
                ['to_be_partner', 1]
            ])->limit(5)->get()->shuffle();

            $page = 'project';

           return view('guests.projects.devenirPartenaireShow', compact('project', 'other_projects', 'page'));
       }

}
