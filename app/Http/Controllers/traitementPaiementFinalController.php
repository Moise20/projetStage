<?php

namespace App\Http\Controllers;

use App\Mail\EnvoiFactureTrajetClient;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

class traitementPaiementFinalController extends Controller
{
    public function TraitementFinaliserPaiement()
    {
        request()->validate([
            'identifier' => ['required', 'numeric'],
        ]);
        
        $identifier = request('identifier');
        $cle = '185dae72-1d61-4a59-87aa-04846f5fe633';
        $response = Http::post('https://paygateglobal.com/api/v2/status', [

            'auth_token' => $cle,

            'identifier' => $identifier,

        ]);
        $response = json_decode($response->getBody());
       //dd($response);
        $status = $response->status;
        
       // $identifiant = $response->identifier;
       
        if ($status != 0) {
            flash("Erreur.Paiement non effectue")->error();
            return redirect('page-de-gardeClient');
        } else {
            $reservations = Reservation::where('identifiantTransaction',$identifier)->get();
            //$reservations = Reservation::findOrFail($identifier);
            //dd($reservations);
           // $id = $reservations->id;
            $tx_reference = $response->tx_reference;
            //dd($tx_reference);
            $reservation = Reservation::where('identifiantTransaction', $identifier)->update([
                'statutPaiement' => 'paiement effectue',
                'tx_reference' => $tx_reference,
            ]);

            /*$infoFacture = DB::table('reservations')
                         ->join('trajets','reservations.trajet_id','=','trajets.id')
                         ->join('agences','trajets.agence_id','=','agences.id')
                         ->join('users','agences.user_id','=','users.id')
                         ->select('reservations.nbrPassager','reservations.infoPassPrincip','reservations.typeBillet',
                        'reservations.cout','reservations.identifiantTransaction','reservations.statutPaiement',
                    'trajets.villeDepart','trajets.villeArrivee','trajets.heureDepart','trajets.heureArrivee','trajets.dateDepart',
                'users.nom','users.localisation','agences.adresse','agences.ville')
                ->where('reservations.identifiantTransaction',$identifier)
                ->get();

                $infoClient = DB::table('reservations')
                ->join('users','reservations.client_id','=','users.id')
                ->select('users.email')
                 ->where('reservations.identifiantTransaction',$identifier)
                ->get();

                Mail::to($infoClient->email)->send(new EnvoiFactureTrajetClient($infoFacture));*/
            flash("Votre Facture vous a ete envpye par mail et par sms.")->success();
            return redirect('/finaliserPaiementTrajet');
        }
    }
}
