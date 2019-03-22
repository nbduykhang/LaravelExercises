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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Auth::routes(['verify'=> true]);

//Route::get('/admin/dashboard', 'Admin\AdminController@index')->name('getAdmin');

Route::get('/admin/customregister','CustomAuth\AuthController@getRegister')->name('getRegister');
Route::post('/admin/customregister', 'CustomAuth\AuthController@postRegister')->name('postRegister');

Route::get('/admin/customlogin','CustomAuth\AuthController@getLogin')->name('getLogin');
Route::post('/admin/customlogin','CustomAuth\AuthController@postLogin')->name('postLogin');


	
Route::group(['prefix'=>'admin','middleware'=>'checkadmin'],function(){
	//Route::group(['prefix'=>Session::get('locale'),'middleware'=>'localization'],function(){
		
		//Route::get('/{locale}','LangController@getLang')->name('getLocale');
			
		Route::get('/','Admin\AdminController@index')->name('getAdmin');
		Route::get('dashboard', 'Admin\AdminController@index')->name('getAdminDashboard');
		Route::get('profile','Admin\AdminController@profile')->name('getProfile');
		Route::get('change-password','Admin\AdminController@getChangePassword')->name('getChangePassword');

		Route::post('profile','Admin\AdminController@editProfile')->name('postProfile');
		Route::post('change-password','Admin\AdminController@postChangePassword')->name('postChangePassword');

		Route::group(['prefix'=>'user'],function(){
				
			Route::get('/','Admin\UserController@index')->name('getUser');

			Route::get('create','Admin\UserController@create')->name('getCreateUser');
			Route::post('create','Admin\UserController@store')->name('postCreateUser');
					
			Route::get('edit/{id}','Admin\UserController@edit')->name('getEditUser');
			Route::post('edit/{id}','Admin\UserController@update')->name('postEditUser');
					
			Route::get('show/{id}','Admin\UserController@show')->name('getShowUser');
					
			Route::get('delete/{id}','Admin\UserController@delete')->name('getDeleteUser');
			Route::get('listdeleted','Admin\UserController@getDeleted')->name('getUserDeleted');
					
			Route::get('listdeactivated','Admin\UserController@getDeactivatedList')->name('getDeactivatedUser');
			Route::get('active-user/{id}','Admin\UserController@activeUser')->name('getActiveUser');
			Route::get('deactive-user/{id}','Admin\UserController@deactiveUser')->name('getDeactiveUser');
					
			Route::get('restore/{id}','Admin\UserController@restoreDeleted')->name('getRestoreUserDeleted');
			Route::get('restore','Admin\UserController@restoreAllDeleted')->name('getRestoreAllUserDeleted');
		});

		Route::group(['prefix'=>'role'],function(){
				
			Route::get('/','Admin\RoleController@index')->name('getRole');
				
			Route::get('create','Admin\RoleController@create')->name('getCreateRole');
			Route::post('create','Admin\RoleController@store')->name('postCreateRole');
				
			Route::get('edit/{id}','Admin\RoleController@edit')->name('getEditRole');
			Route::post('edit/{id}','Admin\RoleController@update')->name('postEditRole');
				
			Route::get('show/{id}','Admin\RoleController@show')->name('getShowRole');
				
			Route::get('delete/{id}','Admin\RoleController@delete')->name('getDeleteRole');
			Route::get('listdeleted','Admin\RoleController@getDeleted')->name('getRoleDeleted');
				
			Route::get('restore/{id}','Admin\RoleController@restoreDeleted')->name('getRestoreRoleDeleted');
			Route::get('restore','Admin\RoleController@restoreAllDeleted')->name('getRestoreAllRoleDeleted');

			Route::get('change-status/{id}','Admin\RoleController@changeStatus')->name('getChangeStatus');
		});

		Route::group(['prefix'=>'permission'],function(){

			Route::get('/','Admin\PermissionController@index')->name('getPermission');
				
			Route::get('create','Admin\PermissionController@create')->name('getCreatePermission');
			Route::post('create','Admin\PermissionController@store')->name('postCreatePermission');
				
			Route::get('edit/{id}','Admin\PermissionController@edit')->name('getEditPermission');
			Route::post('edit/{id}','Admin\PermissionController@update')->name('postEditPermission');
				
			Route::get('delete/{id}','Admin\PermissionController@delete')->name('getDeletePermission');
			Route::get('listdeleted','Admin\PermissionController@getDeleted')->name('getPermissionDeleted');
				
			Route::get('restore/{id}','Admin\PermissionController@restoreDeleted')->name('getRestorePermissionDeleted');
			Route::get('restore','Admin\PermissionController@restoreAllDeleted')->name('getRestoreAllPermissionDeleted');
		});

		Route::group(['prefix'=>'tenant'],function(){

			Route::get('/','Admin\TenantController@index')->name('getTenant');
				
			Route::get('create','Admin\TenantController@create')->name('getCreateTenant');
			Route::post('create','Admin\TenantController@store')->name('postCreateTenant');
				
			Route::get('edit/{id}','Admin\TenantController@edit')->name('getEditTenant');
			Route::post('edit/{id}','Admin\TenantController@update')->name('postEditTenant');
				
			Route::get('show/{id}','Admin\TenantController@show')->name('getShowTenant');
				
			Route::get('delete/{id}','Admin\TenantController@delete')->name('getDeleteTenant');
			Route::get('listdeleted','Admin\TenantController@getDeleted')->name('getTenantDeleted');
				
			Route::get('listdeactivated','Admin\TenantController@getDeactivatedList')->name('getDeactivatedTenant');
			Route::get('active-tenant/{id}','Admin\TenantController@activeTenant')->name('getActiveTenant');\
			Route::get('deactive-tenant/{id}','Admin\TenantController@deactiveTenant')->name('getDeactiveTenant');
				
			Route::get('restore/{id}','Admin\TenantController@restoreDeleted')->name('getRestoreTenantDeleted');
			Route::get('restore','Admin\TenantController@restoreAllDeleted')->name('getRestoreAllTenantDeleted');
		});
	//});
});

