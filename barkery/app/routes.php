<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('homepage');
});
Route::resource('/event','sanphamController@event');
Route::resource ('/sanpham' , 'sanphamController');
Route::resource('/delete-post','CommentController@delete');
Route::resource('/edit-post','CommentController@edit');
Route::get('/edit/save','CommentController@editsave');
Route::resource ('/cheesecake','sanphamController@cheesecake');
Route::resource ('/tiramisu','sanphamController@tiramisu');
Route::resource ('/chiffon','sanphamController@chiffon');
Route::resource ('/brownie','sanphamController@brownie');
Route::get ('/result','searchController@search');
Route::get ('/search/advance','searchController@advance');
Route::resource('/user/edit/change_password','UsersController@changepass');
Route::post('/user/edit/savepass','UsersController@savepass');
Route::get('/user/login','UsersController@login');
Route::post('/user/loginattemp','UsersController@login_attemp');
Route::get('/user/register','UsersController@register');
Route::get('/comment','CommentController@input');
Route::get('/user/profile','UsersController@profile');
Route::get('/user/edit','UsersController@edit');
Route::post('/user/edit/save', array('uses' => 'UsersController@editsave')); 
Route::when('admin/*','admin');
Route::resource('/admin/history','Admincontroller@historyorder');
Route::get('admin/profile','AdminController@profile');
Route::get('/admin/listuser','AdminController@listuser');
Route::get('/admin/historyshop','AdminController@history');
Route::get('/admin/bought','AdminController@bought');
Route::resource('/admin/delete','AdminController@delete');
Route::resource('/admin/edit','AdminController@edituser');
Route::post('/admin/edit/save','AdminController@editsave');
Route::resource('/admin/edit-sanpham','sanphamController@edit');
Route::resource('/admin/delete-sanpham','sanphamController@destroy');
Route::post('/admin/edit-sanpham/save','sanphamController@editform');
Route::post('/admin/edit/leveluser','AdminController@editlevel');
Route::get('admin/update','sanphamController@update');
Route::post('admin/update/save','sanphamController@updatesave');
Route::get('/order','orderController@index');
Route::resource('/order/sanpham','orderController@ordersanpham');
route::get('/order/payment','orderController@payment');
route::resource('/order/skiptocart','orderController@skiptocart');
Route::get('/skiptocart/store','orderController@store');
Route::get('/order/ubasket','orderController@yourbasket');
Route::get('/order/ubasket/bought','orderController@bought');
Route::get('/order/ubasket/buying','orderController@buying');
Route::resource('/order/ubasket/del','orderController@destroy');
Route::resource('/order/ubasket/pay','orderController@paybuying');
Route::get('/order/ubasket/paydone','orderController@paybuyingdone');
Route::get('/about/instroduce',function ()
{
	return View::make('instroduce');
});
Route::get('/about/contact',function ()
{
	return View::make('contact');
});
Route::get('/user/logout',function()
{
	if(Auth::check())
	{
		Auth::logout();
		return Redirect::intended('/');
	}
	else 
		return Redirect::intended('/');
});
Route::filter('csrf', function()
{
    if (Request::forged()) return Response::error('500');
});
Route::post('/user/register_result', array('uses' => 'UsersController@register_result')); 
Route::get('/buy','sanphamController@buy');
Route::filter('plusone',function(){
    PageCounter::plusOne();
});

Route::get('page',array(
    'after'  => 'plusone',
    'uses'  => 'page@index',
));