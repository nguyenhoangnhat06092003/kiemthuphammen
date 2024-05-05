<?php

use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeController;
use RealRashid\SweetAlert\Facades\Alert;
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

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/menu', 'MenuController@index');

Route::get('/service', 'ServiceController@index');

Route::get('/service/{id}', 'ServiceController@show'); 

Route::get('/about', function () {
    return view('about');
});

Route::get('/login-form', function () {
    return view('auth.login');
});

//Login facebook
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

// Route::get('/offer/{id}', 'PackageController@show');

Route::get('/offer-detail/{id}', 'PackageController@offerDetail');


Auth::routes();

Route::resource('/order', 'OrderController');

Route::post('/order-create', 'OrderController@createOrder')->name('createOrder');

Route::post('/updateStatus/{id}', 'OrderController@updateStatus')->name('updateStatus');

Route::get('/cart/{id}', 'OrderController@getCart')->name('getOrder');

Route::get('/profile/infor', 'UserController@index')->name('profile');

Route::get('/profile/history', 'UserController@history')->name('history');

Route::post('/profile/update', 'UserController@updateInfor')->name('updateInfor');

Route::post('/district', 'AddressController@getDistrict')->name('getDistrict');

Route::post('/village', 'AddressController@getVillage')->name('getVillage');

Route::post('/change-avatar', 'UserController@updateAvatar')->name('updateAvatar');


// Route::get('/home', 'HomeController@index')->name('home');

//admin
Route::get('/admin/home', 'Admin\AdminController@index')->name('admin');



Route::get('/admin/form-advanced', function () {
    return view('admin.form_advanced');
});

//Login facebook
Route::get('/login-facebook', 'SocialController@login_facebook');
Route::get('/login/callback', 'SocialController@callback_facebook');


Route::get('/admin/form-validation', function () {
    return view('admin.form_validation');
});

Route::get('/admin/form-wizards', function () {
    return view('admin.form_wizards');
});

Route::get('/admin/form', function () {
    return view('admin.form');
});

Route::get('/admin/icons', function () {
    return view('admin.icons');
});

Route::get('/admin/glyphicons', function () {
    return view('admin.glyphicons');
});

Route::get('/admin/invoice', function () {
    return view('admin.invoice');
});

Route::get('/admin/profile', function () {
    return view('admin.profile');
});

Route::get('/admin/projects', function () {
    return view('admin.projects');
});

Route::get('/admin/project-detail', function () {
    return view('admin.project_detail');
});

Route::get('/admin/contacts', function () {
    return view('admin.contacts');
});

Route::get('/admin/tables', function () {
    return view('admin.tables');
});

Route::get('/admin/tables-dynamic', function () {
    return view('admin.tables_dynamic');
});



Route::get('/order-create', 'OrderController@backToHomePage');

Route::get('/evaluate', 'EvaluateController@index')->name('list_evaluate');
Route::post('/evaluate', 'EvaluateController@send_comment')->name('send_comment');
Route::post('/showMenu', 'MenuController@showMenuById')->name('showMenuById');

Route::post('/search', 'FoodController@getSearchAjax')->name('search');

Route::post('/add-food', 'FoodController@addFood')->name('addFood');

Route::post('/remove-food', 'FoodController@removeFood')->name('removeFood');

Route::post('/init-session', 'FoodController@initSession')->name('initSession');

Route::get('/update-menu', 'FoodController@updateMenu')->name('updateMenu');


//service management
Route::get('admin/service/list', 'ServiceController@listOfService');

Route::get('/admin/service/add', 'ServiceController@create');

Route::post('/admin/service/create', 'ServiceController@store');

Route::get('/admin/service/update/{id}', 'ServiceController@edit');

Route::post('/admin/service/update/{id}', 'ServiceController@update');

Route::get('/admin/service/delete/{id}', 'ServiceController@delete');

//Food Management
Route::get('/admin/foodManagement', 'Admin\FoodController@index')->name('foodManagement');

Route::get('/admin/add-food', 'Admin\FoodController@create')->name('createFood');

Route::post('/admin/add-food', 'Admin\FoodController@store')->name('add-food');

Route::get('/admin/edit-food/{id}', 'Admin\FoodController@edit');

Route::post('/admin/update-food/{id}', 'Admin\FoodController@update');

Route::get('/admin/delete-food/{id}', 'Admin\FoodController@destroy');

//Menu Management
Route::get('/admin/menuManagement', 'Admin\MenuController@index');

//Account Management
Route::get('/admin/accountManagement', 'Admin\AccountController@index');

//Order Management
Route::get('/admin/orderManagement', 'Admin\OrderController@index')->name('orderManagement');

Route::get('/admin/confirmOrder/{id}', 'Admin\OrderController@viewDetail');

Route::post('/admin/confirmOrder/{id}', 'Admin\OrderController@confirmOrder');

Route::get('/admin/confirmPay/{id}', 'Admin\OrderController@viewPay');

Route::post('/admin/confirmPay/{id}', 'Admin\OrderController@confirmPay');

Route::get('/admin/printInvoice/{id}', 'Admin\OrderController@printInvoice')->name('printInvoice');

Route::post('admin/printInvoice', [InvoiceController::class, 'printInvoice'])->name('print.invoice.process');




//package management
Route::get('admin/package/list', 'PackageController@index')->name('packagelist');

Route::get('/admin/add-Package', 'Admin\PackageController@create')->name('createPackage');

Route::post('/admin/add-Package', 'Admin\PackageController@store')->name('add-package');


//information restaurant
Route::get('admin/information', 'HomeController@show');

Route::post('admin/information/update/{id}', 'HomeController@update');


//Statistic
Route::post('/filter-by-date', 'AdminController@filter_by_date');
Route::post('/filter-by-date1', 'AdminController@filter_by_date1');
Route::post('/filter-by-month', 'AdminController@filter_by_month');
Route::post('/export-excel-statistic-by-month/{month}', 'AdminController@export_excel_statistic_by_month')->name('export-excel-statistic-by-month');
Route::post('/export-pdf-by-month/{month}', 'AdminController@export_pdf_by_month')->name('export-pdf-by-month');

Route::post('/order-export/{month}', 'Admin\OrderController@export_order')->name('order-export');
// Route::get('/filter-by-date1', 'AdminController@filter_by_date1');
// Route::get('/home', 'AdminController@dashboard');
