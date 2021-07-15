<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageDeGardeCompagnieController extends Controller
{
    public function affichage()
    {
        return view('pageDegardeCompagnie');
    }
}
