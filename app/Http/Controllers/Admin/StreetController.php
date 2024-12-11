<?php

namespace App\Http\Controllers\Admin;

use App\Events\StreetPostEvent;
use Carbon\Carbon;
use App\Models\Alert;
use App\Models\Street;
use App\Models\StreetImage;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;

class StreetController extends Controller
{
    public function index()
    {
        $streets = Street::where([
            ['id', '<>', null],
            ['status', 0]
        ])->orderByDesc('id')->get();

        $alertes = Alert::limit(3)->get();

        $page = 'admin.streets';
        $page_item = '';

        return view('admin.street.index', compact('streets', 'alertes', 'page', 'page_item'));
    }

    public function show(Street $street)
    {
        $verify_street = Street::where('id', $street->id)->first();

        if ($verify_street == null) {
            abort('404');
        }

        $page = 'admin.streets';
        $page_item = '';

        return view('admin.street.show', compact('street', 'page', 'page_item'));
    }

    public function confirm_information(Request $request, Street $street)
    {
        $verify_street = Street::where([
            ['id', $street->id],
            ['status', 0],
            ['number_unique', $request->street_information]
        ])->first();

        if ($verify_street == null) {
            return redirect()->back()->with('error', 'Opération de confirmation échouée');
        }

        $street->update([
            'status' => 1
        ]);

        return redirect()->back()->with('success', 'Opération de confirmation réussie');
    }

    public function information_confirmed()
    {
        $streets = Street::where([
            ['id', '<>', null],
            ['status', 1]
        ])->orderByDesc('updated_at')->get();

        $page = 'admin.streets';
        $page_item = '';

        return view('admin.street.confirmed', compact('streets', 'page', 'page_item'));
    }


    public function informationsSendByGuests(Request $request)
    {
        if (request('images') == null && $request->message == null) {
            return redirect()->back()->with('error', 'Opération échouée. Veuillez renseigner du texte et/ou des images!');
        }

        $verify_request_exist_image = false;

        if (request('images')) {

            $verify_request_exist_image = true;

            if ($request->hasFile('images')) {
                if (is_array($request->images)) {
                    for ($i=0; $i < sizeof($request->images); $i++) {
                        if (in_array($request->images[$i]->extension(), ['jpg', 'jpeg', 'png', 'jfif', 'webp'])) {

                        } else {
                            return redirect()->back()->with('error', 'Opération échouée. Veuillez vérifier le format de votre (vos) image(s)');
                        }
                    }
                } else {
                    return redirect()->back()->with('error', 'Opération échouée. Merci de réessayer!');
                }
            } else {
                return redirect()->back()->with('error', 'Opération échouée. Merci de réessayer!');
            }
        }

        $street = Street::create([
            'image' => $verify_request_exist_image ? 'Oui' : 'Non',
            'description' => $request->message,
            'status' => 0
        ]);

        $unique_string_number = 'DMR_' . $street->id . random_int(1105, 9999);

        $street->update([
            'number_unique' => $unique_string_number
        ]);

        if ($verify_request_exist_image) {
            for ($i=0; $i < sizeof($request->images); $i++) {
                StreetImage::create([
                    'image' => $request->images[$i]->store('DansMaRue/' . $street->id . '/' . Carbon::parse($street->created_at)->format('his') , 'public'),
                    'street_id' => $street->id
                ]);
            }
        }

        $getAlertNumbers = Alert::all();

        if (count($getAlertNumbers) > 0) {
            event(new StreetPostEvent());
        }

        return redirect()->back()->with('success', 'Opération réussie!');
    }

    public function storeAlertNumber(Request $request)
    {
        $countAlertNumber = count(Alert::all());

        if ($countAlertNumber >= 3) {
            return redirect()->back()->with('error', 'Vous avez atteint le nombre maximal de numero d\'alerte');
        }

        $request->validate([
            'number' => ['required', 'string', 'unique:alerts,number', 'regex:/^((7[09])|(9[01236789]))([0-9]{2}){3}$/']
        ], [
            'number.required' => 'Veuillez renseigner le numéro d\'alerte',
            'number.string' => 'Veuillez bien saisir le numéro d\'alerte',
            'number.unique' => 'Ce numéro existe déjà',
            'number.regex' => 'Ce numéro est invalide. Veuillez entrer le numero sans espace et sans 228',
        ]);

        Alert::create([
            'number' => '228' . $request->number
        ]);

        return redirect()->back()->with('success', 'Le numero a été enregistré avec succès');
    }

    public function updateAlertNumber(Alert $alert, Request $request)
    {
        $request->validate([
            'numberEdit' => ['required', 'string', 'regex:/^((7[09])|(9[01236789]))([0-9]{2}){3}$/']
        ], [
            'numberEdit.required' => 'Veuillez renseigner le numéro d\'alerte',
            'numberEdit.string' => 'Veuillez bien saisir le numéro d\'alerte',
            'numberEdit.regex' => 'Ce numéro est invalide. Veuillez entrer le numero sans espace et sans 228',
        ]);

        $checkIfExist = Alert::where("number", $request->numberEdit)->exists();

        if ($request->numberEdit != $alert->number && $checkIfExist) {
            return redirect()->back()->with('error', 'Le numero entré existe déjà');
        }

        $alert->update([
            'number' => '228' . $request->numberEdit
        ]);

        return redirect()->back()->with('success', 'Le numero a été modifié avec succès');
    }

    public function destroyAlertNumber(Alert $alert)
    {
        $checkIfExist = Alert::where("id", $alert->id)->exists();

        if (!$checkIfExist) {
            return redirect()->back()->with('error', 'Opération échouée');
        }

        $alert->delete();

        return redirect()->back()->with('success', 'Le numero a été supprimé avec succès');
    }
}
