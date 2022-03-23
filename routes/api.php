<?php

use App\Http\Controllers\API\AuthorController;
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

Route::group(['namespace' => 'API', 'prefix' => 'authors'], function () {
    Route::get('/all', [AuthorController::class, 'allAuthors']);
    Route::post('/create', [AuthorController::class, 'createAuthor']);
    Route::post('{author_id}/update', [AuthorController::class, 'updateAuthor']);
});
