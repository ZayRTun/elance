<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/elancer')->group(function () {
    Route::get('/profile/create', 'ElancerController@create')->name('elancer.create');

    Route::get('/register', 'Auth\ElancerRegisterController@showRegistrationForm')->name('elancer.register');
    Route::post('/register', 'Auth\ElancerRegisterController@register')->name('elancer.register.submit');

    Route::get('/login', 'Auth\ElancerLoginController@showLoginForm')->name('elancer.login');
    Route::post('/login', 'Auth\ElancerLoginController@login')->name('elancer.login.submit');

    Route::get('/', 'ElancerController@index')->name('elancer.home');
});
