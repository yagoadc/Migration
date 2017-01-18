<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome','cod_barras','fabricante','provider_id'];

    protected $dates = ['deleted_at'];


    public function fornecedor(){
        return $this->belongsTo('App\Provider', 'provider_id');
    }

    public function lojas(){
        return $this->belongsToMany('App\Store')->withPivot('preco', 'estoque');;
    }


}
