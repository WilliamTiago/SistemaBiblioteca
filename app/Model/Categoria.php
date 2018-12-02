<?php

namespace App\Model;


/**
 * Modelo dos Categorias
 *
 * @package Model
 * @author  William Goebel
 * @since   02/10/2018
 */

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model {
    protected $table = 'categoria';
    protected $fillable =array('categoriacodigo', 'categoriadescricao');
    protected $primaryKey = 'categoriacodigo';
    public $timestamps = false;

    public function getCategorias(){
        return self::all();
    }

    public function addCategoria(){
        $input = Input::all();
        $Categoria = new Categoria($input); // mass assingment
        $Categoria->save();
        return $Categoria;
    }

    public function getCategoria($id){
        $Categoria = self::find($id);
        if(is_null($Categoria)){
            return false;
        }
        return $Categoria;
    }

    public function deletaCategoria($id){
        $Categoria = self::find($id);
        if(is_null($Categoria)){
            return false;
        }
        return $Categoria->delete();
    }

    public function atualizaCategoria($id){
        $Categoria = self::find($id);
        if(is_null($Categoria)){
            return false;
        }
        $input = Input::all();
        $Categoria->fill($input);
        $Categoria->save();
        return $Categoria;
    }
    
}