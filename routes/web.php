<?php

use Illuminate\Support\Facades\Route;



Route::get('/','FrontendController@index')->name('home');
Route::get('contact-us','FrontendController@contact_page')->name('contact.us');
Route::post('contact-us','FrontendController@contact_store')->name('contact.store');
Route::get('show-trailler/{slug}','FrontendController@show_trailler')->name('show.trailler');
Route::get('all-trailler/','FrontendController@all_trailler')->name('all.trailler');
Route::get('all-regular/','FrontendController@all_regular')->name('all.regular');
Route::get('all-upcomming/','FrontendController@all_upcomming')->name('all.upcomming');
Route::get('all-trending/','FrontendController@all_trending')->name('all.trending');
Route::get('all-movie/{id?}/{type?}','FrontendController@all_movie')->name('all.movie');
Route::get('all-tv-show/{id?}/{type?}','FrontendController@all_tv_show')->name('all.tv.show');

Route::get('show-details/{slug}','MovieTVController@index')->name('movie.show.detail');

Route::get('pricing/','BuyPackageController@index')->name('show.package');
Route::post('purchase/','BuyPackageController@purchase')->name('purchase.package');
Route::get('package-update/','BuyPackageController@update_page')->name('update.purchase.package');

Route::post('packageupdate/','BuyPackageController@update_package')->name('update.package.store');

Route::get('manage-profile/','ProfileController@manage_profile')->name('manage.profile');
Route::post('manage-profile/','ProfileController@update_profile')->name('update.profile');


/*
|============================================
| All backend router are here
*/

Route::group(['prefix'=>'admin','namespace'=>'admin'],function(){
	Route::get('/','AdminController@index')->name('dashboard');
	Route::get('contact-message','AdminController@contact')->name('contact.index');

	// category routes
	   Route::get('category','CategoryController@index')->name('category.index');
	   Route::get('category/add','CategoryController@showForm')->name('category.add');
	   Route::post('category/store','CategoryController@store')->name('category.store');
	   Route::get('category/edit/{id}','CategoryController@edit')->name('category.edit');
	   Route::post('category/update','CategoryController@update')->name('category.update');
	   Route::post('category/delere','CategoryController@delete')->name('category.delete');
	 //  Route::get('get-all-category','CategoryController@getCategory')->name('loadCategory');

	   // language route
	   Route::get('language','LanguageController@index')->name('language.index');
	   Route::get('language/add','LanguageController@showForm')->name('language.add');
	   Route::post('language/store','LanguageController@store')->name('language.store');
	   Route::get('language/edit/{id}','LanguageController@edit')->name('language.edit');
	   Route::post('language/update','LanguageController@update')->name('language.update');
	   Route::post('language/delere','LanguageController@delete')->name('language.delete');
	  // Route::get('get-all-language','LanguageController@getCategory')->name('loadLanguage');



	   // Videos type route
	   Route::get('type','MovieTypeController@index')->name('type.index');
	   Route::get('type/add','MovieTypeController@showForm')->name('type.add');
	   Route::post('type/store','MovieTypeController@store')->name('type.store');
	   Route::post('type/edit/{id}','MovieTypeController@show')->name('type.edit');
	   Route::post('type/update','MovieTypeController@update')->name('type.update');
	  // Route::get('get-all-type','MovieTypeController@getCategory')->name('loadLanguage');


	   // Videos type route
	   Route::get('trailler','TraillerController@index')->name('trailler.index');
	   Route::get('trailler/add','TraillerController@showForm')->name('trailler.add');
	   Route::post('trailler/store','TraillerController@store')->name('trailler.store');
	   Route::post('trailler/edit/{id}','TraillerController@show')->name('trailler.edit');
	   Route::post('trailler/update','TraillerController@update')->name('trailler.update');
	   //Route::get('get-all-trailler','MovieTypeController@getCategory')->name('loadLanguage');


	   // Videos  route
	   Route::get('video','VideoController@index')->name('video.index');
	   Route::get('video/add','VideoController@showForm')->name('video.add');
	   Route::post('video/store','VideoController@store')->name('video.store');
	   Route::get('video/basic_edit/{id}','VideoController@basic_edit')->name('video.basic_edit');
	   Route::post('video/update_basic/info','VideoController@basic_update')->name('update.basic_info');
	   Route::get('video/media_edit/{id}','VideoController@media_edit')->name('video.media_edit');
	   Route::post('video_media/update','VideoController@media_update')->name('update.media_info');
	   Route::get('video-details/{id}','VideoController@show')->name('video.detail.show');
	   Route::post('video-delete/','VideoController@delete')->name('video.delete');
	

	   // pachage and pricing

	   Route::get('package','PackageController@index')->name('package.index');
	   Route::get('package/add','PackageController@showForm')->name('package.add');
	   Route::post('package/store','PackageController@store')->name('package.store');
	   Route::get('package/edit/{id}','PackageController@edit')->name('package.edit');
	   Route::post('package/update','PackageController@update')->name('admin.package.update');
	   Route::post('package/deletee','PackageController@delete')->name('package.delete');

	   Route::get('purchase-package','PackageController@all_purchase_package')->name('all.purchase.package');
	   Route::post('purchase-package-status','PackageController@change_purchase_package')->name('change.package.status');

	    Route::get('manage-slider','SliderController@index')->name('slider.index');
	    Route::get('slider/edit/{id}','SliderController@edit')->name('slider.edit');
	    Route::post('slider/updare','SliderController@update')->name('slider.update');
	    Route::post('slider/delete','SliderController@delete')->name('slider.delete');



	Route::get('/login','auth\LoginController@showLoginForm')->name('admin.login');
	Route::post('/login','auth\LoginController@login')->name('admin.login.submit');
	Route::post('/logout','auth\LoginController@logout')->name('admin.logout');
});



Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
