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
                            <a href="{{{ URL::to('/') }}}">HOME</a>
                        </div>
                        <div class="box">
                            <div class="circle">
                                <span id="About Us"></span>
                            </div>
                            <a href="{{{ URL::to('/aaboutbout') }}}">ABOUT US</a>
                        </div>
                        <div class="box">
                            <div class="circle">
                                <span id="Schemes"></span>
                            </div>
                            <a href="{{{ URL::to('/') }}}">SCHEMES</a>
                        </div>
                        <div class="box">
                            <div class="circle">
                                <span id="Loans"></span>
                            </div>
                            <a href="{{{ URL::to('/') }}}">LOANS</a>
                        </div>
                        <div class="box">
                            <div class="circle">
                                <span id="Loans"></span>
                            </div>
                            <a href="{{{ URL::to('/') }}}">BRANCHES</a>
                        </div>
                        <div class="box">
                            <div class="circle">
                                <span id="Loans"></span>
                            </div>
                            <a href="{{{ URL::to('/') }}}">MEDIA </a>
                        </div>
                        <div class="box">
                            <div class="circle">
                                <span id="Loans"></span>
                            </div>
                            <a href="{{{ URL::to('/') }}}">CAREER</a>
                        </div>
                        <div class="box">
                            <div class="circle">
                                <span id="Loans"></span>
                            </div>
                            <a href="{{{ URL::to('/') }}}">FAQ's</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
