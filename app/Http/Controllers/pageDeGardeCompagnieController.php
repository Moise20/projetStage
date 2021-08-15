<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pageDeGardeCompagnieController extends Controller
{
    public function affichage()
    {
        $nom = auth()->user()->nom;
        $id = auth()->user()->id;
        $trajets = DB::table('trajets')
        ->join('agences','trajets.agence_id','agences.id')
        ->join('users','agences.user_id','users.id')
        ->where('users.id',$id)
        ->select('trajets.id')
        ->count();
        $agences = Agence::all('user_id')->where('user_id',$id)->count();
        return view('pageDegardeCompagnie',[
            'nom'=> $nom ,
            'agences'=>$agences,
            'trajets'=>$trajets,
        ]);
    }
}
