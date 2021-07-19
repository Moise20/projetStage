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
        $agence = Agence::all();
        return view('ajouterTrajet', [
            'agences' => $agence,
        ]);
    }
    public function traitement()
    {
        request()->validate([

            'nom' => ['required'],
            'villeDepart' => ['required'],
            'villeArrivee' => ['required'],
            'heureDepart' => ['required'],
            'heureArrivee' => ['required'],
            'dateDepart' => ['required'],
            'tarif' => ['required'],
            'nbr_bus' => ['required'],
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
            'nbr_bus' => (request('nbr_bus')),
            'agence_id' => (request('agence_id')),

        ]);

        flash("Les informations ont bien été enregistrees.")->success();
        return redirect('/ajouterTrajet');
    }

    public function listeTrajet()
    {
    
        $trajet = DB::table('trajets')
            ->join('agences', 'trajets.agence_id', '=', 'agences.id')
            ->select('trajets.id', 'trajets.nom', 'trajets.villeDepart', 'trajets.villeArrivee', 'trajets.heureDepart', 'trajets.heureArrivee', 'trajets.dateDepart', 'trajets.tarif', 'trajets.nbr_bus', 'agences.nom as agenceNom')
            ->get();

            return view('listeTrajet',[
                'trajets'=>$trajet,
            ]);
    }

    public function formulaireModif($id)
    {

        $agence = Agence::all();
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
            'nbr_bus'=>$trajet->nbr_bus,
            'agences'=>$agence,
        ]);
    }

    public function traitementModif(Request $request, Agence $agence)
    {

        request()->validate([

            'id'=>['required'],
            'nom' => ['required'],
            'villeDepart' => ['required'],
            'villeArrivee' => ['required'],
            'heureDepart' => ['required'],
            'heureArrivee' => ['required'],
            'dateDepart' => ['required'],
            'tarif' => ['required'],
            'nbr_bus' => ['required'],
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
            'nbr_bus' => ($request->input('nbr_bus')),
            'agence_id' => ($request->input('agence_id')),
            
        ]);

        flash("Les informations ont bien été mise à jour.")->success();
        return redirect('/listeTrajet');
    }
}
