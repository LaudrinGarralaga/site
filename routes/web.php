<?php

use Illuminate\Support\Facades\Input;
use App\Subcategoria;
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
Route::get('/', 'site\PrincipalController@index')->name('principal');
Route::get('categoria/subcategoria/{id}', 'site\PrincipalController@subcategoria')->name('principal.subcategoria');
Route::get('categoria/{id}', 'site\PrincipalController@categoria')->name('principal.categoria');
Route::post('sitePesquisa', 'site\PrincipalController@filtro')->name('site.filtro');

Route::get('/information/create/ajax-state',function()
{
    $state_id = Input::get('state_id');
    $subcategories = Subcategoria::where('categoria_id','=',$state_id)->get();
    return $subcategories;

});

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('admin');
