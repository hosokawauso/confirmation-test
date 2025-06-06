<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

Route::get('/', [ContactController::class, 'contact']);
Route::post('/confirm', [ContactController::class,'confirm']);
Route::post('/reinput', [ContactController::class, 'reinput']);
Route::post('/thanks',[ContactController::class, 'thanks']);

//Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    //->middleware(['guest']);


Route::get('/admin', [AdminController::class, 'index']); //->middleware(['auth']);

Route::get('/admin/export', [AdminController::class, 'export']);
Route::delete('/admin/{id}', [AdminController::class, 'destroy']);

