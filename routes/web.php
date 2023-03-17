<?php

use Illuminate\Support\Facades\Route;

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
 //Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});


Route::get('/pay',[App\Http\Controllers\PaymentController::class, 'pay'])->name('pay');
Route::post('/dopay/online', [App\Http\Controllers\PaymentController::class, 'handleonlinepay'])->name('dopay.online');

Route::group(['prefix' => 'c~AiN:2)Y42,&*'], function () {

    Auth::routes([
        'register' => false,
    ]);
   Route::get('login', 'App\Http\Controllers\Auth\LoginController@adminLogin')->name('login');
    Route::group(['middleware' => 'auth'], function(){
        Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
  Route::get('change-password',[App\Http\Controllers\Admin\ChangePasswordController::class,'changePassword'])->name('changePassword');
        Route::post('change-password',[App\Http\Controllers\Admin\ChangePasswordController::class,'changePasswordSave'])->name('postChangePassword');
     
        Route::get('/dashboard', 'App\Http\Controllers\Admin\DashboardController@index')->name('c~AiN:2)Y42,&*.dashboard');

        Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);

        Route::resource('gunshow', App\Http\Controllers\Admin\GunShowController::class);
        Route::resource('caliber', App\Http\Controllers\Admin\CaliberController::class);
 Route::match(['put', 'patch'], '/gunshow/UpdateGunshowStatus/{id}',
  'App\Http\Controllers\Admin\GunshowController@UpdateGunshowStatus')->name('UpdateGunshowStatus');
        Route::resource('subcategories', App\Http\Controllers\Admin\SubCategoryController::class);

        Route::resource('bannerImages', App\Http\Controllers\Admin\BannerImagesController::class);

        Route::resource('customers', App\Http\Controllers\Admin\CustomersController::class);

        Route::post('status', 'App\Http\Controllers\Admin\CustomersController@changeStatus')->name('changeStatus');

        Route::post('userChangeStatus',
            'App\Http\Controllers\Admin\CustomersController@userChangeStatus')->name('userChangeStatus');

        Route::post('subscriberChangeStatus',
            'App\Http\Controllers\Admin\SubscriberController@subscriberChangeStatus')->name('subscriberChangeStatus');

        Route::resource('customers', App\Http\Controllers\Admin\CustomersController::class);

        Route::resource('orders', App\Http\Controllers\Admin\OrderManagementController::class);

        Route::resource('reports', App\Http\Controllers\Admin\ReportsController::class);

        Route::resource('customerAddresses', App\Http\Controllers\Admin\CustomerAddressController::class);

        Route::resource('brands', App\Http\Controllers\Admin\BrandsController::class);

        Route::resource('promo', App\Http\Controllers\Admin\PromoController::class);

        Route::resource('terms', App\Http\Controllers\Admin\TermsController::class);

        Route::match(['put', 'patch'], '/aboutus/changeTermStatus/{id}',
            'App\Http\Controllers\Admin\TermsController@changeTermStatus')->name('changeTermStatus');

        Route::resource('privacy', App\Http\Controllers\Admin\PrivacyController::class);

        Route::resource('subscriber', App\Http\Controllers\Admin\SubscriberController::class);

        Route::match(['put', 'patch'], '/privacy/UpdatePrivactStatus/{id}',
            'App\Http\Controllers\Admin\PrivacyController@UpdatePrivactStatus')->name('UpdatePrivactStatus');

        Route::resource('aboutus', App\Http\Controllers\Admin\AboutUs::class);

        Route::match(['put', 'patch'], '/aboutus/updateStatus/{id}',
            'App\Http\Controllers\Admin\AboutUs@updateStatus')->name('updateStatus');

        Route::resource('shipping', App\Http\Controllers\Admin\ShippingController::class);
        /*status routing*/
        /**/
        Route::match(['put', 'patch'], 'customerStatusUpdate',
            'App\Http\Controllers\Admin\OrderManagementController@updateStatus')->name('customerStatusUpdate');

        //tax route
        Route::resource('tax', App\Http\Controllers\Admin\TaxController::class);

        /**
         * Products Route Admin
         */
        Route::resource('products', App\Http\Controllers\Admin\ProductsController::class);

        Route::match(['put', 'patch'], 'productStatusUpdate',
            'App\Http\Controllers\Admin\ProductsController@productStatusUpdate')->name('productStatusUpdate');

        Route::post('products/delete', "App\Http\Controllers\Admin\ProductsController@delete")->name('products.delete');

        Route::post('products/remove-images',
            "App\Http\Controllers\Admin\ProductsController@deleteImages")->name('products.remove-images');

       
            // product Variant
        Route::get('product/variant',
            'App\Http\Controllers\Admin\ProductsController@variant')->name('products.variants');
        Route::post('product/variant',
            'App\Http\Controllers\Admin\ProductsController@variantStore')->name('products.variantStore');

         // customization product

        Route::get('customize',
         'App\Http\Controllers\Admin\CustomizeController@index')->name('customize.index');
        Route::post('customize',
         'App\Http\Controllers\Admin\CustomizeController@viewStore')->name('customize.store');
        Route::get('customize_edit',
         'App\Http\Controllers\Admin\CustomizeController@viewEdit')->name('customize.edit');
         Route::post('customize_edit',
         'App\Http\Controllers\Admin\CustomizeController@viewEditSave')->name('customize.edit_save');
         Route::get('customize_delete',
         'App\Http\Controllers\Admin\CustomizeController@viewDestroy')->name('customize.destroy');
         Route::post('customizeView_edit',
         'App\Http\Controllers\Admin\CustomizeController@activeInactive')->name('customizeView_edit');

         /*
         Clip Art Route
        **/
        Route::get('customize-clip-art',
        'App\Http\Controllers\Admin\ClipController@index')->name('customize.clipArt_index');
         Route::post('clipArt-store',
        'App\Http\Controllers\Admin\ClipController@store')->name('clipArt.store');
        Route::get('clipArt-edit',
        'App\Http\Controllers\Admin\ClipController@edit')->name('clipArt.edit');
        Route::post('clipArt-edit',
        'App\Http\Controllers\Admin\ClipController@update')->name('clipArt.update');
        Route::get('clipArt-delete',
        'App\Http\Controllers\Admin\ClipController@destroy')->name('clipArt.delete');
        Route::post('clipArt-active-inactive',
        'App\Http\Controllers\Admin\ClipController@activeInactive')->name('clipArt.activeInactive');
       
         /*
         End Clip Art Route
        **/

         /*
         Color Route
        **/    
        Route::get('color',
        'App\Http\Controllers\Admin\colorController@index')->name('customize.text_index');
         Route::post('color-store',
        'App\Http\Controllers\Admin\colorController@store')->name('color.store');
        Route::get('color-edit',
        'App\Http\Controllers\Admin\colorController@edit')->name('color.edit');
        Route::post('color-edit',
        'App\Http\Controllers\Admin\colorController@update')->name('color.update');
        Route::get('color-delete',
        'App\Http\Controllers\Admin\colorController@destroy')->name('color.delete');
        Route::post('color-active-inactive',
        'App\Http\Controllers\Admin\colorController@activeInactive')->name('color.activeInactive');
       
         /*
         End Color Route
        **/

        /*
          
        Text Route
        **/    
         Route::post('text-store',
        'App\Http\Controllers\Admin\textController@store')->name('text.store');
        Route::get('text-edit',
        'App\Http\Controllers\Admin\textController@edit')->name('text.edit');
        Route::post('text-edit',
        'App\Http\Controllers\Admin\textController@update')->name('text.update');
        Route::get('text-delete',
        'App\Http\Controllers\Admin\textController@destroy')->name('text.delete');
        Route::post('text-active-inactive',
        'App\Http\Controllers\Admin\textController@activeInactive')->name('text.activeInactive');
       
         /*
         End Text Route
        **/

         //
        Route::resource('productImages', App\Http\Controllers\Admin\ProductImagesController::class);

        Route::resource('productPdfs', App\Http\Controllers\Admin\ProductPdfController::class);

        Route::post('dropzone/upload_image',
            "App\Http\Controllers\Admin\ProductsController@storeImage")->name('dropzone.upload_image');

        Route::get('dropzone/fetch_image/{id}',
            "App\Http\Controllers\Admin\ProductsController@fetch_image")->name('dropzone.fetch_image');

        Route::post('products/removeVideo',
            "App\Http\Controllers\Admin\ProductsController@removeVideo")->name('products.removeVideo');

        Route::get('products/data/import',
            "App\Http\Controllers\Admin\ProductsController@getImportForm")->name('products.importForm');

        Route::post('products/import', "App\Http\Controllers\Admin\ProductsController@import")->name('products.import');

        Route::post('download/sample-file',
            "App\Http\Controllers\Admin\ProductsController@getSampleSheet")->name('download-sample-products-excel');

        // Route::get('dropzone/delete_image', "App\Http\Controllers\Admin\ProductsController@delete_image")->name('dropzone.delete_image');

        Route::get('/get-subcategory',
            "App\Http\Controllers\Admin\PromoController@getSubCategory")->name('get-subcategory');

        Route::get('/get-products',
            "App\Http\Controllers\Admin\PromoController@getproducts")->name('get-products');

        Route::resource('roles', App\Http\Controllers\Admin\RoleController::class);

        Route::resource('permissions', App\Http\Controllers\PermissionController::class);

        Route::resource('users', App\Http\Controllers\Admin\UserController::class);

        Route::get('/contactUs', 'App\Http\Controllers\Admin\ContactController@index');

        Route::get('/contactUs-view/{id}', 'App\Http\Controllers\Admin\ContactController@show');

        Route::get('/destroy/{id}', 'App\Http\Controllers\Admin\ContactController@destroy');


        // Manage Attribute Route
        Route::get('/attribute', 'App\Http\Controllers\Admin\AttributeController@index')->name('attribute');
        Route::get('/attribute_create', 'App\Http\Controllers\Admin\AttributeController@create')->name('attribute_create');
        Route::post('/attribute_store', 'App\Http\Controllers\Admin\AttributeController@store')->name('attribute_store');
        Route::get('/attribute_edit/{id}', 'App\Http\Controllers\Admin\AttributeController@edit')->name('attribute_edit');
        Route::post('/attribute_edit/{id}', 'App\Http\Controllers\Admin\AttributeController@edit_save')->name('attribute_edit');
        Route::get('/attribute_destroy/{id}', 'App\Http\Controllers\Admin\AttributeController@destroy');




    });
});


 Route::post('products/get-subcategory',
            'App\Http\Controllers\Admin\ProductsController@getSubCategory')->name('products.getSubCategory');
   Route::post('products/remove-images',
            "App\Http\Controllers\Admin\ProductsController@deleteImages")->name('products.remove-images');

// Route::group(['prefix' => 'shop'], function () {
// });
// Route::get('/', function () {
//     return view('shop.index');
// });
Route::get('/', 'App\Http\Controllers\PagesController@home')->name('pages');
Route::get('/home', 'App\Http\Controllers\PagesController@home1')->name('pages1');
Route::get('/about-us', 'App\Http\Controllers\PagesController@aboutUs')->name('pages.about-us');
Route::get('/accessories', 'App\Http\Controllers\PagesController@aboutUs')->name('pages.about-us');
Route::get('/non-ffl', 'App\Http\Controllers\PagesController@aboutUs')->name('pages.about-us');
Route::get('/gun-shows', 'App\Http\Controllers\PagesController@gunshows')->name('pages.gun-shows');
Route::get('/contact-us', 'App\Http\Controllers\PagesController@contactUs')->name('pages.contact-us');
Route::post('/contact-us', 'App\Http\Controllers\ContactController@index')->name('contact-us');
Route::post('/contact-us1', 'App\Http\Controllers\ContactController@index1')->name('contact-us1');

Route::get('/product', 'App\Http\Controllers\PagesController@getProduct')->name('pages.product');
Route::get('/product/{id}', 'App\Http\Controllers\PagesController@getProductDetails')->name('pages.product');
Route::get('/product/customise/{id}', 'App\Http\Controllers\PagesController@getCustomiseProductDetails')->name('pages.product');
Route::get('/product', 'App\Http\Controllers\PagesController@getProduct')->name('pages.product');
Route::get('/product_category/{id}/{child_id?}',
    'App\Http\Controllers\PagesController@getAllProduct')->name('pages.all_products');
    


Route::get('/wishlist', 'App\Http\Controllers\PagesController@getWishlist')->name('pages.wishlist');
Route::get('/terms-conditions', 'App\Http\Controllers\PagesController@termConditions')->name('pages.about-us');
Route::get('/faq', 'App\Http\Controllers\PagesController@privarcyPolicy')->name('pages.about-us');
Route::get('/shiping-policy', 'App\Http\Controllers\PagesController@shipingpolicy')->name('shiping.policy');
Route::get('/return-policy', 'App\Http\Controllers\PagesController@returnpolicy')->name('return.policy');
Route::get('/online-buying', 'App\Http\Controllers\PagesController@orderpolicy')->name('order.policy');
Route::get('/privacy-policy', 'App\Http\Controllers\PagesController@privacypolicy')->name('privacy.policy');
Route::get('/texas-laws', 'App\Http\Controllers\PagesController@texaslaws')->name('texas.laws');
Route::get('/faq', 'App\Http\Controllers\PagesController@faq')->name('faq');
/**
 * Add to cart
 **/
Route::post('/add-to-cart-js', 'App\Http\Controllers\AddToCartController@addtoCartJs')->name('add-to-cart-js');
Route::post('/add-to-wishlist-js',
    'App\Http\Controllers\WishlistController@addToWishlistJs')->name('add-to-wishlist-js');
Route::post('/add-to-cart-guest-js',
    'App\Http\Controllers\AddToCartController@addtoCartJs')->name('add-to-cart-guest-js');
Route::get('/search', 'App\Http\Controllers\PagesController@search')->name('search');
Route::get('/autocomplete', 'App\Http\Controllers\PagesController@autocomplete')->name('autocomplete');


Route::group(['prefix' => 'customer'], function () {

    Route::get('/', 'App\Http\Controllers\ShopAccountController@userDasboard')->name('shop-account.account-dashboard');
    Route::get('/account-dashboard',
        'App\Http\Controllers\ShopAccountController@userDasboard')->name('shop-account.account-dashboard');
    Route::get('/account-profile',
        'App\Http\Controllers\ShopAccountController@userProfile')->name('shop-account.account-profile');
    Route::post('/edit-profile',
        'App\Http\Controllers\ShopAccountController@editUserProfile')->name('shop-account.edit-profile');

    Route::get('/account-orders',
        'App\Http\Controllers\ShopAccountController@userOrders')->name('shop-account.account-order');
    Route::get('/account-order-details/{id}',
        'App\Http\Controllers\ShopAccountController@userOrderDetails')->name('shop-account.account-order-details');

    /**
     * Addresses
     **/
    Route::get('/account-addresses',
        'App\Http\Controllers\ShopAccountController@userAddress')->name('shop-account.account-addresses');
    Route::get('/account-address',
        'App\Http\Controllers\ShopAccountController@userAddAddress')->name('shop-account.account-address');
    Route::post('/account-createaddress',
        'App\Http\Controllers\ShopAccountController@userStoreAddress')->name('shop-account.account-createaddress');
    Route::post('/account-makeDefaultAddress',
        'App\Http\Controllers\ShopAccountController@makeDefaultAddress')->name('shop-account.account-makeDefaultAddress');
    Route::get('/account-edit-address',
        'App\Http\Controllers\ShopAccountController@userEditAddress')->name('shop-account.account-edit-address');
    Route::post('/account-userupdateaddress',
        'App\Http\Controllers\ShopAccountController@userUpdateAddress')->name('shop-account.account-userupdateaddress');
    Route::get('/account-edit-address/{id}',
        'App\Http\Controllers\ShopAccountController@userEditAddresses')->name('shop-account.account-edit-address');
    Route::get('/account-remove-address/{id}',
        'App\Http\Controllers\ShopAccountController@userDestroyAddresses')->name('shop-account.account-remove-address');

    /**
     * Change Password
     **/
    Route::get('/account-password',
        'App\Http\Controllers\ShopAccountController@userPassword')->name('shop-account.account-password');
    Route::post('/change-password',
        'App\Http\Controllers\ShopAccountController@changePassword')->name('shop-account.change-password');

    Route::get('/login', 'App\Http\Controllers\Auth\CustomerLoginController@userLogin')->name('shop-account.login');
    Route::post('/login',
        'App\Http\Controllers\Auth\CustomerLoginController@loginCustomer')->name('shop-account.login');
    Route::post('/logout',
        'App\Http\Controllers\Auth\CustomerLoginController@customerLogout')->name('shop-account.logout');

    Route::get('/register', 'App\Http\Controllers\ShopAccountController@userRegister')->name('shop-account.register');
    Route::post('/register',
        'App\Http\Controllers\ShopAccountController@registerCustomer')->name('shop-account.register');
    Route::get('/otp', 'App\Http\Controllers\ShopAccountController@otpCustomer')->name('shop-account.otp');
    Route::post('/check-otp/{id}',
        'App\Http\Controllers\ShopAccountController@checkOtpCustomer')->name('shop-account.check-otp');

    Route::get('/password_reset',
        'App\Http\Controllers\Auth\CustomerPasswordResetController@passwordReset')->name('shop-account.password_reset');
    Route::post('/password_forgot',
        'App\Http\Controllers\Auth\CustomerPasswordResetController@passwordForgot')->name('shop-account.password_forgot');
    Route::get('/reset/{id}/{mail}',
        'App\Http\Controllers\Auth\CustomerPasswordResetController@confirmPassView')->name('shop-account.reset');
    Route::post('/password_confirm',
        'App\Http\Controllers\Auth\CustomerPasswordResetController@confirmPassword')->name('shop-account.password_confirm');
    /**
     * Add to cart
     **/
    Route::resource('/addToCarts', App\Http\Controllers\AddToCartController::class);
    Route::post('/update-cart',
        'App\Http\Controllers\AddToCartController@UpdateCart')->name('shop-account.update-cart');
    Route::post('/remove-to-cart-js',
        'App\Http\Controllers\AddToCartController@removeCartJs')->name('remove-to-cart-js');

    /**
     * Wishlist
     **/
    Route::resource('/wishlists', App\Http\Controllers\WishlistController::class);
    Route::post('/remove-to-wishlist-js',
        'App\Http\Controllers\WishlistController@removeToWishlistJs')->name('remove-to-wishlist-js');

    /**
     * Promo code
     **/
    Route::post('/apply-promo-code',
        'App\Http\Controllers\AddToCartController@applyPromoCode')->name('apply-promo-code');

    /**
     * Checkout
     **/
    Route::get('/checkout', 'App\Http\Controllers\AddToCartController@userCheckout')->name('checkout');
    Route::post('/customer-order', 'App\Http\Controllers\AddToCartController@customerOrders')->name('customer-order');
    Route::get('/guest-checkout', 'App\Http\Controllers\AddToCartController@guestUserCheckout')->name('guest-checkout');
    Route::post('/guest-order', 'App\Http\Controllers\AddToCartController@guestOrder')->name('guest-order');
    Route::get('/order-success/{id}', 'App\Http\Controllers\AddToCartController@orderSuccess')->name('order-success');
});
// Route::get('/cart', 'App\Http\Controllers\ShopAccountController@userCart')->name('shop-account.cart');

Route::get('/checkout', 'App\Http\Controllers\ShopAccountController@userCheckout')->name('shop-account.checkout');

Route::resource('productImages', App\Http\Controllers\ProductImagesController::class);
//check email

Route::post('/checkSubscriber', 'App\Http\Controllers\NewsLetterController@checkSubscriber')->name('checkSubscriber');

Route::get('/send_link/{mail}', 'App\Http\Controllers\NewsLetterController@send_link')->name('send_link');
//check email

Route::post('/get_state', 'App\Http\Controllers\LocationController@get_state');

Route::post('/get_city', 'App\Http\Controllers\LocationController@get_city');

Route::group(['prefix'     => Config::get('location.routes.prefix'),
              'namespace'  => 'Ichtrojan\Location\Http\Controllers',
              'middleware' => [Config::get('location.routes.middleware')]
], function () {
    # Get all Countries
    Route::get('countries', 'App\Http\Controllers\LocationController@getCountries');

    # Get a Country by its ID
    Route::get('country/{id}', 'App\Http\Controllers\LocationController@getCountry');

    # Get all States
    Route::get('states', 'App\Http\Controllers\LocationController@getStates');

    # Get a State by its ID
    Route::get('state/{id}', 'App\Http\Controllers\LocationController@getState');

    # Get all States in a Country using the Country ID
    Route::get('states/{countryId}', 'App\Http\Controllers\LocationController@getStatesByCountry');

    # Get all Cities
    Route::get('cities', 'App\Http\Controllers\LocationController@getCities');

    # Get a City by its ID
    Route::get('city/{id}', 'App\Http\Controllers\LocationController@getCity');

    # Get all Cities in a State using the State ID
    Route::get('cities/{stateId}', 'App\Http\Controllers\LocationController@getCitiesByStates');

    # Get all Cities in a Country using the Country ID
    Route::get('country-cities/{countryId}', 'App\Http\Controllers\LocationController@getCitiesByCountry');
});
