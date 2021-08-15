<?php

namespace App\Http\Controllers;

use App\Models\User;
use Intervention\Image\Facades\Image;


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
    public function formulaireProfil()
    {
        return view('completerProfilClient');
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

        $id = auth()->user()->id;
        
        //$user->localisation = request('localisation');
        //$user->photo=request($path);
        //$user->save();

        $user = User::where('id', $id)->update([

            
            'localisation' => request('localisation'),
            'photo' => ($path),
            
        ]);


        flash("Votre profil a bien été mis à jour.")->success();
        return redirect('/page-de-gardeClient');
    }
    public function traitementInformation()
    {
        $user = auth()->user();
        $id= $user->id;
        $client=User::where('id',$id)->first();

        return view('voirInfoClient',[
            'client'=>$client,
        ]);
    }
    public function modifInfoClientFormulaire($id)
    {
        $client = User::findOrFail($id);
        return view('modifInfoClient',[
            'id'=>$client->id,
            'nom'=>$client->nom,
            'prenom'=>$client->prenom,
            'email'=>$client->email,
            'localisation'=>$client->localisation,
            'photo'=>$client->photo,
        ]);
    }
    public function modifInfoClientTraitement(Request $request, User $compagnie)
    {

        request()->validate([
            'id' => ['required'],
            'nom'=>['required','alpha'],
            'prenom'=>['required','alpha'],
            'email'=>['required','regex:/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}$/'],
            'localisation'=>['required'],
            'photo'=>['required','image'],
        ]);

        $path = request('photo')->store('photos', 'public');
        $image = Image::make(public_path("/storage/{$path}"))->fit(80, 80);
        $image->save();

        $id = ($request->input('id'));
        $client = User::where('id', $id)->update([

            'nom' => ($request->input('nom')),
            'prenom' => ($request->input('prenom')),
            'email' => ($request->input('email')),
            'localisation' => ($request->input('localisation')),
            'photo' => ($path),
            
        ]);

        flash("Les informations ont bien été mise à jour.")->success();
        return redirect('/page-de-gardeClient');

    }

}
