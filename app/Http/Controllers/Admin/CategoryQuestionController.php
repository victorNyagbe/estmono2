<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategoryQuestion;
use App\Http\Controllers\Controller;
use App\Models\Question;

class CategoryQuestionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:category_questions,name'
        ], [
            'name.required' => 'Veuillez renseigner le nom de la catégorie',
            'name.unique' => 'La catégorie que vous avez renseigné existe déjà'
        ]);

        CategoryQuestion::create([
            'name' => Str::ucfirst($request->name),
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->back()->with('success', 'La catégorie a été ajoutée avec succès');
    }

    public function update(CategoryQuestion $categoryQuestion, Request $request)
    {
        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Veuillez renseigner le nom de la catégorie',
        ]);

        $findCategoryQuestion = CategoryQuestion::where('slug', $categoryQuestion->slug);

        if ($findCategoryQuestion->doesntExist()) {
            return redirect()->back()->with('error', 'Opération échouée.');
        }

        $checkCategory = CategoryQuestion::where('name', Str::ucfirst($request->name));

        if ($request->name != $categoryQuestion->name && $checkCategory->exists()) {
            return redirect()->back()->with('error', 'Cette catégorie existe déjà');
        }

        $categoryQuestion->update([
            'name' => Str::ucfirst($request->name),
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->back()->with('success', 'La catégorie a été bien modifiée');
    }

    public function destroy(CategoryQuestion $categoryQuestion)
    {
        $findCategoryQuestion = CategoryQuestion::where('slug', $categoryQuestion->slug);

        if ($findCategoryQuestion->doesntExist()) {
            return redirect()->back()->with('error', 'Opération échouée.');
        }

        $questions = Question::where('category_question_id', $categoryQuestion->id)->get();

        foreach ($questions as $question)
        {
            $question->delete();
        }

        $categoryQuestion->delete();

        return redirect()->back()->with('success', 'La catégorie a été supprimée avec succès');
    }
}
