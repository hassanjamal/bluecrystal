<?php

class AdminFdschemesController extends AdminController {

    /**
     * User Model
     * @var User
     */
    protected $user;
    /**
    * Fdscheme Model
    * @var Role
    */
    protected $fdscheme;

    /**
     * Inject the models.
     * @param User $user
     * @param Role $role
     * @param Permission $permission
     * @param Fdscheme $fdscheme
     */
    public function __construct(User $user, Fdscheme $fdscheme  )
    {
        parent::__construct();
        $this->user = $user;
        $this->fdscheme = $fdscheme;

    }
    /**
     * 
     */
    public function getIndex()
    {
        if(Sentry::check())
        {
            // Title
            $title = "FD :: ".Lang::get('admin/scheme/title.scheme_management');

            // Grab all the users
            $users = $this->user;
            $fdscheme = $this->fdscheme;

            // Show the page
            return View::make('admin.fdschemes.index', compact('users','fdscheme', 'title'));    
        }
        else
        {
          return Redirect::to('user/login')->with('error', " You are not logged in ");  
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
        if(Sentry::getUser()->isSuperUser())
        {    
             // FD Scheme
            $fdschemes = $this->fdscheme->all();

            // Title
            $title = Lang::get('admin/scheme/title.create_a_new_scheme');

            // Mode
            $mode = 'create';

            // Show the page
            return View::make('admin/fdschemes/create', compact(  'title', 'mode', 'fdschemes'));
        }
        else
        {
            return Redirect::to('admin/fd-schemes')->with('error', " You don't have enough permission ");   
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate()
    {
        if(Sentry::getUser()->isSuperUser())
        { 
            $this->fdscheme->name = Input::get( 'name' );
            $this->fdscheme->years = Input::get( 'years' );
            $this->fdscheme->interest = Input::get( 'interest' );

            // Save if valid. 
            $this->fdscheme->save();

            if ( $this->fdscheme->id )
            {

                // Redirect to the new fdscheme page
                return Redirect::to('admin/fd-schemes/' . $this->fdscheme->id . '/edit')->with('success', Lang::get('admin/scheme/messages.create.success'));
            }

            else
            {
                // Get validation errors (see Ardent package)
                $error = $this->fdscheme->errors()->all();


                return Redirect::to('admin/fd-schemes/create')
                    ->with( 'error', $error );
            }
        }
        else
        {
            return Redirect::to('admin/fd-schemes')->with('error', " You don't have enough permission ");   
        }    
    }
    /**
     * 
     */
    public function getEdit($fdscheme)
    {
        if(Sentry::getUser()->isSuperUser())
        {
            if ( $fdscheme->id )
            {

                // Title
                $title = Lang::get('admin/scheme/title.scheme_update');
                // mode
                $mode = 'edit';

                return View::make('admin/fdschemes/create', compact('fdscheme', 'title', 'mode'));
            }
            else
            {
                return Redirect::to('admin/fdschemes')->with('error', Lang::get('admin/scheme/messages.does_not_exist'));
            }
        }
        else
        {
            return Redirect::to('admin/fd-schemes')->with('error', " You don't have enough permission ");   
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $user
     * @return Response
     */
    public function postEdit($fdscheme)
    {
        if(Sentry::getUser()->isSuperUser())
        {
            $fdscheme->name = Input::get( 'name' );
            $fdscheme->years = Input::get( 'years' );
            $fdscheme->interest = Input::get( 'interest' );
            $fdscheme->special_interest = Input::get( 'special_interest' );


            if ( $fdscheme->save() )
            {
                
                // Redirect to the new fdscheme page
                return Redirect::to('admin/fd-schemes/' . $fdscheme->id . '/edit')->with('success', Lang::get('admin/scheme/messages.edit.success'));
            }
            else
            {
                // Get validation errors (see Ardent package)
                $error = $fdscheme->errors()->all();
                
                return Redirect::to('admin/fd-schemes/' . $fdscheme->id . '/edit')
                    ->with( 'error', $error );
            }
        }
        else
        {
            return Redirect::to('admin/fd-schemes')->with('error', " You don't have enough permission ");   
        }
    }
    /**
     * 
     */
    public function getDetail($fdscheme)
    {
        if ( $fdscheme->id )
        {

            // Title
            $title = Lang::get('admin/scheme/title.scheme_details') . ' For '.$fdscheme->name;

            return View::make('admin/fdschemes/details', compact('fdscheme', 'title'));
        }
        else
        {
            return Redirect::to('admin/fd-schemes')->with('error', Lang::get('admin/scheme/messages.does_not_exist'));
        }
    }
    /**
     * 
     */
    public function getData()
    {
        $fdschemes = Fdscheme::Select(array('fdschemes.id','fdschemes.name','fdschemes.years','fdschemes.interest', 'fdschemes.special_interest'));
        if(Sentry::getUser()->isSuperUser())
        {
            return Datatables::of($fdschemes)
            ->edit_column('interest','{{ number_format($interest,2)}}')
            ->edit_column('special_interest','{{ number_format($special_interest,2)}}')
            ->add_column('actions', '<a href="{{{ URL::to(\'admin/fd-schemes/\'. $id . \'/detail\') }}}" class="iframe btn btn-xs btn-info">{{{ Lang::get(\'button.details\') }}}</a> <a href="{{{ URL::to(\'admin/fd-schemes/\'. $id . \'/edit\') }}}" class="iframe btn btn-xs btn-danger">{{{ Lang::get(\'button.edit\') }}}</a> ')
            ->remove_column('id')
            ->make();
        }
        else
        {
            return Datatables::of($fdschemes)
            ->edit_column('interest','{{ number_format($interest,2)}}')
            ->edit_column('special_interest','{{ number_format($special_interest,2)}}')
            ->add_column('actions', '<a href="{{{ URL::to(\'admin/fd-schemes/\'. $id . \'/detail\') }}}" class="iframe btn btn-xs btn-info">{{{ Lang::get(\'button.details\') }}}</a> ')
            ->remove_column('id')
            ->make();   
        }
    }

}
