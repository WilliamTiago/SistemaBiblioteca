<?php

namespace App\Model;


/**
 * Modelo dos Livroes
 *
 * @package Model
 * @author  William Goebel
 * @since   02/10/2018
 */

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model {
    protected $table = 'livro';
    protected $fillable =array('autorcodigo','categoriacodigo','livroano','livrotitulo','livrocodigo', 'livroano');
    protected $primaryKey = 'livrocodigo';
    public $timestamps = false;

    public function getLivros(){
        return self::all();
    }
    
    public function addLivro(){
        $input = Input::all();
        $Livro = new Livro($input); // mass assingment
        $Livro->save();
        return $Livro;
    }

    public function getLivro($id){
        $Livro = self::find($id);
        if(is_null($Livro)){
            return false;
        }
        return $Livro;
    }

    public function deletaLivro($id){
        $Livro = self::find($id);
        if(is_null($Livro)){
            return false;
        }
        return $Livro->delete();
    }

    public function atualizaLivro($id){
        $Livro = self::find($id);
        if(is_null($Livro)){
            return false;
        }
        $input = Input::all();
        $Livro->fill($input);
        $Livro->save();
        return $Livro;
    }    
}