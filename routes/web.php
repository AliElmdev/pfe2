<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\MarcheController;
use App\Http\Controllers\Chef\CreateMarcheController;
use App\Http\Controllers\MarcheUnitereController;
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

<<<<<<< HEAD
<<<<<<< HEAD
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name("home");

=======
// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// })->name("home");
=======
// Route::get('/create_project', function () {
//     return view('chef.create_project');
// })->name("create_project");

Route::get("/create_project", [CreateMarcheController::class, "index"])->name("create_project")->middleware('auth');
Route::post("/create_project", [CreateMarcheController::class, "store"])->name("create_project")->middleware('auth');

>>>>>>> 1bef297d9cc3c0358481614f4ae00a338f631b5b

Route::get("/dashboard", [Dashboard::class, "index"])->name("dashboard")->middleware('auth');
>>>>>>> bdf2befa7da04d68063a7c439b32b8a5c29e3613
Route::post('/registration', [RegisterController::class, 'create_cost'])->name('registration');
Route::get("/opportuinities", [MarcheController::class, "index"])->name("Marches");
<<<<<<< HEAD
Route::get("/opportuinities/{id_marche}", [MarcheUnitereController::class, 'index'])->name("marchesunitere");
=======
Route::get("/marche/{id_marche}", [MarcheUnitereController::class, 'show'])->name("marchesunitere");
>>>>>>> 1bef297d9cc3c0358481614f4ae00a338f631b5b
