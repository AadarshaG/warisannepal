<?php

//front routes
Route::get('/','Front\FrontendController@index')->name('landing');

Route::get('/about/us','Front\PageController@about')->name('about');
Route::get('/services','Front\PageController@services')->name('services');
Route::get('/partners/vendors','Front\PageController@vendors')->name('vendors');
Route::get('/all/vendors/{id}','Front\PageController@vendorsid')->name('vendorsid');
Route::get('/vendors/{id}','Front\PageController@singleVendor')->name('singleVendor');
//contact us
Route::get('/contact/us','Front\PostController@contact')->name('contact');
Route::post('/send','Front\PostController@send')->name('send');
//testimonals
Route::get('/clients','Front\PageController@client')->name('client');

/* social login route */
Route::get('/social/facebook', 'Front\PostController@redirectfacebook');
Route::get('/callback/facebook', 'Front\PostController@callbackfacebook');

Route::get('/social/google', 'Front\PostController@redirectgoogle');
Route::get('/callback/google', 'Front\PostController@callbackgoogle');

//pages
Route::get('/associates','Front\PageController@associates');
Route::get('/help/center','Front\PageController@helpcenter');
Route::get('/safety/center','Front\PageController@safetycenter');
Route::get('/community/guidelines','Front\PageController@guidelines');
Route::get('/cookies/policy','Front\PageController@cookies');
Route::get('/privacy/policy','Front\PageController@privacy');
Route::get('/terms/of/service','Front\PageController@terms');
Route::get('/law/enforcement','Front\PageController@law');
//search service or vendors
Route::get('/search','Front\FrontendController@search')->name('search');
//not found
Route::get('/not/found','Front\FrontendController@notFound')->name('notfound');

Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');

/****admin auth section ***/
Route::group(['prefix'=>'witn/admin'],function(){
    Route::get('/register','Auth\Admin\RegisterController@showRegisterForm')->name('admin.register');
    Route::post('/register','Auth\Admin\RegisterController@register')->name('admin.register.post');

    Route::get('/login','Auth\Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Auth\Admin\LoginController@login')->name('admin.login.post');
    Route::get('/logout','Auth\Admin\LoginController@logout')->name('admin.logout');

    Route::get('/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.request');
    Route::post('/email', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.email');

    Route::post('/reset', 'Auth\Admin\ResetPasswordController@reset')->name('admin.password.update');
    Route::get('/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('admin.reset');
});
/****member online apply section ***/
Route::group(['prefix'=>'witn/member'],function(){
    Route::get('/register','Auth\Member\RegisterController@showRegisterForm')->name('member.register');
    Route::post('/register','Auth\Member\RegisterController@register')->name('member.register.post');

    Route::get('/login','Auth\Member\LoginController@showLoginForm')->name('member.login');
    Route::post('/login','Auth\Member\LoginController@login')->name('member.login.post');
    Route::get('/logout','Auth\Member\LoginController@logout')->name('member.logout');

    Route::get('/reset', 'Auth\Member\ForgotPasswordController@showLinkRequestForm')->name('member.request');
    Route::post('/email', 'Auth\Member\ForgotPasswordController@sendResetLinkEmail')->name('member.email');

    Route::post('/reset', 'Auth\Member\ResetPasswordController@reset')->name('member.password.update');
    Route::get('/reset/{token}', 'Auth\Member\ResetPasswordController@showResetForm')->name('member.reset');

//    Route::get('/test/{id}'.'Front\MemberController@test');

    Route::post('/update/{id}','Front\MemberController@profileupdate');
    Route::get('/profile/{id}','Front\MemberController@profile')->name('myprofile');
});
///* dashboard all route */
Route::group(['prefix'=>'/witn','middleware' => ['admin']], function() {
    /* dashboard */
    Route::get('/back-end', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('logo','Admin\LogoController');
    Route::resource('about','Admin\AboutController');
    Route::resource('contact','Admin\ContactController');
    //slider section
    Route::resource('slider','Admin\SliderController');
    Route::get('enable/{id}', 'Admin\SliderController@enableSlider');
    Route::get('disable/{id}', 'Admin\SliderController@disableSlider');
    //rightside image of slider
    Route::resource('rightimage','Admin\RightimageController');
    Route::get('enable/rightimage/{id}', 'Admin\RightimageController@enableRightimage');
    Route::get('disable/rightimage/{id}', 'Admin\RightimageController@disableRightimage');
    //testimonal
    Route::resource('testimonal','Admin\TestimonalController');
    /***  Payment, Policy pages**/
    Route::resource('policy','Admin\PolicyController');
    /*** Services **/
    Route::resource('service','Admin\ServiceController');
    Route::get('enable/service/{id}', 'Admin\ServiceController@enableService');
    Route::get('disable/service/{id}', 'Admin\ServiceController@disableService');
    //index page sale
    Route::resource('sale','Admin\SaleController');
    //vendors
    Route::resource('category','Admin\CategoryController');
    Route::resource('partner','Admin\PartnerController');
    //messages
    Route::resource('message','Admin\MessageController');
    //become a member
    Route::resource('member','Admin\MemberController');
    Route::get('enable/member/{id}', 'Admin\MemberController@enableMember');
    Route::get('disable/member/{id}', 'Admin\MemberController@disableMember');
    //about page ko data
    Route::resource('aboutdata','Admin\AboutdataController');

});


