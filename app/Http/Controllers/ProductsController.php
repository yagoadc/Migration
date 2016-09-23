<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests;




class ProductsController extends Controller
{
    public function index(){

        $products = Product::all();

        foreach($products as $p){



            if($p->preco){
                if(gettype($p->preco) == 'integer'){
                    $p->preco = $p->preco.',00';
                }

                $str_tokens = explode('.',strval($p->preco));

                if(count($str_tokens) < 2){
                    array_push($str_tokens,"00");
                }elseif(strlen($str_tokens[1]) == 1){
                    $str_tokens[1] = $str_tokens[1]."0";
                }

                $preco_format = implode(',',$str_tokens);
                $p->preco = $preco_format;
            }else{
                $p->preco = '0,00';
            }
        }



        return view('produtos',['products' => $products]);
    }
}
