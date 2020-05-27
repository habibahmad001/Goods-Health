<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDms extends Model
{
    protected $table= 'user_dms';
    protected $fillable = ['user_id'] ;

    public function siteuser()
    {
    	return $this->belongsTo('App\SiteUser');
    }
}
