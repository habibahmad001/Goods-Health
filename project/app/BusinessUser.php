<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessUser extends Model
{
    protected $fillable = ['user_id'];
    protected $table = 'business_user_details';

    public function siteuser()
    {
    	return $this->belongsTo('App\SiteUser');
    }
}
