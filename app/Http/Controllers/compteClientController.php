<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class compteClientController extends Controller
{
    public function deconnexion()
    {
        auth()->logout();
        flash("Vous êtes déconnecté.")->success();
        return redirect('/connexionClient');
    }

    public function modificationFormulaire()
    {
        return view('modification-passwordClient');
    }
    public function modificationTraitement()
    {
        if (auth()->guest()) {
            flash("Vous devez être connecté pour voir cette page.")->error();

            return redirect('/connexionClient');
        }

        request()->validate([
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required'],
        ]);

        $employe = auth()->user();
        $employe->password = bcrypt(request('password'));
        $employe->save();
        flash("Votre mot de passe a bien été mis à jour.")->success();
        return redirect('/page-de-gardeClient');
    }
}
