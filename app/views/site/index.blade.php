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
                                <span id="Home">
                                <i class="fa fa-home fa-lg"></i>  
                                </span>
                            </div>
                            <a href="{{{ URL::to('/') }}}">HOME</a>
                        </div>
                        <div class="box">
                            <div class="circle">
                                <span id="About Us">
                                <i class="fa fa-group fa-lg"></i>  
                                </span>
                            </div>
                            <a href="{{{ URL::to('/about') }}}">ABOUT US</a>
                        </div>
                        <div class="box">
                            <div class="circle">
                                <span id="Schemes">
                                <i class="fa fa-rocket fa-lg"></i>  
                                </span>
                            </div>
                            <a href="{{{ URL::to('/schemes') }}}">SCHEMES</a>
                        </div>
                        <div class="box">
                            <div class="circle">
                                <span id="Loans">
                                <i class="fa fa-rupee fa-lg"></i>  
                                </span>
                            </div>
                            <a href="{{{ URL::to('/loans') }}}">LOANS</a>
                        </div>
                        <div class="box">
                            <div class="circle">
                                <span id="Loans">
                                <i class="fa fa-globe fa-lg"></i>  
                                </span>
                            </div>
                            <a href="{{{ URL::to('/branches') }}}">BRANCHES</a>
                        </div>
                        <div class="box">
                            <div class="circle">
                                <span id="Loans">
                                <i class="fa fa-youtube-play fa-lg"></i>  
                                </span>
                            </div>
                            <a href="{{{ URL::to('/media') }}}">MEDIA </a>
                        </div>
                        <div class="box">
                            <div class="circle">
                                <span id="Loans">
                                <i class="fa fa-signal fa-lg"></i>  
                                </span>
                            </div>
                            <a href="{{{ URL::to('/career') }}}">CAREER</a>
                        </div>
                        <div class="box">
                            <div class="circle">
                                <span id="Loans">
                                <i class="fa fa-question fa-lg"></i>  
                                </span>
                            </div>
                            <a href="{{{ URL::to('/faq') }}}">FAQ's</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
