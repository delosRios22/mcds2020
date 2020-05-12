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

Route::get('/', function () {
    return view('welcome');
});

// Resource: Crea Automaticamente todas la rutas
// Route::resource('Article', 'ArticleController');

// Any: Cualquier solicitud (get/post/put/delete)
Route::any('show/articles', function() {
	$arts = App\Article::all();
	return dd($arts);
});

// View: Vista
Route::view('show/users', '.showusers', ['users' => App\User::all()]);

// Con Parámetro
Route::get('show/user/{id}', function($id) {
	$user = App\User::find($id);
	dd($user);
});



Auth::routes();
//middleware admin
Route::group(['middleware' => 'admin'], function(){
	// Resources
	Route::resource('users', 'UserController');
	Route::resource('categories', 'CategoryController');
	Route::resource('articles', 'ArticleController');

	
	//Search AJX
	Route::post('users/search', 'UserController@search');


});



Route::get('/home', 'HomeController@index')->name('home');




//Reportes pdf
Route::get('generate/pdf/users', 'UserController@pdf');
Route::get('generate/excel/users', 'UserController@excel');
// Imports Users
Route::post('import/excel/users', 'UserController@importExcel');


//Resouerce Category
Route::get('generate/pdf/categories', 'CategoryController@pdf');

 //pdf articles /excel articles
 Route::get('generate/pdf/articles', 'ArticleController@pdf');
 Route::get('generate/excel/articles', 'ArticleController@excel');

//Ruta de Welcome
Route::resource('/', 'WelcomeController');
Route::post('loadcat', 'WelcomeController@loadcat');

//Role Editor datos
Route::get('mydata', 'UserController@mydata');
Route::put('mydata/{id}', 'UserController@updMyData');

//Role Editor articulos
Route::get('myarticles', 'ArticleController@myarticles');
Route::get('editor/create', 'ArticleController@ecreate');
Route::get('editor/index', 'ArticleController@myarticles');
Route::post('editor', 'ArticleController@estore');
Route::get('editor/articles/{id}', 'ArticleController@eshow');
Route::get('editor/{id}/edit', 'ArticleController@eedit');
Route::put('editor/{id}', 'ArticleController@eupdate');
Route::delete('editor/{id}', 'ArticleController@edestroy');
Route::get('generate/pdf/editor/articles', 'ArticleController@pdf');
Route::get('generate/excel/editor/articles', 'ArticleController@excel');

