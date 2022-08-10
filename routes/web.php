<?php

use App\Http\Controllers\Regions;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function() {
    return "Test Online Hiring PT. Digdaya Olah Teknologi (DOT) Indonesia.";
});

Route::prefix('search')->group(function() {
    Route::get('/provinces', [Regions::class, 'getProvinsi']);
    Route::get('/cities', [Regions::class, 'getKota']);
});
