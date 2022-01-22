<?php

use App\Http\Controllers\AllUsersController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\MarcheController;
use App\Http\Controllers\Chef\CreateMarcheController;
use App\Http\Controllers\EcMarcheCreationController;
use App\Http\Controllers\Entreprise\PostulationController;
use App\Http\Controllers\MarcheUnitereController;
use Illuminate\Support\Facades\Route;
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

Route::get('/postulation/{id}', function () {
    return view('entreprise.postuler');
})->name("postulation");

Auth::routes();


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name("home");



// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// })->name("home");

// Route::get('/create_project', function () {
//     return view('chef.create_project');
// })->name("create_project");

Route::get('/postulation/{id}', [PostulationController::class, "show"])->name("postulation")->middleware('auth');


Route::delete('/all_users/delete/{id}', [AllUsersController::class, "destroy"])->middleware('auth');
Route::get("/all_users", [AllUsersController::class, "index"])->name("users")->middleware('auth');
Route::post("/Modify_user/{id}", [AllUsersController::class, "edit"])->name("edit_user")->middleware('auth');


Route::get("/create_project", [CreateMarcheController::class, "index"])->name("create_project")->middleware('auth');
Route::post("/create_project", [CreateMarcheController::class, "store"])->name("create_project")->middleware('auth');


Route::get("/dashboard", [Dashboard::class, "index"])->name("dashboard")->middleware('auth');

Route::post('/registration', [RegisterController::class, 'create_cost'])->name('registration');
Route::get("/opportuinities", [MarcheController::class, "index"])->name("Marches");
Route::get("/opportuinities/{id_marche}", [MarcheUnitereController::class, 'show'])->name("marchesunitere");

Route::get("/Marches-en-cours-creation", [EcMarcheCreationController::class, 'showEtatZero'])->name("marcheEnCoursCreation");
Route::get("/Marches-en-cours-creation/{id}", [EcMarcheCreationController::class, 'show'])->name("marcheUnitEnCoursCreations");
Route::post("/Marches-en-cours-creation-valider", [EcMarcheCreationController::class, 'store'])->name("marcheUnitEnCoursCreation");
