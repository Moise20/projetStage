<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Trajet;
use Facade\FlareClient\Http\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\EnvoiFactureTrajetClient;

class reserverBilletController extends Controller
{
    public function affichageFormulaire()
    {
        return view('affichageSearchTrajetForm');
    }

    public function traitementAffichageTrajet()
    {
        request()->validate([

            'villeArrivee' => ['required'],

            'dateDepart' => ['required'],

        ]);

        $villeArrive = request('villeArrivee');
        $dateDepart = request('dateDepart');
        $trajet = Trajet::where('villeArrivee', $villeArrive)
            ->where('dateDepart', $dateDepart)
            ->get();
        //$agence= $trajet->nom ;

        if (($trajet->isEmpty())) {
            flash("Aucun trajet disponible ne convient a votre recherche.")->error();
            return redirect('/rechercherTrajet');
        } else {
            return view('affichageTrajetDispo', [
                'trajets' => $trajet,
                //'agences'=>$agence,
            ]);
        }
    }

    public function affichageReservationForm($id)
    {
        $trajet = Trajet::findOrFail($id);
        $trajet_id = $trajet->id;
        $user = auth()->user();
        $client_id = $user->id;
        return view('reservationForm', [
            'trajet_id' => $trajet_id,
            'client_id' => $client_id,
        ]);
    }


    /*public function traitementReservationForm ()
    {
        request()->validate([

           
            'nbrPassager' => ['required'],
            'infoPassPrincip' => ['required'],
            'tel' => ['required'],
            'typeBillet' => ['required'],
            'trajet_id' => ['required'],
            'client_id' => ['required'],
        ]);

        $tel= request('tel');
        

        $trajet_id = request('trajet_id');
        $trajet = Trajet::findOrFail($trajet_id);
        $montant = $trajet->tarif;
        $nbrPassager = request('nbrPassager');

        $reponse= 

       
        $queryString = http_build_query([
            'auth_token' => '185dae72-1d61-4a59-87aa-04846f5fe633',
            'phone_number'=>$tel,
            'amount'=>$montant,
            'identifier'=>Str::random(60),
            //'url'=> 'finaliserPaiementTrajet',

            
        ]);

        
        $ch = curl_init(sprintf('%s?%s', 'https://paygateglobal.com/v1/page', $queryString));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $json = curl_exec($ch);
        curl_close($ch);


        $api_result = json_decode($json, true);
        $tab = $api_result;
        //$status= $tab->status;
        //$tx_reference=$tab->tx_reference;
        /*$trajet_id = request('trajet_id');
        $client_id = request('client_id');
        $tel       = request('tel');
        $nbrPassager= request('nbrPassager');
        $infoPassPrincip = request('infoPassPrincip');
        $typeBillet = request('typeBillet');
        return view('testApiPaygate',[
            //'status'=>$status,
            //'tx_reference'=>$tx_reference,
            'tab'=>$tab,
            //'trajet_id'=>$trajet_id,
            //'tel'=>$tel,
            //'montant'=>$montant,
            //'nbrPassager'=>$nbrPassager,
            //'infoPassPrincip'=>$infoPassPrincip,
            //'typeBillet'=>$typeBillet,
            //'client_id'=>$client_id,


        ]);

        /*$trajet_id = request('trajet_id');
        $trajet = Trajet::findOrFail($trajet_id);
        $montant = $trajet->tarif;
        $nbrPassager = request('nbrPassager');

        /*$reservation = Reservation::create([
            'nbrPassager'=>request('nbrPassager'),
            'infoPassPrincip'=>request('infoPassPrincip'),
            'tel'=>request('tel'),
            'typeBillet'=>request('typeBillet'),
            'cout'=> $montant*$nbrPassager,
            'trajet_id'=>request('trajet_id'),
            'client_id'=>request('client_id'),
        ]);
        

    }*/

    public function traitementReservationForm()
    {

        request()->validate([


            'nbrPassager' => ['required', 'numeric'],
            'infoPassPrincip' => ['required', 'alpha'],
            'tel' => ['required','regex:/^9[0-9]{7}/'],
            'typeBillet' => ['required'],
            'trajet_id' => ['required', 'numeric'],
            'client_id' => ['required', 'numeric'],
        ]);

        $trajet_id = request('trajet_id');
        $trajet = Trajet::findOrFail($trajet_id);
        $tarif = $trajet->tarif;
        //$random= rand(1, 10000);
        $nombrePassager = request('nbrPassager');
        $nbr = Trajet::where('id', $trajet_id)->first();
        $nbrPlace = $nbr->nbrPlace;
        if ($nombrePassager > $nbrPlace) {
            flash("Le nombre de place restant est de $nbrPlace.Veuillez choisir le nombre de passager en tenant compte de ce nombre")->error();
            return redirect('/rechercherTrajet');
        } else if($nbrPlace == 0)
        {
            flash("Il n'a plus de places disponibles pour ce trajet. Veuillez consulter un autre trajet")->error();
            return redirect('/rechercherTrajet');  
        }
        else {
            //dd($nbrPlace);

            $reservation = Reservation::create([
                'nbrPassager' => request('nbrPassager'),
                'infoPassPrincip' => request('infoPassPrincip'),
                'tel' => request('tel'),
                'typeBillet' => request('typeBillet'),
                'cout' => $tarif,
                'identifiantTransaction' => rand(1, 10000),

                'statutPaiement' => 'en attente',
                'trajet_id' => request('trajet_id'),
                'client_id' => request('client_id'),
            ]);
            $nbrPlaceRestant= $nbrPlace - $nombrePassager;
            $trajetss = Trajet::where('id', $trajet_id)->update([
                'nbrPlace' => $nbrPlaceRestant,
                
            ]);

            $dernierEnregistrement = DB::table('reservations')->latest('id')->first();


            $tel = request('tel');
            //$nbrPassager = request('nbrPassager');
            //$montant = $tarif * $nbrPassager;

            $api_token = '185dae72-1d61-4a59-87aa-04846f5fe633';
            $amount = $tarif;
            $phone = $tel;
            $description = 'payement du billet de bus';
            $returnUrl = 'http://localhost:8000/finaliserPaiementTrajet';
            $identifiant = $dernierEnregistrement->identifiantTransaction;

            $paygatePortal = "https://paygateglobal.com/v1/page" . "?token=$api_token" . "&amount=$amount" . "&description=$description" . "&identifier=$identifiant" . "&url=$returnUrl" . "&phone=$phone";

            return redirect($paygatePortal);
        }
    }

    /*public function afficher()
    {
        return view('testApiPaygate');
    }*/

    /*public function finaliserPaiement()
    {

        $dernierEnregistrement = DB::table('reservations')->latest('id')->first();
        $identifier = $dernierEnregistrement->identifiantTransaction;
        //$identifiant = request('identifier');
        //$payement_references = request('payment_reference');
        //$tax_references = request('tx_reference');
        /*$queryString = http_build_query([
            'auth_token' => '185dae72-1d61-4a59-87aa-04846f5fe633',
            //'phone_number'=>$tel,
            //'amount'=>$montant,
            'identifier'=>$identifier,
            //'url'=> 'finaliserPaiementTrajet',

            
        ]);

        
        $ch = curl_init(sprintf('%s?%s', 'https://paygateglobal.com/api/v2/status', $queryString));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $json = curl_exec($ch);
        curl_close($ch);


        $api_result = json_decode($json, true);
        $tab = $api_result;
        //$status= $tab->status;
        //$tx_reference=$tab->tx_reference;
        //$client = new Client();
        $cle = '185dae72-1d61-4a59-87aa-04846f5fe633';
        $response = Http::post('https://paygateglobal.com/api/v2/status', [

            'auth_token' => $cle,

            'identifier' => $identifier,

        ]);
        $response = json_decode($response->getBody());

        //dd($response);


        return view('finaliserPaiementTrajet', [
            //'tab'=>$tab,
            //'identifiant'=>$identifiant,
            //'payement_references'=>$payement_references,
            //'tax_references'=>$tax_references,
            //'identifier'=>$identifier,
            'response' => $response
        ]);
    }*/
    public function confirmerPaiement()
    {
        return view('confirmerPaiementTrajet');
    }

    /*public function TraitementFinaliserPaiement()
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
        $status = $response->status;
        $identifiant = $response->identifier;
        if ($status != 0) {
            flash("Erreur.Paiement non effectue")->error();
            return redirect('page-de-gardeClient');
        } else {
            //$reservation = Reservation::where('identifiantTransaction',$identifiant)->get();
            $reservations = Reservation::findOrFail($identifiant);
            $id = $reservations->id;
            $tx_reference = $reservations->tx_reference;
            
            $reservation = Reservation::where('id', $id)->update([
                'statutPaiement' => 'paiement effectue',
                'tx_reference' => $tx_reference,
            ]);

            $infoFacture = DB::table('reservations')
                         ->join('trajets','reservations.trajet_id','=','trajets.id')
                         ->join('agences','trajets.agence_id','=','agences.id')
                         ->join('users','agences.user_id','=','users.id')
                         ->select('reservations.nbrPassager','reservations.infoPassPrincip','reservations.typeBillet',
                        'reservations.cout','reservations.identifiantTransaction','reservations.statutPaiement',
                    'trajets.villeDepart','trajets.villeArrivee','trajets.heureDepart','trajets.heureArrivee','trajets.dateDepart',
                'users.nom','users.localisation','agences.adresse','agences.ville')
                ->get();

                $infoClient = DB::table('reservations')
                ->join('users','reservations.client_id','=','users.id')
                ->select('users.email')
                ->get();

                Mail::to($infoClient->email)->send(new EnvoiFactureTrajetClient($infoFacture));
            flash("Votre Facture vous a ete envpye par mail et par sms.")->success();
            return redirect('/page-de-gardeClient');
        }
    }*/
}
