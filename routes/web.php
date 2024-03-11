<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResisterGuruController;
use App\Http\Controllers\RegisterBimbelController;
use App\Http\Controllers\Dashboard\DashboardController;

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


Route::get('/register-bimbel',[RegisterBimbelController::class, 'index'])->name('register.bimbel');
Route::get('/register-bimbel-post',[RegisterBimbelController::class, 'store'])->name('register.bimbel.store');
Route::get('/register-guru',[RegisterGuruController::class, 'index'])->name('register.guru');


Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/',DashboardController::class)->name('dashboard');

});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
