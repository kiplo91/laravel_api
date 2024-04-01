<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthhController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('/user', function (Request $request) {
    return $request->user();
});

//tasks api
/*Route::middleware('auth:api')->get('tasks',[TaskController::class,'index']);
Route::middleware('auth:api')->post('tasks',[TaskController::class,'create']);
Route::middleware('auth:api')->get('tasks/{id}',[TaskController::class,'find']);
Route::middleware('auth:api')->put('tasks',[TaskController::class,'update']);
Route::middleware('auth:api')->delete('tasks/{id}',[TaskController::class,'destroy']); */


Route::get('tasks',[TaskController::class,'index']);
Route::post('task',[TaskController::class,'create']);
Route::get('task/{id}', [TaskController::class,'find']);
Route::put('task/{id}',[TaskController::class,'update']);
Route::delete('task/{id}',[TaskController::class,'destroy']);

Route::post('login', [AuthhController::class, 'login']);
Route::post('register', [AuthhController::class, 'register']);


#Route::post('login', AuthhController::class)->name('login');
#Route::post('register', 'AuthController@register');