@extends('site.layouts.master')
@section('container')
<div class="row well">
	<p class="lead">Reset Your Password</p>
</div>
<div class="row">
	
	<div class="col-lg-6  well ">
		{{ Form::open(array( 'url'=>'/' , 'method'=>'POST' , 'class'=>'form-horizontal' , 'role'=>'form' )) }}
		<div class="form-group">
			{{Form::label('phone', '*Phone :' , array('class'=>'col-lg-4 control-label'))}}
			<div class="col-lg-6">
				{{ Form::text('phone', '' , array( 'placeholder'=>'Your Phone Number' , 'class'=>'form-control' ) ) }}
			</div>
		</div>
		<div class="form-group">
			{{Form::label('email', '*Email :' , array('class'=>'col-lg-4 control-label'))}}
			<div class="col-lg-6">
				{{ Form::text('email', '' , array( 'placeholder'=>'Your Email Address' , 'class'=>'form-control' ) ) }}
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-lg-offset-4 col-lg-6">
				{{ Form::submit('Reset Password' , array( 'class'=>'btn  btn-primary ' ) ) }}
			</div>
		</div>
	</div>

</div>
@stop
