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
            foreach($p->lojas as $l){
                if($l->pivot->preco){
                    if(gettype($l->pivot->preco) == 'integer'){
                        $l->pivot->preco = $l->pivot->preco.',00';
                    }

                    $str_tokens = explode('.',strval($l->pivot->preco));

                    if(count($str_tokens) < 2){
                        array_push($str_tokens,"00");
                    }elseif(strlen($str_tokens[1]) == 1){
                        $str_tokens[1] = $str_tokens[1]."0";
                    }

                    $preco_format = implode(',',$str_tokens);
                    $l->pivot->preco = $preco_format;
                }else{
                    $l->pivot->preco = '0,00';
                }

            }
        }

        return view('produtos',['products' => $products]);
    }
}
