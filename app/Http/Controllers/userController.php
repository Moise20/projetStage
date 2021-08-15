<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function listeUser()
    {
        $users = User::all();
        return view('listeUser',[
            'users'=>$users,
        ]);
    }

    public function supprimerUser($id)
    {

        $user= User::where('id',$id)->delete();
        flash("Utilisateur supprime.")->success();
        return redirect('/listeUser');
    }
}
