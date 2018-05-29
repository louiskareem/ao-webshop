<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
	/**
	 * [order description]
	 * @return [type] [description]
	 */
    public function order()
    {
    	return $this->belongsTo('App\Order');
    }

    /**
     * [product description]
     * @return [type] [description]
     */
    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
}
