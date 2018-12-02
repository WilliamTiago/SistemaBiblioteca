<?php
//William Goebel
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Model\Livro;
use Illuminate\Http\Request;

class LivroController extends BaseController {
    private $livro = null;

        public function __construct(Livro $livro){
            $this->Livro = $livro;
        }

        public function getLivros(){
            return response()->json($this->Livro->getLivros(),200)
                ->header("Content-Type","aplication/json");
        }

        public function getLivro($id){
            $livro= $this->Livro->getLivro($id);
            if(!$livro){
                return response()->json(['response','Livro não encontarda'],400)
                ->header("Content-Type","aplication/json");
            }
            return response()->json($livro,200)
                ->header("Content-Type","aplication/json");
        }

        public function addLivro(){
            return response()->json($this->Livro->addLivro(),201)->header("Content-Type","aplication/json");
        }

        public function atualizaLivro($id){
            $livro= $this->Livro->atualizaLivro($id);
            if(!$livro){
                return response()->json(['response','Livro não encontarda'],400)->header("Content-Type","aplication/json");
            }
            return response()->json($livro,200)->header("Content-Type","aplication/json");
        }  

        public function deletaLivro($id){
            $livro= $this->Livro->deletaLivro($id);
            if(!$livro){
                return response()->json(['response','Livro não encontarda'],200)
                ->header("Content-Type","aplication/json");
            }
        }
}