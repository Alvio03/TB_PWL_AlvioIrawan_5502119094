<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoriesController;
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
Route::get('admin/user', [ProfileController::class, 'index'])
    ->name('admin.user')
    ->Middleware('is_admin');

//route tambah
Route::post('admin/user', [ProfileController::class, 'add_user'])
    ->name('admin.user.submit')
    ->middleware('is_admin');

//route edit
Route::patch('admin/user/update', [ProfileController::class, 'update_user'])
    ->name('admin.user.update')
    ->middleware('is_admin');
Route::get('admin/ajaxadmin/dataUser/{id}', [ProfileController::class, 'getDataUser']);

//route delete
Route::delete('admin/user/delete', [ProfileController::class, 'destroy'])
    ->name('admin.user.delete')
    ->middleware('is_admin');





//Route Categories
Route::get('admin/kategori', [CategoriesController::class, 'index'])
    ->name('admin.kategori')
    ->middleware('is_admin');
Route::post('admin/kategori', [CategoriesController::class, 'add_categories'])
    ->name('admin.kategori.submit')
    ->middleware('is_admin');
//route edit categories
Route::patch('admin/kategori/update', [CategoriesController::class, 'update_categories'])
    ->name('admin.kategori.update')
    ->middleware('is_admin');
Route::get('admin/ajaxadmin/dataCategories/{id}', [CategoriesController::class, 'getDataCategories']);

//route delete categories
Route::delete('admin/kategori/delete', [CategoriesController::class, 'delete_categories'])
    ->name('admin.kategori.delete')
    ->middleware('is_admin');


//ROUTE UTAMA BRANDS
Route::get('admin/merek', [App\Http\Controllers\BrandsController::class, 'index'])
    ->name('admin.merek')
    ->middleware('is_admin');

//route tambah brands
Route::post('admin/merek', [BrandsController::class, 'add_brand'])
    ->name('admin.brand.submit')
    ->middleware('is_admin');

//route edit brands
Route::patch('admin/merek/update', [BrandsController::class, 'update_brands'])
    ->name('admin.brand.update')
    ->middleware('is_admin');
Route::get('admin/ajaxadmin/dataBrands/{id}', [BrandsController::class, 'getDataBrands']);

//route delete brands
Route::delete('admin/merek/delete', [BrandsController::class, 'delete_brands'])
    ->name('admin.brand.delete')
    ->middleware('is_admin');


//Route Product
Route::get('admin/kelola_barang', [App\Http\Controllers\ProductController::class, 'index'])
    ->name('admin.product')
    ->middleware('is_admin');

Route::post('admin/kelola_barang', [ProductController::class, 'add_product'])
    ->name('admin.product.submit')
    ->middleware('is_admin');
