<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are aded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    return view('./auth/login');
});


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('/domain', [App\Http\Controllers\DomainController::class, 'index'])->name('domain');
    Route::post('/domain/search', 'App\Http\Controllers\DomainController@search');
    Route::get('/domain/create', 'App\Http\Controllers\DomainController@create');
    Route::get('domain/PDF', 'App\Http\Controllers\DomainController@pdfDomain');
    Route::get('/domain/edit/{id}', 'App\Http\Controllers\DomainController@edit');
    Route::post('/domain/update/{id}', 'App\Http\Controllers\DomainController@update');
    Route::get('/domain/remove/{id}', 'App\Http\Controllers\DomainController@remove');
    Route::post('/domain/new', 'App\Http\Controllers\DomainController@new');

    Route::get('/servers', [App\Http\Controllers\ServerController::class, 'index'])->name('servers');
    Route::post('/servers/search', 'App\Http\Controllers\ServerController@search');
    Route::post('/servers/update/{id}', 'App\Http\Controllers\ServerController@update');
    Route::get('servers/PDF', 'App\Http\Controllers\ServerController@pdfServer');
    Route::get('/servers/create', 'App\Http\Controllers\ServerController@create');
    Route::get('/servers/edit/{id}', 'App\Http\Controllers\ServerController@edit');
    Route::get('/servers/remove/{id}', 'App\Http\Controllers\ServerController@remove');
    Route::post('/servers/new', 'App\Http\Controllers\ServerController@new');

    Route::get('/hosts', [App\Http\Controllers\HostController::class, 'index'])->name('hosts');
    Route::post('/hosts/search', 'App\Http\Controllers\HostController@search');
    Route::post('/hosts/update/{id}', 'App\Http\Controllers\HostController@update');
    Route::get('/hosts/create', 'App\Http\Controllers\HostController@create');
    Route::get('hosts/PDF', 'App\Http\Controllers\HostController@pdfHosts');
    Route::get('/hosts/edit/{id}', 'App\Http\Controllers\HostController@edit');
    Route::get('/hosts/remove/{id}', 'App\Http\Controllers\HostController@remove');
    Route::post('/hosts/new', 'App\Http\Controllers\HostController@new');


    Route::get('/domain-email', "App\Http\Controllers\DomainController@sendEmails");
    Route::get('/servers-email', "App\Http\Controllers\ServerController@sendEmails");
    Route::get('/hosts-email', "App\Http\Controllers\HostController@sendEmails");
});

Auth::routes();
