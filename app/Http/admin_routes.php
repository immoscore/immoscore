<?php

/* ================== Homepage ================== */
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/signin', 'SigninController@index');
Route::get('/signup', 'SignupController@index');
Route::post('/signup/savedata', 'SignupController@savedata');
Route::post('/signup/change_password', 'SignupController@change_password');
Route::get('/signup/varify_email', 'SignupController@varify_email');
Route::get('/forgot_password', 'Forgot_passwordController@index');
Route::get('/forgot_password/reset/{id}', 'Forgot_passwordController@reset');
Route::get('/signup/test_email', 'SignupController@test_email');

Route::auth();

/* ================== Access Uploaded Files ================== */
Route::get('files/{hash}/{name}', 'LA\UploadsController@get_file');

/*
|--------------------------------------------------------------------------
| Admin Application Routes
|--------------------------------------------------------------------------
*/

$as = "";
if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
	$as = config('laraadmin.adminRoute').'.';

	// Routes for Laravel 5.3
	Route::get('/logout', 'Auth\LoginController@logout');
}

Route::group(['as' => $as, 'middleware' => ['auth', 'permission:ADMIN_PANEL']], function () {

	/* ================== Dashboard ================== */

	Route::get(config('laraadmin.adminRoute'), 'LA\DashboardController@index');
	Route::get(config('laraadmin.adminRoute'). '/dashboard', 'LA\DashboardController@index');

	/* ================== Users ================== */
	Route::resource(config('laraadmin.adminRoute') . '/users', 'LA\UsersController');
	Route::get(config('laraadmin.adminRoute') . '/user_dt_ajax', 'LA\UsersController@dtajax');

	/* ================== Uploads ================== */
	Route::resource(config('laraadmin.adminRoute') . '/uploads', 'LA\UploadsController');
	Route::post(config('laraadmin.adminRoute') . '/upload_files', 'LA\UploadsController@upload_files');
	Route::get(config('laraadmin.adminRoute') . '/uploaded_files', 'LA\UploadsController@uploaded_files');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_caption', 'LA\UploadsController@update_caption');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_filename', 'LA\UploadsController@update_filename');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_public', 'LA\UploadsController@update_public');
	Route::post(config('laraadmin.adminRoute') . '/uploads_delete_file', 'LA\UploadsController@delete_file');

	/* ================== Roles ================== */
	Route::resource(config('laraadmin.adminRoute') . '/roles', 'LA\RolesController');
	Route::get(config('laraadmin.adminRoute') . '/role_dt_ajax', 'LA\RolesController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/save_module_role_permissions/{id}', 'LA\RolesController@save_module_role_permissions');

	/* ================== Permissions ================== */
	Route::resource(config('laraadmin.adminRoute') . '/permissions', 'LA\PermissionsController');
	Route::get(config('laraadmin.adminRoute') . '/permission_dt_ajax', 'LA\PermissionsController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/save_permissions/{id}', 'LA\PermissionsController@save_permissions');

	/* ================== Departments ================== */
	Route::resource(config('laraadmin.adminRoute') . '/departments', 'LA\DepartmentsController');
	Route::get(config('laraadmin.adminRoute') . '/department_dt_ajax', 'LA\DepartmentsController@dtajax');

	/* ================== Employees ================== */
	Route::resource(config('laraadmin.adminRoute') . '/employees', 'LA\EmployeesController');
	Route::get(config('laraadmin.adminRoute') . '/employee_dt_ajax', 'LA\EmployeesController@dtajax');

	/* ================== Organizations ================== */
	Route::resource(config('laraadmin.adminRoute') . '/organizations', 'LA\OrganizationsController');
	Route::get(config('laraadmin.adminRoute') . '/organization_dt_ajax', 'LA\OrganizationsController@dtajax');

	/* ================== Backups ================== */
	Route::resource(config('laraadmin.adminRoute') . '/backups', 'LA\BackupsController');
	Route::get(config('laraadmin.adminRoute') . '/backup_dt_ajax', 'LA\BackupsController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/create_backup_ajax', 'LA\BackupsController@create_backup_ajax');
	Route::get(config('laraadmin.adminRoute') . '/downloadBackup/{id}', 'LA\BackupsController@downloadBackup');












	/* ================== Profiles ================== */
	Route::resource(config('laraadmin.adminRoute') . '/profiles', 'LA\ProfilesController');
        Route::post(config('laraadmin.adminRoute') . '/change_password/{id}', 'LA\UsersController@change_password');










	/* ================== UDP_Reached_Details ================== */
	Route::resource(config('laraadmin.adminRoute') . '/udp_reached_details', 'LA\UDP_Reached_DetailsController');
	Route::get(config('laraadmin.adminRoute') . '/udp_reached_detail_dt_ajax', 'LA\UDP_Reached_DetailsController@dtajax');










	Route::get(config('laraadmin.adminRoute') . '/dphrmis_reports_export_excel', 'LA\Dphrmis_ReportsController@export_excel');


	/* ================== My_Profiles ================== */
	Route::resource(config('laraadmin.adminRoute') . '/my_profiles', 'LA\My_ProfilesController');
	Route::get(config('laraadmin.adminRoute') . '/my_profile_dt_ajax', 'LA\My_ProfilesController@dtajax');
	Route::get(config('laraadmin.adminRoute') . '/my_profiles/{profile_details}', 'LA\My_ProfilesController@profile_details');
	Route::get(config('laraadmin.adminRoute') . '/my_profiles/tenant_details/{tenant_details}', 'LA\My_ProfilesController@tenant_details');
	Route::get(config('laraadmin.adminRoute') . '/my_profiles/detail_store', 'LA\My_ProfilesController@detail_store');

	/* ================== Universities ================== */
	Route::resource(config('laraadmin.adminRoute') . '/universities', 'LA\UniversitiesController');
	Route::get(config('laraadmin.adminRoute') . '/university_dt_ajax', 'LA\UniversitiesController@dtajax');

	/* ================== Employers ================== */
	Route::resource(config('laraadmin.adminRoute') . '/employers', 'LA\EmployersController');
	Route::get(config('laraadmin.adminRoute') . '/employer_dt_ajax', 'LA\EmployersController@dtajax');

	/* ================== Rental_Histories ================== */
	Route::resource(config('laraadmin.adminRoute') . '/rental_histories', 'LA\Rental_HistoriesController');
	Route::get(config('laraadmin.adminRoute') . '/rental_history_dt_ajax', 'LA\Rental_HistoriesController@dtajax');


	/* ================== Visit_Applications ================== */
	Route::resource(config('laraadmin.adminRoute') . '/visit_applications', 'LA\Visit_ApplicationsController');
	Route::get(config('laraadmin.adminRoute') . '/visit_application_dt_ajax', 'LA\Visit_ApplicationsController@dtajax');

	/* ================== Payment_Details ================== */
	Route::resource(config('laraadmin.adminRoute') . '/payment_details', 'LA\Payment_DetailsController');
	Route::get(config('laraadmin.adminRoute') . '/payment_detail_dt_ajax', 'LA\Payment_DetailsController@dtajax');

	/* ================== Quittances ================== */
	Route::resource(config('laraadmin.adminRoute') . '/quittances', 'LA\QuittancesController');
	Route::get(config('laraadmin.adminRoute') . '/quittance_dt_ajax', 'LA\QuittancesController@dtajax');

	/* ================== Share_Applications ================== */
	Route::resource(config('laraadmin.adminRoute') . '/share_applications', 'LA\Share_ApplicationsController');
	Route::get(config('laraadmin.adminRoute') . '/share_application_dt_ajax', 'LA\Share_ApplicationsController@dtajax');

	/* ================== Document_Ids ================== */
	Route::resource(config('laraadmin.adminRoute') . '/document_ids', 'LA\Document_IdsController');
	Route::get(config('laraadmin.adminRoute') . '/document_id_dt_ajax', 'LA\Document_IdsController@dtajax');

	/* ================== My_properties ================== */
	Route::resource(config('laraadmin.adminRoute') . '/my_properties', 'LA\My_propertiesController');
	Route::get(config('laraadmin.adminRoute') . '/my_property_dt_ajax', 'LA\My_propertiesController@dtajax');
	Route::get(config('laraadmin.adminRoute') . '/get_owner_address', 'LA\My_propertiesController@get_owner_address');

	/* ================== Upcoming_Visits ================== */
	Route::resource(config('laraadmin.adminRoute') . '/upcoming_visits', 'LA\Upcoming_VisitsController');
	Route::get(config('laraadmin.adminRoute') . '/upcoming_visit_dt_ajax', 'LA\Upcoming_VisitsController@dtajax');

	/* ================== Post_visits ================== */
	Route::resource(config('laraadmin.adminRoute') . '/post_visits', 'LA\Post_visitsController');
	Route::get(config('laraadmin.adminRoute') . '/post_visit_dt_ajax', 'LA\Post_visitsController@dtajax');

	/* ================== Apply_Applications ================== */
	Route::resource(config('laraadmin.adminRoute') . '/apply_applications', 'LA\Apply_ApplicationsController');
	Route::get(config('laraadmin.adminRoute') . '/apply_application_dt_ajax', 'LA\Apply_ApplicationsController@dtajax');

	/* ================== Visits ================== */
	Route::resource(config('laraadmin.adminRoute') . '/visits', 'LA\VisitsController');
	Route::get(config('laraadmin.adminRoute') . '/visit_dt_ajax', 'LA\VisitsController@dtajax');

	/* ================== Searches ================== */
	Route::resource(config('laraadmin.adminRoute') . '/searches', 'LA\SearchesController');
	Route::get(config('laraadmin.adminRoute') . '/search_dt_ajax', 'LA\SearchesController@dtajax');
	Route::get(config('laraadmin.adminRoute') . '/search', 'LA\SearchesController@search');

	/* ================== Ratings ================== */
	Route::resource(config('laraadmin.adminRoute') . '/ratings', 'LA\RatingsController');
	Route::get(config('laraadmin.adminRoute') . '/rating_dt_ajax', 'LA\RatingsController@dtajax');
	Route::get(config('laraadmin.adminRoute') . '/get_ratings', 'LA\RatingsController@get_ratings');

	/* ================== Advertises ================== */
	Route::resource(config('laraadmin.adminRoute') . '/advertises', 'LA\AdvertisesController');
	Route::get(config('laraadmin.adminRoute') . '/advertise_dt_ajax', 'LA\AdvertisesController@dtajax');

	/* ================== Verifies ================== */
	Route::resource(config('laraadmin.adminRoute') . '/verifies', 'LA\VerifiesController');
	Route::get(config('laraadmin.adminRoute') . '/verify_dt_ajax', 'LA\VerifiesController@dtajax');

	/* ================== Tenants ================== */
	Route::resource(config('laraadmin.adminRoute') . '/tenants', 'LA\TenantsController');
	Route::get(config('laraadmin.adminRoute') . '/tenant_dt_ajax', 'LA\TenantsController@dtajax');

	/* ================== Favorites ================== */
	Route::resource(config('laraadmin.adminRoute') . '/favorites', 'LA\FavoritesController');
	Route::get(config('laraadmin.adminRoute') . '/favorite_dt_ajax', 'LA\FavoritesController@dtajax');

	/* ================== Payments ================== */
	Route::resource(config('laraadmin.adminRoute') . '/payments', 'LA\PaymentsController');
	Route::get(config('laraadmin.adminRoute') . '/payment_dt_ajax', 'LA\PaymentsController@dtajax');
});
