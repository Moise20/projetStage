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

Route::get('/page-acceuil',[pageAcceuilUtilisateurController::class,'affichageVoyages_Colis']);
Route::get('/page-intineraires-voyages',[pageItinerairesVoyagesController::class,'affichagesItenerairesVoyages']);
Route::get('/page-itineraires-colis',[pageItenerairesColisController::class,'affichageItinerairesColis']);


/*--------------------------------------------------------------------------------------*/
//route pour l'inscription
//l'inscription se fait dans la table utilisateur
Route::get('/inscriptionAdministrateur', [inscriptionAdministrateurController::class,'formulaire']);
Route::post('/inscriptionAdministrateur', [inscriptionAdministrateurController::class,'traitement']);


//route pour la connexion de l'administrateur systeme
Route::get('/connexionAdministrateur',[connexionAdministrateurController::class,'formulaire']);
Route::post('/connexionAdministrateur',[connexionAdministrateurController::class,'traitement']);

//route por la deconnexion de l'administrateur
Route::get('/deconnexionAdministrateur',[compteAdminController::class ,'deconnexion']);
//route pour la page de garde de l'administrateur
Route::get('/page-de-garde',[pageDeGardeAdministrateurController::class,'affichage']);

//route pour la modification du mot de passe du compte administrateur
Route::get('/modification-passwordAdmin', [compteAdminController::class,'modificationFormulaire']);
Route::post('/modification-passwordAdmin', [compteAdminController::class,'modificationTraitement']);

//route pour reinitialiser le mot de passe
Route::get('password-reset', [PasswordController::class,'showForm']); 
Route::post('password-reset', [PasswordController::class,'sendPasswordResetToken']);
/*Route::get('reset-password{token}',[ 
'as'=>'reset-password.show',
'uses'=>[PasswordController::class,'showPasswordResetForm']]);*/
Route::get('reset-password{token}',[ 
    'as'=>'reset-password.show',
    'uses'=>'App\Http\Controllers\PasswordController@showPasswordResetForm']);
    
Route::post('reset-password', [PasswordController::class,'resetPassword']);

/*--------------------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------------------*/
//route pour l'inscription des compagnies
Route::get('/inscriptionCompagnie',[inscriptionCompagnieController::class,'formulaire']);
Route::post('/inscriptionCompagnie',[inscriptionCompagnieController::class,'traitement']);
//route pour la connexion des compagnies
Route::get('/connexionCompagnie',[connexionCompagnieController::class,'formulaire']);
Route::post('/connexionCompagnie',[connexionCompagnieController::class,'traitement']);

//route pour la page de garde des compagnies
Route::get('/page-de-gardeCompagnie',[pageDeGardeCompagnieController::class,'affichage']);
//Route pour la deconnexion du compte des compagnies
Route::get('/deconnexionCompagnie',[compteCompagnieController::class,'deconnexion']);

//Route pour la modification du mot de passe du compte d'une compagnie
Route::get('/modification-passwordCompagnie', [compteCompagnieController::class,'modificationFormulaire']);
Route::post('/modification-passwordCompagnie', [compteCompagnieController::class,'modificationTraitement']);

//route pour reinitialiser le mot de passe
Route::get('password-resetCompagnie', [PasswordCompagnieController::class,'showForm']); 
Route::post('password-resetCompagnie', [PasswordCompagnieController::class,'sendPasswordResetToken']);
/*Route::get('reset-password{token}',[ 
'as'=>'reset-password.show',
'uses'=>[PasswordController::class,'showPasswordResetForm']]);*/
Route::get('resetpasswordCompagnie{token}',[ 
    'as'=>'resetpasswordCompagnie.show',
    'uses'=>'App\Http\Controllers\PasswordCompagnieController@showPasswordResetForm']);
    
Route::post('reset-passwordCompagnie', [PasswordCompagnieController::class,'resetPassword']);

//route pour completer le profil d'une compagnie
Route::get('/completerProfilCompagnie',[compteCompagnieController::class,'formulaireProfil']);
Route::post('/completerProfilCompagnie',[compteCompagnieController::class,'traitementProfil']);
//route pour voir les informations du compte d'une compagnie
Route::get('/voirInformationsCompagnie',[compteCompagnieController::class,'traitementInformation']);

//Route pour modifier les informations d'une compagnie
Route::get('/modifierInformationsCompagnie{id}',[
    'as'=>'modifierInformationsCompagnie.show',
    'uses'=>'App\Http\Controllers\compteCompagnieController@modifInfoCompagnieFormulaire'
]);
Route::post('/modifierInformationsCompagnie',[compteCompagnieController::class,'modifInfoCompagnieTraitement']);

//route pour ajouter une nouvelle agence
Route::get('/ajouterAgence',[agenceController::class,'formulaire']);
Route::post('/ajouterAgence',[agenceController::class,'traitement']);
Route::get('/listeAgence',[agenceController::class,'liste']);
Route::get('/modifierAgence{id}',[
    'as'=>'modifierAgence.show',
    'uses'=>'App\Http\Controllers\agenceController@formulaireModif'
]);
Route::post('/modifierAgence',[agenceController::class,'traitementModif']);

//route pour ajouter un trajet de voyage
Route::get('/ajouterTrajet',[trajetController::class,'formulaire']);
Route::post('/ajouterTrajet',[trajetController::class,'traitement']);
Route::get('/listeTrajet',[trajetController::class,'listeTrajet']);
Route::get('/modifierTrajet{id}',[
    'as'=>'modifierTrajet.show',
    'uses'=>'App\Http\Controllers\trajetController@formulaireModif'
]);
Route::post('/modifierTrajet',[trajetController::class,'traitementModif']);
//route pour ajouter un bus
Route::get('/ajouterBus',[busController::class,'formulaire']);
Route::post('/ajouterBus',[busController::class,'traitement']);
Route::get('/listeBus',[busController::class,'listeBus']);
Route::get('/modifierBus{id}',[
    'as'=>'modifierBus.show',
    'uses'=>'App\Http\Controllers\busController@formulaireModif'
]);
Route::post('/modifierBus',[busController::class,'traitementModif']);


/*--------------------------------------------------------------------------------------*/

/*---------------------------------------------------------------------------------------*/
//route pour l'inscription du client
Route::get('inscriptionClient',[inscriptionClientController::class,'formulaire']);
Route::post('inscriptionClient',[inscriptionClientController::class,'traitement']);

//route pour la page de garde des comptes clients
Route::get('page-de-gardeClient',[pageDeGardeClientController::class,'affichage']);

//route pour la connexion des clients a leur compte
Route::get('/connexionClient',[connexionClientController::class, 'formulaire']);
Route::post('/connexionClient',[connexionClientController::class,'traitement']);

//route pour la deconnexion du compte client
Route::get('/deconnexionClient',[compteClientController::class,'deconnexion']);

//route pour la modification du mot de passe du compte d'un client
//Route pour la modification du mot de passe du compte d'une compagnie
Route::get('/modification-passwordClient', [compteClientController::class,'modificationFormulaire']);
Route::post('/modification-passwordClient', [compteClientController::class,'modificationTraitement']);

//route pour la reinitialisation du mot de passe d'un compte client
Route::get('/password-resetClient',[PasswordClientController::class,'showForm']); 
Route::post('/password-resetClient',[PasswordClientController::class,'sendPasswordResetToken']);
Route::get('/resetpasswordClient{token}',[
    'as'=>'resetpasswordClient.show',
    'uses'=>'App\Http\Controllers\PasswordClientController@showPasswordResetForm'
]);
Route::post('reset-passwordClient',[PasswordClientController::class,'resetPassword']);

/*----------------------------------------------------------------------------------------*/

