<?php
// pages site. 
Route::get('/', ['uses' => 'HomeController@index', 'as' => 'index']);
Route::get('about', ['uses' => 'AboutController@index', 'as' => 'about']);
Route::get('client', ['uses' => 'ClientController@index', 'as' => 'client']);

// admin authentication
Route::group(array('prefix' => 'admin'), function(){
    Route::get('login', array('as' => 'admin.login', 'uses' => 'AdminAuthController@getLogin'));
    Route::post('login', array('as' => 'admin.login.post', 'uses' => 'AdminAuthController@postLogin'));
    Route::get('logout', array('as' => 'admin.logout', 'uses' => 'AdminAuthController@getLogout'));
});

// admin panel
Route::group(['prefix' => 'admin', 'before' => 'auth'], function ()
{
	// Route::resource('post',['uses' => 'AdminPostControl', 'as' => 'admin.post']);
	// Route::resource('about',['uses' => ]);
	// Route::resource('posts', 'AdminPostsController@getIndex');
});

// Route Group for member before login
Route::group(array('before' => 'auth'), function ()
{
	Route::group(array('before' => 'csrf'), function ()
	{
		Route::post('/member/change-password', array(
			'uses' => 'MembersController@postChangePass',
			'as' => 'member-change-password-post'
		));	
	});
	#change password (Get)
	Route::get('/member/change-password', array(
			'uses' => 'MembersController@getChangePass',
			'as' => 'member-change-password'
		));
	# sign out (GET)
	Route::get('/member/logout', array(
		'uses' => 'MembersController@getLogout',
		'as' => 'member-sign-out'
	));
});

// Route Group for member after login
Route::group(array('before' => 'guest'), function()
{
	// csrf protection group
	Route::group(array('before' => 'csrf'),function()
	{
		// Create member(POST)
		Route::post('/member/create', array(
		'uses' => 'MembersController@postCreate',
		'as' => 'member-create-post'
		));
		// Sign in (POST)
		Route::post('/member/sign-in', array(
			'uses' => 'MembersController@postLogin',
			'as' => 'member-sign-in-post'
		));
		#Forgot password (POST)
		Route::post('/member/forgot-password', array(
			'uses' => 'MembersController@postForgotPass',
			'as' => 'member-forgot-password-post'
		));
	});

	#forgot password (GET)
	Route::get('/member/forgot-password', array(
			'uses' => 'MembersController@getForgotPass',
			'as' => 'member-forgot-password'
	));
	Route::get('/member/recover/{code}', array(
		'uses' => 'MembersController@getRecover',
		'as' => 'member-recover'
	));
	// Sign in (GET)
	Route::get('/member/sign-in', array(
			'uses' => 'MembersController@getLogin',
			'as' => 'member-sign-in'
		));
	// create member (GET)
	Route::get('/member/create', array(
		'uses' => 'MembersController@getCreate',
		'as' => 'member-create'
	));	

	Route::get('/member/activate/{code}', array(
			'uses' => 'MembersController@getActivate',
			'as' => 'member-activate'
		));

});
