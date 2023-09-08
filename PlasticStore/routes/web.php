<?php

use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\SubProcessController;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubProcess;

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

Auth::routes();

Route::get('/', function () {
    return view('home');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

Route::resource("categories", CategoryController::class);
Route::resource("sub_categories", SubCategoryController::class);
Route::resource("brands", BrandController::class);
Route::resource("sub_processes", SubProcessController::class);
Route::resource("products", ProductController::class);

Route::get('/categories/{category}/{subCategory}', [CategoryController::class, 'show'])->name('categories.show');

Route::middleware(['can:is-admin'])->group(function () {
    Route::get('/admin', [ProductController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/category', [CategoryController::class, 'indexadmin'])->name('admcategory.index');
    Route::get('/admin/product', [ProductController::class, 'indexadmin'])->name('admproduct.index');
    Route::get('/admin/product/{id}', [ProductController::class, 'adminshow'])->name('admproduct.detail');
    Route::get('/admin/product/edit/{product}', [ProductController::class, 'adminedit']);
    Route::post('/admin/product/update/{product}', [ProductController::class, 'update'])->name('product.update');


    Route::get('/admin/product/show/create_product', [ProductController::class, 'admincreate']);
    Route::post('/admin/product/show/store_product', [ProductController::class, 'store'])->name('products.store');
    Route::post('/admin/productdelete', [ProductController::class, 'destroy'])->name('products.delete');


    Route::get('/admin/customer', [CustomerController::class, 'indexcust'])->name('admcustomer.index');
    Route::get('/admin/staff', [CustomerController::class, 'indexstaff'])->name('admstaff.index');
    Route::get('/admin/owner', [CustomerController::class, 'indexowner'])->name('admowner.index');

    Route::get('/admin/transaction', [TransactionController::class, 'index'])->name('admtransaction.index');
    Route::get('/admin/transaction/detail/{id}', [TransactionController::class, 'show']);
    Route::post('/admin/transaction/delete', [TransactionController::class, 'destroy'])->name('transaksi.deleteData');

    Route::get('/admin/type', [TypeController::class, 'indexadmin'])->name('admtype.index');
    Route::get('/admin/type/editform/{type}', [TypeController::class, 'adminedit']);
    Route::post('/admin/deletetype', [TypeController::class, 'destroy'])->name('type.delete');


    Route::get('/admin/update_category/{id}', [CategoryController::class, 'updateCat']);


    Route::post('/admin/create_customer', [CustomerController::class, 'storeCust'])->name('customers.storeCust');



    Route::post('/admin/update_adm_customer/{id}', [CustomerController::class, 'updateAdmCust'])->name('customers.updateAdmCust');



    Route::get('/admin/update_customer/{id}', [CustomerController::class, 'updateCust']);

    Route::post('/admin/delete_category', [CategoryController::class, 'deleteData'])->name('categories.deleteData');

    Route::post('/admin/delete_customer', [CustomerController::class, 'deleteData'])->name('customers.deleteData');

    Route::resource("categories", CategoryController::class);
    Route::resource("customers", CustomerController::class);
    Route::resource("type", TypeController::class);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
