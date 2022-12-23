<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['namespace' => 'App\Http\Controllers'], function() {
    // home route
    Route::get('/', 'HomeController@index')->name('name.index');

    // register route
    Route::get('/register', 'RegisterController@show')->name('register.show');
    Route::post('/register', 'RegisterController@register')->name('register.perform');

    // login route
    Route::get('/login', 'LoginController@show')->name('login.show');
    Route::post('/login', 'LoginController@login')->name('login.perform');

    Route::group(['middleware' => ['auth', 'permission']], function() {
        // logout route
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    
        // user route
        Route::group(['prefix' => 'posts'], function() {
            Route::get('/', 'PostsController@index')->name('posts.index');
            Route::get('/create', 'PostsController@create')->name('posts.create');
            Route::post('/create', 'PostsController@store')->name('posts.store');
            Route::get('/{post}/show', 'PostsController@show')->name('posts.show');
            Route::get('/{post}/edit', 'PostsController@edit')->name('posts.edit');
            Route::patch('/{post}/update', 'PostsController@update')->name('posts.update');
            Route::delete('/{post}/delete', 'PostsController@destroy')->name('posts.destroy');
        });
    
        Route::resource('roles', RolesController::class);
        Route::resource('permissions', PermissionsController::class);
    });

});

require __DIR__.'/auth.php';
