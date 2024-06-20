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
Route::get('/blog', [App\Http\Controllers\AppController::class, 'blog'])->name('blog');
Route::get('/blog/{id_blog}', [App\Http\Controllers\AppController::class, 'blog_detail'])->name('blog.detail');

// Route::post('/pencarian_buku', [App\Http\Controllers\AppController::class, 'pencarian_buku'])->name('pencarian_buku');
// Route::get('/detail_buku/{id_book}', [App\Http\Controllers\AppController::class, 'detail_buku'])->name('detail_buku');

// Route::get('/user/history', [App\Http\Controllers\UserController::class, 'history'])->name('user.history');
// Route::post('/user/pinjam_buku', [App\Http\Controllers\UserController::class, 'pinjam_buku'])->name('user.pinjam_buku');
// Route::post('/user/kembali_buku/{id_invoice}', [App\Http\Controllers\UserController::class, 'kembali_buku'])->name('user.kembali_buku');
// Route::get('/user/detail_pinjaman/{id_invoice}', [App\Http\Controllers\UserController::class, 'detail_pinjaman'])->name('user.detail_pinjaman');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

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

Route::get('/admin/user', [App\Http\Controllers\UserController::class, 'user'])->name('admin.user');
Route::get('/admin/user/{id}', [App\Http\Controllers\UserController::class, 'edit_view'])->name('admin.user.edit_view');
Route::post('/admin/user/edit/{id}', [App\Http\Controllers\UserController::class, 'user_edit'])->name('admin.user.edit');
