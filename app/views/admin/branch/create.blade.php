@extends('admin.layouts.modal')

<!-- FD Scheme Create / Edit Form -->

{{-- Content --}}
@section('content')
	<!-- Tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
			<li><a href="#tab-manager" data-toggle="tab">Manager</a></li>
		</ul>
	<!-- ./ tabs -->

	{{-- Create User Form --}}
	<form class="form-horizontal" method="post" action="@if (isset($branch)){{ URL::to('admin/branch/' . $branch->id . '/edit') }}@endif" autocomplete="off">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<!-- ./ csrf token -->

		<!-- Tabs Content -->
		<div class="tab-content">
			<!-- General tab -->
			<div class="tab-pane active" id="tab-general">
				<!-- Branch -->
				<div class="form-group {{{ $errors->has('name') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="name">Branch Name</label>
					<div class="col-md-10">
						<input class="form-control" type="text" name="name" id="name" value="{{{ Input::old('name', isset($branch) ? $branch->name : null) }}}" />
						{{{ $errors->first('name', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ Branch -->

				<!-- Address -->
				<div class="form-group {{{ $errors->has('address') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="address">Address</label>
					<div class="col-md-10">
						<input class="form-control" type="text" name="address" id="address" value="{{{ Input::old('address', isset($branch) ? $branch->address : null) }}}" />
						{{{ $errors->first('address', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ Address -->
				
				<!-- City -->
				<div class="form-group {{{ $errors->has('city') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="city">City</label>
					<div class="col-md-10">
						<input class="form-control" type="text" name="city" id="city" value="{{{ Input::old('city', isset($branch) ? $branch->city : null) }}}" />
						{{{ $errors->first('city', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ City -->
				
				<!-- State -->
				<div class="form-group {{{ $errors->has('state') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="state">State</label>
					<div class="col-md-10">
						<input class="form-control" type="text" name="state" id="state" value="{{{ Input::old('state', isset($branch) ? $branch->state : null) }}}" />
						{{{ $errors->first('state', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ State -->
				
				<!-- Pincode -->
				<div class="form-group {{{ $errors->has('pincode') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="pincode">Pincode</label>
					<div class="col-md-10">
						<input class="form-control" type="text" name="pincode" id="pincode" value="{{{ Input::old('pincode', isset($branch) ? $branch->pincode : null) }}}" />
						{{{ $errors->first('pincode', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ Pincode -->

				<!-- Phone -->
				<div class="form-group {{{ $errors->has('phone') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="phone">Phone</label>
					<div class="col-md-10">
						<input class="form-control" type="text" name="phone" id="phone" value="{{{ Input::old('phone', isset($branch) ? $branch->phone : null) }}}" />
						{{{ $errors->first('phone', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ Phone -->
				
			</div>
			<!-- ./ general tab -->
		
			<!-- Manager tab -->
			<div class="tab-pane" id="tab-manager">
				<!-- Manager Name -->
				<div class="form-group {{{ $errors->has('managername') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="managername">Manager Name</label>
					<div class="col-md-10">
						<input class="form-control" type="text" name="managername" id="managername" value="{{{ Input::old('managername', isset($branch) ? $branch->managername : null) }}}" />
						{{{ $errors->first('managername', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ Manager Name -->
								
				<!-- Manager Phone -->
				<div class="form-group {{{ $errors->has('managerphone') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="managerphone">Manager Phone</label>
					<div class="col-md-10">
						<input class="form-control" type="text" name="managerphone" id="managerphone" value="{{{ Input::old('managerphone', isset($branch) ? $branch->managerphone : null) }}}" />
						{{{ $errors->first('managerphone', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ Manager Phone -->
				

				<!-- Email -->
				<div class="form-group {{{ $errors->has('email') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="email">Email</label>
					<div class="col-md-10">
						<input class="form-control" type="text" name="email" id="email" value="{{{ Input::old('email', isset($branch) ? $branch->email : null) }}}" />
						{{{ $errors->first('email', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
			</div>
			<!-- ./Manager tab -->

		</div>
		<!-- ./ tabs content -->
		
		<!-- Form Actions -->
		<div class="form-group">
			<div class="col-md-offset-2 col-md-10">
				<element class="btn-cancel btn-warning close_popup">Cancel</element>
				<button type="submit" class="btn btn-success">OK</button>
			</div>
		</div>
		<!-- ./ form actions -->
	</form>
@stop
