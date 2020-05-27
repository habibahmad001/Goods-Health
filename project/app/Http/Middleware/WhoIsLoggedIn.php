<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
//use Illuminate\Http\Request;
//use Illuminate\Routing\Route;
class WhoIsLoggedIn
{
    /*public $module_action_name = array(
            '0' => array('modulename'=>'AdminController','methodname'=>'index','role_id'=>'1'),
            '1' => array('modulename'=>'AdminController','methodname'=>'fast_access','role_id'=>'1'),
            '1' => array('modulename'=>'AdminController','methodname'=>'fast_access','role_id'=>'2'),
            '2' => array('modulename'=>'SiteUserController','methodname'=>'fast_access','role_id'=>'2'),
            '3' => array('modulename'=>'SiteUserController','methodname'=>'index','role_id'=>'2'),
        );*/

        public $module_assignment = array(
            'DashboardController@index' => [1],
            'AdminController@index'=>array(1),
            'AdminController@fast_access'=>array(1),
            
            'InsuranceCarrierManagementController@show'=>array(1),
            'InsuranceCarrierManagementController@show_add_carrier'=>array(1),
            
            'SiteUserController@update'=>array(1),
            'SiteUserController@store'=>array(1),
            
            'BusinessUserController@index'=>array(1),
            'BusinessUserController@show_employee_page'=>array(1),
            'BusinessUserController@store_employee'=>array(1),
            'BusinessUserController@employee_edit'=>array(1),
            'BusinessUserController@employee_update'=>array(1),
            'BusinessUserController@update'=>array(1),
            'BusinessUserController@store'=>array(1),
            'BusinessUserController@destroy'=>array(1),
            'BusinessUserController@employee_destroy'=>array(1),
            
            'SiteUserController@destroy'=>array(1),
            'SiteUserController@set_document_status'=>array(1),
            
            'AdminController@family_group'=>array(1),
            'AdminController@message'=>array(1),
            'AdminController@benefits_insurance_coverage'=>array(1),
            'AdminController@files'=>array(1),
            'AdminController@insurance_options'=>array(1),
            'AdminController@report_claim'=>array(1),
            'AdminController@payments'=>array(1),
            
            'CustomerController@index'=>array(1,2),
            'CustomerController@fast_access'=>array(2),
            'CustomerController@family_group'=>array(2),
            
            'BusinessController@index'=>array(1,3),
            'BusinessController@fast_access'=>array(3),
            'BusinessController@family_group'=>array(3),
            
            'ProviderController@index'=>array(1,4),
            'ProviderController@fast_access'=>array(4),
            'ProviderController@family_group'=>array(4),
            
            'BrokerAgencyFlatController@index'=>array(1,5),
            'BrokerAgencyFlatController@fast_access'=>array(5),
            'BrokerAgencyFlatController@family_group'=>array(5),
            'BrokerAgencyFranchiseController@index'=>array(1,6),
            'BrokerAgencyFranchiseController@fast_access'=>array(6),
            'BrokerAgencyFranchiseController@family_group'=>array(6),
            
            'UserCenterController@index'=>array(1),
            'UserCenterController@set_session'=>array(1),
            'UserCenterController@store'=>array(1),
            'UserCenterController@edit'=>array(1),
            'UserCenterController@update'=>array(1),
            'UserCenterController@destroy'=>array(1),
            'UserCenterController@get_parent_users_list'=>array(1),
            'UserCenterController@get_county_by_ajax'=>array(1),
            'UserCenterController@get_cities_by_ajax'=>array(1),
            'UserCenterController@get_insurance_options'=>array(1),
            'UserCenterController@get_insurance_options_details'=>array(1),
            'UserCenterController@get_user_details_by_email'=>array(1),
            
            'InsuranceCarrierManagementController@get_multiple_cities_by_ajax'=>array(1),
            'InsuranceCarrierManagementController@get_multiple_zipcodes_by_ajax'=>array(1),
            'InsuranceCarrierManagementController@get_multiple_county_by_ajax'=>array(1),
            'InsuranceCarrierManagementController@store'=>array(1),
            'InsuranceCarrierManagementController@edit'=>array(1),
            'InsuranceCarrierManagementController@update'=>array(1),
            'InsuranceCarrierManagementController@destroy'=>array(1),
            
            'InsuranceCarrierProductManagementController@show'=>array(1),
            'InsuranceCarrierProductManagementController@show_add_carrier_product'=>array(1),
            'InsuranceCarrierProductManagementController@get_cities_by_ajax'=>array(1),
            'InsuranceCarrierProductManagementController@get_zipcodes_by_ajax'=>array(1),
            'InsuranceCarrierProductManagementController@get_county_by_ajax'=>array(1),
            'InsuranceCarrierProductManagementController@get_carrier_detail_by_ajax'=>array(1),
            'InsuranceCarrierProductManagementController@store'=>array(1),
            'InsuranceCarrierProductManagementController@edit'=>array(1),
            'InsuranceCarrierProductManagementController@update'=>array(1),
            'InsuranceCarrierProductManagementController@destroy'=>array(1),
            'InsuranceCarrierProductManagementController@file_destroy'=>array(1),
            'InsuranceCarrierProductManagementController@store_product_files'=>array(1),
            'InsuranceCarrierProductManagementController@show_carrier_table_by_ajax'=>array(1),
            'InsuranceCarrierProductManagementController@show_add_carrier_product_files'=>array(1),
            
            'UserCenterController@get_zipcodes_by_ajax'=>array(1),
            'UserCenterController@get_selected_state_by_ajax'=>array(1),
            'UserCenterController@get_policies_list_by_ajax'=>array(1),
            'UserCenterController@get_access_products_by_ajax'=>array(1),
            'UserCenterController@check_username_exists'=>array(1),
            'UserCenterController@check_email_exists'=>array(1),
            
            'CustomerController@edit'=>array(1,2),
            'CustomerController@show'=>array(1,2),
            'CustomerController@create'=>array(1,2),
            
            'AdminEmployeeController@index'=>array(7,2),
            
            'BrokerAgencyEmployeeController@index'=>array(8,2),
            
            'ProviderEmployeeController@index'=>array(9,2),
            
            'BusinessEmployeeController@index'=>array(10,2),

            'ProviderUserController@show_employee_page'=>array(1),
            'ProviderUserController@store_employee'=>array(1),
            'ProviderUserController@employee_edit'=>array(1),
            'ProviderUserController@employee_update'=>array(1),
            'ProviderUserController@store'=>array(1),
            'ProviderUserController@destroy'=>array(1),
            'ProviderUserController@employee_destroy'=>array(1),

            'UserController@show' => [1],
            'UserController@user_list_datatables' => [1],
            'UserController@add' => [1],
            'UserController@edit' => [1],
            'UserController@store' => [1],
            'UserController@update' => [1],
            'UserController@destroy' => [1],

            'CommonController@save_file_request_response'=>array(1),
            'CommonController@get_file_section'=>array(1),
            'CommonController@get_file_list_datatables'=>array(1),
            'CommonController@get_report_claim_section'=>array(1),
            'CommonController@save_report_claim'=>array(1),
            'CommonController@get_report_claim_list_datatables'=>array(1),
            'CommonController@get_policies_list'=>array(1),
            'CommonController@load_apply_form'=>array(1), 
            'CommonController@get_broker_employee'=>array(1),
            'CommonController@save_payment'=>array(1),
            'CommonController@get_payment_history'=>array(1),
            'CommonController@soft_delete_report_claim'=>array(1),
            'CommonController@show_benefits'=>array(1),
        );

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $routeArray = app('request')->route()->getAction();
        $role_id = Auth::user()->role_id;
        $controllerAction = class_basename($routeArray['controller']);

        if(in_array($role_id, $this->module_assignment["$controllerAction"])){
            return $next($request); 
        } else {
            abort(403, 'Access denied');
            exit();
        } 
    }
}
