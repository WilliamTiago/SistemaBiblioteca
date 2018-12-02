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
            <label for="IDAutor">ID do Autor</label>
            <input type="number" class="form-control" id="IDAutor" placeholder="Entre com o ID do Produto" disabled required>
        </div>
        <div class="form-group">
            <label for="Nome">Nome</label>
            <input type="text" class="form-control" id="Nome" placeholder="Entre com o Nome Do Produto" required>
        </div> 
        <div class="form-group">
            <label for="Idade">Idade</label>
            <input type="number" class="form-control" id="Idade" placeholder="Entre com o ID do Produto" required>
        </div>           
        <button type="button" class="btn btn-primary" id="alterar">Alterar</button>
        <button type="button" class="btn btn-primary" id="cancelar">Cancelar</button>
        <button type="reset" class="btn btn-primary" id="limpar">Limpar</button>
    </form>
</div>
<br>

