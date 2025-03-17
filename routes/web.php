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

Auth::routes();

Route::get('/register', function () {
    return redirect()->route('login');
});

Route::get('/', [App\Http\Controllers\AppController::class, 'home'])->name('home');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin/master/pulau', [App\Http\Controllers\Master\PulauController::class, 'list'])->name('admin.master.pulau.list');
Route::get('/admin/master/pulau/add_view', [App\Http\Controllers\Master\PulauController::class, 'add_view'])->name('admin.master.pulau.add_view');
Route::get('/admin/master/pulau/{id_pulau}', [App\Http\Controllers\Master\PulauController::class, 'detail'])->name('admin.master.pulau.detail');
Route::post('/admin/master/pulau/post', [App\Http\Controllers\Master\PulauController::class, 'post'])->name('admin.master.pulau.post');
Route::get('/admin/master/pulau/edit_view/{id_pulau}', [App\Http\Controllers\Master\PulauController::class, 'edit_view'])->name('admin.master.pulau.edit_view');
Route::post('/admin/master/pulau/edit/{id_pulau}', [App\Http\Controllers\Master\PulauController::class, 'edit'])->name('admin.master.pulau.edit');
Route::post('/admin/master/pulau/delete/{id_pulau}', [App\Http\Controllers\Master\PulauController::class, 'delete'])->name('admin.master.pulau.delete');

Route::get('/admin/master/provinsi', [App\Http\Controllers\Master\ProvinsiController::class, 'list'])->name('admin.master.provinsi.list');
Route::get('/admin/master/provinsi/list/data/{id_pulau}', [App\Http\Controllers\Master\ProvinsiController::class, 'list_data'])->name('admin.master.provinsi.list.data');
Route::get('/admin/master/provinsi/add_view', [App\Http\Controllers\Master\ProvinsiController::class, 'add_view'])->name('admin.master.provinsi.add_view');
Route::get('/admin/master/provinsi/{id_provinsi}', [App\Http\Controllers\Master\ProvinsiController::class, 'detail'])->name('admin.master.provinsi.detail');
Route::post('/admin/master/provinsi/post', [App\Http\Controllers\Master\ProvinsiController::class, 'post'])->name('admin.master.provinsi.post');
Route::get('/admin/master/provinsi/edit_view/{id_provinsi}', [App\Http\Controllers\Master\ProvinsiController::class, 'edit_view'])->name('admin.master.provinsi.edit_view');
Route::post('/admin/master/provinsi/edit/{id_provinsi}', [App\Http\Controllers\Master\ProvinsiController::class, 'edit'])->name('admin.master.provinsi.edit');
Route::post('/admin/master/provinsi/delete/{id_provinsi}', [App\Http\Controllers\Master\ProvinsiController::class, 'delete'])->name('admin.master.provinsi.delete');

Route::get('/admin/master/kota', [App\Http\Controllers\Master\KotaController::class, 'list'])->name('admin.master.kota.list');
Route::get('/admin/master/kota/list/data/{id_provinsi}', [App\Http\Controllers\Master\KotaController::class, 'list_data'])->name('admin.master.kota.list.data');
Route::get('/admin/master/kota/add_view', [App\Http\Controllers\Master\KotaController::class, 'add_view'])->name('admin.master.kota.add_view');
Route::get('/admin/master/kota/{id_kota}', [App\Http\Controllers\Master\KotaController::class, 'detail'])->name('admin.master.kota.detail');
Route::post('/admin/master/kota/post', [App\Http\Controllers\Master\KotaController::class, 'post'])->name('admin.master.kota.post');
Route::get('/admin/master/kota/edit_view/{id_kota}', [App\Http\Controllers\Master\KotaController::class, 'edit_view'])->name('admin.master.kota.edit_view');
Route::post('/admin/master/kota/edit/{id_kota}', [App\Http\Controllers\Master\KotaController::class, 'edit'])->name('admin.master.kota.edit');
Route::post('/admin/master/kota/delete/{id_kota}', [App\Http\Controllers\Master\KotaController::class, 'delete'])->name('admin.master.kota.delete');

Route::get('/admin/master/role', [App\Http\Controllers\Master\RoleController::class, 'list'])->name('admin.master.role.list');
Route::get('/admin/master/role/add_view', [App\Http\Controllers\Master\RoleController::class, 'add_view'])->name('admin.master.role.add_view');
Route::get('/admin/master/role/{id_role}', [App\Http\Controllers\Master\RoleController::class, 'detail'])->name('admin.master.role.detail');
Route::post('/admin/master/role/post', [App\Http\Controllers\Master\RoleController::class, 'post'])->name('admin.master.role.post');
Route::get('/admin/master/role/edit_view/{id_role}', [App\Http\Controllers\Master\RoleController::class, 'edit_view'])->name('admin.master.role.edit_view');
Route::post('/admin/master/role/edit/{id_role}', [App\Http\Controllers\Master\RoleController::class, 'edit'])->name('admin.master.role.edit');
Route::post('/admin/master/role/delete/{id_role}', [App\Http\Controllers\Master\RoleController::class, 'delete'])->name('admin.master.role.delete');

Route::get('/admin/master/status', [App\Http\Controllers\Master\StatusController::class, 'list'])->name('admin.master.status.list');
Route::get('/admin/master/status/add_view', [App\Http\Controllers\Master\StatusController::class, 'add_view'])->name('admin.master.status.add_view');
Route::get('/admin/master/status/{id_status}', [App\Http\Controllers\Master\StatusController::class, 'detail'])->name('admin.master.status.detail');
Route::post('/admin/master/status/post', [App\Http\Controllers\Master\StatusController::class, 'post'])->name('admin.master.status.post');
Route::get('/admin/master/status/edit_view/{id_status}', [App\Http\Controllers\Master\StatusController::class, 'edit_view'])->name('admin.master.status.edit_view');
Route::post('/admin/master/status/edit/{id_status}', [App\Http\Controllers\Master\StatusController::class, 'edit'])->name('admin.master.status.edit');
Route::post('/admin/master/status/delete/{id_status}', [App\Http\Controllers\Master\StatusController::class, 'delete'])->name('admin.master.status.delete');

Route::get('/admin/user', [App\Http\Controllers\UserController::class, 'user'])->name('admin.user');
Route::get('/admin/user/{id}', [App\Http\Controllers\UserController::class, 'edit_view'])->name('admin.user.edit_view');
Route::post('/admin/user/edit/{id}', [App\Http\Controllers\UserController::class, 'user_edit'])->name('admin.user.edit');

Route::get('/admin/perdin', [App\Http\Controllers\PerdinController::class, 'perdin'])->name('admin.perdin');
Route::get('/admin/perdin/add_view', [App\Http\Controllers\PerdinController::class, 'add_view'])->name('admin.perdin.add_view');
Route::post('/admin/perdin/post', [App\Http\Controllers\PerdinController::class, 'post'])->name('admin.perdin.post');
Route::post('/admin/perdin/status/{id_perdin}', [App\Http\Controllers\PerdinController::class, 'update_status'])->name('admin.perdin.update_status');
Route::get('/admin/perdin/{id_perdin}', [App\Http\Controllers\PerdinController::class, 'detail'])->name('admin.perdin.detail');
Route::get('/admin/perdin/edit_view/{id_perdin}', [App\Http\Controllers\PerdinController::class, 'edit_view'])->name('admin.perdin.edit_view');
Route::post('/admin/perdin/edit/{id_perdin}', [App\Http\Controllers\PerdinController::class, 'edit'])->name('admin.perdin.edit');
Route::post('/admin/perdin/delete/{id_perdin}', [App\Http\Controllers\PerdinController::class, 'delete'])->name('admin.perdin.delete');
