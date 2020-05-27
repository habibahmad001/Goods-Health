<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFamilyGroup extends Model
{
    
    protected $fillable = ['user_id','first_name','last_name'];
    protected $table = 'user_family_groups';
    
    public function siteuser()
    {
    	return $this->belongsTo('App\SiteUser');
    }
}