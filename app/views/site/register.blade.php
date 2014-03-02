@extends('site.layouts.master')
@section('mainhead')
@parent
{{HTML::style('css/compiled/sign-up.css')}}
{{HTML::style('css/lib/animate.css')}}
@stop
@if ($errors->any())
<div class="alert alert-error">
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Errors</strong>
		{{implode('', $errors->all('<li class="error">:message</li>'))}}
	</div>
</div>
@endif

@section('container')

<div id="sign_up2">
	<div class="container">
		<div class="section_header lead">
			<h2> Register With US </h2>
		</div>
		<div class="row login">
			<div class="col-sm-5 left_box">
				<h4>Create your account</h4>

				<div class="perk_box">
					<div class="perk">
						<span class="icos ico1"></span>
						<p><strong>Strong Team</strong> </p>
					</div>
					<div class="perk">
						<span class="icos ico2"></span>
						<p><strong>Personalization</strong> </p>
					</div>
					<div class="perk">
						<span class="icos ico3"></span>
						<p><strong>Configuration</strong> </p>
					</div>
				</div>
			</div>

			<div class="col-sm-6 signin_box">
				<div class="box">
					<div class="box_cont">
						<div class="social">
							<a href="" class="circle facebook">
								<img src="img/face.png" alt="">
							</a>
							<a href="" class="circle twitter">
								<img src="img/twt.png" alt="">
							</a>
							<a href="" class="circle gplus">
								<img src="img/gplus.png" alt="">
							</a>
						</div>

						<div class="division">
							<div class="line l"></div>
							<span>or</span>
							<div class="line r"></div>
						</div>

						<div class="form">
							{{ Form::open(array( 'url'=>'register' , 'method'=>'POST', 'role'=>'form' )) }}	

							{{ Form::email('email', Input::old('email') , array( 'placeholder'=>'Email' , 'class'=>'form-control' ) ) }}

							{{ Form::password('password', array( 'placeholder'=>'Your Password' , 'class'=>'form-control' ) ) }}

							{{ Form::password('password_confirmation', array( 'placeholder'=>'Confirm Password' , 'class'=>'form-control' ) ) }}

							<div class="forgot">
								<span>Already have an account?</span>
								{{HTML::link('login' , 'Sign In')}}
								<hr>
								{{Form::checkbox('agree_to_terms', 'value', 'true')}}

								{{form::label('','Agree to the')}} {{HTML::link('termofuse','Terms Of Use')}} 
                                and {{HTML::link('privacypolicy','Privacy Policy')}}

							</div>
							{{ Form::submit('Register ' , array( 'class'=>'btn  btn-success' ) ) }}

							{{ Form::close() }}
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>  
@stop
