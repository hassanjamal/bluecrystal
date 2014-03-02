<?php
use Authority\Repo\User\UserInterface;
use Authority\Repo\Group\GroupInterface;
use Authority\Service\Form\Register\RegisterForm;
use Authority\Service\Form\User\UserForm;
use Authority\Service\Form\ResendActivation\ResendActivationForm;
use Authority\Service\Form\ForgotPassword\ForgotPasswordForm;
use Authority\Service\Form\ChangePassword\ChangePasswordForm;
use Authority\Service\Form\SuspendUser\SuspendUserForm;

class AdminUsersController extends AdminController{

	protected $user;
	protected $group;
	protected $registerForm;
	protected $userForm;
	protected $resendActivationForm;
	protected $forgotPasswordForm;
	protected $changePasswordForm;
	protected $suspendUserForm;

	/**
	 * Instantiate a new UserController
	 */
	public function __construct(
		UserInterface $user, 
		GroupInterface $group, 
		RegisterForm $registerForm, 
		UserForm $userForm,
		ResendActivationForm $resendActivationForm,
		ForgotPasswordForm $forgotPasswordForm,
		ChangePasswordForm $changePasswordForm,
		SuspendUserForm $suspendUserForm)
	{
		$this->user = $user;
		$this->group = $group;
		$this->registerForm = $registerForm;
		$this->userForm = $userForm;
		$this->resendActivationForm = $resendActivationForm;
		$this->forgotPasswordForm = $forgotPasswordForm;
		$this->changePasswordForm = $changePasswordForm;
		$this->suspendUserForm = $suspendUserForm;

		//Check CSRF token on POST
		$this->beforeFilter('csrf', array('on' => 'post'));

		// Set up Auth Filters
		// $this->beforeFilter('auth', array('only' => array('change')));
		// $this->beforeFilter('inGroup:Admins', array('only' => array('show', 'index', 'destroy', 'suspend', 'unsuspend', 'ban', 'unban', 'edit', 'update')));
		//array('except' => array('create', 'store', 'activate', 'resend', 'forgot', 'reset')));
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        if (Sentry::check())
        {   
        $title = "User Management";
        // calling the view
        return View::make('admin.users.index', compact('users', 'title'));
        }
        else
        {
         return "you are not logged in !! "  ;
        }
	}

	/**
	 * Show the form for creating a new user.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
        if(Sentry::check())
        {
            $current_user = Sentry::getUser();
            $branch_id = Sentry::getUser()->branch_id;
            if($current_user->hasAccess('user-create'))
            {
    		$title = "Create New User";
    		$mode = 'create';
    		$groups = $this->group->all();
            if($branch_id>0)
                {
                $branch_name = Branch::find($branch_id);
                }
                else
                {
                    $branch_name = "All Branch" ;
                }
    		return View::make('admin.users.create_edit', compact('title', 'mode', 'groups', 'branch_id', 'branch_name'));
            }
            else
            {
                return " you dont have enough permissions";
            }
        }
        else
        {
            return \App::abort(404);
        }
		// $currentUser = Sentry::getUser();
		// if ($currentUser->hasAccess('sdsd')) {
		// 	return "Working";
		// }
		// return "NOT WORKING";
	}

	public function postCreate()
	{
		// grabing all input in array format
		$input = Input::all();
		// grabbing group assigned to current user
		$group = Input::get('groups');
		// pop out last element i.e. group from array
		array_pop($input);
		// Form Processing
        $result = $this->registerForm->save(Input::all());
        if( $result['success'] )
        {
            // Event::fire('user.signup', array(
            // 	'email' => $result['mailData']['email'], 
            // 	'userId' => $result['mailData']['userId'], 
            //     'activationCode' => $result['mailData']['activationCode']
            // ));

            // Success!
            Session::flash('success', $result['message']);
            return Redirect::action('AdminUsersController@getCreate');

        } else {
            Session::flash('error', $result['message']);
            return Redirect::action('AdminUsersController@getCreate')
                ->withInput()
                ->withErrors( $this->registerForm->errors() );
        }
	}

	

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $user = $this->user->byId($id);

        if($user == null || !is_numeric($id))
        {
            // @codeCoverageIgnoreStart
            return \App::abort(404);
            // @codeCoverageIgnoreEnd
        }

        return View::make('users.show')->with('user', $user);
	}
    /**
     * 
     */
    public function getEdit($user)
    {
        $user = $this->user->byId($user->id);
        if($user == null || !is_numeric($user->id))
        {
            // @codeCoverageIgnoreStart
            return \App::abort(404);
            // @codeCoverageIgnoreEnd
        }
        $title = "Edit User";
        $mode = "edit";
        $groups = $this->group->all();
        return View::make('admin.users.edit', compact('title', 'mode', 'groups', 'user'));
    }

    public function postEdit($user)
    {
        if(!is_numeric($user->id))
        {
            // @codeCoverageIgnoreStart
            return \App::abort(404);
            // @codeCoverageIgnoreEnd
        }
        $input = array('id' => $user->id);
        array_push($input, Input::all());

        // Form Processing
        $result = $this->userForm->update( $input );
        // var_dump($result);

        if( $result['success'] )
        {
            // Success!
            Session::flash('success', $result['message']);
            return Redirect::action('AdminUserController@getEdit');

        } else {
            Session::flash('error', $result['message']);
            return Redirect::action('AdminUserController@getEdit')
                ->withInput()
                ->withErrors( $this->userForm->errors() );
        }
    }
	// /**
	//  * Show the form for editing the specified resource.
	//  *
	//  * @param  int  $id
	//  * @return Response
	//  */
	// public function edit($id)
	// {
 //        $user = $this->user->byId($id);

 //        if($user == null || !is_numeric($id))
 //        {
 //            // @codeCoverageIgnoreStart
 //            return \App::abort(404);
 //            // @codeCoverageIgnoreEnd
 //        }

 //        $currentGroups = $user->getGroups()->toArray();
 //        $userGroups = array();
 //        foreach ($currentGroups as $group) {
 //        	array_push($userGroups, $group['name']);
 //        }
 //        $allGroups = $this->group->all();

 //        return View::make('users.edit')->with('user', $user)->with('userGroups', $userGroups)->with('allGroups', $allGroups);
	// }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        if(!is_numeric($id))
        {
            // @codeCoverageIgnoreStart
            return \App::abort(404);
            // @codeCoverageIgnoreEnd
        }

		// Form Processing
        $result = $this->userForm->update( Input::all() );

        if( $result['success'] )
        {
            // Success!
            Session::flash('success', $result['message']);
            return Redirect::action('UserController@show', array($id));

        } else {
            Session::flash('error', $result['message']);
            return Redirect::action('UserController@edit', array($id))
                ->withInput()
                ->withErrors( $this->userForm->errors() );
        }
	}


    public function getDelete($user)
    {
       if(!is_numeric($user->id))
        {
            // @codeCoverageIgnoreStart
            return \App::abort(404);
            // @codeCoverageIgnoreEnd
        }
        // Title
        $title = "Delete User";

        // Show the page
        return View::make('admin.users.delete', compact('user', 'title'));
         
    }
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postDelete($user)
	{
        // if(!is_numeric($user->id))
        // {
        //     // @codeCoverageIgnoreStart
        //     return \App::abort(404);
        //     // @codeCoverageIgnoreEnd
        // }
        $id = $user->id;
        $logged_user_id = Sentry::getUser()->id;
        if ( $id === $logged_user_id)
        {
            Session::flash('error', 'You Can Not Delete YourSelf ');
            return Redirect::to('admin/users');
        }
        else
        {
    		if ($this->user->destroy($id))
    		{
    			Session::flash('success', 'User Deleted');
                return Redirect::to('admin/users');
            }
            else 
            {
            	Session::flash('error', 'Unable to Delete User');
                return Redirect::to('admin/users');
            }
        }
	}

	/**
	 * Activate a new user
	 * @param  int $id   
	 * @param  string $code 
	 * @return Response
	 */
	public function activate($id, $code)
	{
        if(!is_numeric($id))
        {
            // @codeCoverageIgnoreStart
            return \App::abort(404);
            // @codeCoverageIgnoreEnd
        }

		$result = $this->user->activate($id, $code);

        if( $result['success'] )
        {
            // Success!
            Session::flash('success', $result['message']);
            return Redirect::route('home');

        } else {
            Session::flash('error', $result['message']);
            return Redirect::route('home');
        }
	}

	/**
	 * Process resend activation request
	 * @return Response
	 */
	public function resend()
	{
		// Form Processing
        $result = $this->resendActivationForm->resend( Input::all() );

        if( $result['success'] )
        {
            Event::fire('user.resend', array(
				'email' => $result['mailData']['email'], 
				'userId' => $result['mailData']['userId'], 
				'activationCode' => $result['mailData']['activationCode']
			));

            // Success!
            Session::flash('success', $result['message']);
            return Redirect::route('home');
        } 
        else 
        {
            Session::flash('error', $result['message']);
            return Redirect::route('profile')
                ->withInput()
                ->withErrors( $this->resendActivationForm->errors() );
        }
	}

	/**
	 * Process Forgot Password request
	 * @return Response
	 */
	public function forgot()
	{
		// Form Processing
        $result = $this->forgotPasswordForm->forgot( Input::all() );

        if( $result['success'] )
        {
            Event::fire('user.forgot', array(
				'email' => $result['mailData']['email'],
				'userId' => $result['mailData']['userId'],
				'resetCode' => $result['mailData']['resetCode']
			));

            // Success!
            Session::flash('success', $result['message']);
            return Redirect::route('home');
        } 
        else 
        {
            Session::flash('error', $result['message']);
            return Redirect::route('forgotPasswordForm')
                ->withInput()
                ->withErrors( $this->forgotPasswordForm->errors() );
        }
	}

	/**
	 * Process a password reset request link
	 * @param  [type] $id   [description]
	 * @param  [type] $code [description]
	 * @return [type]       [description]
	 */
	public function reset($id, $code)
	{
        if(!is_numeric($id))
        {
            // @codeCoverageIgnoreStart
            return \App::abort(404);
            // @codeCoverageIgnoreEnd
        }

		$result = $this->user->resetPassword($id, $code);

        if( $result['success'] )
        {
            Event::fire('user.newpassword', array(
				'email' => $result['mailData']['email'],
				'newPassword' => $result['mailData']['newPassword']
			));

            // Success!
            Session::flash('success', $result['message']);
            return Redirect::route('home');

        } else {
            Session::flash('error', $result['message']);
            return Redirect::route('home');
        }
	}

	/**
	 * Process a password change request
	 * @param  int $id 
	 * @return redirect     
	 */
	public function change($id)
	{
        if(!is_numeric($id))
        {
            // @codeCoverageIgnoreStart
            return \App::abort(404);
            // @codeCoverageIgnoreEnd
        }

		$data = Input::all();
		$data['id'] = $id;

		// Form Processing
        $result = $this->changePasswordForm->change( $data );

        if( $result['success'] )
        {
            // Success!
            Session::flash('success', $result['message']);
            return Redirect::route('home');
        } 
        else 
        {
            Session::flash('error', $result['message']);
            return Redirect::action('UserController@edit', array($id))
                ->withInput()
                ->withErrors( $this->changePasswordForm->errors() );
        }
	}

	/**
	 * Process a suspend user request
	 * @param  int $id 
	 * @return Redirect     
	 */
	public function suspend($id)
	{
        if(!is_numeric($id))
        {
            // @codeCoverageIgnoreStart
            return \App::abort(404);
            // @codeCoverageIgnoreEnd
        }

		// Form Processing
        $result = $this->suspendUserForm->suspend( Input::all() );

        if( $result['success'] )
        {
            // Success!
            Session::flash('success', $result['message']);
            return Redirect::to('users');

        } else {
            Session::flash('error', $result['message']);
            return Redirect::action('UserController@suspend', array($id))
                ->withInput()
                ->withErrors( $this->suspendUserForm->errors() );
        }
	}

	/**
	 * Unsuspend user
	 * @param  int $id 
	 * @return Redirect     
	 */
	public function unsuspend($id)
	{
        if(!is_numeric($id))
        {
            // @codeCoverageIgnoreStart
            return \App::abort(404);
            // @codeCoverageIgnoreEnd
        }

		$result = $this->user->unSuspend($id);

        if( $result['success'] )
        {
            // Success!
            Session::flash('success', $result['message']);
            return Redirect::to('users');

        } else {
            Session::flash('error', $result['message']);
            return Redirect::to('users');
        }
	}

	/**
	 * Ban a user
	 * @param  int $id 
	 * @return Redirect     
	 */
	public function ban($id)
	{
        if(!is_numeric($id))
        {
            // @codeCoverageIgnoreStart
            return \App::abort(404);
            // @codeCoverageIgnoreEnd
        }

		$result = $this->user->ban($id);

        if( $result['success'] )
        {
            // Success!
            Session::flash('success', $result['message']);
            return Redirect::to('users');

        } else {
            Session::flash('error', $result['message']);
            return Redirect::to('users');
        }
	}

	public function unban($id)
	{
        if(!is_numeric($id))
        {
            // @codeCoverageIgnoreStart
            return \App::abort(404);
            // @codeCoverageIgnoreEnd
        }
        
		$result = $this->user->unBan($id);

        if( $result['success'] )
        {
            // Success!
            Session::flash('success', $result['message']);
            return Redirect::to('users');

        } else {
            Session::flash('error', $result['message']);
            return Redirect::to('users');
        }
	}

    /**
     * Show the login form
     */
    public function getLogin()
    {
        // if user is logged in then index page else login page
        if( ! Sentry::check())
        {
            return View::make('site/user/login');
        }
        else
        {
            return Redirect::to('/');
        }
    }
    /**
     * 
     */
    public function postLogin()
    {
        $credentials = array(
        'email' => Input::get('email'),
        'password' => Input::get('password')
        );
        try
        {
            $user = Sentry::authenticate($credentials, false);
            if ($user)
            {
                return View::make('site/blog/index');
            }
        }
        catch(\Exception $e)
        {
            return Redirect::to('user/login')
                 ->withInput(Input::except('password'))
                 ->withErrors(array('login' => $e->getMessage()));
        }
    }
    /**
     * 
     */
    public function getLogout()
    {
        Sentry::logout();

        return Redirect::to('/');
    }
    /**
	 * getting data for displaying all groups
	 */
	public function getData()
	{
        if(Sentry::check())
        {
        $branch_id = Sentry::getUser()->branch_id;
        if(Sentry::getUser()->isSuperUser())
        {
            $users = User::select(array('users.id','users.first_name','users.last_name','users.email', 'users.activated', 'users.created_at'));
        }
        else
        {
            $users = User::select(array('users.id','users.first_name','users.last_name','users.email', 'users.activated', 'users.created_at'))
                            ->where('users.branch_id', $branch_id);
        }

        return Datatables::of($users)
        ->edit_column('activated',
                      '@if($activated)
                            Yes
                        @else
                            No <a href="{{{ URL::to(\'admin/users/\' . $id . \'/activate\' ) }}}" class="iframe btn btn-xs btn-info">activate</a>
                                <a href="{{{ URL::to(\'admin/users/\' . $id . \'/resend\' ) }}}" class="iframe btn btn-xs btn-warning">resend</a>
                        @endif

                      ')
        // ->add_column('actions', 
        //              '
        //              <a href="{{{ URL::to(\'admin/users/\' . $id . \'/edit\' ) }}}" class="iframe btn btn-xs btn-default">edit</a>
                                
        //             // <a href="{{{ URL::to(\'admin/users/\' . $id . \'/delete\' ) }}}" class="iframe btn btn-xs btn-danger">delete</a>
                                   
        //             ')

        ->remove_column('id')
        ->remove_column('last_name')

        ->make();
        } // end if sentry check condition

	}

}