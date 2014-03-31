@extends('site.layouts.master-another')
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
                <h3>OUR MEDIA PRESENCE</h3>
            </div>

            <div class="row subtitle">
                <h2>Movie Production</h2>
            </div>

            <div class="row feature">
                <div class="col-sm-4">
                    <img src="/assets/image/movie.png" class="img-responsive img-center" alt="about-us">
                </div>
                <div class="col-sm-8 ">
                    <blockquote>
                        <p>Creativity is a gift each one of us is born with, irrespective of our backgrounds and entitlement of culture, The challenge is to hold onto this gift as we go through life. To nurture it. To encourage it. Because every single day we encounter forces that would rather it went away.</p>
                    </blockquote>
                    <br>
                    <br>
                    <p>Its our contribution to society to produce quality entertainment and we are in movie production</p>

                    <br>
                    <br>
                </div>
            </div>
        </div>
        <br>
        <hr>
        <br>

        <div class="feature_wrapper option1">
            <div class="row subtitle">
                <h2>Television Channel Launch</h2>
            </div>

            <div class="row feature">

                <div class="col-sm-8 info">
                    <blockquote>
                        <p>What is a television apparatus to man, who has only to shut his eyes to see the most inaccessible regions of the seen and the never seen, who has only to imagine in order to pierce through walls and cause all the planetary Baghdads of his dreams to rise from the dust.</p>
                    </blockquote>
                    <br>
                    <br>
                    <p>
                        We find television very educating. Every time somebody turns on the set, it's going into the other room and read a book.
                        To educate more and more we are on the verge of launching our Television Channel.
                    </p>

                </div>
                <div class="col-sm-4">
                    <img src="/assets/image/tv.png" class="img-responsive img-center" alt="about-us">
                </div>
            </div>
        </div>
    </div>
</div>

@stop



