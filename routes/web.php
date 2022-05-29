<?php

use App\Http\Controllers\Admin\GestionMarchesAdminController;
use App\Http\Controllers\Admin\StatistiqueCategoriesController;
use App\Http\Controllers\Admin\StatistiqueEntreprisesController;
use App\Http\Controllers\AllUsersController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\MarcheController;
use App\Http\Controllers\Chef\CreateMarcheController;
use App\Http\Controllers\CreateUsersController;
use App\Http\Controllers\EcMarcheCreationController;
use App\Http\Controllers\Entreprise\GestionMarchesEntreprisesController;
use App\Http\Controllers\MarcheUnitereController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Entreprise\PostulationController;
use App\Http\Controllers\ListEntreprisesController;
use App\Http\Controllers\Gestion_Marches_ChefController;
use App\Http\Controllers\OuvertureController;
use App\Http\Controllers\OuvertureMarcheController;
use App\Http\Controllers\RolePermissionEditController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Selection_RFIController;
use App\Http\Controllers\SelectionCommercialController;
use App\Http\Controllers\SelectionFichier_TechniqueController;
use App\Http\Controllers\StatisticsMarchesController;
use App\Http\Controllers\StatistiqueController;
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



Route::get('/ValiderInscription/{id}', [ValiderInscriptionController::class, "index"])->name("ValiderInscription");
Route::get('/ValiderInscription/{id}/{valider}', [ValiderInscriptionController::class, "edit"]);

//Creation marche achat
Route::get("/Marches-en-cours-creation", [EcMarcheCreationController::class, 'showEtatZero'])->name("marcheEnCoursCreation")->middleware('auth');
Route::get("/Marches-en-cours-creation/{id}", [EcMarcheCreationController::class, 'show'])->name("marcheUnitEnCoursCreations")->middleware('auth');
Route::post("/Marches-en-cours-creation-valider", [EcMarcheCreationController::class, 'store'])->name("marcheUnitEnCoursCreation")->middleware('auth');

Auth::routes();

//Selection

Route::get('/ouverture_commercial/{id}', [SelectionCommercialController::class, "show"])->name("selection_commercial")->middleware('auth');
Route::get('/min_prix_produit/{id}', [SelectionCommercialController::class, "min_prix_produit"])->name("min_prix_produit")->middleware('auth');
Route::get('/min_prix_marche/{id}', [SelectionCommercialController::class, "min_prix_marche"])->name("min_prix_marche")->middleware('auth');
Route::get('/best_prixqualite_produit/{id}', [SelectionCommercialController::class, "best_prixqualite_produit"])->name("best_prixqualite_produit")->middleware('auth');
Route::get('/best_prixqualite_marche/{id}', [SelectionCommercialController::class, "best_prixqualite_marche"])->name("best_prixqualite_marche")->middleware('auth');
Route::post('/ouverture_commercial/{id}', [SelectionCommercialController::class, "store"])->name("selection_commercial_store")->middleware('auth');
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

//Selection RFI 
Route::get("/selection_RFI/{id_marche}", [Selection_RFIController::class, "index"])->name("selection_rfi")->middleware('auth');
Route::get("/selection_RFI/{id_marche}/{id_entreprise}-{id_postulation}", [Selection_RFIController::class, "show"])->name("selection_rfi_details")->middleware('auth');
Route::get("/selection_RFI/{id_marche}/{id_entreprise}-{id_postulation}/accept", [Selection_RFIController::class, "accept"])->name("selection_rfi_accept")->middleware('auth');
Route::get("/selection_RFI/{id_marche}/{id_entreprise}-{id_postulation}/refuse", [Selection_RFIController::class, "refuse"])->name("selection_rfi_refuse")->middleware('auth');
//Selection Fichier Technique
Route::get("/selection_Fichier_Technique/{id_marche}", [SelectionFichier_TechniqueController::class, "index"])->name("selection_fichierTechnique")->middleware('auth');
Route::get("/selection_Fichier_Technique/{id_marche}/{id_entreprise}-{id_postulation}", [SelectionFichier_TechniqueController::class, "show"])->name("selection_fichierTechnique_details")->middleware('auth');
Route::get("/selection_Fichier_Technique/{id_marche}/{id_entreprise}-{id_postulation}/accept", [SelectionFichier_TechniqueController::class, "accept"])->name("selection_fichierTechnique_accept")->middleware('auth');
Route::get("/selection_Fichier_Technique/{id_marche}/{id_entreprise}-{id_postulation}/refuse", [SelectionFichier_TechniqueController::class, "refuse"])->name("selection_fichierTechnique_refuse")->middleware('auth');
// Gestion marchées admin
Route::get("/marches_en_cours_admin", [GestionMarchesAdminController::class, "current"])->name("marches_en_cours_admin")->middleware('auth');
Route::get("/marches_fermes_admin", [GestionMarchesAdminController::class, "closed"])->name("marches_fermes_admin")->middleware('auth');
Route::get("/marches_termines_admin", [GestionMarchesAdminController::class, "ended"])->name("marches_termines_admin")->middleware('auth');
Route::get("/tous_les_marches_admin", [GestionMarchesAdminController::class, "index"])->name("tous_marches_admin")->middleware('auth');
// Gestion marchées chef
Route::get("/marches-en-cours-{id_chef}", [Gestion_Marches_ChefController::class, "current"])->name("marches_en_cours_chef")->middleware('auth');
Route::get("/marches-fermes-{id_chef}", [Gestion_Marches_ChefController::class, "closed"])->name("marches_fermes_chef")->middleware('auth');
Route::get("/marches-termines-{id_chef}", [Gestion_Marches_ChefController::class, "ended"])->name("marches_termines_chef")->middleware('auth');
Route::get("/tous-les-marches-{id_chef}", [Gestion_Marches_ChefController::class, "index"])->name("tous-marches_chef")->middleware('auth');
// Gestion marchées achat
Route::get("/marches_en_cours_achat", [EcMarcheCreationController::class, "current"])->name("marches_en_cours_achat")->middleware('auth');
Route::get("/marches_fermes_achat", [EcMarcheCreationController::class, "closed"])->name("marches_fermes_achat")->middleware('auth');
Route::get("/marches_termines_achat", [EcMarcheCreationController::class, "ended"])->name("marches_termines_achat")->middleware('auth');
Route::get("/tous_les_marches_achat", [EcMarcheCreationController::class, "index"])->name("tous_marches_achat")->middleware('auth');
// Gestion marchées entreprise
Route::get("/marches_rfi", [GestionMarchesEntreprisesController::class, "rfi"])->name("marches_rfi")->middleware('auth');
Route::get("/marches_rfq", [GestionMarchesEntreprisesController::class, "rfq"])->name("marches_rfq")->middleware('auth');
Route::get("/marches_gagner", [GestionMarchesEntreprisesController::class, "gagner"])->name("marches_gagner")->middleware('auth');
Route::get("/tous_les_marches", [GestionMarchesEntreprisesController::class, "tous"])->name("tous_marches_achat")->middleware('auth');
Route::get("/marches_refuser", [GestionMarchesEntreprisesController::class, "refuser"])->name("marches_refuser")->middleware('auth');


//Statistiques
Route::get("/Statistique", [StatistiqueController::class, "index"])->name("Statistique")->middleware('auth');
//admin statistiques
Route::get("/StatistiqueEntrepriseInscrits", [StatistiqueEntreprisesController::class, "index"])->middleware('auth');
Route::get("/StatistiqueMarchesCategories", [StatistiqueCategoriesController::class, "index"])->middleware('auth');


Route::get("/RolePermissionEdit", [RolePermissionEditController::class, "index"])->name("RolePermissionEdit")->middleware('auth');
Route::post("/AddRoleUser/new", [RolePermissionEditController::class, "storeroleuser"])->name("AddRoleUserNew")->middleware('auth');
Route::get("/AddRoleUser", [RolePermissionEditController::class, "indexroleuser"])->name("AddRoleUser")->middleware('auth');
Route::post("/AddRolePermission/new", [RolePermissionEditController::class, "storerolepermission"])->name("AddRolePermissionNew")->middleware('auth');
Route::get("/AddRolePermission", [RolePermissionEditController::class, "indexrolepermission"])->name("AddRolePermission");
Route::get("/profile{id}", [ProfileController::class, "show"])->name("profile")->middleware('auth');
Route::post("/profile{id}modifier", [ProfileController::class, "update"])->name("modifierProfile")->middleware('auth');

//statistiques
Route::get("/statistics_chef/{id}", [StatisticsMarchesController::class, "data_chef"])->name("statisticsInfo_chef")->middleware('auth');
Route::get("/statistics_chef", [StatisticsMarchesController::class, "home_chef"])->name("statistics_chef")->middleware('auth');
Route::get("/statistics_achat/{id}", [StatisticsMarchesController::class, "data_achat"])->name("statisticsInfo_achat")->middleware('auth');
Route::get("/statistics_achat", [StatisticsMarchesController::class, "home_achat"])->name("statistics_achat")->middleware('auth');

Route::get("/Ouverture", [OuvertureController::class, "index"])->name("Ouverture")->middleware('auth');
Route::get("/ouverture-marche/{id}", [OuvertureMarcheController::class, "index"])->name("ouvertureMarche")->middleware('auth');
