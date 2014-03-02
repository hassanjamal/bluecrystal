<!DOCTYPE html>

<html lang="en">
    <link rel="stylesheet" href="{{URL::to('/css/bootstrap/bootstrap.min.css')}}">

    <style>
        body {
            padding: 60px 0;
        }
    </style>

</head>

<body >
    <!-- Container -->
    <div class="container" id="receipt">

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <h4 class="panel-title " style="text-align:center">
                        <span class="lead text-danger" >BLUE CRYSTAL MUTUAL BENEFIT INDIA LIMITED</span>
                    </h4>
                </div>
                <hr>
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
                <div class="row" style="text-align:center ; background:black">
                    <strong class='lead' style="color:white" >Money Receipt</strong>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6 "><span class="pull-left"><strong>{{"REC-".$associate->branch_id."-".$associate->id."-".date("y")}}</strong> </span></div>
                    <div class="col-md-6 "><span class="pull-right"><strong>{{  date("d-M-Y") }}</strong> </span></div>
                </div>
                <div class="row">
                    <br>
                    <div class="col-md-6 well" style="background:white">
                        <table class="table table-striped ">
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

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6 well" style="background:white">
                        <table class="table table-striped ">
                            <tbody>
                                <tr>
                                    <td>PAYMENT MODE :-</td>
                                    <td>{{$associate->payment_mode}}</td>
                                </tr>
                                <tr>
                                    <td>BRANCH NAME :-</td>
                                    <td>{{$branch_name}}</td>
                                </tr>
                                <tr>
                                    <td>BRANCH ID :-</td>
                                    <td>{{$associate->branch_id}}</td>
                                </tr>
                                <tr>
                                    <td>START DATE :-</td>
                                    <td>{{$associate->start_date}}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12 "><span class="pull-left">Dear Mr/Mrs. <strong>{{$associate->name}}</strong> <br> Thank you for making a payment of  <strong>Rs {{$associate->associate_fees}}/ </strong> ( Five Hundered Only <em>in words</em>) as joining fee. </span></div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-12 ">
                        <span class="pull-right">
                            <strong>Signature of Authority</strong>
                            <br>
                            For BLUE CRYSTAL MUTUAL BENEFIT INDIA LIMITED.
                        </span>
                    </div>
                </div>

            </div>
        </div>
        <!-- ./ container -->
        <script src="/js/jquery.js"></script>
        <script>
            $(document).ready(function(){
                window.print();
            });
        </script>
    </body>

</html>
