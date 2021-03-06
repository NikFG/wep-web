<?php

use App\Cidade;
use App\Cliente;
use App\Estado;
use App\Produto;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produtos', 'ProdutoController@index');
Route::get('/produtos/create', 'ProdutoController@create');
Route::post('/produtos/create', 'ProdutoController@store');
Route::get('/produtos/edit/{id}', 'ProdutoController@edit');
Route::post('/produtos/edit/{id}', 'ProdutoController@update');
Route::get('/produtos/show/{id}', 'ProdutoController@show');
Route::delete('/produtos/delete/{id}', 'ProdutoController@destroy');
Route::post('/produtos/duplicate/{id}', 'ProdutoController@duplicate');
Route::get('/produto/json', function () {
    $produtos = Produto::all();
    return $produtos->toJson();
});

Route::get('/estados', 'EstadoController@index');
Route::get('/estados/create', 'EstadoController@create');
Route::post('/estados/create', 'EstadoController@store');
Route::get('/estados/edit/{id}', 'EstadoController@edit');
Route::post('/estados/edit/{id}', 'EstadoController@update');
Route::get('/estados/show/{id}', 'EstadoController@show');
Route::get('/estados/deleted', 'EstadoController@indexDeleted');
Route::delete('/estados/delete/{id}', 'EstadoController@destroy');
Route::get('/estados/json', function () {
    $estados = Estado::all();
    return $estados->toJson();
});

Route::get('/cidades', 'CidadeController@index');
Route::get('/cidades/create', 'CidadeController@create');
Route::post('/cidades/create', 'CidadeController@store');
Route::get('/cidades/edit/{id}', 'CidadeController@edit');
Route::post('/cidades/edit/{id}', 'CidadeController@update');
Route::get('/cidades/show/{id}', 'CidadeController@show');
Route::get('/cidades/deleted', 'CidadeController@indexDeleted');
Route::delete('/cidades/delete/{id}', 'CidadeController@destroy');
Route::get('/cidades/json', function () {
    $cidades = Cidade::all();
    return $cidades->toJson();
});

Route::get('ClienteVendedor', function () {
    $cliente = Cliente::with('vendedores')->get();
    return $cliente->toJson();

});
