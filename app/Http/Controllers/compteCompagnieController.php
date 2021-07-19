<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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
    
    public function formulaireProfil()
    {
        return view('completerProfilCompagnie');
    }

    public function traitementProfil()
    {
        request()->validate([
            'localisation' => ['required'],
            'photo' => ['required', 'image'],
            
        ]);
        $path = request('photo')->store('photos', 'public');
        $image = Image::make(public_path("/storage/{$path}"))->fit(80, 80);
        $image->save();

        $user = auth()->user();
        $user->localisation = request('localisation');
        $user->photo=request($path);
        $user->save();
        flash("Votre profil a bien été mis à jour.")->success();
        return redirect('/page-de-gardeCompagnie');
    }

    public function traitementInformation()
    {
        $user = auth()->user();
        $id= $user->id;
        $compagnie=User::where('id',$id)->first();

        return view('voirInfoCompagnie',[
            'compagnie'=>$compagnie,
        ]);
    }

    public function modifInfoCompagnieFormulaire($id)
    {
        $compagnie = User::findOrFail($id);
        return view('modifInfoCompagnie',[
            'id'=>$compagnie->id,
            'nom'=>$compagnie->nom,
            'email'=>$compagnie->email,
            'localisation'=>$compagnie->localisation,
            'photo'=>$compagnie->photo,
        ]);
    }
    public function modifInfoCompagnieTraitement(Request $request, User $compagnie)
    {

        request()->validate([
            'id' => ['required'],
            'nom'=>['required'],
            'email'=>['required','regex:/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}$/'],
            'localisation'=>['required'],
            'photo'=>['required','image'],
        ]);

        $path = request('photo')->store('photos', 'public');
        $image = Image::make(public_path("/storage/{$path}"))->fit(80, 80);
        $image->save();

        $id = ($request->input('id'));
        $compagnie = User::where('id', $id)->update([

            'nom' => ($request->input('nom')),
            'email' => ($request->input('email')),
            'localisation' => ($request->input('localisation')),
            'photo' => ($path),
            
        ]);

        flash("Les informations ont bien été mise à jour.")->success();
        return redirect('/page-de-gardeCompagnie');

    }
}
