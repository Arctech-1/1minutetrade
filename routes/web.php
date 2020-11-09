<?php


use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IncomeHistoryController;
use App\Http\Controllers\OutcomeHistoryController;
use App\Http\Controllers\ApplyHistoryController;
use App\Http\Controllers\BankDetailController;
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

Route::get('/income', [IncomeHistoryController::class, 'index'])->name('income')->middleware(['auth', 'user']);

Route::get('/outcome', [OutcomeHistoryController::class, 'index'])->name('outcome')->middleware(['auth', 'user']);

Route::get('/apply', [ApplyHistoryController::class, 'index'])->name('apply')->middleware(['auth', 'user']);

Route::get('/apply/create', [ApplyHistoryController::class, 'create'])->name('withdraw')->middleware(['auth', 'user']);

Route::post('/apply/store', [ApplyHistoryController::class, 'store'])->name('withdraw.submit')->middleware(['auth', 'user']);

//Route::get('/apply/{$id}', [ApplyHistoryController::class, 'deleteT'])->name('withdraw.delete')->middleware(['auth', 'user']);

/* Resource Route for Bank Details CRUD */
Route::resource('bankdetail', BankDetailController::class);


/* Admin Routes */

Route::get('/admin', [AdminController::class, 'index'])->name('admin');





