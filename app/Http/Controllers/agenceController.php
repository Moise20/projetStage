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
        $compagnie = auth()->user();
        $idC = $compagnie->id;
        //$nomC= $compagnie->nom;
        //$user=User::where('role','2')->get();
        return view('ajouterAgence', [
            'idC' => $idC,
            //'nomC'=>$nomC,
        ]);
    }

    public function traitement()
    {
        request()->validate([

            'nom' => ['required','alpha'],
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

        $agenceCon = auth()->user();
        $id = $agenceCon->id;


        $agence = DB::table('agences')
            ->join('users', 'agences.user_id', '=', 'users.id')
            ->select('agences.id', 'agences.nom', 'agences.ville', 'agences.tel', 'agences.adresse','users.nom as compagnieN')
            ->where('agences.user_id', '=', $id)
            ->get();

        return view('listeAgence', [
            'agences' => $agence,
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
        $compagnie = auth()->user();
        $idC = $compagnie->id;
        //$compagnie=User::where('role','2')->get();
        $agence = Agence::findOrFail($id);
        return view('modiferAgence', [
            'id' => $agence->id,
            'nom' => $agence->nom,
            'ville' => $agence->ville,
            'tel' => $agence->tel,
            'adresse' => $agence->adresse,
            'idC' => $idC,

        ]);
    }

    public function traitementModif(Request $request, Agence $agence)
    {
        request()->validate([
            'id' => ['required'],
            'nom' => ['required','alpha'],
            'ville' => ['required'],
            'tel' => ['required','regex:/[0-9]{8}/'],
            'adresse' => ['required'],
            'user_id' => ['required'],
        ]);

        $id = ($request->input('id'));
        $agence = Agence::where('id', $id)->update([

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
