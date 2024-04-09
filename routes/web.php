<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers\Home'], function()
{  
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/about', 'HomeController@about')->name('home.about');
    Route::get('/contact', 'HomeController@contact')->name('home.contact');
    Route::get('/services', 'HomeController@services')->name('home.services');
    Route::get('/faq', 'HomeController@faq')->name('home.faq');
    Route::get('/plagiarism', 'HomeController@plagiarism')->name('home.plagiarism');

    // Route::get('/affiliate/{id}', 'HomeController@affiliate')->name('affiliate.show');

});


Route::prefix('/user')->namespace('App\Http\Controllers\User')->group(function(){
    Route::group(['middleware' => ['guest']], function() {

        Route::get('/', function () {
            return redirect('/user/login');
            
            // return redirect()->intended('/');
        });

        /**
         * Register Routes*
         */
       
         Route::get('/register', function () {
            return redirect('/user/register/null');
        });
        Route::get('/register/{ref}', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

         /**
         * Login Routes*
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');



        Route::get('/dashboard', 'UserController@dashboard')->name('dashboard.view');
        Route::get('/project', 'UserController@project')->name('project.view');
        Route::get('/notification', 'UserController@notification')->name('notification.view');
        Route::get('/settings', 'UserController@settings')->name('settings.view');
    });

    Route::group(['middleware' => ['auth']], function() {
        
      
    });



});


