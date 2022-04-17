<?php


  Auth::routes(['verify' => true]);
  Route::get('/home', 'HomeController@index')->name('home');

  // all backend routing start
  Route::group(['middleware' => 'auth', 'middleware' => 'verified'], function () {
    Route::get('product/add/view', 'ProductController@view_product');
    Route::get('product/viewlist', 'ProductController@productviewlist');
    Route::post('product/insert', 'ProductController@insert_product');
    Route::get('product/delete/{product_id}', 'ProductController@delete_product');
    Route::get('product/edit/{product_id}', 'ProductController@edit_product');
    Route::post('product/edit/insert', 'ProductController@edit_insert_product');
    Route::get('product/delete/restore/{product_id}', 'ProductController@product_restore');
    Route::get('product/delete/parmanet/delete/{deleted_product_id}', 'ProductController@product_parmanet_delete');

    Route::get('products/price/range', 'ProductController@productspricerange');
    Route::post('product/price/range/insert', 'ProductController@productpricerangeinsert');
    Route::get('price/range/delete/{delete_id}', 'ProductController@pricerangedelete');
    Route::get('price/range/edit/{edit_id}', 'ProductController@pricerangeedit');
    Route::post('price/range/edit/insert', 'ProductController@pricerangeeditinsert');


    Route::get('category/add/view', 'CategoryController@categoryview');
    Route::post('category/insert', 'CategoryController@categoryinsert');
    Route::post('sub/category/insert', 'CategoryController@subcategoryinsert');
    Route::get('category/edit/{category_id}', 'CategoryController@categoryeditview');
    Route::get('sub/category/edit/{category_id}', 'CategoryController@subcategoryedit');
    Route::post('category/edit/insert', 'CategoryController@categoryeditinsert');
    Route::post('sub/category/edit/insert', 'CategoryController@subcategoryeditinsert');
    Route::get('category/delete/{category_id}', 'CategoryController@categorydelete');
    Route::get('sub/category/delete/{category_id}', 'CategoryController@subcategorydelete');
    // get value json format sub category using ajax
    Route::get('findsubWithcatId/{id}','CategoryController@findsubWithcatId');

    Route::get('coupon/add/view', 'CouponController@couponaddview');
    Route::post('coupon/insert', 'CouponController@couponinsert');
    Route::get('coupon/delete/{coupon_id}', 'CouponController@coupondelete');
    Route::get('delivery/charge/view', 'DeliverychargeController@deliverycharge');
    Route::post('deliverycharge/insert', 'DeliverychargeController@deliverychargeinsert');
    Route::get('deliverycharge/delete/{delivercharge_id}', 'DeliverychargeController@deliverychargedelete');
    Route::get('banner/add/view', 'BannerController@banneraddview');
    Route::post('banner/insert', 'BannerController@bannerinsert');
    Route::get('banner/delete/{banner_id}', 'BannerController@bannerdelete');
    Route::get('banner/update/{banner_id}', 'BannerController@bannerupdate');
    Route::post('update/banner/insert', 'BannerController@updatebannerinsert');
    Route::get('add/category/wise/shop', 'CategorywiseshopController@addcategorywiseshop');
    Route::get('contact/msg/delete/{contact_id}', 'ContactusController@contactmessagedelete');
    Route::get('contact/us/message', 'ContactusController@contactusmessage');

    // recent event route
    Route::get('recent/events', 'eventController@recentevents');
    Route::post('add/event/insert', 'eventController@addeventinsert');
    Route::get('view/events/list', 'eventController@vieweventslist');
    Route::get('event/delete/{event_id}', 'eventController@eventdelete');
    Route::get('event/edit/{event_id}', 'eventController@eventedit');
    Route::post('edit/event/insert', 'eventController@editeventinsert');


    //customer info route
    Route::get('customer/info', 'CustomerController@cusotmerinfo');
    Route::get('payment/pending/{payment_id}', 'CustomerController@paymentpending');
    Route::get('customer/order/delete/{order_id}', 'CustomerController@customerorderdelete');
  });
// all backend routing end


// all frontend roution start

Route::get('/', 'FrontendController@index');
Route::get('category/wise/shop', 'FrontendController@categorywiseshop');
// price range filter route
Route::post('price/range/filter', 'FrontendController@pricerangefilter');

Route::get('our/blog', 'FrontendController@ourblog');
Route::get('about/us', 'FrontendController@about');
Route::get('contact/us', 'FrontendController@contact');
Route::get('cart/shoping', 'FrontendController@cart');
Route::get('cart/shoping/{coupon_code}', 'FrontendController@cart');
// Route::get('product/details', 'FrontendController@productdetails');
Route::get('shipping/cart', 'FrontendController@shipingcart');
Route::post('product/checkout', 'FrontendController@checkout');
Route::get('product/order/complete', 'FrontendController@ordercomplete');
Route::get('wishlist', 'FrontendController@wishlist');
Route::get('product/details/{product_id}', 'FrontendController@singleproductdetails');
Route::get('category/wise/products/{category_id}/{subcategory_id}', 'FrontendController@allcategorywiseproducts');

Route::POST('add/to/cart', 'FrontendController@addtocart');
Route::get('cart/delete', 'FrontendController@cartdelete');
Route::get('single/cart/delete/{cart_id}', 'FrontendController@singlecartdelete');
Route::post('update/cart', 'FrontendController@updatecart');
Route::post('cart/checkout', 'CheckoutController@cartcheckout');
Route::get('api/get-state-list/{country_id}', 'CheckoutController@ajaxgetstate');
Route::get('api/get-city-list/{state_id}', 'CheckoutController@ajaxgetcity');
Route::post('contact/message/insert', 'FrontendController@contactmessageinsert');

//search data route
Route::get('search-products', 'FrontendController@searchProductList')->name('search.product');
Route::post('find-products', 'FrontendController@findproducts');


//event route
Route::get('event/details/{event_id}', 'FrontendController@eventdetails');

// payment method route start
Route::post('shipping/info/insert', 'PaymentController@shippinginfoinsert');

// payment method route finish

// for user and admin dashboard route
Route::get('user/dashboard', 'UserdashboardController@userdashboard');
Route::get('add/user/profile', 'UserdashboardController@adduserprofile');
Route::get('view/user/profile', 'UserdashboardController@viewuserprofile');
Route::post('add/user/profile/insert', 'UserdashboardController@adduserprofileinsert');
Route::post('user/profile/update', 'UserdashboardController@userprofileupdate');
Route::post('update/user/profile/image', 'UserdashboardController@updateuserprofileimage');
Route::post('upload/user/profile/image', 'UserdashboardController@uploaduserprofileimage');
Route::get('user/password/change', 'Auth\ChangepasswordController@userpasswordchange');
Route::post('user/change/password/insert', 'Auth\ChangepasswordController@userchangepasswordinsert');
Route::get('customer/total/order/list', 'UserdashboardController@customertotalorderlist');
Route::get('customer/single/order/details/{sale_id}', 'UserdashboardController@customersingleorderdetails');
Route::get('single/product/review/{billing_id}', 'UserdashboardController@singleproductreview');
Route::post('single/product/review/insert', 'UserdashboardController@singleproductreviewinsert');


// for admin registration route
Route::get('admin/dashboard', 'AdmindashboardController@admindashboard');
Route::get('admin/register', 'AdminController@adminregister');
Route::post('admin/register/insert', 'AdminController@adminregisterinsert');
Route::get('admin/user/profile', 'AdminController@adminuserprofile');
Route::get('view/admin/profile', 'AdminController@viewadminprofile');
Route::get('welcome/admin/dashboard', 'AdminController@welcomeadmindashboard');




// all frontend roution end
