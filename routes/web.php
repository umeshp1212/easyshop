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
//Front-end Routes ---------------------------------------------------------
Route::get('/', 'HomeController@index' );
Route::get('/shop','Homecontroller@shop');

//Show Category Wise Product Route ----------------------------------------------
Route::get('/product-by-category/{category_id}','HomeController@show_product_by_category');
Route::get('/product-by-manufacture/{manufacture_id}','HomeController@show_product_by_manufacture');
Route::get('/view-product/{product_id}','HomeController@product_by_details');

//Cart Route ------------------------------------------------------------------
Route::post('/add-to-cart','CartController@add_to_cart');
Route::get('/show-cart','CartController@show_cart');
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');
Route::post('/update-cart','CartController@update_cart');

//Check Out Route ------------------------------------------------------------
Route::get('/login-check','CheckoutController@login_check');
Route::post('/customer-registration','CheckoutController@customer_registration');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/save-shipping-details','CheckoutController@save_shipping_details');
Route::get('/customer-login','CheckoutController@customer_login');
Route::get('/customer-logout','CheckoutController@customer_logout');
Route::get('/payment','CheckoutController@payment');
Route::post('/order-place','CheckoutController@order_place');
Route::get('/manage-order','CheckoutController@manage_order');
Route::get('/view-order/{order_id}','CheckoutController@view_order');


//Backend Routes -----------------------------------------------------------
Route::get('/logout', 'SuperAdminController@logout');
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard','SuperAdminController@index');
Route::post('/admin-dashboard','AdminController@dashboard');


//Category Related Route ----------------------------------------------------
Route::get('/add-category','CategoryController@index');
Route::get('/all-category','CategoryController@all_category');
Route::post('/save-category','CategoryController@save_category');
Route::get('/edit-category/{category_id}','CategoryController@edit_category');
Route::post('/update-category/{category_id}','CategoryController@update_category');
Route::get('/delete-category/{category_id}','CategoryController@delete_category');
Route::get('/inactive-category/{category_id}','CategoryController@inactive_category');
Route::get('/active-category/{category_id}','CategoryController@active_category');

//Manufacture Related Route --------------------------------------------------

Route::get('/add-manufacture','ManufactureController@index');
Route::get('/all-manufacture','ManufactureController@all_manufacture');
Route::post('/save-manufacture','ManufactureController@save_manufacture');
Route::get('/edit-manufacture/{manufacture_id}','ManufactureController@edit_manufacture');
Route::post('/update-manufacture/{manufacture_id}','ManufactureController@update_manufacture');
Route::get('/delete-manufacture/{manufacture_id}','ManufactureController@delete_manufacture');
Route::get('/inactive-manufacture/{manufacture_id}','ManufactureController@inactive_manufacture');
Route::get('/active-manufacture/{manufacture_id}','ManufactureController@active_manufacture');


//Products Related Route -------------------------------------------------------

Route::get('/add-product','ProductsController@index');
Route::get('/all-product','ProductsController@all_product');
Route::post('/save-product','ProductsController@save_product');
Route::get('/edit-product/{product_id}','ProductsController@edit_product');
Route::get('/delete-product/{product_id}','ProductsController@delete_product');
Route::get('/inactive-product/{product_id}','ProductsController@inactive_product');
Route::get('/active-product/{product_id}','ProductsController@active_product');


//Slider Related Route -----------------------------------------------------------

Route::get('/add-slider','SliderController@index');
Route::get('/all-slider','SliderController@all_slider');
Route::post('/save-slider','SliderController@save_slider');
Route::get('/inactive-slider/{slider_id}','SliderController@inactive_slider');
Route::get('/active-slider/{slider_id}','SliderController@active_slider');
Route::get('/delete-slider/{slider_id}','SliderController@delete_slider');

//Contact Page Related Route---------------------------------------------
Route::get('/contact','ContactController@index');
Route::get('/add-contact','ContactController@add_contact');
Route::post('/save-contact','ContactController@save_contact');
Route::get('/all-contact','ContactController@all_contact');
Route::get('/edit-contact/{contact_id}','ContactController@edit_contact');
Route::post('/update-contact/{contact_id}','ContactController@update_contact');
Route::get('/delete-contact/{contact_id}','ContactController@delete_contact');
Route::get('/inactive-contact/{contact_id}','ContactController@inactive_contact');
Route::get('/active-contact/{contact_id}','ContactController@active_contact');

Route::post('/save-inquiry','ContactController@save_inquiry');
Route::get('/all-inquiry','ContactController@all_inquiry');


Route::get('/404',function(){
    return view('errors.404');
});



