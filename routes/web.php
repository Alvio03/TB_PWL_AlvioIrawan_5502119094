<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin Route
Route::get('admin/home', [AdminController::class, 'index'])
    ->name('admin.home')
    ->middleware('is_admin');


//Route Book
Route::get('admin/books', [BookController::class, 'index'])
    ->name('admin.books')
    ->middleware('is_admin');

Route::post('admin/books', [BookController::class, 'store'])
    ->name('admin.book.submit')
    ->middleware('is_admin');
Route::patch('admin/books/update', [BookController::class, 'update'])
    ->name('admin.book.update')
    ->middleware('is_admin');

Route::get('admin/ajaxadmin/dataBuku/{id}', [BookController::class, 'getDataBuku']);
Route::delete('admin/books/delete', [BookController::class, 'destroy'])
    ->name('admin.book.delete')
    ->middleware('is_admin');


//Route PRINT PDF
Route::get('admin/print_books', [BookController::class, 'print_books'])
    ->name('admin.print.books')
    ->middleware('is_admin');


//Route PRINT EXCEL
Route::get('admin/books/export', [BookController::class, 'export'])
    ->name('admin.book.export')
    ->middleware('is_admin');



//Route IMPORT EXCEL
Route::post('admin/books/import', [BookController::class, 'import'])
    ->name('admin.book.import')
    ->middleware('is_admin');


//Route User
Route::get('admin/user', [UserController::class, 'index'])
    ->name('admin.user')
    ->Middleware('is_admin');

//route tambah
Route::post('admin/user', [UserController::class, 'add_user'])
    ->name('admin.user.submit')
    ->middleware('is_admin');

//route edit
Route::patch('admin/user/update', [UserController::class, 'update_user'])
    ->name('admin.user.update')
    ->middleware('is_admin');
Route::get('admin/ajaxadmin/dataUser/{id}', [UserController::class, 'getDataUser']);

//route delete
Route::delete('admin/user/delete', [UserController::class, 'destroy'])
    ->name('admin.user.delete')
    ->middleware('is_admin');





//Route Categories
Route::get('admin/kategori', [KategoriController::class, 'index'])
    ->name('admin.kategori')
    ->middleware('is_admin');
Route::post('admin/kategori', [KategoriController::class, 'add_categories'])
    ->name('admin.kategori.submit')
    ->middleware('is_admin');
//route edit categories
Route::patch('admin/kategori/update', [KategoriController::class, 'update_categories'])
    ->name('admin.kategori.update')
    ->middleware('is_admin');
Route::get('admin/ajaxadmin/dataCategories/{id}', [KategoriController::class, 'getDataCategories']);

//route delete categories
Route::delete('admin/kategori/delete', [KategoriController::class, 'delete_categories'])
    ->name('admin.kategori.delete')
    ->middleware('is_admin');


//ROUTE UTAMA BRANDS
Route::get('admin/merek', [App\Http\Controllers\MerekController::class, 'index'])
    ->name('admin.merek')
    ->middleware('is_admin');

//route tambah brands
Route::post('admin/merek', [MerekController::class, 'add_brand'])
    ->name('admin.brand.submit')
    ->middleware('is_admin');

//route edit brands
Route::patch('admin/merek/update', [MerekController::class, 'update_brands'])
    ->name('admin.brand.update')
    ->middleware('is_admin');
Route::get('admin/ajaxadmin/dataBrands/{id}', [MerekController::class, 'getDataBrands']);

//route delete brands
Route::delete('admin/merek/delete', [MerekController::class, 'delete_brands'])
    ->name('admin.brand.delete')
    ->middleware('is_admin');


//Route Product
Route::get('admin/barang', [App\Http\Controllers\BarangController::class, 'index'])
    ->name('admin.product')
    ->middleware('is_admin');
Route::get('admin/laporan/masuk', [App\Http\Controllers\BarangController::class, 'print'])
    ->middleware('is_admin');
    Route::post('admin/barang', [BarangController::class, 'add_product'])
        ->name('admin.product.submit')
        ->middleware('is_admin');
Route::patch('admin/barang/update', [BarangController::class, 'edit_product'])
    ->name('admin.product.update')
    ->middleware('is_admin');
Route::get('admin/ajaxadmin/dataProduct/{id}', [BarangController::class, 'getDataProduct']);

//delete data
Route::delete('admin/barang/delete',[BarangController::class, 'destroy'])
->name('admin.product.delete')
->middleware('is_admin');