@extends('site.layouts.master')
@section('mainhead')
@parent
{{HTML::style('css/compiled/pricing.css')}}
{{HTML::style('css/lib/animate.css')}}
@stop
@section('container')
<div id="scheme">
    <div class="container">
        <div class="section_header">
            <h3>Our Schemes</h3>
        </div>
        <div class=row>
            <div class="col-sm-8 intro">
                <h6>Growth , Safety , Reliability </h6>

                <p>
                    <blockquote>
                        We always ensure guaranteed financial support to our members through our modern and unique Quasi
                        Banking system.
                    </blockquote>
                    Apart from financial support we are here to introduce a new and different way to increase the
                    savings of human beings through our channel partners and associate partners.
                    <br>
                    To receive, accept or collect savings or money from our members of all categories as deposits i.e.
                    Fixed Deposit (F.D), Recurring Deposit (R.D), Monthly Income Scheme (MIS) Term Deposit (T.D) under
                    various schemes will be formulating from time to time by the company and the company will provide as
                    such Interest or benefit on the Deposits whatever is fit for and beneficial to the company and to
                    the members as per the rules & regulation or guideline of Reserve Bank of India (RBI).
                </p>
            </div>
            <div class="col-sm-4">
                <img src="/assets/image/scheme.png" class="img-responsive img-center" alt="about-us">
            </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="row">
            <div class="tab-content col-md-9">
                <div class="tab-pane active" id="tab_a">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">RECURRING PLAN</h3>
                        </div>
                        <div class="panel-body">
                           
                        </div>
                        <div class="panel-footer">
                            <ol>
                                <li>The minimum RD amount will be Rs. 100/ and multiple of Rs 100/</li>
                                <li>Default account will be charged 2% per month for each installment</li>
                                <li>No Premature paymnet for 12 months scheme</li>
                                <li>For irregular/ defaulter account premature facility is not allowed</li>
                                <li>In case of 24 months scheme, premature facility will be available after 18 months</li>
                                <li>In case of 60 months scheme, premature facility will be available after 36 months</li>
                                <li>In case of premature application must be given 30 days before at concerned branch</li>
                                <li>Special Case M.I.S is applicable for senior citizen , Women , Govt Employee
                                    , Defence Personnel ,  Physically Handicapped , Govt Pensioner and Windows of Matyrs</li>
                                <li>Prematurity withdrawal allowed at 0.5% below the rate applicable for that scheme</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab_b">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">FIXED DEPOSIT PLAN</h3>
                        </div>
                        <div class="panel-body">



                        </div>
                        <div class="panel-footer">
                            <ol>
                                <li>The minimum FD amount will be Rs. 5,000/ and multiple of Rs 1,000/</li>
                                <li>The minimum period for a FD shall not be less than 1 year and the maximum period
                                    should not exceed 5 years.Policy renewal for FD is also </li>
                                <li>Special Case M.I.S is applicable for senior citizen , Women , Govt Employee
                                    , Defence Personnel ,  Physically Handicapped , Govt Pensioner and Windows of Matyrs</li>
                                <li>Premature payment is not possible before 1 years </li>
                                <li>After 1 year rate of interest will be paid at 0.5% below the rate applicable for 
                                that scheme. In that case premature payment application must be given 30 days before at the concerned branch </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab_c">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">MONTHLY INSTALLMENT PLAN</h3>
                        </div>
                        <div class="panel-body">


                        
                        </div>
                        <div class="panel-footer">
                            <ol>
                                <li>The minimum denomination will be Rs. 10,000/ and multiple of Rs 1,000/</li>
                                <li>After maturity only principal amount will be paid.</li>
                                <li>Special Case M.I.S is applicable for senior citizen , Women , Govt Employee
                                    , Defence Personnel ,  Physically Handicapped , Govt Pensioner and Windows of Matyrs</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="nav nav-pills nav-stacked col-md-3">
                <li class="active"><a href="#tab_a" data-toggle="pill">RECURRING DEPOSIT</a></li>
                <li><a href="#tab_b" data-toggle="pill">FIXED DEPOSIT</a></li>
                <li><a href="#tab_c" data-toggle="pill">MONTHLY INCOME SCHEME</a></li>
            </ul>
        </div>

        @stop

