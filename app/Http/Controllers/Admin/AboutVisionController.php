<?php

namespace App\Http\Controllers\Admin;

use App\Enums\AboutTypes;
use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Http\Requests\AboutVisionRequest;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AboutVisionController extends Controller
{
    public function index()
    {
        $about = About::where('type', AboutTypes::Vision)->first();

        $page = 'admin.about';
        $page_item = '';

        return view('admin.about.vision', compact('about', 'page', 'page_item'));
    }
    public function store(AboutVisionRequest $request, About $about)
    {
        $verify_about = About::where('id', $about->id)->first();
        $fields = $request->validated(
    );
   if($verify_about != null && $verify_about->image != null){
    $oldImage = $verify_about->image;
   }
   $image = $request->hasFile('image') ? $request->file('image')->store('about', 'public') : $image = null;
    if($fields['vision']){
        About::updateOrCreate([
            // $verify_about,
            'type' => $about->type,
            // $oldImage

        ],[
            'image' => $image,
            'type' => AboutTypes::Vision,
            'subtitle' => Str::substr($request->descriptionText, 0, 500),
            'text' => $fields['vision']
        ]);
    }       

        return redirect()->back()->with('success', 'Opération réussie!');
    }
}
