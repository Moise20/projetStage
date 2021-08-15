<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pageAcceuilUtilisateurController;
use App\Http\Controllers\pageItinerairesVoyagesController;
use App\Http\Controllers\connexionAdministrateurController;
use App\Http\Controllers\inscriptionAdministrateurController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\pageDeGardeAdministrateurController;
use App\Http\Controllers\inscriptionCompagnieController;
use App\Http\Controllers\connexionCompagnieController;
use App\Http\Controllers\pageDeGardeCompagnieController;
use App\Http\Controllers\PasswordCompagnieController;
use App\Http\Controllers\connexionClientController;
use App\Http\Controllers\inscriptionClientController;
use App\Http\Controllers\pageDeGardeClientController;
use App\Http\Controllers\PasswordClientController;
use App\Http\Controllers\compteAdminController;
use App\Http\Controllers\compteCompagnieController;
use App\Http\Controllers\compteClientController;
use App\Http\Controllers\agenceController;
use App\Http\Controllers\trajetController;
use App\Http\Controllers\busController;
use App\Http\Controllers\reserverBilletController;
use App\Http\Controllers\envoyerColisController;
use App\Http\Controllers\SimpleQRcodeController;
use App\Http\Controllers\userController;
use App\Http\Controllers\statistiqueController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Route::get('/',[MainController::class,'index'])->name('homepage');

Route::get('/page-acceuil', [pageAcceuilUtilisateurController::class, 'affichageVoyages_Colis']);
Route::get('/page-intineraires-voyages', [pageItinerairesVoyagesController::class, 'affichagesItenerairesVoyages']);
Route::get('/page-itineraires-colis', [pageItenerairesColisController::class, 'affichageItinerairesColis']);


/*--------------------------------------------------------------------------------------*/

Route::group([
    'middleware' => 'App\Http\Middleware\AuthAdministrateur',
], function () {

    //route por la deconnexion de l'administrateur
    Route::get('/deconnexionAdministrateur', [compteAdminController::class, 'deconnexion']);
    //route pour la page de garde de l'administrateur
    Route::get('/page-de-garde', [pageDeGardeAdministrateurController::class, 'affichage']);

    //route pour voir les informations de l'administrateur
    Route::get('/voirInformationsAdmin', [compteAdminController::class, 'traitementInformation']);

    //Route pour modifier les informations d'un administrateur
    Route::get('/modifierInformationsAdmin{id}', [
        'as' => 'modifierInformationsAdmin.show',
        'uses' => 'App\Http\Controllers\compteAdminController@modifInfoAdminFormulaire'
    ]);
    Route::post('/modifierInformationsAdmin', [compteAdminController::class, 'modifInfoAdminTraitement']);


    //route pour la modification du mot de passe d'un administrateur
    Route::get('/modification-passwordAdmin', [compteAdminController::class, 'modificationFormulaire']);
    Route::post('/modification-passwordAdmin', [compteAdminController::class, 'modificationTraitement']);

    //voir la liste des utilisateurs de la plateforme
    Route::get('/listeUser',[userController::class,'listeUser']);
    //supprimer un utilisateur
    Route::get('/supprimerUser{id}', [
        'as' => 'supprimerUser.show',
        'uses' => 'App\Http\Controllers\userController@supprimerUser'
    ]);

    //visualiser les statistiques de l'application
    Route::get('/statistiques',[statistiqueController::class,'voirStatistiques']);
    
});
//route pour l'inscription
//l'inscription se fait dans la table utilisateur
Route::get('/inscriptionAdministrateur', [inscriptionAdministrateurController::class, 'formulaire']);
Route::post('/inscriptionAdministrateur', [inscriptionAdministrateurController::class, 'traitement']);


//route pour la connexion de l'administrateur systeme
Route::get('/connexionAdministrateur', [connexionAdministrateurController::class, 'formulaire']);
Route::post('/connexionAdministrateur', [connexionAdministrateurController::class, 'traitement']);


//route pour reinitialiser le mot de passe
Route::get('password-reset', [PasswordController::class, 'showForm']);
Route::post('password-reset', [PasswordController::class, 'sendPasswordResetToken']);
/*Route::get('reset-password{token}',[ 
'as'=>'reset-password.show',
'uses'=>[PasswordController::class,'showPasswordResetForm']]);*/
Route::get('reset-password{token}', [
    'as' => 'reset-password.show',
    'uses' => 'App\Http\Controllers\PasswordController@showPasswordResetForm'
]);

Route::post('reset-password', [PasswordController::class, 'resetPassword']);

/*--------------------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------------------*/

Route::group([
    'middleware' => 'App\Http\Middleware\AuthCompagnie',
], function () {

    //Route pour la deconnexion du compte des compagnies
    Route::get('/deconnexionCompagnie', [compteCompagnieController::class, 'deconnexion']);

    //route pour la page de garde des compagnies
    Route::get('/page-de-gardeCompagnie', [pageDeGardeCompagnieController::class, 'affichage']);
    Route::get('/page-de-gardeCompagnieDeux', [pageDeGardeCompagnieController::class, 'affichageDeux']);

    //Route pour la modification du mot de passe du compte d'une compagnie
    Route::get('/modification-passwordCompagnie', [compteCompagnieController::class, 'modificationFormulaire']);
    Route::post('/modification-passwordCompagnie', [compteCompagnieController::class, 'modificationTraitement']);

    //route pour completer le profil d'une compagnie
    Route::get('/completerProfilCompagnie', [compteCompagnieController::class, 'formulaireProfil']);
    Route::post('/completerProfilCompagnie', [compteCompagnieController::class, 'traitementProfil']);
    //route pour voir les informations du compte d'une compagnie
    Route::get('/voirInformationsCompagnie', [compteCompagnieController::class, 'traitementInformation']);

    //Route pour modifier les informations d'une compagnie
    Route::get('/modifierInformationsCompagnie{id}', [
        'as' => 'modifierInformationsCompagnie.show',
        'uses' => 'App\Http\Controllers\compteCompagnieController@modifInfoCompagnieFormulaire'
    ]);
    Route::post('/modifierInformationsCompagnie', [compteCompagnieController::class, 'modifInfoCompagnieTraitement']);

    //route pour ajouter une nouvelle agence
    Route::get('/ajouterAgence', [agenceController::class, 'formulaire']);
    Route::post('/ajouterAgence', [agenceController::class, 'traitement']);
    Route::get('/listeAgence', [agenceController::class, 'liste']);
    Route::get('/modifierAgence{id}', [
        'as' => 'modifierAgence.show',
        'uses' => 'App\Http\Controllers\agenceController@formulaireModif'
    ]);
    Route::post('/modifierAgence', [agenceController::class, 'traitementModif']);

    //route pour ajouter un trajet de voyage
    Route::get('/ajouterTrajet', [trajetController::class, 'formulaire']);
    Route::post('/ajouterTrajet', [trajetController::class, 'traitement']);
    Route::get('/listeTrajet', [trajetController::class, 'listeTrajet']);
    Route::get('/modifierTrajet{id}', [
        'as' => 'modifierTrajet.show',
        'uses' => 'App\Http\Controllers\trajetController@formulaireModif'
    ]);
    Route::post('/modifierTrajet', [trajetController::class, 'traitementModif']);
    //route pour ajouter un bus
    Route::get('/ajouterBus', [busController::class, 'formulaire']);
    Route::post('/ajouterBus', [busController::class, 'traitement']);
    Route::get('/listeBus', [busController::class, 'listeBus']);
    Route::get('/modifierBus{id}', [
        'as' => 'modifierBus.show',
        'uses' => 'App\Http\Controllers\busController@formulaireModif'
    ]);
    Route::post('/modifierBus', [busController::class, 'traitementModif']);
});
//route pour l'inscription des compagnies
Route::get('/inscriptionCompagnie', [inscriptionCompagnieController::class, 'formulaire']);
Route::post('/inscriptionCompagnie', [inscriptionCompagnieController::class, 'traitement']);
//route pour la connexion des compagnies
Route::get('/connexionCompagnie', [connexionCompagnieController::class, 'formulaire']);
Route::post('/connexionCompagnie', [connexionCompagnieController::class, 'traitement']);




//route pour reinitialiser le mot de passe
Route::get('password-resetCompagnie', [PasswordCompagnieController::class, 'showForm']);
Route::post('password-resetCompagnie', [PasswordCompagnieController::class, 'sendPasswordResetToken']);
/*Route::get('reset-password{token}',[ 
'as'=>'reset-password.show',
'uses'=>[PasswordController::class,'showPasswordResetForm']]);*/
Route::get('resetpasswordCompagnie{token}', [
    'as' => 'resetpasswordCompagnie.show',
    'uses' => 'App\Http\Controllers\PasswordCompagnieController@showPasswordResetForm'
]);

Route::post('reset-passwordCompagnie', [PasswordCompagnieController::class, 'resetPassword']);




/*--------------------------------------------------------------------------------------*/

/*---------------------------------------------------------------------------------------*/

Route::group([
    'middleware' => 'App\Http\Middleware\AuthClient',
], function () {

    //route pour la deconnexion du compte client
    Route::get('/deconnexionClient', [compteClientController::class, 'deconnexion']);

    //route pour la page de garde des comptes clients
    Route::get('page-de-gardeClient', [pageDeGardeClientController::class, 'affichage']);


    //route pour la modification du mot de passe du compte d'un client
    Route::get('/modification-passwordClient', [compteClientController::class, 'modificationFormulaire']);
    Route::post('/modification-passwordClient', [compteClientController::class, 'modificationTraitement']);


    //route pour completer le profil du client 
    Route::get('/completerProfilClient', [compteClientController::class, 'formulaireProfil']);
    Route::post('/completerProfilClient', [compteClientController::class, 'traitementProfil']);
    //route pour voir les informations du compte d'un client
    Route::get('/voirInformationsClient', [compteClientController::class, 'traitementInformation']);

    //Route pour modifier les informations d'un client
    Route::get('/modifierInformationsClient{id}', [
        'as' => 'modifierInformationsClient.show',
        'uses' => 'App\Http\Controllers\compteClientController@modifInfoClientFormulaire'
    ]);
    Route::post('/modifierInformationsClient', [compteClientController::class, 'modifInfoClientTraitement']);

    //route pour reserver un billet de bus
    Route::get('/rechercherTrajet', [reserverBilletController::class, 'affichageFormulaire']);
    Route::post('/rechercherTrajet', [reserverBilletController::class, 'traitementAffichageTrajet']);
    Route::get('/reserverTrajet{id}', [
        'as' => 'reserverTrajet.show',
        'uses' => 'App\Http\Controllers\reserverBilletController@affichageReservationForm'
    ]);
    Route::post('/reserverTrajet', [reserverBilletController::class, 'traitementReservationForm']);



    //route pour envoyer un colis 
    Route::get('/envoyerColis', [envoyerColisController::class, 'affichageFormulaire']);
    Route::post('/envoyerColis', [envoyerColisController::class, 'traitement']);

    //liste des colis envoyes par un client sur notre plateforme
    Route::get('/listeColis', [envoyerColisController::class, 'liste']);

    //route pour modifier les infos d'un colis
    Route::get('/modifierColis{id}', [
        'as' => 'modifierColis.show',
        'uses' => 'App\Http\Controllers\envoyerColisController@formulaireModif'
    ]);
    Route::post('/modifierColis', [envoyerColisController::class, 'traitementModif']);


    //route pour le guide d'utilisation  
    Route::get('/regleReservation', [guideUtilisation::class, 'affichageRegleReservation']);
});
//Route::get('/finaliserPaiementTrajet',[reserverBilletController::class,'afficher']);
Route::get('/finaliserPaiementTrajet', [reserverBilletController::class, 'confirmerPaiement']);
Route::post('/finaliserPaiement', [reserverBilletController::class, 'TraitementFinaliserPaiement']);



//route pour l'inscription du client
Route::get('inscriptionClient', [inscriptionClientController::class, 'formulaire']);
Route::post('inscriptionClient', [inscriptionClientController::class, 'traitement']);


//route pour la connexion des clients a leur compte
Route::get('/connexionClient', [connexionClientController::class, 'formulaire']);
Route::post('/connexionClient', [connexionClientController::class, 'traitement']);



//route pour la reinitialisation du mot de passe d'un compte client
Route::get('/password-resetClient', [PasswordClientController::class, 'showForm']);
Route::post('/password-resetClient', [PasswordClientController::class, 'sendPasswordResetToken']);
Route::get('/resetpasswordClient{token}', [
    'as' => 'resetpasswordClient.show',
    'uses' => 'App\Http\Controllers\PasswordClientController@showPasswordResetForm'
]);
Route::post('reset-passwordClient', [PasswordClientController::class, 'resetPassword']);


/*----------------------------------------------------------------------------------------*/

Route::get('simple-qrcode',[SimpleQRcodeController::class,'generate']);

/*Route::get('/carte', function(){
    $config = array();
    $config['center'] = 'auto';
    $config['onboundschanged'] = 'if (!centreGot) {
            var mapCentre = map.getCenter();
            marker_0.setOptions({
                position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
            });
        }
        centreGot = true;';

    app('map')->initialize($config);

    // set up the marker ready for positioning
    // once we know the users location
    $marker = array();
    app('map')->add_marker($marker);

    $map = app('map')->create_map();
    echo "<html><head><script>var centreGot = false;</script>".$map['js']."</head><body>".$map['html']."</body></html>";
});
*/