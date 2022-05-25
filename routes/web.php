<?php

use App\Http\Controllers\FrontEnd\AboutUsController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\FrontEnd\ContactUsController;
use App\Http\Controllers\FrontEnd\DeliveryAddressController;
use App\Http\Controllers\FrontEnd\DetailController;
use App\Http\Controllers\FrontEnd\HomeController;
use App\Http\Controllers\FrontEnd\NewslatterSubsciberController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\Frontend\RatingController as FrontendRatingController;
use App\Http\Controllers\FrontEnd\ReturnOrderController;
use App\Http\Controllers\Frontend\UserAccountController;
use App\Http\Controllers\FrontEnd\UserController;
use App\Http\Controllers\FrontEnd\WishlistController;
use App\Models\NewslatterSubsciber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
    return view('frontend.index');
});


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        // ======================================================
        // FrontEnd :
        // ======================================================
        Route::group(['as' => 'frontend.'], function () {
            Route::get('/',                                                 [HomeController::class, 'index'])->name('home');
            Route::get('/about-us',                                         [AboutUsController::class, 'index'])->name('about-us');
            Route::get('/contact-us',                                       [ContactUsController::class, 'index'])->name('contact-us.index');
            Route::post('/contact-us/store',                                [ContactUsController::class, 'store'])->name('contact-us.store');


            // *************************************************************
            // *************************************************************
            // *************************************************************
            // Detail Page :
            Route::get('/product/{id}',                                     [DetailController::class, 'index'])->name('details');
            Route::post('/get-product-price',                               [DetailController::class, 'getProductPrice']);



            // *************************************************************
            // *************************************************************
            // *************************************************************
            // Cart Page :
            Route::get('/cart',                                             [CartController::class, 'index'])->name('cart');
            Route::post('add-to-cart',                                      [CartController::class, 'store'])->name('cart.store');
            Route::post('update-cart-products-quantity',                    [CartController::class, 'updateProductQuantity']);
            Route::post('delete-cart-product',                              [CartController::class, 'destroy'])->name('cart.destroy');



            // *************************************************************
            // *************************************************************
            // *************************************************************
            // Login/Regsister :
            Route::get('/login-form',                                       [UserController::class, 'showLoginForm'])->name('form.login');
            Route::post('/login',                                           [UserController::class, 'login'])->name('login');
            Route::get('/register-form',                                    [UserController::class, 'showRegisterForm'])->name('form.register');
            Route::post('/register',                                        [UserController::class, 'store'])->name('register');
            Route::get('/logout',                                           [UserController::class, 'logout'])->name('logout');
            Route::get('/check-email',                                      [UserController::class, 'checkEmail']);
            Route::post('/check-email',                                     [UserController::class, 'checkEmail']);
            Route::get('/confirm/{code}',                                   [UserController::class, 'confirmationEmail']);
            Route::post('/confirm/{code}',                                  [UserController::class, 'confirmationEmail']);
            Route::group(['middleware' => ['auth']], function () {
                Route::get('/account',                                      [UserAccountController::class, 'account'])->name('user.account');
                Route::post('/update-account-details',                      [UserAccountController::class, 'updateAccountDetails'])->name('user.account.details.update');
                Route::post('/update-account-password',                     [UserAccountController::class, 'updateAccountPassword'])->name('user.account.password.update');
                Route::post('/check-current-password',                      [UserAccountController::class, 'checkCurrentPassword'])->name('check.currnet.pwd');
                Route::post('/add-coupon',                                  [UserAccountController::class, 'addCouponOnCart']);
            });
            Route::get('/password/forget',                                  [UserController::class, 'resetPasswordForm'])->name('forget.password.form');
            Route::post('/password/send',                                   [UserController::class, 'sendResetLink'])->name('forget.password.link');
            Route::get('/password/reset/{token}',                           [UserController::class, 'showResetForm'])->name('reset.password.form');
            Route::post('/password/reset',                                  [UserController::class, 'resetUserPassword'])->name('user.reset.password');



            // *************************************************************
            // *************************************************************
            // *************************************************************
            // Delivery Addresses :
            Route::get('/delivery-addressess/create',                       [DeliveryAddressController::class, 'create'])->name('delivery.address.create');
            Route::post('/delivery-addressess/store',                       [DeliveryAddressController::class, 'store'])->name('delivery.address.store');
            Route::get('/delivery-addressess/{deliveryAddress}',            [DeliveryAddressController::class, 'edit'])->name('delivery.address.edit');
            Route::post('/delivery-addressess/{deliveryAddress}',           [DeliveryAddressController::class, 'update'])->name('delivery.address.update');
            Route::get('/delivery-addressess-delete/{id}',                  [DeliveryAddressController::class, 'destroy'])->name('delivery.address.destroy');



            // *************************************************************
            // *************************************************************
            // *************************************************************
            // Checkout :
            Route::get('/checkout/index',                                   [CheckoutController::class, 'index'])->name('checkout.index');
            Route::post('/checkout/store',                                  [CheckoutController::class, 'store'])->name('checkout.store');
            Route::get('/checkout/thanks',                                  [CheckoutController::class, 'thanks'])->name('checkout.thanks');



            // *************************************************************
            // *************************************************************
            // *************************************************************
            // Rating :
            Route::post('/ratings/store',                                  [FrontendRatingController::class, 'store'])->name('ratings.store');



            // *************************************************************
            // *************************************************************
            // *************************************************************
            // Orders :
            Route::get('/orders/index',                                     [OrderController::class, 'index'])->name('orders.index');
            Route::get('/orders/show/{id}',                                 [OrderController::class, 'show'])->name('orders.show');
            Route::post('/orders/cancel/{id}',                              [OrderController::class, 'destroy'])->name('orders.destroy');

            Route::post('/returnOrders/store/{order}',                      [ReturnOrderController::class, 'store'])->name('orders.return.store');
            Route::post('/get-product-sizes',                               [ReturnOrderController::class, 'getProductSizes']);



            // *************************************************************
            // *************************************************************
            // *************************************************************
            // wishlists :
            Route::get('/wishlist/index',                                   [WishlistController::class, 'index'])->name('wishlist.index');
            Route::post('/wishlist-update',                                 [WishlistController::class, 'store']);
            Route::post('/wishlist-delete-item',                            [WishlistController::class, 'destroy']);



            // *************************************************************
            // *************************************************************
            // *************************************************************
            // NewslatterSubscibers :
            Route::post('/newslatterSubscriber/store',                      [NewslatterSubsciberController::class, 'store']);

            Route::any('/{url?}',                                           [FrontendProductController::class, 'index'])->name('url');
        });
    }
);