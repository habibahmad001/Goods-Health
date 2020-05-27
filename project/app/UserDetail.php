<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
	protected $fillable = ['user_id'];
    protected $table = 'user_details';

    public function siteuser()
    {
    	return $this->belongsTo('App\SiteUser');
    }
}
