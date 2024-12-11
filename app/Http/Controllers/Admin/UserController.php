<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('check.authenticated.admin')->except('login_view', 'login', 'logout');
    // }

    public function admins()
    {
        $users = User::all();

        $page = 'admin.users';
        $page_item = '';

        return view('admin.users.index', compact('users', 'page', 'page_item'));
    }

    public function login_view()
    {
        return view('admin.users.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login_mail' => 'required|email:rfc,dns',
            'login_pass' => 'required'
        ], [
            'login_mail.required' => "Veuillez renseigner votre adresse électronique",
            'login_mail.email' => "Adresse électronique incorrect",
            'login_pass.required' => "Veuillez renseigner votre mot de passe"
        ]);

        $findEmail = User::where('email' , $request->login_mail)->first();

        if ($findEmail != null) {
            if (Hash::check($request->login_pass, $findEmail->password)) {

                session()->put('id', $findEmail->id);
                session()->put('email', $findEmail->email);
                session()->put('name', $findEmail->name);
                session()->put('image', $findEmail->profile);
                session()->put('auth-check', true);

                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->back()->with('error', 'Mot de passe incorrect');
            }
        } else {
            return redirect()->back()->with('error', 'Erreur! Email invalide');
        }

    }

    public function register_view()
    {
        $page = 'admin.users';
        $page_item = '';

        return view('admin.users.register', compact('page', 'page_item'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|confirmed'
        ], [
            'fullname.required' => 'Erreur! Veuillez renseigner le nom et prénom(s)',
            'email.required' => 'Erreur! Veuillez renseigner l\'adresse électronique',
            'email.email' => 'Erreur! Adresse électronique invalide',
            'email.unique' => 'Erreur! Cette adresse électronique existe déjà',
            'password.required' => 'Erreur! Veuillez renseigner le mot de passe',
            'password.confirmed' => 'Erreur! Les deux mot de passe ne correspondent pas'
        ]);

        $user = User::create([
            'name' => $request->fullname,
            'email' => $request->email,
            'contact' => $request->contact,
            'password' => Hash::make($request->password)
        ]);

        if (request('avatar')) {

            $check_avatar_validity = false;

            if ($request->hasFile('avatar')) {
                if (in_array($request->file('avatar')->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'jfif', 'webp'])) {

                    $user->update([
                        'profile' => request('avatar')->store('user', 'public')
                    ]);

                    $check_avatar_validity = true;
                }
            }
        }

        if (isset($check_avatar_validity) && $check_avatar_validity === false) {
            return redirect()->back()->with('warn', 'Opération d\'inscription réussie mais l\'avatar n\'a pas été uploadé.');
        } else {
            return redirect()->back()->with('success', 'Opération d\'inscription réussie');
        }
    }

    /* Edit Connected user */
    public function editConnectedUser()
    {
        $user = User::where([
            ['id', session()->get('id')],
            ['email', session()->get('email')]
        ])->first();

        if (!($user)) {
            abort('404');
        }

        $page = 'admin.users';
        $page_item = '';

        return view('admin.users.editConnectedUser', compact('user', 'page', 'page_item'));
    }

    public function updateConnectedUser(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email:rfc,dns',
        ], [
            'fullname.required' => 'Erreur! Veuillez renseigner le nom et prénom(s)',
            'email.required' => 'Erreur! Veuillez renseigner l\'adresse électronique',
            'email.email' => 'Erreur! Adresse électronique invalide'
        ]);

        $user = User::where([
            ['id', session()->get('id')],
            ['email', session()->get('email')]
        ])->first();

        if (!($user)) {
            return redirect()->with('error', 'Une erreur s\'est produite, veuillez réessayer la mise à jour de votre profil');
        }

        $check_already_email = User::where([
            ['email', $request->email]
        ])->first();

        if ($check_already_email != null) {
            if (session()->get('email') != $request->email && $check_already_email->email == $request->email) {
                return redirect()->back()->with('error', 'Cet email existe déjà');
            }
        }

        $avatar = $user->profile == "" ? "" : $user->profile;

        if (request('avatar')) {
            if ($request->hasFile('avatar')) {
                if (in_array($request->file('avatar')->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'jfif', 'webp'])) {

                    $old_image = $user->profile;

                    $avatar = request('avatar')->store('user', 'public');

                    if ($old_image) {
                        if (Storage::disk('public')->exists($old_image)) {
                            File::delete('storage/app/public/' . $old_image);
                        }
                    }

                } else {
                    return redirect()->back()->with('error', 'Erreur! Veuillez vérifier le format de votre image.');
                }
            } else {
                return redirect()->back()->with('error', 'Fichier choisi invalide!');
            }
        }

        $user->update([
            'profile' => $avatar,
            'name' => $request->fullname,
            'email' => $request->email,
            'contact' => $request->contact,
        ]);

        session()->put('id', $user->id);
        session()->put('email', $user->email);
        session()->put('name', $user->name);
        session()->put('image', $user->profile);

        return redirect()->back()->with('success', 'La modification de votre profil a été faite');
    }

    public function updateConnectedUserPassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ], [
            'old_password.required' => 'Veuillez renseigner l\'ancien mot de passe',
            'new_password.required' => 'Veuillez renseigner le nouveau mot de passe',
            'new_password.confirmed' => 'Les deux mots de passe ne correspondent pas'
        ]);

        $user = User::where([
            ['id', session()->get('id')],
            ['email', session()->get('email')]
        ])->first();

        if (!($user)) {
            return redirect()->with('error', 'Une erreur s\'est produite, veuillez réessayer la mise à jour de votre profil');
        }

        if (Hash::check($request->old_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->new_password)
            ]);
            return redirect()->back()->with('success', 'Mot de passe modifié avec succès. Il sera pris en compte à votre prochaine connexion');
        } else {
            return redirect()->back()->with('error', 'Ancien mot de passe incorrect');
        }
    }

    public function logout()
    {
        session()->flush();

        return redirect()->route('admin.user.login_view');
    }

    public function showUser(User $user)
    {
        $checkUser = User::where('id', $user->id)->first();

        if($checkUser == null)
        {
            abort('404');
        }

        $page = 'admin.users';
        $page_item = '';

        return view('admin.users.showUser', compact('checkUser', 'page', 'page_item'));
    }
}
