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

    /**
     * [order_detail description]
     * @return [type] [description]
     */
    public function order_detail()
    {
    	return $this->hasMany('App\OrderDetail');
    }

    /**
     * [getId. Static method to return product with an ID]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public static function getId($id)
    {
        $product = Product::where('id', '=', $id)->first();

        return $product;
    }
}
