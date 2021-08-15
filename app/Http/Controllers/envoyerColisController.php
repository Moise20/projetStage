<?php

namespace App\Http\Controllers;

use App\Models\Colis;
use Illuminate\Http\Request;

class envoyerColisController extends Controller
{
    public function affichageFormulaire()
    {
        $user = auth()->user();
        $client_id = $user->id;
        return view('affichageColisForm',[
            'client_id'=>$client_id,
        ]);
    }

    public function traitement()
    {
        $tarifKilo=50;
        $poids= request('poids');
        request()->validate([
            'nom'=>['required','alpha'],
            'poids'=>['required','numeric'],
            'villeDepart'=>['required'],
            'villeArrivee'=>['required'],
            'nomDestinataire'=>['required','alpha'],
            'numTelDestinataire'=>['required','regex:/[0-9]{8}/'],
            'dateConvoyage'=>['required','date'],
            'client_id'=>['required']
        ]);

        $colis = Colis::create([
            'nom'=>request('nom'),
            'poids'=>request('poids'),
            'villeDepart'=>request('villeDepart'),
            'villeArrivee'=>request('villeArrivee'),
            'nomDestinataire'=>request('nomDestinataire'),
            'numTelDestinataire'=>request('numTelDestinataire'),
            'dateConvoyage'=>request('dateConvoyage'),
            'tarif'=>($tarifKilo*$poids),
            'user_id'=>request('client_id'),
        ]);
        flash("Les informations ont bien été enregistrees.")->success();
        return redirect('/envoyerColis');
    }

    public function liste()
    {
        $id= auth()->user()->id;
        $colis = Colis::where('user_id',$id)->get();
        return view('listeColis',[
            'colis'=>$colis,
        ]);
    }

    public function formulaireModif($id)
    {
        //$colis_id = auth()->user()->id;
        $colis = Colis::findOrFail($id);
        //$colis = Colis::where('id',$colis_id)->get();
        return view('modifierColis',[
            'id'=>$colis->id,
            'nom'=>$colis->nom,
            'poids'=>$colis->poids,
            'villeDepart'=>$colis->villeDepart,
            'villeArrivee'=>$colis->villeArrivee,
            'nomDestinataire'=>$colis->nomDestinataire,
            'numTelDestinataire'=>$colis->numTelDestinataire,
            'dateConvoyage'=>$colis->dateConvoyage,
            'client_id'=>$colis->user_id,
        ]);
        
    }

    public function traitementModif(Request $request, Colis $colis)
    {
        request()->validate([
            'id'=>['required'],
            'nom'=>['required','alpha'],
            'poids'=>['required','numeric'],
            'villeDepart'=>['required'],
            'villeArrivee'=>['required'],
            'nomDestinataire'=>['required','alpha'],
            'numTelDestinataire'=>['required','regex:/[0-9]{8}/'],
            'dateConvoyage'=>['required','date'],
            'client_id'=>['required']
        ]);
        $id = ($request->input('id'));
        $tarifKilo=50;
        $poids = ($request->input('poids'));
        $colis=Colis::where('id', $id)->update([

            'nom' => ($request->input('nom')),
            'poids'=>($request->input('poids')),
            'villeDepart' => ($request->input('villeDepart')),
            'villeArrivee' => ($request->input('villeArrivee')),
            'nomDestinataire' => ($request->input('nomDestinataire')),
            'numTelDestinataire' => ($request->input('numTelDestinataire')),
            'dateConvoyage' => ($request->input('dateConvoyage')),
            'tarif'=>$tarifKilo*$poids,
            'user_id' => ($request->input('client_id')),
            
            
        ]);

        flash("Les informations ont bien été mise à jour.")->success();
        return redirect('/envoyerColis');
    }
}
