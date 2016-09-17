<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes; //**necessário para usar softDeletes com sucesso

class Product extends Model
{
    use SoftDeletes; //**necessário para usar softDeletes com sucesso

    
    protected $primaryKey = 'product_id';  //como não chamei minha PK de "id", preciso indicar para o Eloquent qual é minha PK

    protected $fillable = ['nome','preco']; //apenas nome e preço são mass assignable

    
    protected $dates = ['deleted_at']; //**necessário para usar softDeletes com sucesso
}
