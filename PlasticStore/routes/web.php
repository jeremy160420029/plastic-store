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
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionDetailController;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubProcess;
use App\Models\TransactionDetail;

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

//placed here because conflicting, since it gives 404 error if placed in bottom

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
Route::get('/change_password', [ProfileController::class, 'showProfilePass'])->name('change_password');
Route::post('/profile/update_password', [ProfileController::class, 'changePassword'])->name('user.change_password');
Route::post('/profile/update_address', [ProfileController::class, 'updateAddress'])->name('profile.updateAddress');
Route::post('/profile/update_profile', [ProfileController::class, 'updateProfile'])->name('profile.updateProfile');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

Route::resource("categories", CategoryController::class);
Route::resource("sub_categories", SubCategoryController::class);
Route::resource("brands", BrandController::class);
Route::resource("sub_processes", SubProcessController::class);
Route::resource("products", ProductController::class);

Route::get('/categories/{category}/{subCategory}', [CategoryController::class, 'show'])->name('categories.show');

Route::middleware(['can:is-cust'])->group(function () {
    //checkout
    Route::get('/cart/checkout', [CartController::class, 'showCheckout'])->name('cart.checkout');
    Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::delete('/cart/{cartItem}', [CartController::class, 'removeFromCart'])->name('cart.remove-from-cart');
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout.process');

    Route::get('/transactions', [TransactionController::class, 'showTransactions'])->name('transactions');
    Route::get('/transactions/{id}', [TransactionDetailController::class, 'show'])->name('transaction.show');
});

Route::middleware(['can:is-admin'])->group(function () {
    Route::get('/admin', [ProductController::class, 'dashboard'])->name('dashboard');

    Route::get('/admin/category', [CategoryController::class, 'indexadmin'])->name('admcategory.index');
    Route::get('/admin/update_category/{id}', [CategoryController::class, 'updateCat']);
    Route::post('/admin/delete_category', [CategoryController::class, 'deleteData'])->name('categories.deleteData');

    Route::get('/admin/product', [ProductController::class, 'indexadmin'])->name('admproduct.index');
    Route::get('/admin/product/{id}', [ProductController::class, 'adminshow'])->name('admproduct.detail');
    Route::get('/admin/product/edit/{product}', [ProductController::class, 'adminedit']);
    Route::post('/admin/product/update/{product}', [ProductController::class, 'update'])->name('product.update');

    Route::get('/admin/product/show/create_product', [ProductController::class, 'admincreate']);
    Route::post('/admin/product/show/store_product', [ProductController::class, 'store'])->name('products.store');
    Route::post('/admin/productdelete', [ProductController::class, 'destroy'])->name('products.delete');

    Route::get('/admin/subcategories', [SubCategoryController::class, 'indexadmin'])->name('admsubcategory.index');
    Route::get('/admin/create_subcat', [SubCategoryController::class, 'admincreate']);
    Route::get('/admin/edit_subcategory/{subCategory}', [SubCategoryController::class, 'adminedit']);
    Route::post('/admin/update_subcategory/{subCategory}', [SubCategoryController::class, 'update'])->name("sub_category.update");
    Route::post('/admin/delete_subcategory', [SubCategoryController::class, 'deleteData'])->name('sub_categories.deleteData');

    Route::get('/admin/subprocesses', [SubProcessController::class, 'indexadmin'])->name('admsubprocess.index');
    Route::get('/admin/edit_subprocess/{subProcess}', [SubProcessController::class, 'updateSubPro']);
    Route::post('/admin/delete_subprocess', [SubProcessController::class, 'deleteData'])->name('sub_processes.deleteData');

    Route::get('/admin/transaction', [TransactionController::class, 'index'])->name('admtransaction.index');
    Route::get('/admin/shipment', [TransactionController::class, 'indexDeliv'])->name('admtransaction.shipment');
    Route::post('/admin/shipment/update/{transaction}', [TransactionController::class, 'updateDeliv']);
    Route::post('/admin/shipment/update', [TransactionController::class, 'updateDeliv'])->name('admtransaction.delivery');
    Route::get('/admin/transaction/detail/{id}', [TransactionDetailController::class, 'showAdm']);
    Route::post('/admin/transaction/delete', [TransactionController::class, 'destroy'])->name('transaksi.deleteData');

    Route::get('/admin/brand', [BrandController::class, 'indexadmin'])->name('admbrand.index');
    Route::get('/admin/brand/{id}', [BrandController::class, 'updateBrand']);
    Route::post('/admin/brand/update/{brand}', [BrandController::class, 'update'])->name('brands.update');
    Route::post('/admin/delete_brand', [BrandController::class, 'deleteData'])->name('brands.deleteData');

    Route::get('/admin/customer', [UsersController::class, 'index'])->name('admuser.index');
    Route::post('/admin/update_adm_customer/{id}', [UsersController::class, 'updateAdmCust'])->name('customers.updateAdmCust');
    Route::get('/admin/update_customer/{id}', [UsersController::class, 'updateCust']);

    Route::post('/admin/create_admin', [UsersController::class, 'store'])->name('admin.store');
    Route::post('/admin/update_adm_staff/{id}', [UsersController::class, 'updateAdmStaff'])->name('admin.updateAdmStaff');
    Route::get('/admin/update_admin/{id}', [UsersController::class, 'updateAdm']);

    Route::post('/admin/delete_user', [UsersController::class, 'deleteData'])->name('user.deleteData');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
