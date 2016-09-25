<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Provider extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome', 'cnpj'];

    protected $dates = ['deleted_at'];

    public function produtos(){
        return $this->hasMany('App\Product');
    }
}
