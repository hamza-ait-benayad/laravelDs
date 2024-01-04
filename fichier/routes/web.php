<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\detailsController;
use App\Http\Controllers\documentController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[homeController::class, 'show']);
Route::get('/home',[homeController::class, 'show'])->Name('home');
Route::get('/login',[loginController::class, 'showLogin'])->name('login');
Route::post('/login',[loginController::class, 'login'])->name('login');
Route::get('/logout',[loginController::class, 'logout'])->name('logout');
Route::get('/register',[registerController::class, 'showRegister'])->name('register');
Route::post('/register',[registerController::class, 'store'])->name('register.store');
Route::get('/document',[documentController::class, 'show'])->name('document');
Route::post('/document',[documentController::class, 'store'])->name('document.add')->middleware('auth');
Route::get('/details/{id}',[detailsController::class, 'show'])->name('details');
Route::get('/document/{id}/download', [documentController::class, 'download'])->name('document.download')->middleware('auth');
Route::get('/delete/{id}',[documentController::class, 'delete'])->name('delete');
Route::get('/managerUser',[adminController::class, 'index'])->name('manageUser');
Route::get('/deleteUser/{id}',[adminController::class, 'delete'])->name('deleteUser');




// Route::middleware('auth')->group(function(){

// });