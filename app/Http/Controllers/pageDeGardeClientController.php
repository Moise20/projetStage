<?php

namespace App\Http\Controllers;

use App\Models\Colis;
use App\Models\Reservation;
use Illuminate\Http\Request;

class pageDeGardeClientController extends Controller
{
    public function affichage()
    {
        $id = auth()->user()->id;
        $nom= auth()->user()->nom;
        $prenom=auth()->user()->prenom;
        $reservations = Reservation::all('client_id')->where('client_id',$id)->count();
        $colis = Colis::all('user_id')->where('user_id',$id)->count();
        return view('pageDegardeClient',[
            'nom'=>$nom,
            'prenom'=>$prenom,
            'reservations'=>$reservations,
            'colis'=>$colis,
        ]);
    }
}
