<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
Route::auth();


//Route::post('sign_in', 'AuthenticateController@authenticate');

Route::get('auth/google', 'AuthController@googleRedirectToProvider')->name('google.login');

Route::get('google/callback', 'AuthController@GoogleHandleProviderCallback');
Route::get('/', ['middleware' => 'must_login', function () {
    return view('auth/login');
}]);

Route::post('authentication','AuthenticateController@authenticate');
Route::group(['middleware' => ['api']], function () {


});

Route::resource('users', 'web\UsersController');
Route::get('users/{id}/confirm', [
    'uses' => 'web\UsersController@confirm',
    'as' => 'users.confirm',
]);

Route::resource('financial', 'web\FinancialInstitutionController');

Route::resource('vdcs', 'web\VdcAgentController');
