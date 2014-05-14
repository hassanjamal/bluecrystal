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
                        <h1>BLUE CRYSTAL MUTUAL BENEFIT LTD.</h1>

                        <p><em>A Unit Of Blue Crystl Group</em><br>
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

                        <p><br>

                        <p>
                            <strong>Congratulations!!</strong> <br>
                            For having a secure and properous financial future with <strong>BLUE CRYSTAL MUTUAL BENEFIT
                                LTD.</strong> . Your Policy Number is <strong>{{$policy->policy_no}}</strong>.
                        </p>

                        <p>
                            Choosing the right career is an important decision to build. As you look for your best
                            career opportunity you are probably looking for a company that can offer you more. Perhaps
                            an Indian enterprise that offers you the chance to lead and inspire, innovate and discover
                            or develop and achieve? A company where you are empowered to create your own success and are
                            rewarded for your contributions? You can find all of this and more in one company , BLUE
                            CRYSTAL MUTUAL BENEFIT LTD. In fact BLUE CRYSTAL MUTUAL BENEFIT LTD. is not a company, it’s
                            <em>“aap ka apna BLUE CRYSTAL MUTUAL BENEFIT LTD.”</em>. We prepare a safe , friendly,
                            Innocent &amp; transparent culture that provides you the best Way &amp; opportunity to grow
                            yourself parallel with the Company.
                        </p>

                        <p>
                            BLUE CRYSTAL MUTUAL BENEFIT LTD. designed futuristic Career Plans for their valuable
                            Independent Marketing Developers for their better life. Our Independent Marketing Developers
                            are our True Family member &amp; Back bone of the Company . Company has invented Fourteen
                            easy steps for their Independent Marketing Developers to reachtop positions of the company.
                            Company has introduced 15 years of Career Plan with Handsome retirement and bucket of
                            welfare Schemes for their Independent Marketing Developers.
                        </p>

                        <p>
                            From time to time we have proved ourselves to be the best in the industry and you will also
                            feel proud to be a part of our growing family.
                        </p>

                        <p>
                            We extend our best wishes for your Successful Future.
                        </p>

                        <p>
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
                        <strong>Signature of Authority</strong>
                        <br>
                        <em>
                            {{ '( '.Sentry::getUser()->first_name . ' '. Sentry::getUser()->last_name.' )'}}
                        </em>
                        <br>
                        For BLUE CRYSTAL MUTUAL BENEFIT LTD.
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



