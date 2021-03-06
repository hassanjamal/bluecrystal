@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
<div class="panel-group" id="accordion">
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#scheme_details">
                <span class="lead">Scheme Details</span>
            </a>
        </h4>
    </div>
    <div id="scheme_details" class="panel-collapse  collapse in">
        <div class="panel-body">
            <table class="table">
                <tbody>
                <tr>
                    <td><strong class='text-danger'>SCHEME DETAILS</strong></td>
                    <td>
                        <div class="row">
                            <div class="col-md-4"><span style="color:grey">{{"SCHEME TYPE:-"}}</span></div>
                            <div class="col-md-8">{{$policy->scheme_type}}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"><span style="color:grey">{{"SCHEME NAME:-"}}</span></div>
                            <div class="col-md-8">{{$policy->scheme_name}}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"><span style="color:grey">{{"ASSOCIATE NO:-"}}</span></div>
                            <div class="col-md-8">{{$policy->associate_no}}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"><span style="color:grey">{{"POLICY DATE:-"}}</span></div>
                            <div class="col-md-8">{{$policy->created_at}}</div>
                        </div>
                        @if ($policy->scheme_type == 'FD')
                        <?php
                        $payment_details = Fd_scheme_payment::where('policy_id', $policy->id)->first();
                        ?>
                        <div class="row">
                            <div class="col-md-4"><span style="color:grey">{{"DEPOSIT AMOUNT:-"}}</span></div>
                            <div class="col-md-8">{{ ($payment_details->deposit_amount)}}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"><span style="color:grey">{{"MATURE AMOUNT:-"}}</span></div>
                            <div class="col-md-8">{{ ($payment_details->mature_amount)}}</div>
                        </div>
                        @endif
                        @if ($policy->scheme_type == 'RD')
                        <?php
                        $payment_details = Rd_scheme_payment::where('policy_id', $policy->id)->first();
                        ?>
                        <div class="row">
                            <div class="col-md-4"><span style="color:grey">{{"DEPOSIT AMOUNT:-"}}</span></div>
                            <div class="col-md-8">{{ ($payment_details->deposit_amount)}}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"><span style="color:grey">{{"MATURE AMOUNT:-"}}</span></div>
                            <div class="col-md-8">{{ ($payment_details->mature_amount)}}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"><span style="color:grey">{{"TOTAL INSTALLMENTS:-"}}</span></div>
                            <div class="col-md-8">{{ $payment_details->total_installment}}</div>
                        </div>
                        @endif

                        @if ($policy->scheme_type == 'MIS')
                        <?php
                        $payment_details = Mis_scheme_payment::where('policy_id', $policy->id)->first();
                        ?>
                        <div class="row">
                            <div class="col-md-4"><span style="color:grey">{{"DEPOSIT AMOUNT:-"}}</span></div>
                            <div class="col-md-8">{{ ($payment_details->deposit_amount)}}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"><span style="color:grey">{{"MATURE AMOUNT:-"}}</span></div>
                            <div class="col-md-8">{{ ($payment_details->monthly_installment)}}</div>
                        </div>
                        @endif
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@if ($policy->scheme_type == 'RD')
<!--collector commission section-->
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collector_payment_details">
                <span class="lead">Collector Commision Details</span>
            </a>
        </h4>
    </div>
    <div id="collector_payment_details" class="panel-collapse collapse">
        <div class="panel-body">
            <table class="table">
                <tbody>
                <?php
                $payment_id = Rd_scheme_payment::where('policy_id', $policy->id)->get();
                ?>
                @foreach ($payment_id as $payment)
                <?php
                $counter = 1;
                ?>
                <tr>
                    <td><strong class='text-danger'> INSTALLMENT {{ $payment->paid_installment}}</strong></td>
                    <td>
                        <?php
                        $commision = Policy_collector_commission::where('payment_id', $payment->id)->where(
                                                           'policy_id', $policy->id
                        )                                  ->get();
                        ?>
                        @foreach ($commision as $associate_commision)
                        <div class="row">
                            <div class="col-md-4"><span style="color:grey">
                        {{ Associate::where('id', $associate_commision->collector_id)->pluck('associate_no')}}
                      </span></div>
                            <div class="col-md-4"><span style="color:grey">
                        {{ Associate::where('id', $associate_commision->collector_id)->pluck('name')}}
                      </span></div>
                            <div class="col-md-4">{{($associate_commision->collection_commission)}}</div>
                        </div>
                        @endforeach
                    </td>
                </tr>
                <?php
                $counter++;
                ?>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

<!--end of collector commission section-->
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#self_payment_details">
                <span class="lead">Self Commision Details</span>
            </a>
        </h4>
    </div>
    <div id="self_payment_details" class="panel-collapse collapse">
        <div class="panel-body">
            <table class="table">
                <tbody>
                {{-- generate team commission structure for FD scheme --}}
                @if ($policy->scheme_type == 'FD')
                <?php
                $payment_id = Fd_scheme_payment::where('policy_id', $policy->id)->get();
                ?>
                @foreach ($payment_id as $payment)
                <?php
                $counter = 1;
                ?>
                <tr>
                    <td><strong class='text-danger'>PAYMENT </strong></td>
                    <td>
                        <?php
                        $commision = Policy_self_commission::where('payment_id', $payment->id)->where(
                                                           'policy_id', $policy->id
                        )                                  ->get();
                        ?>
                        @foreach ($commision as $associate_commision)
                        <div class="row">
                            <div class="col-md-4"><span style="color:grey">
                        {{ Associate::where('id', $associate_commision->associate_id)->pluck('associate_no')}}
                      </span></div>
                            <div class="col-md-4"><span style="color:grey">
                        {{ Associate::where('id', $associate_commision->associate_id)->pluck('name')}}
                      </span></div>
                            <div class="col-md-4">{{($associate_commision->self_commision)}}</div>
                        </div>
                        @endforeach
                    </td>
                </tr>
                <?php
                $counter++;
                ?>
                @endforeach
                @endif

                {{-- Self Commision Details for MIS--}}
                @if ($policy->scheme_type == 'MIS')
                <?php
                $payment_id = Mis_scheme_payment::where('policy_id', $policy->id)->get();
                ?>
                @foreach ($payment_id as $payment)
                <?php
                $counter = 1;
                ?>
                <tr>
                    <td><strong class='text-danger'>PAYMENT </strong></td>
                    <td>
                        <?php
                        $commision = Policy_self_commission::where('payment_id', $payment->id)->where(
                                                           'policy_id', $policy->id
                        )                                  ->get();
                        ?>
                        @foreach ($commision as $associate_commision)
                        <div class="row">
                            <div class="col-md-4"><span style="color:grey">
                        {{ Associate::where('id', $associate_commision->associate_id)->pluck('associate_no')}}
                      </span></div>
                            <div class="col-md-4"><span style="color:grey">
                        {{ Associate::where('id', $associate_commision->associate_id)->pluck('name')}}
                      </span></div>
                            <div class="col-md-4">{{($associate_commision->self_commision)}}</div>
                        </div>
                        @endforeach
                    </td>
                </tr>
                <?php
                $counter++;
                ?>
                @endforeach
                @endif

 

                {{-- generate team commission structure for RD scheme --}}
                @if ($policy->scheme_type == 'RD')
                <?php
                $payment_id = Rd_scheme_payment::where('policy_id', $policy->id)->get();
                ?>
                @foreach ($payment_id as $payment)
                <?php
                $counter = 1;
                ?>
                <tr>
                    <td><strong class='text-danger'> INSTALLMENT {{ $payment->paid_installment}}</strong></td>
                    <td>
                        <?php
                        $commision = Policy_self_commission::where('payment_id', $payment->id)->where(
                                                           'policy_id', $policy->id
                        )                                  ->get();
                        ?>
                        @foreach ($commision as $associate_commision)
                        <div class="row">
                            <div class="col-md-4"><span style="color:grey">
                        {{ Associate::where('id', $associate_commision->associate_id)->pluck('associate_no')}}
                      </span></div>
                            <div class="col-md-4"><span style="color:grey">
                        {{ Associate::where('id', $associate_commision->associate_id)->pluck('name')}}
                      </span></div>
                            <div class="col-md-4">{{($associate_commision->self_commision)}}</div>
                        </div>
                        @endforeach
                    </td>
                </tr>
                <?php
                $counter++;
                ?>
                @endforeach
                @endif
                </tbody>
                <!-- </tbody> -->
            </table>
        </div>
    </div>
</div>


<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#payment_details">
                <span class="lead">Team Commision Details</span>
            </a>
        </h4>
    </div>
    <div id="payment_details" class="panel-collapse collapse">
        <div class="panel-body">
            <table class="table">
                <tbody>
                {{-- generate team commission structure for FD scheme --}}
                @if ($policy->scheme_type == 'FD')
                <?php
                $payment_id = Fd_scheme_payment::where('policy_id', $policy->id)->get();
                ?>
                @foreach ($payment_id as $payment)
                <?php
                $counter = 1;
                ?>
                <tr>
                    <td><strong class='text-danger'>PAYMENT </strong></td>
                    <td>
                        <?php
                        $commision = Policy_team_commission::where('payment_id', $payment->id)->where(
                                                           'policy_id', $policy->id
                        )                                  ->get();
                        ?>
                        @foreach ($commision as $associate_commision)
                        <div class="row">
                            <div class="col-md-4"><span style="color:grey">
                        {{ Associate::where('id', $associate_commision->associate_id)->pluck('associate_no')}}
                      </span></div>
                            <div class="col-md-4"><span style="color:grey">
                        {{ Associate::where('id', $associate_commision->associate_id)->pluck('name')}}
                      </span></div>
                            <div class="col-md-4">{{($associate_commision->team_commision)}}</div>
                        </div>
                        @endforeach
                    </td>
                </tr>
                <?php
                $counter++;
                ?>
                @endforeach
                @endif
                
                {{-- Team Commision Details for MIS--}}
                @if ($policy->scheme_type == 'MIS')
                <?php
                $payment_id = Mis_scheme_payment::where('policy_id', $policy->id)->get();
                ?>
                @foreach ($payment_id as $payment)
                <?php
                $counter = 1;
                ?>
                <tr>
                    <td><strong class='text-danger'>PAYMENT </strong></td>
                    <td>
                        <?php
                        $commision = Policy_team_commission::where('payment_id', $payment->id)->where(
                                                           'policy_id', $policy->id
                        )                                  ->get();
                        ?>
                        @foreach ($commision as $associate_commision)
                        <div class="row">
                            <div class="col-md-4"><span style="color:grey">
                        {{ Associate::where('id', $associate_commision->associate_id)->pluck('associate_no')}}
                      </span></div>
                            <div class="col-md-4"><span style="color:grey">
                        {{ Associate::where('id', $associate_commision->associate_id)->pluck('name')}}
                      </span></div>
                            <div class="col-md-4">{{($associate_commision->team_commision)}}</div>
                        </div>
                        @endforeach
                    </td>
                </tr>
                <?php
                $counter++;
                ?>
                @endforeach
                @endif

                {{-- generate team commission structure for RD scheme --}}
                @if ($policy->scheme_type == 'RD')
                <?php
                $payment_id = Rd_scheme_payment::where('policy_id', $policy->id)->get();
                ?>
                @foreach ($payment_id as $payment)
                <?php
                $counter = 1;
                ?>
                <tr>
                    <td><strong class='text-danger'> INSTALLMENT {{ $payment->paid_installment}}</strong></td>
                    <td>
                        <?php
                        $commision = Policy_team_commission::where('payment_id', $payment->id)->where(
                                                           'policy_id', $policy->id
                        )                                  ->get();
                        ?>
                        @foreach ($commision as $associate_commision)
                        <div class="row">
                            <div class="col-md-4"><span style="color:grey">
                        {{ Associate::where('id', $associate_commision->associate_id)->pluck('associate_no')}}
                      </span></div>
                            <div class="col-md-4"><span style="color:grey">
                        {{ Associate::where('id', $associate_commision->associate_id)->pluck('name')}}
                      </span></div>
                            <div class="col-md-4">{{($associate_commision->team_commision)}}</div>
                        </div>
                        @endforeach
                    </td>
                </tr>
                <?php
                $counter++;
                ?>
                @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@stop

