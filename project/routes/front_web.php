<?php
/**
 * Created by PhpStorm.
 * User: Mobarok Hossen
 * Date: 22-Dec-19
 */


Route::get('/login/{user?}', 'Auth\LoginController@showGoodinsuredLoginForm')->name('login');
Route::get('/healthshop/login/{user?}', 'Auth\LoginController@showHealthshopLoginForm')->name('healthinsured.login');
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.email');
Route::get('/healthshop/password/reset', 'Auth\ForgotPasswordController@showHealthshopLinkRequestForm')->name('healthshop.password.email');

Route::group([ 'namespace' => 'Front', 'as' => 'goodinsured.'], function () {

    Route::get('/', 'GoodInsuredController@index')->name('home');
    Route::get('/about', 'GoodInsuredController@about')->name('about');
    Route::get('/contact', 'GoodInsuredController@contact')->name('contact');
    Route::get('/collection-auto', 'GoodInsuredController@collection_auto')->name('collection_auto');
    Route::get('/business-owner-policy', 'GoodInsuredController@business_owner')->name('business_owner');
    Route::get('/general-liability', 'GoodInsuredController@general_liability')->name('general_liability');
    Route::get('/workers-compensation', 'GoodInsuredController@workers_compensation')->name('workers_compensation');
    Route::get('/professional-liability', 'GoodInsuredController@professional_liability')->name('professional_liability');
    Route::get('/commercial-auto', 'GoodInsuredController@commercial_auto')->name('commercial_auto');
    Route::get('/condo', 'GoodInsuredController@condo')->name('condo');
    Route::get('/homeowners', 'GoodInsuredController@homeowners')->name('homeowners');
    Route::get('/pet', 'GoodInsuredController@pets')->name('pet');
    Route::get('/renters', 'GoodInsuredController@renters')->name('renters');
    Route::get('/rideshare', 'GoodInsuredController@rideshare')->name('rideshare');
    Route::get('/auto', 'GoodInsuredController@auto')->name('auto');
    Route::get('/motorcycle', 'GoodInsuredController@motorcycle')->name('motorcycle');
    Route::get('/trailer', 'GoodInsuredController@trailer')->name('trailer');
    Route::get('/atv', 'GoodInsuredController@atv')->name('atv');
    Route::get('/flood', 'GoodInsuredController@flood')->name('flood');
    Route::get('/mobile-home', 'GoodInsuredController@mobile_home')->name('mobile-home');
    Route::get('/rv', 'GoodInsuredController@rv')->name('rv');
    Route::get('/boats', 'GoodInsuredController@boat')->name('boat');

});


Route::group(['prefix' => 'healthshop', 'namespace' => 'Front', 'as' => 'healthinsured.'], function () {

    Route::get('/', 'HealthShopController@index')->name('home');
    Route::get('/about', 'HealthShopController@about')->name('about');
    Route::get('/contact', 'HealthShopController@contact')->name('contact');
    Route::get('/health', 'HealthShopController@health')->name('health');
    Route::get('/medicare', 'HealthShopController@medicare')->name('medicare');
    Route::get('/life', 'HealthShopController@life')->name('life');
    Route::get('/vision', 'HealthShopController@vision')->name('vision');
    Route::get('/dental', 'HealthShopController@dental')->name('dental');

});
