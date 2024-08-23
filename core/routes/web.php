<?php

use App\Http\Controllers\User\SellCryptoController;
use Illuminate\Support\Facades\Route;

Route::get('/clear', function () {
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
});
 Route::get('listdata',[\App\Http\Controllers\User\InternetSmeController::class, 'listdata']);
//Cron Controller
Route::get('cron', 'CronController@placeOrderToApi')->name('cron');
// User Support Ticket
Route::controller('TicketController')->prefix('ticket')->name('ticket.')->group(function () {
    Route::get('/', 'supportTicket')->name('index');
    Route::get('/new', 'openSupportTicket')->name('open');
    Route::post('/create', 'storeSupportTicket')->name('store');
    Route::get('/view/{ticket}', 'viewTicket')->name('view');
    Route::post('/reply/{ticket}', 'replyTicket')->name('reply');
    Route::post('/close/{ticket}', 'closeTicket')->name('close');
    Route::get('/download/{ticket}', 'ticketDownload')->name('download');
});

Route::get('app/deposit/confirm/{hash}', 'Gateway\PaymentController@appDepositConfirm')->name('deposit.app.confirm');


//Cart
Route::controller('CartController')->group(function () {
    Route::get('storefront/{id}', 'storefront')->name('storefront');
    Route::get('product/{id}', 'product')->name('storefront.product');
});

Route::controller('SiteController')->group(function () {

    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact', 'contactSubmit');
    Route::get('/change/{lang?}', 'changeLanguage')->name('lang');

    Route::get('cookie-policy', 'cookiePolicy')->name('cookie.policy');

    Route::get('/cookie/accept', 'cookieAccept')->name('cookie.accept');

    Route::get('blog/{slug}/{id}', 'blogDetails')->name('blog.details');

    Route::get('policy/{slug}/{id}', 'policyPages')->name('policy.pages');

    Route::get('placeholder-image/{size}', 'placeholderImage')->name('placeholder.image');
    Route::post('subscribe', 'subscribe')->name('subscribe');
    Route::get('/api', 'apiDocumentation')->name('api.documentation');
    Route::get('/blog', 'blog')->name('blog');

    Route::get('/{slug}', 'pages')->name('pages');
    Route::get('/', 'index')->name('home');
    Route::get('/assets/rates', 'rates')->name('rates');
});
//Route::post('user/crypto/sell/confirm', [SellCryptoController::class, 'sellConfirmManual'])->name('user.crypto.sell.confirm');

Route::get('getlist/{selectedValue}', [\App\Http\Controllers\User\InternetController::class, 'fecthdata'])->name('getlist');
