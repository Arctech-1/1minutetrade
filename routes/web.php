<?php


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TransactionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IncomeHistoryController;
use App\Http\Controllers\OutcomeHistoryController;
use App\Http\Controllers\ApplyHistoryController;
use App\Http\Controllers\BankDetailController;
//use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Transaction;
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




Route::middleware(['auth', 'user', 'verified'])->group(function () {

    /* User Routes */

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/income', [IncomeHistoryController::class, 'index'])->name('income');

    Route::get('/outcome', [OutcomeHistoryController::class, 'index'])->name('outcome');

    Route::get('/apply', [ApplyHistoryController::class, 'index'])->name('apply');

    Route::get('/apply/create', [ApplyHistoryController::class, 'create'])->name('withdraw');

    Route::post('/apply/store', [ApplyHistoryController::class, 'store'])->name('withdraw.submit');

    Route::get('/apply/delete/', [ApplyHistoryController::class, 'destroy'])->name('withdraw.delete');

    /* Resource Route for Bank Details CRUD */
    Route::resource('bankdetail', BankDetailController::class);

});

 /* Route resource for user profile */
 Route::resource('profile', UserController::class);


/* Admin Routes */

Route::get('/admin', [AdminController::class, 'index'])->name('admin');



Route::prefix('admin')->group(function () {

    Route::get('/profile/{id}', [UserController::class, 'editAdmin'])->name('admin.profile');

    Route::match(['put', 'patch'], '/profile/{id}', [UserController::class, 'updateAdminProfile'])->name('adminProfile.update');

    Route::resource('users', UserController::class);

    Route::post('users/search', [UserController::class, 'searchUsers'])->name('user.search');

    // route to credit the user account
    Route::post('users/{id}', [UserController::class, 'creditUser'])->name('user.credit');




    // Transaction route
    Route::resource('transactions', TransactionController::class);

    Route::get('/withdrawal-requests', [TransactionController::class, 'withdrawalIndex'])->name('withdrawal.request');



});






