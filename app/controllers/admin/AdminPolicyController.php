<?php

/**
 * Class AdminPolicyController
 */
class AdminPolicyController extends AdminController
{

    /**
     * @var [type]
     */
    protected $branch;
    /**
     * @var [type]
     */
    protected $rank;
    /**
     * @var [type]
     */
    protected $policy;
    /**
     * @var Fd_scheme_payment
     */
    protected $fd_scheme_payment;
    /**
     * @var Rd_scheme_payment
     */
    protected $rd_scheme_payment;

    /**
     * [$mis_scheme_payment description]
     *
     * @var [type]
     */
    protected $mis_scheme_payment;

    /**
     * @var Policy_self_commission
     */
    protected $policy_self_commision;
    /**
     * @var Policy_team_commission
     */
    protected $policy_team_commision;
    /**
     * @var Associate
     */
    protected $associate;

    /**
     * [__construct description]
     *
     * @param Associate $associate [description]
     * @param Branch $branch [description]
     * @param Rank $rank [description]
     * @param Policy $policy [description]
     * @param Fd_scheme_payment $fd_scheme_payment [description]
     * @param Rd_scheme_payment $rd_scheme_payment [description]
     * @param Mis_scheme_payment $mis_scheme_payment [description]
     * @param Policy_team_commission $policy_team_commision [description]
     * @param Policy_self_commission $policy_self_commision [description]
     */
    public function __construct(
        Associate              $associate,
        Branch                 $branch,
        Rank                   $rank,
        Policy                 $policy,
        Fd_scheme_payment      $fd_scheme_payment,
        Rd_scheme_payment      $rd_scheme_payment,
        Policy_team_commission $policy_team_commision,
        Policy_self_commission $policy_self_commision,
        Mis_scheme_payment     $mis_scheme_payment
    )
    {
        parent::__construct();
        $this->associate             = $associate;
        $this->branch                = $branch;
        $this->rank                  = $rank;
        $this->policy                = $policy;
        $this->fd_scheme_payment     = $fd_scheme_payment;
        $this->rd_scheme_payment     = $rd_scheme_payment;
        $this->mis_scheme_payment    = $mis_scheme_payment;
        $this->policy_self_commision = $policy_self_commision;
        $this->policy_team_commision = $policy_team_commision;
    }

    /**
     * [index description]
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View [type]
     */
    public function index()
    {
        if (Sentry::check()) {
            $title = "Policy Management";

            return View::make('admin.policy.index', compact('title'));
        } else {
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
            if (Sentry::getUser()->isSuperUser() || Sentry::getUser()->hasAccess('policy-create')) {
                $title        = "Create Policy";
                $special_case = Special_case::lists('special_case', 'special_case');
                $mode         = 'create';

                return View::make('admin/policy/create', compact('title', 'mode', 'branch_id', 'special_case'));
            } else {
                return Redirect::to('admin/policy')
                    ->with('error', " You dont have enough permission to create policy ");
            }
        } else {
            return Redirect::route('login')->with('error', " You are not logged in ");
        }
    }

    /**
     * store
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        if (Sentry::check()) {
            $this->policy->branch_id        = Input::get('branch_id');
            $this->policy->associate_no     = Input::get('associate_no');
            $this->policy->special_case     = strtoupper(Input::get('special_case'));
            $this->policy->associate_id     = Input::get('to_associate_id');
            $this->policy->scheme_type      = strtoupper(Input::get('scheme_type'));
            $this->policy->scheme_name      = strtoupper(Input::get('scheme_name'));
            $this->policy->scheme_id        = Input::get('to_scheme_id');
            $this->policy->name             = strtoupper(Input::get('name'));
            $this->policy->age              = strtoupper(Input::get('age'));
            $this->policy->guardian_type    = strtoupper(Input::get('guardian_type'));
            $this->policy->guardian_name    = strtoupper(Input::get('guardian_name'));
            $this->policy->pan_no           = strtoupper(Input::get('pan_no'));
            $this->policy->sex              = strtoupper(Input::get('sex'));
            $this->policy->date_of_birth    = date("Y-m-d", strtotime(Input::get('date_of_birth')));
            $this->policy->mobile           = Input::get('mobile');
            $this->policy->address          = strtoupper(Input::get('address'));
            $this->policy->city             = strtoupper(Input::get('city'));
            $this->policy->state            = strtoupper(Input::get('state'));
            $this->policy->pincode          = Input::get('pincode');
            $this->policy->nominee_name     = strtoupper(Input::get('nominee_name'));
            $this->policy->nominee_add      = strtoupper(Input::get('nominee_add'));
            $this->policy->nominee_relation = strtoupper(Input::get('nominee_relation'));
            $this->policy->nominee_age      = Input::get('nominee_age');
            //save if valid
            $this->policy->save();

            if ($this->policy->id) {
                $this->policy->policy_no = self::generate_policy_no(
                    $this->policy->id,
                    $this->policy->branch_id
                );
                // updating policy number for newly created policy
                $this->policy->save();

                if ($this->policy->scheme_type == 'FD') {
                    $result = $this->update_fd_scheme_payment(
                        $this->policy->id,
                        (object)Input::all(),
                        $this->policy->associate_id,
                        $this->policy->scheme_type
                    );
                    if ($result) {
                        return Redirect::to('admin/policy/notification')->with(
                            'success', "Policy Created Successfully"
                        );
                    } else {
                        $error = " Commision for Scheme Created has not been updated succesfully";

                        return Redirect::to('admin/policy/create')->with('error', $error);
                    }
                } elseif ($this->policy->scheme_type == 'RD') {
                    $result = $this->update_rd_scheme_payment(
                        $this->policy->id,
                        (object)Input::all(),
                        $this->policy->associate_id,
                        $this->policy->scheme_type,
                        1
                    );
                    if ($result) {
                        return Redirect::to('admin/policy/notification')->with(
                            'success', "Policy Created Successfully"
                        );
                    } else {
                        $error = " Commision for Scheme Created has not been updated succesfully";

                        return Redirect::to('admin/policy/create')->with('error', $error);
                    }
                } elseif ($this->policy->scheme_type == 'MIS') {
                    $result = $this->update_mis_scheme_payment(
                        $this->policy->id,
                        (object)Input::all(),
                        $this->policy->associate_id,
                        $this->policy->scheme_type,
                        1
                    );
                    if ($result) {
                        return Redirect::to('admin/policy/notification')->with(
                            'success', "Policy Created Successfully"
                        );
                    } else {
                        $error = " Commision for Scheme Created has not been updated succesfully";

                        return Redirect::to('admin/policy/create')->with('error', $error);
                    }

                }
            } else {
                // Get validation errors (see Ardent package)
                $error = $this->policy->errors()->all();

                return Redirect::to('admin/policy/create') ->with('error', $error);
            }
        }
    }


    /**
     * [edit description]
     *
     * @param  [type] $associate
     * @ return [type]
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit($policy)
    {
        if (Sentry::check()) {
            $branch_id = Sentry::getUser()->branch_id;
            if (Sentry::getUser()->hasAccess('policy-edit')) {
                $title = "Create Policy";
                $mode = 'create';
                if ($policy->id) {
                    return View::make(
                        'admin/policy/create',
                        compact('title', 'mode', 'branch_id', 'policy')
                    );
                }
            } else {
                return Redirect::to('admin/policy')
                    ->with('error', " You dont have enough permission to create policy ");
            }
        } else {
            return Redirect::route('login')->with('error', " You are not logged in ");
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
        //     return Redirect::to('admin/branch/'.'associates/' . $associate->id . '/edit')
        //                    ->with('success', Lang::get('admin/scheme/messages.edit.success'));
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
     * [getDetail description]
     *
     * @param $policy
     *
     * @internal param $ [type] $policy
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View [type]
     */
    public function getDetail($policy)
    {
        if ($policy->id) {
            $title = "Policy Details" . ' For ' . $policy->policy_no;
            if ($policy->scheme_type == 'FD') {
                $scheme_payments = Policy::find($policy->id)->fd_scheme_payment()->get();
            } elseif ($policy->scheme_type == 'RD') {
                $scheme_payments = Policy::find($policy->id)->rd_scheme_payment()->get();
            } elseif($policy->scheme_type == 'MIS'){
                $scheme_payments = Policy::find($policy->id)->mis_scheme_payment()->get();
            }


            return View::make('admin/policy/details', compact('policy', 'scheme_payments', 'title'));

        } else {
            return Redirect::to('admin/policy')->with('error', "Policy Does Not Exists");
        }
    }

    /**
     * [getReceipt description]
     *
     * @param $policy
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View [type] [description]
     */
    public function getReceipt($policy)
    {
        if (Sentry::check()) {
            if ($policy->id) {
                if($policy->scheme_type == 'FD')
                {
                    $fd_payment = Fd_scheme_payment::where('policy_id', $policy->id)->first();
                    if($fd_payment->receipt_no == null)
                    {
                        $year = \Carbon\Carbon::createFromFormat('Y-m-d', $fd_payment->drawn_date)->year;
                        $fd_payment->receipt_no = "REC-".$policy->branch_id."-".$policy->id."-".$year;
                        $fd_payment->save();
                    }
                }
                $title = $policy->policy_no . "_receipt.pdf";
                $pdf   = App::make('dompdf');
                $pdf->loadView('admin/policy/receipt', compact('policy'));

                return $pdf->stream();
                // return View::make('admin/policy/receipt', compact('policy', 'title'));
            } else {
                return Redirect::to('admin/policy')->with('error', "Policy Does Not Exists");
            }
        } else {
            return Redirect::route('login')->with('error', " You are not logged in ");
        }
    }


    /**
     * getBond
     *
     * @param $policy
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getBond($policy)
    {
        if (Sentry::check()) {
            if ($policy->id) {
                if($policy->scheme_type == 'FD')
                {
                    $fd_payment = Fd_scheme_payment::where('policy_id', $policy->id)->first();
                    if($fd_payment->mature_date == null)
                    {
                        $years = Fdscheme::where('id', $policy->scheme_id)->pluck('years');
                        $fd_payment->mature_date = \Carbon\Carbon::createFromFormat('Y-m-d', $fd_payment->drawn_date)->addYears($years)->toDateString();
                        $fd_payment->save();
                    }
                    if($fd_payment->certificate_no == null)
                    {
                        $year = \Carbon\Carbon::createFromFormat('Y-m-d', $fd_payment->drawn_date)->year;
                        $fd_payment->certificate_no = "CERT-".$policy->branch_id."-".$policy->id."-".$policy->scheme_name."-".$year;
                        $fd_payment->save();
                    }
                    if($fd_payment->receipt_no == null)
                    {
                        $year = \Carbon\Carbon::createFromFormat('Y-m-d', $fd_payment->drawn_date)->year;
                        $fd_payment->receipt_no = "REC-".$policy->branch_id."-".$policy->id."-".$year;
                        $fd_payment->save();
                    }
                }
                $title = $policy->policy_no . "_receipt.pdf";
                $pdf = App::make('dompdf');
                $pdf->loadView('admin/policy/bond', compact('policy', 'fd_payment'));

                // return View::make('admin/policy/bond', compact('policy', 'title'));

                return $pdf->stream();
            } else {
                return Redirect::to('admin/policy')->with('error', "Policy Does Not Exists");
            }
        } else {
            return Redirect::route('login')->with('error', " You are not logged in ");
        }
    }

    /**
     * [getWelcome description]
     *
     * @param  [type] $policy [description]
     *
     * @return [type]         [description]
     */
    public function getWelcome($policy)
    {
        if (Sentry::check()) {
            if ($policy->id) {
                $title = $policy->policy_no . "_Welcome.pdf";
                $pdf   = App::make('dompdf');
                $pdf->loadView('admin/policy/welcome', compact('policy'));

                return $pdf->stream();
                // return View::make( 'admin/policy/welcome', compact('policy'));
            } else {
                return Redirect::to('admin/policy')->with('error', "Policy Does Not Exists");
            }
        } else {
            return Redirect::route('login')->with('error', " You are not logged in ");
        }
    }


    /**
     * [getData description]
     *
     * @return \Illuminate\Http\RedirectResponse [type] [description]
     */
    public function getData()
    {
        if (Sentry::check()) {
            $branch_id = Sentry::getUser()->branch_id;
            if (Sentry::getUser()->isSuperUser()) {
                $policies = Policy::Select(
                    array(
                        'policies.id',
                        'policies.policy_no',
                        'policies.name',
                        'policies.associate_no',
                        'policies.scheme_type',
                        'policies.created_at'
                    )
                );
            } else {
                $policies = Policy::Select(
                    array(
                        'policies.id',
                        'policies.policy_no',
                        'policies.name',
                        'policies.associate_no',
                        'policies.scheme_type',
                        'policies.created_at'
                    )
                )
                    ->where('policies.branch_id', $branch_id);
            }
            if (Sentry::getUser()->hasAccess('policy-edit')) {
                return Datatables::of($policies)
                    ->add_column(
                        'actions',
                        '
                                     <a href=" {{{ URL::to(\'admin/policy/\'. $id . \'/detail\') }}}"
                                     class="iframe btn btn-xs btn-info"> Details</a>
                                     <a href=" {{{ URL::to(\'admin/policy/\'. $id . \'/edit\') }}}"
                                     class="iframe btn btn-xs btn-danger"> Edit</a>
                                     '
                    )
                    ->add_column(
                        'receipts',
                        '
                                     <a href="{{{ URL::to(\'admin/policy/\'. $id . \'/receipt\') }}}"
                                     class="iframe btn btn-xs btn-default">Receipt</a>
                                     <a href="{{{ URL::to(\'admin/policy/\'. $id . \'/welcome\') }}}"
                                     class="iframe btn btn-xs btn-default">Welcome</a>
                                     @if($scheme_type ==="FD")
                                     <a href="{{{ URL::to(\'admin/policy/\'. $id . \'/bond\') }}}"
                                     class="iframe btn btn-xs btn-info">Bond</a>
                                     @endif
                                     '
                    )
                    ->add_column(
                        'commission',
                        '
                                     <a href="{{{ URL::to(\'admin/policy/\'. $id . \'/commision\') }}}"
                                     class="iframe btn btn-xs btn-warning">Commission</a>
                                     '
                    )
                    ->remove_column('id')
                    ->make();
            } else {

                return Datatables::of($policies)
                    ->add_column(
                        'actions',
                        '
                                     <a href=" {{{ URL::to(\'admin/policy/\'. $id . \'/detail\') }}}"
                                     class="iframe btn btn-xs btn-info"> Details</a>
                                     '
                    )
                    ->add_column(
                        'receipts',
                        '
                                     <a href="{{{ URL::to(\'admin/policy/\'. $id . \'/receipt\') }}}"
                                     class="iframe btn btn-xs btn-default">Receipt</a>
                                     <a href="{{{ URL::to(\'admin/policy/\'. $id . \'/welcome\') }}}"
                                     class="iframe btn btn-xs btn-default">Welcome</a>
                                     '
                    )
                    ->add_column(
                        'commission',
                        '
                                     <a href="{{{ URL::to(\'admin/policy/\'. $id . \'/commision\') }}}"
                                     class="iframe btn btn-xs btn-warning">Commission</a>
                                     '
                    )
                    ->remove_column('id')
                    ->make();

            }
        } else {
            return Redirect::to('user/login')->with('error', " You are not logged in ");
        }
    }

    /**
     * [getAssociate description]
     *
     * @return string [type]
     */
    public function getAssociate()
    {
        $term = Input::get('term');
        $associate = array();
        $search = DB::select(
            "
                                select id ,associate_no as value ,CONCAT(name ,'  ID  ',associate_no) as label
                                from associates
                                where company = 0
                                and match (name, associate_no )
                                against ('+{$term}*' IN BOOLEAN MODE)
                                "
        );

        foreach ($search as $result) {
            $associate[] = $result;
        }

        return json_encode($associate);

    }


    public function postAssociate()
    {
        $term = Input::get('associate_no');
        $search = DB::select(
            "
                                select associate_no 
                                from associates
                                where company = 0
                                and match (name, associate_no )
                                against ('+{$term}*' IN BOOLEAN MODE)
                                "
        );

        if ($search) {
            return json_encode(array('valid' => true));
        } else {
            return json_encode(array('valid' => false));
        }
    }

    /**
     * [getFdscheme description]
     *
     * @return string [type]
     */
    public function getFdscheme()
    {
        $term = Input::get('term');
        $fdschemes = array();
        $search = DB::select(
            "
                                select id, interest, special_interest,years ,name as value ,description as label
                                from fdschemes
                                where match (name )
                                against ('+{$term}*' IN BOOLEAN MODE)
                                "
        );

        foreach ($search as $result) {
            $fdschemes[] = $result;

        }

        return json_encode($fdschemes);


    }

    public function postFdscheme()
    {
        $term = Input::get('scheme_name');
        $search = DB::select(
            "
                                select name as value 
                                from fdschemes
                                where match (name )
                                against ('+{$term}*' IN BOOLEAN MODE)
                                "
        );

        if ($search) {
            return json_encode(array('valid' => true));
        } else {
            return json_encode(array('valid' => false));
        }


    }

    /**
     * [getRdscheme description]
     *
     * @return string [type]
     */
    public function getRdscheme()
    {
        $term = Input::get('term');
        $rdschemes = array();
        $search = DB::select(
            "
                                select id, interest,special_interest, years ,name as value ,description as label
                                from rdschemes
                                where match (name )
                                against ('*{$term}*' IN BOOLEAN MODE)
                                "
        );
        foreach ($search as $result) {
            $rdschemes[] = $result;
        }

        return json_encode($rdschemes);

    }


    /**
     * [postRdscheme description]
     *
     * @return [type] [description]
     */
    public function postRdscheme()
    {
        $term = Input::get('scheme_name');
        $search = DB::select(
            "
                                select name as value 
                                from rdschemes
                                where match (name )
                                against ('+{$term}*' IN BOOLEAN MODE)
                                "
        );

        if ($search) {
            return json_encode(array('valid' => true));
        } else {
            return json_encode(array('valid' => false));
        }


    }


    /**
     * [getMisscheme description]
     *
     * @return [type] [description]
     */
    public function getMisscheme()
    {
        $term = Input::get('term');
        $misschemes = array();
        $search = DB::select(
            "
                                SELECT id, interest,special_interest, years ,name as value ,description as label
                                FROM misschemes
                                WHERE years IN (1,3,5) 
                                AND
                                match (name )
                                against ('*{$term}*' IN BOOLEAN MODE)
                                "
        );
        foreach ($search as $result) {
            $misschemes[] = $result;
        }

        return json_encode($misschemes);

    }


    /**
     * [postMisscheme description]
     *
     * @return string [type] [description]
     */
    public function postMisscheme()
    {
        $term = Input::get('scheme_name');
        $search = DB::select(
            "
                                select name as value 
                                from misschemes
                                where match (name )
                                against ('+{$term}*' IN BOOLEAN MODE)
                                "
        );

        if ($search) {
            return json_encode(array('valid' => true));
        } else {
            return json_encode(array('valid' => false));
        }
    }


    /**
     * Generate Commission Structure for policy
     *
     * @param $policy
     * @internal param $ [type] $policy [description]
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View [type]         [description]
     */
    public function getCommision($policy)
    {
        if ($policy->id) {
            $title = "Policy And Self Commission Details" . ' For ' . $policy->policy_no;

            return View::make('admin/policy/commission', compact('policy', 'title'));
        } else {
            return Redirect::to('admin/policy')->with('error', "Policy Does Not Exists");
        }
    }

    /**
     * [generate_policy_no description]
     *
     * @param $id
     * @param $branch_id
     *
     * @internal param $ [type] $id
     * @internal param $ [type] $branch_id
     * @return string [type]
     */
    private static function generate_policy_no($id, $branch_id)
    {
        $branch_name = Branch::where('id', $branch_id)->pluck('name');
        $policy_id = str_pad($id, 6, "1", STR_PAD_LEFT);
        $year = date("Y");

        return substr($branch_name, 0, 3) . '-' . $policy_id . '-' . $year;
    }


    /**
     * getNotification
     *
     * @access public
     * @return void
     */
    public function getNotification()
    {
        $title = "";

        return View::make('admin/notification/index', compact('title'));
    }

    /**
     * update_fd_scheme_payment
     *
     * @param $policy_id
     * @param $input
     * @param $associate_id
     * @param $scheme_type
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update_fd_scheme_payment($policy_id, $input, $associate_id, $scheme_type)
    {
        $this->fd_scheme_payment->policy_id      = $policy_id;
        $this->fd_scheme_payment->deposit_amount = $input->fd_scheme_amount;
        $this->fd_scheme_payment->mature_amount  = $input->fd_maturity_amount;
        $this->fd_scheme_payment->payment_mode   = strtoupper($input->payment_mode);
        $this->fd_scheme_payment->drawee_bank    = strtoupper($input->drawee_bank);
        $this->fd_scheme_payment->drawee_branch  = strtoupper($input->drawee_branch);
        $this->fd_scheme_payment->drawn_date     = date("Y-m-d", strtotime($input->drawn_date));
        $this->fd_scheme_payment->cheque_no      = strtoupper($input->cheque_no);
        $this->fd_scheme_payment->paid           = strtoupper($input->paid);

        if ($this->fd_scheme_payment->save()) {
            $this->update_self_commission(
                $associate_id,
                $scheme_type,
                $input,
                $policy_id,
                $this->fd_scheme_payment->id,
                $this->fd_scheme_payment->deposit_amount
            );
            $this->update_team_commission(
                $associate_id,
                $scheme_type,
                $input,
                $policy_id,
                $this->fd_scheme_payment->id,
                $this->fd_scheme_payment->deposit_amount
            );

            return true;
        } else {
            $error = " Payment Details for FD Scheme Created has not been updated successfully";

            return Redirect::to('admin/policy/create')->with('error', $error);
        }
    }

    /**
     * update_rd_scheme_payment
     *
     * @param $policy_id
     * @param $input
     * @param $associate_id
     * @param $scheme_type
     * @param $installment
     *
     * @return bool|\Illuminate\Http\RedirectResponse
     */
    public function update_rd_scheme_payment($policy_id, $input, $associate_id, $scheme_type, $installment)
    {
        $this->rd_scheme_payment                    = new Rd_scheme_payment;
        $this->rd_scheme_payment->policy_id         = $policy_id;
        $this->rd_scheme_payment->deposit_amount    = $input->rd_scheme_amount;
        $this->rd_scheme_payment->mature_amount     = $input->rd_maturity_amount;
        $this->rd_scheme_payment->total_installment = $input->rd_total_installment;
        $this->rd_scheme_payment->paid_installment  = $installment;
        $this->rd_scheme_payment->payment_mode      = strtoupper($input->payment_mode);
        $this->rd_scheme_payment->drawee_bank       = strtoupper($input->drawee_bank);
        $this->rd_scheme_payment->drawee_branch     = strtoupper($input->drawee_branch);
        $this->rd_scheme_payment->drawn_date        = date("Y-m-d", strtotime($input->drawn_date));
        $this->rd_scheme_payment->cheque_no         = $input->cheque_no;
        $this->rd_scheme_payment->paid              = strtoupper($input->paid);

        // extra commission for the payment collector associate
        $this->rd_scheme_payment->payment_collector_id = strtoupper($input->to_collector_id);


        if ($this->rd_scheme_payment->save()) {
            $this->update_self_commission(
                $associate_id,
                $scheme_type,
                $input,
                $policy_id,
                $this->rd_scheme_payment->id,
                $this->rd_scheme_payment->deposit_amount
            );
            $this->update_team_commission(
                $associate_id,
                $scheme_type,
                $input,
                $policy_id,
                $this->rd_scheme_payment->id,
                $this->rd_scheme_payment->deposit_amount
            );

            $this->update_collector_commission(
                $input,
                $policy_id,
                $this->rd_scheme_payment->id,
                $this->rd_scheme_payment->deposit_amount
            );

            if ($installment == 1) {
                $policy_time = strtotime($this->rd_scheme_payment->updated_at);
            } else {
                $last_installment = Rd_scheme_payment::where('policy_id', $policy_id)
                    ->orderBy('next_installment_date', 'desc')
                    ->first();
                $policy_time = strtotime($last_installment->next_installment_date);
            }
            $this->rd_scheme_payment->next_installment_date = date("Y-m-d", strtotime("+1 month", $policy_time));
            $this->rd_scheme_payment->save();

            return true;
        } else {
            $error = " Payment Details for RD Scheme Created has not been updated successfully";

            return Redirect::to('admin/policy/create')->with('error', $error);

        }
    }


    public function update_mis_scheme_payment($policy_id, $input, $associate_id, $scheme_type)
    {
        $this->mis_scheme_payment->policy_id           = $policy_id;
        $this->mis_scheme_payment->deposit_amount      = $input->mis_scheme_amount;
        $this->mis_scheme_payment->monthly_installment = $input->mis_monthly_installment;
        $this->mis_scheme_payment->payment_mode        = strtoupper($input->payment_mode);
        $this->mis_scheme_payment->drawee_bank         = strtoupper($input->drawee_bank);
        $this->mis_scheme_payment->drawee_branch       = strtoupper($input->drawee_branch);
        $this->mis_scheme_payment->drawn_date          = date("Y-m-d", strtotime($input->drawn_date));
        $this->mis_scheme_payment->maturity_date       = \Carbon\Carbon::createFromFormat('Y-m-d', trim($input->drawn_date))->addYears($input->to_scheme_years)->toDateString();
        $this->mis_scheme_payment->total_installment   = $input->to_scheme_years * 12 ;
        $this->mis_scheme_payment->cheque_no           = strtoupper($input->cheque_no);
        $this->mis_scheme_payment->paid                = strtoupper($input->paid);

        if ($this->mis_scheme_payment->save()) {

            $this->update_mis_scheme_return(
                $input,
                $policy_id,
                $this->mis_scheme_payment->id,
                0
            );


            $this->update_self_commission(
                $associate_id,
                $scheme_type,
                $input,
                $policy_id,
                $this->mis_scheme_payment->id,
                $this->mis_scheme_payment->deposit_amount
            );
            $this->update_team_commission(
                $associate_id,
                $scheme_type,
                $input,
                $policy_id,
                $this->mis_scheme_payment->id,
                $this->mis_scheme_payment->deposit_amount
            );

            return true;
        } else {
            $error = " Payment Details for mis Scheme Created has not been updated successfully";

            return Redirect::to('admin/policy/create')->with('error', $error);
        }
    }

    public function update_mis_scheme_return($input, $policy_id, $mis_scheme_payment_id, $installment)
    {
        Mis_scheme_payment::find($this->mis_scheme_payment->id)
            ->mis_scheme_return()
            ->insert(
                array(
                    'policy_id'             => $policy_id,
                    'mis_scheme_payment_id' => $mis_scheme_payment_id,
                    'deposit_amount'        => $input->mis_scheme_amount,
                    'monthly_installment'   => $input->mis_monthly_installment,
                    'total_installment'     => $input->to_scheme_years * 12,
                    'paid_installment'      => $installment,
                    'payment_mode'          => $input->payment_mode,
                    'drawee_bank'           => $input->drawee_bank,
                    'drawee_branch'         => $input->drawee_branch,
                    'drawn_date'            => $input->drawn_date,
                    'maturity_date'         => \Carbon\Carbon::createFromFormat('Y-m-d', trim($input->drawn_date))->addYears($input->to_scheme_years),
                    'next_installment_date' => date("Y-m-d", strtotime($input->drawn_date)),
                    'cheque_no'             => $input->cheque_no,
                    'paid'                  => $input->paid,
                )

            );
    }

    /**
     * update_self_commission
     *
     * @param $associate_id
     * @param $scheme_type
     * @param $input
     * @param $policy_id
     * @param $payment_id
     * @param $deposit_amount
     *
     * @return bool
     */
    public function update_self_commission( $associate_id, $scheme_type, $input, $policy_id, $payment_id, $deposit_amount )
    {
        $rank_id   = Associate::where('id', $associate_id)->pluck('rank_id');
        $rank_no    = Rank::where('id', $rank_id)->pluck('rank_no');
        $scheme_id = $input->to_scheme_id;
        $rank_gap  = Rank::where('rank_no', '<=', $rank_no)->where('rank_no', '!=', '99999')->get();

        if ($scheme_type == 'FD') {
            /**
             * pluck year name from Fdscheme table which will
             * be the column name in Fd_self_commision table
             * and finally commision rate will be fetched from there
             */
            $year_name = Fdscheme::where('id', $scheme_id)->pluck('year_name');
            $total_commission = 0;
            foreach ($rank_gap as $temp_rank_gap) {
                $commission            = Fd_self_commision::where('rank_id', $temp_rank_gap->id)->pluck($year_name);
                $commission_calculated = ($commission * $deposit_amount) / 100;
                $total_commission      = $total_commission + $commission_calculated;
            }

            // generate self comission for generated policy
            $this->policy_self_commision->payment_id     = $payment_id;
            $this->policy_self_commision->policy_id      = $policy_id;
            $this->policy_self_commision->associate_id   = $associate_id;
            $this->policy_self_commision->rank_id        = $rank_id;
            $this->policy_self_commision->rank_no        = Rank::where('id', $rank_id)->pluck('rank_no');
            $this->policy_self_commision->deposit_amount = $deposit_amount;
            $this->policy_self_commision->self_commision = $total_commission;

            // saving self commission and returning value according to action
            if ($this->policy_self_commision->save()) {
                return true;
            } else {
                return false;
            }
        } elseif ($scheme_type == 'RD') {
            /**
             * pluck year name from Rdscheme table which will
             * be the column name in Rd_self_commision table
             * and finally commision rate will be fetched from there
             */
            $year_name = Rdscheme::where('id', $scheme_id)->pluck('year_name');
            $total_commission = 0;
            foreach ($rank_gap as $temp_rank_gap) {
                $commission            = Rd_self_commision::where('rank_id', $temp_rank_gap->id)->pluck($year_name);
                $commission_calculated = ($commission * $deposit_amount) / 100;
                $total_commission      = $total_commission + $commission_calculated;
            }

            // save self comission for generated policy
            $this->policy_self_commision->payment_id     = $payment_id;
            $this->policy_self_commision->policy_id      = $policy_id;
            $this->policy_self_commision->associate_id   = $associate_id;
            $this->policy_self_commision->rank_id        = $rank_id;
            $this->policy_self_commision->rank_no        = Rank::where('id', $rank_id)->pluck('rank_no');
            $this->policy_self_commision->deposit_amount = $deposit_amount;
            $this->policy_self_commision->self_commision = $total_commission;

            // saving self commission and returning value according to action
            if ($this->policy_self_commision->save()) {
                return true;
            } else {
                return false;
            }
        } elseif ($scheme_type == 'MIS') {
            /**
             * pluck year name from Misscheme table which will
             * be the column name in Mis_self_commision table
             * and finally commision rate will be fetched from there
             */
            $year_name = Misschemes::where('id', $scheme_id)->pluck('year_name');
            $total_commission = 0;
            foreach ($rank_gap as $temp_rank_gap) {
                $commission            = Mis_self_commission::where('rank_id', $temp_rank_gap->id)->pluck($year_name);
                $commission_calculated = ($commission * $deposit_amount) / 100;
                $total_commission      = $total_commission + $commission_calculated;
            }

            // save self comission for generated policy
            $this->policy_self_commision->payment_id     = $payment_id;
            $this->policy_self_commision->policy_id      = $policy_id;
            $this->policy_self_commision->associate_id   = $associate_id;
            $this->policy_self_commision->rank_id        = $rank_id;
            $this->policy_self_commision->rank_no        = Rank::where('id', $rank_id)->pluck('rank_no');
            $this->policy_self_commision->deposit_amount = $deposit_amount;
            $this->policy_self_commision->self_commision = $total_commission;

            // saving self commission and returning value according to action
            if ($this->policy_self_commision->save()) {
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * update_team_commission
     *
     * @param $associate_id
     * @param $scheme_type
     * @param $input
     * @param $policy_id
     * @param $payment_id
     * @param $deposit_amount
     *
     * @return bool
     */
    public function update_team_commission(
        $associate_id, $scheme_type, $input, $policy_id, $payment_id, $deposit_amount
    )
    {

        $scheme_id = $input->to_scheme_id;
        $associate = Associate::where('id', '=', $associate_id)->first();
        $top_node  = Associate::where('company', '1')->pluck('id');

        while ($associate->introducer_id != $top_node) {

            $associate_next = Associate::where('id', $associate->introducer_id)->first();
            $rank_id        = $associate_next->rank_id;
            $rank_gap       = Rank::where('id', '>', $associate->rank_id)
                ->where('id', '<=', $associate_next->rank_id)
                ->get();


            if ($scheme_type == 'FD') {
                /**
                 * pluck year name from Fdscheme table which will
                 * be the column name in Fd_self_commision table
                 * and finally commision rate will be fetched from there
                 */
                $year_name        = Fdscheme::where('id', $scheme_id)->pluck('year_name');
                $total_commission = 0;
                foreach ($rank_gap as $temp_rank_gap) {
                    $commission            = Fd_team_commision::where('rank_id', $temp_rank_gap->id)->pluck($year_name);
                    $commission_calculated = ($commission * $deposit_amount) / 100;
                    $total_commission      = $total_commission + $commission_calculated;
                }

                /**
                 * now commision has been fetched for each associate in the tree
                 * populate database for each associate
                 * for one payment there will be several entry in case of team commision
                 */

                // generate team comission for generated policy
                $policy_team_commision                 = new Policy_team_commission;
                $policy_team_commision->payment_id     = $payment_id;
                $policy_team_commision->policy_id      = $policy_id;
                $policy_team_commision->associate_id   = $associate_next->id;
                $policy_team_commision->rank_id        = $rank_id;
                $policy_team_commision->rank_no        = Rank::where('id', $rank_id)->pluck('rank_no');
                $policy_team_commision->deposit_amount = $deposit_amount;
                $policy_team_commision->team_commision = $total_commission;

                $policy_team_commision->save();

            } elseif ($scheme_type == 'RD') {
                /**
                 * pluck year name from Rdscheme table which will
                 * be the column name in Rd_self_commision table
                 * and finally commision rate will be fetched from there
                 */
                $year_name        = Rdscheme::where('id', $scheme_id)->pluck('year_name');
                $total_commission = 0;
                foreach ($rank_gap as $temp_rank_gap) {
                    $commission            = Rd_team_commision::where('rank_id', $temp_rank_gap->id)->pluck($year_name);
                    $commission_calculated = ($commission * $deposit_amount) / 100;
                    $total_commission      = $total_commission + $commission_calculated;
                }
                /**
                 * now commision has been fetched for each associate in the tree
                 * populate database for each associate
                 * for one payment there will be several entry in case of team commision
                 */

                // generate team comission for generated policy
                $policy_team_commision                 = new Policy_team_commission;
                $policy_team_commision->payment_id     = $payment_id;
                $policy_team_commision->policy_id      = $policy_id;
                $policy_team_commision->associate_id   = $associate_next->id;
                $policy_team_commision->rank_id        = $rank_id;
                $policy_team_commision->rank_no        = Rank::where('id', $rank_id)->pluck('rank_no');
                $policy_team_commision->deposit_amount = $deposit_amount;
                $policy_team_commision->team_commision = $total_commission;

                $policy_team_commision->save();

            } elseif ($scheme_type == 'MIS') {
                /**
                 * pluck year name from Misscheme table which will
                 * be the column name in Mis_self_commision table
                 * and finally commision rate will be fetched from there
                 */
                $year_name = Misschemes::where('id', $scheme_id)->pluck('year_name');
                $total_commission = 0;
                foreach ($rank_gap as $temp_rank_gap) {
                    $commission = Mis_team_commission::where('rank_id', $temp_rank_gap->id)->pluck(
                        $year_name
                    );
                    $commission_calculated = ($commission * $deposit_amount) / 100;
                    $total_commission      = $total_commission + $commission_calculated;
                }

                /**
                 * now commision has been fetched for each associate in the tree
                 * populate database for each associate
                 * for one payment there will be several entry in case of team commision
                 */

                // generate team comission for generated policy
                $policy_team_commision                 = new Policy_team_commission;
                $policy_team_commision->payment_id     = $payment_id;
                $policy_team_commision->policy_id      = $policy_id;
                $policy_team_commision->associate_id   = $associate_next->id;
                $policy_team_commision->rank_id        = $rank_id;
                $policy_team_commision->rank_no        = Rank::where('id', $rank_id)->pluck('rank_no');
                $policy_team_commision->deposit_amount = $deposit_amount;
                $policy_team_commision->team_commision = $total_commission;

                $policy_team_commision->save();

            }
            $associate = $associate_next;
        };
    }


    /**
     * update_collector_commission
     *
     * @param $input
     * @param $policy_id
     * @param $payment_id
     * @param $deposit_amount
     */
    public function update_collector_commission($input, $policy_id, $payment_id, $deposit_amount)
    {
        $collector_commission = Rd_collector_commission::where('rdschemes_id', $input->to_scheme_id)
            ->pluck('commission');

        $calculated_commission       = ($deposit_amount * $collector_commission) / 100;
        $policy_collector_commission = new Policy_collector_commission;


        $policy_collector_commission->payment_id            = $payment_id;
        $policy_collector_commission->policy_id             = $policy_id;
        $policy_collector_commission->collector_id          = $input->to_collector_id;
        $policy_collector_commission->deposit_amount        = $deposit_amount;
        $policy_collector_commission->collection_commission = $calculated_commission;


        if ($policy_collector_commission->save()) {
            return true;
        } else {
            return false;
        }

    }

    /**
     * getAllRdscheme
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getAllRdscheme()
    {
        if (Sentry::check()) {
            $title = "RD Policy Management";

            return View::make('admin.policy.rd_schemes', compact('title'));
        } else {
            return Redirect::route('login')->with('error', " You are not logged in ");
        }
    }

    /**
     * getRdData
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getRdData()
    {
        if (Sentry::check()) {
            $branch_id = Sentry::getUser()->branch_id;
            if (Sentry::getUser()->isSuperUser()) {
                $policies = Policy::Select(
                    array(
                        'policies.id',
                        'policies.created_at',
                        'policies.policy_no',
                        'policies.name',
                        'policies.associate_no',
                        'policies.scheme_type'
                    )
                )
                    ->where('policies.scheme_type', 'RD');
            } else {
                $policies = Policy::Select(
                    array(
                        'policies.id',
                        'policies.created_at',
                        'policies.policy_no',
                        'policies.name',
                        'policies.associate_no',
                        'policies.scheme_type'
                    )
                )
                    ->where('policies.branch_id', $branch_id)
                    ->where('policies.scheme_type', 'RD');
            }
            if (Sentry::getUser()->hasAccess('policy-edit')) {
                return Datatables::of($policies)
                    ->add_column(
                        'actions',
                        '
                                     <a href=" {{{ URL::to(\'admin/policy/\'. $id . \'/detail\') }}}"
                                     class="iframe btn btn-xs btn-info"> Details</a>
                                     <a href=" {{{ URL::to(\'admin/policy/rd_schemes/\'. $id . \'/Installments\') }}}"
                                     class="btn btn-xs btn-primary"> Installments</a>
                                     <a href=" {{{ URL::to(\'admin/policy/\'. $id . \'/edit\') }}}"
                                     class="iframe btn btn-xs btn-danger"> Edit</a>
                                    '
                    )
                    ->remove_column('id')
                    ->remove_column('scheme_type')
                    ->make();
            } else {
                return Datatables::of($policies)
                    ->add_column(
                        'actions',
                        '
                                     <a href=" {{{ URL::to(\'admin/policy/\'. $id . \'/detail\') }}}"
                                     class="iframe btn btn-xs btn-info"> Details</a>
                                     <a href=" {{{ URL::to(\'admin/policy/rd_schemes/\'. $id . \'/Installments\') }}}"
                                     class="btn btn-xs btn-primary"> Installments</a>
                                     '
                    )
                    ->remove_column('id')
                    ->remove_column('scheme_type')
                    ->make();

            }
        } else {
            return Redirect::to('user/login')->with('error', " You are not logged in ");
        }
    }

    /**
     * getAllRdschemeInstallements
     *
     * @param $policy
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getAllRdschemeInstallements($policy)
    {
        if (Sentry::check()) {
            $title = $policy->policy_no . " RD Policy Installments Management";
            $policy_id = $policy->id;

            return View::make('admin.policy.rd_scheme_installments', compact('title', 'policy'));
        } else {
            return Redirect::route('login')->with('error', " You are not logged in ");
        }

    }

    /**
     * getRdSchmeInstallments
     *
     * @param $policy
     *
     * @return \Illuminate\Http\RedirectResponse|string
     */
    public function getRdSchmeInstallments($policy)
    {
        if (Sentry::check()) {
            $branch_id = Sentry::getUser()->branch_id;
            if (Sentry::getUser()->isSuperUser() || $branch_id == $policy->branch_id) {
                $rd_scheme_payments = Rd_scheme_payment::Select(
                    array(
                        'rd_scheme_payment.id',
                        'rd_scheme_payment.policy_id',
                        'rd_scheme_payment.paid_installment',
                        'rd_scheme_payment.drawn_date',
                        'rd_scheme_payment.deposit_amount',
                        'rd_scheme_payment.next_installment_date'
                    )
                )
                    ->where('rd_scheme_payment.policy_id', $policy->id);

                return Datatables::of($rd_scheme_payments)
                    ->add_column(
                        'actions',
                        '
                                     <a href=" {{{ URL::to(\'admin/policy/rd_schemes/\'. $policy_id . \'/Installment/\'. $id .\'/Receipt\') }}}"
                                     class="iframe btn btn-xs btn-default"> Receipt</a>
                                     '
                    )
                    ->remove_column('id')
                    ->remove_column('policy_id')
                    ->make();

            } else {
                return " You are not authorized for this branch";
            }
        } else {
            return Redirect::to('user/login')->with('error', " You are not logged in ");
        }
    }

    /**
     * getPayInstallment
     *
     * @param $policy
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getPayInstallment($policy)
    {
        if (Sentry::check()) {
            $title                 = $policy->policy_no . " Pay Installments ";
            $rd_policy             = Rd_scheme_payment::where('policy_id', $policy->id)->orderBy('updated_at', 'desc')->first();
            $current_date          = new DateTime("now");
            $last_installment_date = new DateTime($rd_policy->next_installment_date);
            $interval              = $last_installment_date->diff($current_date);
            $interval->format('%R%a days');

            return View::make('admin.policy.pay_installment', compact('title', 'policy', 'rd_policy', 'interval'));
        } else {
            return Redirect::route('login')->with('error', " You are not logged in ");
        }
    }

    /**
     * postPayInstallment
     *
     * @param $policy
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postPayInstallment($policy)
    {
        if (Input::get('rd_current_installment') <= Input::get('rd_total_installment')) {
            $result = $this->update_rd_scheme_payment(
                $policy->id,
                (object)Input::all(),
                $policy->associate_id,
                $policy->scheme_type,
                Input::get('rd_current_installment')
            );
            if ($result) {
                return Redirect::to('admin/policy/notification')->with('success', "Installment Paid Successfully");
            } else {
                return Redirect::to('admin/policy/notification')->with('Error', "Installment Payment Was Unsuccessful");
            }
        } else {
            return Redirect::to('admin/policy/notification')->with('error', "All Installment Have Been Paid Already");
        }
    }

    /**
     * getInstallmentReceipt
     *
     * @param $policy
     * @param $rd_scheme_payment
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getInstallmentReceipt($policy, $rd_scheme_payment)
    {
        if (Sentry::check()) {
            if ($policy->id && $rd_scheme_payment->id) {
                $pdf = App::make('dompdf');
                $pdf->loadView('admin/policy/installmentReceipt', compact('policy', 'rd_scheme_payment'));

                return $pdf->stream();
            } else {
                return Redirect::to('admin/policy')->with('error', "Policy Does Not Exists");
            }
        } else {
            return Redirect::route('login')->with('error', " You are not logged in ");
        }

    }


    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getAllMisScheme()
    {
        if (Sentry::check()) {
            $title = "MIS Policy Management";

            return View::make('admin.policy.mis_schemes', compact('title'));
        } else {
            return Redirect::route('login')->with('error', " You are not logged in ");
        }
    }


    public function getMisData()
    {
        if (Sentry::check()) {
            $branch_id = Sentry::getUser()->branch_id;
            if (Sentry::getUser()->isSuperUser()) {
                $policies = Policy::Select(
                    array(
                        'policies.id',
                        'policies.created_at',
                        'policies.policy_no',
                        'policies.name',
                        'policies.associate_no',
                        'policies.scheme_type'
                    )
                )
                    ->where('policies.scheme_type', 'MIS');
            } else {
                $policies = Policy::Select(
                    array(
                        'policies.id',
                        'policies.created_at',
                        'policies.policy_no',
                        'policies.name',
                        'policies.associate_no',
                        'policies.scheme_type'
                    )
                )
                    ->where('policies.branch_id', $branch_id)
                    ->where('policies.scheme_type', 'MIS');
            }
            if (Sentry::getUser()->hasAccess('policy-edit')) {
                return Datatables::of($policies)
                    ->add_column(
                        'actions',
                        '
                                     <a href=" {{{ URL::to(\'admin/policy/\'. $id . \'/detail\') }}}"
                                     class="iframe btn btn-xs btn-info"> Details</a>
                                     <a href=" {{{ URL::to(\'admin/policy/mis_schemes/\'. $id . \'/Installments\') }}}"
                                     class="btn btn-xs btn-primary"> Installments</a>
                                     <a href=" {{{ URL::to(\'admin/policy/\'. $id . \'/edit\') }}}"
                                     class="iframe btn btn-xs btn-danger"> Edit</a>
                                    '
                    )
                    ->remove_column('id')
                    ->remove_column('scheme_type')
                    ->make();
            } else {
                return Datatables::of($policies)
                    ->add_column(
                        'actions',
                        '
                                     <a href=" {{{ URL::to(\'admin/policy/\'. $id . \'/detail\') }}}"
                                     class="iframe btn btn-xs btn-info"> Details</a>
                                     <a href=" {{{ URL::to(\'admin/policy/mis_schemes/\'. $id . \'/Installments\') }}}"
                                     class="btn btn-xs btn-primary"> Installments</a>
                                     '
                    )
                    ->remove_column('id')
                    ->remove_column('scheme_type')
                    ->make();

            }
        } else {
            return Redirect::to('user/login')->with('error', " You are not logged in ");
        }
    }


    public function getAllMisSchemeInstallments($policy)
    {
        if (Sentry::check()) {
            $title = $policy->policy_no . " MIS Policy Installments Management";
            $policy_id = $policy->id;

            return View::make('admin.policy.mis_scheme_installments', compact('title', 'policy'));
        } else {
            return Redirect::route('login')->with('error', " You are not logged in ");
        }

    }


    public function getMisSchmeInstallments($policy)
    {
        if (Sentry::check()) {
            $branch_id = Sentry::getUser()->branch_id;
            if (Sentry::getUser()->isSuperUser() || $branch_id == $policy->branch_id) {
                $mis_scheme_returns = Mis_scheme_return::Select(
                    array(
                        'mis_scheme_return.id',
                        'mis_scheme_return.policy_id',
                        'mis_scheme_return.paid_installment',
                        'mis_scheme_return.drawn_date',
                        'mis_scheme_return.deposit_amount',
                        'mis_scheme_return.next_installment_date'
                    )
                )
                    ->where('mis_scheme_return.policy_id', $policy->id);

                return Datatables::of($mis_scheme_returns)
                    ->add_column(
                        'actions',
                        '
                                     <a href=" {{{ URL::to(\'admin/policy/rd_schemes/\'. $policy_id . \'/Installment/\'. $id .\'/Receipt\') }}}"
                                     class="iframe btn btn-xs btn-default"> Receipt</a>
                                     '
                    )
                    ->remove_column('id')
                    ->remove_column('policy_id')
                    ->make();

            } else {
                return " You are not authorized for this branch";
            }
        } else {
            return Redirect::to('user/login')->with('error', " You are not logged in ");
        }
    }



    public function getMisPayInstallment($policy)
    {
        if (Sentry::check()) {
            $title                 = $policy->policy_no . " Pay Installments ";
            $rd_policy             = Mis_scheme_return::where('policy_id', $policy->id)->orderBy('updated_at', 'desc')->first();
            $current_date          = new DateTime("now");
            $last_installment_date = new DateTime($rd_policy->next_installment_date);
            $interval              = $last_installment_date->diff($current_date);
            $interval->format('%R%a days');

            return View::make('admin.policy.mis_pay_installment', compact('title', 'policy', 'rd_policy', 'interval'));
        } else {
            return Redirect::route('login')->with('error', " You are not logged in ");
        }
    }

    /** end of class */

}




