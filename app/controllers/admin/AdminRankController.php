<?php

class AdminRankController extends AdminController {

    /**
     * User Model
     * @var User
     */
    protected $user;
    /**
    * Rank Model
    * @var Role
    */
    protected $rank;
    /**
    * self_commision Model
    * @var Role
    */
    protected $fd_self_commision;
    /**
    * team_commision Model
    * @var Role
    */
    protected $fd_team_commision;
    /**
    * fdscheme Model
    * @var Role
    */
    protected $rd_self_commision;
    /**
    * team_commision Model
    * @var Role
    */
    protected $rd_team_commision;
    
    
    /**
     * Inject the models.
     * @param User $user
     * @param Role $role
     * @param Permission $permission
     * @param Fdscheme $fdscheme
     */
    public function __construct(User $user, Rank $rank , Fd_self_commision $fd_self_commision , Fd_team_commision $fd_team_commision, Rd_self_commision $rd_self_commision, Rd_team_commision $rd_team_commision )
    {
        parent::__construct();
        $this->user = $user;
        $this->rank = $rank;
        $this->fd_self_commision = $fd_self_commision;
        $this->fd_team_commision = $fd_team_commision;
        $this->rd_self_commision = $rd_self_commision;
        $this->rd_team_commision = $rd_team_commision;
       
    }
    /**
     * 
     */
    public function getIndex()
    {
        if(Sentry::check())
        {
            // Title
            $title = "Rank And Commission Management";

            // Show the page
            return View::make('admin.rank.index', compact('title'));   
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
            $ranks = $this->rank->all();

            // Title
            $title = "Create Rank";

            // Mode
            $mode = 'create';

            // Show the page
            return View::make('admin/rank/create', compact(  'title', 'mode', 'ranks'));
        }
        else
        {
            return Redirect::to('admin/rank')->with('error', " You don't have enough permission to create a new Rank ");   
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
            $this->rank->rankname = Input::get( 'rankname' );
            
            // Save if valid. 
            $this->rank->save();

            if ( $this->rank->id )
            {
                $this->fd_self_commision->rank_id = $this->rank->id;
                $this->fd_self_commision->save();

                $this->fd_team_commision->rank_id = $this->rank->id;
                $this->fd_team_commision->save();

                $this->rd_self_commision->rank_id = $this->rank->id;
                $this->rd_self_commision->save();

                $this->rd_team_commision->rank_id = $this->rank->id;
                $this->rd_team_commision->save();
                
                // Redirect to the new rank page
                return Redirect::to('admin/rank/'.$this->rank->id.'/edit')->with('success', "Rank Created Successfully");
            }
            else
            {
                // Get validation errors (see Ardent package)
                $error = $this->rank->errors()->all();
                
                return Redirect::to('admin/rank/create')
                    ->with( 'error', $error );
            } 
        }
        else
        {
            return Redirect::to('admin/rank')->with('error', " You don't have enough permission to create a new Rank ");   
        }

    }
    /**
     * 
     */
    public function getEdit($rank)
    {
        if(Sentry::getUser()->isSuperUser())
        {
            if($rank->id)
            {
                // Title
                $title = "Edit Rank Details";
                // mode
                $mode = 'edit';

                return View::make('admin/rank/create', compact('rank', 'title', 'mode'));
            }
        }
        else
        {
            return Redirect::to('admin/rank')->with('error', " You don't have enough permission to Edit "); 
        }

    }
    /**
     * 
     */
    public function postEdit($rank)
    {
       if(Sentry::getUser()->isSuperUser())
        {
            $rank->rankname = Input::get( 'rankname' );
            

            // Save if valid. 

            if ( $rank->save() )
            {
                
                // Redirect to the new rank page
                return Redirect::to('admin/rank/' . $rank->id . '/edit')->with('success', Lang::get('admin/scheme/messages.edit.success'));
            }
            else
            {
                // Get validation errors (see Ardent package)
                $error = $rank->errors()->all();
                
                return Redirect::to('admin/rank/' . $rank->id . '/edit')
                    ->with( 'error', $error );
            }
        }
        else
        {
            return Redirect::to('admin/rank')->with('error', " You don't have enough permission to Edit");   
        } 
    }
    
    /**
     * 
     */
    public function getSelfcommision($rank)
    {
        if($rank->id)
        {
            $title = "Self Commision Management For ".$rank->rankname;

            $fd_commisions = Rank::find($rank->id)->fd_self_commision()->first();
            $rd_commisions = Rank::find($rank->id)->rd_self_commision()->first();

            // $rank = Fd_self_commision::find($fd_commisions->id)->rank()->first();

            $mode  = 'create';

            return View::make('admin/rank/edit_commision', compact( 'rank','title', 'mode', 'fd_commisions','rd_commisions'));
        }
        else
        {
            return Redirect::to('admin/rank')->with('error', Lang::get('admin/scheme/messages.does_not_exist'));
        }
        
    }
    /**
     * 
     */
    public function postSelfcommision($rank)
    {
        if(Sentry::getUser()->isSuperUser())
        {
            $this->rank = $rank;
            $this->fd_self_commision = Fd_self_commision::find($this->rank->id);
            $this->rd_self_commision = Rd_self_commision::find($this->rank->id);
            // RD self commision 
            $this->fd_self_commision->first = Input::get('fdfirst');
            $this->fd_self_commision->second = Input::get('fdsecond');
            $this->fd_self_commision->third = Input::get('fdthird');
            $this->fd_self_commision->fourth = Input::get('fdfourth');
            $this->fd_self_commision->fifth = Input::get('fdfifth');
            $this->fd_self_commision->sixth = Input::get('fdsixth');
            $this->fd_self_commision->seventh = Input::get('fdseventh');
            // RD self commision 
            $this->rd_self_commision->first = Input::get('rdfirst');
            $this->rd_self_commision->second = Input::get('rdsecond');
            $this->rd_self_commision->third = Input::get('rdthird');
            $this->rd_self_commision->fourth = Input::get('rdfourth');
            $this->rd_self_commision->fifth = Input::get('rdfifth');
            $this->rd_self_commision->sixth = Input::get('rdsixth');
            $this->rd_self_commision->seventh = Input::get('rdseventh');

            if ( $this->fd_self_commision->save() && $this->rd_self_commision->save() )
            {
                
                // Redirect to the new fdscheme page
                return Redirect::to('admin/rank/' . $rank->id . '/self_commision')->with('success', "success");
            }
            else
            {
                // Get validation errors (see Ardent package)
                $error = $this->fd_self_commision->errors()->all();
                
                return Redirect::to('admin/rank/' . $rank->id . '/self_commision')
                    ->with( 'error', $error );
            }
        }
        else
        {
            $error = " You don't have enough permissions to edit commission structure";
            return Redirect::to('admin/rank/' . $rank->id . '/self_commision')
                    ->with( 'error', $error );
        }
    }
    /**
     * 
     */
    public function getTeamcommision($rank)
    {
        if($rank->id)
        {
            $title = "Team Commission Management For ".$this->rank->rankname;

            $fd_commisions = Rank::find($rank->id)->fd_team_commision()->first();
            $rd_commisions = Rank::find($rank->id)->rd_team_commision()->first();


            $mode  = 'create';

            return View::make('admin/rank/edit_commision', compact( 'rank','title', 'mode', 'fd_commisions','rd_commisions'));
        }
        else
        {
            return Redirect::to('admin/rank')->with('error', Lang::get('admin/scheme/messages.does_not_exist'));
        }
        
    }

    public function postTeamcommision($rank)
    {
        if(Sentry::getUser()->isSuperUser())
        {
            $this->rank = $rank;
            $this->fd_team_commision = Fd_team_commision::find($this->rank->id);
            $this->rd_team_commision = Rd_team_commision::find($this->rank->id);
            // RD team commision 
            $this->fd_team_commision->first = Input::get('fdfirst');
            $this->fd_team_commision->second = Input::get('fdsecond');
            $this->fd_team_commision->third = Input::get('fdthird');
            $this->fd_team_commision->fourth = Input::get('fdfourth');
            $this->fd_team_commision->fifth = Input::get('fdfifth');
            $this->fd_team_commision->sixth = Input::get('fdsixth');
            $this->fd_team_commision->seventh = Input::get('fdseventh');
            // RD team commision 
            $this->rd_team_commision->first = Input::get('rdfirst');
            $this->rd_team_commision->second = Input::get('rdsecond');
            $this->rd_team_commision->third = Input::get('rdthird');
            $this->rd_team_commision->fourth = Input::get('rdfourth');
            $this->rd_team_commision->fifth = Input::get('rdfifth');
            $this->rd_team_commision->sixth = Input::get('rdsixth');
            $this->rd_team_commision->seventh = Input::get('rdseventh');

            if ( $this->fd_team_commision->save() && $this->rd_team_commision->save() )
            {
                
                // Redirect to the new fdscheme page
                return Redirect::to('admin/rank/' . $rank->id . '/team_commision')->with('success', "success");
            }
            else
            {
                // Get validation errors (see Ardent package)
                $error = $this->fd_team_commision->errors()->all();
                
                return Redirect::to('admin/rank/' . $rank->id . '/team_commision')
                    ->with( 'error', $error );
            }
        }
        else
        {
            $error = " You don't have enough permissions to edit commission structure";
            return Redirect::to('admin/rank/' . $rank->id . '/team_commision')
                    ->with( 'error', $error );
        }
    }

    /**
     * 
     */
    public function getData()
    {
        $ranks = Rank::Select(array('ranks.id','ranks.rank_no','ranks.rankname'))
                              ->where('ranks.company',0);
        
            return Datatables::of($ranks)
            ->add_column('commission', '<a href="{{{ URL::to(\'admin/rank/\'. $id . \'/self_commision\') }}}" class="iframe btn btn-xs btn-primary">Self Comm</a> <a href="{{{ URL::to(\'admin/rank/\'. $id . \'/team_commision\') }}}" class="iframe btn btn-xs btn-info">Team Comm</a> ')
            ->add_column('actions', '<a href="{{{ URL::to(\'admin/rank/\'. $id . \'/edit\') }}}" class="iframe btn btn-xs btn-danger">edit</a> ')
            ->remove_column('id')
            ->make();
        

    }

}
