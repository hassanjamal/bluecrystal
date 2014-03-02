@extends ('site.layouts.master')
@section('mainhead')
	@parent
{{HTML::style('css/compiled/coming-soon.css')}}
{{HTML::style('css/lib/animate.css')}}
@stop
@section('container')
<div id="coming_soon">
        <div class="head">
            <div class="container">
                <div class="col-sm-12 count" id="clock">
                    <div class="pull-right">
                        <div class="box last">
                            <div class="circle">
                                <span id="Home"></span>
                            </div>
                            <p>Home</p>
                        </div>
                        <div class="box">
                            <div class="circle">
                                <span id="About Us"></span>
                            </div>
                            <p>About Us</p>
                        </div>
                        <div class="box">
                            <div class="circle">
                                <span id="Schemes"></span>
                            </div>
                            <p>Schemes</p>
                        </div>
                        <div class="box">
                            <div class="circle">
                                <span id="Loans"></span>
                            </div>
                            <p>Loans</p>
                        </div>
                        <div class="box">
                            <div class="circle">
                                <span id="Loans"></span>
                            </div>
                            <p>Branches</p>
                        </div>
                        <div class="box">
                            <div class="circle">
                                <span id="Loans"></span>
                            </div>
                            <p>Media </p>
                        </div>
                        <div class="box">
                            <div class="circle">
                                <span id="Loans"></span>
                            </div>
                            <p>Career</p>
                        </div>
                        <div class="box">
                            <div class="circle">
                                <span id="Loans"></span>
                            </div>
                            <p>FAQ's</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
