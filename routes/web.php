<?php

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

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
Route::get('/testing',function(){
	// activity()->log('Look, I logged something');

	// $roles = \App\Role::with('audits.user')->get();
	// dd(Activity::all()->last());
	$activity = Activity::all()->last();

	echo		$activity->description; //returns 'created'
	echo	($activity->subject)->name; //returns the instance of NewsItem that was created
	echo	$activity->causer->name; 
});


Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Resources full Routes
	
	// user unresource full routes
		Route::post('/upload_user_image','UserController@uploadImage');

	//end here

Route::group(['prefix'=>'dashboard','middleware' => ['auth','admin']],function(){


Route::resource('admin','AdminController');
Route::resource('role','RoleController');
Route::resource('permission','PermissionController');
Route::resource('user','UserController');
Route::resource('activity','ActivityController');

});
// Resources end here