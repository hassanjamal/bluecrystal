<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="{{URL::to('/css/bootstrap.css')}}">
    <style>
        body {
            padding: 60px 0;
        }
    </style>
</head>

<body onload="window.print()">
    <!-- Container -->
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <h4 class="panel-title " style="text-align:center">
                        <span class="lead text-danger" >BLUE CRYSTAL MUTUAL BENEFIT INDIA LIMITED</span>
                    </div>
                    <!-- <hr> -->
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
                    <table class="table">
                        <tbody>
                            <tr>
                                <div class="row" style="text-align:center ; background:black">
                                    <strong class='lead' style="color:white" >Welcome Letter</strong>
                                </div>
                                <hr>
                            </tr>
                            <tr>
                                <div class="row">
                                    <div class="col-md-6 "><span class="pull-left">Dear Mr/Mrs. <strong>{{$policy->name}}</strong> </span></div>
                                    <div class="col-md-6 "><span class="pull-right">ID : <strong>{{$policy->policy_no}}</strong> </span></div>
                                </div>
                                <br> <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>
                                            Congratulations!! <br>
                                            For having a secure and properous financial future with <strong>BLUE CRYSTAL MUTUAL BENEFIT INDIA LIMITED</strong> . Your Policy Number is <strong>{{$policy->policy_no}}</strong>.
                                        </p> <br>
                                        <p>
                                            Choosing the right career is an important decision to build. As you look for your best career opportunity you are probably looking  for  a company that can offer you  more. Perhaps an Indian enterprise that offers you the chance to lead and inspire, innovate and discover or develop and achieve? A company where you are empowered to create your own success and are rewarded for your contributions? You can find all of this and more in one company , BLUE CRYSTAL MUTUAL BENEFIT INDIA LIMITED. In fact  BLUE CRYSTAL MUTUAL BENEFIT INDIA LIMITED is  not a company, it’s Samuh <em>“aap ka apna BLUE CRYSTAL MUTUAL BENEFIT INDIA LIMITED”</em>. We prepare a  safe , friendly, Innocent  & transparent culture that  provides  you the best Way & opportunity to grow yourself parallel with the Company.
                                        </p> <br>
                                        <p>
                                            BLUE CRYSTAL MUTUAL BENEFIT INDIA LIMITED designed futuristic Career Plans for their valuable Independent Marketing Developers  for their better life. Our Independent  Marketing  Developers are  our True Family member & Back bone of the Company . Company  has  invented Fourteen  easy steps  for their Independent Marketing Developers to reachtop positions of the company. Company has introduced 15 years of Career Plan with Handsome retirement and bucket of welfare  Schemes for their Independent Marketing Developers.
                                        </p> <br>
                                        <p>
                                            From time to time we have proved ourselves to be the best in the industry and you will also feel proud to be a part of our growing family.
                                        </p> <br> <br>
                                        <p>
                                            We extend our best wishes for your Successful Future.
                                        </p> <br> <br>
                                        <p>
                                            With wining regards,
                                        </p> <br> <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="pull-right">
                                            <strong>Signature of Authority</strong>
                                            <br>
                                            For BLUE CRYSTAL MUTUAL BENEFIT INDIA LIMITED.
                                        </span>
                                    </div>
                                </div> <br> <br>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="pull-left">
                                            <small><em style="color:grey">
                                                    * Please go through attached money receipt for other details 
                                            </em></small>
                                            <br>
                                            <small><em style="color:grey">
                                                    * terms and condition apply
                                                </em></small >
                                            </span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- ./ container -->

    </body>
</html>
