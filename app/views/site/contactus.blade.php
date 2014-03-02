@extends ('site.layouts.master')
@section('mainhead')
	@parent
{{HTML::style('css/compiled/contact.css')}}
{{HTML::style('css/lib/animate.css')}}
@stop
@section('container')
<div id="contact">
        <div class="container">
            <div class="section_header">
                <h3>Get in touch</h3>
            </div>
            <div class="row contact">
                <p>
                     Fill out the form below with some info about your project and We will get back to you as soon as we can. </p>
                <form>
                    <div class="row form">
                        <div class="col-sm-6 row-col">
                            <div class="box">
                                <input class="name form-control" type="text" placeholder="Name">
                                <input class="mail form-control" type="text" placeholder="Email">
                                <input class="phone form-control" type="text" placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="box">
                                <textarea placeholder="Type a message here..." class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row submit">
                        <div class="col-md-3 right">
                            <input type="submit" value="Send your message">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="map">
            <div class="container">
                <div class="box_wrapp">
                    <div class="box_cont">
                        <div class="head">
                            <h6>Contact</h6>
                        </div>
                        <ul class="street">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li class="icon icontop">
                                <span class="contacticos ico1"></span>
                                <span class="text"></span>
                            </li>
                            <li class="icon icontop">
                                <span class="contacticos ico1"></span>
                                <span class="text"></span>
                            </li>
                            <li class="icon">
                                <span class="contacticos ico2"></span>
                                <a class="text" href=""></a>
                            </li>
                        </ul>

                        <div class="head headbottom">
                            <h6>Work with us</h6>
                        </div>
                        <p></p>
                    </div>
                </div>
            </div>
            
            <iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.mx/?ie=UTF8&ll=25.6113314,85.1382655&spn=0.045157,0.15398&t=m&z=17&output=embed"></iframe>
        </div>
    </div>
@stop
