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

Route::resource('categorias', 'admin\CategoriaController');
Route::resource('subcategorias', 'admin\SubcategoriaController');
Route::resource('produtos', 'admin\ProdutoController');
Route::resource('/', 'site\PrincipalController');



Auth::routes();

Route::get('/admin', 'HomeController@index')->name('admin');
