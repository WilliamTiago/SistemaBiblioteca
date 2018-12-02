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

/**
 * Web Routes
 *
 * @package Web
 * @author  William Goebel
 * @since   02/10/2018
 */
Route::get('/ConsultaCategorias', function () {
    return view('ViewConsultaCategorias');
});

Route::get('/ConsultaLivros', function () {
    return view('ViewConsultaLivros');
});

Route::get('/ConsultaAutores', function () {
    return view('ViewConsultaAutores');
});

Route::get('/AdicionaCategorias', function () {
    return view('ViewAdicionaCategorias');
});

Route::get('/AdicionaLivros', function () {
    return view('ViewAdicionaLivros');
});

Route::get('/AdicionaAutores', function () {
    return view('ViewAdicionaAutores');
});

Route::get('/AlteraCategorias', function () {
    return view('ViewAlteraCategorias');
});

Route::get('/AlteraLivros', function () {
    return view('ViewAlteraLivros');
});

Route::get('/AlteraAutores', function () {
    return view('ViewAlteraAutores');
});