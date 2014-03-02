<!DOCTYPE html>

<html lang="en">
    <link rel="stylesheet" href="{{URL::to('/css/bootstrap.css')}}">

    <style>
        body {
            padding: 60px 0;
        }
    </style>

</head>

<body >
    <!-- Container -->
    <div class="container" id="receipt">

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <h4 class="panel-title " style="text-align:center">
                        <span class="lead text-danger" >BLUE CRYSTAL MUTUAL BENEFIT INDIA LIMITED</span>
                    </h4>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <img src="/img/logo.jpg" alt="logo">
                    </div>
                    <div class="col-md-9" style="text-align:right" >
                        <p>Corporate Office :- Road No 06, Kalina Santa Cruz <br>
                            East Mumbai -28 , Maharastra <br>
                           Zonal office :- Birat Complex , Boring Road <br>
                            Patna -13 , Bihar 
                        </p>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row" style="text-align:center ; background:black">
                    <strong class='lead' style="color:white" >Money Receipt</strong>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6 "><span class="pull-left">Policy No : <strong>{{$policy->policy_no}}</strong> </span></div>
                    <div class="col-md-6 "><span class="pull-right"><strong>Date : {{  date("d-M-Y") }}</strong> </span></div>
                </div>
                <div class="row">
                    <br>
                    <div class="col-md-6 well" style="background:white">
                        <table class="table table-striped ">
                            <tbody>
                                <tr>
                                    <td>NAME :-</td>
                                    <td>{{$policy->name}}</td>
                                </tr>
                                <tr>
                                    <td>AMOUNT DEPOSITED :- </td>
                                    <td>
                                        @if ($policy->scheme_type=='FD')
                                        {{ Fd_scheme_payment::where('policy_id', $policy->id)->pluck('deposit_amount')}}
                                        @endif
                                        @if ($policy->scheme_type=='RD')
                                        {{ Rd_scheme_payment::where('policy_id', $policy->id)->pluck('deposit_amount')}}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>MATURE AMOUNT :- </td>
                                    <td>
                                        @if ($policy->scheme_type=='FD')
                                        {{ number_format(Fd_scheme_payment::where('policy_id', $policy->id)->pluck('mature_amount'))}}
                                        @endif
                                        @if ($policy->scheme_type=='RD')
                                        {{ number_format(Rd_scheme_payment::where('policy_id', $policy->id)->pluck('mature_amount'))}}
                                        @endif
                                    </td>
                                </tr>
                                @if ($policy->scheme_type=='RD')
                                <tr>
                                    <td>INSTALLMENT NUMBER :- </td>
                                    <td>
                                        {{ Rd_scheme_payment::where('policy_id', $policy->id)->pluck('paid_installment')}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>NEXT INSTALLMENT :- </td>
                                    <td>
                                        {{ Rd_scheme_payment::where('policy_id', $policy->id)->pluck('next_installment_date')}}
                                    </td>
                                </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6 well" style="background:white">
                        <table class="table table-striped ">
                            <tbody>

                                <tr>
                                    <td>SCHEME TYPE :-</td>
                                    <td>{{$policy->scheme_type}}</td>
                                </tr>
                                <tr>
                                    <td>SCHEME NAME :-</td>
                                    <td>{{$policy->scheme_name}}</td>
                                </tr>
                                <tr>
                                    <td>BRANCH NAME:-</td>
                                    <td>{{ Branch::where('id' , $policy->branch_id)->pluck('name') }}</td>
                                </tr>
                                <tr>
                                    <td>ASSOCIATE NO :-</td>
                                    <td>{{$policy->associate_no}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12 "><span class="pull-left">Dear Mr/Mrs. <strong>{{$policy->name}}</strong> <br> Thank you for making a payment of  <strong>Rs
                                @if ($policy->scheme_type=='FD')
                                {{ Fd_scheme_payment::where('policy_id', $policy->id)->pluck('deposit_amount')}}
                                / </strong>. for your Fixed Deposit Policy Number  
                            <strong>  {{ $policy->policy_no}} </strong> 
                            @endif
                            @if ($policy->scheme_type=='RD')
                            {{ Rd_scheme_payment::where('policy_id', $policy->id)->pluck('deposit_amount')}}
                            / </strong>. for your Recurring Deposit Policy Number  
                        <strong>  {{ $policy->policy_no}} </strong> 
                        @endif
                </span></div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="row">
                <div class="col-md-12 ">
                    <span class="pull-right">
                        <strong>Signature of Authority</strong>
                        <br>
                        For BLUE CRYSTAL MUTUAL BENEFIT INDIA LIMITED.
                    </span>
                </div>
            </div>

        </div>
    </div>
    <!-- ./ container -->
    <script src="/js/jquery.js"></script>
    <script>
        $(document).ready(function(){
            window.print();
        });
    </script>
</body>

</html>
