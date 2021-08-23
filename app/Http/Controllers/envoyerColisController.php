<?php

namespace App\Http\Controllers;

use App\Mail\convoyeurColisMail;
use App\Models\Colis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
            'numTelDestinataire'=>['required','regex:/^9[0-9]{7}/'],
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
        //$infoColis=DB::table('colis')->latest('user_id')->first();
        
        //dd($colis->nom);
        $infoUser=auth()->user();
        /*$id_user = request('client_id');
        $infoColis = DB::table('colis')
        ->join('users','colis.user_id','users.id')
        ->select('users.nom as userNom','users.num_tel','users.localisation','colis.nom as colisNom','colis.poids',
        'colis.dateConvoyage')
        ->where('colis.user_id',$id_user)
        ->latest($id_user)
        ;*/
        $poids = $colis->poids;
        $nom= $colis->nom;
        //dd($poids);
        
        $mailConvoyeur = "convoyeurColi@gmail.com";
        Mail::to($mailConvoyeur)->send(new convoyeurColisMail($nom,$poids,$infoUser));
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
            'numTelDestinataire'=>['required','regex:/^9[0-9]{7}/'],
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
        $infoUser=auth()->user();
        $colis_id = $request->input('id');
        $colis = Colis::where('id',$colis_id)->first();
        $poids = $colis->poids;
       // dd($poids);
        $nom= $colis->nom;

        $mailConvoyeur = "convoyeurColi@gmail.com";
        Mail::to($mailConvoyeur)->send(new convoyeurColisMail($nom,$poids,$infoUser));
        flash("Les informations ont bien été mise à jour.")->success();
        return redirect('/envoyerColis');
    }
}
