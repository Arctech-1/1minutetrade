<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use GuzzleHttp\Psr7\Request;

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

// Route::get('/', function () {
//     return view('');
// });


Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('auth.login');
});

/* User Routes */

Route::get('/home', [HomeController::class, 'index'])->name('home');


/* Admin Routes */

Route::get('/admin', [AdminController::class, 'index'])->name('admin');





