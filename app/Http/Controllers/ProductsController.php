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
            //var_dump($p);
            $str_tokens = explode('.',strval($p->preco));
            if(strlen($str_tokens[1]) == 1){
                $str_tokens[1] = $str_tokens[1]."0";
            }
            $p->merge(['preco' => implode(',',$str_tokens)]);
        }

        return view('produtos',['products' => $products]);
    }
}
