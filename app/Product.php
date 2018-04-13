<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	/**
	 * [categories description]
	 * @return [type] [description]
	 */
    public function categories()
    {
    	return $this->belongsToMany('App\Category');
    }

    public function order_detail()
    {
    	return $this->hasMany('App\OrderDetail');
    }
}
