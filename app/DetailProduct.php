<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailProduct extends Model
{
    protected $fillable = ['product_id', 'quantity','lote', 'expiration_date','price'];
}
