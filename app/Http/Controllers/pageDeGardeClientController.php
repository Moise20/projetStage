<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageDeGardeClientController extends Controller
{
    public function affichage()
    {
        return view('pageDegardeClient');
    }
}
