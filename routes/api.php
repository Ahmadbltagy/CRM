<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProjectController;

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

Route::post('/customers', [CustomerController::class, 'create']);
Route::patch('/customers/{id}', [CustomerController::class, 'update']);
Route::delete('/customers/{id}', [CustomerController::class, 'delete']);
Route::get('/customers/{id}', [CustomerController::class, 'showById']);
Route::get('/customers', [CustomerController::class, 'index']);



Route::post('/customers/{customerId}/notes', [NoteController::class, 'create']);
Route::patch('/customers/{customerId}/notes/{id}', [NoteController::class, 'update']);
Route::delete('/customers/{customerId}/notes/{id}', [NoteController::class, 'delete']);
Route::get('/customers/{customerId}/notes/{id}', [NoteController::class, 'showById']);
Route::get('/customers/{customerId}/notes', [NoteController::class, 'index']);



// Route::patch('/customers/{customerId}/projects/{id}', [ProjectController::class, 'update']);
// Route::delete('/customers/{customerId}/projects/{id}', [ProjectController::class, 'delete']);
// Route::get('/customers/{customerId}/projects/{id}', [ProjectController::class, 'showById']);
Route::post('/customers/{customerId}/projects', [ProjectController::class, 'create']);
Route::get('/customers/{customerId}/projects', [ProjectController::class, 'index']);