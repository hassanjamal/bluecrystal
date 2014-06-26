<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Alegreya+Sans+SC:400,700' rel='stylesheet' type='text/css'>
    <style>
        body {
            height: 11.69in;
            overflow: hidden;
            width: 8.27in;
            font-family: 'Open Sans', sans-serif;
        }

        table.main {
            font-size: 75%;
            table-layout: fixed;
            width: 100%;
        }

        table.main {
            border-spacing: 0px;
        }

        table.main th, table.main td {
            padding: 0em;
            text-align: left;
        }

        hr {
            clear: both;
            margin: 0;
            border-top: 1px dotted #000 !important;
        }

        /* table */

        table {
            font-size: 75%;
            table-layout: fixed;
            width: 100%;
        }

        table {
            border-collapse: separate;
            border-spacing: 1px;
        }

        th, td {
            border-width: 1px;
            padding: 0.5em;
            position: relative;
            text-align: left;
        }

        th {
            background: #EEE;
            border-color: #BBB;
        }

        td {
            border-color: #DDD;
        }

        table.welcome {
            margin-top: 12em;
        }

        table.welcome th {
            text-align: center;
            font-size: 90%
        }

        table.meta {
            margin-top: 2em;
            float: right;
            width: 36%;
        }

        table.meta th {
            width: 40%;
            border-bottom: 1px dashed darkgrey
        }

        table.meta td {
            width: 60%;
            border-bottom: 1px dashed darkgrey;
            padding-left: 1em;
        }

        table.maincontent {
            clear: both;
            float: left;
            width: 98%;

        }

        /* table meta */

        table.meta th {
            width: 40%;
        }

        table.meta td {
            width: 60%;
        }

        table.maincontent th {
            height: 20px;
            width: 35%;
            text-align: right;
            background-color: transparent;
        }

        table.maincontent td {
            width: 65%;
            padding-left: 2em;
            font-size: 90%
        }

        table.meta:after, table.maincontent:after {
            clear: both;
            content: "";
            display: table;
        }

        table.signature {
            margin-top: 2em;
            clear: both;
            float: right;
            width: 40%;
        }

        table.signature strong, table.signature em {
        }

        table.signature td {
            text-align: center;
        }

        table.header {
            clear: both;
            width: 100%;
            position: fixed;
            height: 129px;
            background-color: lightblue;
            top: 0px;
            left: 0px;
            right: 0px;
            margin-bottom: 0px;
        }

        table.header th {
            width: 10%;
            padding-left: 20px;
            background-color: lightblue;
        }

        table.header td {
            padding-top: 5px;
            width: 90%;
            text-align: center;
            /*color: #f5f5f5;*/
            line-height: 16px;
        }

        table .post-header{
            margin-top : 145px;
            margin-left : 2em;
            margin-right : 2em;
        }

        table.footer {
            clear: both;
            width: 100%;
            position: fixed;
            height: 60px;
            background-color: lightblue;
            bottom: 0px;
            left: 0px;
            right: 0px;
            margin-bottom: 0px;
        }

        table.footer td {
            font-size: 60%;
            padding-left: 4em;
            /*color:lightgrey;*/
            font-style: italic;
            padding-bottom: 20px;
        }

        table.header h1 {
            font-family: 'Alegreya Sans SC', sans-serif;
            font-size: 28px;
            margin-bottom: 5px;
        }

        @page {
            margin: 0;
        }


    </style>
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
            <table class="post-header">
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
        </td>
    </tr>
    <tr>
        <td>
            <table class="maincontent">

            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table class="signature">
                
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




