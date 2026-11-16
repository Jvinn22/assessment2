<?php

use Illuminate\Support\Facades\Route;
use Modules\Laporan\Http\Controllers\LaporanController;

// Dapat diakses oleh Admin maupun User yang sudah login
Route::middleware(['auth', 'role:admin,user'])->group(function () {
    Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('laporan/data', [LaporanController::class, 'getData'])->name('laporan.data');
    Route::post('laporan', [LaporanController::class, 'store'])->name('laporan.store');
    Route::get('laporan/{laporan}/edit', [LaporanController::class, 'edit'])->name('laporan.edit');
    Route::put('laporan/{laporan}', [LaporanController::class, 'update'])->name('laporan.update');
    Route::delete('laporan/{laporan}', [LaporanController::class, 'destroy'])->name('laporan.destroy');
});