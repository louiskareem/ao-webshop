<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	/**
	 * [orders description]
	 * @return [type] [description]
	 */
    public function orders()
    {
    	return $this->hasMany('App\Order');
    }

    /**
     * [user description]
     * @return [type] [description]
     */
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    /**
     * [addUserId description]
     * @param [type] $user_id [description]
     */
    public static function addUserId($user_id)
    {
    	$client = Client::where('user_id', '=', $user_id)->first();

    	if ($client === NULL) {
    		$client = new Client;
    		$client->user_id = $user_id;
    		$client->save();
    	}

    	return $client;
    }
}
