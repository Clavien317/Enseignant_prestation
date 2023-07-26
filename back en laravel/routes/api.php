<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Profcontroller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('ajout/ajout_traitement', [Profcontroller::class, "ajout_traitement"]);
Route::get('/api/listeProf', [Profcontroller::class, "liste","prestation"]);
Route::get('/minprestation', [Profcontroller::class, "minPrestation"]);
Route::get('/maxprestation', [Profcontroller::class, "maxPrestation"]);
Route::get("/sommeprestation",[Profcontroller::class,"sommePrest"]);



Route::get('/ajout', [Profcontroller::class, "ajout"]);
Route::get("/supprimer/{id}", [Profcontroller::class, "delEnseign"]);

Route::get('/modifier/{id}', [Profcontroller::class, "modifier"]);
Route::post('/modifier/modifier_traitement', [Profcontroller::class, "modifier_traitement"]);

