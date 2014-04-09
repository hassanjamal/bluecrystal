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
     * @param Associate              $associate
     * @param Branch                 $branch
     * @param Rank                   $rank
     * @param Policy                 $policy
     * @param Fd_scheme_payment      $fd_scheme_payment
     * @param Rd_scheme_payment      $rd_scheme_payment
     * @param Policy_team_commission $policy_team_commision
     * @param Policy_self_commission $policy_self_commision
     */
    public function __construct(
                                Associate $associate,
                                Branch $branch,
                                Rank $rank,
                                Policy $policy,
                                Fd_scheme_payment $fd_scheme_payment,
                                Rd_scheme_payment $rd_scheme_payment,
                                Policy_team_commission $policy_team_commision,
                                Policy_self_commission $policy_self_commision
                                ) {
        parent::__construct();
        $this->associate             = $associate;
        $this->branch                = $branch;
        $this->rank                  = $rank;
        $this->policy                = $policy;
        $this->fd_scheme_payment     = $fd_scheme_payment;
        $this->rd_scheme_payment     = $rd_scheme_payment;
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
            if (Sentry::getUser()->isSuperUser() || Sentry::getUser()->hasAccess('policy-create')) {
                $title = "Create Policy";
                $mode  = 'create';

                return View::make(
                                  'admin/policy/create',
                                  compact('title', 'mode', 'branch_id')
                                  );
            }
            else {
                return Redirect::to('admin/policy')
                ->with('error', " You dont have enough permission to create policy ");
            }
        }
        else {
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
                                                              $this->policy->scheme_type );
                    if ($result) {
                        return Redirect::to('admin/policy/' . $this->policy->id . '/edit')->with(
                                                                                                 'success',
                                                                                                 "Policy Created Successfully" );
                    }
                    else {
                        $error = " Commision for Scheme Created has not been updated succesfully";

                        return Redirect::to('admin/policy/create')->with('error', $error);
                    }
                }
                elseif ($this->policy->scheme_type == 'RD') {
                    $result = $this->update_rd_scheme_payment(
                                                              $this->policy->id,
                                                              (object)Input::all(),
                                                              $this->policy->associate_id,
                                                              $this->policy->scheme_type,
                                                              1
                                                              );
                    if ($result) {
                        return Redirect::to('admin/policy' )->with( 'success', "Policy Created Successfully");
                    }
                    else {
                        $error = " Commision for Scheme Created has not been updated succesfully";

                        return Redirect::to('admin/policy/create')->with('error', $error);
                    }
                }
            }
            else {
                // Get validation errors (see Ardent package)
                $error = $this->policy->errors()->all();

                return Redirect::to('admin/policy/create')
                ->with('error', $error);
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
                $mode  = 'create';
                if ($policy->id) {
                    return View::make(
                                      'admin/policy/create',
                                      compact('title', 'mode', 'branch_id', 'policy')
                                      );
                }
            }
            else {
                return Redirect::to('admin/policy')
                ->with('error', " You dont have enough permission to create policy ");
            }
        }
        else {
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
            }
            elseif ($policy->scheme_type == 'RD') {
                $scheme_payments = Policy::find($policy->id)->rd_scheme_payment()->get();
            }

            return View::make('admin/policy/details', compact('policy', 'scheme_payments', 'title'));

        }
        else {
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
                return View::make(
                                  'admin/policy/receipt',
                                  compact('policy')
                                  );
            }
            else {
                return Redirect::to('admin/policy')->with('error', "Policy Does Not Exists");
            }
        }
        else {
            return Redirect::route('login')->with('error', " You are not logged in ");
        }
    }

    /**
     * [getWelcome description]
     * @param  [type] $policy [description]
     * @return [type]         [description]
     */
    public function getWelcome($policy)
    {
        if (Sentry::check()) {
            if ($policy->id) {
                return View::make(
                                  'admin/policy/welcome',
                                  compact('policy')
                                  );
            }
            else {
                return Redirect::to('admin/policy')->with('error', "Policy Does Not Exists");
            }
        }
        else {
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
            }
            else {
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
            if(Sentry::getUser()->hasAccess('policy-edit')){
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
            else{

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
        }
        else {
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
        $term      = Input::get('term');
        $associate = array();
        $search    = DB::select(
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

    /**
     * [getFdscheme description]
     *
     * @return string [type]
     */
    public function getFdscheme()
    {
        $term      = Input::get('term');
        $fdschemes = array();
        $search    = DB::select(
                                "
                                select id, interest,years ,name as value ,description as label
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

    /**
     * [getRdscheme description]
     *
     * @return string [type]
     */
    public function getRdscheme()
    {
        $term      = Input::get('term');
        $rdschemes = array();
        $search    = DB::select(
                                "
                                select id, interest, years ,name as value ,description as label
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
    * Generate Commission Structure for policy
    * @param  [type] $policy [description]
    * @return [type]         [description]
    */
    public function getCommision($policy)
    {
        if($policy->id)
        {
            $title = "Policy And Self Commission Details" . ' For ' . $policy->policy_no;

            return View::make(
                              'admin/policy/commission',
                              compact(
                                      'policy',
                                      'title'
                                      )
                              );
        }
        else {
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
        $policy_id   = str_pad($id, 6, "1", STR_PAD_LEFT);
        $year        = date("Y");

        return substr($branch_name, 0, 3) . '-' . $policy_id . '-' . $year;
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
        $this->fd_scheme_payment->drawn_date     = date("Y-m-d", strtotime($input->drawn_date));;
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
        }
        else {
            $error = " Payment Details for FD Scheme Created has not been updated successfully";

            return Redirect::to('admin/policy/create')->with('error', $error);
        }
    }

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
            $policy_time = strtotime($this->rd_scheme_payment->created_at);
            $this->rd_scheme_payment->next_installment_date = date("Y-m-d", strtotime("+1 month", $policy_time));
            $this->rd_scheme_payment->save();
            return true;
        }
        else {
            $error = " Payment Details for RD Scheme Created has not been updated successfully";

            return Redirect::to('admin/policy/create')->with('error', $error);

        }
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
    public function update_self_commission(
                                           $associate_id, $scheme_type, $input, $policy_id, $payment_id, $deposit_amount
                                           ) {
        $rank_id   = Associate::where('id', $associate_id)->pluck('rank_id');
        $scheme_id = $input->to_scheme_id;

        if ($scheme_type == 'FD') {
            /**
             * pluck year name from Fdscheme table which will
             * be the column name in Fd_self_commision table
             * and finally commision rate will be fetched from there
             */
            $year_name  = Fdscheme::where('id', $scheme_id)->pluck('year_name');
            $commission = Fd_self_commision::where('rank_id', $rank_id)->pluck($year_name);

            // generate self comission for generated policy
            $this->policy_self_commision->payment_id     = $payment_id;
            $this->policy_self_commision->policy_id      = $policy_id;
            $this->policy_self_commision->associate_id   = $associate_id;
            $this->policy_self_commision->rank_id        = $rank_id;
            $this->policy_self_commision->rank_no        = Rank::where('id', $rank_id)->pluck('rank_no');
            $this->policy_self_commision->deposit_amount = $deposit_amount;
            $this->policy_self_commision->self_commision = ($commission * $deposit_amount) / 100;

            // saving self commission and returning value according to action
            if ($this->policy_self_commision->save()) {
                return true;
            }
            else {
                return false;
            }
        }
        elseif ($scheme_type == 'RD') {
            /**
             * pluck year name from Rdscheme table which will
             * be the column name in Rd_self_commision table
             * and finally commision rate will be fetched from there
             */
            $year_name  = Rdscheme::where('id', $scheme_id)->pluck('year_name');
            $commission = Rd_self_commision::where('rank_id', $rank_id)->pluck($year_name);

            // generate self comission for generated policy
            $this->policy_self_commision->payment_id     = $payment_id;
            $this->policy_self_commision->policy_id      = $policy_id;
            $this->policy_self_commision->associate_id   = $associate_id;
            $this->policy_self_commision->rank_id        = $rank_id;
            $this->policy_self_commision->rank_no        = Rank::where('id', $rank_id)->pluck('rank_no');
            $this->policy_self_commision->deposit_amount = $deposit_amount;
            $this->policy_self_commision->self_commision = ($commission * $deposit_amount) / 100;

            // saving self commission and returning value according to action
            if ($this->policy_self_commision->save()) {
                return true;
            }
            else {
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

            if ($scheme_type == 'FD') {
                /**
                 * pluck year name from Fdscheme table which will
                 * be the column name in Fd_self_commision table
                 * and finally commision rate will be fetched from there
                 */
                $year_name  = Fdscheme::where('id', $scheme_id)->pluck('year_name');
                $commission = Fd_team_commision::where('rank_id', $rank_id)->pluck($year_name);
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
                $policy_team_commision->team_commision = ($commission * $deposit_amount) / 100;

                $policy_team_commision->save();

            }
            elseif ($scheme_type == 'RD') {
                /**
                 * pluck year name from Rdscheme table which will
                 * be the column name in Rd_self_commision table
                 * and finally commision rate will be fetched from there
                 */
                $year_name  = Rdscheme::where('id', $scheme_id)->pluck('year_name');
                $commission = Rd_team_commision::where('rank_id', $rank_id)->pluck($year_name);
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
                $policy_team_commision->team_commision = ($commission * $deposit_amount) / 100;

                $policy_team_commision->save();

            }
            $associate = $associate_next;
        };
    }
/** end of class */
}


