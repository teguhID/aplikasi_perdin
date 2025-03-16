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
Route::get('/admin/perdin/{id_perdin}', [App\Http\Controllers\PerdinController::class, 'detail'])->name('admin.perdin.detail');
Route::get('/admin/perdin/add_view', [App\Http\Controllers\PerdinController::class, 'add_view'])->name('admin.perdin.add_view');
Route::post('/admin/perdin/post', [App\Http\Controllers\PerdinController::class, 'post'])->name('admin.perdin.post');
Route::get('/admin/perdin/edit_view/{id_perdin}', [App\Http\Controllers\PerdinController::class, 'edit_view'])->name('admin.perdin.edit_view');
Route::get('/admin/perdin/edit/{id_perdin}', [App\Http\Controllers\PerdinController::class, 'edit'])->name('admin.perdin.edit');











Route::get('/admin/toko', [App\Http\Controllers\TokoController::class, 'toko'])->name('admin.toko');
Route::get('/admin/toko/edit_view', [App\Http\Controllers\TokoController::class, 'toko_edit_view'])->name('admin.toko.edit_view');
Route::post('/admin/toko/edit', [App\Http\Controllers\TokoController::class, 'toko_edit'])->name('admin.toko.edit');

Route::get('/admin/content/banner', [App\Http\Controllers\ContentController::class, 'banner'])->name('admin.content.banner');
Route::post('/admin/content/banner/post', [App\Http\Controllers\ContentController::class, 'banner_post'])->name('admin.content.banner.post');
Route::post('/admin/content/banner/delete/{id_banner}', [App\Http\Controllers\ContentController::class, 'banner_delete'])->name('admin.content.banner.delete');

Route::get('/admin/content/layanan', [App\Http\Controllers\ContentController::class, 'layanan'])->name('admin.content.layanan');
Route::get('/admin/content/layanan/add_view', [App\Http\Controllers\ContentController::class, 'layanan_add_view'])->name('admin.content.layanan.add_view');
Route::get('/admin/content/layanan/{id_layanan}', [App\Http\Controllers\ContentController::class, 'layanan_detail'])->name('admin.content.layanan.detail');
Route::post('/admin/content/layanan/post', [App\Http\Controllers\ContentController::class, 'layanan_post'])->name('admin.content.layanan.post');
Route::get('/admin/content/layanan/edit_view/{id_layanan}', [App\Http\Controllers\ContentController::class, 'layanan_edit_view'])->name('admin.content.layanan.edit_view');
Route::post('/admin/content/layanan/edit/{id_layanan}', [App\Http\Controllers\ContentController::class, 'layanan_edit'])->name('admin.content.layanan.edit');
Route::post('/admin/content/layanan/delete/{id_layanan}', [App\Http\Controllers\ContentController::class, 'layanan_delete'])->name('admin.content.layanan.delete');

Route::get('/admin/content/profile', [App\Http\Controllers\ContentController::class, 'profile'])->name('admin.content.profile');
Route::get('/admin/content/profile/edit_view/{id_profile}', [App\Http\Controllers\ContentController::class, 'profile_edit_view'])->name('admin.content.profile.edit_view');
Route::post('/admin/content/profile/edit/{id_profile}', [App\Http\Controllers\ContentController::class, 'profile_edit'])->name('admin.content.profile.edit');

Route::get('/admin/content/choose_us', [App\Http\Controllers\ContentController::class, 'choose_us'])->name('admin.content.choose_us');
Route::get('/admin/content/choose_us/add_view', [App\Http\Controllers\ContentController::class, 'choose_us_add_view'])->name('admin.content.choose_us.add_view');
Route::get('/admin/content/choose_us/{id_choose_us}', [App\Http\Controllers\ContentController::class, 'choose_us_detail'])->name('admin.content.choose_us.detail');
Route::post('/admin/content/choose_us/post', [App\Http\Controllers\ContentController::class, 'choose_us_post'])->name('admin.content.choose_us.post');
Route::get('/admin/content/choose_us/edit_view/{id_choose_us}', [App\Http\Controllers\ContentController::class, 'choose_us_edit_view'])->name('admin.content.choose_us.edit_view');
Route::post('/admin/content/choose_us/edit/{id_choose_us}', [App\Http\Controllers\ContentController::class, 'choose_us_edit'])->name('admin.content.choose_us.edit');
Route::post('/admin/content/choose_us/delete/{id_choose_us}', [App\Http\Controllers\ContentController::class, 'choose_us_delete'])->name('admin.content.choose_us.delete');

Route::get('/admin/content/portofolio', [App\Http\Controllers\ContentController::class, 'portofolio'])->name('admin.content.portofolio');
Route::post('/admin/content/portofolio/post', [App\Http\Controllers\ContentController::class, 'portofolio_post'])->name('admin.content.portofolio.post');
Route::post('/admin/content/portofolio/delete/{id_portofolio}', [App\Http\Controllers\ContentController::class, 'portofolio_delete'])->name('admin.content.portofolio.delete');

Route::get('/admin/content/contact', [App\Http\Controllers\ContentController::class, 'contact'])->name('admin.content.contact');
Route::get('/admin/content/contact/edit_view', [App\Http\Controllers\ContentController::class, 'contact_edit_view'])->name('admin.content.contact.edit_view');
Route::post('/admin/content/contact/edit', [App\Http\Controllers\ContentController::class, 'contact_edit'])->name('admin.content.contact.edit');

Route::get('/admin/blog', [App\Http\Controllers\BlogController::class, 'blog'])->name('admin.blog');
Route::get('/admin/blog/add_view', [App\Http\Controllers\BlogController::class, 'blog_add_view'])->name('admin.blog.add_view');
Route::get('/admin/blog/{id_blog}', [App\Http\Controllers\BlogController::class, 'blog_detail'])->name('admin.blog.detail');
Route::post('/admin/blog/post', [App\Http\Controllers\BlogController::class, 'blog_post'])->name('admin.blog.post');
Route::get('/admin/blog/edit_view/{id_blog}', [App\Http\Controllers\BlogController::class, 'blog_edit_view'])->name('admin.blog.edit_view');
Route::post('/admin/blog/edit/{id_blog}', [App\Http\Controllers\BlogController::class, 'blog_edit'])->name('admin.blog.edit');
Route::post('/admin/blog/delete/{id_blog}', [App\Http\Controllers\BlogController::class, 'blog_delete'])->name('admin.blog.delete');
