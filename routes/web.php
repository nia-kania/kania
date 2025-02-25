<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\SiswaController;

// Rute halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Rute untuk pengguna yang sudah login sebagai admin
Route::middleware(['auth', 'admin'])->group(function () {
  // Rute untuk dashboard admin
  Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

  // Rute untuk menampilkan daftar akun
  Route::get('admin/akun', [LoginRegisterController::class, 'index'])->name('akun.index');

  // Rute untuk form tambah akun
  Route::get('admin/akun/create', [LoginRegisterController::class, 'create'])->name('akun.create');

  // Rute untuk menyimpan akun baru
  Route::post('admin/akun', [LoginRegisterController::class, 'store'])->name('akun.store');

  // Rute untuk edit akun
  Route::get('admin/akun/{akun}/edit', [LoginRegisterController::class, 'edit'])->name('akun.edit');
  Route::put('admin/akun/{akun}', [LoginRegisterController::class, 'update'])->name('akun.update');

  // Rute untuk menghapus akun
  Route::delete('admin/akun/{akun}', [LoginRegisterController::class, 'destroy'])->name('akun.destroy');

  // Rute untuk daftar siswa
  Route::get('admin/siswa', [SiswaController::class, 'index'])->name('siswa.index');

  // Rute untuk tambah siswa
  Route::get('admin/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
  Route::post('admin/siswa', [SiswaController::class, 'store'])->name('siswa.store');

  // Rute untuk edit siswa
  Route::get('admin/siswa/{siswa}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
  Route::put('admin/siswa/{siswa}', [SiswaController::class, 'update'])->name('siswa.update');

  // Rute untuk menghapus siswa
  Route::delete('admin/siswa/{siswa}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

  // Rute untuk logout
  Route::post('logout', [LoginRegisterController::class, 'logout'])->name('logout');
});
