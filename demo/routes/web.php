<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});

Route::middleware('authentication')->group(function() { 
    Route::get('/users', function () {
        return "My First Get Method";
    });
});

Route::get('/user/{id}', [UserController::class, 'show']);

Route::post('/mypost', [UserController::class, 'fields'])->middleware('authentication');
