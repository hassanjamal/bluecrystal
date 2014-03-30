@extends ('site.layouts.master')
@section('mainhead')
@parent
{{HTML::style('css/compiled/index-1.css')}}
{{HTML::style('css/lib/animate.css')}}
@stop
@section('container')
<div id="main_page">
    <div class="head">
        <div class="container">
            <div class="col-sm-12 count" id="clock">
                <div class="pull-right">
                    <div class="box last">
                        <div class="circle">
                                <span id="Home">
                                <a href="{{{URL::to('/')}}}">
                                    <i class="fa fa-home fa-lg fa_icon "></i>
                                </a>
                                </span>
                        </div>
                        <a href="{{{ URL::to('/') }}}">HOME</a>
                    </div>
                    <div class="box">
                        <div class="circle">
                                <span id="About Us">
                                <a href="{{{URL::to('/about')}}}">
                                    <i class="fa fa-group fa-lg fa_icon"></i>
                                </a>
                                </span>
                        </div>
                        <a href="{{{ URL::to('/about') }}}">ABOUT US</a>
                    </div>
                    <div class="box">
                        <div class="circle">
                                <span id="Schemes">
                                <a href="{{{URL::to('/schemes')}}}">
                                    <i class="fa fa-rocket fa-lg fa_icon"></i>
                                </a>
                                </span>
                        </div>
                        <a href="{{{ URL::to('/schemes') }}}">SCHEMES</a>
                    </div>
                    <div class="box">
                        <div class="circle">
                                <span id="Loans">
                                <a href="{{{URL::to('/loans')}}}">
                                    <i class="fa fa-rupee fa-lg fa_icon"></i>
                                </a>
                                </span>
                        </div>
                        <a href="{{{ URL::to('/loans') }}}">LOANS</a>
                    </div>
                    <div class="box">
                        <div class="circle">
                                <span id="Loans">
                                <a href="{{{URL::to('/branches')}}}">
                                    <i class="fa fa-globe fa-lg fa_icon"></i>
                                </a>
                                </span>
                        </div>
                        <a href="{{{ URL::to('/branches') }}}">BRANCHES</a>
                    </div>
                    <div class="box">
                        <div class="circle">
                                <span id="Loans">
                                <a href="{{{URL::to('/media')}}}">
                                    <i class="fa fa-youtube-play fa-lg fa_icon"></i>
                                </a>
                                </span>
                        </div>
                        <a href="{{{ URL::to('/media') }}}">MEDIA </a>
                    </div>
                    <div class="box">
                        <div class="circle">
                                <span id="Loans">
                                <a href="{{{URL::to('/career')}}}">
                                    <i class="fa fa-signal fa-lg fa_icon"></i>
                                </a>
                                </span>
                        </div>
                        <a href="{{{ URL::to('/career') }}}">CAREER</a>
                    </div>
                    <div class="box">
                        <div class="circle">
                                <span id="Loans">
                                <a href="{{{URL::to('/faq')}}}">
                                    <i class="fa fa-question fa-lg fa_icon"></i>
                                </a>
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
