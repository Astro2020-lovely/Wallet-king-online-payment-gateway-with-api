<?php

use App\UsersModel;
use App\Transaction;
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



Route::get('/', 'FrontEndController@index');
Route::get('/about', 'FrontEndController@about');
Route::get('/faq', 'FrontEndController@faq');
Route::get('/contact', 'FrontEndController@contact');
Route::get('/developers', 'FrontEndController@developers');
Route::get('/listall', 'FrontEndController@all');
Route::get('/listfeatured', 'FrontEndController@featured');
Route::get('/services/{category}', 'FrontEndController@category');
Route::get('/services/order/{id}', 'FrontEndController@order');
Route::post('/subscribe', 'FrontEndController@subscribe');
Route::post('/profile/email', 'FrontEndController@usermail');
Route::post('/contact/email', 'FrontEndController@contactmail');
Route::get('/profile/{id}/{name}', 'FrontEndController@viewprofile');
Route::get('/blogs', 'FrontEndController@allblog');
Route::get('/blog/{id}', 'FrontEndController@blogdetails');

Route::post('/payaferservice', 'FrontEndController@payaferservice')->name('cash.submit');

Route::get('/admin', function () {
    return view('admin.index');
})->name('admin.login');


Route::get('/login', function () {
    return view('admin.login');
});

Auth::routes();

//Express Payment Routes
Route::get('/express/web/signin', 'ApiController@eXpressApiForm');
Route::post('/express/web', 'ApiController@eXpressApi');
Route::get('/express/web', 'ApiController@eXpressApi');
Route::get('/express/web/pay', 'ApiController@eXpressApiForm');
Route::post('/express/web/loginapi', 'ApiController@apiLogin')->name('api.login');
Route::get('/express/web/loginapi', 'ApiController@apiLogin')->name('api.problem');

Route::post('/express/web/paynow', 'ApiController@CompletePaymentApi')->name('api.payment');


Route::get('/admin/dashboard', 'HomeController@index');

Route::get('admin/settings/logo', 'SettingsController@logoform');
Route::get('admin/settings/favicon', 'SettingsController@faviconform');
Route::get('admin/settings/contents', 'SettingsController@contentsform');
Route::get('admin/settings/address', 'SettingsController@addressform');
Route::get('admin/settings/background', 'SettingsController@backgroundform');
Route::get('admin/settings/payment', 'SettingsController@paymentform');
Route::get('admin/settings/info', 'SettingsController@aboutform');
Route::get('admin/settings/footer', 'SettingsController@footerform');

Route::post('admin/settings/title', 'SettingsController@title');
Route::post('admin/settings/payment', 'SettingsController@payment');
Route::post('admin/settings/about', 'SettingsController@about');
Route::post('admin/settings/address', 'SettingsController@address');
Route::post('admin/settings/footer', 'SettingsController@footer');
Route::post('admin/settings/logo', 'SettingsController@logo');
Route::post('admin/settings/favicon', 'SettingsController@favicon');
Route::post('admin/settings/background', 'SettingsController@background');
Route::resource('/admin/settings', 'SettingsController');

Route::resource('/admin/sliders', 'SliderController');
Route::resource('/admin/staffs', 'StaffController');
Route::get('/admin/ticket-close/{id}', 'TicketController@closeticket');
Route::post('/admin/ticket-reply/{id}', 'TicketController@submitreply');
Route::resource('/admin/support-center', 'TicketController');

Route::get('/admin/service/titles', 'ServiceSectionController@titlesform');
Route::post('/admin/service/title', 'ServiceSectionController@titles');
Route::resource('/admin/service', 'ServiceSectionController');

Route::get('/admin/testimonial/titles', 'TestimonialController@titlesform');
Route::post('/admin/testimonial/titles', 'TestimonialController@titles');
Route::resource('/admin/testimonial', 'TestimonialController');

Route::post('/admin/pricing/titles', 'PricingTableController@titles');
Route::resource('/admin/pricing', 'PricingTableController');

Route::get('/admin/blog/titles', 'BlogController@titleform');
Route::post('/admin/blog/titles', 'BlogController@titles');
Route::resource('/admin/blog', 'BlogController');

Route::get('account/deposit/bitcoin', 'BlockChainController@bitcoindeposit');
Route::post('account/deposit/blockchain', 'BlockChainController@deposit');
//Route::get('/webhook', 'BlockTrailController@webhook');
Route::get('bitcoin/notify', 'BlockChainController@chaincallback');
//Route::resource('/trail', 'BlockTrailController');

Route::get('/admin/portfolio/titles', 'PortfolioController@titlesform');
Route::post('/admin/portfolio/titles', 'PortfolioController@titles');
Route::resource('/admin/portfolio', 'PortfolioController');

Route::resource('/admin/services', 'ServiceController');
Route::resource('/admin/category', 'CategoryController');
Route::resource('/admin/counter', 'CounterController');

Route::get('admin/theme-color', 'SettingsController@themecolors');
Route::post('admin/theme-color', 'SettingsController@themecolor');

Route::get('admin/language-settings', 'SettingsController@setlanguage');
Route::post('admin/settings/language', 'SettingsController@language');

Route::get('admin/faq/add', 'PageSettingsController@addfaq');
Route::get('admin/faq/{id}/delete', 'PageSettingsController@faqdelete');
Route::get('admin/faq/{id}/edit', 'PageSettingsController@faqedit');
Route::post('admin/faq/{id}/update', 'PageSettingsController@faqupdate');
Route::post('admin/pagesettings/faqsave', 'PageSettingsController@faqsave');

Route::get('admin/pagesettings/about', 'PageSettingsController@aboutpage');
Route::get('admin/pagesettings/documentation', 'PageSettingsController@documentation');
Route::get('admin/pagesettings/faq', 'PageSettingsController@faqpage');
Route::get('admin/pagesettings/contact', 'PageSettingsController@contactpage');
Route::post('admin/pagesettings/documentations', 'PageSettingsController@documentationup');
Route::post('admin/pagesettings/about', 'PageSettingsController@about');
Route::post('admin/pagesettings/faq', 'PageSettingsController@faq');
Route::post('admin/pagesettings/contact', 'PageSettingsController@contact');
Route::resource('/admin/pagesettings', 'PageSettingsController');

Route::get('admin/ads/status/{id}/{status}', 'AdvertiseController@status');

Route::resource('/admin/ads', 'AdvertiseController');
Route::resource('/admin/social', 'SocialLinkController');

Route::get('/admin/tools/meta', 'SeoToolsController@metaform');
Route::post('/admin/tools/meta', 'SeoToolsController@metaupdate');
Route::resource('/admin/tools/google', 'SeoToolsController');
Route::get('admin/subscribers/download', 'SubscriberController@download');

Route::resource('/admin/subscribers', 'SubscriberController');
Route::post('/admin/adminpassword/change/{id}', 'AdminProfileController@changepass');
Route::get('/admin/adminpassword', 'AdminProfileController@password');
Route::resource('/admin/adminprofile', 'AdminProfileController');

Route::get('/admin/orders/status/{id}', 'OrderController@status');
Route::get('/admin/orders/email/{id}', 'OrderController@email');
Route::post('/admin/orders/emailsend', 'OrderController@sendemail');
Route::resource('/admin/transactions', 'TransactionController');

Route::get('/admin/customers/create-ticket/{id}', 'CustomerController@createTicket')->name('admin-create-ticket');
Route::post('/admin/customers/create-ticket/submit', 'CustomerController@createTicketsubmit');
Route::post('/admin/customers/balance/{id}', 'CustomerController@manage_balance_operation');
Route::get('/admin/customers/balance/{id}', 'CustomerController@manage_balance');
Route::get('/admin/customers/email/{id}', 'CustomerController@email');
Route::get('/admin/customers/status/{id}/{status}', 'CustomerController@status');
Route::get('/admin/customers/account-status/{id}/{status}', 'CustomerController@acc_status')->name('admin-user-status');
Route::post('/admin/customers/emailsend', 'CustomerController@sendemail');
Route::resource('/admin/customers', 'CustomerController');

Route::get('/admin/withdraws/accept/{id}', 'WithdrawController@accept');
Route::get('/admin/withdraws/reject/{id}', 'WithdrawController@reject');
Route::resource('/admin/withdraws', 'WithdrawController');

Route::get('/admin/deposits/accept/{id}', 'DepositController@accept');
Route::get('/admin/deposits/reject/{id}', 'DepositController@reject');
Route::resource('/admin/deposits', 'DepositController');

Route::get('admin/check/movescript', 'AdminProfileController@movescript')->name('admin-move-script');
Route::get('admin/generate/backup', 'AdminProfileController@generate_bkup')->name('admin-generate-backup');
Route::get('admin/activation', 'AdminProfileController@activation')->name('admin-activation-form');
Route::post('admin/activation', 'AdminProfileController@activation_submit')->name('admin-activate-purchase');
Route::get('admin/clear/backup', 'AdminProfileController@clear_bkup')->name('admin-clear-backup');

Route::post('the/genius/ocean/2441139', 'FrontEndController@subscription');
Route::get('finalize', 'FrontEndController@finalize');

Route::post('/payment', 'PaymentController@store')->name('payment.submit');
Route::get('/payment/cancle', 'PaymentController@paycancle')->name('payment.cancle');
Route::get('/payment/return', 'PaymentController@payreturn')->name('payment.return');
Route::get('/nopayment/return', 'PaymentController@nopayreturn')->name('nopayment.return');
Route::post('/payment/notify', 'PaymentController@notify')->name('payment.notify');

Route::post('/perfect/notify', 'PaymentController@perfect_notify')->name('payment.perfect');

Route::post('/stripe-submit', 'StripeController@store')->name('stripe.submit');

Route::get('/account/login', 'Auth\ProfileLoginController@showLoginFrom')->name('user.login');
Route::post('/account/login', 'Auth\ProfileLoginController@login')->name('user.login.submit');
Route::get('/account/type/registration', 'Auth\ProfileRegistrationController@showTypeForm')->name('user.reg');
Route::get('/account/registration', 'Auth\ProfileRegistrationController@showRegistrationForm')->name('user.typereg');
Route::post('/account/registration', 'Auth\ProfileRegistrationController@register')->name('user.reg.submit');

Route::get('/account/forgot', 'Auth\ProfileResetPassController@showForgotForm')->name('user.forgotpass');
Route::post('/account/forgot', 'Auth\ProfileResetPassController@resetPass')->name('user.forgotpass.submit');

Route::post('account/update/{id}', 'UserAccountController@update')->name('account.update');
Route::post('account/passchange/{id}', 'UserAccountController@passchange')->name('account.passchange');

Route::get('/account/support/running', 'UserTicketController@running');
Route::post('/account/support/{id}', 'UserTicketController@submitreply');
Route::resource('/account/support', 'UserTicketController');

Route::get('/checkacc/{email}', 'FrontEndController@checkacc');
Route::get('/account/verify', 'UserAccountController@email_verify');
Route::get('/account/verify/resend', 'UserAccountController@resend_verify');
Route::get('/account/dashboard', 'UserAccountController@index')->name('user.account');
Route::get('/account/send', 'UserAccountController@send')->name('account.send');
Route::get('/account/transactions', 'UserAccountController@transactions')->name('account.transactions');
Route::get('/account/request', 'UserAccountController@request')->name('account.request');
Route::get('/account/deposit', 'UserAccountController@deposit')->name('account.deposit');
Route::get('/account/settings', 'UserAccountController@accountsettings')->name('account.settings');
Route::get('/account/security', 'UserAccountController@accountsecurity')->name('account.security');
Route::get('/account/withdraw', 'UserAccountController@withdraw')->name('account.withdraw');
Route::get('/account/requests', 'UserAccountController@pendingreqs')->name('account.requests');
Route::get('/account/withdraws', 'UserAccountController@pendingwithdraws')->name('account.withdraws');
Route::get('/account/deposits', 'UserAccountController@pendingdeposits')->name('account.deposits');
Route::get('/account/requestsdetails/{id}', 'UserAccountController@reqdetails')->name('account.requests.details');
Route::get('/account/transdetail/{id}', 'UserAccountController@transdetail')->name('account.transaction.details');

Route::post('/account/sendsubmit', 'UserAccountController@sendsubmit')->name('account.send.submit');
Route::post('/account/requestsubmit', 'UserAccountController@requestsubmit')->name('account.request.submit');
Route::post('/account/withdrawsubmit', 'UserAccountController@withdrawsubmit')->name('account.withdraw.submit');
Route::post('/account/depositsubmit', 'UserAccountController@depositsubmit')->name('account.deposit.submit');
Route::post('/account/acceptrequest/{id}', 'UserAccountController@acceptrequest')->name('account.request.accept');
Route::get('/account/rejectrequest/{id}', 'UserAccountController@rejectrequest')->name('account.request.reject');

//Route::get('/account/deposit', 'BlockChainController@deposit')->name('account.deposit');
//Route::get('account/deposit/bitcoin', 'BlockChainController@bitcoindeposit');
//Route::get('bitcoin/notify', 'BlockChainController@chaincallback');