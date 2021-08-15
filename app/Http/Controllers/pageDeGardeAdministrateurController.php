<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class pageDeGardeAdministrateurController extends Controller
{
    public function affichage()
    {
        $users=User::all('id')->count();
        $clients= User::all('role')->where('role',3)->count();
        $compagnies = User::all('role')->where('role',2)->count();
        $reservations = Reservation::all('id')->count();
        return view('pageDegardeAdmin',[
            'users'=>$users,
            'clients'=>$clients,
            'compagnies'=>$compagnies,
            'reservations'=>$reservations, 
        ]);
    }
}
