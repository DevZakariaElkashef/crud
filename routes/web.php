<?php

use App\Http\Controllers\UserController;
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
    CRUD 

    // create laravel project
    // create db
    // crud in laravel



    //////
    php -v 
    composer create-project laravel/laravel "project_name"
    php artisan migrate
    // search  : soft delete




*/

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/users', 'UserController@index');
// Route::get('/users', [UserController::class, 'index']);
// Route::prefix('users')->group(function(){
//     Route::get('/', [UserController::class, 'index']);
//     Route::get('/show', [UserController::class, 'show']);
// });

Route::resource('users', UserController::class);
