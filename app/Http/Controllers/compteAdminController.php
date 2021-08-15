<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class compteAdminController extends Controller
{
    public function deconnexion()
    {
        auth()->logout();
        flash("Vous êtes déconnecté.")->success();
        return redirect('/connexionAdministrateur');
    }

    public function modificationFormulaire()
    {
        return view('modification-passwordAdmin');
    }
    public function modificationTraitement()
    {
        if (auth()->guest()) {
            flash("Vous devez être connecté pour voir cette page.")->error();

            return redirect('/connexionAdministrateur');
        }

        request()->validate([
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required'],
        ]);

        $employe = auth()->user();
        $employe->password = bcrypt(request('password'));
        $employe->save();
        flash("Votre mot de passe a bien été mis à jour.")->success();
        return redirect('/page-de-garde');
    }

    public function traitementInformation()
    {
        $user = auth()->user();
        $id= $user->id;
        $admin=User::where('id',$id)->first();

        return view('voirInfoAdmin',[
            'admin'=>$admin,
        ]);
    }

    public function modifInfoAdminFormulaire($id)
    {
        $admin = User::findOrFail($id);
        return view('modifInfoAdmin',[
            'id'=>$admin->id,
            'nom'=>$admin->nom,
            'prenom'=>$admin->prenom,
            'email'=>$admin->email,
            
        ]);
    }

    public function modifInfoAdminTraitement(Request $request, User $compagnie)
    {

        request()->validate([
            'id' => ['required'],
            'nom'=>['required','alpha'],
            'prenom'=>['required','alpha'],
            'email'=>['required','email','regex:/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}$/'],
            
        ]);

        

        $id = ($request->input('id'));
        $admin = User::where('id', $id)->update([

            'nom' => ($request->input('nom')),
            'prenom' => ($request->input('prenom')),
            'email' => ($request->input('email')),
            
        ]);

        flash("Les informations ont bien été mise à jour.")->success();
        return redirect('/page-de-garde');

    }
}
