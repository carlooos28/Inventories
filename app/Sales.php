<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $fillable = ['product_id', 'quantity','price','status'];
	
	public function product()
    {
        return $this->belongsTo('App\Product');
    }

	public function supplier()
    {
        return $this->belongsToMany('App\Supplier', 'products', 'id', 'id');
	}    	
}