<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $guarded = ['id'];

    public function produtos(){
        $this->belongsToMany('App\Product')->withPivot('preco', 'estoque');;
    }
}
