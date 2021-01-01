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
Route::get('/', function(){

    echo "<ul>";
    echo "<li>1. Email test (Simple)</li>";
    echo "<li>2. Email test With Mailable Calss</li>";
    echo "<li>3. Email test With Notification Calss";
    echo "<ul><li>With Blade file</li><li>Without Blade file</li></ul></li>";
    echo "</ul>";

});

Route::get('/mail/simple', 'EmailTestController@simpleMail');
Route::get('/mail/mailable', 'EmailTestController@mailUsingMailable');
Route::get('/mail/notification', 'EmailTestController@mailUsingNotification');
