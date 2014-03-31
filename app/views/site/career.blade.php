@extends('site.layouts.master-another')
@section('mainhead')
@parent
{{ HTML::style('css/compiled/career.css') }}
{{ HTML::style('css/lib/animate.css') }}
{{ HTML::style('/css/compiled/bootstrapValidator.min.css') }}
@stop
@section('container')
<div id="career"> 
    <div class="container">
        <div class="section_header">
            <h3>Career With Blue Crystal</h3>
        </div>
        <div class="row">
            <div class="tab-content col-md-9">
                <div class="tab-pane active" id="tab_a">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title">WE WELCOME YOU TO BE OUR PART</h2>
                        </div>
                        <div class="panel-body">

                            <blockquote><h4>Career @ BLUE CRYSTAL</h4></blockquote>
                            <br>
                            If you love to meet new people and believe in maintaining warm and long standing relationship, if you are sincere and ready to accept challenges, believe in hard work, then you are welcome to the world of opportunities to earn handsome income without any tensions and build up your career as a financial consultant with BLUE CRYSTAL.
                            <br>
                            <br>
                            <blockquote><h4>Who is a Consultant?</h4></blockquote>
                            <br>
                            A Consultant is a facilitator who helps the People to understand the different products & plans of the organization. He judges the requirement & interest of people as per their requirements and offer which fits in their life. An Consultant is the financial backbone of the organization. He represents BLUE CRYSTAL to the people. In such way he works like a bridge between both.
                            <br>
                            <br>
                            <blockquote><h4>Who can be a Consultant?</h4></blockquote>
                            <br>
                            <ol>
                                <li> A Person who have Indian Nationality.</li>
                                <li> Age of the Person should be 18 or above.</li>
                                <li> He/She should not be enrolled with any other credit society.</li>
                                <li> Person should not have any criminal record.</li>
                                <li> He/She should be able to accept challenges.</li>
                            </ol>
                            <br>
                            <br>
                            <blockquote><h4>Benefits to the Consultant?</h4></blockquote>
                            <br>
                            Following are the benefits provided to the Consultants by BLUE CRYSTAL.
                            <br>
                            <ol>
                                <li> BLUE CRYSTAL provides an opportunity to grab rich incentives to the Consultants.</li>
                                <li> Everyone desires continuous growth in his career. Our society offers a Chance to uplift not only professional life but to develop the personality as an individual also.</li>
                                <li> As an Extra benefit Society award the Consultants with the good interest on their deposits amount.</li>
                                <li> BLUE CRYSTAL runs a Regular Training Program for Consultants to enhance their skills.</li>
                                <li> Management act as mentors for the Consultants and provide its complete support and guidance to the Consultants whenever required.</li>
                                <li> BLUE CRYSTAL offers a special Overseas Training Program cum Fun trip meanwhile one can enjoy leisure time.</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab_b">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title">WRITE US </h2>
                        </div>
                        <div class="panel-body">
                            <div class="" id="contact_form">
                                <!-- form start here -->
                                <form id="ajax-contact-form" role="form" method="post" action="" autocomplete="off" >
                                    <div class="form-group">
                                        <label class="form_info" for="name">NAME * </label>
                                        <input class="form-control" type="text" name="name" id="name" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form_info" for="phone_number">PHONE NUMBER * </label>
                                        <input class="form-control" type="text" name="phone_number" id="phone_number" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form_info" for="email">EMAIL * </label>
                                        <input class="form-control" type="text" name="email" id="email" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form_info" for="message">MESSAGE * </label>
                                        <textarea class="form-control" name="message" id="message"></textarea>
                                    </div>
                                    <!-- <div class"clear"></div> -->
                                    <button type="submit" class="btn  btn-large btn-primary " value="Send Message">Send Message</button>
                                    <button type="reset" class="btn   btn-large btn-danger" value="Reset Form" id="resetBtn">Reset Form</button>
                                </form>
                                <!-- form ends here -->
                            </div>


                        </div>

                    </div>
                </div>
            </div>
            <ul class="nav nav-pills nav-stacked col-md-3">
                <li class="active"><a href="#tab_a" data-toggle="pill">CAREER WITH BLUE CRYSTAL</a></li>
                <li><a href="#tab_b" data-toggle="pill">APPLY NOW</a></li>
            </ul>
        </div>
    </div>
</div>

@stop
@section('script')
{{ HTML::script('/js/bootstrapValidator.min.js') }}
{{ HTML::script('/js/my_custom_validate.js') }}
@stop
