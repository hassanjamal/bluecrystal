<?php

class AdminRdschemesController extends AdminController {

    /**
     * User Model
     * @var User
     */
    protected $user;
    /**
    * Rdscheme Model
    * @var Role
    */
    protected $rdscheme;


    /**
     * Associate Model
     * @var Associate
     */
    protected $associate;

    /**
     * Inject the models.
     * @param User $user
     * @param Role $role
     * @param Permission $permission
     * @param Fdscheme $fdscheme
     */
    public function __construct(User $user,  Rdscheme $rdscheme  )
    {
        parent::__construct();
        $this->user = $user;
        $this->rdscheme = $rdscheme;

    }
    /**
     * 
     */
    public function getIndex()
    {
        if(Sentry::check())
        {
            // Title
            $title = "RD :: ".Lang::get('admin/scheme/title.scheme_management');

            // Grab all the users
            $users = $this->user;
            //Grab all rdschemes
            $rdscheme = $this->rdscheme;

            // Show the page
            return View::make('admin.rdschemes.index', compact('users','rdscheme', 'title'));
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
            // RdSchemes
            $rdscheme = $this->rdscheme;

            // Title
            $title = "RD :: ".Lang::get('admin/scheme/title.create_a_new_scheme');

            // Mode
            $mode = 'create';

            // Show the page
            return View::make('admin/rdschemes/create', compact(  'title', 'mode', 'rdscheme'));
        }
        else
        {
            return Redirect::to('admin/rd-schemes')->with('error', " You don't have enough permission ");   
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
            $this->rdscheme->name = Input::get( 'name' );
            $this->rdscheme->years = Input::get( 'years' );
            $this->rdscheme->interest = Input::get( 'interest' );

            // Save if valid. 
            $this->rdscheme->save();

            if ( $this->rdscheme->id )
            {
                
                // Redirect to the new rdscheme page
                return Redirect::to('admin/rd-schemes/' . $this->rdscheme->id . '/edit')->with('success', Lang::get('admin/scheme/messages.create.success'));
            }
            else
            {
                // Get validation errors (see Ardent package)
                $error = $this->rdscheme->errors()->all();


                return Redirect::to('admin/rd-schemes/create')
                    ->with( 'error', $error );
            }
        }
        else
        {
            return Redirect::to('admin/rd-schemes')->with('error', " You don't have enough permission ");   
        }
    }
    /**
     * 
     */

    public function getEdit($rdscheme)
    {
        if(Sentry::getUser()->isSuperUser())
        {
            if ( $rdscheme->id )
            {

                // Title
                $title = "RD :: ".Lang::get('admin/scheme/title.scheme_update');
                // mode
                $mode = 'edit';

                return View::make('admin/rdschemes/create', compact('rdscheme', 'title', 'mode'));
            }
            else
            {
                return Redirect::to('admin/rdschemes')->with('error', Lang::get('admin/scheme/messages.does_not_exist'));
            }
        }
        else
        {
            return Redirect::to('admin/rd-schemes')->with('error', " You don't have enough permission ");   
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $user
     * @return Response
     */
    public function postEdit($rdscheme)
    {
        if(Sentry::getUser()->isSuperUser())
        {
            $rdscheme->name = Input::get( 'name' );
            $rdscheme->years = Input::get( 'years' );
            $rdscheme->interest = Input::get( 'interest' );

            // Save if valid. 

            if ( $rdscheme->save() )
            {
                
                // Redirect to the new rdscheme page
                return Redirect::to('admin/rd-schemes/' . $rdscheme->id . '/edit')->with('success', Lang::get('admin/scheme/messages.edit.success'));
            }
            else
            {
                // Get validation errors (see Ardent package)
                $error = $rdscheme->errors()->all();
                
                return Redirect::to('admin/rd-schemes/' . $rdscheme->id . '/edit')
                    ->with( 'error', $error );
            }
        }
        else
        {
            return Redirect::to('admin/rd-schemes')->with('error', " You don't have enough permission ");   
        }
    }
    /**
     * 
     */

    public function getDetail($rdscheme)
    {
        if ( $rdscheme->id )
        {
            // $roles = $this->role->all();
            // $permissions = $this->permission->all();

            // Title
            $title = Lang::get('admin/scheme/title.scheme_details') . ' For '.$rdscheme->name;

            return View::make('admin/rdschemes/details', compact('rdscheme', 'title'));
        }
        else
        {
            return Redirect::to('admin/rdschemes')->with('error', Lang::get('admin/scheme/messages.does_not_exist'));
        }
    }
    /**
     * 
     */
    public function getData()
    {
        
        $rdschemes = Rdscheme::Select(array('rdschemes.id','rdschemes.name','rdschemes.years','rdschemes.interest'));
        if(Sentry::getUser()->isSuperUser())
        {
            return Datatables::of($rdschemes)
            ->edit_column('interest','{{ number_format($interest,2)}}')
            ->add_column('actions', '<a href="{{{ URL::to(\'admin/rd-schemes/\'. $id . \'/detail\') }}}" class="iframe btn btn-xs btn-default">{{{ Lang::get(\'button.details\') }}}</a> <a href="{{{ URL::to(\'admin/rd-schemes/\'. $id . \'/edit\') }}}" class="iframe btn btn-xs btn-warning">{{{ Lang::get(\'button.edit\') }}}</a> ')
            ->remove_column('id')
            ->make();
        }
        else
        {
         return Datatables::of($rdschemes)
            ->edit_column('interest','{{ number_format($interest,2)}}')
            ->add_column('actions', '<a href="{{{ URL::to(\'admin/rd-schemes/\'. $id . \'/detail\') }}}" class="iframe btn btn-xs btn-warning">{{{ Lang::get(\'button.details\') }}}</a>')
            ->remove_column('id')
            ->make();   
        }
    }

}
