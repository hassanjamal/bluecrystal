<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="{{URL::to('/css/print/printstyle.css')}}">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<style>
body{
    background-image:url('/assets/image/policy_money_receipt.jpg');
    background-size:cover;
}
</style>
</head>
<body>
<article>
    <h1>Recipient</h1>
    <address>
        <p>Payment Details</p>
    </address>
    <table class="meta">
        <tr>
            <th><span >Policy No</span></th>
            <td><span >{{$policy->policy_no}}</span></td>
        </tr>
        <tr>
            <th><span >Date</span></th>
            <td><span >{{  date("d-M-Y") }}</span></td>
        </tr>
    </table>
    <table class="inventory">

        <tbody>
        <tr>
            <td>NAME :-</td>
            <td>{{$policy->name}}</td>
        </tr>
        <tr>
            <td>AMOUNT DEPOSITED :- </td>
            <td>
                <i class="fa fa-rupee"></i>
                @if ($policy->scheme_type=='FD')
                {{ number_format(Fd_scheme_payment::where('policy_id', $policy->id)->pluck('deposit_amount'))}}
                @endif
                @if ($policy->scheme_type=='RD')
                {{ number_format(Rd_scheme_payment::where('policy_id', $policy->id)->pluck('deposit_amount'))}}
                @endif
            </td>
        </tr>
        <tr>
            <td>MATURE AMOUNT :- </td>
            <td>
                <i class="fa fa-rupee"></i>
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
</article>
<span class="pull-right">
    <strong>Signature of Authority</strong>
    <br>
    <em>
        {{ '( '.Sentry::getUser()->first_name . ' '. Sentry::getUser()->last_name.' )'}}
    </em>

    <br>
    For BLUE CRYSTAL MUTUAL BENEFIT INDIA LIMITED.
</span>
<article id="article2">
    <h1>Recipient</h1>
    <address>
        <p>Payment Details</p>
    </address>
    <table class="meta">
        <tr>
            <th><span >Policy No</span></th>
            <td><span >{{$policy->policy_no}}</span></td>
        </tr>
        <tr>
            <th><span >Date</span></th>
            <td><span >{{  date("d-M-Y") }}</span></td>
        </tr>
    </table>
    <table class="inventory">

        <tbody>
        <tr>
            <td>NAME :-</td>
            <td>{{$policy->name}}</td>
        </tr>
        <tr>
            <td>AMOUNT DEPOSITED :- </td>
            <td>
                <i class="fa fa-rupee"></i>
                @if ($policy->scheme_type=='FD')
                {{ number_format(Fd_scheme_payment::where('policy_id', $policy->id)->pluck('deposit_amount'))}}
                @endif
                @if ($policy->scheme_type=='RD')
                {{ number_format(Rd_scheme_payment::where('policy_id', $policy->id)->pluck('deposit_amount'))}}
                @endif
            </td>
        </tr>
        <tr>
            <td>MATURE AMOUNT :- </td>
            <td>
                <i class="fa fa-rupee"></i>
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
</article>
<span class="pull-right">
    <strong>Signature of Authority</strong>
    <br>
    <em>
        {{ '( '.Sentry::getUser()->first_name . ' '. Sentry::getUser()->last_name.' )'}}
    </em>

    <br>
    For BLUE CRYSTAL MUTUAL BENEFIT INDIA LIMITED.
</span>
<script src="/js/jquery.js"></script>
<script>
$(document).ready(function(){
        window.print();
        });
</script>
</body>

</html>
