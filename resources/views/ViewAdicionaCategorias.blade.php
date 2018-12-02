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
<div class="container">
    <form>
        <div class="form-group">
            <label for="IDdoProduto">ID da Categoria</label>
            <input type="number" class="form-control" id="IDCategoria" placeholder="Entre com o ID do Produto" disabled required>
        </div>
        <div class="form-group">
            <label for="NomeDoProduto">Descrição</label>
            <input type="text" class="form-control" id="Descricao" placeholder="Entre com o Nome Do Produto" required>
        </div>               
        <button type="button" class="btn btn-primary" id="gravar">Cadastrar</button>
        <button type="button" class="btn btn-primary" id="cancelar">Cancelar</button>
        <button type="reset" class="btn btn-primary" id="limpar">Limpar</button>
    </form>
</div>
<br>
                           

@endsection

@section('scripts')
<script type="text/javascript" src="/js/categoria.js"></script>
@endsection
