<?php

use Illuminate\Http\Request;
use App\Models\Auth\User\User;

/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | is assigned the "api" middleware group. Enjoy building your API!
  |
 */

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

  Route::get('users', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return User::all();
  });

  Route::post('/collaborators/register/','Api\CollaboratorsController@registerCollaborator');

  Route::resource('photos', 'Api\PhotoController');
//Driver
  Route::group(['namespace' => 'Api'], function () {
    Route::get('drivers', 'DriverController@index')->name('users');
    Route::get('drivers/index', 'DriverController@index')->name('users.index');
    Route::get('drivers/aloha', 'DriverController@aloha')->name('users.aloha');
    
    Route::get('news', 'NewsController@index')->name('news');
    Route::get('news/index', 'NewsController@index')->name('news.index');
    Route::get('news/detail/{id}', 'NewsController@detail')->name('news.detail');
    Route::get('news/details/{id}', 'NewsController@detail')->name('news.details');
    Route::get('news/list', 'NewsController@index')->name('news.list');
    
    Route::get('customers/index', 'CustomersController@index')->name('customers.index');
    Route::get('customers/list', 'CustomersController@index')->name('customers.list');
    Route::post('customers/text', 'CustomersController@text')->name('customers.text');
    Route::post('customers/photo', 'CustomersController@photo')->name('customers.photo');
    
    Route::get('commissions/index', 'CommissionsController@index')->name('commissions.index');
    Route::get('commissions/list', 'CommissionsController@index')->name('commissions.list');
    
    Route::get('collaborators/my-status', 'CollaboratorsController@my_status')->name('collaborators.my_status');
    Route::get('collaborators/info', 'CollaboratorsController@info')->name('collaborators.info');
    Route::get('collaborators/login', 'CollaboratorsController@login')->name('collaborators.login');
    Route::get('collaborators/verify-pin', 'CollaboratorsController@verify_pin')->name('collaborators.verify_pin');
    Route::post('collaborators/register', 'CollaboratorsController@register')->name('collaborators.register');
    Route::get('collaborators/captcha', 'CollaboratorsController@captcha')->name('collaborators.captcha');
    Route::get('collaborators/contract', 'CollaboratorsController@contract')->name('collaborators.contract');
    Route::post('collaborators/get-sign', 'CollaboratorsController@getSign')->name('collaborators.get_sign');

    Route::get('setting/banner', 'SettingController@banner')->name('setting.banner');
    
  });
