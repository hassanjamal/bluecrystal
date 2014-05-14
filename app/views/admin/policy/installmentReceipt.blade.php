<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" href="{{URL::to('css/print/policy_print_receipt.css')}}">
</head>
<body marginwidth="0" marginheight="0">
<div class="header_image">
    <!-- <img src="assets/image/header.jpg" alt=""> -->
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
            <td style="background-color:#eee;">Receipt No :-<strong> {{ "REC-".$policy->branch_id."-".$policy->id."-".date("y")}}</strong></td>
            <td style="text-align:right; background-color:#eee">Policy No:- <strong>{{ $policy->policy_no}}</strong></td>
        </tr>
        </tbody>
    </table>
    <table class="content">
        <tbody>
        <tr>
            <th>Applicant Name :-</th>
            <td>{{ $policy->name}}</td>

            <th>Amount Deposited :-</th>
            <td>
                {{ number_format($rd_scheme_payment->deposit_amount)}}
            </td>
        </tr>
        <tr>

            <th>Address :-</th>
            <td><div>{{ $policy->address }}</div></td>
            <th>Maturity Amount :-</th>
            <td>
                {{ number_format($rd_scheme_payment->mature_amount)}}
            </td>
        </tr>
        <tr>
            <th></th>
            <td><div>{{ $policy->city . ' ,'. $policy->state }}</div></td>

            <th> Installment No :-</th>
            <td>
                {{ $rd_scheme_payment->paid_installment }}
            </td>
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
            <th> Next Installment :-</th>
            <td>
                {{ date("d-M-y", strtotime( $rd_scheme_payment->next_installment_date )) }}
            </td>
        </tr>
        <tr>
            <th>Scheme Code :-</th>
            <td>{{ $policy->scheme_name }}</td>

            <th> Scheme Detail :-</th>
            <td>
                {{ Rdscheme::where('id', $policy->scheme_id)->pluck('description')}}
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
            {{ number_format( $rd_scheme_payment->deposit_amount )}}
            <strong>
                {{ '( '.Str::title(apphelper::convert_number_to_words(round( $rd_scheme_payment->deposit_amount ))).
                ' Only in words )'}}
            </strong>
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
<div class="footer_image">
    <!-- <img src="assets/image/footer.jpg" alt=""> -->
</div>

{{-- Office Copy--}}

<div class="header_image">
    <!-- <img src="assets/image/header.jpg" alt=""> -->
</div>
<div class="main_content" style="margin-top:.9em">
    <table class="header">
        <tbody>
        <tr>
            <td></td>
            <td style="text-align:right">
                {{ date("d-M-Y") }}
            </td>
        </tr>
        <tr>
            <td style="background-color:#eee;">Receipt No :-<strong> {{ "REC-".$policy->branch_id."-".$policy->id."-".date("y")}}</strong></td>
            <td style="text-align:right; background-color:#eee">Policy No:- <strong>{{ $policy->policy_no}}</strong></td>
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
            <td><div>{{ $policy->address }}</div></td>
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
            <td><div>{{ $policy->city . ' ,'. $policy->state }}</div></td>

            <th> Installment No :-</th>
            <td>
                {{ $rd_scheme_payment->paid_installment }}
            </td>
        </tr>
        <tr>
            <th></th>
            <td><div>@if($policy->pincode == 0)
                    {{ ' ' }}
                    @else
                    {{ $policy->pincode }}
                    @endif
                </div>
            </td>    
            <th> Next Installment :-</th>
            <td>
                {{ date("d-M-y", strtotime( $rd_scheme_payment->next_installment_date )) }}
            </td>
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
            {{ number_format( $rd_scheme_payment->deposit_amount )}}
            <strong>
                {{ '( '.Str::title(apphelper::convert_number_to_words(round( $rd_scheme_payment->deposit_amount ))).
                ' Only in words )'}}
            </strong>
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
<div class="footer_image" style="margin-bottom:-2px">
    <!-- <img src="assets/image/footer.jpg" alt=""> -->
</div>

{{-- Office Copy--}}



</body>

</html>




