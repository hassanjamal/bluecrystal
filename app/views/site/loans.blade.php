@extends('site.layouts.master')
@section('mainhead')
@parent
{{HTML::style('css/compiled/features.css')}}
{{HTML::style('css/lib/animate.css')}}
@stop
@section('container')
<div id="features" class="features_page">
    <div class="container">
        <!-- Feature Wrapper -->
        <div class="feature_wrapper option1">
            <div class="section_header">
                <h3>LOANS</h3>
            </div>

            <div class="row subtitle">
                <h2>Loan against movable property</h2>
            </div>

            <div class="row feature">
                <div class="col-sm-4">
                    <img src="/assets/image/loan.png" class="img-responsive img-center" alt="about-us">
                </div>
                <div class="col-sm-8 ">
                    <p>We will give you a loan against your movable property. You can also
                        apply for this loan if you need funds to acquire new property. A take-over of your existing loan
                        with refinancing is also possible with Loan Against Property”</p>

                    <br>
                    <br>
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#jewelery">
                                        Jewellery & Gold Loan
                                    </a>
                                </h4>
                            </div>
                            <div id="jewelery" class="panel-collapse collapse in">
                                <div class="panel-body">

                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#policy">
                                        KVP/NSC/Insurance Policy/ Other Govt. Securities Loan
                                    </a>
                                </h4>
                            </div>
                            <div id="policy" class="panel-collapse collapse">
                                <div class="panel-body"></div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#group_loan">
                                        Group Loan
                                    </a>
                                </h4>
                            </div>
                            <div id="group_loan" class="panel-collapse collapse">
                                <div class="panel-body"></div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#mahila_vikas">
                                        Mahila Vikas Yojna
                                    </a>
                                </h4>
                            </div>
                            <div id="mahila_vikas" class="panel-collapse collapse">
                                <div class="panel-body"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <hr>
        <br>

        <div class="feature_wrapper option1">
            <div class="row subtitle">
                <h2>Loan against immovable property</h2>
            </div>

            <div class="row feature">

                <div class="col-sm-8 info">
                    <p>We will give you a loan against your immovable property.
                    This facility is provided against the security of immovable residential/commercial/industrial property</p> 

                <br>
                <br>
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        Loan against Land & Building
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <img src="/assets/image/loan-1.png" class="img-responsive img-center" alt="about-us">
                </div>
            </div>
        </div>
    </div>
</div>

@stop


