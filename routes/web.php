<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
    Session::forget('domain');
    Session::forget('route');
    return view('home');
})->name('home');

Auth::routes();

Route::post('/pilih_domain', [App\Http\Controllers\OrderController::class, 'pilih_domain'])->name('pilih_domain');
Route::get('/konfigurasi', [App\Http\Controllers\OrderController::class, 'konfigurasi'])->name('konfigurasi');
Route::post('/buat_invoice', [App\Http\Controllers\OrderController::class, 'buat_invoice'])->name('buat_invoice');
Route::get('/invoice/{id_invoice}', [App\Http\Controllers\OrderController::class, 'invoice'])->name('invoice');
Route::get('/print_invoice/{id_invoice}', [App\Http\Controllers\OrderController::class, 'print_invoice'])->name('print_invoice');

// Route::get('/customer', [App\Http\Controllers\CustomerController::class, 'index'])->name('customer');
// Route::get('/customer/booking/list', [App\Http\Controllers\CustomerController::class, 'booking_list'])->name('customer.booking.list');
// Route::post('/customer/booking', [App\Http\Controllers\CustomerController::class, 'booking'])->name('customer.booking');
// Route::post('/customer/booking/ubah_status/{id_booking}', [App\Http\Controllers\CustomerController::class, 'ubah_status_booking'])->name('customer.booking.ubah_status');
// Route::post('/customer/booking/cari_mobil', [App\Http\Controllers\CustomerController::class, 'cari_mobil'])->name('customer.booking.cari_mobil');
// Route::post('/customer/booking/edit/{id_mobil}', [App\Http\Controllers\CustomerController::class, 'booking_edit'])->name('customer.booking.edit');
// Route::post('/customer/booking/delete/{id_mobil}', [App\Http\Controllers\CustomerController::class, 'booking_delete'])->name('customer.booking.delete');

// Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
// Route::get('/admin/master/mobil', [App\Http\Controllers\Master\MobilController::class, 'index'])->name('admin.master.mobil');
// Route::get('/admin/master/mobil/add', [App\Http\Controllers\Master\MobilController::class, 'add'])->name('admin.master.mobil.add');
// Route::get('/admin/master/mobil/edit/{id_mobil}', [App\Http\Controllers\Master\MobilController::class, 'edit'])->name('admin.master.mobil.edit');
// Route::post('/admin/master/mobil/submit', [App\Http\Controllers\Master\MobilController::class, 'submit'])->name('admin.master.mobil.submit');
// Route::post('/admin/master/mobil/update/{id_mobil}', [App\Http\Controllers\Master\MobilController::class, 'update'])->name('admin.master.mobil.update');
// Route::post('/admin/master/mobil/delete', [App\Http\Controllers\Master\MobilController::class, 'delete'])->name('admin.master.mobil.delete');
// Route::get('/admin/master/mobil/history/{id_mobil}', [App\Http\Controllers\Master\MobilController::class, 'history'])->name('admin.master.mobil.history');
