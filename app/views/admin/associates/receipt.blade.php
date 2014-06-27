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
            margin: 3.2em;
        }

        .in_words {
            margin-bottom: 2em;
        }

        hr {
            margin: 0;
            border-top: 1px dotted red;
        }

        table.header, table.content, table.middle_table, table.signature {
            width: 100%;
            margin-bottom: 2em;
        }

        table.pre_header {
            clear: both;
            width: 100%;
            position: fixed;
            height: 129px;
            background-color: lightblue;
            top: 0px;
            left: 0px;
            right: 0px;
            margin-bottom: 0px;
            font-size: 75%;
        }

        table.pre_header th {
            width: 10%;
            padding-left: 20px;
            background-color: lightblue;
        }

        table.pre_header td {
            padding-top: 5px;
            width: 90%;
            text-align: center;
            line-height: 16px;
        }

        table.pre_header h1 {
            font-family: 'Alegreya Sans SC', sans-serif;
            font-size: 28px;
            margin-bottom: 5px;
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
        }

        table.signature td {
            width: 40%;
            font-size: 80%;
            text-align: center;
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

        table.footer {
            clear: both;
            width: 100%;
            position: fixed;
            height: 60px;
            background-color: lightblue;
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

        table td > div {
            overflow: hidden;
            height: 20px;
        }

        /*  */
        table.main:after {
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
            margin-top: 6em;
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
<table class="pre_header">
    <tr>
        <th>
            <img src="assets/image/logo.png">
        </th>
        <td>
            <h1>BLUE CRYSTAL MARKETING PVT. LTD.</h1>

            <p><em>A Unit Of Crystal Group</em><br>
                <strong>
                    Corporate Office :- C-401, City Tower Sector-15 , CBD Belapur , Opp - Nimantran
                    Rastaurant <br>
                    Navi Mumbai-400614 , Email : info@bluecrystalgroup.in , Web : bluecrystalgroup.in<br>
                    Regd. Office :- Birat Complex, Boring Road, Patna -800013
                </strong>
            </p>

        </td>
    </tr>
</table>
<div class="main_content">
    <table class="header">
        <tbody>
        <tr>
            <td></td>
            <td style="text-align:right">
                {{ date("d-M-Y") }}
            </td>
        </tr>
        <tr>
            <td style="background-color:#eee;">Receipt No :-<strong> {{
                    "REC-".$associate->branch_id."-".$associate->id."-".date("y")}}</strong></td>
            <td style="text-align:right; background-color:#eee">Associate No:- <strong>{{
                    $associate->associate_no}}</strong></td>
        </tr>
        </tbody>
    </table>
    <table class="content">
        <tbody>
        <tr>
            <th>Associate Name :-</th>
            <td>{{$associate->name}}</td>

            <th>Amount Deposited :-</th>
            <td>{{ $associate->associate_fees }}</td>
        </tr>
        <tr>

            <th>Address :-</th>
            <td>
                <div>{{ $associate->address }}</div>
            </td>

            <th>Designation :-</th>
            <td>{{$rank_name}}</td>

        </tr>
        <tr>
            <th></th>
            <td>
                <div>{{ $associate->city . ' ,'. $associate->state }}</div>
            </td>

            <th>Start Date :-</th>
            <td>{{ date("d-M-Y",strtotime( $associate->start_date))}}</td>

        </tr>
        <tr>
            <th></th>
            <td>
                <div>@if($associate->pincode == 0)
                    {{ ' ' }}
                    @else
                    {{ $associate->pincode }}
                    @endif
                </div>
            </td>
            <th></th>
            <td>
            </td>
        </tr>

        <tr>
            <th>Introducer Code :-</th>
            <td>{{ $introducer_no}}</td>

            <th> Introducer Name :-</th>
            <td>{{ $introducer_name}}</td>
        </tr>
        <tr>
            <th>Branch Code :-</th>
            <td>{{ Branch::where('id', $associate->branch_id)->pluck('name') }}</td>

            <th> Branch Id :-</th>
            <td>{{ $associate->branch_id }}</td>
        </tr>

        </tbody>
    </table>
    <table class="middle_table">
        <tbody>
        <tr>
            <th>Payment Date</th>
            <th>Amount Deposited</th>
            <th>Mode Of Payment</th>
        </tr>
        <tr>
            <td>{{ date("d-M-Y",strtotime( $associate->drawn_date))}}</td>
            <td>{{ $associate->associate_fees }}</td>
            <td>{{ $associate->payment_mode }}</td>
        </tr>
        </tbody>
    </table>
    <div class="in_words">
        <span>Dear Mr/Mrs {{ $associate->name }} . Thanks a lot for making  payment of Rs.  
            {{ number_format($associate->associate_fees)}}
            <strong>
                {{ '( '.Str::title(apphelper::convert_number_to_words(round($associate->associate_fees))).
                ' Only in words )'}}
            </strong>
        </span>
    </div>
    <table class="signature">
        <tbody>
        <tr>
            <th></th>
            <td>
                <strong>Signature of Authority</strong>
                <br>
                <em>
                    {{ '( '.Sentry::getUser()->first_name . ' '. Sentry::getUser()->last_name.' )'}}
                </em>
                <br>
                For BLUE CRYSTAL MARKETING PVT. LTD.
            </td>
        </tr>
        </tbody>
    </table>
    <!-- <table class="footer"> -->
    <!--     <tbody> -->
    <!--     <tr> -->
    <!--         <td> -->
    <!--             * Terms and condition apply <br> -->
    <!--             * Please contact concerned branch for any query -->
    <!--         </td> -->
    <!--     </tr> -->
    <!--     </tbody> -->
    <!-- </table> -->
</div>
</body>

</html>




