<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserEmployee extends Model
{
    
    protected $fillable = ['employee_group_id','user_id','first_name','last_name'];
    protected $table = 'user_employees';
    
}
