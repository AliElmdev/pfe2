<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\MarcheController;
use App\Http\Controllers\Chef\CreateMarcheController;
use App\Http\Controllers\EcMarcheCreationController;
use App\Http\Controllers\MarcheUnitereController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Entreprise\PostulationController;
use App\Http\Controllers\MessageChefController;
use App\Http\Controllers\messagerieController;
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

Route::get("/marche/{id_marche}/message", [MessagerieController::class, 'enregister'])->name('chats');
Route::get("/marche/boite_message", [MessageChefController::class, 'index'])->name('chats_chef');
Route::get("/marche/liste_entreprise/{id_marche?}", [MessageChefController::class, 'show'])->name('chat_entreprise');
Route::get("/marche/message_chef_entreprise/{id_marche?}/{entreprise_id?}", [MessageChefController::class, 'enregister'])->name('chat_chef_entreprise');
