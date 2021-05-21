<?php

use Core\Route;

Route::post('/user/register', 'UserController@register');
Route::get('/user/login', 'UserController@login');

Route::get('/welcome', 'WelcomeController@index', [
    'auth'
]);