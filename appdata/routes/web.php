<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//  //Clear route cache:
// Route::get('/route-cache', function() {
// 	$exitCode = Artisan::call('route:cache');
// 	return 'Routes cache cleared';
// });

//  //Clear config cache:
// Route::get('/config-cache', function() {
// 	$exitCode = Artisan::call('config:cache');
// 	return 'Config cache cleared';
// }); 

// // Clear application cache:
// Route::get('/clear-cache', function() {
// 	$exitCode = Artisan::call('cache:clear');
// 	return 'Application cache cleared';
// });

//  // Clear view cache:
// Route::get('/view-clear', function() {
// 	$exitCode = Artisan::call('view:clear');
// 	return 'View cache cleared';
// });


// language
Route::get('language/{language}', 'IndexController@setLanguage')->name('language');
// search area
Route::post('/search-matchable-title', 'IndexController@searchTitle');
Route::get('/search-result', 'IndexController@searchResult');
Route::get('/contact-us', 'IndexController@contactUs');
Route::post('/store-user-query', 'IndexController@storeUserQuery')->name('storeUserQuery');

Route::get('/advertisement-details/{cat}/{post_id}/{form_type}', 'IndexController@adDetails')->name('adDetails');

Route::get('images-upload', 'HomeController@imagesUpload');
Route::post('images-upload', 'HomeController@imagesUploadPost')->name('images.upload');
Route::get('/','IndexController@index')->name('home');
Route::get('/category/{root?}', 'HomeController@category');

Route::get('/user-profile/{method?}', 'HomeController@userProfile')->name('userProfile');
Route::get('/user-profile-seeting', 'HomeController@settingUserProfile');
Route::get('/my-balance', 'HomeController@userBalance');
Route::get('/user-information', 'HomeController@userInfo');
Route::get('/our-pricing', 'HomeController@ourPricing');

Route::post('/update-user-info', 'IndexController@updateUserInfo');
Route::post('/update-password', 'IndexController@updatePassword');
Route::get('/my-all-post/{type}', 'IndexController@getUserCarPost');
Route::post('/delete-my-post', 'IndexController@deletePost');
Route::get('/edit-advertisement/{cat}/{post_id}/{form_type}', 'IndexController@getPostforUpdate');
Route::post('/add-new-balance', 'IndexController@addNewBalace')->name('addNewBalace');
Route::post('/remove-ad-id-from-notification', 'IndexController@removeNotificationAd');


Route::post('/insert-payment-information', 'IndexController@insertPaymentInfo');
Route::post('/get-this-payment-info', 'IndexController@thisPaymentInfo');
Route::post('/update-ads-validity', 'IndexController@updateAdsValidity');


Route::get('/terms-and-condition', 'IndexController@termsAndCondition');
Route::get('/policy', 'IndexController@policy');


Route::post('/add-to-last-visit', 'IndexController@addToLastVisit');
Route::get('/my-history', 'IndexController@history');
Route::get('/my-history', 'IndexController@history');

// add to favourites url
Route::post('/add-to-favourite', 'IndexController@addToFavourite');
Route::post('/remove-post-from-favourite', 'IndexController@removeFromFavourite');
Route::get('/favourites', 'IndexController@favouriteList');
// buy sale urls
Route::get('/buy-sale/{sub_cat?}/{inner_cat?}/{th_cat?}', 'User\CategoryController@buySaleForm')->name('buy.sale');
Route::post('/insert-buy-sale-form', 'User\BuySaleAdController@storeBuysaleform');
Route::get('/buy-sale-browse', 'User\BuySaleAdController@buySaleBrowse');
Route::get('/search-buy-sale', 'User\BuySaleAdController@searchBuySale');
Route::post('/get-active-menu-data-buy-sale', 'User\BuySaleAdController@activeMenuData');
Route::get('/view-buysale-details/{post_id}/{form_type}', 'User\BuySaleAdController@buySaleDetails');
Route::post('/filter-buy-sale-by-all-values', 'User\BuySaleAdController@buySaleFilter');
Route::post('/update-buy-sale-form', 'User\BuySaleAdController@updateBuySale');

// services url
Route::get('/services/{sub_cat?}/{inner_cat?}/{th_cat?}','User\ServicesController@ServiceForm')->name('services');
Route::post('/insert-services-form', 'User\ServicesController@storeServicesform');
Route::get('/services-browse', 'User\ServicesController@servicesBrowse');
Route::get('/search-services', 'User\ServicesController@searchServices')->name('SearchService');
Route::get('/view-service-details/{post_id}/{form_type}', 'User\ServicesController@serviceDetails');
Route::post('/get-active-menu-data-service', 'User\ServicesController@serviceGetActiveData');
Route::post('/filter-services-by-all-values', 'User\ServicesController@serviceFilter');
Route::post('/update-services-form', 'User\ServicesController@updateServices');

// job urls
Route::get('/job/{form_type}', 'User\JobAdController@jobInfo');
Route::post('/insert-job-form', 'User\JobAdController@storeJobInfo');
Route::get('/job-browse', 'User\JobAdController@jobBrowse');
Route::get('/search-job', 'User\JobAdController@jobSearch');
Route::get('/view-job-details/{post_id}/{form_type}', 'User\JobAdController@jobDetails');
Route::post('/get-active-job-data', 'User\JobAdController@actvJobData');
Route::post('/filter-job-by-all-values', 'User\JobAdController@filterAllJob');
// Route::post('/search-job-with-city', 'User\JobAdController@filterJobByTopValues');
// Route::post('/filter-job-by-top-bar-values', 'User\JobAdController@filterAllJobByTopVal');
Route::post('/update-job-form', 'User\JobAdController@updateJobPost');


Route::get('/home', 'IndexController@index');
Route::get('/editing/{sub_cat?}/{inner_cat?}', 'User\CategoryController@categoryForm')->name('transport');
Route::post('/get-models-under-the-marke','User\CategoryController@getModels');
Route::post('/get-periods-under-the-model','User\CategoryController@getPeriods');

// Route::post('/get-cities-under-the-country','User\CategoryController@getCities');
// Route::post('/get-cities-under-the-region','User\CategoryController@getCitiesOfRegion');

Route::get('/car-browse', 'User\CarFilterController@carBrowse');
Route::get('/cars-search-result', 'User\CategoryController@carsSearchR');
// Route::get('/view-car-details/{post_id}/{cat}', 'User\CategoryController@carDetails');

// house urls
Route::get('/house/{sub_cat}/{type}', 'User\HouseAdController@houseForm');
Route::get('/realestate-browse', 'User\HouseFilterController@houseBrowse');
Route::get('/search-realestate', 'User\HouseFilterController@searchHouse');
Route::post('/filter-house-by-all-values', 'User\HouseFilterController@filterHouseAllField');

Route::post('/update-house-form', 'User\HouseAdController@updateHousePost');
Route::post('/remove-advertisement-cover', 'User\HouseAdController@removeAdCover');
Route::post('/remove-advertisement-alt-img', 'User\HouseAdController@removeAdAlt');


// Route::get('/realestate-search', 'User\CategoryController@realestateSearch');
// Route::post('/filter-house-by-filed-value', 'User\CategoryController@filterHouseField');
// Route::post('/search-house-by-address', 'User\HouseFilterController@searchHouseByAddress');
// Route::post('/check-active-menu-value', 'User\CategoryController@checkSubHseField');
// Route::post('/filter-house-by-all-top-values', 'User\HouseFilterController@filterHouseTop');
Route::post('/insert-house-form', 'User\HouseAdController@insertHouseForm');
Route::post('/get-active-menu-data', 'User\HouseFilterController@getActivemenuData');

// cars url
Route::get('/search-car', 'User\CarFilterController@searchCar');
Route::post('/filter-car-by-all-values', 'User\CarFilterController@filterCarAllField');
// Route::post('/get-active-menu-data-cars', 'User\CarFilterController@activeMenuData');
Route::post('/insert-form', 'User\CarAdController@insertForm');
Route::post('/update-car-form', 'User\CarAdController@updateCarPost');




// temporary route
Route::post('/insert-values', 'User\CategoryController@insertValues')->name('insertIntem');
Route::post('/insert-gamybos', 'User\CategoryController@insertGamybos')->name('insertGamybos');
// temporary route




Route::post('/action-for-register-from-page', 'User\CarAdController@RegisterFromPg');
Route::post('/action-for-login', 'User\CarAdController@checkLogin');

Route::get('/realestate-map', 'IndexController@realestateMap')->name('realestateMap');
Route::get('/select-plane', 'IndexController@selectPlane')->name('selectPlane');
Route::get('/realestate-details','IndexController@realestateDetails')->name('realestateDetails');
Auth::routes();

Route::group(['prefix' => 'admin'], function () {
	Route::name('admin.')->group(function () {
		Route::namespace('Auth')->group(function () {
			Route::get('login', 'AdminLoginController@showLoginForm')->name('login');	
			Route::post('login', 'AdminLoginController@login')->name('login.submit');
			Route::post('logout', 'AdminLoginController@logout')->name('logout');
		});
		Route::namespace('Admin')->group(function () {
			Route::get('/', 'DashboardController@index')->name('dashboard');
		});
	});
	Route::get('category','Admin\CategoryController@category')->name('category');
	Route::post('insert-main-category','Admin\CategoryController@storeMainCat');
	Route::post('edit-main-category','Admin\CategoryController@editMainCat');
	Route::post('update-main-category','Admin\CategoryController@updateMainCat');
	Route::post('delete-main-category','Admin\CategoryController@deleteMainCat');

	Route::get('sub-category','Admin\CategoryController@subCategory')->name('subCategory');
	Route::post('insert-sub-category','Admin\CategoryController@storeSubCat');
	Route::post('edit-sub-category','Admin\CategoryController@editSubCat');
	Route::post('update-sub-category','Admin\CategoryController@updateSubCat');
	Route::post('delete-sub-category','Admin\CategoryController@deleteSubCat');

	Route::get('inner-category','Admin\CategoryController@innerSubCategory')->name('innerSubCategory');
	Route::post('get-sub-categories','Admin\CategoryController@getAllSubCats');
	Route::post('insert-inner-category','Admin\CategoryController@storeInnerCat');
	Route::post('edit-inner-category','Admin\CategoryController@editInnerCat');
	Route::post('update-inner-category','Admin\CategoryController@updateInnerCat');
	Route::post('delete-inner-category','Admin\CategoryController@deleteInnerCat');

	// 3rd inner
	Route::get('third-inner-category','Admin\CategoryController@thirdInnerCategory')->name('thirdInnerCategory');
	Route::post('insert-thrd-inner-category','Admin\CategoryController@storeThrdInnerCat');

	Route::post('get-inner-categories','Admin\CategoryController@getAllInnerCats');
	Route::post('edit-thrd-inner-category','Admin\CategoryController@editThrdInnerCat');
	Route::post('update-thrd-inner-category','Admin\CategoryController@updateThrdInnerCat');
	Route::post('delete-thrd-inner-category','Admin\CategoryController@deleteThrdInnerCat');

	// advertisements
	Route::get('advertisements','Admin\DashboardController@advertisement')->name('allAdvertisement');
	Route::get('users','Admin\DashboardController@allUser')->name('allUser');
	Route::post('delete-this-user','Admin\DashboardController@deleteUser');
	Route::post('delete-advertisement','Admin\DashboardController@deletePost');
	Route::post('get-this-user-info','Admin\DashboardController@userInfo');
	Route::post('suspend-advertisement','Admin\DashboardController@suspendPost');
	Route::post('suspend-ban-user','Admin\DashboardController@suspendOrBanUser');
	
	Route::get('manage-menus','Admin\BackendConctroller@menus')->name('menus');
	Route::post('insert-menu','Admin\BackendConctroller@storeMenu');
	Route::post('edit-menu','Admin\BackendConctroller@editMenu');
	Route::post('update-menu','Admin\BackendConctroller@updateMenu');
	Route::post('delete-menu','Admin\BackendConctroller@deleteMenu');
	// slider
	Route::get('slider-one','Admin\SliderController@sliderOne')->name('sliderOne');
	Route::post('insert-slider-one','Admin\SliderController@storeSliderOne');
	Route::post('edit-slider-one','Admin\SliderController@editSliderOne');
	Route::post('update-slider-one','Admin\SliderController@updateSliderOne');
	Route::post('delete-slider-one','Admin\SliderController@deleteSliderOne');
	Route::get('slider-two','Admin\SliderController@sliderTwo')->name('sliderTwo');
	Route::post('featured-advertisement','Admin\DashboardController@featuredAd');

	Route::get('terms-conditions','Admin\DashboardController@termsCond')->name('termsCond');
	Route::post('store-terms','Admin\DashboardController@storeTerms')->name('storeTerms');
});
