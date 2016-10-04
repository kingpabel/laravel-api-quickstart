<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| GENERAL Routes
|--------------------------------------------------------------------------
|
| Here is where you can do any request. These
| routes are loaded by the RouteServiceProvider.
| Enjoy building your API!
*/

Route::post('/', 'GeneralController@auth');