<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CultureRequest;
use App\Models\Culture;
use App\Models\CultureType;
use Illuminate\Http\Request;

class CultureController extends Controller
{
    public function index()
    {
        $page = "admin.mairie";
        $page_item = "admin.culture";

        $culture_types = CultureType::all();

        $cultures = Culture::all();

        return view('admin.mairie.culture.index', compact('page', 'page_item', 'culture_types', 'cultures'));
    }

    public function store(CultureRequest $request)
    {


        $fields = $request->validated();

        Culture::create($fields);

        return redirect()->back()->with('success', "Culture enregistré avec succès");
    }

    public function update(Culture $culture, CultureRequest $request)
    {
        $fields = $request->validated();

        $culture->update($fields);

        return redirect()->back()->with('success', "Culture modifié avec succès");
    }

    public function destroy(Culture $culture)
    {
        $culture->delete();

        return redirect()->back()->with("success", "Culture retiré avec succès");
    }
}
