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
                <h3>Frequently asked questions</h3>
            </div>
            <div class="row feature">
                <div class="col-sm-4">
                    <img src="/assets/image/faq.png" class="img-responsive img-center" alt="about-us">
                </div>
                <div class="col-sm-8 ">
                    <br>
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#jewelery">
                                        What does our organization stands for?
                                    </a>
                                </h4>
                            </div>
                            <div id="jewelery" class="panel-collapse collapse in">
                                <div class="panel-body">
We are here in the mutual society to develop business traditions with new ideals. We want to aware people about the importance of savings.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#policy">
                                         Do I need to open an account with BLUE CRYSTAL for availing the service of loan?
                                    </a>
                                </h4>
                            </div>
                            <div id="policy" class="panel-collapse collapse">
                                <div class="panel-body">
                                We will be able to offer a host of other value added services, which are complementary to the loan. However, opening an account with us is not mandatory.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#group_loan">
                                        Why do you trust us?
                                    </a>
                                </h4>
                            </div>
                            <div id="group_loan" class="panel-collapse collapse">
                                <div class="panel-body">
                                It is our sincere effort and your trust that still now we are serving you with a pledge that later we will also serve in future. We are financially secure over years and thanks to all our customers who has kept their faith on us.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#mahila_vikas">
                                        How do I know that my account is active?
                                    </a>
                                </h4>
                            </div>
                            <div id="mahila_vikas" class="panel-collapse collapse">
                                <div class="panel-body">
                                Please contact our nearest branch or call our helpline within 7 days of submission of account opening forms to confirm status of account activation.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@stop




