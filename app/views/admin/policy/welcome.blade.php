<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" href="{{URL::to('/css/print/policy_wel.css')}}">
    </head>
    <body marginwidth="0" marginheight="0">
        <table class="main">
            <tbody>
                <tr>
                    <td>
                        <img src="assets/image/policy_header_welcome_letter.jpg" alt="">
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
                        <table class="maincontent">
                            <tr>
                                <td>
                                    <p>Dear Mr/Mrs. <strong>{{$policy->name}}</strong><p><br>
                                            <p>
                                                <strong>Congratulations!!</strong> <br><br>
                                                For having a secure and properous financial future with <strong>BLUE CRYSTAL MUTUAL BENEFIT INDIA LIMITED</strong> . Your Policy Number is <strong>{{$policy->policy_no}}</strong>.
                                            </p> 
                                            <p>
                                                Choosing the right career is an important decision to build. As you look for your best career opportunity you are probably looking  for  a company that can offer you  more. Perhaps an Indian enterprise that offers you the chance to lead and inspire, innovate and discover or develop and achieve? A company where you are empowered to create your own success and are rewarded for your contributions? You can find all of this and more in one company , BLUE CRYSTAL MUTUAL BENEFIT INDIA LIMITED. In fact  BLUE CRYSTAL MUTUAL BENEFIT INDIA LIMITED is  not a company, it’s Samuh <em>“aap ka apna BLUE CRYSTAL MUTUAL BENEFIT INDIA LIMITED”</em>. We prepare a  safe , friendly, Innocent  &amp; transparent culture that  provides  you the best Way &amp; opportunity to grow yourself parallel with the Company.
                                            </p> 
                                            <p>
                                                BLUE CRYSTAL MUTUAL BENEFIT INDIA LIMITED designed futuristic Career Plans for their valuable Independent Marketing Developers  for their better life. Our Independent  Marketing  Developers are  our True Family member &amp; Back bone of the Company . Company  has  invented Fourteen  easy steps  for their Independent Marketing Developers to reachtop positions of the company. Company has introduced 15 years of Career Plan with Handsome retirement and bucket of welfare  Schemes for their Independent Marketing Developers.
                                            </p> 
                                            <p>
                                                From time to time we have proved ourselves to be the best in the industry and you will also feel proud to be a part of our growing family.
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
                                            For BLUE CRYSTAL MUTUAL BENEFIT INDIA LIMITED.
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="assets/image/policy_footer_welcome_letter.jpg" alt="">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </body>

        </html>


