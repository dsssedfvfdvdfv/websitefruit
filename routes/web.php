<?php

use App\Http\Controllers\bankController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LicensePlatesController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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


Route::middleware(['global'])->group(function () {
   
    Route::get('/admin/user/login', [UserController::class, 'index'])->name('loginform');
    Route::get('/admin/user/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/admin/user/edit', [MainController::class, 'editform'])->name('editform');
    Route::middleware(['auth', 'checkUserType','check.deleted.cookie'])->group(function () {
        Route::get("/admin", [MainController::class, 'index'])->name('admin');
        Route::get("/admin/main", [MainController::class, 'index'])->name('main'); 
        Route::get("/admin/register", [UserController::class, 'register'])->name('register'); 
        Route::get('/admin/customer',[CustomerController::class,'index'])->name('customer');    
        Route::get('/fruit/loadAll', [ProductController::class, 'show'])->name('loadfruit');
        Route::get('/fruit/edit', [ProductController::class, 'editform']);     
        Route::get('/fruit/create', [ProductController::class, 'functionBoth']);
        Route::get('/deleteProduct/{id}', [ProductController::class, 'deleteProduct']);      
        Route::get('/admin/customer/edit', [CustomerController::class, 'formEdit'])->name('formEdit');
        Route::get('/order/form', [OrderController::class, 'loadlist'])->name('loadlist');
        Route::get('/order/loadAll', [OrderController::class, 'loadAll'])->name('loadorder');
        Route::get('/detailinvoice',[PageController::class,'invoice']);
        Route::get('/detailinvoice/{id}',[OrderController::class,'detailinvoice']);
    });
    Route::middleware(['auth.customer'])->group(function () {
        Route::get('/profile',[PageController::class,'profile'])->name('profile');
        Route::get('/loadOrderAll/{id}',[OrderController::class,'loadOrder']);
        Route::get('/loadOrderTotal/{id}',[OrderController::class,'loadTotal']);
       
    });
   

    Route::post('/submitreview',[ReviewController::class,'submitreview']);
    Route::get('/loadreview/{id}', [ReviewController::class, 'loadReview']); 
    Route::get('update/{id}', [UserController::class, 'updateAccount']); 
    Route::get('/edit/{id}', [UserController::class, 'editAccount']);
    Route::get("/delete/{userId}", [UserController::class, 'deleteAccount'])->name('delete');
    Route::post('/admin/user/login/store', [UserController::class, 'store']);
    Route::get("/activate/{userId}", [MainController::class, 'activated'])->name('activated');
    Route::get("/deactivate/{userId}", [MainController::class, 'deactivate'])->name('deactivate');
    Route::get('/updatenewproduct/{id}', [ProductController::class, 'updateProduct']);
    Route::get('/editfruit/{id}', [ProductController::class, 'editProduct']);

    
    Route::get('/get-user-active', [MainController::class, 'getUserActive'])->name('getUserActive');
    Route::get("/register/form", [RegisterController::class, 'index']);
    Route::post("/register/confirm", [RegisterController::class, 'store']);
    Route::post("/register/customer", [CustomerController::class, 'createCustomer']);


    
        
    
    Route::get('/',[PageController::class,'index'])->name('index');
    Route::get('/store',[PageController::class,'store'])->name('store');
    Route::get('/shoppingcart',[PageController::class,'shoppingcart'])->name('shoppingcart');
    Route::get('/checkout',[PageController::class,'checkout'])->name('checkout');
    Route::get('/detail',[PageController::class,'detailProductForm'])->name('detail');
    Route::get('/orderdetail',[PageController::class,'orderdetail'])->name('orderdetail');
    Route::get('/createOrder',[CheckoutController::class,'createOrder'])->name('createOrder');
    Route::get('/get-districts/{provinceId}',[PageController::class,'getDistricts']);
    Route::get('/listitem',[PageController::class,'listitem'])->name('listitem');
    Route::get('/product/{slug}',[PageController::class,'productSlug'])->name('storeslug');
    Route::get('/login',[PageController::class,'login'])->name('login');
    Route::get('/register',[PageController::class,'register'])->name('register');
    Route::get('/thankpage',[PageController::class,'thankpage'])->name('thankpage');
    Route::get('/statistics',[PageController::class,'statistics']);
    Route::post('/statistics',[PageController::class,'statistics']);
    Route::get('/categories',[PageController::class,'loadCategories'])->name('categories');
    Route::get('/loadcategories',[CategoriesController::class,'loadCategories'])->name('loadcategories');
    Route::get('/formCategories',[CategoriesController::class,'formCategories'])->name('formCategories');
    Route::get('/editcategories/{id}',[CategoriesController::class,'edit']);
    Route::post('/submitcategories',[CategoriesController::class,'functionBoth'])->name('formCategories');
    Route::get('/activeCategories/{id}',[CategoriesController::class,'activeCategories']);
    Route::get('/deactiveCategories/{id}',[CategoriesController::class,'deactiveCategories']);
    Route::get('/removeCategories/{id}',[CategoriesController::class,'deleteCategories']);

    Route::get('/delete/customer/{userId}',[CustomerController::class,'delete'])->name('delete');
    Route::get('/login/customer',[CustomerController::class,'login'])->name('logincustomer');
    Route::get('/logout/customer',[CustomerController::class,'logout'])->name('logoutcustomer');
    Route::get('/register/customer',[CustomerController::class,'createCustomer'])->name('createCustomercustomer');
    Route::get("/activate/customer/{userId}", [CustomerController::class, 'activated'])->name('activatedcustomer');
    Route::get("/deactivate/customer/{userId}", [CustomerController::class, 'deactivate'])->name('deactivatecustomer');
    Route::get("/editcustomer/{id}",[CustomerController::class,'editAccount']);
    Route::get('/loadorder/{id}',[CustomerController::class,'getOrderByCustomer'])->name('loadorder');
    Route::get('/cart/{id}',[CartController::class,'addToCart'])->name('cart');
    Route::get('/cart/remove/{id}',[CartController::class,'removeProduct'])->name('remove');
    Route::get('/removeall',[CartController::class,'removeAllProduct'])->name('removeAll');
   Route::get('/updateqty/{id}',[CartController::class,'updateQty'])->name('updateQty');
   Route::get('/order',[CheckoutController::class,'order']);
   Route::get('/sucess/{id}',[OrderController::class,'updateSuccessOrder']);
   Route::get('/delivery/{id}',[OrderController::class,'updateDeliveryOrder']);
   Route::get('/cancel/{id}',[OrderController::class,'updateCancelOrder']);
   Route::get('/paymentstatus/{id}',[OrderController::class,'updatePaymentstatus']);
   Route::match(['get', 'post'], '/addProductDetail', [CheckoutController::class,'addProductDetail'])->name('addProductDetail');
   Route::get('/detailproduct/{id}',[ProductController::class,'editDetail'])->name('editDetail');
   Route::post('/infocustomer',[CustomerController::class,'functionBoth'])->name('infocustomer');
    Route::post('/paymentVNpay',[bankController::class,'create'])->name('paymentVnpay');
    Route::get('/email',[CustomerController::class,'getOrderByCustomer']);
    Route::get('/submitreview',[ReviewController::class,'submitreview']);
});





