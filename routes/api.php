<?php

use Illumainate\Http\Request;

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



/**
 * Rota para os Categoria
 *
 * @author William Goebel
 * @package Routes
 * @since  02/10/2018
 */

Route::group(["prefix" => "categoria"], function () {
    //Lista os Categoria
    Route::get('', 'CategoriaController@getCategorias');

    //Pega uma Categoria específico
    Route::get('{id}', 'CategoriaController@getCategoria');

    //Adiciona uma novo Categoria
    Route::post('', 'CategoriaController@addCategoria');

    //Atualiza uma Categoria
    Route::put('/{id}', 'CategoriaController@atualizaCategoria');

    //Deleta uma Categoria
    Route::delete('{id}', 'CategoriaController@deletaCategoria');
});

Route::group(["prefix" => "autor"], function () {
    //Lista os Autores
    Route::get('', 'AutorController@getAutores');

    //Pega um Autor
    Route::get('{id}', 'AutorController@getAutor');

    //Adiciona um Autor
    Route::post('', 'AutorController@addAutor');

    //Atualiza um Autor
    Route::put('/{id}', 'AutorController@atualizaAutor');

    //Deleta um Autor
    Route::delete('{id}', 'AutorController@deletaAutor');
});

Route::group(["prefix" => "livro"], function () {
    //Lista os Autores
    Route::get('', 'LivroController@getLivros');

    //Pega um Autor
    Route::get('{id}', 'LivroController@getLivro');

    //Adiciona um Autor
    Route::post('', 'LivroController@addLivro');

    //Atualiza um Autor
    Route::put('/{id}', 'LivroController@atualizaLivro');

    //Deleta um Autor
    Route::delete('{id}', 'LivroController@deletaLivro');
});