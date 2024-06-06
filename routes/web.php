<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

//guest user routes

Route::group(['namespace' => 'App\Http\Controllers\Home'], function(){  
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/about', 'HomeController@about')->name('home.about');
    Route::get('/contact', 'HomeController@contact')->name('home.contact');
    Route::get('/services', 'HomeController@services')->name('home.services');
    Route::get('/faq', 'HomeController@faq')->name('home.faq');
    Route::get('/plagiarism', 'HomeController@plagiarism')->name('home.plagiarism');

    // Route::get('/affiliate/{id}', 'HomeController@affiliate')->name('affiliate.show');

});



Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){
    Route::get('/', function () {
        return redirect('/login');
        
        // return redirect()->intended('/');
    });
    Route::match(['get','post'],'login', 'AdminController@login');
    
    

    Route::group(['middleware'=>['admin']], function(){
        Route::get('/','AdminController@login');

        //users route
        Route::match(['get','post'],'users', 'AdminController@users');

        //Email route
        Route::match(['get','post'],'email', 'AdminController@email');

        Route::match(['get','post'],'viewusers/{slug}', 'AdminController@viewusers');

        
        //Admin field routes
        Route::resource('fields', FieldsController::class);

           //Admin projecttype routes
           Route::resource('projecttypes', ProjecttypeController::class);

       

        //Admin activitys route
        // Route::resource('activity', ActivitysController::class);

        Route::match(['get','post'],'dashboard', 'AdminController@dashboard');
        Route::get('logout','AdminController@logout');

        //withdraw routes
        Route::match(['get','post'],'withdraws', 'WithdrawController@withdraw');

        


    });

    
});

Route::get('/download/tmp/{filename}', function ($filename) {
    $file = storage_path('tmp/uploads/' . $filename);

    if (!file_exists($file)) {
        abort(404);
    }

    return response()->download($file);
})->name('download.tmp');

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

         //resetpassword
        Route::match(['get','post'],'/resetpassword/{slug}', 'UserController@resetpassword')->name('account.resetpassword');

    });

    Route::group(['middleware' => ['user']], function() {
        Route::match(['get','post'],'/dashboard', 'UserController@dashboard')->name('dashboard');
        Route::post('/dashboard/storemedia', 'UserController@storeMedia')->name('dashboard.storemedia');//to upload file to server
        Route::post('/dashboard/deleteMedia', 'UserController@deleteMedia')->name('dashboard.deleteMedia');
        // Route::post('/dashboard', 'UserController@dashboard')->name('dashboard.store');

        //All project routes
        Route::get('/project', 'UserController@project')->name('project.index');
        Route::get('/projects/{slug}', 'ProjectsController@projects')->name('project.show');
        Route::patch('/projects/{slug}', 'ProjectsController@projects')->name('project.update');
        Route::post('/projects/{slug}', 'ProjectsController@projects')->name('project.edit');
        Route::post('/projectsstoremedia', 'ProjectsController@storeMedia')->name('project.storemedia');//to upload file to server
        Route::post('/projectsdeletmedia', 'ProjectsController@deleteMedia')->name('project.deletemedia');//to upload file to server
        Route::get('/download/tmp/{filename}', function ($filename) {
            $file = storage_path('tmp/uploads/' . $filename);
        
            if (!file_exists($file)) {
                abort(404);
            }
        
            return response()->download($file);
        })->name('download.tmp');



        Route::get('/notification', 'UserController@notification')->name('notification.view');
        Route::get('/settings', 'UserController@settings')->name('settings.view');
         Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });



});


Route::prefix('/expert')->namespace('App\Http\Controllers\Expert')->group(function(){
    Route::group(['middleware' => ['guest']], function() {

        Route::get('/', function () {
            return redirect('/user/login');
            
            // return redirect()->intended('/');
        });


    });

    Route::group(['middleware' => ['expert']], function() {
        Route::get('/dashboard', 'ExpertController@dashboard')->name('expertdashboard.view');

        //Project routes
        Route::get('/project', 'ExpertController@project')->name('expertproject.view');
        Route::get('/projects/{slug}', 'ProjectsController@projects')->name('project.show');
        Route::patch('/projects/{slug}', 'ProjectsController@projects')->name('project.update');
        Route::post('/projects/{slug}', 'ProjectsController@projects')->name('project.edit');
        Route::post('/projectsstoremedia', 'ProjectsController@storeMedia')->name('project.storemedia');//to upload file to server
        Route::post('/projectsdeletmedia', 'ProjectsController@deleteMedia')->name('project.deletemedia');//to upload file to server
        Route::get('/download/tmp/{filename}', function ($filename) {
            $file = storage_path('tmp/uploads/' . $filename);
        
            if (!file_exists($file)) {
                abort(404);
            }
        
            return response()->download($file);
        })->name('download.tmp');


        Route::get('/notification', 'ExpertController@notification')->name('expertnotification.view');
        Route::get('/payout', 'ExpertController@payout')->name('expertpayout.view');
        Route::get('/settings', 'ExpertController@settings')->name('expertsettings.view');
         Route::get('/logout', 'LogoutController@perform')->name('expertlogout.perform');
    });



});