<?php

/**
 * Modelo dos Clientes
 *
 * @package Model
 * @author  William Goebel
 * @since   02/10/2018
 */


?>

@extends('ViewPadrao')

@section('content')
        <br>
        <div class ="navbar-header col-12">
            <a href ="/ConsultaLivros" class ="navbar-brand">Categorias</a>
        </div>
        <div class="container col-12">
            <ul class="nav">
                <li class="nav-item">
                    <button type="button" class="btn btn-success" id="adicionar">Adicionar</button>
                </li>
            </ul>
        </div>
        <br>
        <div  id="tabela">
        
        </div>                     

@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('/js/categoria.js') }}"></script>
@endsection
