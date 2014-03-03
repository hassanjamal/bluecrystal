@extends('site.layouts.master')
@section('mainhead')
@parent
{{HTML::style('css/compiled/coming-soon-1.css')}}
{{HTML::style('css/lib/animate.css')}}
@stop
@section('container')
<div id="coming_soon">
    <div class="head">
        <div class="container">
            <div class="col-sm-6 text">
                <h4>Work With Us</h4>
                <hr>
                <h4>We are launching very soon</h4>
                <p>
                    We are currently working on an awesome new site. <span>STAY TUNED!</span>
                    <br />
                </p>
            </div>
        </div>
    </div>
</div>

@stop

