<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    
    protected $primaryKey = 'product_id';  //como não chamei minha PK de "id", preciso indicar para o Eloquent qual é minha PK

    protected $fillable = ['nome','preco','provider_id']; //apenas nome e preço são mass assignable

    
    protected $dates = ['deleted_at'];


//    public function fornecedor(){
//        return $this->belongsTo('App\Provider', 'product_id');
//    }


}
