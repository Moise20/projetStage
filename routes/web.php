<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pageAcceuilUtilisateurController;
use App\Http\Controllers\pageItinerairesVoyagesController;
use App\Http\Controllers\connexionAdministrateurController;
use App\Http\Controllers\inscriptionAdministrateurController;
use App\Http\Controllers\PasswordController;

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

//route pour la connexion de l'administrateur systeme
Route::get('/connexionAdministrateur',[connexionAdministrateurController::class,'formulaire']);
Route::post('/connexionAdministrateur',[connexionAdministrateurController::class,'traitement']);

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


//route pour l'inscription
//l'inscription se fait dans la table utilisateur
Route::get('/inscriptionAdministrateur', [inscriptionAdministrateurController::class,'formulaire']);
Route::post('/inscriptionAdministrateur', [inscriptionAdministrateurController::class,'traitement']);

Route::get('/page-de-garde',[pageDeGardeAdministrateurController::class,'affichage']);
