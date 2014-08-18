<?php

class AdminBranchController extends AdminController {

    /**
     * User Model
     * @var User
     */
    protected $user;
    /**
    * branch Model
    * @var Role
    */
    protected $branch;

    /**
     * Inject the models.
     * @param User $user
     * @param Fdscheme $fdscheme
     */
    public function __construct(User $user,  Branch $branch  )
    {
        parent::__construct();
        $this->user = $user;
        $this->branch = $branch;

    }

   
    /**
     * 
     */
    public function Index()
    {
        if(Sentry::check())
        {

            // Title
            $title = Lang::get('admin/branch/title.branch_management');

            // Show the page
            return View::make('admin.branch.index', compact('title'));    
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if(Sentry::check())
         {
            if(Sentry::getUser()->isSuperUser())
            {   
            $branches = $this->branch->all();
            // Title
            $title = Lang::get('admin/branch/title.create_a_new_branch');
            // Mode
            $mode = 'create';
            // Show the page
            return View::make('admin/branch/create', compact(  'title', 'mode', 'branches'));
            }
            else
            {
                $title = " You dont have enough permission";
                return View::make('admin/layouts/modal', compact('title'));
            }
        }
        else
        {
            return Redirect::to('user/login')->with('error', " You are not logged in ");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function save()
    {
        $this->branch->name         = Input::get('name');
        $this->branch->address      = Input::get('address');
        $this->branch->city         = Input::get('city');
        $this->branch->state        = Input::get('state');
        $this->branch->pincode      = Input::get('pincode');
        $this->branch->managername  = Input::get('managername');
        $this->branch->managerphone = Input::get('managerphone');
        $this->branch->email        = Input::get('email');
        $this->branch->phone        = Input::get('phone');

        //save if valid
        $this->branch->save();

        if ( $this->branch->id )
        {

            // Redirect to the new branch page
            return Redirect::to('admin/branch/' . $this->branch->id . '/edit')->with('success', Lang::get('admin/branch/messages.create.success'));
        }
        else
        {
            // Get validation errors (see Ardent package)
            $error = $this->branch->errors()->all();

            return Redirect::to('admin/branch/create')
                ->with( 'error', $error );
        }    
    }

    public function edit($branch)
    {
        if(Sentry::check())
         {
            // $admin_group = Sentry::findGroupByName('Branch-Admin');
            // if((Sentry::getUser()->isSuperUser() ||  Sentry::getUser()->hasAccess('branch-edit') || (Sentry::getUser()->inGroup($admin_group)) && Sentry::getUser()->branch_id == $branch->id))
            if(Sentry::getUser()->hasAccess('branch-edit'))
            {  
                if ( $branch->id )
                {
                    // Title
                    $title = Lang::get('admin/branch/title.branch_update');
                    // mode
                    $mode = 'edit';

                    return View::make('admin/branch/create', compact('branch', 'title', 'mode'));
                }
                else
                {
                    return Redirect::to('admin/branch')->with('error', Lang::get('admin/scheme/messages.does_not_exist'));
                }
            }
            else
            {
                return Redirect::to('admin/branch')->with('error', 'You dont have enough permission for other branches');
            }
        }
        else
        {
            return Redirect::to('user/login')->with('error', " You are not logged in ");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $user
     * @return Response
     */
    public function update($branch)
    {
        $branch->name = Input::get('name');
        $branch->address = Input::get('address');
        $branch->city = Input::get('city');
        $branch->state = Input::get('state');
        $branch->pincode = Input::get('pincode');
        $branch->managername = Input::get('managername');
        $branch->managerphone = Input::get('managerphone');
        $branch->email = Input::get('email');
        $branch->phone = Input::get('phone');

        // Save if valid. 

        if ( $branch->save() )
        {
            
            // Redirect to the new branch page
            return Redirect::to('admin/branch/' . $branch->id . '/edit')->with('success', Lang::get('admin/branch/messages.edit.success'));
        }
        else
        {
            // Get validation errors (see Ardent package)
            $error = $branch->errors()->all();
            
            return Redirect::to('admin/branch/' . $branch->id . '/edit')
                ->with( 'error', $error );
        }
    }
    /**
     * 
     */
    public function show($branch)
    {
        if(Sentry::check())
         {
            // $admin_group = Sentry::findGroupByName('Branch-Admin');
            // if((Sentry::getUser()->isSuperUser() ||  Sentry::getUser()->hasAccess('branch-edit') || (Sentry::getUser()->inGroup($admin_group)) && Sentry::getUser()->branch_id == $branch->id) )
            if(Sentry::getUser()->hasAccess('branch-view'))
            {  
                if ( $branch->id )
                {
                    // Title
                    $title = $branch->name;
                    return View::make('admin/branch/details', compact('branch', 'title'));
                }
                else
                {
                    return Redirect::to('admin/branch')->with('error', Lang::get('admin/scheme/messages.does_not_exist'));
                }
            }
            else
            {
                return Redirect::to('admin/branch')->with('error', 'You dont have enough permission for other branches');
            }
        }
        else
        {
            return Redirect::to('user/login')->with('error', " You are not logged in ");
        }

    }
    /**
     * 
     */
    public function getData()
    {
        if(Sentry::check())
        {
            $branch_id = Sentry::getUser()->branch_id;
            $admin_group = Sentry::findGroupByName('Branch-Admin');
            if(Sentry::getUser()->isSuperUser())
            {    
                $branches = Branch::Select(array('branches.id','branches.name','branches.city','branches.phone', 'branches.managername'));

                return Datatables::of($branches)
                ->add_column('actions', 
                             '
                             <a href="{{{ URL::to(\'admin/branch/\'. $id ) }}}" class="iframe btn btn-xs btn-info">{{{ Lang::get(\'button.details\') }}}</a> 
                             <a href="{{{ URL::to(\'admin/branch/\'. $id . \'/edit\') }}}" class="iframe btn btn-xs btn-danger">{{{ Lang::get(\'button.edit\') }}}</a> 
                             ')
                ->remove_column('id')
                ->make();
            }
            elseif(Sentry::getUser()->hasAccess('branch-edit') || Sentry::getUser()->inGroup($admin_group))
            {
                $branches = Branch::Select(array('branches.id','branches.name','branches.city','branches.phone', 'branches.managername'))
                                    ->where('id', $branch_id);
                return Datatables::of($branches)
                ->add_column('actions', 
                             '
                             <a href="{{{ URL::to(\'admin/branch/\'. $id ) }}}" class="iframe btn btn-xs btn-info">{{{ Lang::get(\'button.details\') }}}</a> 
                             <a href="{{{ URL::to(\'admin/branch/\'. $id . \'/edit\') }}}" class="iframe btn btn-xs btn-danger">{{{ Lang::get(\'button.edit\') }}}</a> 
                             ')
                ->remove_column('id')
                ->make();

            }
            else
            {

                $branches = Branch::Select(array('branches.id','branches.name','branches.city','branches.phone', 'branches.managername'))
                                    ->where('id', $branch_id);
                return Datatables::of($branches)
                ->add_column('actions', 
                             '
                             <a href="{{{ URL::to(\'admin/branch/\'. $id ) }}}" class="iframe btn btn-xs btn-info">{{{ Lang::get(\'button.details\') }}}</a> 
                             
                             ')
                ->remove_column('id')
                ->make();   
            }
        }
        else
        {
            return Redirect::to('user/login')->with('error', " You are not logged in ");
        }

    }

}
