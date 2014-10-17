@extends('admin.layouts.modal')
{{-- Content --}}
@section('content')

<div class="container">
    <form class="form-horizontal" method="post" action="" autocomplete="off" id="policy">
        <!-- CSRF Token -->
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
        {{ Form::hidden('to_associate_id', $policy->associate_id,array('id'=>'to_associate_id'))}}
        {{ Form::hidden('to_scheme_id',$policy->scheme_id ,array('id'=>'to_scheme_id'))}}

        <div class="row well">
            <blockquote>
                <p class="lead">Official Details For New Installment</p>
            </blockquote>
            <!-- branch_id -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4 control-label" for="branch_id">Branch :</label>
                    <div class="col-md-8">
                        <input readonly class="form-control" type="text" name="branch_id" id="branch_id"
                        value="{{{ isset($policy) ? $policy->branch_id : $branch_id }}}"/>
                    </div>
                </div>
            </div>
            <!-- ./ branch_id -->

            <!-- associate_no -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4 control-label" for="associate_no">Associate :</label>

                    <div class="col-md-8">
                        <input readonly class="form-control" type="text" name="associate_no" id="associate_no" value="{{{ isset($policy) ? $policy->associate_no : null }}}"/>
                    </div>
                </div>
            </div>
            <!-- ./ associate_no -->

            <!-- scheme_type -->
            <div class="col-md-6">
                <div class="form-group {{{ $errors->has('scheme_type') ? 'error' : '' }}}">
                    <label class="col-md-4 control-label" for="scheme_type">Scheme Type :</label>

                    <div class="col-md-8">
                        <input readonly class="form-control" type="text" name="scheme_type" id="scheme_type" value="{{{ isset($policy) ? $policy->scheme_type : null }}}"/>
                    </div>
                </div>
            </div>
            <!-- ./ scheme_type -->


            <!-- scheme_name -->
            <div class="col-md-6">
                <div class="form-group {{{ $errors->has('scheme_name') ? 'error' : '' }}}">
                    <label class="col-md-4 control-label" for="scheme_name">Scheme Name :</label>
                    <div class="col-md-8">
                        <input readonly class="form-control" type="text" name="scheme_name" id="scheme_name"
                        value="{{{ isset($policy) ? $policy->scheme_name : null }}}"/>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of main policy block -->
        <div class="row">
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
                                <input readonly class="form-control" type="text" name="rd_scheme_amount" id="rd_scheme_amount"
                                value="{{{ isset($policy) ? $rd_policy->deposit_amount : null }}}"/>
                            </div>
                        </div>
                    </div>
                    <!-- ./scheme amount -->

                    <!-- Maturity amount -->
                    <div class="col-md-6" id="rd_maturity_amount_block">
                        <div class="form-group ">
                            <label class="col-md-4 control-label" for="rd_maturity_amount">Installment Amount :</label>

                            <div class="col-md-8">
                                <input readonly class="form-control" type="text" name="rd_maturity_amount" id="rd_maturity_amount"
                                value="{{{ isset($policy) ? $rd_policy->mature_amount : null }}}"/>
                            </div>
                        </div>
                    </div>
                    <!-- ./Maturity amount -->

                    <!-- No Of Installment -->
                    <div class="col-md-6" id="rd_total_installment_block">
                        <div class="form-group ">
                            <label class="col-md-4 control-label" for="rd_total_installment">Total Installment :</label>

                            <div class="col-md-8">
                                <input readonly class="form-control" type="text" name="rd_total_installment" id="rd_total_installment"
                                value="{{{ isset($policy) ? $rd_policy->total_installment : null }}}"/>
                            </div>
                        </div>
                    </div>
                    <!-- ./No Of Installment -->
                    <div class="col-md-6" id="rd_current_installment_block">
                        <div class="form-group ">
                            <label class="col-md-4 control-label" for="rd_current_installment">Current Installment :</label>

                            <div class="col-md-8">
                                <input readonly class="form-control" type="text" name="rd_current_installment" id="rd_current_installment"
                                value="{{{ isset($policy) ? $rd_policy->paid_installment + 1 : null }}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" id="rd_current_installment_delay_block">
                        <div class="form-group ">
                            <label class="col-md-4 control-label" for="rd_current_installment_delay">Delay in days :</label>

                            <div class="col-md-8">
                                <input readonly class="form-control" type="text" name="rd_current_installment_delay" id="rd_current_installment_delay"
                                value="{{{ isset($policy) ? $interval->days : null }}}"/>
                            </div>
                        </div>
                    </div>
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
                        {{ Form::select('payment_mode',array( 'cash' => 'Cash', 'cheque' => 'Cheque', 'dd' => 'DD'),'cash' ,array('class'=>'form-control ', 'id' => 'payment_mode')) }}
                    </div>
                </div>
            </div>
            <!-- ./ payment_mode -->

            <!-- drawee_bank -->
            <div class="col-md-6" id="drawee_bank_block">
                <div class="form-group">
                    <label class="col-md-4 control-label" for="drawee_bank">Drawee Bank :</label>

                    <div class="col-md-8">
                        <input class="form-control" type="text" name="drawee_bank" id="drawee_bank"
                        value="{{{ Input::old('drawee_bank') }}}"/>
                    </div>
                </div>
            </div>
            <!-- ./ drawee_bank -->

            <!-- drawee_branch -->
            <div class="col-md-6" id="drawee_branch_block">
                <div class="form-group">
                    <label class="col-md-4 control-label" for="drawee_branch">Drawee Branch :</label>

                    <div class="col-md-8">
                        <input class="form-control" type="text" name="drawee_branch" id="drawee_branch"
                        value="{{{ Input::old('drawee_branch')}}}"/>
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
                            value="{{{ date("Y-m-d") }}}"/>
                        </div>

                    </div>
                </div>
            </div>
            <!-- ./ drawn_date -->

            <!-- cheque_no -->
            <div class="col-md-6" id="cheque_no_block">
                <div class="form-group ">
                    <label class="col-md-4 control-label" for="cheque_no">Cheque/DD No :</label>

                    <div class="col-md-8">
                        <input class="form-control" type="text" name="cheque_no" id="cheque_no"
                        value="{{{ Input::old('cheque_no') }}}"/>
                    </div>
                </div>
            </div>
            <!-- ./ cheque_no -->

            <!-- paid -->
            <div class="col-md-6" id="paid_block">
                <div class="form-group ">
                    <label class="col-md-4 control-label" for="paid">Paid :</label>

                    <div class="col-md-8">
                        {{ Form::select('paid',array(
                        'paid' => 'Paid',
                        'due' => 'Due'
                        ),'paid' , array('class'=>'form-control '))}}
                    </div>
                </div>
            </div>
            <!-- ./ paid -->
        </div>
        <!-- end of payment block -->
        <!-- </div> -->
    <!-- end of official step -->

    <!-- end of general step -->
    <div class="row" style="margin-bottom:4em">

        <div class="col-xs-2 col-md-offset-10">
            <input type='submit' class='btn btn-info btn-block button-next' name='Finish' value='Finish' />
        </div>
    </div>
</div>
    </form>
</div>
<!-- end of main container -->
@stop
@section('scripts')
<script type="text/javascript">
    
    $(function () {
        // $('#rd_scheme_amount').on('keyup paste change', function () {
            if ($('#to_scheme_interest').val() > 0) {
                $('#rd_total_installment').val($('#to_scheme_years').val() * 12);
                var expected_maturity_amount = 0;
                for (var i = ($('#rd_total_installment').val()); i >= 1; i--) {
                    var calculated_amount = parseInt($('#rd_scheme_amount').val()) *
            Math.pow(
                (1 + ($('#to_scheme_interest').val() / (100 * 12))),
                i
                );
        expected_maturity_amount = expected_maturity_amount + calculated_amount;
                }
                $('#rd_maturity_amount').val(Number(expected_maturity_amount).toFixed(2));
            }
        // });
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
$(function(){
    $(".date-picker").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "-70:+0"
    });
});


$(function(){
    $('#rd_associate_collector_id').autocomplete({
            source: "add_to_associate_id",
            change: function (event, ui) {
                if (!ui.item) {
                    this.value = '';
//                     $('#policy').data('bootstrapValidator').updateStatus('#rd_associate_collector_id', 'NOT_VALIDATED', null).validateField('#rd_associate_collector_id');
                }
            },
            select: function(event, ui){
                $('#to_collector_id').val(ui.item.id);
                $('#rd_associate_collector_id').val(ui.item.value);
            }
        });
});

</script>
@stop
