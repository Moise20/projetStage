<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageAcceuilUtilisateurController extends Controller
{
    public function affichageVoyages_Colis()
    {
        return view('affichageAccueilUtilisateur');
    }
}
