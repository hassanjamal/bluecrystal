@extends('admin.layouts.modal')
{{-- Content --}}
@section('content')

<div class="container" id="rootwizard">
<form class="form-horizontal" method="post" action="" autocomplete="off" id="policy">
<!-- CSRF Token -->
<input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
{{ Form::hidden('to_associate_id', Input::old('to_associate_id'),array('id'=>'to_associate_id'))}}
{{ Form::hidden('to_collector_id', Input::old('to_collector_id'),array('id'=>'to_collector_id'))}}
{{ Form::hidden('to_scheme_id', Input::old('to_scheme_id'),array('id'=>'to_scheme_id'))}}
{{ Form::hidden('to_scheme_interest', Input::old('to_scheme_interest'),array('id'=>'to_scheme_interest'))}}
{{ Form::hidden('to_scheme_description', Input::old('to_scheme_description'),array('id'=>'to_scheme_description'))}}
{{ Form::hidden('to_scheme_years', Input::old('to_scheme_years'),array('id'=>'to_scheme_years'))}}
<div class="row">
    <ul>
        <li><a href="#step-1" data-toggle="tab">
                <h5 class="list-group-item-heading">Step 1</h5>

                <p class=" lead list-group-item-text">Official Details</p>
            </a></li>
        <li><a href="#step-2" data-toggle="tab">
                <h5 class="list-group-item-heading">Step 2</h5>

                <p class=" lead list-group-item-text">Personal Details</p>
            </a></li>
        <li><a href="#step-3" data-toggle="tab">
                <h5 class="list-group-item-heading">Step 3</h5>

                <p class=" lead list-group-item-text">Nominee Details</p>
            </a></li>
    </ul>
</div>
<!-- end of ist row within container -->
<div class="tab-content">
<div class="tab-pane" id="step-1">
<div class="row well" id="official_details">
    <blockquote>
        <p class="lead">Official Details For New Policy</p>
    </blockquote>
    <!-- branch_id -->
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-4 control-label" for="branch_id">Branch :</label>

            <div class="col-md-8">
                <input readonly class="form-control" type="text" name="branch_id" id="branch_id"
                       value="{{{ Input::old('branch_id', isset($policy) ? $policy->branch_id : $branch_id) }}}"/>
            </div>
        </div>
    </div>
    <!-- ./ branch_id -->

    <!-- associate_no -->
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-4 control-label" for="associate_no">Associate :</label>

            <div class="col-md-8">
                <input class="form-control" type="text" name="associate_no" id="associate_no"
                       value="{{{ Input::old('associate_no', isset($policy) ? $policy->associate_no : null) }}}"/>
            </div>
        </div>
    </div>
    <!-- ./ associate_no -->
    <div class="col-md-6">
        <div class="form-group {{{ $errors->has('special_case') ? 'error' : '' }}}">
            <label class="col-md-4 control-label" for="special_case">Special Case :</label>

            <div class="col-md-8">
                {{ Form::select('special_case',$special_case ,isset($policy) ? $policy->special_case : 0 ,
                array('class'=>'form-control ' , 'id' =>'special_case'))}}
            </div>
        </div>
    </div>
    <!-- scheme_type -->
    <div class="col-md-6">
        <div class="form-group {{{ $errors->has('scheme_type') ? 'error' : '' }}}">
            <label class="col-md-4 control-label" for="scheme_type">Scheme Type :</label>

            <div class="col-md-8">
                {{ Form::select('scheme_type',array(
                'FD' => 'Fixed Deposit',
                'RD' => 'Recurring Deposit',
                'MIS'=>'Monthly Installment'
                ) ,isset($policy) ? $policy->scheme_type : null, array('class'=>'form-control ' , 'id'
                =>'scheme_type'))}}
            </div>
        </div>
    </div>
    <!-- ./ scheme_type -->


    <!-- scheme_name -->
    <div class="col-md-6">
        <div class="form-group {{{ $errors->has('scheme_name') ? 'error' : '' }}}">
            <label class="col-md-4 control-label" for="scheme_name">Scheme Name :</label>

            <div class="col-md-8">
                <input class="form-control" type="text" name="scheme_name" id="scheme_name"
                       value="{{{ Input::old('scheme_name', isset($policy) ? $policy->scheme_name : null) }}}"/>
            </div>
        </div>
    </div>

</div>
<!-- end of main policy block -->
<div class="row">
    <div class="col-md-12" id="fd_scheme_details_block">
        <div class="well form-group">
            <blockquote>
                <p class="lead">Fixed Deposit Plan </p>
            </blockquote>
            <!-- scheme amount -->
            <div class="col-md-6" id="fd_scheme_amount_block">
                <div class="form-group ">
                    <label class="col-md-4 control-label" for="fd_scheme_amount">Scheme Amount :</label>

                    <div class="col-md-8">
                        <input class="form-control" type="text" name="fd_scheme_amount" id="fd_scheme_amount"
                               value="{{{ Input::old('fd_scheme_amount', isset($policy) ? $policy->fd_scheme_amount : null) }}}"
                               data-bv-notempty data-bv-notempty-message="Amount is required"/>
                    </div>
                </div>
            </div>
            <!-- ./scheme amount -->

            <!-- Maturity amount -->
            <div class="col-md-6" id="fd_maturity_amount_block">
                <div class="form-group ">
                    <label class="col-md-4 control-label" for="fd_maturity_amount">Maturity Amount :</label>

                    <div class="col-md-8">
                        <input readonly class="form-control" type="text" name="fd_maturity_amount"
                               id="fd_maturity_amount" value=""/>
                    </div>
                </div>
            </div>
            <!-- ./Maturity amount -->
        </div>
    </div>

    <div class="col-md-12" id="rd_scheme_details_block">
        <div class="well form-group">
            <blockquote>
                <p class="lead">Recurring Deposit Plan</p>
            </blockquote>
            <!-- scheme amount -->
            <div class="col-md-6" id="rd_scheme_amount_block">
                <div class="form-group ">
                    <label class="col-md-4 control-label" for="rd_scheme_amount">Scheme Amount :</label>

                    <div class="col-md-8">
                        <input class="form-control" type="text" name="rd_scheme_amount" id="rd_scheme_amount"
                               value="{{{ Input::old('rd_scheme_amount', isset($policy) ? $policy->rd_scheme_amount : null) }}}"/>
                    </div>
                </div>
            </div>
            <!-- ./scheme amount -->

            <!-- associate collector-->
            <div class="col-md-6" id="rd_associate_collector_block">
                <div class="form-group ">
                    <label class="col-md-4 control-label" for="rd_associate_collector_id">Collector :</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" name="rd_associate_collector_id" id="rd_associate_collector_id" value=""/>
                    </div>
                </div>
            </div>

            <!-- associate collector-->
            <!-- Maturity amount -->
            <div class="col-md-6" id="rd_maturity_amount_block">
                <div class="form-group ">
                    <label class="col-md-4 control-label" for="rd_maturity_amount">Maturity Amount :</label>

                    <div class="col-md-8">
                        <input readonly class="form-control" type="text" name="rd_maturity_amount"
                               id="rd_maturity_amount"
                               value=""/>
                    </div>
                </div>
            </div>
            <!-- ./Maturity amount -->

            <!-- No Of Installment -->
            <div class="col-md-6" id="rd_total_installment_block">
                <div class="form-group ">
                    <label class="col-md-4 control-label" for="rd_total_installment">Total Installment :</label>

                    <div class="col-md-8">
                        <input readonly class="form-control" type="text" name="rd_total_installment"
                               id="rd_total_installment"
                               value=""/>
                    </div>
                </div>
            </div>


            <!-- ./No Of Installment -->
        </div>
    </div>


    <div class="col-md-12" id="mis_scheme_details_block">
        <div class="well form-group">
            
            <blockquote>
                <p class="lead">Monthly Installment Plan</p>
            </blockquote>
            <!-- scheme amount -->
            <div class="col-md-6" id="mis_scheme_amount_block">
                <div class="form-group ">
                    <label class="col-md-4 control-label" for="mis_scheme_amount">Scheme Amount :</label>

                    <div class="col-md-8">
                        <input class="form-control" type="text" name="mis_scheme_amount" id="mis_scheme_amount"
                               value="{{{ Input::old('mis_scheme_amount', isset($policy) ? $policy->mis_scheme_amount : null) }}}"
                               data-bv-notempty data-bv-notempty-message="Amount is required"/>
                    </div>
                </div>
            </div>
            <!-- ./scheme amount -->

            <!-- Monthly Installment amount -->
            <div class="col-md-6" id="mis_monthly_installment_block">
                <div class="form-group ">
                    <label class="col-md-4 control-label" for="mis_monthly_installment">Monthly Installment :</label>

                    <div class="col-md-8">
                        <input readonly class="form-control" type="text" name="mis_monthly_installment"
                               id="mis_monthly_installment" value=""/>
                    </div>
                </div>
            </div>
            <!-- ./Monthly Installment amount -->
        

        </div>
    </div>
</div>
<!-- end of FD/RD/MIS block -->
<div class="row well" id="payment_block">
    <blockquote>
        <p class="lead">Payment Details </p>
    </blockquote>
    <!-- payment_mode -->
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-4 control-label" for="payment_mode">Mode :</label>

            <div class="col-md-8">
                {{ Form::select('payment_mode',array( 'cash' => 'Cash', 'cheque' => 'Cheque', 'dd' => 'DD',)
                ,isset($policy) ? $policy->payment_mode : 'cash', array('class'=>'form-control ', 'id' =>
                'payment_mode'))}}
            </div>
        </div>
    </div>
    <!-- ./ payment_mode -->

    <!-- drawee_bank -->
    <div class="col-md-6" id="drawee_bank_block">
        <div class="form-group {{{ $errors->has('drawee_bank') ? 'error' : '' }}}">
            <label class="col-md-4 control-label" for="drawee_bank">Drawee Bank :</label>

            <div class="col-md-8">
                <input class="form-control" type="text" name="drawee_bank" id="drawee_bank"
                       value="{{{ Input::old('drawee_bank', isset($policy) ? $policy->drawee_bank : null) }}}"/>
                {{{ $errors->first('drawee_bank', '<span class="help-inline">:message</span>') }}}
            </div>
        </div>
    </div>
    <!-- ./ drawee_bank -->

    <!-- drawee_branch -->
    <div class="col-md-6" id="drawee_branch_block">
        <div class="form-group {{{ $errors->has('drawee_branch') ? 'error' : '' }}}">
            <label class="col-md-4 control-label" for="drawee_branch">Drawee Branch :</label>

            <div class="col-md-8">
                <input class="form-control" type="text" name="drawee_branch" id="drawee_branch"
                       value="{{{ Input::old('drawee_branch', isset($policy) ? $policy->drawee_branch : null) }}}"/>
                {{{ $errors->first('drawee_branch', '<span class="help-inline">:message</span>') }}}
            </div>
        </div>
    </div>
    <!-- ./ drawee_branch -->

    <!-- drawn_date -->
    <div class="col-md-6" id="drawn_date_block">
        <div class="form-group">
            <label class="col-md-4 control-label" for="drawn_date">Drawn Date :</label>

            <div class="col-md-8">
                <div class="input-appended">
                    <input class="date-picker form-control" type="text" name="drawn_date" id="drawn_date"
                           value="{{{ Input::old('drawn_date', isset($policy) ? $policy->drawn_date : date(" Y-m-d"))
                    }}}"/>
                    {{{ $errors->first('drawn_date', '<span class="help-inline">:message</span>') }}}
                    <!-- <label for="drawn_date" class="add&#45;on"><i class="icon&#45;calendar"></i></label> -->
                </div>

            </div>
        </div>
    </div>
    <!-- ./ drawn_date -->

    <!-- cheque_no -->
    <div class="col-md-6" id="cheque_no_block">
        <div class="form-group {{{ $errors->has('cheque_no') ? 'error' : '' }}}">
            <label class="col-md-4 control-label" for="cheque_no">Cheque/DD No :</label>

            <div class="col-md-8">
                <input class="form-control" type="text" name="cheque_no" id="cheque_no"
                       value="{{{ Input::old('cheque_no', isset($policy) ? $policy->cheque_no : null) }}}"/>
                {{{ $errors->first('cheque_no', '<span class="help-inline">:message</span>') }}}
            </div>
        </div>
    </div>
    <!-- ./ cheque_no -->

    <!-- paid -->
    <div class="col-md-6" id="paid_block">
        <div class="form-group {{{ $errors->has('paid') ? 'error' : '' }}}">
            <label class="col-md-4 control-label" for="paid">Paid :</label>

            <div class="col-md-8">
                {{Form::select('paid',array(
                'paid' => 'Paid',
                'due' => 'Due'
                ) ,isset($policy) ? $policy->paid : null, array('class'=>'form-control '))}}
                {{{ $errors->first('paid', '<span class="help-inline">:message</span>') }}}
            </div>
        </div>
    </div>
    <!-- ./ paid -->
</div>
<!-- end of payment block -->
</div>
<!-- end of official step -->
<div class="tab-pane" id="step-2">
    <div class="row well">
        <div class="col-md-12">
            <blockquote>
                <p class="lead">Personal Details Of Customer</p>
            </blockquote>
        </div>
        <!-- Name -->
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-md-4 control-label" for="name">Name :</label>

                <div class="col-md-8">
                    <input class="form-control" type="text" name="name" id="name"
                           value="{{{ Input::old('name', isset($policy) ? $policy->name : null) }}}"/>
                </div>
            </div>
        </div>
        <!-- age start -->
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-md-4 control-label" for="age">Age :</label>

                <div class="col-md-8">
                    {{ Form::selectRange('age', 10, 70,isset($policy) ? $policy->age : 35, array('class'=>'form-control
                    '))}}
                </div>
            </div>
        </div>
        <!-- age end -->

        <!-- Guardian Name start -->
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-md-4 control-label" for="guardian_name">Guardian :</label>

                <div class="col-md-8">
                    <input class="form-control" type="text" name="guardian_name" id="guardian_name"
                           value="{{{ Input::old('guardian_name', isset($policy) ? $policy->guardian_name : null) }}}"/>
                </div>
            </div>
        </div>
        <!-- Guardian Name end -->

        <!-- Guardian start -->
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-md-4 control-label" for="guardian_type"> Type :</label>

                <div class="col-md-8">
                    {{ Form::select('guardian_type',array( 'father' => 'Father', 'husband' => 'Husband', 'other' =>
                    'Others') ,isset($policy) ? $policy->guardian_type : null, array('class'=>'form-control '))}}
                </div>
            </div>
        </div>
        <!-- Guardian end -->

        <!-- Pan no -->
        <div class="col-md-6">
            <div class="form-group {{{ $errors->has('pan_no') ? 'error' : '' }}}">
                <label class="col-md-4 control-label" for="pan_no">PAN No :</label>

                <div class="col-md-8">
                    <input class="form-control" type="text" name="pan_no" id="pan_no"
                           value="{{{ Input::old('pan_no', isset($policy) ? $policy->pan_no : null) }}}"/>
                </div>
            </div>
        </div>
        <!-- ./Pan no -->

        <!-- sex -->
        <div class="col-md-6">
            <div class="form-group {{{ $errors->has('sex') ? 'error' : '' }}}">
                <label class="col-md-4 control-label" for="sex">Sex :</label>

                <div class="col-md-8">
                    {{ Form::select('sex',array( 'Male' => 'Male', 'female' => 'Female') ,isset($policy) ? $policy->sex
                    : null, array('class'=>'form-control '))}}
                </div>
            </div>
        </div>
        <!-- ./ Sex -->

        <!-- date_of_birth -->
        <div class="col-md-6">
            <div class="form-group {{{ $errors->has('date_of_birth') ? 'error' : '' }}}">
                <label class="col-md-4 control-label" for="date_of_birth">BirthDate :</label>

                <div class="col-md-8">
                    <div class="input-appended">
                        <input class="date-picker form-control" type="text" name="date_of_birth" id="date_of_birth"
                               value="{{{ Input::old('date_of_birth', isset($policy) ? $policy->date_of_birth : date("
                               Y-m-d") ) }}}"/>
                        <!-- <label for="date_of_birth" class="add&#45;on"><i class="icon&#45;calendar"></i></label> -->
                    </div>
                </div>

            </div>
        </div>
        <!-- ./ date_of_birth -->


        <!-- mobile -->
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-md-4 control-label" for="mobile">Mobile :</label>

                <div class="col-md-8">
                    <input class="form-control" type="text" name="mobile" id="mobile"
                           value="{{{ Input::old('mobile', isset($policy) ? $policy->mobile : null) }}}"/>
                </div>
            </div>
        </div>
        <!-- ./ mobile -->

        <!-- address -->
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-md-4 control-label" for="address">Address :</label>

                <div class="col-md-8">
                    <input class="form-control" type="text" name="address" id="address"
                           value="{{{ Input::old('address', isset($policy) ? $policy->address : null) }}}"/>
                </div>
            </div>
        </div>
        <!-- ./ address -->

        <!-- city -->
        <div class="col-md-6">
            <div class="form-group ">
                <label class="col-md-4 control-label" for="city">City :</label>

                <div class="col-md-8">
                    <input class="form-control" type="text" name="city" id="city"
                           value="{{{ Input::old('city', isset($policy) ? $policy->city : null) }}}"/>
                </div>
            </div>
        </div>
        <!-- ./ city -->

        <!-- state -->
        <div class="col-md-6">
            <div class="form-group {{{ $errors->has('state') ? 'error' : '' }}}">
                <label class="col-md-4 control-label" for="state">State :</label>

                <div class="col-md-8">
                    <input class="form-control" type="text" name="state" id="state"
                           value="{{{ Input::old('state', isset($policy) ? $policy->state : null) }}}"/>
                    {{{ $errors->first('state', '<span class="help-inline">:message</span>') }}}
                </div>
            </div>
        </div>
        <!-- ./ state -->

        <!-- pincode -->
        <div class="col-md-6">
            <div class="form-group {{{ $errors->has('pincode') ? 'error' : '' }}}">
                <label class="col-md-4 control-label" for="pincode">Pincode :</label>

                <div class="col-md-8">
                    <input class="form-control" type="text" name="pincode" id="pincode"
                           value="{{{ Input::old('pincode', isset($policy) ? $policy->pincode : null) }}}"/>
                    {{{ $errors->first('pincode', '<span class="help-inline">:message</span>') }}}
                </div>
            </div>
        </div>
        <!-- ./ pincode -->
    </div>
    <!-- end of geneal tab -->
</div>
<!-- end of general step -->
<div class="tab-pane" id="step-3">
    <div class="row well">
        <blockquote>
            <p class="lead">Nominee Details of Customer</p>
        </blockquote>
        <!-- nominee_name -->
        <div class="col-md-6">
            <div class="form-group ">
                <label class="col-md-4 control-label" for="nominee_name">Nominee Name :</label>

                <div class="col-md-8">
                    <input class="form-control" type="text" name="nominee_name" id="nominee_name"
                           value="{{{ Input::old('nominee_name', isset($policy) ? $policy->nominee_name : null) }}}"/>
                </div>
            </div>
        </div>
        <!-- ./ nominee_name -->

        <!-- nominee_add -->
        <div class="col-md-6">
            <div class="form-group ">
                <label class="col-md-4 control-label" for="nominee_add">Nominee Add :</label>

                <div class="col-md-8">
                    <input class="form-control" type="text" name="nominee_add" id="nominee_add"
                           value="{{{ Input::old('nominee_add', isset($policy) ? $policy->nominee_add : null) }}}"/>
                </div>
            </div>
        </div>
        <!-- ./ nominee_add -->

        <!-- nominee_relation -->
        <div class="col-md-6">
            <div class="form-group ">
                <label class="col-md-4 control-label" for="nominee_relation">Relation :</label>

                <div class="col-md-8">
                    <input class="form-control" type="text" name="nominee_relation" id="nominee_relation"
                           value="{{{ Input::old('nominee_relation', isset($policy) ? $policy->nominee_relation : null) }}}"/>
                </div>
            </div>
        </div>
        <!-- ./ nominee_relation -->

        <!-- nominee_age -->
        <div class="col-md-6">
            <div class="form-group ">
                <label class="col-md-4 control-label" for="nominee_age">Age :</label>

                <div class="col-md-8">
                    {{ Form::selectRange('nominee_age', 10, 70,isset($policy) ? $policy->nominee_age : 35,
                    array('class'=>'form-control '))}}
                </div>
            </div>
        </div>
        <!-- ./ nominee_age -->
    </div>
    <!-- end of nominee block -->
</div>
<div class="row" style="margin-bottom:4em">
    <div class="col-xs-2">
        <input type='button' class='btn btn-info btn-block button-previous' name='previous' value='Previous'/>
    </div>
    <div class="col-xs-2 col-md-offset-8">
        <input type='button' class='btn btn-info btn-block button-next' name='next' value='Next'/>
        <input type='submit' class='btn btn-success btn-block button-finish' name='finish' value='Finish'
               style="display:none"/>
    </div>
</div>
</div>
</form>
</div>
<!-- end of main container -->
@stop
@section('scripts')
<script type="text/javascript">
// form wizard
$(document).ready(function () {
    $('#rootwizard').bootstrapWizard(
        {
            'tabClass': 'nav nav-pills thumbnail nav-justified',
            'nextSelector': '.button-next',
            'previousSelector': '.button-previous',
            'onTabClick': function (tab, navigation, index) {
                return false;
            },
            'onTabShow': function (tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index + 1;
                var $percent = ($current / $total) * 100;
                // $('#rootwizard').find('.bar').css({width:$percent+'%'});

                // If it's the last tab then hide the last button and show the finish instead
                if ($current >= $total) {
                    $('#rootwizard').find('.button-next').hide();
                    $('#rootwizard').find('.button-finish').show();
                    $('#rootwizard').find('.button-finish').removeClass('disabled');
                } else {
                    $('#rootwizard').find('.button-next').show();
                    $('#rootwizard').find('.button-finish').hide();
                }
            }
        }
    );
});
$(function () {
    $('#fd_scheme_amount').on('keyup paste change', function () {
        $('#scheme_name').attr("readonly", true);
        if ($('#to_scheme_interest').val() > 0) {
            $('#fd_maturity_amount').val(Number(parseInt($('#fd_scheme_amount').val()) + (($('#to_scheme_interest').val() * $('#to_scheme_years').val() * $('#fd_scheme_amount').val()) / 100)).toFixed(2));
        }

    });

    $('#rd_scheme_amount').on('keyup paste change', function () {
        $('#scheme_name').attr("readonly", true);
        if ($('#to_scheme_interest').val() > 0) {
            // console.log($('#to_scheme_interest').val());
            $('#rd_total_installment').val($('#to_scheme_years').val() * 12);
            var expected_maturity_amount = 0;
            for (var i = ($('#rd_total_installment').val()); i >= 1; i--) {
                var calculated_amount = parseInt($('#rd_scheme_amount').val()) *
                    Math.pow(
                        (1 + ($('#to_scheme_interest').val() / (100 * 12))),
                        i
                    );
                expected_maturity_amount = expected_maturity_amount + calculated_amount;
                // console.log(expected_maturity_amount);
            }
            $('#rd_maturity_amount').val(Number(expected_maturity_amount).toFixed(2));
        }
    });
});

$(function(){
    $('#mis_scheme_amount').on('keyup paste change', function () {

        $('#scheme_name').attr("readonly", true);
        if($('#to_scheme_interest').val() > 0){
            var no_of_quarters = $('#to_scheme_years').val()*4;
            var monthly_installment = $('#mis_scheme_amount').val()*$('#to_scheme_interest').val()*$('#to_scheme_years').val()/(100*$('#to_scheme_years').val()*12);

            $('#mis_monthly_installment').val(Number(monthly_installment).toFixed(2));

        }
        });
});
// dropdown change block
$(function () {
    if ($('#payment_mode').val() === 'cash') {
        $("#drawee_bank_block").hide("slow");
        $("#drawee_branch_block").hide("slow");
        $("#cheque_no_block").hide("slow");
        $("#paid_block").hide("slow");
    }
    $("#payment_mode").on('change', function () {
        var mode = $(this).val();
        if (mode === 'cash') {
            $("#drawee_bank_block").hide("slow");
            $("#drawee_branch_block").hide("slow");
            $("#cheque_no_block").hide("slow");
            $("#paid_block").hide("slow");

            return false;
        }
        $("#drawee_bank_block").show("slow");
        $("#drawee_branch_block").show("slow");
        $("#cheque_no_block").show("slow");
        $("#paid_block").show("slow");

    });
});

// by default FD plan is selected and thus hiding MIS and RD
$(function () {
    $("#rd_scheme_details_block").hide();
    $("#mis_scheme_details_block").hide();
    $('#scheme_name').autocomplete({
        source: "add_to_fd_scheme_id",
        change: function (event, ui) {
            if (!ui.item) {
                this.value = '';
                $('#policy').data('bootstrapValidator').updateStatus('#scheme_name', 'NOT_VALIDATED', null).validateField('#scheme_name');

            }
        },
        select: function (event, ui) {
            $('#associate_no').attr("readonly", true);
            $('#to_scheme_id').val(ui.item.id);
            if ($('#special_case').val() === "NONE") {
                $('#to_scheme_interest').val(ui.item.interest);
            }
            else {
                $('#to_scheme_interest').val(ui.item.special_interest);
            }
            $('#to_scheme_description').val(ui.item.description);
            $('#to_scheme_years').val(ui.item.years);
        }
    });
});
// ./dropdown change block
// autocomplete block for change in Scheme Type like FD MIS and RD
$(function () {
    $("#scheme_type").change(function () {
        var mode = $(this).val();
        if (mode === 'FD') {
            $("#fd_scheme_details_block").show(500);
            $("#rd_scheme_details_block").hide();
            $("#mis_scheme_details_block").hide();
            // return false;

            $('#scheme_name').autocomplete({
                source: "add_to_fd_scheme_id",
                change: function (event, ui) {
                    if (!ui.item) {
                        this.value = '';
                        $('#policy').data('bootstrapValidator').updateStatus('#scheme_name', 'NOT_VALIDATED', null).validateField('#scheme_name');
                    }
                },
                select: function (event, ui) {
                    $('#associate_no').attr("readonly", true);
                    $('#to_scheme_id').val(ui.item.id);
                    if ($('#special_case').val() === "NONE") {
                        $('#to_scheme_interest').val(ui.item.interest);
                    }
                    else {
                        $('#to_scheme_interest').val(ui.item.special_interest);
                    }
                    $('#to_scheme_description').val(ui.item.description);
                    $('#to_scheme_years').val(ui.item.years);
                }
            });
        }
        else if (mode === 'RD') {
            $("#fd_scheme_details_block").hide();
            $("#rd_scheme_details_block").show(500);
            $("#mis_scheme_details_block").hide();

            $('#scheme_name').autocomplete({
                source: "add_to_rd_scheme_id",
                change: function (event, ui) {
                    if (!ui.item) {
                        this.value = '';
                        $('#policy').data('bootstrapValidator').updateStatus('#scheme_name', 'NOT_VALIDATED', null).validateField('#scheme_name');
                    }
                },
                select: function (event, ui) {
//                    $('#special_case').attr("disabled", true);
//                    $('#scheme_type').attr("disabled", true);
                    $('#associate_no').attr("readonly", true);
                    $('#to_scheme_id').val(ui.item.id);
                    if ($('#special_case').val() === "NONE") {
                        $('#to_scheme_interest').val(ui.item.interest);
                    }
                    else {
                        $('#to_scheme_interest').val(ui.item.special_interest);
                    }
                    $('#to_scheme_description').val(ui.item.description);
                    $('#to_scheme_years').val(ui.item.years);
                }
            });

        }
        else if (mode === 'MIS') {
            $("#fd_scheme_details_block").hide();
            $("#rd_scheme_details_block").hide();
            $("#mis_scheme_details_block").show(500);
            // return false;

            $('#scheme_name').autocomplete({
                source: "add_to_mis_scheme_id",
                change: function (event, ui) {
                    if (!ui.item) {
                        this.value = '';
                        $('#policy').data('bootstrapValidator').updateStatus('#scheme_name', 'NOT_VALIDATED', null).validateField('#scheme_name');
                    }
                },
                select: function (event, ui) {
//                    $('#special_case').attr("disabled", true);
//                    $('#scheme_type').attr("disabled", true);
                    $('#associate_no').attr("readonly", true);
                    $('#to_scheme_id').val(ui.item.id);
                    if ($('#special_case').val() === "NONE") {
                        $('#to_scheme_interest').val(ui.item.interest);
                    }
                    else {
                        $('#to_scheme_interest').val(ui.item.special_interest);
                    }
                    $('#to_scheme_description').val(ui.item.description);
                    $('#to_scheme_years').val(ui.item.years);
                }
            });
        }
    });

});

//autosearch form associate id
$(function () {
    $('#associate_no').autocomplete({
        source: "add_to_associate_id",
        select: function (event, ui) {
            $('#to_associate_id').val(ui.item.id);
            $('#to_collector_id').val(ui.item.id);
            $('#rd_associate_collector_id').val(ui.item.value);
        }
    });
});

// autosearch for collector id
$(function(){
    $('#rd_associate_collector_id').autocomplete({
            source: "add_to_associate_id",
            change: function (event, ui) {
                if (!ui.item) {
                    this.value = '';
                    $('#policy').data('bootstrapValidator').updateStatus('#rd_associate_collector_id', 'NOT_VALIDATED', null).validateField('#rd_associate_collector_id');
                }
            },
            select: function(event, ui){
                $('#to_collector_id').val(ui.item.id);
                $('#rd_associate_collector_id').val(ui.item.value);
            }
        });
});

$(function () {
    $(".date-picker").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "-70:+0"
    });
});
</script>
{{ HTML::script('/app_assets/admin/js/policyValidator.js') }}
@stop
