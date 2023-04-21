<?php

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

Route::get("clear_cache",[App\Http\Controllers\AdministrationController::class,"clear_cache"]);

Route::get('/', function () {
    return "Okul Yönetim Servisi";
});
