<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    dd("asldjal");
    return view('welcome');
});


Route::get('/test', function(){
    dd("adjkal");
});


Route::get('/calander' , function(){

 dd("adjkal");
    $response = Http::withoutVerifying() // for self-signed/internal SSL
        ->asForm()
        ->post('https://10.130.8.95/joassessment_api/e_directory_api.php', [
            'data' => 'XgLxwmXke1d8blUI/EhP7AemuT7juPJ0ZUZcQELSjEJzkqj37oUP/p00QQyavTHCh5kIdVtYHxqYoOg0LBC72KMifmKJ/hrVz37JciSWqnToMuLQ9pD5idBxydvWvJz3'
        ]);

    // Get Response Body
    $result = $response->body();

    // Optional: decode JSON if API returns JSON
    // $result = $response->json();

    // decrpting the data here using the function 
    $iv = 'O2qr8hZ+6H7t5cFk';
    $data = base64_decode($response);
    $decrypt = openssl_decrypt($data, 'AES-128-CBC', 'O2qr8hZ+6H7t5cFk', OPENSSL_RAW_DATA, $iv);

    return $decrypt;
    
})->name('calander');

/*
|--------------------------------------------------------------------------
| High Court of Rajasthan - Web Routes
|--------------------------------------------------------------------------
|
| Version 1: Modern Natural Design  → /
| Version 2: SCI Inspired Design    → /v2
|
*/
 
// Version 1 - Modern Natural Home
Route::get('/v1', function () {
    return view('welcome');
})->name('home');
 
// Version 2 - SCI Inspired Home
Route::get('/v2', function () {
    return view('pages.home-v2');
})->name('home.v2');
 
// Switch between versions
Route::get('/design-v1', function () {
    return redirect('/');
});
 
Route::get('/design-v2', function () {
    return redirect('/v2');
});

Route::get('/history' , function ()  {
   return view('history'); 
})->name('history');

Route::get('/registrar-general' , function () {
return view('registrar');
})->name('registrar');
