<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\Jadwal\JadwalController;
use App\Http\Controllers\API\Kursi\KursiController;
use App\Http\Controllers\API\Laporan\LaporanController;
use App\Http\Controllers\API\MasterMobil\MasterMobilController;
use App\Http\Controllers\API\MasterCabang\MasterCabangController;
use App\Http\Controllers\API\MasterRute\MasterRuteController;
use App\Http\Controllers\API\MasterTitikJemput\MasterTitikJemputController;
use App\Http\Controllers\API\MasterSupir\MasterSupirController;
use App\Http\Controllers\API\Paket\PaketController;
use App\Http\Controllers\API\Pesanan\PesananController;
use App\Http\Controllers\API\Role\RoleController;
use App\Http\Controllers\API\Users\ManageUsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'rute'
], function () {
    Route::resource('master_rute', MasterRuteController::class);
});

Route::group(
    [
        'middleware' => 'api',
        'prefix' => 'mobil'
    ],
    function () {
        Route::resource('master_mobil', MasterMobilController::class);
    }
);


Route::group(['middleware' => 'api', 'prefix' => 'cabang'], function () {
    Route::resource('master_cabang', MasterCabangController::class);
});

Route::group(['middleware' => 'api', 'prefix' => 'titik_jemput'], function () {
    Route::resource('master_titik_jemput', MasterTitikJemputController::class);
});

Route::group(['middleware' => 'api', 'prefix' => 'supir'], function () {
    Route::resource('master_supir', MasterSupirController::class);
});

Route::group(['middleware' => 'api', 'prefix' => 'kursi'], function () {
    Route::resource('kursi', KursiController::class);
});

Route::group(['middleware' => 'api', 'prefix' => 'paket'], function () {
    Route::resource('paket', PaketController::class);
});

Route::group(['middleware' => 'api', 'prefix' => 'jadwal'], function () {
    Route::resource('jadwal', JadwalController::class);
});

Route::group(['middleware' => 'api', 'prefix' => 'pesanan'], function () {
    Route::resource('pesanan', PesananController::class);
    Route::post('konfirmasi_pesanan', [PesananController::class, 'konfirmasiPesanan']);
});

Route::group(['middleware' => 'api', 'prefix' => 'users'], function () {
    Route::resource('manage_user', ManageUsersController::class);
});
Route::group(['middleware' => 'api', 'prefix' => 'roles'], function () {
    Route::resource('role', RoleController::class);
    Route::get('permission', [RoleController::class, 'getAllPermission']);
});
Route::group(['middleware' => 'api', 'prefix' => 'laporan'], function () {
    Route::get('laporan_per_mobil', [LaporanController::class, 'laporanPesananPerMobil']);
    Route::get('laporan_per_rute', [LaporanController::class, 'laporanPesananPerRute']);
    Route::get('list_penumpang', [LaporanController::class, 'listPenumpang']);
});
