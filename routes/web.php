<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ChateController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\MarcheController;
use App\Http\Controllers\Chef\CreateMarcheController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MarcheUnitereController;
use App\Http\Controllers\PostulationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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

Route::get('/', [HomeController::class, "show"])->name('Home');
Route::get('/Faq', [FaqController::class, 'show'])->name('Faq');

Auth::routes();

Route::get("/create_project", [CreateMarcheController::class, "index"])->name("create_project")->middleware('auth');
Route::post("/create_project", [CreateMarcheController::class, "store"])->name("create_project")->middleware('auth');

Route::get("/dashboard", [Dashboard::class, "index"])->name("dashboard")->middleware('auth');
Route::post('/registration', [RegisterController::class, 'create_cost'])->name('registration');
Route::get("/opportuinities", [MarcheController::class, "index"])->name("Marches");
Route::get("/opportuinitie/{id_marche}", [MarcheUnitereController::class, 'show'])->name("marchesunitere");

// postulation marches
Route::get('/marche/{id_marche}/postulation', [PostulationController::class, 'show'])->name('postulation');
//contact 
Route::get('/marche/{id_marche}/chats', [ChateController::class, 'enregister'])->name('chats');

// Route::get('/messages', function () {
//     return view('entreprise.chat');
// });
