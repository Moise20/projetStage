<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageDeGardeAdministrateurController extends Controller
{
    public function affichage()
    {
        return view('pageDegardeAdmin');
    }
}
