<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SimpleQRcodeController extends Controller
{
    // L'action "generate" de la route "simple-qrcode" (GET)
    public function generate()
    {

        # 2. On génère un QR code de taille 200 x 200 px
        //$qrcode = QrCode::size(200)->generate("Je suis un QR Code.reservation faite.Facture regle Nom : PANA 
        //Depart : Lome , Arrivee: Kara , montant :1 FCFA compagnie: ETRAB  ");

        // Un e-mail avec destinataire, sujet et message
        $qrcode = QrCode::size(200)->email("panasco20@gmail.com", "Salutations", "Bonjour Akili School ! Quoi de neuf ?");
        //$qrcode = QrCode::size(200)->generate("mailto:panasco20@gmail.com");
        //$qrcode = QrCode::size(200)->SMS("+22891510283", "Hello World !");


        # 3. On envoie le QR code généré à la vue "simple-qrcode"
        return view("simple-qrcode", compact('qrcode'));
    }
}
