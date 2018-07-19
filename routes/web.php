<?php

use Httpful\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use JildertMiedema\LaravelPlupload\Facades\Plupload;
use Illuminate\Support\Facades\Input;

Auth::routes();

Route::get('/', 'DashboardController@index')->name('dashboard');
Route::resource('administradores', 'AdminsController');
