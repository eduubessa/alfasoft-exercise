<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('contacts')->name('contacts.')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('index');
    Route::get('/{id}/edit', [ContactController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [ContactController::class, 'update'])->name('update');
    Route::delete('/{id}/delete', [ContactController::class, 'destroy'])->name('delete');
});
