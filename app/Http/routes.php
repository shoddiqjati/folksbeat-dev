<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/books', ['as' => 'books.index', 'uses' => 'BookController@index']);
Route::get('/books/create', ['as' => 'books.create', 'uses' => 'BookController@create']);
Route::post('/books/store', ['as' => 'books.store', 'uses' => 'BookController@store']);
Route::get('/books/edit/{id?}', ['as' => 'books.edit', 'uses' => 'BookController@edit']);
Route::patch('/books/update/{id}', ['as' => 'books.update', 'uses' => 'BookController@update']);
Route::get('/books/delete/{id}', ['as' => 'books.delete', 'uses' => 'BookController@delete']);
Route::get('/books/history/{id}', ['as' => 'books.history', 'uses' => 'BookController@history']);
Route::get('/books/show/{id}', ['as' => 'books.show', 'uses' => 'BookController@show']);

Route::get('/students', ['as' => 'students.index', 'uses' => 'StudentController@index']);
Route::get('/students/create', ['as' => 'students.create', 'uses' => 'StudentController@create']);
Route::post('/students/store', ['as' => 'students.store', 'uses' => 'StudentController@store']);
Route::get('/students/edit/{id?}', ['as' => 'students.edit', 'uses' => 'StudentController@edit']);
Route::patch('/students/update/{id}', ['as' => 'students.update', 'uses' => 'StudentController@update']);
Route::get('/students/delete/{id}', ['as' => 'students.delete', 'uses' => 'StudentController@delete']);
Route::get('/students/history/{id}', ['as' => 'students.history', 'uses' => 'StudentController@history']);

Route::get('/transactions', ['as' => 'transactions.index', 'uses' => 'TransactionController@index']);
Route::get('/transactions/create', ['as' => 'transactions.create', 'uses' => 'TransactionController@create']);
Route::post('/transactions/store', ['as' => 'transactions.store', 'uses' => 'TransactionController@store']);
Route::get('/transactions/edit/{id}', ['as' => 'transactions.edit', 'uses' => 'TransactionController@edit']);
Route::patch('/transactions/update/{id}', ['as' => 'transactions.update', 'uses' => 'TransactionController@update']);
Route::get('/transactions/delete/{id}', ['as' => 'transactions.delete', 'uses' => 'TransactionController@delete']);

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/dashboard', [
        'as' => 'dashboard',
        'uses' => 'DashboardController@index']);

    Route::get('/register', [
        'as' => 'register',
        'uses' => 'RegisterController@index']);

    Route::post('/signup', [
        'as' => 'signup',
        'uses' => 'UserController@postSignUp']);

    Route::post('/signin', [
        'as' => 'signin',
        'uses' => 'UserController@postSignIn']);

Route::patch('/books', ['as' => 'books.index', 'uses' => 'BookController@index']);
Route::get('/books/create', ['as' => 'books.create', 'uses' => 'BookController@create']);
Route::post('/books/store', ['as' => 'books.store', 'uses' => 'BookController@store']);
Route::get('/books/edit/{id?}', ['as' => 'books.edit', 'uses' => 'BookController@edit']);
Route::patch('/books/update/{id}', ['as' => 'books.update', 'uses' => 'BookController@update']);
Route::get('/books/delete/{id}', ['as' => 'books.delete', 'uses' => 'BookController@delete']);
Route::get('/books/history/{id}', ['as' => 'books.history', 'uses' => 'BookController@history']);
Route::get('/books/show/{id}', ['as' => 'books.show', 'uses' => 'BookController@show']);

Route::patch('/students', ['as' => 'students.index', 'uses' => 'StudentController@index']);
Route::get('/students/create', ['as' => 'students.create', 'uses' => 'StudentController@create']);
Route::post('/students/store', ['as' => 'students.store', 'uses' => 'StudentController@store']);
Route::get('/students/edit/{id?}', ['as' => 'students.edit', 'uses' => 'StudentController@edit']);
Route::patch('/students/update/{id}', ['as' => 'students.update', 'uses' => 'StudentController@update']);
Route::get('/students/delete/{id}', ['as' => 'students.delete', 'uses' => 'StudentController@delete']);
Route::get('/students/history/{id}', ['as' => 'students.history', 'uses' => 'StudentController@history']);

Route::get('/transactions', ['as' => 'transactions.index', 'uses' => 'TransactionController@index']);
Route::get('/transactions/create', ['as' => 'transactions.create', 'uses' => 'TransactionController@create']);
Route::post('/transactions/store', ['as' => 'transactions.store', 'uses' => 'TransactionController@store']);
Route::get('/transactions/edit/{id}', ['as' => 'transactions.edit', 'uses' => 'TransactionController@edit']);
Route::patch('/transactions/update/{id}', ['as' => 'transactions.update', 'uses' => 'TransactionController@update']);
Route::get('/transactions/delete/{id}', ['as' => 'transactions.delete', 'uses' => 'TransactionController@delete']);

});
