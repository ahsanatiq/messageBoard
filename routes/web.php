<?php
use Illuminate\Support\Facades\Auth;

Route::group(['domain' => 'public.'.parse_url(config('app.url'))['host']], function () {
    Route::get('/', 'MessagesController@showPublic')->name('messages.showPublic');
});
Route::group(['domain' => 'private.'.parse_url(config('app.url'))['host']], function () {
    Route::get('/', 'MessagesController@showPrivate')->name('messages.showPrivate');
});
Route::group(['domain' => parse_url(config('app.url'))['host']], function () {
    Auth::routes();
    Route::get('/', function () {
        return redirect()->route('pages.view',['id'=>'1']);
    });
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile', 'ProfileController@index')->name('profile.index');
    Route::post('/profile', 'ProfileController@update')->name('profile.update');
    Route::get('/profile/password', 'ProfileController@password')->name('profile.password');
    Route::post('/profile/password', 'ProfileController@updatePassword')->name('profile.updatePassword');
    Route::get('/users', 'UsersController@index')->name('users.index');
    Route::get('/users/edit/{id}', 'UsersController@edit')->name('users.edit');
    Route::post('/users/edit/{id}', 'UsersController@update')->name('users.update');
    Route::post('/users/delete', 'UsersController@delete')->name('users.delete');
    Route::get('/users/add', 'UsersController@add')->name('users.add');
    Route::post('/users/add', 'UsersController@create')->name('users.create');
    Route::get('/pages', 'PagesController@index')->name('pages.index');
    Route::get('/pages/edit/{id}', 'PagesController@edit')->name('pages.edit');
    Route::post('/pages/edit/{id}', 'PagesController@update')->name('pages.update');
    Route::post('/pages/delete', 'PagesController@delete')->name('pages.delete');
    Route::get('/pages/add', 'PagesController@add')->name('pages.add');
    Route::post('/pages/add', 'PagesController@create')->name('pages.create');
    Route::get('/pages/view/{id}', 'PagesController@view')->name('pages.view');
    Route::get('/message/add', 'MessagesController@add')->name('messages.add');
    Route::post('/message/add', 'MessagesController@create')->name('messages.create');
});
