<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="{{URL::to('/css/print/welcomestyle.css')}}">
<style>
body{
    background-image:url('/assets/image/policy_welcome_letter.png');
    background-size:cover;
}
</style>
</head>
<body>
<header>
    <h1>Welcome Letter</h1>
</header>
<article>
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
            <td><span >Date : {{  date("d-M-Y") }}</span></td>
        </tr>
    </table>

</article>
<div class="maincontent">
    <p>Dear Mr/Mrs. <strong>{{$policy->name}}</strong><p><br>
    <p>
    <strong>Congratulations!!</strong> <br><br>
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
    </p> <br> 
    <p>
    We extend our best wishes for your Successful Future.
    </p> <br> 
    <p>
    With wining regards,
    </p> <br> <br> <br>
    <span class="pull-right">
        <strong>Signature of Authority</strong>
        <br>
        <em>
            {{ '( '.Sentry::getUser()->first_name . ' '. Sentry::getUser()->last_name.' )'}}
        </em>

        <br>
        For BLUE CRYSTAL MUTUAL BENEFIT INDIA LIMITED.
    </span>
</div>

<script src="/js/jquery.js"></script>
<script>
$(document).ready(function(){
        window.print();
        });
</script>
</body>

</html>

