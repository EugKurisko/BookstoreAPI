<?php

use App\Http\Controllers\API\AuthorController;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\ReservationController;
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

Route::group(['prefix' => 'authors'], function () {
    Route::get('/all', [AuthorController::class, 'allAuthors']);
    Route::get('/allWithBooks', [AuthorController::class, 'allAuthorsWithBooks']);
    Route::post('/create', [AuthorController::class, 'createAuthor']);
    Route::post('{author}/update', [AuthorController::class, 'updateAuthor']);
    Route::get('{author}/show', [AuthorController::class, 'showAuthor']);
    Route::post('{author}/delete', [AuthorController::class, 'deleteAuthor']);
});

Route::group(['prefix' => 'books'], function () {
    Route::get('/all', [BookController::class, 'allBooks']);
    Route::get('/allWithAuthors', [BookController::class, 'allBooksWithAuthors']);
    Route::post('/create', [BookController::class, 'createBook']);
    Route::get('{book}/show', [BookController::class, 'showBook']);
    Route::post('{book}/update', [BookController::class, 'updateBook']);
    Route::post('{book}/delete', [BookController::class, 'deleteBook']);
});

Route::group(['prefix' => 'reservations'], function () {
    Route::post('/reserve', [ReservationController::class, 'reserveBook']);
});
