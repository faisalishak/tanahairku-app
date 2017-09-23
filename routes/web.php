<?php

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
Route::get('/admin/login', 'Auth\LoginController@getLogin');
Route::post('/admin/login','Auth\LoginController@postLogin');
Route::get('/log/marker','LogMarkerObjectController@index');
Route::get('/log/cluster','LogMarkerObjectController@cluster');
Route::get('/log/object','LogMarkerObjectController@apiObject');
Route::group(['middleware' => 'web','prefix' => 'admin'], function(){

    Route::get('/dashboard','UsersController@getDashboard');
    Route::get('/code','CodeController@getCode');
    Route::post('/addcode','CodeController@postAddCode');
    Route::post('/updatecode','CodeController@postUpdatecode');
    Route::post('/deletecode','CodeController@postDeletecode');
    Route::get('/registered','UsersController@getRegistered');
    Route::get('/logout','Auth\LoginController@logout');
    Route::get('/product',' ProductController@index');
    Route::get('/product/create','ProductController@getCreate');
    Route::post('/product/create','ProductController@postCreate');
    Route::get('/log/cluster','LogMarkerObjectController@visualizeCluster');
    Route::get('/log/marker/category','LogMarkerObjectController@visualizeAssRule');
    Route::get('/log/marker/object','LogMarkerObjectController@getObject');
});

/*Route::get('/', function () {
    return view('store');
});*/

Auth::routes();
Route::get('/', 'StoreController@show');
Route::get('/ourproduct', 'OurProductController@index');
Route::get('/product/{id_product}/{qty}/', 'OurProductController@ShowDetailProduct');
Route::post('/subscribtion', 'OurProductController@subscription');
Route::post('/preorder', 'OurProductController@preorder');
Route::get('/api/pertanyaan', 'ApiController@getTriviaQuiz');
Route::get('/workwithus', 'WorkwithusController@index');
Route::get('/aboutus', 'AboutusController@index');
Route::post('/workwithus/send', 'OurProductController@workwithus');
Route::get('/store', 'StoreController@show');
Route::get('/checkout', 'OurProductController@Checkout');
Route::post('/checkout/create', 'OurProductController@PostCheckout');
Route::post('/checkout', 'OurProductController@PostTransaction');
Route::get('/apiongkir', 'CobaApiOngkirController@getdataprovince');
Route::get('/login', 'Auth\LoginController@getLoginCustomer');
Route::post('/register', 'Auth\RegisterController@create');
Route::get('/profile', 'ProfileController@show');

