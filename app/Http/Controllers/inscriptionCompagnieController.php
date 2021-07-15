<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class inscriptionCompagnieController extends Controller
{
    public function formulaire()
    {
        return view('inscriptionCompagnie');
    }

    public function traitement()
    {
        request()->validate([
            'nom' => ['required'],
            'email' => ['required', 'email', 'regex:/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}$/'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required'],
            'role' => ['required'],

        ], [
            'password.min' => 'Pour des raisons de sécurité, votre mot de passe doit faire :min caractères.'
        ]);

        $utilisateur = User::create([
            'nom' => request('nom'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'role' => request('role'),

        ]);


        flash('Inscription reuissi')->success();
        return redirect('/inscriptionCompagnie');
    }
}
