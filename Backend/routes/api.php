<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getdominospizzas',[userController::class,'getDominosPizzas']);
Route::get('/getpizzahutpizzas',[userController::class,'getPizzahutPizzas']);
Route::get('/getlapinospizzas',[userController::class,'getLapinosPizzas']);
Route::get('/getovenstorypizzas',[userController::class,'getOvenstoryPizzas']);
Route::get('/searchproduct/{id}',[userController::class,'searchProduct']);
Route::get('/searchproductless100/{id?}',[userController::class,'searchProductLess100']);
Route::get('/searchproduct100to300/{id?}',[userController::class,'searchProduct100To300']);
Route::get('/searchproduct300to500/{id?}',[userController::class,'searchProduct300To500']);
Route::get('/searchproductover1000/{id?}',[userController::class,'searchProductOver1000']);
Route::get('/searchproductveg/{id?}',[userController::class,'searchProductveg']);
Route::get('/getdominospizzasoffers',[userController::class,'getDominosPizzasOffers']);
Route::get('/getpizzahutpizzasoffers',[userController::class,'getPizzahutPizzasOffers']);
Route::get('/getovenstorypizzasoffers',[userController::class,'getOvenstoryPizzasOffers']);
Route::get('/getlapinospizzasoffers',[userController::class,'getLapinosPizzasOffers']);

