<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="{{URL::to('/css/print/printstyle.css')}}">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<style>
body{
    background-image:url('/assets/image/associate_money_receipt.jpg');
    background-size:cover;
}
</style>
</head>
<body>
<article>
    <h1>Recipient</h1>
    <address>
        <p>Payment Details</p>
    </address>
    <table class="meta">
        <tr>
            <th><span >Receipt No</span></th>
            <td><span >{{"REC-".$associate->branch_id."-".$associate->id."-".date("y")}}</span></td>
        </tr>
        <tr>
            <th><span >Date</span></th>
            <td><span >{{  date("d-M-Y") }}</span></td>
        </tr>
    </table>
    <table class="inventory">
        <tbody>
        <tr>
            <td>NAME :-</td>
            <td>{{$associate->name}}</td>
        </tr>
        <tr>
            <td>ASSOCIATE NO :-</td>
            <td>{{$associate->associate_no}}</td>
        </tr>
        <tr>
            <td>DESIGNATION :-</td>
            <td>{{$rank_name}}</td>
        </tr>
        <tr>
            <td>INTRODUCER NO :-</td>
            <td>{{$introducer_no}}</td>
        </tr>

        <tr>
            <td>PAYMENT :-</td>
            <td><i class="fa fa-rupee"></i> 500.00
                {{'( '.$associate->payment_mode.' )'}}</td>
        </tr>
        <tr>
            <td>BRANCH NAME :-</td>
            <td>{{$branch_name}}</td>
        </tr>
        <tr>
            <td>START DATE :-</td>
            <td>{{$associate->start_date}}</td>
        </tr>

        </tbody>
    </table>
</article>
<span class="pull-right">
    <strong>Signature of Authority</strong>
    <br>
    <em>
        {{ '( '.Sentry::getUser()->first_name . ' '. Sentry::getUser()->last_name.' )'}}
    </em>

    <br>
    For BLUE CRYSTAL MUTUAL BENEFIT INDIA LIMITED.
</span>
<article id="article2">
    <h1>Recipient</h1>
    <address>
        <p>Payment Details</p>
    </address>
    <table class="meta">
        <tr>
            <th><span >Receipt No</span></th>
            <td><span >{{"REC-".$associate->branch_id."-".$associate->id."-".date("y")}}</span></td>
        </tr>
        <tr>
            <th><span >Date</span></th>
            <td><span >{{  date("d-M-Y") }}</span></td>
        </tr>
    </table>
    <table class="inventory">
        <tbody>
        <tr>
            <td>NAME :-</td>
            <td>{{$associate->name}}</td>
        </tr>
        <tr>
            <td>ASSOCIATE NO :-</td>
            <td>{{$associate->associate_no}}</td>
        </tr>
        <tr>
            <td>DESIGNATION :-</td>
            <td>{{$rank_name}}</td>
        </tr>
        <tr>
            <td>INTRODUCER NO :-</td>
            <td>{{$introducer_no}}</td>
        </tr>

        <tr>
            <td>PAYMENT :-</td>
            <td><i class="fa fa-rupee"></i> 500.00
                {{'( '.$associate->payment_mode.' )'}}</td>
        </tr>
        <tr>
            <td>BRANCH NAME :-</td>
            <td>{{$branch_name}}</td>
        </tr>
        <tr>
            <td>START DATE :-</td>
            <td>{{$associate->start_date}}</td>
        </tr>

        </tbody>
    </table>
</article>
<span class="pull-right">
    <strong>Signature of Authority</strong>
    <br>
    <em>
        {{ '( '.Sentry::getUser()->first_name . ' '. Sentry::getUser()->last_name.' )'}}
    </em>

    <br>
    For BLUE CRYSTAL MUTUAL BENEFIT INDIA LIMITED.
</span>

<script src="/js/jquery.js"></script>
<script>
$(document).ready(function(){
        window.print();
        });
</script>
</body>

</html>

