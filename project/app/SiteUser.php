<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteUser extends Model
{
    protected $fillable = ['name','parent_user_id','username','email','country','state','city','zipcode','county','company','phone_number','role_id','password','status','access_link','security_question_one','answer_one','security_question_two','answer_two','agent_name','agent_email','broker_user_id','provider_user_id','dashboard_access'];
    protected $table = 'users';

    public function roles()
    {
        return $this->belongsTo('App\Roles','role_id');
    }

    public function user_details()
    {
    	return $this->hasOne('App\UserDetail','user_id');
    }

    public function user_customer_details()
    {
        return $this->hasOne('App\UserFamilyGroup','user_id');
    }

    public function user_documents()
    {
    	return $this->hasOne('App\UserDms','user_id')->where('status',1);
    }

    public function business_user_details()
    {
    	return $this->hasOne('App\BusinessUser','user_id');
    }


}
