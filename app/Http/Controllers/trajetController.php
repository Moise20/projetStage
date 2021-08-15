<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use App\Models\Trajet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class trajetController extends Controller
{

    public function formulaire()
    {
        $compagnie = auth()->user();
        $idC = $compagnie->id;

        $agence = Agence::where('user_id',$idC)->get();
        return view('ajouterTrajet', [
            'agences' => $agence,
        ]);
    }
    public function traitement()
    {
        request()->validate([

            'nom' => ['required','alpha'],
            'villeDepart' => ['required'],
            'villeArrivee' => ['required'],
            'heureDepart' => ['required'],
            'heureArrivee' => ['required'],
            'dateDepart' => ['required'],
            'tarif' => ['required','numeric','max:15000'],
            'nbrPlace' => ['required'],
            'agence_id' => ['required'],
        ]);

        $trajet = Trajet::create([
            'nom' => (request('nom')),
            'villeDepart' => (request('villeDepart')),
            'villeArrivee' => (request('villeArrivee')),
            'heureDepart' => (request('heureDepart')),
            'heureArrivee' => (request('heureArrivee')),
            'dateDepart' => (request('dateDepart')),
            'tarif' => (request('tarif')),
            'nbrPlace' => (request('nbrPlace')),
            'agence_id' => (request('agence_id')),

        ]);

        flash("Les informations ont bien été enregistrees.")->success();
        return redirect('/ajouterTrajet');
    }

    public function listeTrajet()
    {
        $compagnie = auth()->user();
        $idC = $compagnie->id;
    
        $trajet = DB::table('trajets')
            ->join('agences', 'trajets.agence_id', '=', 'agences.id')
            ->join('users','agences.user_id','=','users.id')
            ->select('trajets.id', 'trajets.nom', 'trajets.villeDepart', 'trajets.villeArrivee', 'trajets.heureDepart', 'trajets.heureArrivee', 'trajets.dateDepart', 'trajets.tarif', 'trajets.nbrPlace', 'agences.nom as agenceNom')
            ->where('users.id',$idC)
            ->get();

            return view('listeTrajet',[
                'trajets'=>$trajet,
            ]);
    }

    public function formulaireModif($id)
    {
        $compagnie = auth()->user();
        $idC = $compagnie->id;

        $agence = Agence::where('user_id',$idC)->get();

        //$agence = Agence::all();
        $trajet = Trajet::findOrFail($id);
        return view('modifierTrajet',[
            'id'=>$trajet->id,
            'nom'=>$trajet->nom,
            'villeDepart'=>$trajet->villeDepart,
            'villeArrivee'=>$trajet->villeArrivee,
            'heureDepart'=>$trajet->heureDepart,
            'heureArrivee'=>$trajet->heureArrivee,
            'dateDepart'=>$trajet->dateDepart,
            'tarif'=>$trajet->tarif,
            'nbrPlace'=>$trajet->nbrPlace,
            'agences'=>$agence,
        ]);
    }

    public function traitementModif(Request $request, Agence $agence)
    {

        request()->validate([

            'id'=>['required'],
            'nom' => ['required','alpha'],
            'villeDepart' => ['required'],
            'villeArrivee' => ['required'],
            'heureDepart' => ['required'],
            'heureArrivee' => ['required'],
            'dateDepart' => ['required','date'],
            'tarif' => ['required','numeric','max:15000'],
            'nbrPlace' => ['required'],
            'agence_id' => ['required'],
        ]);

        $id = ($request->input('id'));
        $trajet=Trajet::where('id', $id)->update([

            'nom' => ($request->input('nom')),
            'villeDepart' => ($request->input('villeDepart')),
            'villeArrivee' => ($request->input('villeArrivee')),
            'heureDepart' => ($request->input('heureDepart')),
            'heureArrivee' => ($request->input('heureArrivee')),
            'dateDepart' => ($request->input('dateDepart')),
            'tarif' => ($request->input('tarif')),
            'nbrPlace' => ($request->input('nbrPlace')),
            'agence_id' => ($request->input('agence_id')),
            
        ]);

        flash("Les informations ont bien été mise à jour.")->success();
        return redirect('/listeTrajet');
    }
}
