<?php

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

Route::get('/', 'HomeController@index')->middleware('filterGuest','sessionLogin');
Route::get('/signup', ['as' => 'register', 'uses' => 'SignupController@index']);
Route::post('/signup', 'SignupController@attempt');
Route::get('/login', ['as' => 'login', 'uses' => 'LoginController@index']);
Route::post('/login', 'LoginController@attempt');
Route::get('/logout', 'LogoutController@logout');
Route::get('/forgot-password', 'ForgotPasswordController@index');
Route::post('/forgot-password', 'ForgotPasswordController@forgotPassword');

Route::get('/forgot-password/{token}', 'ForgotPasswordController@updatePassIndex');
Route::post('/forgot-password/update', 'ForgotPasswordController@updatePass');
Route::post('/contact-us', 'HomeController@contactUs');

/* USER ROUETS */

Route::get('/activate-account', 'ActivateAccountController@index')->middleware('signedIn');
Route::post('/activation-payment-details', 'ActivateAccountController@submitPaymentDetails');
Route::get('/account/deactivated', 'ActivateAccountController@deactivatedIndex')->middleware('signedIn');


Route::group(['middleware' => ['signedIn', 'activated']], function () {
    Route::group(['middleware' => 'sessionLogin', 'set-user-info'], function() {
        Route::get('/typing-captcha', 'UsersController@typeCaptchaIndex');
        Route::post('/typing-captcha/attempt', 'UsersController@typeCaptcha');
        Route::get('/referrals', 'UsersController@referralsIndex');
        Route::get('/encashment', 'UsersController@encashmentIndex');
        Route::post('/encashment', 'UsersController@encash');
        Route::get('/rewards/list', 'UsersController@rewardsIndex');
        Route::get('/reward/checkout/{id}', 'UsersController@checkoutIndex');
        Route::post('/rewards/claim', 'UsersController@rewardClaim');

        Route::group(['middleware' => ['encash']], function () {
            Route::get('/encashment/gcash', 'UsersController@encashGcashIndex');
            Route::get('/encashment/palawan', 'UsersController@encashPalawanIndex');
            Route::get('/encashment/coinsph', 'UsersController@encashCoinsphIndex');
            Route::get('/encashment/mlhuillier', 'UsersController@encashMlhuillierIndex');
        });
    });
});

//ADMIN ROUTES

Route::group(['middleware' => ['admin']], function () {
    Route::get('/dashboard', 'Admin\DashboardController@index');
    Route::get('/users', 'Admin\UsersController@index');
    Route::post('/user/deactivate', 'Admin\UsersController@deactivateUser');
    Route::post('/user/reactivate', 'Admin\UsersController@reactivateUser');
    Route::post('/user/balance/edit', 'Admin\UsersController@editBalance');
    Route::get('/activation-request/{id}', 'Admin\ActivateAccountController@index');
    Route::post('/activation-request/action', 'Admin\ActivateAccountController@apdRequestAction');
    Route::get('/encashments', 'Admin\EncashmentsController@index');
    Route::post('/encashments/process', 'Admin\EncashmentsController@process');
    Route::get('/rewards', 'Admin\RewardsController@index');
    Route::get('/rewards/add', 'Admin\RewardsController@addIndex');
    Route::post('/rewards/add', 'Admin\RewardsController@add');
    Route::get('/rewards/edit/{id}', 'Admin\RewardsController@editIndex');
    Route::post('/rewards/edit', 'Admin\RewardsController@edit');
    Route::post('/rewards/publish', 'Admin\RewardsController@publish');
    Route::get('/rewards/archive', 'Admin\RewardsController@archiveIndex');
    Route::post('/rewards/archive', 'Admin\RewardsController@archive');
    Route::get('/rewards/requests', 'Admin\RewardsController@claimRequestsIndex');
    Route::get('/rewards/requests/completed', 'Admin\RewardsController@completedCRCIndex');
    Route::post('/reward/request/complete', 'Admin\RewardsController@completeCRC');
});




