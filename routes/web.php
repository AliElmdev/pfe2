<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MarcheController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarcheUnitereController;

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
// Route::get('/Opportuinities', function () {
//     return view('Marches');
// })->name("Marches");

Auth::routes();

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name("home");

Route::post('/registration', [RegisterController::class, 'create_cost'])->name('registration');
Route::get("/opportuinities", [MarcheController::class, "index"])->name("Marches");
Route::get("/opportuinities/{id_marche}", [MarcheUnitereController::class, 'index'])->name("marchesunitere");
