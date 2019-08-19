<?php

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('base', 'NewShopController@base')->name('base');
Route::get('/', 'NewShopController@index')->name('index');

Route::get('/category_product/{id}', [
    'uses' => 'NewShopController@productCategory',
    'as' => 'category_product',
]);
Route::get('admin', function () {
    return view('back-end.home.home');
});

//Category
Route::get('category/add', 'CategoryController@index')->name('add-category');
Route::get('category/manage', 'CategoryController@manageCategory')->name('manage-category');

Route::post('category/save', 'CategoryController@saveCategory')->name('new-category');
Route::get('category/unpublish/{id}', 'CategoryController@Category_unpublished')->name('unpublished');
Route::get('category/publish/{id}', 'CategoryController@Category_published')->name('published');
Route::get('category/edit/{id}', 'CategoryController@Category_edit')->name('edit_category');
Route::post('category/update', 'CategoryController@Category_update')->name('update_category');
Route::get('category/delete/{id}', 'CategoryController@Category_delete')->name('delete_category');

//Brand
Route::get('brand/add', 'BrandController@create')->name('add-brand');
Route::get('brand/manage', 'BrandController@manageBrand')->name('manage-brand');

Route::post('brand/save', 'BrandController@store')->name('new_brand');
Route::get('brand/unpublish/{id}', 'BrandController@Brand_unpublished')->name('unpublished_brand');
Route::get('brand/publish/{id}', 'BrandController@Brand_published')->name('published_brand');
Route::get('brand/edit/{id}', 'BrandController@edit')->name('edit_brand');
Route::post('brand/update', 'BrandController@update')->name('update_brand');
Route::get('brand/delete/{id}', 'BrandController@destroy')->name('delete_brand');

//Product
Route::get('product/add', 'ProductController@index')->name('add-product');
Route::get('product/manage', 'ProductController@manageProduct')->name('manage-product');

Route::post('product/newProduct', 'ProductController@saveProduct')->name('new-product');
Route::get('product/edit/{id}', 'ProductController@editProduct')->name('edit_product');
Route::post('product/update', 'ProductController@updateProduct')->name('update-product');
Route::get('product/delete/{id}', 'ProductController@deleteProduct')->name('delete_product');

Route::get('product/single/{id}', 'ProductController@singleProduct')->name('single-product');

//Cart
Route::post('cart/add', 'CartController@addToCart')->name('add-to-cart');
Route::get('cart/show', 'CartController@showCart')->name('show-cart');
Route::get('cart/delete/{id}', 'CartController@deleteCart')->name('delete-cart-item');
Route::post('cart/update', 'CartController@updateCart')->name('update-cart');

//Checkout
Route::get('cart/checkout', 'checkoutController@index')->name('checkout');

Route::get('customer/login', 'checkoutController@newLoginPage')->name('new-login');
Route::post('customer/get_login', 'checkoutController@newCustomerLogin')->name('new-Customerlogin');
Route::post('customer/customer-logout', 'checkoutController@customerLogout')->name('customer-logout');

Route::post('customer/signup', 'checkoutController@signUp')->name('register');


Route::get('checkout/shipping', [
    'uses' => 'checkoutController@ShippingForm',
    'as' => 'checkout-shipping',
    'middleware' => 'newShopCustomer',
]);
Route::post('/shipping/save', 'checkoutController@saveShipping')->name('new-shipping');

Route::get('checkout/payment', 'checkoutController@paymentForm')->name('checkout-payment')->middleware('newShopCustomer');
Route::post('checkout/order_payment', 'checkoutController@newOrder')->name('new-order');

Route::get('order/complete', 'checkoutController@completeOrder')->name('order-complete');

//Authenticaion
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('customer/login', 'checkoutController@customerSignin')->name('customer-login');
