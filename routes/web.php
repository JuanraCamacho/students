<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RedirectController;

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
    return view('welcome');
});

Route::get('/', [RedirectController::class, 'redirectLogin']);   

Route::get('/students', [RedirectController::class, 'showView'])->middleware(['auth'])->name('students');

// Route::post('/students', [RedirectController::class, 'addStudent'])
//                 ->middleware('guest')->name('studentss');

Route::post('/students', [RedirectController::class, 'addStudent'])->middleware(['auth'])->name('studentss');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
