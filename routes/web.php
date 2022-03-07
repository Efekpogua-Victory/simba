<?php

use App\Http\Livewire\Dashboard;
use App\Http\Livewire\SendMoney;
use App\Http\Livewire\SendMoneyConfirm;
use App\Http\Livewire\SendMoneyError;
use App\Http\Livewire\SendMoneySuccess;
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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/send-money', SendMoney::class)->name('sendmoney');
    Route::get('/confirm-transfer', SendMoneyConfirm::class)->name('confirm-send');
    Route::get('/transfer-succesful', SendMoneySuccess::class)->name('transfer-success');
    Route::get('/transfer-error', SendMoneyError::class)->name('transfer-error');
});

require __DIR__.'/auth.php';
