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

Route::get('/produtos', 'App\Http\Controllers\ProdutosController@index')
->name('produtos');
Route::get('/produtos/criar', 'App\Http\Controllers\ProdutosController@create'); 
Route::post('/produtos/criar', 'App\Http\Controllers\ProdutosController@store')
->name('inserir.produto'); // salvar
Route::get('/produtos/editar/{id}', 'App\Http\Controllers\ProdutosController@edit')
->name('editar.produto');
Route::put('/produtos/editar/', 'App\Http\Controllers\ProdutosController@update')
->name('atualizar.produto');
Route::delete('/apagarProduto/{id}', 'App\Http\Controllers\ProdutosController@destroy')
->name('apagar.produto');

Route::get('/categorias', 'App\Http\Controllers\CategoriasController@index')
->name('categorias');
Route::get('/categorias/criar', 'App\Http\Controllers\CategoriasController@create');
Route::post('/categorias/criar', 'App\Http\Controllers\CategoriasController@store')
->name('inserir.categoria'); // salvar
Route::get('/categorias/editar/{id}', 'App\Http\Controllers\CategoriasController@edit')
->name('editar.categoria');
Route::put('/categorias/editar/', 'App\Http\Controllers\CategoriasController@update')
->name('atualizar.categoria');
Route::delete('/apagarCategoria/{id}', 'App\Http\Controllers\CategoriasController@destroy')
->name('apagar.categoria');



