<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageItinerairesVoyagesController extends Controller
{
    public function affichagesItenerairesVoyages()
    {
        return view('affichageVueItenerairesVoyages');
    }
}
