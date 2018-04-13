<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	/**
	 * [products description]
	 * @return [type] [description]
	 */
    public function products()
    {
    	return $this->belongsToMany('App\Product');
    }
}
