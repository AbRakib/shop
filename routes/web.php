<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransactionController;
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
*/



Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/Auth-Check', [AuthController::class, 'checkLogin'])->name('checkLogin');

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    //report controller
    Route::get('/reports', [ReportController::class, 'index'])->name('report.index');
    Route::get('/report-customers', [ReportController::class, 'customer'])->name('report.customer');
    Route::get('/report-friends', [ReportController::class, 'friends'])->name('report.friends');

    // transactions
    Route::get('/transaction-list', [TransactionController::class, 'index'])->name('transaction.index');
    Route::get('/transaction-income', [TransactionController::class, 'income'])->name('transaction.income');
    Route::get('/transaction-expense', [TransactionController::class, 'expense'])->name('transaction.expense');
    Route::get('/transaction-show/{id}', [TransactionController::class, 'show'])->name('transaction.view');
    Route::get('/transaction-create', [TransactionController::class, 'create'])->name('transaction.create');
    Route::get('/transaction-edit/{id}', [TransactionController::class, 'edit'])->name('transaction.edit');
    Route::post('/transaction-store', [TransactionController::class, 'store'])->name('transaction.store');

    //loan
    Route::get('/transaction-loan', [TransactionController::class, 'loan'])->name('transaction.loan');
    Route::post('/loan-store', [TransactionController::class, 'loanStore'])->name('loan.store');
    Route::get('/loan-edit/{id}', [TransactionController::class, 'loanEdit'])->name('loan.edit');
    Route::post('/loan-update/{id}', [TransactionController::class, 'loanUpdate'])->name('loan.update');

    // supplier
    Route::get('/supplier-list', [SupplierController::class, 'index'])->name('supplier.index');
    Route::get('/supplier-create', [SupplierController::class, 'create'])->name('supplier.create');
    Route::post('/supplier-store', [SupplierController::class, 'store'])->name('supplier.store');
    Route::get('/supplier-edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::post('/supplier-update/{id}', [SupplierController::class, 'update'])->name('supplier.update');
    Route::get('/supplier-view/{id}', [SupplierController::class, 'show'])->name('supplier.view');

    // customer
    Route::get('/customer-list', [MemberController::class, 'customers'])->name('customer.index');
    Route::get('/customer-create', [MemberController::class, 'create'])->name('customer.create');
    Route::post('/customer-store', [MemberController::class, 'store'])->name('customer.store');
    Route::get('/customer-edit/{id}', [MemberController::class, 'edit'])->name('customer.edit');
    Route::post('/customer-update/{id}', [MemberController::class, 'update'])->name('customer.update');
    Route::get('/customer-view/{id}', [MemberController::class, 'show'])->name('customer.view');

    // user controller
    Route::get('/user-list', [UserController::class, 'index'])->name('user.index');
    Route::get('/user-create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user-store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user-edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user-update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/user-delete/{id}', [UserController::class, 'destroy'])->name('user.delete');

    // user controller
    Route::get('/profile', [UserController::class, 'show'])->name('profile');
    Route::post('/profile/update/{id}', [UserController::class, 'update'])->name('profile.update');
    Route::get('/password-change', [UserController::class, 'changePassword'])->name('user.password');
    Route::post('/password-update/{id}', [UserController::class, 'passwordUpdate'])->name('password.update');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});



