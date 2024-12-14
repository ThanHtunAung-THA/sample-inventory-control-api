<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('lol',function(){
    return 'hello';
});


Route::prefix('admin')->namespace('API')->group(function(){
    Route::get('/login',"AdminController@login");
    Route::get('/get',"AdminController@get_by_latest");
    Route::get('/get/{id}','AdminController@get_by_id'); // Get a specific sale by ID
    Route::post('/add',"AdminController@create");
    Route::post('/edit/{id}','AdminController@update');
    Route::delete('/remove/{id}','AdminController@softdelete'); // Delete a specific sale by ID
    Route::delete('/destroy/{id}','AdminController@delete'); // Delete a specific sale by ID
    Route::post('/check-email/{email}','AdminController@checkEmail');
});

Route::prefix('sale')->namespace('API')->group(function(){
    Route::get('/get',"SaleController@get_by_latest"); // Get all sales
    Route::get('/get/{id}','SaleController@get_by_id'); // Get a specific sale by ID
    Route::post('/add',"SaleController@create"); // Save a new sale
    Route::post('/edit/{id}','SaleController@update'); // Update a specific sale by ID
    Route::delete('/remove/{id}','SaleController@softdelete'); // Delete a specific sale by ID
    Route::delete('/destroy/{id}','SaleController@delete'); // Delete a specific sale by ID
});

Route::prefix('purchase')->namespace('API')->group(function(){
    Route::get('/get',"PurchaseController@get_by_latest"); // Get all Purchases
    Route::get('/get/{id}','PurchaseController@get_by_id'); // Get a specific Purchase by ID
    Route::post('/add',"PurchaseController@create"); // Save a new Purchase
    Route::post('/edit/{id}','PurchaseController@update'); // Update a specific Purchase by ID
    Route::delete('/remove/{id}','PurchaseController@softdelete'); // Delete a specific Purchase by ID
    Route::delete('/destroy/{id}','PurchaseController@delete'); // Delete a specific Purchase by ID
});

