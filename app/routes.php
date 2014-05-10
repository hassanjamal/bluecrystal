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
/** ------------------------------------------
 *  Route model binding
 *  ------------------------------------------
 */
Route::model('user', 'User');
Route::model('group', 'Groups');
Route::model('fdscheme', 'Fdscheme');
Route::model('rdscheme', 'Rdscheme');
Route::model('branch', 'Branch');
Route::model('rank', 'Rank');
Route::model('commision', 'Commision');
Route::model('policy', 'Policy');
Route::model('associates', 'Associate');
Route::model('rd_scheme_payment', 'Rd_scheme_payment');

/** ------------------------------------------
 *  Route constraint patterns
 *  ------------------------------------------
 */
Route::pattern('user', '[0-9]+');
Route::pattern('groups', '[0-9]+');
Route::pattern('fdscheme', '[0-9]+');
Route::pattern('rdscheme', '[0-9]+');
Route::pattern('associates', '[0-9]+');
Route::pattern('rank', '[0-9]+');
Route::pattern('commision', '[0-9]+');
Route::pattern('policy', '[0-9]+');



// User Routes
// Route::get('register', 'UserController@create');
// Route::get('users/{id}/activate/{code}', 'UserController@activate')->where('id', '[0-9]+');
// Route::get('resend', array('as' => 'resendActivationForm', function()
// {
// 	return View::make('users.resend');
// }));
// Route::post('resend', 'UserController@resend');
// Route::get('forgot', array('as' => 'forgotPasswordForm', function()
// {
// 	return View::make('users.forgot');
// }));
// Route::post('forgot', 'UserController@forgot');
// Route::post('users/{id}/change', 'UserController@change');
// Route::get('users/{id}/reset/{code}', 'UserController@reset')->where('id', '[0-9]+');
// Route::get('users/{id}/suspend', array('as' => 'suspendUserForm', function($id)
// {
// 	return View::make('users.suspend')->with('id', $id);
// }));
// Route::post('users/{id}/suspend', 'UserController@suspend')->where('id', '[0-9]+');
// Route::get('users/{id}/unsuspend', 'UserController@unsuspend')->where('id', '[0-9]+');
// Route::get('users/{id}/ban', 'UserController@ban')->where('id', '[0-9]+');
// Route::get('users/{id}/unban', 'UserController@unban')->where('id', '[0-9]+');
// Route::resource('users', 'UserController');


/** ------------------------------------------
 *  Admin Routes
 *  ------------------------------------------
 */
Route::group(array('prefix' => 'admin'), function()
{
    #FD Scheme
    Route::get('fd-schemes/{fdscheme}/show','AdminFdschemesController@getShow');
    Route::get('fd-schemes/{fdscheme}/edit', 'AdminFdschemesController@getEdit');
    Route::post('fd-schemes/{fdscheme}/edit', 'AdminFdschemesController@postEdit');
    Route::get('fd-schemes/{fdscheme}/detail', 'AdminFdschemesController@getDetail');
    Route::controller('fd-schemes', 'AdminFdschemesController');

    #FD Scheme
    Route::get('rd-schemes/{rdscheme}/show','AdminRdschemesController@getShow');
    Route::get('rd-schemes/{rdscheme}/edit', 'AdminRdschemesController@getEdit');
    Route::post('rd-schemes/{rdscheme}/edit', 'AdminRdschemesController@postEdit');
    Route::get('rd-schemes/{rdscheme}/detail', 'AdminRdschemesController@getDetail');
    Route::controller('rd-schemes', 'AdminRdschemesController');

    #Branch
    Route::post('branch/create', 'AdminBranchController@save');
    Route::post('branch/{branch}/edit', 'AdminBranchController@update');
    Route::get('branch/data', 'AdminBranchController@getData');
    Route::resource('branch', 'AdminBranchController');

    #Associates
    Route::get('associates/{associates}/tree', 'AdminAssociatesController@getTree');
    Route::get('associates/{associates}/detail', 'AdminAssociatesController@getDetail');
    Route::get('associates/{associates}/receipt', 'AdminAssociatesController@getReceipt');
    Route::get('associates/{associates}/welcome', 'AdminAssociatesController@getWelcome');
    Route::post('associates/create', 'AdminAssociatesController@store');
    Route::get('associates/data' , 'AdminAssociatesController@getData');
    Route::get('associates/commission' , 'AdminAssociatesController@getCommision');
    Route::post('associates/commission' , 'AdminAssociatesController@postCommission');
    Route::get('associates/notification' , 'AdminAssociatesController@getNotification');
    Route::get('associates/add_to_rank_list' , 'AdminAssociatesController@getRanklist');
    Route::get('associates/add_to_introducer_id' , 'AdminAssociatesController@getIntroducer');
    Route::post('associates/add_to_introducer_id' , 'AdminAssociatesController@postIntroducer');
    Route::post('associates/add_to_associate_id' , 'AdminAssociatesController@postAssociate');
    Route::post('associates/check_mobile_no' , 'AdminAssociatesController@postCheckMobileNo');
    Route::resource('associates' , 'AdminAssociatesController');

    #Policy
    Route::get('policy/{policy}/commision', 'AdminPolicyController@getCommision');
    Route::get('policy/{policy}/detail', 'AdminPolicyController@getDetail');
    Route::get('policy/{policy}/receipt', 'AdminPolicyController@getReceipt');
    Route::get('policy/{policy}/welcome', 'AdminPolicyController@getWelcome');
    Route::post('policy/create', 'AdminPolicyController@store');
    Route::get('policy/data' , 'AdminPolicyController@getData');
    Route::get('policy/notification' , 'AdminPolicyController@getNotification');
    Route::get('policy/rd_schemes' , 'AdminPolicyController@getAllRdscheme');
    Route::get('policy/rd_schemes/{policy}/Installments' , 'AdminPolicyController@getAllRdschemeInstallements');
    Route::get('policy/rd_schemes/{policy}/RdSchmeInstallments' , 'AdminPolicyController@getRdSchmeInstallments');
    Route::get('policy/rd_schemes/{policy}/PayInstallment' , 'AdminPolicyController@getPayInstallment');
    Route::post('policy/rd_schemes/{policy}/PayInstallment' , 'AdminPolicyController@postPayInstallment');
    Route::get('policy/rd_schemes/{policy}/Installment/{rd_scheme_payment}/Receipt' , 'AdminPolicyController@getInstallmentReceipt');
    Route::get('policy/rddata' , 'AdminPolicyController@getRdData');
    Route::get('policy/add_to_fd_scheme_id' , 'AdminPolicyController@getFdscheme');
    Route::post('policy/add_to_fd_scheme_id' , 'AdminPolicyController@postFdscheme');
    Route::get('policy/add_to_rd_scheme_id' , 'AdminPolicyController@getRdscheme');
    Route::get('policy/add_to_associate_id' , 'AdminPolicyController@getAssociate');
    Route::post('policy/add_to_associate_id' , 'AdminPolicyController@postAssociate');
    Route::resource('policy' , 'AdminPolicyController');

     #Rank
    Route::get('rank/{rank}/show','AdminRankController@getShow');
    Route::get('rank/{rank}/edit', 'AdminRankController@getEdit');
    Route::post('rank/{rank}/edit', 'AdminRankController@postEdit');
    Route::get('rank/{rank}/detail', 'AdminRankController@getDetail');
    Route::get('rank/{rank}/self_commision', 'AdminRankController@getSelfcommision');
    Route::get('rank/{rank}/team_commision', 'AdminRankController@getTeamcommision');
    Route::post('rank/{rank}/self_commision', 'AdminRankController@postSelfcommision');
    Route::post('rank/{rank}/team_commision', 'AdminRankController@postTeamcommision');
    Route::controller('rank', 'AdminRankController');

    # User Management
    Route::get('users/{user}/show', 'AdminUsersController@getShow');
    Route::get('users/{user}/edit', 'AdminUsersController@getEdit');
    Route::post('users/{user}/edit', 'AdminUsersController@postEdit');
    Route::get('users/{user}/delete', 'AdminUsersController@getDelete');
    Route::post('users/{user}/delete', 'AdminUsersController@postDelete');
    Route::controller('users', 'AdminUsersController');

	# Group Routes
    Route::get('groups/{group}/show', 'AdminGroupController@getShow');
    Route::get('groups/{group}/edit', 'AdminGroupController@getEdit');
    Route::post('groups/{group}/edit', 'AdminGroupController@postEdit');
    Route::get('groups/{group}/delete', 'AdminGroupController@getDelete');
    Route::post('groups/{group}/delete', 'AdminGroupController@postDelete');
	Route::controller('groups', 'AdminGroupController');

    # Admin Dashboard
    Route::controller('/', 'AdminDashboardController');
});



//:: User Account Routes ::
Route::get('user/login', array('as'=>'login', 'uses' => 'UserController@getLogin'));
Route::post('user/login', 'UserController@postLogin');

# User RESTful Routes (Login, Logout, Register, etc)
Route::controller('user', 'UserController');


//:: Application Routes ::
Route::get('/', array('as' => 'home','uses' => 'MainController@getIndex'));
Route::controller('/' , 'MainController');


App::missing(function($exception)
{
    App::abort(404, 'Page not found');
    return Response::view('errors.missing', array(), 404);
});
