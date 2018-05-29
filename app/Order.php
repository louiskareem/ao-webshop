<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	/**
	 * [order_details description]
	 * @return [type] [description]
	 */
    public function order_details()
    {
    	return $this->hasMany('App\OrderDetail');
    }

    /**
     * [client description]
     * @return [type] [description]
     */
    public function client()
    {
    	return $this->belongsTo('App\Client');
    }

}
