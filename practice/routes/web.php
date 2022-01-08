<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Storage;
use App\Mail\ReminderMail;
use Facade\FlareClient\Stacktrace\File;


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
    return view('childComponents/firstchild');
});

Route::get('/login', function(Request $request) {
    return 'Login API';
});

Route::post('/signup', [UsersController::class]);

Route::get('/email', [UsersController::class]);

Route::post('/demoform/add', [UsersController::class, 'addDemoForm']);

Route::get('/demoform/edit/{id}', [UsersController::class, 'editDemoForm']);

Route::get('/testemail', function() {
    Route::view('emails', 'reminder');
});


Route::get('/download', function(Response $response) {
    $file = 'one.jpg';
    $filename = 'one';
    $pathToFile = public_path('images/one.jpg');

    header("Cache-Control: ");// leave blank to avoid IE errors
    header("Pragma: ");// leave blank to avoid IE errors
    header("Content-Disposition: attachment; filename=\"".$file."\"");
    header("Content-length:".(string)(filesize($pathToFile)));
    header("Content-Type: application/force-download");
    header("Content-Type: application/download");
    header('Content-Type: application/octet-stream');
    header('Content-Type: image/jpg');
    header("Content-Transfer-Encoding: binary ");
    echo $pathToFile;
    exit;

    //return $response::download($pathToFile);
    //return $pathToFile;
    //$headers = array('Content-Type' => File::mimeType($pathToFile));
    /* header('Content-Description: File Transfer');
    header('Content-Type: image/jpg');
    header('Content-Disposition: attachment; filename="'.$file.'"'); */
    $headers = [
        'Cache-Control: ',
        'Pragma: ',
    "Content-Disposition: attachment; filename=\"".$file."\"",
    "Content-length:".(string)(filesize($pathToFile)),
    "Content-Type: application/force-download",
    "Content-Type: application/download",
    'Content-Type: application/octet-stream',
    'Content-Type: image/jpg',
    'Content-Transfer-Encoding: binary'
    ];
    //$headers = ['Content-Type: image/jpeg'];
    return response()->download($pathToFile, $filename, $headers);
    //return (new Response($pathToFile, 200))->header('Content-Type', 'image/jpeg');
    //return Storage::download('file.jpg', $filename, $headers);
    //return Storage::put($pathToFile);
});