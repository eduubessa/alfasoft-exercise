<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
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

Route::get('/',   [ContactController::class, 'index'])->name('index');

Route::prefix('contacts')->name('contacts.')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('index');
    Route::middleware('auth')->get('/create', [ContactController::class, 'create'])->name('create');
    Route::middleware('auth')->post('/', [ContactController::class, 'store'])->name('store');
    Route::middleware('auth')->get('/{id}/edit', [ContactController::class, 'edit'])->name('edit');
    Route::middleware('auth')->patch('/{id}', [ContactController::class, 'update'])->name('update');
    Route::middleware('auth')->delete('/{id}/delete', [ContactController::class, 'destroy'])->name('delete');
});


Route::middleware('guest')->get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::middleware('guest')->post('login', [AuthController::class, 'login']);

Route::middleware('auth')->post('logout', [AuthController::class, 'logout'])->name('logout');
