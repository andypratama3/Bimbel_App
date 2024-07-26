<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\Dashboard\MuridBimbel;
use App\Http\Controllers\RegisterGuruController;
use App\Http\Controllers\Dashboard\GuruController;
use App\Http\Controllers\RegisterBimbelController;
use App\Http\Controllers\Dashboard\ModulController;
use App\Http\Controllers\Dashboard\AbsensiController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DokumentasiController;
use App\Http\Controllers\Dashboard\DeskripsiAnakController;
use App\Http\Controllers\Dashboard\GuruController as DashboardGuruController;
use App\Http\Controllers\Dashboard\UserController as DashboardUserController;
use App\Http\Controllers\Dashboard\BimbelController as DashboardBimbelController;
use App\Http\Controllers\Dashboard\ProfileController as DashboardProfileController;
use App\Http\Controllers\Dashboard\KriteriaController as DashboardKriteriaController;
use App\Http\Controllers\Dashboard\GradeGuruController as DashboardGradeGuruController;
use App\Http\Controllers\Dashboard\GuruBimbelController as DashboardGuruBimbelController;
use App\Http\Controllers\Dashboard\PaketBimbelController as DashboardPaketBimbelController;
use App\Http\Controllers\Dashboard\SiswaBimbelController as DashboardSiswaBimbelController;
use App\Http\Controllers\Dashboard\PendaftarGuruController as DashboardPendaftarGuruController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix' => '/',], function () {

    Route::get('/',BerandaController::class)->name('beranda.index');
    //bimbel
    Route::middleware(['auth'])->group(function () {
        Route::get('/register-bimbel',[RegisterBimbelController::class, 'index'])->name('register.bimbel');
        Route::post('/register-bimbel-store',[RegisterBimbelController::class, 'store'])->name('register.bimbel.store');
        Route::get('/register-bimbel-status',[RegisterBimbelController::class, 'status'])->name('register.bimbel.status');
        //gurus
        Route::get('/register-guru',[RegisterGuruController::class, 'index'])->name('register.guru');
        Route::post('/register-guru/store',[RegisterGuruController::class, 'store'])->name('register.guru.store');
        Route::post('/register-guru/store',[RegisterGuruController::class, 'store'])->name('register.guru.store');
        Route::get('/register-guru-status',[RegisterGuruController::class, 'status'])->name('register.guru.status');
    });

});

Route::group(['prefix' => 'dashboard',  'middleware' => ['auth', 'role:0,1,2']], function () {
    Route::get('/',DashboardController::class)->name('dashboard');

    Route::group(['prefix' => 'datamaster'], function () {
        Route::resource('pendaftar-bimbel', DashboardBimbelController::class, ['names' => 'dashboard.datamaster.pendaftar.bimbel'])->except('create','store');
        Route::resource('siswa-bimbel', DashboardSiswaBimbelController::class, ['names' => 'dashboard.datamaster.siswa.bimbel']);
        Route::resource('pendaftar-guru', DashboardPendaftarGuruController::class, ['names' => 'dashboard.datamaster.pendaftar.guru']);
        Route::resource('guru-bimbel', DashboardGuruController::class, ['names' => 'dashboard.datamaster.guru']);
    });
    Route::resource('paket-bimbel', DashboardPaketBimbelController::class, ['names' => 'dashboard.paket.bimbel']);
    Route::resource('grade-guru', DashboardGradeGuruController::class, ['names' => 'dashboard.grade.guru']);
    Route::resource('users', DashboardUserController::class, ['names' => 'dashboard.user']);
    Route::resource('profile', DashboardProfileController::class, ['names' => 'dashboard.profile']);
    Route::resource('kriteria', DashboardKriteriaController::class, ['names' => 'dashboard.kriteria']);

    //guru Route
    Route::resource('modul', ModulController::class, ['names' => 'dashboard.modul']);
    //modul change status
    Route::post('/moduls/status/{id}',[ModulController::class, 'updateStatus'])->name('modul.change.status');
    //deksripsi Anak
    Route::resource('deskripsi-anak', DeskripsiAnakController::class, ['names' => 'dashboard.deskripsi.anak']);


    Route::resource('absensis', AbsensiController::class, ['names' => 'dashboard.absensi']);
    Route::resource('dokumentasis', DokumentasiController::class, ['names' => 'dashboard.dokumentasi']);
    Route::resource('murids', MuridBimbel::class, ['names' => 'dashboard.murid']);
    Route::get('/siswas-bimbel-export',[DashboardSiswaBimbelController::class, 'exportExcel'])->name('dashboard.datamaster.siswa.bimbel.export');


    Route::get('/grades/guru/karakter/',[DashboardGradeGuruController::class, 'gradeKrakter'])->name('dashboard.grade.guru.karakter');
    Route::get('/grades/guru/karakter/show/{id}',[DashboardGradeGuruController::class, 'gradeKrakterShow'])->name('dashboard.grade.guru.karakter.show');

    Route::get('/grades/guru/',[DashboardGradeGuruController::class, 'grade'])->name('dashboard.grade.guru.rating');


    // Route::resource('data-anak', DashboardDataAnakController::class, ['names' => 'dashboard.data-anak']);
    Route::resource('guru', DashboardGuruBimbelController::class, ['names' => 'dashboard.guru']);

});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('home');
//     })->name('dashboard');
// });



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
