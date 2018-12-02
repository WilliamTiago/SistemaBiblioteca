<?php

/**
 * Modelo dos Clientes
 *
 * @package Model
 * @author  William Goebel
 * @since   02/10/2018
 */


?>

<div class="container">
    <form>
        <div class="form-group">
            <label for="IDCategoria">ID da Categoria</label>
            <input type="number" class="form-control" id="IDCategoria" placeholder="Entre com o ID do Produto" required>
        </div>
        <div class="form-group">
            <label for="IDAutor">ID do Autor</label>
            <input type="text" class="form-control" id="IDAutor" placeholder="Entre com o Nome Do Produto" required>
        </div> 
        <div class="form-group">
            <label for="IDLivro">ID do Livro</label>
            <input type="number" class="form-control" id="IDLivro" placeholder="Entre com o ID do Produto" disabled>
        </div>
        <div class="form-group">
            <label for="Titulo">Título</label>
            <input type="text" class="form-control" id="Titulo" placeholder="Entre com o Nome Do Produto" required>
        </div>
        <div class="form-group">
            <label for="Ano">Ano</label>
            <input type="number" class="form-control" id="Ano" placeholder="Entre com o ID do Produto" required>
        </div>            
        <button type="button" class="btn btn-primary" id="alterar">Alterar</button>
        <button type="button" class="btn btn-primary" id="cancelar">Cancelar</button>
        <button type="reset" class="btn btn-primary" id="limpar">Limpar</button>
    </form>
</div>
<br>
                           