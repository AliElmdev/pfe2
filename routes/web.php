<?php

use App\Http\Controllers\AllUsersController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\MarcheController;
use App\Http\Controllers\Chef\CreateMarcheController;
use App\Http\Controllers\CreateUsersController;
use App\Http\Controllers\EcMarcheCreationController;
use App\Http\Controllers\MarcheUnitereController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Entreprise\PostulationController;
use App\Http\Controllers\ListEntreprisesController;
use App\Http\Controllers\Selection_RFIController;
use App\Http\Controllers\SelectionCommercialController;
use App\Http\Controllers\SelectionFichier_TechniqueController;
use App\Http\Controllers\ValiderInscriptionController;
use Illuminate\Support\Facades\Auth;

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
    return view('homepage');
})->name('Home');
Route::get('/Faq', function () {
    return view('Faq');
})->name('Faq');

Route::get('/all_users', function () {
    return view('admin.users');
})->name("users");

// Route::get('/postulation/{id}', function () {
//     return view('entreprise.postuler');
// })->name("postulation");

// Route::get('/EcMarcheCreationController', function () {
//     return view('en');
// })->name("postulation");

Route::get('/ValiderInscription/{id}', [ValiderInscriptionController::class, "index"])->name("ValiderInscription");
Route::get('/ValiderInscription/{id}/{valider}', [ValiderInscriptionController::class, "edit"]);

//Creation marche achat
Route::get("/Marches-en-cours-creation", [EcMarcheCreationController::class, 'showEtatZero'])->name("marcheEnCoursCreation");
Route::get("/Marches-en-cours-creation/{id}", [EcMarcheCreationController::class, 'show'])->name("marcheUnitEnCoursCreations");  
Route::post("/Marches-en-cours-creation-valider", [EcMarcheCreationController::class, 'store'])->name("marcheUnitEnCoursCreation");

Auth::routes();

//Selection

Route::get('/ouverture_commercial/{id}', [SelectionCommercialController::class, "show"])->name("selection_commercial")->middleware('auth');

//Postulations

Route::get('/postulation/{id}', [PostulationController::class, "show"])->name("postulation")->middleware('auth');
Route::post('/postulation/{id}', [PostulationController::class, "store"])->name("postulation")->middleware('auth');



//Create Users
Route::get("/create_user", [CreateUsersController::class, "index"])->name("create_user")->middleware('auth');
Route::post("/create_user", [CreateUsersController::class, "store"])->name("create_user_store")->middleware('auth');

//Show Entreprises
Route::get("/entreprises", [ListEntreprisesController::class, "index"])->name("entreprises")->middleware('auth');

//Show all users in admin panel

Route::delete('/all_users/delete/{id}', [AllUsersController::class, "destroy"])->middleware('auth');
Route::get("/all_users", [AllUsersController::class, "index"])->name("users")->middleware('auth');
Route::post("/Modify_user/{id}", [AllUsersController::class, "edit"])->name("edit_user")->middleware('auth');


Route::get("/create_project", [CreateMarcheController::class, "index"])->name("create_project")->middleware('auth');
Route::post("/create_project", [CreateMarcheController::class, "store"])->name("create_project")->middleware('auth');

Route::get("/dashboard", [Dashboard::class, "index"])->name("dashboard")->middleware('auth');
Route::post('/registration', [RegisterController::class, 'create_cost'])->name('registration');
Route::get("/opportuinities", [MarcheController::class, "index"])->name("Marches");
Route::get("/opportuinitie/{id_marche}", [MarcheUnitereController::class, 'show'])->name("marchesunitere");

// postulation marches
// Route::get('/marche/{id_marche}/postulation', [PostulationController::class, 'show'])->name('postulation');

//Selection RFI 
Route::get("/selection_RFI/{id_marche}", [Selection_RFIController::class, "index"])->name("selection_rfi");
Route::get("/selection_RFI/{id_marche}/{id_entreprise}-{id_postulation}", [Selection_RFIController::class, "show"])->name("selection_rfi_details");
Route::get("/selection_RFI/{id_marche}/{id_entreprise}-{id_postulation}/accept", [Selection_RFIController::class, "accept"])->name("selection_rfi_accept");
Route::get("/selection_RFI/{id_marche}/{id_entreprise}-{id_postulation}/refuse", [Selection_RFIController::class, "refuse"])->name("selection_rfi_refuse");
//Selection Fichier Technique
Route::get("/selection_Fichier_Technique/{id_marche}", [SelectionFichier_TechniqueController::class, "index"])->name("selection_fichierTechnique");
Route::get("/selection_Fichier_Technique/{id_marche}/{id_entreprise}-{id_postulation}", [SelectionFichier_TechniqueController::class, "show"])->name("selection_fichierTechnique_details");
Route::get("/selection_Fichier_Technique/{id_marche}/{id_entreprise}-{id_postulation}/accept", [SelectionFichier_TechniqueController::class, "accept"])->name("selection_fichierTechnique_accept");
Route::get("/selection_Fichier_Technique/{id_marche}/{id_entreprise}-{id_postulation}/refuse", [SelectionFichier_TechniqueController::class, "refuse"])->name("selection_fichierTechnique_refuse");
