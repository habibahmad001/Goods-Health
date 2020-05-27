<?php
use Illuminate\Support\Facades\DB;

function get_role_name($role_id){
	$role_data = DB::table('roles')->where('id', $role_id)->first();

	return ucwords(strtolower($role_data->role_name));
}

function get_role_slug($role_id){
	$role_data = DB::table('roles')->where('id', $role_id)->first();
	
	return $role_data->role_slug;
}