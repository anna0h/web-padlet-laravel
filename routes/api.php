<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EntrieController;
use App\Http\Controllers\PadletController;
use App\Http\Controllers\RatingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/* auth */
Route::post('auth/login', [AuthController::class,'login']);

// methods which need authentication - JWT Token
Route::group(['middleware' => ['api','auth.jwt']], function(){
    /* PadletController.php Routen */
    Route::post('padlets', [PadletController::class,'save']);
    Route::put('padlets/{id}', [PadletController::class,'update']);
    Route::delete('/padlets/{id}', [PadletController::class, 'delete']);

    /* EntrieController.php Routen */
    Route::post('padlets/{padlet_id}/entries', [EntrieController::class, 'save']);
    Route::put('entries/{id}', [EntrieController::class,'update']);
    Route::delete('entries/{id}', [EntrieController::class, 'delete']);

    /* CommentController.php & RatingController.php Routen */
    Route::post('entries/{entrie_id}/comments', [CommentController::class, 'saveComment']);
    Route::post('entries/{entrie_id}/ratings', [RatingController::class, 'saveRating']);

    Route::post('auth/logout', [AuthController::class,'logout']);
});

/* PadletController.php Routen */
Route::get('padlets', [PadletController::class,'index']);
Route::get('padlets/findByID/{id}', [PadletController::class,'findById']);
Route::get('padlets/checkid/{id}', [PadletController::class,'checkID']);
Route::get('padlets/search/{searchTerm}', [PadletController::class,'findBySearchTerm']);

/* EntrieController.php Routen */
Route::get('entries', [EntrieController::class,'index']);
Route::get('entries/{entrie_id}', [EntrieController::class,'getEntryByID']);

/* CommentController.php & RatingController.php Routen */
Route::get('entries/comments', [CommentController::class, 'index']);
Route::get('entries/ratings', [RatingController::class, 'index']);
Route::get('entries/{entrie_id}/ratings', [RatingController::class,'findByEntryID']);
Route::get('entries/{entrie_id}/comments', [CommentController::class,'findByEntryID']);






