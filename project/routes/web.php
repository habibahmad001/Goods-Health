<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes(['register'=>false,'verify'=>true]);

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});


Route::middleware(['auth','checkloginstatus', 'checkpermission', 'sharemodules'])->prefix('{prefix}')->name('admin.')->group(function() {

	/*
    |--------------------------------------------------------------------------
    | General Routes
    |--------------------------------------------------------------------------
    |
    | These routes are related to business users.
    |
    */
	Route::get('/dashboard','DashboardController@index')->name('index');
	
	Route::get('/fast-access','FastAccessController@index')->name('fast-access');
	
	
	
	Route::get('/benefits-insurance-coverage','BenefitController@index')->name('insurance-benefits');

	Route::get('/insurance-options','InsuranceOptionsController@index')->name('insurance.options');

	Route::get('/reports','ReportClaimController@index')->name('reports');

	Route::get('/premium-payment-center','PaymentController@index')->name('payment.center');

	
	
	Route::get('/tickets','TicketsController@index')->name('tickets');
	
	Route::get('/bussiness-timesheet','BusinessTimesheetController@index')->name('bussiness.timesheet');

	Route::get('/agent-broker-center','AgentBrokerCenterController@index')->name('broker.center');
	
	Route::get('/claim-management','ClaimManagementController@index')->name('claim.management');

	Route::get('/page-management','PageManagementController@index')->name('page.management');

	Route::get('/site-management','SiteManagementController@index')->name('site.management');

	Route::get('/quote-management','QuoteManagementController@index')->name('quote.management');

	Route::get('/admin-center','AdminCenterController@index')->name('admincenter');
	
	Route::get('/get-policies-list-by-ajax/{state_code?}/{city_id?}/{zip_code?}/{id?}','UserCenterController@get_policies_list_by_ajax')->name('get-policies-list-by-ajax');
	
    /*
    |--------------------------------------------------------------------------
    | Carrier management
    |--------------------------------------------------------------------------
    |
    | These routes are related to product management.
    |
    */
    Route::get('/carrier-management/{type?}','CarrierManagementController@carrier_management_show')->name('carrier_management.show');
    Route::get('/carrier-load-add/','CarrierManagementController@carrier_add')->name('carrier_management.carrier.add');
    Route::get('/carrier-load-edit/{id?}','CarrierManagementController@carrier_edit')->name('carrier_management.carrier.edit');
    Route::post('/carrier-management-save','CarrierManagementController@store')->name('carrier_management.carrier.store');
    Route::post('/carrier-management-update','CarrierManagementController@update')->name('carrier_management.carrier.update');
    Route::post('/carrier-management-destroy','CarrierManagementController@destroy')->name('carrier_management.carrier.destroy');

    /*
    |--------------------------------------------------------------------------
    | Product management
    |--------------------------------------------------------------------------
    |
    | These routes are related to product management.
    |
    */
    Route::get('/product-management/{type?}','ProductManagementController@product_management_show')->name('product_management.show');
    Route::get('/product-load-add/','ProductManagementController@product_add')->name('product_management.product.add');
    Route::get('/product-load-edit/{id?}/{type?}','ProductManagementController@product_edit')->name('product_management.product.edit');
    Route::post('/product-management-save','ProductManagementController@store')->name('product_management.product.store');
    Route::post('/product-management-update','ProductManagementController@update')->name('product_management.product.update');
    Route::post('/product-management-destroy','ProductManagementController@destroy')->name('product_management.product.destroy');
    Route::get('/product-management-load-edit/{id?}/{type?}','ProductManagementController@product_management_edit')->name('product_management.benefits.edit');
    Route::post('/product-management-save-field-option','ProductManagementController@product_management_save_field_option')->name('product_management.save-field-options');

	/*
    |--------------------------------------------------------------------------
    | Profile Setting
    |--------------------------------------------------------------------------
    |
    | These routes are related to profile setting.
    |
    */
	Route::get('/profile','ProfileSettingController@view_profile')->name('view_profile');
	Route::get('/employee_search','ProfileSettingController@employee_search')->name('profile_section_employee_search');
    Route::get('/change_carrier_status/{user_id?}/{carrier_id?}/{status?}/{added_by?}','ProfileSettingController@change_carrier_status')->name('change_carrier_status');

	/*
    |--------------------------------------------------------------------------
    | Family/Group
    |--------------------------------------------------------------------------
    |
    | These routes are related to family/group.
    |
    */
	Route::get('/family-group','FamilyGroupController@show')->name('family-group');

	/*
    |--------------------------------------------------------------------------
    | File & Directory
    |--------------------------------------------------------------------------
    |
    | These routes are related to files & directory.
    |
    */
    Route::get('/directory','DirectoryController@index')->name('directory');

    Route::get('/files','FilesController@index')->name('files');
    Route::get('/get_file_section','FilesController@get_file_section')->name('get_file_section');
    Route::post('/save_file_request','FilesController@save_file_request_response')->name('save_file_request');
    Route::get('/file_list/{user_id?}/{request_id?}','FilesController@get_files_list')->name('file_list');
    Route::get('/change_file_request_status/{user_id?}/{request_id?}/{type?}/{request_type?}/{status?}','FilesController@change_file_request_status')->name('change_file_request_status');
    Route::get('/set_file_as_request_attachment/{user_id?}/{request_id?}/{type?}','FilesController@set_file_as_request_attachment')->name('set_file_as_request_attachment');
    Route::get('/edit_archive_library_file/{user_id?}/{request_id?}/{type?}','FilesController@edit_archive_library_file')->name('edit_archive_library_file');
    Route::get('/insert_pdf_meta_data_into_db','FilesController@insert_pdf_meta_data_into_db')->name('insert_pdf_meta_data_into_db');

	/*
    |--------------------------------------------------------------------------
    | Message Hub
    |--------------------------------------------------------------------------
    |
    | These routes are related to message hub.
    |
    */
    Route::get('/message/{request_type?}','MessageController@index')->name('message');
    Route::get('message_section/{request_type?}','MessageController@load_section')->name('message_section');
    Route::post('message-save','MessageController@save')->name('message.save');
    Route::get('message-action/{message_id?}/{action_for?}','MessageController@change_status')->name('message_action');
    Route::get('/message-user-search','MessageController@search_user')->name('search_user');
    Route::get('/message-details/{message_id?}/{request_type?}','MessageController@get_details')->name('message_details');

    /*
    |--------------------------------------------------------------------------
    | User Center
    |--------------------------------------------------------------------------
    |
    | These routes are related to user center.
    |
    */
    Route::get('/user-center','UserCenterController@index')->name('usercenter');
    Route::get('/load-user-center-list/{role_id?}','UserCenterController@load_user_center_list')->name('load_user_center_list');
    Route::get('user-center-add/{role_id?}','UserCenterController@add')->name('user_center_add');
    Route::get('user-center-edit/{id?}/{role_id?}','UserCenterController@edit')->name('user_center_edit');
    Route::post('user-center-save','UserCenterController@store')->name('user_center_save');
    Route::post('user-center-update','UserCenterController@update')->name('user_center_update');
    Route::post('user-center-delete','UserCenterController@destroy')->name('user_center.destroy');

	/*
    |--------------------------------------------------------------------------
    | Users Routes
    |--------------------------------------------------------------------------
    |
    | These routes are related to users.
    |
    */
    Route::get('user/{u_type?}/{used_in?}','UserController@show')->name('users.show');
    Route::get('user-add/{role_id?}/{used_in?}','UserController@add')->name('users.add');
    Route::get('user-edit/{id?}/{role_id?}/{user_id?}','UserController@edit')->name('users.edit');
    Route::post('user-save','UserController@store')->name('users.save');
    Route::post('user-update','UserController@update')->name('users.update');
    Route::post('user-update-detailed-info','UserController@update_detailed_info')->name('users.update_detailed_info');
	Route::post('user-delete','UserController@destroy')->name('users.destroy');

	Route::get('get_task_activity/{user_id?}','UserController@get_task_activity')->name('get_task_activity');
    Route::get('get_event_activity/{user_id?}','UserController@get_event_activity')->name('get_event_activity');
    Route::get('get_note_activity/{user_id?}','UserController@get_note_activity')->name('get_note_activity');

    Route::get('get_user_histories/{user_id?}','UserController@get_user_histories')->name('get_user_histories');

    Route::post('save_activity_data','UserController@save_activity_data')->name('save_activity_data');

    Route::get('go_to_profile/{user_id?}','UserController@go_to_profile')->name('go_to_profile');

	/*
    |--------------------------------------------------------------------------
    | Common Routes
    |--------------------------------------------------------------------------
    |
    | These routes are related to common routes.
    |
    */
    Route::post('/save_payment/','CommonController@save_payment')->name('save_payment');
    Route::get('get_payment_history/{id?}/{offset?}','CommonController@get_payment_history')->name('get_payment_history');

    Route::get('/broker_emp/{id?}','CommonController@get_broker_employee')->name('user.brokeragent');

    Route::get('/get_report_claim_section/{id?}','CommonController@get_report_claim_section')->name('get_report_claim_section');
    Route::post('/save_report_claim','CommonController@save_report_claim')->name('save_report_claim');
    Route::get('/get_policies_list/{id?}/{cat_id?}', 'CommonController@get_policies_list')->name('get_policies_list');
    Route::get('/load_apply_form/{id?}/{policy_id?}/{rc_id?}', 'CommonController@load_apply_form')->name('load_apply_form');
    Route::get('soft_delete_report_claim/{id?}/{status?}','CommonController@soft_delete_report_claim')->name('soft_delete_report_claim');

    Route::get('/show_benefits/{id?}','CommonController@show_benefits')->name('show_benefits');

    Route::get('/insurance-options/{user_id?}/{id?}','CommonController@get_insurance_options')->name('get_insurance_options');
	Route::get('/insurance-options-details/{id?}','CommonController@get_insurance_options_details')->name('get_insurance_options_details');

    Route::get('/get_user_list/{role_id?}/{state?}/{city?}/{zipcode?}','CommonController@get_user_list')->name('get_user_list');

    Route::get('/get-cities-list/{state_code?}','CommonController@get_cities_list')->name('get-cities-list');
    Route::get('/get-zipcodes-list/{city_id?}','CommonController@get_zipcodes_list')->name('get-zipcodes-list');
    Route::get('/get-county/{zip_id?}','CommonController@get_county')->name('get-county');

    Route::get('/check-user-exist/{data?}/{type?}','CommonController@check_username_email_exists')->name('check-user-exist');
    
    Route::get('load_calendar_data/{keyword?}/{module_id?}/{show_n?}/{show_t?}/{show_e?}','CommonController@load_calendar_data')->name('load_calendar_data');

    Route::post('save_task_event_data','CommonController@save_task_event_data')->name('save_task_event_data');

    Route::get('load_activity_form_data/{actity_type?}/{action_from?}/{action_type?}/{user_id?}/{activity_id?}', 'CommonController@get_activity_form_data')->name('load_activity_form_data');

    Route::get('load_calender_notification_list/{date_time?}/{keyword?}/{module_id?}/{show_n?}/{show_t?}/{show_e?}', 'CommonController@get_calender_notification_list')->name('load_calender_notification_list');

    Route::post('delete_activity_data','CommonController@delete_activity_data')->name('delete_activity_data');
    Route::get('get_user_details_by_email/{email?}','CommonController@get_user_details_by_email')->name('get_user_details_by_email');

    Route::get('/get_carrier_list/{state?}/{city?}/{zipcode?}','CommonController@get_carrier_list')->name('get_carrier_list');
    
    Route::post('/get_cities_list_for_multiple_state','CommonController@get_cities_list_for_multiple_state')->name('get_cities_list_for_multiple_state');

    Route::post('/get_zipcode_list_for_multiple_city','CommonController@get_zipcode_list_for_multiple_city')->name('get_zipcode_list_for_multiple_city');

    Route::post('/get_county_list_for_multiple_zipcode','CommonController@get_county_list_for_multiple_zipcode')->name('get_county_list_for_multiple_zipcode');

    Route::get('/get-carrier-details/{id?}','CommonController@get_carrier_detail')->name('get_carrier_detail');
    
	/*
    |--------------------------------------------------------------------------
    | Datatables Routes
    |--------------------------------------------------------------------------
    |
    | These routes are related to datatable routes.
    |
    */
    Route::get('/get_file_list_datatables/{id?}/{type?}','FilesController@get_file_list_datatables')->name('get_file_list_datatables');
    Route::get('/get_report_claim_list_datatables/{id?}','CommonController@get_report_claim_list_datatables')->name('get_report_claim_list_datatables');

    Route::get('/user_list_datatables/{role_id?}/{provider?}/{parent_status?}', 'UserController@user_list_datatables')->name('user_list_datatables');

    Route::get('/message_list_datatables/{request_type?}', 'MessageController@message_list_datatables')->name('message_list_datatables');

    Route::get('/user_center_list_datatables/{role_id?}', 'UserCenterController@user_center_list_datatables')->name('user_center_list_datatables');

    Route::get('/family_group_list_datatables', 'FamilyGroupController@family_group_list_datatables')->name('family_group_list_datatables');
    Route::get('/profile_setting_carrier_list_datatables/{user_id?}', 'ProfileSettingController@profile_setting_carrier_list_datatables')->name('profile_setting_carrier_list_datatables');
    Route::get('/get_archive_file_list_datatables/{id?}','FilesController@get_archive_file_list_datatables')->name('get_archive_file_list_datatables');

    Route::get('/carrier_product_list_datatables', 'ProductManagementController@carrier_product_list_datatables')->name('carrier_product_list_datatables');
    Route::get('/carrier_management_list_datatables', 'CarrierManagementController@carrier_management_list_datatables')->name('carrier_management_list_datatables');
    

});


Route::middleware('auth')->group(function(){
	Route::get('profile/change-password','ChangePasswordController@show')->name('password.show');
	Route::post('profile/change-password','ChangePasswordController@changePassword')->name('change.password');
});




//use route fallback when route is not fined
/*Route::fallback(function () {
    return view('admin.index');
});
*/

Route::get('/home', 'HomeController@index')->name('home');

