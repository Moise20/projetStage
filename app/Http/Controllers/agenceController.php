<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class agenceController extends Controller
{
    public function formulaire()
    {
        $user=User::where('role','2')->get();
        return view('ajouterAgence',[
            'users'=>$user,
        ]);
    }

    public function traitement()
    {
        request()->validate([
    
            'nom' => ['required'],
            'ville' => ['required'],
            'tel' => ['required'],
            'adresse' => ['required'],
            'user_id' => ['required'],
        ]);

        $agence = Agence::create([
            'nom' => (request('nom')),
            'ville' => (request('ville')),
            'tel' => (request('tel')),
            'adresse' => (request('adresse')),
            'user_id' => (request('user_id')),
            
        ]);

        flash("Les informations ont bien été enregistrees.")->success();
        return redirect('/ajouterAgence');
    }

    public function liste()
    {

        

            $agence=DB::table('agences')
            ->join('users','agences.user_id','=','users.id')
            ->select('agences.id','agences.nom','agences.ville','agences.tel','agences.adresse' )
            ->get();
        
        return view('listeAgence',[
            'agences'=>$agence,
        ]);
    }

    public function show(int $id)

    {

        //

    }

    public function formulaireModif(int $id)
    {

        /*$compagnie=DB::table('agences')
            ->join('users','agences.user_id','=','users.id')
            ->select('users.id','users.nom')
            ->get();*/
            $compagnie=User::where('role','2')->get();
        $agence = Agence::findOrFail($id);
        return view('modiferAgence',[
            'id'=>$agence->id,
            'nom'=>$agence->nom,
            'ville'=>$agence->ville,
            'tel'=>$agence->tel,
            'adresse'=>$agence->adresse,
            'compagnies'=>$compagnie,

        ]);
    }

    public function traitementModif(Request $request, Agence $agence)
    {
        request()->validate([
            'id'=>['required'],
            'nom'=>['required'],
            'ville'=>['required'],
            'tel'=>['required'],
            'adresse'=>['required'],
            'user_id'=>['required'],
        ]);

        $id = ($request->input('id'));
        $agence=Agence::where('id', $id)->update([

            'nom' => ($request->input('nom')),
            'ville' => ($request->input('ville')),
            'tel' => ($request->input('tel')),
            'adresse' => ($request->input('adresse')),
            'user_id' => ($request->input('user_id')),
            
        ]);

        flash("Les informations ont bien été mise à jour.")->success();
        return redirect('/listeAgence');
    }
}
