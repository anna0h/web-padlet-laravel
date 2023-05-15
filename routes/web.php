<?php

use App\Models\Padlet;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PadletController;

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

/*Route::get('/', function () {
    $padlets = DB::table('padlets')->get();
    return view('padlets.index', compact('padlets'));
});


Route::get('/padlets', function () {
    $padlets = Padlet::all();
    return view('padlets.index', compact('padlets'));
});

Route::get('/padlets/{id}', function ($id) {
    $padlet = Padlet::find($id);
    return view('padlets.show', compact('padlet'));
});*/

Route::get('/', [PadletController::class,'index']);
Route::get('/padlets', [PadletController::class,'index']);
Route::get('/padlets/{id}',[PadletController::class,'show']);

