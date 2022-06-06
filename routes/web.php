<?php

use App\Http\Controllers\{
    ClientController,
    ProjectController,
    TaskController,
    UserController
};

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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () { return view('dashboard'); })->name('dashboard');

    Route::resource('users', UserController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('tasks', TaskController::class);
});

require __DIR__.'/auth.php';

//Route::redirect('/home', '/login');   -> Redirecting from homepage to login form
