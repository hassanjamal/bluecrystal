@extends('site.layouts.master-another')
@section('mainhead')
@parent
{{HTML::style('css/compiled/scheme.css')}}
{{HTML::style('css/lib/animate.css')}}
@stop
@section('container')
<div id="scheme">
    <div class="container">
        <div class="section_header">
            <h3>Our Branches</h3>
        </div>
        <div class="row">
            <ul class="nav nav-pills nav-stacked col-md-3">
                <li class="active"><a href="#tab_a" data-toggle="pill">UTTAR PRADESH</a></li>
                <li><a href="#tab_b" data-toggle="pill">BIHAR</a></li>
                <li><a href="#tab_c" data-toggle="pill">DELHI</a></li>
            </ul>
            <div class="tab-content col-md-9">
                <div class="tab-pane active" id="tab_a">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">UTTAR PRADESH</h3>
                        </div>
                        <div class="panel-body">
                           
                        </div>
                        <div class="panel-footer">
                            <ol>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab_b">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">BIHAR</h3>
                        </div>
                        <div class="panel-body">

                        </div>
                        <div class="panel-footer">
                            <ol></ol>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab_c">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">DELHI</h3>
                        </div>
                        <div class="panel-body">
                        
                        </div>
                        <div class="panel-footer">
                            <ol></ol>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        @stop

