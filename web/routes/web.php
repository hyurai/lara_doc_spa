<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
Route::resource('/entertainer','App\Http\Controllers\EntertainersController',['only' =>['index','create','store','show']]);
Route::resource('/entertainer.comment','App\Http\Controllers\CommentsController',['only'=>['store']]);
Route::resource('/user','App\Http\Controllers\UsersController',['only' => ['show']]);
Route::resource('/entertainer.favorite','App\Http\Controllers\FavoritesController',['only'=>['destroy','store']]);
Route::get('/home',function (){
    return view('home');
});