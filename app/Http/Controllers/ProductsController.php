<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests;




class ProductsController extends Controller
{
    public function index(){

        $products = Product::all();

        return view('produtos',['products' => $products]);
    }
}
