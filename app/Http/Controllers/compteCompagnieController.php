<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class compteCompagnieController extends Controller
{
    public function deconnexion()
    {
        auth()->logout();
        flash("Vous êtes déconnecté.")->success();
        return redirect('/connexionCompagnie');
    }

    public function modificationFormulaire()
    {
        return view('modification-passwordCompagnie');
    }

    public function modificationTraitement()
    {
        if (auth()->guest()) {
            flash("Vous devez être connecté pour voir cette page.")->error();

            return redirect('/connexionCompagnie');
        }

        request()->validate([
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required'],
        ]);

        $employe = auth()->user();
        $employe->password = bcrypt(request('password'));
        $employe->save();
        flash("Votre mot de passe a bien été mis à jour.")->success();
        return redirect('/page-de-gardeCompagnie');
    }
}
