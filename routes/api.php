<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\CandidatureController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\PaysController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SousCategorieController;
use App\Http\Controllers\VilleController;

//n=> non authentification

Route::post("n/user/login",[UserController::class,"login"]);
Route::post("n/user/register",[UserController::class,"store"]);
Route::get('n/pays',[PaysController::class,"index"]);


Route::middleware('auth:sanctum')->group(function() {
      Route::get('test', function (Request $request){
        return $request->user();
      });
     Route::get("logout", [UserController::class,"logout"]);
     Route::post("attach/role", [RoleController::class, "attachRole"]);
     Route::resources([
        "annonce" => AnnonceController::class,
        "categorie" => CategorieController::class,
        "sous-categorie" => SousCategorieController::class,
        "pays" => PaysController::class,
        "ville" => VilleController::class,
        "role" => RoleController::class,
        "user" => UserController::class,
        "candidature" => CandidatureController::class,
        "role" => RoleController::class,
    ]);
});
