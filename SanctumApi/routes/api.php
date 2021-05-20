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


// Route::get('products','ProductController@index');

// Route::post('addproducts','ProductController@store');
 
// Use Resource method for all routes

//Route::resource('products','ProductController');

//Public Routes
Route::post('register','AuthController@register');
Route::post('login','AuthController@login');

Route::get('products','ProductController@index');

//Protected Routes
Route::group(['middleware'=>['auth:sanctum']], function () {
    
    Route::post('products','ProductController@store');
    Route::get('products/{id}','ProductController@show');
    Route::delete('products/{id}','ProductController@destroy');
    Route::put('products/{id}','ProductController@update');
    Route::get('searchproducts/{name}','ProductController@search');
    Route::get('logout','AuthController@logout');
});

