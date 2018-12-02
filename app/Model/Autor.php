<?php

namespace App\Model;


/**
 * Modelo dos Autores
 *
 * @package Model
 * @author  William Goebel
 * @since   02/10/2018
 */

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model {
    protected $table = 'autor';
    protected $fillable =array('autorcodigo', 'autoridade','autornome');
    protected $primaryKey = 'autorcodigo';
    public $timestamps = false;

    public function getAutores(){
        return self::all();
    }

    public function addAutor(){
        $input = Input::all();
        $Autor = new Autor($input); // mass assingment
        $Autor->save();
        return $Autor;
    }

    public function getAutor($id){
        $Autor = self::find($id);
        if(is_null($Autor)){
            return false;
        }
        return $Autor;
    }

    public function deletaAutor($id){
        $Autor = self::find($id);
        if(is_null($Autor)){
            return false;
        }
        return $Autor->delete();
    }

    public function atualizaAutor($id){
        $Autor = self::find($id);
        if(is_null($Autor)){
            return false;
        }
        $input = Input::all();
        $Autor->fill($input);
        $Autor->save();
        return $Autor;
    }
    
}