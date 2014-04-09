<?php

class AdminAssociatesController extends AdminController
{

    /**
     * Associate Model
     *
     * @var Associate
     */
    protected $associate;

    /**
     * Inject the models.
     *
     * @param Associate $associate
     */
    public function __construct(Associate $associate)
    {
        parent::__construct();
        $this->associate = $associate;

    }

    /**
     * index
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index()
    {
        if (Sentry::check()) {
            $title = Lang::get('admin/associates/title.associate_management');

            // Show the page
            return View::make('admin.associates.index', compact('title'));
        }
        else {
            return Redirect::route('login')->with('error', " You are not logged in ");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        if (Sentry::check()) {
            $branch_id = Sentry::getUser()->branch_id;
            if (Sentry::getUser()->isSuperUser() || Sentry::getUser()->hasAccess('associate-create')) {
                $rank  = Rank::where('company', 0)->lists('rankname', 'id');
                $title = "Create Associate";
                $mode  = 'create';

                return View::make(
                    'admin/associates/create', compact(
                        'title',
                        'mode', 'rank', 'branch_id'
                    )
                );
            }
            else {
                return Redirect::to('admin/associates')->with(
                    'error', " You
                    dont have enough permission to create associates "
                );
            }
        }
        else {
            return Redirect::route('login')->with(
                'error', " You are not logged
                in "
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        if (Sentry::check()) {
            $this->associate->name             = strtoupper(Input::get('name'));
            $this->associate->age              = strtoupper(Input::get('age'));
            $this->associate->guardian_type    = strtoupper(Input::get('guardian_type'));
            $this->associate->guardian_name    = strtoupper(Input::get('guardian_name'));
            $this->associate->sex              = strtoupper(Input::get('sex'));
            $this->associate->date_of_birth    = date("Y-m-d", strtotime(Input::get('date_of_birth')));
            $this->associate->mobile           = Input::get('mobile');
            $this->associate->address          = strtoupper(Input::get('address'));
            $this->associate->city             = strtoupper(Input::get('city'));
            $this->associate->state            = strtoupper(Input::get('state'));
            $this->associate->pincode          = Input::get('pincode');
            $this->associate->bank_name        = strtoupper(Input::get('bank_name'));
            $this->associate->bank_address     = strtoupper(Input::get('bank_address'));
            $this->associate->account_no       = strtoupper(Input::get('account_no'));
            $this->associate->pan_no           = strtoupper(Input::get('pan_no'));
            $this->associate->payment_mode     = strtoupper(Input::get('payment_mode'));
            $this->associate->associate_fees   = Input::get('associate_fees');
            $this->associate->drawee_bank      = strtoupper(Input::get('drawee_bank'));
            $this->associate->drawee_branch    = strtoupper(Input::get('drawee_branch'));
            $this->associate->drawn_date       = date("Y-m-d", strtotime(Input::get('drawn_date')));
            $this->associate->cheque_no        = Input::get('cheque_no');
            $this->associate->paid             = strtoupper(Input::get('paid'));
            $this->associate->nominee_name     = strtoupper(Input::get('nominee_name'));
            $this->associate->nominee_add      = strtoupper(Input::get('nominee_add'));
            $this->associate->nominee_relation = strtoupper(Input::get('nominee_relation'));
            $this->associate->nominee_age      = Input::get('nominee_age');
            $this->associate->rank_id          = Input::get('rank_id');
            $this->associate->branch_id        = Input::get('branch_id');
            $this->associate->introducer_id    = Input::get('to_introducer_id');
            $this->associate->start_date       = date("Y-m-d", strtotime(Input::get('start_date')));
            $this->associate->activate         = strtoupper(Input::get('activate'));
            //save if valid
            $this->associate->save();

            if ($this->associate->id) {
                // fetch newly stored associate
                $update_associate               = Associate::find($this->associate->id);
                // call function to generate associate no for newly created associate
                $update_associate->associate_no = self::generate_associate_no( $this->associate->id, $this->associate->branch_id);
                // update with associate no
                if ($update_associate->save()) {
                    return Redirect::to('admin/associates/notification')
                        ->with( 'success', "Associate Created Successfully And Associate No is " . $update_associate->associate_no);
                }
                {
                    $error = "something went wrong while storing associate data";
                    return Redirect::to('admin/associates/create')
                        ->with('error', $error);
                }
            }
            else {
                // Get validation errors (see Ardent package)
                $error = $this->associate->errors()->all();

                return Redirect::to('admin/associates/create')
                    ->with('error', $error);
            }
        }
    }

    /**
     * [edit description]
     *
     * @param $associate
     *
     * @internal param $ [type] $associate
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View [type]
     */
    public function edit($associate)
    {
        if ($associate->id) {
            $title = "Update Associate";
            $rank  = Rank::lists('rankname', 'id');
            $mode  = 'edit';

            return View::make('admin/associates/create', compact('associate', 'title', 'mode', 'rank'));
        }
        else {
            return Redirect::to('admin/associates/create')->with(
                'error', Lang::get('admin/scheme/messages.does_not_exist')
            );
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $associate
     *
     * @internal param $user
     * @return Response
     */
    public function update($associate)
    {
        return "WE ARE WORKING FOR THIS";
        // // associate
        // $associate->name = Input::get('name');
        // $associate->age = Input::get('age');
        // $associate->guardian_type = Input::get('guardian_type');
        // $associate->guardian_name = Input::get('guardian_name');
        // $associate->sex = Input::get('sex');
        // $associate->date_of_birth = Input::get('date_of_birth');
        // $associate->mobile = Input::get('mobile');
        // $associate->address = Input::get('address');
        // $associate->city = Input::get('city');
        // $associate->state = Input::get('state');
        // $associate->pincode = Input::get('pincode');
        // $associate->bank_name = Input::get('bank_name');
        // $associate->bank_address = Input::get('bank_address');
        // $associate->account_no = Input::get('account_no');
        // $associate->pan_no = Input::get('pan_no');
        // $associate->payment_mode = Input::get('payment_mode');
        // $associate->associate_fees = Input::get('associate_fees');
        // $associate->drawee_bank = Input::get('drawee_bank');
        // $associate->drawee_branch = Input::get('drawee_branch');
        // $associate->drawn_date = Input::get('drawn_date');
        // $associate->cheque_no = Input::get('cheque_no');
        // $associate->paid = Input::get('paid');
        // $associate->nominee_name = Input::get('nominee_name');
        // $associate->nominee_add = Input::get('nominee_add');
        // $associate->nominee_relation = Input::get('nominee_relation');
        // $associate->nominee_age = Input::get('nominee_age');
        // $associate->introducer_id = Input::get('introducer_id');
        // $associate->start_date = Input::get('start_date');
        // $associate->activate = Input::get('activate');

        // // Save if valid.
        // if ( $associate->save() )
        // {
        //     return " true";

        //     // Redirect to the new fdscheme page
        //     return Redirect::to('admin/branch/'.'associates/' . $associate->id . '/edit')->with('success', Lang::get('admin/scheme/messages.edit.success'));
        // }
        // else
        // {
        //     // Get validation errors (see Ardent package)
        //     $error = $associate->errors()->all();

        //     return Redirect::to('admin/branch/'.$branch->id.'/associates/' . $associate->id . '/edit')
        //         ->with( 'error', $error );
        // }
    }

    /**
     * [show description]
     *
     * @param $associate
     *
     * @internal param $ [type] $associate
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View [type]
     */
    public function show($associate)
    {
        if (Sentry::check()) {
            if ($associate->id) {
                // Title
                $title         = "Associate Details " . ' For ' . $associate->name;
                $branch_name   = Branch::where('id', $associate->branch_id)->pluck('name');
                $rank_name     = Rank::where('id', $associate->rank_id)->pluck('rankname');
                $introducer_no = Associate::where('id', $associate->introducer_id)->pluck('associate_no');

                return View::make(
                    'admin/associates/show',
                    compact('associate', 'branch_name', 'rank_name', 'introducer_no', 'title')
                );
            }
            else {
                return Redirect::to('admin/associates')->with('error', "Associate Does Not Exists");
            }
        }
        else {
            return Redirect::route('login')->with('error', " You are not logged in ");
        }
    }

    public function getNotification()
    {
        $title = " success";
         return View::make('admin/notification/index' , compact('title')); 
        // return " hello";
    }


    /**
     * [getReceipt description]
     *
     * @param $associate
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View [type] [description]
     */
    public function getReceipt($associate)
    {

        if (Sentry::check()) {
            if ($associate->id) {
                $branch_name   = Branch::where('id', $associate->branch_id)->pluck('name');
                $rank_name     = Rank::where('id', $associate->rank_id)->pluck('rankname');
                $introducer_no = Associate::where('id', $associate->introducer_id)->pluck('associate_no');

                return View::make(
                    'admin/associates/receipt', compact('associate', 'rank_name', 'branch_name', 'introducer_no')
                );
            }
            else {
                return Redirect::to('admin/associates')->with('error', "Associate Does Not Exists");
            }
        }
        else {
            return Redirect::route('login')->with('error', " You are not logged in ");
        }
    }

    /**
     * getWelcome
     *
     * @param $associate
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getWelcome($associate)
    {
        if (Sentry::check()) {
            if ($associate->id) {
                $rank_name = Rank::where('id', $associate->rank_id)->pluck('rankname');

                return View::make('admin/associates/welcome', compact('associate', 'rank_name'));
            }
            else {
                return Redirect::to('admin/associates')->with('error', "Associate Does Not Exists");
            }
        }
        else {
            return Redirect::route('login')->with('error', " You are not logged in ");
        }
    }

    /**
     * getTree
     *
     * @param $associate
     *
     * @return \Illuminate\View\View
     */
    public function getTree($associate)
    {
        $title          = "Tree For " . $associate->associate_no;
        $associate_list = [];
        array_unshift($associate_list, $associate);
        $top_node = Associate::where('company', '1')->pluck('id');
        while ($associate->introducer_id != $top_node) {
            $associate_next = Associate::where('id', $associate->introducer_id)->first();
            array_unshift($associate_list, $associate_next);
            $associate = $associate_next;
        };

        return View::make('admin/associates/tree', compact('title', 'associate_list'));
    }

    /**
     * Display index page tabular data
     *
     * @return AJAX result
     */
    public function getData()
    {
        if (Sentry::check()) {
            $branch_id = Sentry::getUser()->branch_id;
            if (Sentry::getUser()->isSuperUser()) {
                $associates = Associate::Select(
                    array('associates.id', 'associates.name', 'associates.associate_no',
                    'associates.paid', 'associates.start_date')
                )->where('associates.name', '!=' , 'COMPANY');
            }
            else {
                $associates = Associate::Select(
                    array('associates.id', 'associates.name', 'associates.associate_no',
                    'associates.paid', 'associates.start_date')
                )                      ->where('associates.branch_id', $branch_id);
            }

            return Datatables::of($associates)
                ->add_column(
                    'actions',
                    '
                    <a href="{{{ URL::to(\'admin/associates/\'. $id ) }}}"
                    class="iframe btn btn-xs btn-info">{{{ Lang::get(\'button.details\') }}}</a>
                        <a href="{{{ URL::to(\'admin/associates/\'. $id . \'/tree\') }}}"
                        class="iframe btn btn-xs btn-warning">Tree</a>
                            '
                        )
                        ->add_column(
                            'receipts',
                            '
                            <a href="{{{ URL::to(\'admin/associates/\'. $id . \'/receipt\') }}}"
                            class="iframe btn btn-xs btn-default">Receipt</a>
                                <a href="{{{ URL::to(\'admin/associates/\'. $id . \'/welcome\') }}}"
                                class="iframe btn btn-xs btn-default">Welcome</a>
                                    '
                                )
                                ->remove_column('id')
                                ->make();
        }
        else {
            return Redirect::route('login')->with('error', " You are not logged in ");
        }
    }

    /**
     * AJAX autocomplete for introducer
     *
     * @return JSON
     */
    public function getIntroducer()
    {
        $term      = Input::get('term');
        $associate = array();
        $search    = DB::select(
            "
            select id , rank_id ,associate_no as value ,CONCAT(name ,'  ID  ',associate_no) as label
            from associates
            where match (name, associate_no )
            against ('+{$term}*' IN BOOLEAN MODE)
            "
        );

        foreach ($search as $result) {
            $associate[] = $result;

        }

        return json_encode($associate);

    }

    /**
     * [getRanklist description]
     *
     * @return [type]
     */
    public function getRanklist()
    {
        $get_rank_id = Input::get('rank_id');
        $get_rank_no = Rank::where('id', $get_rank_id)->pluck('rank_no');
        $ranklist    = Rank::select('id', 'rankname')->where('rank_no', '<=', $get_rank_no)->where('company', 0)->get();

        return $ranklist;
    }

    /**
     * [generate_associate_no description]
     *
     * @param  integer $id
     * @param  integer $branch_id
     *
     * @return string [type]
     */
    private static function generate_associate_no($id, $branch_id)
    {
        $branch       = str_pad($branch_id, 2, "0", STR_PAD_LEFT);
        $associate_id = str_pad($id, 6, "0", STR_PAD_LEFT);
        $year         = date("Y");

        return $branch . '-' . $associate_id . '-' . $year;
    }
}
