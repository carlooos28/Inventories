<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailProduct extends Model
{
    protected $fillable = ['supplier_id', 'product_id', 'quantity','lote', 'expiration_date','price'];
}
