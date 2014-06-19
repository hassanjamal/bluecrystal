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
		$this->user                 = $user;
		$this->group                = $group;
		$this->registerForm         = $registerForm;
		$this->userForm             = $userForm;
		$this->resendActivationForm = $resendActivationForm;
		$this->forgotPasswordForm   = $forgotPasswordForm;
		$this->changePasswordForm   = $changePasswordForm;
		$this->suspendUserForm      = $suspendUserForm;

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
                $branch = Branch::lists('name' ,'id');
                $groups = Groups::lists('name', 'name');
                $branch_name = Branch::where('id','$branch_id')->pluck('name');
                return View::make('admin.users.create_edit', compact('title', 'mode', 'groups','branch', 'branch_id', 'branch_name'));
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
	}

	public function postCreate()
	{
        if(Sentry::getUser()->isSuperUser()){
            Sentry::getUserProvider()->create(array(
                'email'      => Input::get('email'),
                'password'   => Input::get('password'),            
                'activated'  => 1,
                'first_name' => Input::get('first_name'),            
                'last_name'  => Input::get('last_name'),            
                'branch_id'  => Input::get('branch_id'),            
            ));

            $user_created = Sentry::getUserProvider()->findByLogin(Input::get('email'));
            $user_group   = Sentry::getGroupProvider()->findByName(Input::get('group_name'));
            $user_created->addGroup($user_group);
            if ($user_created->addGroup($user_group)) {
                return Redirect::to('admin/users/notification')
                    ->with( 'success', "User Created Successfully ");
            }
            else{
                $error = "something went wrong while storing user data";
                return Redirect::to('admin/users/create')->with('error', $error);

            }
        }
        else{
            $error = "You dont have enough permissions";
            return Redirect::to('admin/users/create')->with('error', $error);
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
        //
	}
    /**
     * 
     */
    public function getEdit($user)
    {
        if(Sentry::check())
        {
            if(Sentry::getUser()->hasAccess('user-create'))
            {
                $title = "Create New User";
                $mode = 'edit';
                $branch = Branch::lists('name' ,'id');
                $groups = Groups::lists('name', 'name');
                $branch_name = Branch::where('id','$branch_id')->pluck('name');
                return View::make('admin.users.create_edit', compact('title','user', 'mode', 'groups','branch'));
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
    }

    public function postEdit($user)
    {
        try{
            $user = Sentry::findUserById($user->id);

            $user->first_name = Input::get('first_name');
            $user->last_name = Input::get('last_name');
            $user->branch_id = Input::get('branch_id');

            if ($user->save()) {
                //update user group
                $user_updated = Sentry::getUserProvider()->findByLogin(Input::get('email'));
                $user_group   = Sentry::getGroupProvider()->findByName(Input::get('group_name'));
                $user_updated->addGroup($user_group);
                //redirect to notification 
                return Redirect::to('admin/users/notification')
                    ->with( 'success', "User updated Successfully ");
            }
//             else{
//                 $error = "something went wrong while storing user data";
//                 return Redirect::to('admin/users/create')->with('error', $error);
//
//             }
        }
        catch(Cartalyst\Sentry\Users\UserNotFoundException $e){
                return Redirect::to('admin/users/notification')
                    ->with( 'error', "User not found");
        }
    }
            
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
        ->add_column('actions', 
                     '
                     <a href="{{{ URL::to(\'admin/users/\' . $id . \'/edit\' ) }}}" class="iframe btn btn-xs btn-warning">edit</a>
                     <a href="{{{ URL::to(\'admin/users/\' . $id . \'/changepassword\' ) }}}" class="iframe btn btn-xs btn-info">Change Password</a>
                    ')

        ->remove_column('id')
        ->remove_column('last_name')

        ->make();
        } // end if sentry check condition

	}

    public function getNotification()
    {
        $title = "";

        return View::make('admin/notification/index', compact('title'));
        // return " hello";
    }


    public function getChangepassword($user){
        if(Sentry::check()){
            $title = "User Management :: Change Password";
            return View::make('admin.users.changepassword', compact('user', 'title'));
        }
    }
    /**
     * [postChangepassword description]
     * @param  [type] $user [description]
     * @return [type]       [description]
     */
    public function postChangepassword($user){
        if(Sentry::check()){
            $update_user = Sentry::findUserById($user->id);
            $update_user->password = Input::get('password');
            if($update_user->save()){
                return Redirect::to('admin/users/notification')->with( 'success', "Password Updated Successfully" );
            }
            else{
                return Redirect::to('admin/users/notification')->with( 'error', "Something Went Wrong" );
            }
        }
    }


}
