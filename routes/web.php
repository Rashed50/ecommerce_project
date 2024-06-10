<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CompanyProfileController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

// cache clear route /
// ALTER TABLE `employee_in_outs` CHANGE `emp_io_id` `emp_io_id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT;

Route::get('/clear-cache', function () {
    $run = Artisan::call('config:clear');
    $run = Artisan::call('cache:clear');
    $run = Artisan::call('view:clear');
    $run = Artisan::call('config:cache');
    //return \Artisan::call('db:seed');

    return 'CACHE CLEARED SUCCESSFULLY';
});


    // #################### Frontend  ####################
Route::get('/',[FrontendController::class, 'index'])->name('frontend');
Route::get('about', [FrontendController::class, 'about'])->name('frontend-about');
Route::get('contact', [FrontendController::class, 'contact'])->name('frontend-contact');
Route::get('privacy-info', [FrontendController::class, 'privacyInfo'])->name('frontend-privacy-policy');
Route::get('product-details/{id}', [FrontendController::class, 'ProductDetails'])->name('frontend-product-details');

// #################### Ajax Request for Cart Data Store  ####################
Route::get('/cart/data/store/{productId}', [CartController::class, 'cartDataStore']);
// #################### Ajax Request for Product details show (On Mini Cart) ####################
Route::get('/product/mini-cart/info', [CartController::class, 'productBuyInfoOnMiniCart']);
// #################### Ajax Request for Product Remove (From Mini Cart) ####################
Route::get('/miniCart/product-remove/{rowId}', [CartController::class, 'productRemoveFromMiniCart']);

// #################### Go for Cart Page  ####################
Route::get('cart', [CartController::class, 'cartItemView'])->name('cart-item-view');
// #################### Products show at Cart page  ####################
Route::get('/cart-products/view', [CartController::class, 'cartProducts']);
// #################### Ajax Request for Product Remove (From Cart Page) ####################
Route::get('/cart/product-remove/{rowId}', [CartController::class, 'cartProductRemoveFromCartPage']);
// #################### Ajax Request for Product Increment (From Cart Page) ####################
Route::get('/cart/product-increment/{rowId}', [CartController::class, 'cartProductIncrementFromCartPage']);
// #################### Ajax Request for Product Decrement (From Cart Page) ####################
Route::get('/cart/product-decrement/{rowId}', [CartController::class, 'cartProductDecrementFromCartPage']);

// #################### Checkout Page (From Cart Page) ####################
Route::get('/checkout-page', [CartController::class, 'checkoutPageForSelectedCartProducts'])->name('checkouts');
Route::post('/checkout-process', [CartController::class, 'checkoutProcessRequest'])->name('checkout-request');

// Auth::routes();
Auth::routes();

    /*
     ==========================================================================
     ============================= Admin ============================
     ==========================================================================
    */
Route::group(['prefix'=>'admin','middleware' => ['admin','auth'], 'namespace'=>'Admin'], function (){

    /*
    ==========================================================================
    ============================= Company Profile ============================
    ==========================================================================
    */
    Route::get('company-profile', [CompanyProfileController::class, 'index'])->name('company-profile');
    Route::post('company-profile/add', [CompanyProfileController::class, 'companyProfileDataAdd'])->name('company-profile-add');

    /*
    ===========================================================================
    ===================== Admin Profile & Admin Dashboard =====================
    ===========================================================================
    */
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin-dashboard');
    Route::get('user-create', [AdminController::class, 'userCreate'])->name('user-create');
               // Admin profile part
    Route::get('profile', [AdminController::class, 'adminProfile'])->name('admin-profile');
    Route::post('profile/update', [AdminController::class, 'adminProfileUpdate'])->name('admin-profile-update');
    Route::get('image', [AdminController::class, 'adminProfileImage'])->name('admin-profile-image');
    Route::post('image/update', [AdminController::class, 'adminProfileImageUpdate'])->name('admin-profile-image-update');
    Route::get('password', [AdminController::class, 'adminPassword'])->name('admin-password');
    Route::post('password/update', [AdminController::class, 'adminPasswordUpdate'])->name('admin-password-update');

    /*
     ==========================================================================
     ============================= Category Part ============================
     ==========================================================================
    */
    Route::get('categories', [CategoryController::class, 'index'])->name('categories');
    Route::post('category/add', [CategoryController::class, 'categoryDataAdd'])->name('category-add');
    Route::get('category-edit/{id}', [CategoryController::class, 'categoryDataEdit'])->name('category-data-edit');
    Route::post('category-data/update', [CategoryController::class, 'categoryDataUpdate'])->name('category-data-update');
    Route::get('category-delete/{id}', [CategoryController::class, 'categoryDataDelete'])->name('category-data-delete');

    /*
     ==========================================================================
     ============================= SubCategory Part ============================
     ==========================================================================
    */
    Route::get('subcategories', [CategoryController::class, 'subCategoryIndex'])->name('subcategories');
    Route::post('subcategory/add', [CategoryController::class, 'subCategoryAdd'])->name('subcategory-add');
    Route::get('subcategory-edit/{id}', [CategoryController::class, 'subcategoryDataEdit'])->name('subcategory-data-edit');
    Route::post('subcategory-data/update', [CategoryController::class, 'subcategoryDataUpdate'])->name('subcategory-data-update');
    Route::get('subcategory-delete/{id}', [CategoryController::class, 'subcategoryDataDelete'])->name('subcategory-data-delete');

    /*
     ==========================================================================
     ============================= Brand Part ============================
     ==========================================================================
    */
    Route::get('all-brand', [BrandController::class, 'index'])->name('brands');
    Route::post('brand/add', [BrandController::class, 'brandDataAdd'])->name('brand-add');
    Route::get('brand-edit/{id}', [BrandController::class, 'brandDataEdit'])->name('brand-data-edit');
    Route::post('brand-data/update', [BrandController::class, 'brandDataUpdate'])->name('brand-data-update');
    Route::get('brand-delete/{id}', [BrandController::class, 'brandDataDelete'])->name('brand-data-delete');

    /*
     ==========================================================================
     ============================= Product Part ============================
     ==========================================================================
    */
    Route::get('all-product', [ProductController::class, 'index'])->name('products');
    Route::post('product/add', [ProductController::class, 'productDataAdd'])->name('product-add');
    Route::get('product-edit/{id}', [ProductController::class, 'productDataEdit'])->name('brand-data-edit');
    Route::post('product-data/update', [ProductController::class, 'productDataUpdate'])->name('product-data-update');
    Route::get('product-delete/{id}', [ProductController::class, 'productDataDelete'])->name('product-data-delete');
    /*
     ==========================================================================
     ============================= Banner Part ============================
     ==========================================================================
    */
    Route::get('banner', [BannerController::class, 'index'])->name('banners');
    Route::post('banner/add', [BannerController::class, 'bannerDataAdd'])->name('banner-add');
    Route::get('banner-edit/{id}', [BannerController::class, 'bannerDataEdit'])->name('banner-data-edit');
    Route::post('banner-data/update', [BannerController::class, 'bannerDataUpdate'])->name('banner-data-update');
    Route::get('banner-delete/{id}', [BannerController::class, 'bannerDataDelete'])->name('banner-data-delete');
});

    /*
     ==========================================================================
     ============================= User Part ============================
     ==========================================================================
    */
Route::group(['prefix'=>'user','middleware'=>['user','auth'],'namespace'=>'User'], function(){
    Route::get('dashboard', [UserController::class, 'index'])->name('user-dashboard');
    Route::post('update/data', [UserController::class, 'updateData'])->name('update-profile');
    Route::get('image', [UserController::class, 'profileImage'])->name('profile-image');
    Route::post('image/update', [UserController::class, 'profileImageUpdate'])->name('profile-image-update');
    Route::get('password', [UserController::class, 'userPassword'])->name('user-password');
    Route::post('password/update', [UserController::class, 'userPasswordUpdate'])->name('user-password-update');

});

    /*
     ==========================================================================
     ============================= Ajax Request for select data ============================
     ==========================================================================
    */
Route::get('category-wise/subcategory/{id}', [CategoryController::class, 'categoryWiseSubcategory'])->name('category-wise-subcategory');
Route::get('subcategory-wise/brands/{id}', [BrandController::class, 'subcategoryWiseBrandData'])->name('subcategory-wise-brand');


