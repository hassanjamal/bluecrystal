@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ $title }}} :: @parent
@stop

@section('styles')
{{ HTML::style('http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css')}}
@stop

{{-- Content --}}
@section('content')
<form method="post" action="" autocomplete="off" id="associate_commission">
    <!-- CSRF Token -->
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
    {{ Form::hidden('to_associate_id', Input::old('to_associate_id'),array('id'=>'to_associate_id'))}}
    <div class="row well">
        <blockquote>
            <p class="lead">Enter Asociate Details</p>
        </blockquote>

        <!-- introducer_id -->
        <div class="form-group">
            <div class="col-md-3">
                <label class="control-label" for="associate_no">Asociate No :</label>
                <input class="form-control" type="text" name="associate_no" id="associate_no" value="" />
            </div>
        </div>

        <!-- start_date -->
        <div class="form-group">
            <div class="col-md-3">
                <label class="control-label" for="start_date">Start Date :</label>
                <div class="input-group">
                    <input class="date-picker form-control" type="text" name="start_date" id="start_date" 
                    placeholder="{{{ date("d-m-Y") }}}" />
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </span>
                </div>
            </div>
        </div>  
        <!-- ./ start_date -->

        <!-- drawn_date -->
        <div class="form-group">
            <div class="col-md-3"> 
                <label class="control-label" for="end_date">End Date :</label>
                <div class="input-group">
                    <input class="date-picker form-control" type="text" name="end_date" id="end_date" placeholder="{{{ date("d-m-Y") }}}" />
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3"> 
                <div class="col-md-6">
                    <label class="control-label" for=""></label>
                    <input type='submit' class='btn btn-success btn-block' name='finish' value='Finish' style="margin-top:5px;"/>
                </div>
                <div class="col-md-6">
                    <label class="control-label" for=""></label>
                    <input type='reset' class='btn btn-warning btn-block' name='reset' value='Reset' style="margin-top:5px;"/>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="row">
    <div class="panel-group" id="accordion">
        @if(isset($self_commission))
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#fd_self_commission">
                        FD Self Commission Details 
                    </a>
                </h4>
            </div>
            <div id="fd_self_commission" class="panel-collapse collapse in">
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Policy No</th>
                                <th>Date</th>
                                <th>Amount Deposit</th>
                                <th>Commission</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $fd_self_total=0; ?>

                            @foreach ($self_commission as $policy_self_commission)
                            <?php
                            $policy = Policy::find($policy_self_commission->policy_id);
                            ?>
                            @if($policy->scheme_type == 'FD')
                            <?php
                            $fd_policy_payments = Fd_scheme_payment::where('policy_id', $policy->id)->get();
                            ?>
                            @foreach ($fd_policy_payments as $fd_policy_payment)
                            <?php
                            $fd_policy_self_commissions = Policy_self_commission::where('payment_id', $fd_policy_payment->id)->where('policy_id', $policy->id)->get();
                            ?>
                            @foreach ($fd_policy_self_commissions as $fd_policy_self_commission)
                            <tr>
                                <td>{{ $policy->policy_no }}</td>
                                <td>{{ $fd_policy_payment->drawn_date }}</td>
                                <td>{{ $fd_policy_payment->deposit_amount }}</td>
                                <td>{{ $fd_policy_self_commission->self_commision }}</td>
                                <?php $fd_self_total = $fd_self_total+ $fd_policy_self_commission->self_commision; ?>
                            </tr>

                            @endforeach
                            @endforeach
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row well">
                        <div class="col-md-4 col-md-offset-4">
                            <h2>
                                {{ "TOTAL :- ". $fd_self_total }}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#rd_self_commission">
                        RD Self Commission Details 
                    </a>
                </h4>
            </div>
            <div id="rd_self_commission" class="panel-collapse collapse">
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Policy No</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $rd_self_total=0; ?>
                            @foreach ($self_commission as $policy_self_commission)
                            <?php
                            $policy = Policy::find($policy_self_commission->policy_id);
                            ?>
                            @if($policy->scheme_type == 'RD')
                            <?php
                            $rd_policy_payments = Rd_scheme_payment::where('policy_id', $policy->id)->get();
                            ?>
                            <tr>
                                <th>{{ $policy->policy_no }} </th>
                                <td>
                                    <table class="table">
                                        <thead>
                                            <th>Installment</th> 
                                            <th>Date</th> 
                                            <th>Amount Deposit</th> 
                                            <th>Commission</th> 
                                        </thead>
                                        <tbody>
                                            @foreach ($rd_policy_payments as $rd_policy_payment)
                                            <tr>
                                                <?php
                                                $rd_policy_self_commissions = Policy_self_commission::where('payment_id', $rd_policy_payment->id)->where('policy_id', $policy->id)->get();
                                                ?>
                                                @foreach ($rd_policy_self_commissions as $rd_policy_self_commission)
                                                <td>{{ $rd_policy_payment->paid_installment }}</td>
                                                <td>{{ $rd_policy_payment->drawn_date }}</td>
                                                <td>{{ $rd_policy_payment->deposit_amount }}</td>
                                                <td>{{ $rd_policy_self_commission->self_commision }}</td>

                                                <?php $rd_self_total = $rd_self_total+ $rd_policy_self_commission->self_commision; ?>
                                                @endforeach
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </td>
                            </tr>
                            @endif
                            @endforeach

                        </tbody>
                    </table>
                    <div class="row well">
                        <div class="col-md-4 col-md-offset-4">
                            <h2>
                                {{ "TOTAL :- ". $rd_self_total }}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if(isset($team_commission))
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#fd_team_commission">
                        FD Team Commission Details 
                    </a>
                </h4>
            </div>
            <div id="fd_team_commission" class="panel-collapse collapse">
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Policy No</th>
                                <th>Date</th>
                                <th>Amount Deposit</th>
                                <th>Commission</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $fd_team_total=0; ?>
                            @foreach ($team_commission as $policy_team_commission)
                            <?php
                            $policy = Policy::find($policy_team_commission->policy_id);
                            ?>
                            @if($policy->scheme_type == 'FD')
                            <?php
                            $fd_policy_payments = Fd_scheme_payment::where('policy_id', $policy->id)->get();
                            ?>
                            @foreach ($fd_policy_payments as $fd_policy_payment)
                            <?php
                            $fd_policy_team_commissions = Policy_team_commission::where('payment_id', $fd_policy_payment->id)->where('policy_id', $policy->id)->where('associate_id', $associate_id )->get();
                            ?>
                            @foreach ($fd_policy_team_commissions as $fd_policy_team_commission)
                            <tr>
                                <td>{{ $policy->policy_no }}</td>
                                <td>{{ $fd_policy_payment->drawn_date }}</td>
                                <td>{{ $fd_policy_payment->deposit_amount }}</td>
                                <td>{{ $fd_policy_team_commission->team_commision }}</td>
                                <?php $fd_team_total = $fd_team_total + $fd_policy_team_commission->team_commision ;?> 
                            </tr>
                            @endforeach
                            @endforeach
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row well">
                        <div class="col-md-4 col-md-offset-4">
                            <h2>
                                {{ "TOTAL :- ". $fd_team_total }}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#rd_team_commission">
                        RD Team Commission Details 
                    </a>
                </h4>
            </div>
            <div id="rd_team_commission" class="panel-collapse collapse">
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Policy No</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $rd_team_total=0; ?>
                            @foreach ($team_commission as $policy_team_commission)
                            <?php
                            $policy = Policy::find($policy_team_commission->policy_id);
                            ?>
                            @if($policy->scheme_type == 'RD')
                            <?php
                            $rd_policy_payments = Rd_scheme_payment::where('policy_id', $policy->id)->get();
                            ?>
                            <tr>
                                <th>{{ $policy->policy_no }} </th>
                                <td>
                                    <table class="table">
                                        <thead>
                                            <th>Installment</th> 
                                            <th>Date</th> 
                                            <th>Amount Deposit</th> 
                                            <th>Commission</th> 
                                        </thead>
                                        <tbody>
                                            @foreach ($rd_policy_payments as $rd_policy_payment)
                                            <tr>
                                                <?php
                                                $rd_policy_team_commissions = Policy_team_commission::where('payment_id', $rd_policy_payment->id)->where('policy_id', $policy->id)->where('associate_id', $associate_id)->get();
                                                ?>
                                                @foreach ($rd_policy_team_commissions as $rd_policy_team_commission)
                                                <td>{{ $rd_policy_payment->paid_installment }}</td>
                                                <td>{{ $rd_policy_payment->drawn_date }}</td>
                                                <td>{{ $rd_policy_payment->deposit_amount }}</td>
                                                <td>{{ $rd_policy_team_commission->team_commision }}</td>
                                                <?php $rd_team_total = $rd_team_total + $rd_policy_team_commission->team_commision; ?>  
                                                @endforeach
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row well">
                        <div class="col-md-4 col-md-offset-4">
                            <h2>
                                {{ "TOTAL :- ". $rd_team_total }}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div> 
    </div>
</div>
@stop

@section('scripts')
<script type="text/javascript">
    $(function(){
        $("#start_date").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: "-70:+0",
            dateFormat: "dd-mm-yy",
            onSelect: function(){
                var end_date = $('#end_date');
                var start_date = $(this).datepicker('getDate');
                start_date.setDate(start_date.getDate()+30);
                var min_date = $(this).datepicker('getDate');
                end_date.datepicker('setDate',min_date);
                end_date.datepicker('option', 'minDate', min_date);
                end_date.datepicker('option', 'maxDate', start_date);
            }
        });
        $("#end_date").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: "-70:+0",
            dateFormat: "dd-mm-yy"
        });
    });
$(function(){
    $('#associate_no').autocomplete({
        source: "add_to_introducer_id",
        select: function(event, ui){
            $('#to_associate_id').val(ui.item.id);
        }
    });
});
</script>
{{ HTML::script('/app_assets/admin/js/bootstrapValidator.min.js') }}
{{ HTML::script('/app_assets/admin/js/getCommissionValidator.js') }}
@stop

