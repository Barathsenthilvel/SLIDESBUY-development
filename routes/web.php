<?php

use Illuminate\Support\Facades\Route;
use App\Mail\AdminMails;
use App\Http\Controllers\Front\UserController;
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
Route::get('/product/{id}', 'Front\ProductController@coffeeproduct')->name('coffee-prodcut');

Route::post('frontState','Front\UserController@getstate')->name('front-getstate');
Route::post('frontCity','Front\UserController@getCity')->name('front-getcity');
Route::post('frontPincode','Front\UserController@getPincode')->name('front-Pincode');
Route::post('selectPincode','Front\UserController@selectPincode')->name('front-selectPincode');
Route::get('/changepin','Front\UserController@profile')->name('profile');

Route::post('/getState2','Admin\CountryController@getState')->name('getStates');
Route::post('/getCity2','Admin\CountryController@getCity')->name('getCities');
// Route::post('/getState1','Admin\CountryController@getStates')->name('getState');
// Route::post('/getCity1','Admin\CountryController@getCities')->name('getCity');
Route::post('/getPincodes1', 'Admin\CountryController@getPincodes')->name('getPincodes');
Route::post('/addPincodes1', 'Admin\CountryController@addPincodes')->name('addPincodes');

////end silk
Route::post('/getState1','Admin\CountryController@getState')->name('getState');
Route::post('/getCity1','Admin\CountryController@getCity')->name('getCity');
Route::get('/checkemail', 'Front\FrontendController@checkemail')->name('checkemail');
Route::get('/checkphone', 'Front\FrontendController@checkphone')->name('checkphone');

// Front routes
Route::get('/home', 'Front\FrontendController@index')->name('login');
Route::get('/', 'Front\FrontendController@index')->name('front.index');
Route::post('/loginmobile', 'Front\UserController@signOnWithMobileNo')->name('login.mobile');
Route::get('/sign-up', 'Front\UserController@LoadLogin')->name('front.loginBlade');
Route::get('/thankyou', 'Front\UserController@thankyou')->name('thankyou');

// Wishlist routes - accessible to both guest and authenticated users
Route::get('/wishlist', 'Front\UserController@wishlist')->name('wishlist');

Route::middleware('auth')->group(function () {
    Route::post('/wishlistAdd', 'Front\UserController@wishlistAdd')->name('wishlistAdd');
    Route::post('/wishlistRemove', 'Front\UserController@wishlistremove')->name('wishlistremove');
    Route::get('/wishlistTemplate', 'Front\UserController@wishlistTemplate')->name('wishlistTemplate');
});
Route::get('/myaddress', 'Front\UserController@myaccount')->name('front.account');
Route::get('/verification/{id}/{token}', 'Front\UserController@verify')->name('front.verify');
Route::Post('/forgoaaaaaat', 'Front\UserController@forgotpasswordaaa')->name('front.forgot');
//Route::Post('/forgot', 'Front\UserController@forgotpassword')->name('front.forgot');
Route::get('/contactus', 'Front\UserController@contactus')->name('front.contactus');
Route::post('/contactus', 'Front\UserController@contact')->name('front.contact');
// Route::get('/return/{Order}', 'Front\UserController@return')->name('front.return');
Route::post('/likes', 'Front\ProductController@likeCount');
Route::get('/termandconduction', 'Front\UserController@termandconduction')->name('front.tc');
Route::get('/aboutus', 'Front\UserController@aboutus')->name('front.aboutus');
Route::get('/shipping', 'Front\FrontendController@shipping')->name('front.shipping');
Route::get('/blog', 'Front\FrontendController@blogList')->name('front.blogList');
Route::get('/blog/{url}', 'Front\FrontendController@blog')->name('front.blog');
Route::get('/userprofile', 'Front\UserController@userprofile')->name('front.userprofile');
Route::post('/userprofileupdate', 'Front\UserController@userprofileupdate')->name('front.userprofileupdate');
Route::get('/email', function(){
  return new AdminMails() ;
});

Route::get('/privacy_policy', 'Front\FrontendController@Privacy_Policy')->name('front.Privacy_Policy');
Route::get('/shipping_policy', 'Front\FrontendController@Shipping_Policy')->name('front.Shipping_Policy');
Route::get('/terms_conditions', 'Front\FrontendController@TermsConditions')->name('front.TermsConditions');
Route::get('/duties_customs_taxes', 'Front\FrontendController@CustomsTaxes')->name('front.CustomsTaxes');
Route::get('/FAQ', 'Front\FrontendController@FAQ')->name('front.FAQ');
Route::get('/About', 'Front\FrontendController@About')->name('front.about');
Route::get('/return_exchange_cancel', 'Front\FrontendController@returnandcancle')->name('front.returnandcancle');
Route::get('/Disclaimer', 'Front\FrontendController@Disclaimer')->name('front.Disclaimer');
Route::get('/subscription-renewal', 'Front\FrontendController@SubscriptionRenewal')->name('front.SubscriptionRenewal');
Route::get('/cancellation-refund', 'Front\FrontendController@CancellationRefund')->name('front.CancellationRefund');
Route::get('/Careers', 'Front\FrontendController@Careers')->name('front.Careers');
Route::get('/Contact_Us', 'Front\FrontendController@Contact_Us')->name('front.Contact_Us');
Route::get('/TrackOrder', 'Front\FrontendController@TrackOrder')->name('front.TrackOrder');
Route::get('/Vendor', 'Front\FrontendController@Vendor')->name('front.Vendor');
Route::get('/Otpverify', 'Front\CartController@Otpverify')->name('Otpverify');
Route::post('/generateotp', 'Front\CartController@generateOTP')->name('generateOTP');


Route::get('/emailtest', 'Front\CheckoutController@checkmail');
// Route::get('/login', 'Front\UserController@index')->name('login.index');
Route::get('/shop-detail/{id}', 'Front\FrontendController@product')->name('front.product');
Route::get('/shop/{category?}/{sub?}', 'Front\FrontendController@getCategory')->name('front.getCategory');
Route::get('/filter/{category?}/{sub?}', 'Front\FrontendController@filter')->name('front.filter');
Route::post('/Subscribes', 'Front\FrontendController@Subscribes')->name('Subscribes');
Route::get('/ajaxorder', 'Front\UserController@Ajaxorder')->name('Ajaxorder');
// Route::get('/category/{category?}', 'Front\FrontendController@getProduct')->name('front.getProduct');

// Route::get('/Product/{Category?}/{subcategory?}','Front\ProductController@product')->name('product.Product');
Route::get('/item/{slug}', 'Front\ProductController@item')->name('product.item');
Route::post('/submitReview', 'Front\ProductController@review')->name('product.review');
Route::post('/submitReview/{order}/', 'Front\ProductController@reviewinorder')->name('product.review.order');
Route::get('/loadreview/{id}', 'Front\ProductController@loadreview')->name('load.review');
Route::get('/quickview/{id}', 'Front\ProductController@quickview')->name('quickview');


// Route::get('/login', 'Front\UserController@index')->name('user.login');
// Route::post('/login', 'Front\UserController@login')->name('front.login');
Route::any('/register', 'Front\UserController@register')->name('user.register');
Route::get('/logout', 'Front\UserController@logout')->name('user.logout');
Route::get('/cart','Front\UserController@cart')->name('cart.user');
Route::post('/profile','Front\UserController@updateProfile')->name('update.profile');
Route::get('/vieworder/order/{id}','Front\UserController@vieworder')->name('vieworder');
Route::get('/repeartorder/{Order}','Front\UserController@repeartorder')->name('repeartorder');
Route::get('/myorders','Front\UserController@order')->name('order');
// Route::get('/purchase','Front\FrontendController@subscription')->name('front.subscription');
 Route::get('/pricing-plan','Front\SubscriptionController@showPlans')->name('front.subscription');
//subscription forntend
Route::middleware('auth')->group(function () {

    Route::post('/subscribe/{plan}','Front\SubscriptionController@subscribe')->name('subscribe.post');
    Route::get('/subscription/{id}','Front\RazorpayPaymentController@show')->name('subscription.show');
    Route::post('/payment','Front\RazorpayPaymentController@payment')->name('razorpay.payment');
    //subscription get data
    Route::get('/subscription/success/{id}','Front\SubscriptionController@success')->name('subscription.success');
    Route::get('download/{product}', 'Front\ProductController@download')->name('download.product');
    // routes/web.php
// Route::get('/product/{product}/download','Front\ProductController@downloaddocuments')->name('product.download');
    Route::get('/my-account','Front\AccountController@index')->name('account.profile');
    Route::get('/my-account/downloads','Front\AccountController@downloads')->name('account.downloads');
    Route::get('/my-account/subscriptions','Front\AccountController@subscriptions')->name('account.subscriptions');
    Route::get('/my-account/profile','Front\AccountController@profile')->name('account.profile.edit');
    Route::post('/logout', 'Front\AccountController@destroy')->name('logout');
Route::post('/account/update','Front\AccountController@update')->name('account.update');


Route::post('/update-password','Front\AccountController@changePassword')->name('password.change');
// Route::get('/my-downloads','Front\AccountController@userDownloads')->name('user.downloads');
Route::get('/download-file/{product}', 'Front\AccountController@download')->name('download.file');

// Example route for writing a review for a product
// Route::get('/write-review/{product}', 'Front\ReviewController@create')->name('product.review.create');


});

Route::get('/product/{product}/download','Front\ProductController@downloaddocuments')
    ->middleware('auth')
    ->name('product.download');

Route::get('/download/invoice/{orderNo}', 'Front\CheckoutController@downloadInvoice')
    ->middleware('auth')
    ->name('download.invoice');
//new routes added

Route::any('/sign-in','Front\UserController@signIn')->name('login.submit');
Route::any('/login','Front\UserController@showLoginForm')->name('login.form');


//otp =====>Routes
Route::get('/otp-form','Front\UserController@showOtpForm')->name('otp.form');
// Route::get('/otp-form','Front\UserController@showOtpForm')->name('otp.form');
Route::post('/send-otp','Front\UserController@sendOtp')->name('send.otp');
Route::post('/verify-otp','Front\UserController@verifyOtp')->name('verify.otp');
Route::post('/resend-otp','Front\UserController@resendOtp')->name('resend.otp');


//forget password==>



Route::get('password/reset','Front\UserController@showLinkRequestForm')->name('password.request');
Route::post('password/email','Front\UserController@sendResetLinkEmail')->name('password.email');


Route::get('password/reset/{token}','Front\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset','Front\ResetPasswordController@reset')->name('password.update');


//paymentcontroler
Route::Post('/CustomerCancelOrder/{order}','Front\CheckoutController@CustomerCancelOrder')->name('view.CustomerCancelOrder');
Route::Post('/CustomerCancelOrderSingle/{order}','Front\CheckoutController@CustomerCancelOrderSingle')->name('view.CustomerCancelOrderSingle');
Route::get('/deliveryaddress','Front\CheckoutController@deliveryaddress')->name('view.deliveryaddress');
Route::get('/order','Front\CheckoutController@order')->name('view.order');
Route::get('/checkout','Front\CheckoutController@checkout')->name('view.checkout');
Route::get('/payments','Front\CheckoutController@paymentpage')->name('view.payment');
Route::get('/checkout/{$id}','Front\CheckoutController@checkout');
Route::Post('/cart/summer','Front\CheckoutController@Cart_render')->name('cart_summer');
Route::get('/cart/Summer','Front\CheckoutController@Cart_render0')->name('cart_summer0');
Route::post('/coc','Front\CheckoutController@CashOnDelivery')->name('coc.user');
Route::post('/address','Front\CheckoutController@addAddress')->name('user.add.address');
Route::get('/render','Front\CheckoutController@render')->name('user.render.address');
Route::get('/edit/{id}','Front\CheckoutController@edit')->name('user.edit.address');
Route::get('/delete/{id}','Front\CheckoutController@delete')->name('user.delete.address');
Route::post('/update','Front\CheckoutController@update')->name('user.update.address');
Route::get('/state','Front\CheckoutController@state')->name('user.state');
Route::get('/city','Front\CheckoutController@city')->name('user.city');
Route::get('/pincode','Front\CheckoutController@pincode')->name('user.pincode');
Route::get('/Paymentreturn','Front\CheckoutController@Paymentreturn')->name('user.Paymentreturn');
Route::get('/razorpay','Front\CheckoutController@razorpay')->name('user.razorpay');
Route::post('/razorpayReturn','Front\CheckoutController@razorpayReturn')->name('user.razorpayReturn');
Route::post('/cash','Front\CheckoutController@COD')->name('user.cash');
Route::get('/payment','Front\CheckoutController@fail')->name('user.paymentfail');
Route::get('/ckeck','Front\CheckoutController@checkorder')->name('user.checkCart');
Route::post('/applycoupon','Front\CheckoutController@applycoupon')->name('user.applycoupon');
Route::get('/removecoupon','Front\CheckoutController@removecoupon')->name('user.remove.coupon');
Route::get('/deliveryextraxharge','Front\CheckoutController@deliveryextraxharge')->name('user.deliveryextraxharge');
Route::get('/checkoutsummery','Front\CheckoutController@checkoutsummery')->name('user.checkoutsummery');
Route::get('/paymentsummery','Front\CheckoutController@paymentsummery')->name('user.paymentsummery');
//waste
Route::get('/india','Front\CheckoutController@india')->name('india_first');
Route::get('/india1','Front\CheckoutController@india1')->name('india_one');

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');

//Cart
Route::get('/card/render','Front\CartController@render')->name('user.render.card');
Route::get('/cart/render','Front\CartController@rendercart')->name('user.rendershippig.cart');
Route::get('/cart/add/','Front\CartController@addtocard')->name('user.add.card');
Route::get('/cart/add/{id}','Front\CartController@addtocard');
Route::get('/cart/remove/','Front\CartController@remove')->name('user.remove.card');
Route::get('/cart/remove/{id}','Front\CartController@remove');
Route::get('/cart/reducecard/','Front\CartController@reducecard')->name('user.reducecard.card');
Route::get('/cart','Front\CartController@cart')->name('view.cart');
// Cart Return
Route::get('/cart/renderReturn','Front\CartController@rendercartReturn')->name('user.render.cartReturn');
Route::get('/cartReturn/add/','Front\CartController@addtocardReturn')->name('user.add.cardReturn');
Route::get('/cartReturn/add/{id}','Front\CartController@addtocardReturn');
Route::get('/cartReturn/remove/','Front\CartController@removeReturn')->name('user.remove.cardReturn');
Route::get('/cartReturn/remove/{id}','Front\CartController@removeReturn');
Route::get('/cartReturn/reducecard/','Front\CartController@reducecardReturn')->name('user.reducecard.cardReturn');
Route::post('/Form/submit/{Order}','Front\CartController@submitReduce')->name('Submit-return-product');

Route::get('/return/{Order}', 'Front\ReturnController@return')->name('front.return');
Route::get('/return/cancel/{id}', 'Front\ReturnController@cancel')->name('front.return.cancel');
Route::get('/return/view/{id}', 'Front\ReturnController@view')->name('front.return.view');
Route::get('/history/{id}', 'Front\ReturnController@history')->name('front.return.history');
Route::get('/returninvoice/{id}', 'Front\ReturnController@invoice')->name('front.return.invoice');

Route::post('/getState/', 'Admin\CustomerController@getState')->name('admin-getstate-user');
Route::post('/getCities/', 'Admin\CustomerController@getCities')->name('admin-getCities-user');
Route::post('/getPincodes/', 'Admin\CustomerController@getPincodes')->name('admin-getPincodes-user');
Route::post('/addPincodes/', 'Admin\CustomerController@addPincodes')->name('admin-addPincodes-user');
Route::get('/getCity/', 'Admin\CustomerController@getCity')->name('admin-getCity-user');
// ************************************ ADMIN SECTION **********************************************

Route::prefix('admin')->group(function() {
    Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
  });
  Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
  });
  //------------ ADMIN LOGIN SECTION ------------

  Route::get('/', 'Admin\LoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Admin\LoginController@login')->name('admin.login.submit');
  // Route::get('/forgot', 'Admin\LoginController@showForgotForm');
  Route::post('/forgot', 'Admin\LoginController@forgot')->name('admin-forgot');
  Route::get('/logout', 'Admin\LoginController@logout')->name('admin.logout');
  Route::Post('/Order', 'Admin\LoginController@getOrder')->name('get-order');
  Route::Post('/Chart', 'Admin\LoginController@chart')->name('get-chart');

  Route::group(['middleware' => 'auth:webadmin'], function() {
  Route::get('/dashboard', 'Admin\LoginController@dashboard')->name('admin.dashboard');
  Route::get('/setting', 'Admin\LoginController@changePassword')->name('admin.changePassword');
  Route::post('/setting', 'Admin\LoginController@changingPassword')->name('admin.changingPassword');
  Route::post('/getSubCategory','Admin\CategoryController@getSubCategory')->name('getSubCategory');

  Route::group(['prefix'=>'menu','middleware'=>'permissions:admin-menu'],function() {
  Route::get('/index', 'Admin\AdminMenuController@index')->name('admin-menu');
  Route::get('/create', 'Admin\AdminMenuController@create')->name('admin-menu-create')->middleware('permissions:admin-menu1');
  Route::post('/create', 'Admin\AdminMenuController@store')->name('admin-menu-store');
  Route::get('/edit/{id}', 'Admin\AdminMenuController@edit')->name('admin-menu-edit')->middleware('permissions:admin-menu2');
  Route::post('/edit/{id}', 'Admin\AdminMenuController@update')->name('admin-menu-update');
  Route::get('/datatables', 'Admin\AdminMenuController@datatables')->name('admin-menu-datatables');
  Route::get('/status/{id1}/{id2}', 'Admin\AdminMenuController@status')->name('admin-menu-status')->middleware('permissions:admin-menu2');
  Route::get('/delete/{id}', 'Admin\AdminMenuController@destroy')->name('admin-menu-delete')->middleware('permissions:admin-menu3');

    });

  Route::group(['prefix'=>'module','middleware'=>'permissions:admin-module'],function() {
  Route::get('/index', 'Admin\ModuleController@index')->name('admin-module');
  Route::get('/create', 'Admin\ModuleController@create')->name('admin-module-create')->middleware('permissions:admin-module1');
  Route::post('/create', 'Admin\ModuleController@store')->name('admin-module-store');
  Route::get('/edit/{id}', 'Admin\ModuleController@edit')->name('admin-module-edit')->middleware('permissions:admin-module2');
  Route::post('/edit/{id}', 'Admin\ModuleController@update')->name('admin-module-update');
  Route::get('/datatables', 'Admin\ModuleController@datatables')->name('admin-module-datatables');
  Route::get('/status/{id1}/{id2}', 'Admin\ModuleController@status')->name('admin-module-status')->middleware('permissions:admin-module2');
  Route::get('/delete/{id}', 'Admin\ModuleController@destroy')->name('admin-module-delete')->middleware('permissions:admin-module3');

    });

  Route::group(['prefix'=>'menu-module','middleware'=>'permissions:admin-menu-module'],function() {
  Route::get('/index', 'Admin\MenuModuleController@index')->name('admin-menu-module');
  Route::get('/datatables', 'Admin\MenuModuleController@datatables')->name('admin-menu-module-datatables');
  Route::get('/edit/{id}', 'Admin\MenuModuleController@edit')->name('admin-menu-module-edit');
  Route::post('/edit/{id}', 'Admin\MenuModuleController@update')->name('admin-menu-module-update');
  Route::get('/delete/{id}', 'Admin\MenuModuleController@destroy')->name('admin-menu-module-delete');

        });


  Route::group(['prefix'=>'role','middleware'=>'permissions:admin-role'],function() {
  Route::get('/index', 'Admin\RoleController@index')->name('admin-role');
  Route::get('/create', 'Admin\RoleController@create')->name('admin-role-create')->middleware('permissions:admin-role1');
  Route::post('/create', 'Admin\RoleController@store')->name('admin-role-store');
  Route::get('/edit/{id}', 'Admin\RoleController@edit')->name('admin-role-edit')->middleware('permissions:admin-role2');
  Route::post('/edit/{id}', 'Admin\RoleController@update')->name('admin-role-update');
  Route::get('/datatables', 'Admin\RoleController@datatables')->name('admin-role-datatables');
  Route::get('/status/{id1}/{id2}', 'Admin\RoleController@status')->name('admin-role-status')->middleware('permissions:admin-role2');
  Route::get('/delete/{id}', 'Admin\RoleController@destroy')->name('admin-role-delete')->middleware('permissions:admin-role3');

	});

  Route::group(['prefix'=>'permission','middleware'=>'permissions:admin-permission'],function() {
  Route::get('/index', 'Admin\PermissionController@index')->name('admin-permission');
  Route::get('/datatables', 'Admin\PermissionController@datatables')->name('admin-permission-datatables');
  Route::get('/edit/{id}', 'Admin\PermissionController@edit')->name('admin-permission-edit')->middleware('permissions:admin-permission2');
  Route::post('/edit/{id}', 'Admin\PermissionController@update')->name('admin-permission-update');
  Route::get('/delete/{id}', 'Admin\PermissionController@destroy')->name('admin-permission-delete')->middleware('permissions:admin-permission3');

		});

    Route::group(['prefix'=>'user','middleware'=>'permissions:admin-user'],function() {
    Route::get('/index', 'Admin\LoginController@index')->name('admin-user');
    Route::get('/create', 'Admin\LoginController@create')->name('admin-user-create')->middleware('permissions:admin-user1');
    Route::post('/create', 'Admin\LoginController@store')->name('admin-user-store');
    Route::get('/datatables', 'Admin\LoginController@datatables')->name('admin-user-datatables');
    Route::get('/status/{id1}/{id2}', 'Admin\LoginController@status')->name('admin-user-status')->middleware('permissions:admin-user2');
    Route::get('/edit/{id}', 'Admin\LoginController@edit')->name('admin-user-edit')->middleware('permissions:admin-user2');
    Route::post('/edit/{id}', 'Admin\LoginController@update')->name('admin-user-update');
    Route::get('/delete/{id}', 'Admin\LoginController@destroy')->name('admin-user-delete')->middleware('permissions:admin-user3');
    });

	Route::group(['prefix'=>'banner','middleware'=>'permissions:admin-banner'],function() {
    Route::get('/index', 'Admin\BannerController@index')->name('admin-banner');
    Route::get('/create', 'Admin\BannerController@create')->name('admin-banner-create')->middleware('permissions:admin-banner1');
    Route::post('/create', 'Admin\BannerController@store')->name('admin-banner-store');
    Route::get('/datatables', 'Admin\BannerController@datatables')->name('admin-banner-datatables');
    Route::get('/status/{id1}/{id2}', 'Admin\BannerController@status')->name('admin-banner-status')->middleware('permissions:admin-banner2');
    Route::get('/edit/{id}', 'Admin\BannerController@edit')->name('admin-banner-edit')->middleware('permissions:admin-banner2');
    Route::post('/edit/{id}', 'Admin\BannerController@update')->name('admin-banner-update');
    Route::get('/delete/{id}', 'Admin\BannerController@destroy')->name('admin-banner-delete')->middleware('permissions:admin-banner3');
        Route::post('/crop', 'Admin\BannerController@cropimage')->name('admin-Banner-cropimage');

    });

    Route::group(['prefix'=>'mailtemplate','middleware'=>'permissions:admin-mailtemplate'],function() {
    Route::get('/index', 'Admin\MailTemplateController@index')->name('admin-mailtemplate');
    Route::get('/create', 'Admin\MailTemplateController@create')->name('admin-mailtemplate-create')->middleware('permissions:admin-mailtemplate1');
    Route::post('/create', 'Admin\MailTemplateController@store')->name('admin-mailtemplate-store');
    Route::get('/datatables', 'Admin\MailTemplateController@datatables')->name('admin-mailtemplate-datatables');
    Route::get('/status/{id1}/{id2}', 'Admin\MailTemplateController@status')->name('admin-mailtemplate-status')->middleware('permissions:admin-mailtemplate2');
    Route::get('/edit/{id}', 'Admin\MailTemplateController@edit')->name('admin-mailtemplate-edit');
    Route::post('/edit/{id}', 'Admin\MailTemplateController@update')->name('admin-mailtemplate-update')->middleware('permissions:admin-mailtemplate2');
    Route::get('/delete/{id}', 'Admin\MailTemplateController@destroy')->name('admin-mailtemplate-delete')->middleware('permissions:admin-mailtemplate3');
    });

    Route::group(['prefix'=>'attribute','middleware'=>'permissions:admin-attribute'],function() {
    Route::get('/index', 'Admin\AttributeController@index')->name('admin-attribute');
    Route::get('/create', 'Admin\AttributeController@create')->name('admin-attribute-create')->middleware('permissions:admin-attribute1');
    Route::post('/create', 'Admin\AttributeController@store')->name('admin-attribute-store');
    Route::get('/datatables', 'Admin\AttributeController@datatables')->name('admin-attribute-datatables');
    Route::get('/status/{id1}/{id2}', 'Admin\AttributeController@status')->name('admin-attribute-status')->middleware('permissions:admin-attribute2');
    Route::get('/edit/{id}', 'Admin\AttributeController@edit')->name('admin-attribute-edit')->middleware('permissions:admin-attribute2');
    Route::post('/edit/{id}', 'Admin\AttributeController@update')->name('admin-attribute-update');
    Route::get('/delete/{id}', 'Admin\AttributeController@destroy')->name('admin-attribute-delete')->middleware('permissions:admin-attribute3');
    });

    Route::group(['prefix'=>'attributegroup','middleware'=>'permissions:admin-attributegroup'],function() {
    Route::get('/index', 'Admin\AttributeGroupController@index')->name('admin-attributegroup');
    Route::get('/create', 'Admin\AttributeGroupController@create')->name('admin-attributegroup-create')->middleware('permissions:admin-attributegroup1');
    Route::post('/create', 'Admin\AttributeGroupController@store')->name('admin-attributegroup-store');
    Route::get('/datatables', 'Admin\AttributeGroupController@datatables')->name('admin-attributegroup-datatables');
    Route::get('/status/{id1}/{id2}', 'Admin\AttributeGroupController@status')->name('admin-attributegroup-status')->middleware('permissions:admin-attributegroup2');
    Route::get('/edit/{id}', 'Admin\AttributeGroupController@edit')->name('admin-attributegroup-edit')->middleware('permissions:admin-attributegroup2');
    Route::post('/edit/{id}', 'Admin\AttributeGroupController@update')->name('admin-attributegroup-update');
    Route::get('/delete/{id}', 'Admin\AttributeGroupController@destroy')->name('admin-attributegroup-delete')->middleware('permissions:admin-attributegroup3');
    });


    Route::group(['prefix'=>'currency','middleware'=>'permissions:admin-currency'],function() {
    Route::get('/index', 'Admin\CurrencyController@index')->name('admin-currency');
    Route::get('/create', 'Admin\CurrencyController@create')->name('admin-currency-create')->middleware('permissions:admin-currency1');
    Route::post('/create', 'Admin\CurrencyController@store')->name('admin-currency-store');
    Route::get('/datatables', 'Admin\CurrencyController@datatables')->name('admin-currency-datatables');
    Route::get('/status/{id1}/{id2}', 'Admin\CurrencyController@status')->name('admin-currency-status')->middleware('permissions:admin-currency2');
    Route::get('/edit/{id}', 'Admin\CurrencyController@edit')->name('admin-currency-edit')->middleware('permissions:admin-currency2');
    Route::post('/edit/{id}', 'Admin\CurrencyController@update')->name('admin-currency-update');
    Route::get('/delete/{id}', 'Admin\CurrencyController@destroy')->name('admin-currency-delete')->middleware('permissions:admin-currency3');
    });

    Route::group(['prefix'=>'tax','middleware'=>'permissions:admin-tax'],function() {
    Route::get('/index', 'Admin\TaxController@index')->name('admin-tax');
    Route::get('/create', 'Admin\TaxController@create')->name('admin-tax-create')->middleware('permissions:admin-tax1');
    Route::post('/create', 'Admin\TaxController@store')->name('admin-tax-store');
    Route::get('/datatables', 'Admin\TaxController@datatables')->name('admin-tax-datatables');
    Route::get('/status/{id1}/{id2}', 'Admin\TaxController@status')->name('admin-tax-status')->middleware('permissions:admin-tax2');
    Route::get('/edit/{id}', 'Admin\TaxController@edit')->name('admin-tax-edit')->middleware('permissions:admin-tax2');
    Route::post('/edit/{id}', 'Admin\TaxController@update')->name('admin-tax-update');
    Route::get('/delete/{id}', 'Admin\TaxController@destroy')->name('admin-tax-delete')->middleware('permissions:admin-tax3');
    Route::post('/template', 'Admin\TaxController@template')->name('admin-tax-template');
    });
    Route::group(['prefix'=>'country','middleware'=>'permissions:admin-Country'],function() {
      Route::get('/index', 'Admin\StateController@index1')->name('admin-Country');
      Route::get('/datatables1', 'Admin\StateController@datatables1')->name('admin-state-datatables1');
      Route::get('/status1/{id1}/{id2}', 'Admin\StateController@status1')->name('admin-state-country');
    });
    Route::group(['prefix'=>'state','middleware'=>'permissions:admin-state'],function() {
    Route::get('/index', 'Admin\StateController@index')->name('admin-state');
    Route::get('/create', 'Admin\StateController@create')->name('admin-state-create')->middleware('permissions:admin-state1');
    Route::post('/create', 'Admin\StateController@store')->name('admin-state-store');
    Route::get('/datatables', 'Admin\StateController@datatables')->name('admin-state-datatables');
    Route::get('/status/{id1}/{id2}', 'Admin\StateController@status')->name('admin-state-status')->middleware('permissions:admin-state2');
    Route::get('/edit/{id}', 'Admin\StateController@edit')->name('admin-state-edit')->middleware('permissions:admin-state2');
    Route::post('/edit/{id}', 'Admin\StateController@update')->name('admin-state-update');
    Route::get('/delete/{id}', 'Admin\StateController@destroy')->name('admin-state-delete')->middleware('permissions:admin-state3');
    });

    Route::group(['prefix'=>'city','middleware'=>'permissions:admin-city'],function() {
    Route::get('/index', 'Admin\CityController@index')->name('admin-city');
    Route::get('/create', 'Admin\CityController@create')->name('admin-city-create')->middleware('permissions:admin-city1');
    Route::post('/create', 'Admin\CityController@store')->name('admin-city-store');
    Route::get('/datatables', 'Admin\CityController@datatables')->name('admin-city-datatables');
    Route::get('/status/{id1}/{id2}', 'Admin\CityController@status')->name('admin-city-status')->middleware('permissions:admin-city2');
    Route::get('/edit/{id}', 'Admin\CityController@edit')->name('admin-city-edit')->middleware('permissions:admin-city2');
    Route::post('/edit/{id}', 'Admin\CityController@update')->name('admin-city-update');
    Route::get('/delete/{id}', 'Admin\CityController@destroy')->name('admin-city-delete')->middleware('permissions:admin-city3');
    });

    Route::group(['prefix'=>'pincode','middleware'=>'permissions:admin-pincode'],function() {
    Route::get('/index', 'Admin\PincodeController@index')->name('admin-pincode');
    Route::get('/create', 'Admin\PincodeController@create')->name('admin-pincode-create')->middleware('permissions:admin-pincode1');
    Route::post('/create', 'Admin\PincodeController@store')->name('admin-pincode-store');
    Route::get('/datatables', 'Admin\PincodeController@datatables')->name('admin-pincode-datatables');
    Route::get('/status/{id1}/{id2}', 'Admin\PincodeController@status')->name('admin-pincode-status')->middleware('permissions:admin-pincode2');
    Route::get('/edit/{id}', 'Admin\PincodeController@edit')->name('admin-pincode-edit')->middleware('permissions:admin-pincode2');
    Route::post('/edit/{id}', 'Admin\PincodeController@update')->name('admin-pincode-update');
    Route::get('/delete/{id}', 'Admin\PincodeController@destroy')->name('admin-pincode-delete')->middleware('permissions:admin-pincode3');
    });

    Route::group(['prefix'=>'mapgroup','middleware'=>'permissions:admin-mapgroup'],function() {
    Route::get('/index', 'Admin\MapGroupController@index')->name('admin-mapgroup');
    Route::get('/create', 'Admin\MapGroupController@create')->name('admin-mapgroup-create')->middleware('permissions:admin-mapgroup1');
    Route::post('/create', 'Admin\MapGroupController@store')->name('admin-mapgroup-store');
    Route::get('/datatables', 'Admin\MapGroupController@datatables')->name('admin-mapgroup-datatables');
    Route::get('/status/{id1}/{id2}', 'Admin\MapGroupController@status')->name('admin-mapgroup-status')->middleware('permissions:admin-mapgroup2');
    Route::get('/edit/{id}', 'Admin\MapGroupController@edit')->name('admin-mapgroup-edit')->middleware('permissions:admin-mapgroup2');
    Route::post('/edit/{id}', 'Admin\MapGroupController@update')->name('admin-mapgroup-update');
    Route::get('/delete/{id}', 'Admin\MapGroupController@destroy')->name('admin-mapgroup-delete')->middleware('permissions:admin-mapgroup3');
    });

    Route::group(['prefix'=>'catalog','middleware'=>'permissions:admin-category'],function() {
    Route::get('/index', 'Admin\CategoryController@index')->name('admin-category');
    Route::get('/create', 'Admin\CategoryController@create')->name('admin-category-create')->middleware('permissions:admin-category1');
    Route::post('/store', 'Admin\CategoryController@store')->name('admin-category-store');
    Route::get('/edit/{id}', 'Admin\CategoryController@edit')->name('admin-category-edit')->middleware('permissions:admin-category2');
    Route::post('/edit/{id}', 'Admin\CategoryController@update')->name('admin-category-update');
    Route::get('/datatables', 'Admin\CategoryController@datatables')->name('admin-category-datatables');
    Route::get('/status/{id1}/{id2}', 'Admin\CategoryController@status')->name('admin-category-status')->middleware('permissions:admin-category2');
    Route::get('/delete/{id}', 'Admin\CategoryController@destroy')->name('admin-category-delete')->middleware('permissions:admin-category3');
    Route::post('/crop', 'Admin\CategoryController@cropimage')->name('admin-category-cropimage');
    });

    Route::group(['prefix'=>'blog','middleware'=>'permissions:admin-blog'],function() {
    Route::get('/index', 'Admin\BlogController@index')->name('admin-blog')->middleware('permissions:admin-blog');
    Route::get('/create', 'Admin\BlogController@create')->name('admin-blog-create')->middleware('permissions:admin-blog1');
    Route::post('/store', 'Admin\BlogController@store')->name('admin-blog-store');
    Route::get('/edit/{id}', 'Admin\BlogController@edit')->name('admin-blog-edit')->middleware('permissions:admin-blog2');
    Route::post('/edit/{id}', 'Admin\BlogController@update')->name('admin-blog-update');
    Route::get('/datatables', 'Admin\BlogController@datatables')->name('admin-blog-datatables');
    Route::get('/status/{id1}/{id2}', 'Admin\BlogController@status')->name('admin-blog-status')->middleware('permissions:admin-blog2');
    Route::get('/delete/{id}', 'Admin\BlogController@destroy')->name('admin-blog-delete')->middleware('permissions:admin-blog3');
    Route::post('/crop', 'Admin\BlogController@cropimage')->name('admin-blog-cropimage');
    });

    Route::group(['prefix'=>'store','middleware'=>'permissions:admin-store'],function() {
    Route::get('/index', 'Admin\StoreController@index')->name('admin-store');
    // Route::get('/create', 'Admin\CategoryController@create')->name('admin-category-create');
    // Route::post('/store', 'Admin\CategoryController@store')->name('admin-category-store');
    Route::get('/edit/{id}', 'Admin\StoreController@edit')->name('admin-store-edit')->middleware('permissions:admin-store2');
    Route::post('/update/{id}', 'Admin\StoreController@update')->name('admin-store-update');
    Route::get('/datatables', 'Admin\StoreController@datatables')->name('admin-store-datatables');
    Route::get('/status/{id1}/{id2}', 'Admin\StoreController@status')->name('admin-store-status')->middleware('permissions:admin-store2');
    Route::get('/delete/{id}', 'Admin\StoreController@destroy')->name('admin-store-delete')->middleware('permissions:admin-store3');
        Route::post('/crop', 'Admin\StoreController@cropimage')->name('admin-store-cropimage');

    });


    Route::group(['prefix'=>'homeslider','middleware'=>'permissions:admin-homeslider'],function() {
    Route::get('/index', 'Admin\HomesliderController@index')->name('admin-homeslider');
    Route::get('/create', 'Admin\HomesliderController@create')->name('admin-homeslider-create')->middleware('permissions:admin-homeslider1');
    Route::post('/store', 'Admin\HomesliderController@store')->name('admin-homeslider-store');
    Route::get('/edit/{id}', 'Admin\HomesliderController@edit')->name('admin-homeslider-edit')->middleware('permissions:admin-homeslider2');
    Route::post('/update/{id}', 'Admin\HomesliderController@update')->name('admin-homeslider-update');
    Route::get('/datatables', 'Admin\HomesliderController@datatables')->name('admin-homeslider-datatables');
    Route::get('/status/{id1}/{id2}', 'Admin\HomesliderController@status')->name('admin-homeslider-status')->middleware('permissions:admin-homeslider2');
    Route::get('/delete/{id}', 'Admin\HomesliderController@destroy')->name('admin-homeslider-delete')->middleware('permissions:admin-homeslider3');
        Route::get('/product', 'Admin\HomesliderController@product')->name('admin-homeslider-product');
        Route::post('/load', 'Admin\HomesliderController@load')->name('admin-homeslider-load');

    });

    Route::group(['prefix'=>'homecate','middleware'=>'permissions:admin-homecat'],function() {
      Route::get('/index', 'Admin\HomecatController@index')->name('admin-homecat');
      Route::get('/create', 'Admin\HomecatController@create')->name('admin-homecat-create')->middleware('permissions:admin-homecat1');
      Route::post('/store', 'Admin\HomecatController@store')->name('admin-homecat-store');
      Route::get('/edit/{id}', 'Admin\HomecatController@edit')->name('admin-homecat-edit')->middleware('permissions:admin-homecat2');
      Route::post('/update/{id}', 'Admin\HomecatController@update')->name('admin-homecat-update');
      Route::get('/datatables', 'Admin\HomecatController@datatables')->name('admin-homecat-datatables');
      Route::get('/status/{id1}/{id2}', 'Admin\HomecatController@status')->name('admin-homecat-status')->middleware('permissions:admin-homecat2');
      Route::get('/delete/{id}', 'Admin\HomecatController@destroy')->name('admin-homecat-delete')->middleware('permissions:admin-homecat3');
      Route::get('/product', 'Admin\HomecatController@product')->name('admin-homecat-product');
      Route::post('/load', 'Admin\HomecatController@load')->name('admin-homecat-load');
      });

      Route::prefix('discount')->group(function() {
        Route::get('/index', 'Admin\DiscountController@index')->name('admin-discount')->middleware('permissions:admin-discount');
        Route::get('/create', 'Admin\DiscountController@create')->name('admin-discount-create')->middleware('permissions:admin-discount1');
        Route::post('/store', 'Admin\DiscountController@store')->name('admin-discount-store');
        Route::get('/edit/{id}', 'Admin\DiscountController@edit')->name('admin-discount-edit')->middleware('permissions:admin-discount2');
        Route::post('/update/{id}', 'Admin\DiscountController@update')->name('admin-discount-update');
        Route::get('/datatables', 'Admin\DiscountController@datatables')->name('admin-discount-datatables');
        Route::get('/status/{id1}/{id2}', 'Admin\DiscountController@status')->name('admin-discount-status')->middleware('permissions:admin-discount2');
        Route::get('/delete/{id}', 'Admin\DiscountController@destroy')->name('admin-discount-delete')->middleware('permissions:admin-discount3');
        Route::get('/product', 'Admin\DiscountController@product')->name('admin-discount-product');
        Route::post('/load', 'Admin\DiscountController@load')->name('admin-discount-load');
        });

      Route::group(['prefix'=>'vendor','middleware'=>'permissions:admin-vendor'],function() {
      Route::get('/index', 'Admin\VendorController@index')->name('admin-vendor');
      Route::get('/create', 'Admin\VendorController@create')->name('admin-vendor-create')->middleware('permissions:admin-vendor1');
      Route::post('/store', 'Admin\VendorController@store')->name('admin-vendor-store');
      Route::get('/edit/{id}', 'Admin\VendorController@edit')->name('admin-vendor-edit')->middleware('permissions:admin-vendor2');
      Route::post('/update/{id}', 'Admin\VendorController@update')->name('admin-vendor-update');
      Route::get('/datatables', 'Admin\VendorController@datatables')->name('admin-vendor-datatables');
      Route::get('/status/{id1}/{id2}', 'Admin\VendorController@status')->name('admin-vendor-status')->middleware('permissions:admin-vendor2');
      Route::get('/delete/{id}', 'Admin\VendorController@destroy')->name('admin-vendor-delete')->middleware('permissions:admin-vendor3');
      Route::get('/getstate', 'Admin\VendorController@getstate')->name('admin-vendor-getstate');
      Route::get('/getTemplate', 'Admin\VendorController@getTemplate')->name('admin-vendor-getTemplate');
      });

        Route::prefix('order')->group(function() {
          Route::get('/', 'Admin\OrderController@index')->name('baseurl');
          Route::get('/index', 'Admin\OrderController@index')->name('admin-order')->middleware('permissions:admin-order');
          Route::post('/datatables', 'Admin\OrderController@datatables')->name('admin-order-datatables');
          Route::get('/paymentstatus/{id1}/{id2}', 'Admin\OrderController@paymentstatus')->name('admin-order-status');
          Route::get('/orderststus/{id1}/{id2}', 'Admin\OrderController@orderststus')->name('admin-order-status1')->middleware('permissions:admin-order2');
          Route::get('/view/{id}', 'Admin\OrderController@view')->name('admin-order-view');
          Route::get('/view/lable/{id}', 'Admin\OrderController@label')->name('admin-order-label');
          Route::get('/view', 'Admin\OrderController@view')->name('admin-order-view1');
          Route::get('/shippingnodes/{id}/{model}', 'Admin\OrderController@shippinfnodes')->name('admin-shipping-node');
          Route::post('/notes/{id}', 'Admin\OrderController@updatenotes')->name('admin-update-node');
          Route::post('/updateReject/{id}', 'Admin\OrderController@updateReject')->name('admin-updateReject-node');
          });

        Route::prefix('return')->group(function() {
            Route::get('/index', 'Admin\ReturnController@index')->name('admin-return')->middleware('permissions:admin-return');
            Route::get('/datatables', 'Admin\ReturnController@datatables')->name('admin-datatables-return')->middleware('permissions:admin-datatables-return');
            Route::get('/edit/{id}', 'Admin\ReturnController@edit')->name('admin-edit-return')->middleware('permissions:admin-edit-return2');
            Route::Post('/updatereturnstatus', 'Admin\ReturnController@updatereturnstatus')->name('admin-updatereturnstatus-return');
            Route::Post('/updatereturnstatusitem', 'Admin\ReturnController@updatereturnstatusitem')->name('admin-updatereturnstatusitem-return');
            Route::Post('/updatepaymentstatus', 'Admin\ReturnController@updatepaymentstatus')->name('admin-updatepaymentstatus-return');
            Route::Post('/Docket_No', 'Admin\ReturnController@Docket_No')->name('admin-Docket_No-return');
            Route::Post('/Charges', 'Admin\ReturnController@Charges')->name('admin-Charges-return');
            Route::Post('/other', 'Admin\ReturnController@Other')->name('admin-Other-return');
            Route::GET('/history/{id}', 'Admin\ReturnController@history')->name('admin-history-return');
            Route::GET('/invoice/{id}', 'Admin\ReturnController@invoice')->name('admin-invoice-return');
        });

          Route::prefix('review')->group(function() {
            Route::get('/index', 'Admin\ReviewController@index')->name('admin-review')->middleware('permissions:admin-review');
            Route::get('/datatables', 'Admin\ReviewController@datatables')->name('admin-review-datatables');
            Route::get('/delete/{id}', 'Admin\ReviewController@destroy')->name('admin-review-delete')->middleware('permissions:admin-review3');
            Route::get('/review/{id}', 'Admin\ReviewController@review')->name('admin-review-node')->middleware('permissions:admin-review2');
            });
            // Route::prefix('SubScribers')->group(function() {
            //   Route::get('/index', 'Admin\SubscribesController@index')->name('admin-SubScribers')->middleware('permissions:admin-SubScribers');
            //   Route::get('/datatables', 'Admin\SubscribesController@datatables')->name('admin-SubScribers-datatables');
            //   });

              // ... existing code ...

Route::prefix('SubScribers')->group(function() {
    Route::get('/index', 'Admin\SubscribesController@index')->name('admin-SubScribers')->middleware('permissions:admin-SubScribers');
    Route::get('/datatables', 'Admin\SubscribesController@datatables')->name('admin-SubScribers-datatables');
});

// ... existing code ...

               Route::prefix('report')->group(function() {
                Route::get('/index', 'Admin\SalesController@index')->name('admin-report')->middleware('permissions:admin-report');
                Route::post('/salesReport', 'Admin\SalesController@salesReport')->name('admin-report-get');
                Route::get('/order', 'Admin\SalesController@order')->name('admin-order-report')->middleware('permissions:admin-report');
                Route::post('/orderReport', 'Admin\SalesController@orderReport')->name('admin-report-order-get');
                Route::get('/product', 'Admin\SalesController@product')->name('admin-product-report')->middleware('permissions:admin-report');
                Route::post('/productReport', 'Admin\SalesController@productReport')->name('admin-report-product-get');
                });
                Route::prefix('VendorPayment')->group(function() {
                  Route::get('/index', 'Admin\VendorPaymentcontroller@index')->name('admin-VendorPayment')->middleware('permissions:admin-VendorPayment');
                  Route::get('/datatable', 'Admin\VendorPaymentcontroller@datatable')->name('admin-VendorPayment-get');
                  Route::get('/editdata/{Vendor}', 'Admin\VendorPaymentcontroller@editdata')->name('admin-VendorPayment-editdata');
                  Route::get('/edit/{Vendor}', 'Admin\VendorPaymentcontroller@edit')->name('admin-VendorPayment-edit');
                  Route::get('/paydatatable', 'Admin\VendorPaymentcontroller@paydatatable')->name('admin-paydatatable');
                  Route::post('/submit/pay', 'Admin\VendorPaymentcontroller@submitpay')->name('admin-submitpay');
                  Route::post('/submit/editpay', 'Admin\VendorPaymentcontroller@editsubmitpay')->name('admin-editsubmitpay');
                  Route::get('/delete/{VendorPayment}', 'Admin\VendorPaymentcontroller@delete')->name('admin-VendorPayment-delete');
                  Route::get('/invoice/{VendorPayment}', 'Admin\VendorPaymentcontroller@printinvoice')->name('admin-VendorPayment-invoice');
                  });
        Route::group(['prefix'=>'shipping','middleware'=>'permissions:admin-shipping'],function() {
        Route::get('/index', 'Admin\ShippingController@index')->name('admin-shipping')->middleware('permissions:admin-shipping');
        Route::get('/create', 'Admin\ShippingController@create')->name('admin-shipping-create')->middleware('permissions:admin-shipping1');
        Route::get('/datatables', 'Admin\ShippingController@datatables')->name('admin-shipping-datatables');
        Route::post('/store', 'Admin\ShippingController@store')->name('admin-shipping-store');
        Route::get('/edit/{id}', 'Admin\ShippingController@edit')->name('admin-shipping-edit')->middleware('permissions:admin-shipping2');
        Route::get('/status/{id1}/{id2}', 'Admin\ShippingController@status')->name('admin-shipping-status');
        Route::post('/update/{id}', 'Admin\ShippingController@update')->name('admin-shipping-update');
        Route::get('/delete/{id}', 'Admin\ShippingController@destroy')->name('admin-shipping-delete')->middleware('permissions:admin-shipping3');
        Route::get('/getstate', 'Admin\ShippingController@getstates')->name('admin-shipping-getstate');
        Route::get('/getcity', 'Admin\ShippingController@getcity')->name('admin-shipping-getcity');
        Route::get('/getpincode', 'Admin\ShippingController@getpincode')->name('admin-shipping-pincode');
        });

    Route::group(['prefix'=>'customergroup','middleware'=>'permissions:admin-customergroup'],function() {
    Route::get('/index', 'Admin\CustomerGroupController@index')->name('admin-customergroup');
    Route::get('/create', 'Admin\CustomerGroupController@create')->name('admin-customergroup-create')->middleware('permissions:admin-customergroup1');
    Route::post('/create', 'Admin\CustomerGroupController@store')->name('admin-customergroup-store');
    Route::get('/datatables', 'Admin\CustomerGroupController@datatables')->name('admin-customergroup-datatables');
    Route::get('/status/{id1}/{id2}', 'Admin\CustomerGroupController@status')->name('admin-customergroup-status')->middleware('permissions:admin-customergroup2');
    Route::get('/edit/{id}', 'Admin\CustomerGroupController@edit')->name('admin-customergroup-edit')->middleware('permissions:admin-customergroup2');
    Route::post('/edit/{id}', 'Admin\CustomerGroupController@update')->name('admin-customergroup-update');
    Route::get('/delete/{id}', 'Admin\CustomerGroupController@destroy')->name('admin-customergroup-delete')->middleware('permissions:admin-customergroup3');
    });

        Route::group(['prefix'=>'coupon','middleware'=>'permissions:admin-coupon'],function() {
            Route::get('/index', 'Admin\CouponController@index')->name('admin-coupon-index')->middleware('permissions:admin-coupon-index');
            Route::get('/create', 'Admin\CouponController@create')->name('admin-coupon-create')->middleware('permissions:admin-coupon-index1');
            Route::get('/getuser', 'Admin\CouponController@getuser')->name('admin-coupon-getuser');
            Route::get('/datatables', 'Admin\CouponController@datatables')->name('admin-coupon-datatables');
            Route::post('/store', 'Admin\CouponController@store')->name('admin-coupon-store');
            Route::get('/status/{id1}/{id2}', 'Admin\CouponController@status')->name('admin-coupon-status');
            Route::get('/delete/{id}', 'Admin\CouponController@destroy')->name('admin-coupon-delete')->middleware('permissions:admin-coupon-index3');
            Route::get('/view/{id}', 'Admin\CouponController@views')->name('admin-coupon-view')->middleware('permissions:admin-coupon-index');
        });

    Route::group(['prefix'=>'product','middleware'=>'permissions:admin-product'],function() {
    Route::get('/index', 'Admin\ProductController@index')->name('admin-product');
    Route::get('/attribute-group', 'Admin\ProductController@attributeGroup')->name('admin-product-group')->middleware('permissions:admin-product1');
    Route::get('/create', 'Admin\ProductController@create')->name('admin-product-create')->middleware('permissions:admin-product1');
    // Route::get('/create', 'Admin\ProductController@create')->name('admin-product-create');
    Route::post('/create', 'Admin\ProductController@store')->name('admin-product-store');
    Route::Post('/datatables', 'Admin\ProductController@datatables')->name('admin-product-datatables');
    Route::Post('/datatables2', 'Admin\ProductController@datatables2')->name('admin-product-datatables2');
    Route::get('/status/{id1}/{id2}', 'Admin\ProductController@status')->name('admin-product-status')->middleware('permissions:admin-product2');
    Route::get('/edit/{id}', 'Admin\ProductController@edit')->name('admin-product-edit')->middleware('permissions:admin-product2');
    Route::get('/delete/{id}', 'Admin\ProductController@destroy')->name('admin-product-delete')->middleware('permissions:admin-product3');
    Route::post('/edit/{id}', 'Admin\ProductController@update')->name('admin-product-update')->middleware('permissions:admin-product2');
    Route::post('/crop', 'Admin\ProductController@cropimage')->name('admin-product-cropimage')->middleware('permissions:admin-product1');

    });

    Route::group(['prefix'=>'vendorProduct','middleware'=>'permissions:admin-productv2'],function() {
    Route::get('/index2', 'Admin\ProductController@index2')->name('admin-productv2')->middleware('permissions:admin-productv2');
    Route::get('/attribute-group', 'Admin\ProductController@attributeGroup')->name('admin-productv-group')->middleware('permissions:admin-productv21');
    Route::get('/create', 'Admin\ProductController@create')->name('admin-productv-create')->middleware('permissions:admin-productv21');
    // Route::get('/create', 'Admin\ProductController@create')->name('admin-product-create');
    Route::post('/create', 'Admin\ProductController@store')->name('admin-productv-store')->middleware('permissions:admin-productv21');
    Route::Post('/datatables2', 'Admin\ProductController@datatables2')->name('admin-product-datatables2')->middleware('permissions:admin-productv2');

    Route::get('/status/{id1}/{id2}', 'Admin\ProductController@status')->name('admin-productv-status')->middleware('permissions:admin-productv22');
    Route::get('/edit/{id}', 'Admin\ProductController@edit')->name('admin-productv-edit')->middleware('permissions:admin-productv22');
    Route::get('/delete/{id}', 'Admin\ProductController@destroy')->name('admin-productv-delete')->middleware('permissions:admin-productv23');

    Route::post('/crop', 'Admin\ProductController@cropimage')->name('admin-productv-cropimage')->middleware('permissions:admin-productv2');

    Route::post('/edit/{id}', 'Admin\ProductController@update')->name('admin-productv-update')->middleware('permissions:admin-productv22');

    });

    Route::group(['prefix'=>'menu-management','middleware'=>'permissions:admin-menuManagement'],function() {
    Route::get('/index', 'Admin\MenuController@index')->name('admin-menuManagement');
    Route::get('/create', 'Admin\MenuController@create')->name('admin-menuManagement-create')->middleware('permissions:admin-menuManagement1');
    Route::post('/create/{id}', 'Admin\MenuController@store')->name('admin-menuManagement-store');

    });

  Route::group(['prefix'=>'customer','middleware'=>'permissions:admin-customer'],function() {
  Route::get('/index', 'Admin\CustomerController@index')->name('admin-customer');
  Route::post('/postcode', 'Admin\CustomerController@postcode')->name('postcode');
  Route::post('/datatables', 'Admin\CustomerController@datatables')->name('admin-customer-datatables');
  Route::get('/status/{id1}/{id2}', 'Admin\CustomerController@status')->name('admin-customer-status')->middleware('permissions:admin-customer2');
  Route::get('/status/', 'Admin\CustomerController@status')->name('admin-baseURL-customer-status')->middleware('permissions:admin-customer2');
  Route::get('/edit/', 'Admin\CustomerController@edit')->name('admin-customer-edit')->middleware('permissions:admin-customer2');
  Route::get('/edit/{id}', 'Admin\CustomerController@edit')->middleware('permissions:admin-customer2');
  Route::post('/edit/{id}', 'Admin\CustomerController@update')->name('admin-customer-update');
  Route::get('/delete/', 'Admin\CustomerController@destroy')->name('admin-customer-delete')->middleware('permissions:admin-customer3');
  Route::get('/editAddCus/{id}', 'Admin\CustomerController@editCus')->name('admin-edit.cus.add')->middleware('permissions:admin-customer2');
  Route::post('/editAddCus/{id}', 'Admin\CustomerController@updateCus')->name('admin-update.cus.add')->middleware('permissions:admin-customer2');
  Route::get('/refresh/{id}', 'Admin\CustomerController@refresh')->name('admin-refresh')->middleware('permissions:admin-customer2');
  Route::post('/getState/', 'Admin\CustomerController@getState')->name('admin-getstate-user')->middleware('permissions:admin-customer2');
  Route::post('/getCities/', 'Admin\CustomerController@getCities')->name('admin-getCities-user')->middleware('permissions:admin-customer2');
  Route::post('/getPincodes/', 'Admin\CustomerController@getPincodes')->name('admin-getPincodes-user')->middleware('permissions:admin-customer2');
  Route::post('/addPincodes/', 'Admin\CustomerController@addPincodes')->name('admin-addPincodes-user')->middleware('permissions:admin-customer2');
  Route::get('/getCity/', 'Admin\CustomerController@getCity')->name('admin-getCity-user')->middleware('permissions:admin-customer2');
    });

   Route::prefix('subscription')->group(function() {
        Route::get('/', 'Admin\SubscriptionController@index')->name('admin-subscriptionlist');
        Route::get('/datatables', 'Admin\SubscriptionController@datatables')->name('admin-subscription-datatable');
        Route::get('/setup', 'Admin\SubscriptionController@subscriptionSetup')->name('admin-subscription-setupview');
        Route::post('/setup', 'Admin\SubscriptionController@subscriptionSetup')->name('admin-subscription-setup');
   });





         Route::prefix('plan')->group(function() {
          Route::get('/create', 'Admin\PlanController@create')->name('admin-plan-create');
          Route::post('/store', 'Admin\PlanController@store')->name('admin-plan-store');
          Route::get('/datatablesssss', 'Admin\PlanController@datatables')->name('admin-plan-datatable');
          Route::get('/edit/{id}', 'Admin\PlanController@edit')->name('admin-plans-edit');
          // Route::post('/update/{id}', 'Admin\PlanController@update')->name('admin-plan-update');
          Route::put('/update/{id}', 'Admin\PlanController@update')->name('admin-plans-update');
          Route::any('/delete/{id}', 'Admin\PlanController@destroy')->name('admin-plans-destroy');

        });
    });
});
