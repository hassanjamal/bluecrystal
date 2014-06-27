<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Alegreya+Sans+SC:400,700' rel='stylesheet' type='text/css'>
    <style>
        body {
            height: 11.69in;
            overflow: hidden;
            width: 8.27in;
            font-family: 'Open Sans', sans-serif;
        }

        .main_content {
            margin-top: .2em;
            margin-left: 2em;
            margin-right: 2em;
            margin-bottom: 0em;
            border: 10px solid #eee;
            outline: 5px solid lightgrey;
            padding-left: .2em;
            padding-right: .2em;
        }

        .header_image {
            /* margin-top:545px; */
            height: 490px;
        }

        .image_center {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        table.header_top {
            clear: both;
            width: 100%;
            position: fixed;
            height: 129px;
            background-color: lightblue;
            top: 0px;
            left: 0px;
            right: 0px;
            margin-bottom: 0px;
            font-family: 'Open Sans', sans-serif;
        }

        table.header_top th {
            width: 10%;
            padding-left: 20px;
            background-color: lightblue;
            font-family: 'Open Sans', sans-serif;
        }

        table.header_top td {
            padding-top: 5px;
            width: 90%;
            text-align: center;
            /*color: #f5f5f5;*/
            line-height: 16px;
            font-family: 'Open Sans', sans-serif;
        }

        table.footer {
            clear: both;
            width: 100%;
            position: fixed;
            height: 60px;
            background-color: #eee;
            bottom: 0px;
            left: 0px;
            right: 0px;
            margin-bottom: 0px;
        }

        table.footer td {
            font-size: 60%;
            padding-left: 4em;
            /*color:lightgrey;*/
            font-style: italic;
            padding-bottom: 20px;
        }

        .in_words {
            margin-bottom: 2em;
            font-size: 90%;
        }

        table.header, table.content, table.middle_table, table.signature {
            width: 100%;
            margin-bottom: .87em;
        }

        table.signature {
            margin-bottom: .5em;
        }

        table.header {
            font-size: 85%;
            font-style: bold;
        }

        table.main td {
            padding: 0em;
            text-align: left;
        }

        table.content {
            font-size: 85%;
        }

        table.middle_table {
            font: 92%;
            border: 1px dotted grey;
            border-spacing: -1px;
        }

        table.content th {
            width: 40%;
            text-align: right;
            padding-top: .3em;
        }

        table.content td {
            width: 60%;
            border-bottom: 1px dashed darkgrey;
            padding-left: 1em;
            padding-top: .3em;
        }

        table.signature th {
            width: 60%;
            text-align: left;
            font-size: 80%;
            font-style: normal
        }

        table.signature td {
            width: 40%;
            text-align: center;
            font-size: 80%
        }

        table.middle_table th {
            border: 1px dotted grey;
            padding-top: 4px;
            padding-bottom: 5px;
        }

        table.middle_table td {
            border: 1px dotted grey;
            text-align: center
        }

        table td > div {
            overflow: hidden;
            height: 20px;
        }

        table.meta th {
            width: 40%;
            text-align: right;
            border-bottom: 1px dashed darkgrey
        }

        table.meta td {
            width: 60%;
            border-bottom: 1px dashed darkgrey;
            padding-left: 1em;
        }

        /*  */
        table.meta:after, table.inventory:after, table.main:after {
            clear: both;
            content: "";
            display: table;
        }

        .pull-right {
            clear: left;
            display: block;
            float: right;
            text-align: center;
            font-size: 90%;
            margin-top: 4em;
        }

        .pull-right strong {
            font-weight: bold
        }

        .pull-right em {
            font-style: italic;
            color: grey
        }

        @page {
            margin: 0;
        }
    </style>
</head>
<body marginwidth="0" marginheight="0">
<div class="header_image">
</div>
<div class="main_content">
    <table class="header">
        <tbody>
        <tr>
            <td></td>
            <td style="text-align:left">
                <h2 style="letter-spacing:2px ; text-decoration:underline">BOND</h2>
            </td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align:right">
                {{ date("d-M-Y") }}
            </td>
        </tr>
        <tr>
            <td style="background-color:#eee;">Receipt No :-<strong> {{
                    "REC-".$policy->branch_id."-".$policy->id."-".date("y")}}</strong></td>
            <td style="text-align:right; background-color:#eee">Policy No:- <strong>{{ $policy->policy_no}}</strong>
            </td>
        </tr>
        </tbody>
    </table>
    <table class="content">
        <tbody>
        <tr>
            <th>Applicant Name :-</th>
            <td>{{$policy->name}}</td>

            <th>Amount Deposited :-</th>
            <td>
                @if ($policy->scheme_type=='FD')
                {{ number_format( Fd_scheme_payment::where('policy_id', $policy->id)->pluck('deposit_amount'))}}
                @endif
                @if ($policy->scheme_type=='RD')
                {{ number_format(Rd_scheme_payment::where('policy_id', $policy->id)->pluck('deposit_amount'))}}
                @endif
            </td>
        </tr>
        <tr>

            <th>Address :-</th>
            <td>
                <div>{{ $policy->address }}</div>
            </td>
            <th>Maturity Amount :-</th>
            <td>
                @if ($policy->scheme_type=='FD')
                {{ number_format(Fd_scheme_payment::where('policy_id', $policy->id)->pluck('mature_amount'))}}
                @endif
                @if ($policy->scheme_type=='RD')
                {{ number_format(Rd_scheme_payment::where('policy_id', $policy->id)->pluck('mature_amount'))}}
                @endif
            </td>
        </tr>
        <tr>
            <th></th>
            <td>
                <div>{{ $policy->city . ' ,'. $policy->state }}</div>
            </td>

            @if ($policy->scheme_type=='RD')
            <th> Installment No :-</th>
            <td>
                {{ Rd_scheme_payment::where('policy_id', $policy->id)->pluck('paid_installment')}}
            </td>
            @endif
        </tr>
        <tr>
            <th></th>
            <td>
                <div>@if($policy->pincode == 0)
                    {{ ' ' }}
                    @else
                    {{ $policy->pincode }}
                    @endif
                </div>
            </td>
            @if ($policy->scheme_type=='RD')
            <th> Next Installment :-</th>
            <td>
                {{ Rd_scheme_payment::where('policy_id', $policy->id)->pluck('next_installment_date')}}
            </td>
            @endif
        </tr>
        <tr>
            <th>Scheme Code :-</th>
            <td>{{ $policy->scheme_name }}</td>

            <th> Scheme Detail :-</th>
            <td>
                @if ($policy->scheme_type=='FD')
                {{ Fdscheme::where('id', $policy->scheme_id)->pluck('description')}}
                @endif
                @if ($policy->scheme_type=='RD')
                {{ Rdscheme::where('id', $policy->scheme_id)->pluck('description')}}
                @endif
            </td>
        </tr>
        <tr>
            <th>Associate Code :-</th>
            <td>{{ $policy->associate_no }}</td>

            <th> Associate Name :-</th>
            <td>{{ Associate::where('id', $policy->associate_id)->pluck('name') }}</td>
        </tr>
        <tr>
            <th>Branch Code :-</th>
            <td>{{ Branch::where('id', $policy->branch_id)->pluck('name') }}</td>

            <th> Branch Id :-</th>
            <td>{{ $policy->branch_id }}</td>
        </tr>

        </tbody>
    </table>
    <div class="in_words">
        <span>Dear Mr/Mrs {{ $policy->name }} . Thanks a lot for making  payment of Rs.  
            @if ($policy->scheme_type=='FD')
            {{ number_format(Fd_scheme_payment::where('policy_id', $policy->id)->pluck('deposit_amount'))}}
            <strong>
                {{ '( '.Str::title(apphelper::convert_number_to_words(round(Fd_scheme_payment::where('policy_id',
                $policy->id)->pluck('deposit_amount')))).
                ' Only in words )'}}
            </strong>
            @endif
            @if ($policy->scheme_type=='RD')
            {{ number_format(Rd_scheme_payment::where('policy_id', $policy->id)->pluck('deposit_amount'))}}
            <strong>
                {{ '( '.Str::title(apphelper::convert_number_to_words(round(Rd_scheme_payment::where('policy_id',
                $policy->id)->pluck('deposit_amount')))).
                ' Only in words )'}}
            </strong>
            @endif
        </span>
    </div>
    <table class="signature">
        <tbody>
        <tr>
            <th>
            </th>
            <td>
                <strong>Signature of Authority</strong>
                <br>
                <em>
                    {{ '( '.Sentry::getUser()->first_name . ' '. Sentry::getUser()->last_name.' ) '}}
                </em>
                <br>
                For BLUE CRYSTAL MUTUAL BENEFIT LTD.
            </td>

        </tr>

        </tbody>
    </table>
</div>
<table class="footer">
    <tr>
        <td>
            * Terms and condition apply <br>
            * Please contact concerned branch for any query
        </td>
    </tr>
</table>

</body>

</html>



