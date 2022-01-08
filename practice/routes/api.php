<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Extra\TestClass;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/registration', [UsersController::class, 'signup']);

Route::get('/test', function() {
    $test = TestClass::index();
    return $test;
});

Route::get('/downloadfile', function() {
    $pathToFile = resource_path('images/one.jpg');
    $headers = ['Content-Type: application/jpg'];
    return response()->download($pathToFile, 'one.jpg', $headers);
});