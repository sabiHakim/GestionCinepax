<?php

use App\Http\Controllers\CinepaxController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login.pages-login');
});
Route::post('/login',[CinepaxController::class,'DoLogin'])->name('login');
Route::get('/Doinscri',[CinepaxController::class,'DoInscri'])->name('Doinscri');
Route::get('/acceuilAdmin',[CinepaxController::class,'acceuilAdmin'])->name('acceuilAdmin');
Route::get('/logout',[CinepaxController::class,'logout'])->name('logout');
Route::get('/inscri',[CinepaxController::class,'Inscri'])->name('inscri');
Route::get('/acceuil',[CinepaxController::class,'Acceuil'])->name('acceuil');
Route::get('/sceanceReserve/{id}', [CinepaxController::class, 'sceanceReserve']);
Route::get('/reservation', [CinepaxController::class, 'reservation'])->name('reservation');
Route::get('/vuePlace/{id}',[CinepaxController::class, 'vuePlace']);
Route::get('/film',[CinepaxController::class, 'film']);
Route::get('/filmstat/{id}',[CinepaxController::class, 'filmstat'])->name('filmstat');
Route::get('/tableauBord',[CinepaxController::class, 'tb'])->name('tableauBord');
Route::get('/getableauBord',[CinepaxController::class, 'getableauBord'])->name('getableauBord');
Route::get('/addsceance',[CinepaxController::class, 'addsceance'])->name('addsceance');
Route::get('/doAddsceance',[CinepaxController::class, 'doAddsceance'])->name('doAddsceance');
Route::get('/ticket',[CinepaxController::class, 'ticket'])->name('ticket');
Route::get('/detailTicket/{id}',[CinepaxController::class, 'detailTicket'])->name('detailTicket');
Route::get('/exportPdf',[CinepaxController::class, 'exportPdf'])->name('exportPdf');





