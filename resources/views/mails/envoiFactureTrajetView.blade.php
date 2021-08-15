<h3><b>Bonjour Monsieur/Madame</b></h3>
Suite  a la reservation de billet de bus que vous avez effectuer sur notre plateforme,<br>
nous vous envoyons ce mail.<br>
Les informations de la facture sont :  <br>
Nom du Passager Principal : {{$infoFacture->infoPassPrincip}} <br>
montant net Payer :   {{$infoFacture->cout}} F CFA <br>
Ville depart : {{$infoFacture->villeDepart}} <br>
Ville arrivee : {{$infoFacture->villeArrivee}} <br>
Heure Depart : {{$infoFacture->heureDepart}} <br>
Heure Arrivee : {{$infoFacture->heureArrivee}} <br>
Le depart est prevu pour le {{$infoFacture}} au siege de la compagnie {{$infoFacture->nom}}<br> 
de {{$infoFacture->ville}} a {{$infoFacture->adresse}} .

Soyez la 30 min avant l'heure de depart <br>

Merci d'avoir effectue une reservation sur notre plateforme. <br>

<h3>Bonne journee a vous .</h3>