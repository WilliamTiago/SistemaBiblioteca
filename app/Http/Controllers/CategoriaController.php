<?php
//William Goebel
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Model\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends BaseController {
    private $categoria = null;

        public function __construct(Categoria $categoria){
            $this->categoria = $categoria;
        }

        public function getCategorias(){
            return response()->json($this->categoria->getCategorias(),200)
                ->header("Content-Type","aplication/json");
        }

        public function getCategoria($id){
            $categoria= $this->categoria->getCategoria($id);
            if(!$categoria){
                return response()->json(['response','categoria não encontarda'],400)
                ->header("Content-Type","aplication/json");
            }
            return response()->json($categoria,200)
                ->header("Content-Type","aplication/json");
        }

        public function addCategoria(){
            return response()->json($this->categoria->addCategoria(),200)->header("Content-Type","aplication/json");
        }

        public function atualizaCategoria($id){
            $categoria= $this->categoria->atualizaCategoria($id);
            if(!$categoria){
                return response()->json(['response','categoria não encontarda'],400)->header("Content-Type","aplication/json");
            }
            return response()->json($categoria,200)->header("Content-Type","aplication/json");
        }  

        public function deletaCategoria($id){
            $categoria= $this->categoria->deletaCategoria($id);
            if(!$categoria){
                return response()->json(['response','categoria não encontarda'],200)
                ->header("Content-Type","aplication/json");
            }
        }
}