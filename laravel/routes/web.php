<?php

use \Illuminate\Support\Facades\Route;
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

Route::get('/', 'PageController@getHomePage')->name('home');
Route::get('gioi-thieu', 'PageController@getIntroducePage')->name('introduce');
Route::get('san-pham', 'PageController@getProductPage')->name('product');
Route::get('anh-video', 'PageController@getMediaPage')->name('media');
Route::get('trach-nhiem-xa-hoi', 'PageController@getCommunityPage')->name('community');
Route::get('tuyen-dung', 'PageController@getRecruitmentPage')->name('recruitment');
Route::get('tin-tuc', 'PageController@getNewsPage')->name('news');
Route::get('lien-he', 'PageController@getcontactPage')->name('contact');
//Detail Pages
Route::get('trach-nhiem-xa-hoi/bai-viet', 'PageController@getNewsPostPage')->name('community-post');
Route::get('tin-tuc/bai-viet', 'PageController@getNewsPostPage')->name('news-post');
Route::get('gioi-thieu/bai-viet', 'PageController@getNewsPostPage')->name('introduce-post');
Route::get('anh-video/bai-viet', 'PageController@getVideoPostPage')->name('video-post');
Route::get('tuyen-dung/bai-viet', 'PageController@getNewsPostPage')->name('recruitment-post');
Route::get('ho-tro-khach-hang/bai-viet', 'PageController@getNewsPostPage')->name('customer-care-post');


Route::get('search', 'PageController@searchNews')->name('search');
Route::post('tin-tuc/binh-luan', 'PageController@getNewsComment')->name('add.comment');
//Test
Route::get('test-layout', 'PageController@testLayout')->name('test-layout');
Route::get('test-layout-detail', 'PageController@testLayoutDetail')->name('test-layout-detail');

Route::group(['namespace' => 'Site', 'middleware' => 'auth'], function () {
    //Customer
    Route::get('customer', 'CustomerController@index')->name('customer');
    Route::post('customer/bonus', 'CustomerController@bonus')->name('customer.bonus');
    Route::post('customer/save', 'CustomerController@save')->name('customer.save');
    Route::post('customer/status', 'CustomerController@getStatus')->name('customer.status');
    Route::post('customer/save-status', 'CustomerController@saveStatus')->name('customer.save-status');
    //Report
    Route::get('report', 'ReportController@index')->name('report');
});

Route::group(['namespace' => 'Auth'], function () {

    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('logout');

    // Registration Routes...
    Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'RegisterController@register');

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');

    Route::get('confirm/{user_by_code}', 'ConfirmController@confirm')->name('confirm');
    Route::get('confirm/resend/{user_by_email}', 'ConfirmController@sendEmail')->name('confirm.send');

    // Social Authentication Routes...
    Route::get('social/redirect/{provider}', 'SocialLoginController@redirect')->name('social.redirect');
    Route::get('social/login/{provider}', 'SocialLoginController@login')->name('social.login');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {

    // Dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard');
    //Collaborator
    Route::get('collaborator', 'CollaboratorController@index')->name('collaborator');
    Route::post('collaborator/update', 'CollaboratorController@update')->name('collaborator.update');
    Route::get('collaborator/{collaborator}/history', 'CollaboratorController@history')->name('collaborator.history');
    Route::post('collaborator/history/month', 'CollaboratorController@getMonth')->name('collaborator.getMonth');
    Route::get('collaborator/{collaborator}/{status}/status', 'CollaboratorController@status')->name('collaborator.status');

    //Setting
    Route::get('setting', 'SettingController@index')->name('setting');
    Route::put('setting/update', 'SettingController@update')->name('setting.update');
    Route::post('setting/set-news-top', 'SettingController@updateNewsTop')->name('new.setting_top');

    //News
    Route::get('news', 'NewsController@index')->name('news');
    Route::get('news/active', 'NewsController@active')->name('news.active');
    Route::get('news/add', 'NewsController@add')->name('news.add');
    Route::put('news/insert', 'NewsController@insert')->name('news.insert');
    Route::get('news/{news}', 'NewsController@detail')->name('news.detail');
    Route::get('news/{news}/edit', 'NewsController@edit')->name('news.edit');
    Route::put('news/{news}', 'NewsController@update')->name('news.update');
    Route::post('news/photo', 'NewsController@getUrlPhoto')->name('news.get_url_photo');
    /**/
    Route::get('news-top', 'NewsController@getNewsTopPage')->name('news.top');
    Route::get('news-top/search', 'NewsController@search')->name('news.top.search');

    /**/
    //Products
    Route::get('products', 'ProductController@index')->name('products');
    Route::get('products/active', 'ProductController@active')->name('products.active');
    Route::get('products/add', 'ProductController@add')->name('products.add');
    Route::put('products/insert', 'ProductController@insert')->name('products.insert');
    Route::get('products/{product}', 'ProductController@detail')->name('products.detail');
    Route::get('products/{product}/edit', 'ProductController@edit')->name('products.edit');
    Route::put('products/{product}', 'ProductController@update')->name('products.update');
    Route::post('products/photo', 'ProductController@getUrlPhoto')->name('products.get_url_photo');
    //Users
    Route::get('users', 'UserController@index')->name('users');
    Route::get('users/active', 'UserController@active')->name('users.active');
    Route::get('users/register', 'UserController@showRegisterForm')->name('users.show_register_form');
    Route::post('users/register', 'UserController@register')->name('users.register');
    Route::get('users/{user}', 'UserController@show')->name('users.show');
    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
    Route::put('users/{user}', 'UserController@update')->name('users.update');
    Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');
    //permissions
    Route::get('permissions', 'PermissionController@index')->name('permissions');
    Route::get('permissions/{permissions}/edit', 'PermissionController@edit')->name('permissions.edit');
    Route::put('permissions/{permissions}', 'PermissionController@update')->name('permissions.update');
    Route::get('permissions/create', 'PermissionController@showCreatePermission')->name('permissions.show_create_permission');
    Route::post('permissions/create', 'PermissionController@create')->name('permissions.create');
    Route::get('permissions/{user}/repeat', 'PermissionController@repeat')->name('permissions.repeat');
    //roles
    Route::get('roles', 'RoleController@index')->name('roles');
    Route::get('roles/{roles}/edit', 'RoleController@edit')->name('roles.edit');
    Route::put('roles/{roles}', 'RoleController@update')->name('roles.update');
    Route::get('roles/create', 'RoleController@showCreateRole')->name('roles.show_create_role');
    Route::post('roles/create', 'RoleController@create')->name('roles.create');

    Route::get('dashboard/log-chart', 'DashboardController@getLogChartData')->name('dashboard.log.chart');
    Route::get('dashboard/registration-chart', 'DashboardController@getRegistrationChartData')->name('dashboard.registration.chart');

    Route::get('media', 'MediaController@index')->name('media');
    Route::get('media/add', 'MediaController@add')->name('media.add');
    Route::post('media/add', 'MediaController@upload')->name('media.add');
    Route::post('media/delete', 'MediaController@delete')->name('media.delete');
    Route::get('media/list', 'MediaController@listMedia')->name('media.list');
});

//Route::get('/', 'HomeController@index');
Route::get('contract', 'ContractController@index')->name('contract');
Route::get('test', 'PageController@test')->name('test');
/**
 * Membership
 */
Route::group(['as' => 'protection.'], function () {
    Route::get('membership', 'MembershipController@index')->name('membership')->middleware('protection:' . config('protection.membership.product_module_number') . ',protection.membership.failed');
    Route::get('membership/access-denied', 'MembershipController@failed')->name('membership.failed');
    Route::get('membership/clear-cache/', 'MembershipController@clearValidationCache')->name('membership.clear_validation_cache');
});

