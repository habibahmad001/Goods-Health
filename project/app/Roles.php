<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
   	public function siteuser()
    {
        return $this->hasOne('App\SiteUser');
    }
}
