<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" href="{{URL::to('/css/print/policy_rec.css')}}">
    </head>
    <body marginwidth="0" marginheight="0">
        <table class="main">
            <tbody>
                <tr>
                    <td>
                        <img src="assets/image/header.jpg" alt="">
                    </td>
                </tr>
                <tr>
                    <td class="main_content">
                        <address>
                            <!-- <p>Payment Details</p> -->
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
                                    <th>NAME :-</th>
                                    <td>{{$policy->name}}</td>
                                </tr>
                                <tr>
                                    <th>AMOUNT DEPOSITED :- </th>
                                    <td>
                                        @if ($policy->scheme_type=='FD')
                                        {{ number_format(Fd_scheme_payment::where('policy_id', $policy->id)->pluck('deposit_amount'))}}
                                        @endif
                                        @if ($policy->scheme_type=='RD')
                                        {{ number_format(Rd_scheme_payment::where('policy_id', $policy->id)->pluck('deposit_amount'))}}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>MATURE AMOUNT :- </th>
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
                                    <th>INSTALLMENT NUMBER :- </th>
                                    <td>
                                        {{ Rd_scheme_payment::where('policy_id', $policy->id)->pluck('paid_installment')}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>NEXT INSTALLMENT :- </th>
                                    <td>
                                        {{ Rd_scheme_payment::where('policy_id', $policy->id)->pluck('next_installment_date')}}
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <th>SCHEME TYPE :-</th>
                                    <td>{{$policy->scheme_type}}</td>
                                </tr>
                                <tr>
                                    <th>SCHEME NAME :-</th>
                                    <td>{{$policy->scheme_name}}</td>
                                </tr>
                                <tr>
                                    <th>BRANCH NAME:-</th>
                                    <td>{{ Branch::where('id' , $policy->branch_id)->pluck('name') }}</td>
                                </tr>
                                <tr>
                                    <th>ASSOCIATE NO :-</th>
                                    <td>{{$policy->associate_no}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <span class="pull-right">
                            <strong>Signature of Authority</strong>
                            <br>
                            <em>
                                {{ '( '.Sentry::getUser()->first_name . ' '. Sentry::getUser()->last_name.' )'}}
                            </em>

                            <br>
                            For BLUE CRYSTAL MUTUAL BENEFIT INDIA LIMITED.
                        </span>

                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="assets/image/footer.jpg" alt="">
                    </td>
                </tr>
            </tbody>
        </table>
        <hr style="border-bottom: dotted 1px #000">
        <table class="main">
            <tbody>
                <tr>
                    <td>
                        <img src="assets/image/header.jpg" alt="">
                    </td>
                </tr>
                <tr>
                    <td class="main_content">
                        <address>
                            <!-- <p>Payment Details</p> -->
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
                                    <th>NAME :-</th>
                                    <td>{{$policy->name}}</td>
                                </tr>
                                <tr>
                                    <th>AMOUNT DEPOSITED :- </th>
                                    <td>
                                        @if ($policy->scheme_type=='FD')
                                        {{ number_format(Fd_scheme_payment::where('policy_id', $policy->id)->pluck('deposit_amount'))}}
                                        @endif
                                        @if ($policy->scheme_type=='RD')
                                        {{ number_format(Rd_scheme_payment::where('policy_id', $policy->id)->pluck('deposit_amount'))}}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>MATURE AMOUNT :- </th>
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
                                    <th>INSTALLMENT NUMBER :- </th>
                                    <td>
                                        {{ Rd_scheme_payment::where('policy_id', $policy->id)->pluck('paid_installment')}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>NEXT INSTALLMENT :- </th>
                                    <td>
                                        {{ Rd_scheme_payment::where('policy_id', $policy->id)->pluck('next_installment_date')}}
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <th>SCHEME TYPE :-</th>
                                    <td>{{$policy->scheme_type}}</td>
                                </tr>
                                <tr>
                                    <th>SCHEME NAME :-</th>
                                    <td>{{$policy->scheme_name}}</td>
                                </tr>
                                <tr>
                                    <th>BRANCH NAME:-</th>
                                    <td>{{ Branch::where('id' , $policy->branch_id)->pluck('name') }}</td>
                                </tr>
                                <tr>
                                    <th>ASSOCIATE NO :-</th>
                                    <td>{{$policy->associate_no}}</td>
                                </tr>

                            </tbody>
                        </table>
                        <span class="pull-right">
                            <strong>Signature of Authority</strong>
                            <br>
                            <em>
                                {{ '( '.Sentry::getUser()->first_name . ' '. Sentry::getUser()->last_name.' )'}}
                            </em>

                            <br>
                            For BLUE CRYSTAL MUTUAL BENEFIT INDIA LIMITED.
                        </span>

                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="assets/image/footer.jpg" alt="">
                    </td>
                </tr>
            </tbody>
        </table>


    </body>

</html>

