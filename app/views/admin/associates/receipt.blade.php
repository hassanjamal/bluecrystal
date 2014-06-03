<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" href="{{URL::to('css/print/policy_print_receipt.css')}}">
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Alegreya+Sans+SC:400,700' rel='stylesheet' type='text/css'>
</head>
<body marginwidth="0" marginheight="0">
<div class="header_image">
    <!-- <img src="assets/image/associate_money_receipt_header.jpg" alt=""> -->
    <table class="header_top">
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
</div>
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
            <td style="background-color:#eee;">Receipt No :-<strong> {{ "REC-".$associate->branch_id."-".$associate->id."-".date("y")}}</strong></td>
            <td style="text-align:right; background-color:#eee">Associate No:- <strong>{{ $associate->associate_no}}</strong></td>
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
            <td><div>{{ $associate->address }}</div></td>

            <th>Designation :-</th>
            <td>{{$rank_name}}</td>

        </tr>
        <tr>
            <th></th>
            <td><div>{{ $associate->city . ' ,'. $associate->state }}</div></td>

            <th>Start Date :-</th>
            <td>{{ date("d-M-Y",strtotime( $associate->start_date))}}</td>

        </tr>
        <tr>
            <th></th>
            <td><div>@if($associate->pincode == 0)
                    {{ ' ' }}
                    @else
                    {{ $associate->pincode }}
                    @endif
                </div>
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
            <td>{{  $associate->associate_fees }} </td>
            <td>{{  $associate->payment_mode }} </td>
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
    <table class="signature" style="margin-top:4em ; margin-bootom:4em">
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
</div>
<img src="assets/image/associate_money_receipt_footer.jpg" alt="">
</body>

</html>



