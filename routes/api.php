<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Route
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

Route::get("dashboard",[App\Http\Controllers\DashboardController::class,"index"]);
Route::resource("users",App\Http\Controllers\UserController::class)->only(["index","show"]);
Route::resource("lessons",App\Http\Controllers\LessonController::class)->only(["index","show"]);
Route::get("lessons/{lesson}/students",[App\Http\Controllers\LessonController::class,"getStudents"]);