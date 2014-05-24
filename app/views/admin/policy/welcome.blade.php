<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="{{URL::to('/css/print/print_welcome.css')}}">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Alegreya+Sans+SC:400,700' rel='stylesheet' type='text/css'>
</head>
<body marginwidth="0" marginheight="0">
<table class="main">
    <tbody>
    <tr>
        <td>
            <table class="header">
                <tr>
                    <th>
                        <img src="assets/image/logo.png">
                    </th>
                    <td>
                        <h1>BLUE CRYSTAL MUTUAL BENEFIT INDIA LTD.</h1>

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
        </td>
    </tr>
    <tr>
        <td>
            <table class="welcome">
                <tr>
                    <th>
                        WELCOME LETTER
                    </th>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td class="main_content">
            <table class="meta">
                <tr>
                    <th><span>Policy No</span></th>
                    <td><span>{{$policy->policy_no}}</span></td>
                </tr>
                <tr>
                    <th><span>Date</span></th>
                    <td><span>{{  date("d-M-Y") }}</span></td>
                </tr>
            </table>
            <table class="maincontent">
                <tr>
                    <td>
                        <p>Dear Mr/Mrs. <strong>{{$policy->name}}</strong>

                        <p>

                        <p>
                            We thank you for choosing <strong>BLUE CRYSTAL MUTUAL BENEFIT INDIA LIMITED </strong> as
                            your
                            preferred financial partner.
                        </p>

                        <p>
                            We are pleased to enclose your Policy Pack for POLICY NO.
                            <strong>{{$policy->policy_no}}</strong> issued on <strong>{{{
                                date("d-M-Y",strtotime($policy->created_at)) }}}</strong>
                        </p>

                        <p>
                            Please find enclosed your Policy Pack comprising the following documents:
                        <ol>
                            <li>Policy Document</li>
                            <li>First Premium Receipt</li>
                            <li>Terms and Conditions</li>
                            <li>Details of members included (Annexure-I)</li>
                        </ol>
                        </p>
                        <p>It is the Company's objective to provide financial protection for our customers supported by
                            the highest levels of customer service.
                        </p>

                        <p>
                            From time to time we have proved ourselves to be the best in the industry and you will also
                            feel proud to be a part of our growing family.
                        </p>

                        <p>
                            <br>
                            We extend our best wishes for your Successful Future.
                            <br>
                        </p>

                        <p>
                            <br>
                            With wining regards,
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table class="signature">
                <tr>
                    <td class="pull-right">
                        <img src="assets/image/signature.png">
                        <br>
                        Prashant Singh
                        <br>
                        <strong>Chief Operating Officier</strong>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <table class="footer">
            <tr>
                <td>
                    * Terms and condition apply <br>
                    * Please contact concerned branch for any query
                </td>
            </tr>
        </table>
    </tr>
    </tbody>
</table>
</body>
</html>



