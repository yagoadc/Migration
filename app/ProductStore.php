<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStore extends Model
{
    protected $table = 'product_store';

    public $timestamps = false;

    protected $guarded = [];
}
