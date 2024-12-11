<?php

namespace App\Http\Controllers\Admin;

use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategoryQuestion;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    public function index()
    {
        $categories = CategoryQuestion::all();

        $page = 'admin.questions';
        $page_item = '';

        return view('admin.questions.index', compact('categories', 'page', 'page_item'));
    }

    public function store(CategoryQuestion $category_question, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required'
        ], [
            'title.required' => 'Veuillez renseigner le titre de la question',
            'text.required' => 'Veuillez renseigner le texte de la question'
        ]);

        $findCategoryQuestion = CategoryQuestion::where('slug', $category_question->slug);

        if ($findCategoryQuestion->doesntExist()) {
            return redirect()->back()->with('error', 'Opération refusée.');
        }

        $checkExistQuestion = Question::where([
            ['title', $request->title],
            ['category_question_id', $category_question->id]
        ]);

        if ($checkExistQuestion->exists()) {
            return redirect()->back()->with('error', 'Cette question existe déjà dans cette catégorie');
        }

        Question::create([
            'category_question_id' => $category_question->id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'text' => $request->text
        ]);

        return redirect()->back()->with('success', 'La question a été ajoutée avec succès');
    }

    public function show(CategoryQuestion $category_question)
    {
        $findCategoryQuestion = CategoryQuestion::where('slug', $category_question->slug);

        if ($findCategoryQuestion->doesntExist()) {
            return redirect()->back()->with('error', 'Opération refusée.');
        }

        $questions = Question::where('category_question_id', $category_question->id)->get();

        $page = 'admin.questions';
        $page_item = '';

        return view('admin.questions.show', compact('category_question', 'questions', 'page', 'page_item'));
    }

    public function update(CategoryQuestion $category_question, Question $question, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required'
        ], [
            'title.required' => 'Veuillez renseigner le titre de la question',
            'text.required' => 'Veuillez renseigner le texte de la question'
        ]);

        $findCategoryQuestion = CategoryQuestion::where('slug', $category_question->slug);

        if ($findCategoryQuestion->doesntExist()) {
            return redirect()->back()->with('error', 'Opération refusée.');
        }

        $findQuestion = Question::where('slug', $question->slug);

        if ($findQuestion->doesntExist()) {
            return redirect()->back()->with('error', 'Opération refusée.');
        }

        $checkExistQuestion = Question::where([
            ['title', $request->title],
            ['category_question_id', $category_question->id]
        ]);

        if ($request->title != $question->title && $checkExistQuestion->exists()) {
            return redirect()->back()->with('error', 'Opération refusée. Cette question existe déjà dans la catégorie');
        }

        $question->update([
            'category_question_id' => $category_question->id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'text' => $request->text
        ]);

        return redirect()->back()->with('success', 'La question a été modifiée avec succès');
    }

    public function destroy(Question $question)
    {
        $findQuestion = Question::where('slug', $question->slug);

        if ($findQuestion->doesntExist()) {
            return redirect()->back()->with('error', 'Opération refusée.');
        }

        $question->delete();

        return redirect()->back()->with('success', 'La question a été supprimée avec succès');
    }
}
