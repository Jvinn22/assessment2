<?php

use Illuminate\Support\Facades\Route;
use Modules\TitikSampah\Http\Controllers\TitikSampahController;

// User dan Admin bisa melihat daftar buku
Route::middleware(['auth', 'role:admin,user'])->group(function () {
    Route::get('sampah', [TitikSampahController::class, 'index'])->name('titiksampah.index');
});

// Hanya Admin yang dapat melakukan aksi CRUD (Tambah, Edit, Hapus)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('sampah/create', [TitikSampahController::class, 'create'])->name('titiksampah.create');
    Route::post('sampah', [TitikSampahController::class, 'store'])->name('titiksampah.store');
    Route::get('sampah/{sampah}/edit', [TitikSampahController::class, 'edit'])->name('titiksampah.edit');
    Route::put('sampah/{sampah}', [TitikSampahController::class, 'update'])->name('titiksampah.update');
    Route::delete('sampah/{sampah}', [TitikSampahController::class, 'destroy'])->name('titiksampah.destroy');
});