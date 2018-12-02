<?php
//William Goebel
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Model\Autor;
use Illuminate\Http\Request;

class AutorController extends BaseController {
    private $autor = null;

        public function __construct(Autor $autor){
            $this->Autor = $autor;
        }

        public function getAutores(){
            return response()->json($this->Autor->getAutores(),200)
                ->header("Content-Type","aplication/json");
        }

        public function getAutor($id){
            $autor= $this->Autor->getAutor($id);
            if(!$autor){
                return response()->json(['response','Autor não encontarda'],400)
                ->header("Content-Type","aplication/json");
            }
            return response()->json($autor,200)
                ->header("Content-Type","aplication/json");
        }

        public function addAutor(){
            return response()->json($this->Autor->addAutor(),201)->header("Content-Type","aplication/json");
        }

        public function atualizaAutor($id){
            $autor= $this->Autor->atualizaAutor($id);
            if(!$autor){
                return response()->json(['response','Autor não encontarda'],400)->header("Content-Type","aplication/json");
            }
            return response()->json($autor,200)->header("Content-Type","aplication/json");
        }  

        public function deletaAutor($id){
            $autor= $this->Autor->deletaAutor($id);
            if(!$autor){
                return response()->json(['response','Autor não encontarda'],200)
                ->header("Content-Type","aplication/json");
            }
        }
}