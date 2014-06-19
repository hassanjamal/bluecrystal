@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
	<!-- Tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
		</ul>
	<!-- ./ tabs -->

	{{-- Create User Form --}}
	<form class="form-horizontal" method="post" action="@if (isset($user)){{ URL::to('admin/users/' . $user->id . '/edit') }}@endif" autocomplete="off" id="form-user">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<!-- ./ csrf token -->

		<!-- Tabs Content -->
		<div class="tab-content">
			<!-- General tab -->
			<div class="tab-pane active" id="tab-general">
				<!-- first_name -->
				<div class="form-group {{{ $errors->has('first_name') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="first_name">First Name</label>
					<div class="col-md-6">
						<input class="form-control" type="text" name="first_name" id="first_name" value="{{{ Input::old('first_name', isset($user) ? $user->first_name : null) }}}" />
						{{{ $errors->first('first_name', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ first_name -->

				<!-- last_name -->
				<div class="form-group {{{ $errors->has('last_name') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="last_name">Last Name</label>
					<div class="col-md-6">
						<input class="form-control" type="text" name="last_name" id="last_name" value="{{{ Input::old('last_name', isset($user) ? $user->last_name : null) }}}" />
						{{{ $errors->first('last_name', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ last_name -->

				<!-- branch_id -->
                <div class="form-group">
                    <label class="col-md-2 control-label" for="branch_id">Branch :</label>
                    <div class="col-md-6">
                        {{ Form::select('branch_id',$branch ,isset($user) ? $user->branch_id : null, array('class'=>'form-control ' ,'id' =>'branch_id'))}} 
                    </div>
                </div>
				<!-- ./ branch_id -->

                <div class="form-group">
                    <label class="col-md-2 control-label" for="group_name">Branch :</label>
                    <div class="col-md-6">
                        {{ Form::select('group_name',$groups ,'', array('class'=>'form-control ' ,'id' =>'group_name'))}} 
                    </div>
                </div>

				<!-- Email -->
				<div class="form-group {{{ $errors->has('email') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="email">Email</label>
					<div class="col-md-6">
                        @if('mode'==='create')
						<input class="form-control" type="text" name="email" id="email" value="{{{ Input::old('email', isset($user) ? $user->email : null) }}}" />
                        @else
						<input readonly class="form-control" type="text" name="email" id="email" value="{{{ Input::old('email', isset($user) ? $user->email : null) }}}" />
                        @endif
						{{{ $errors->first('email', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ email -->

                @if('mode'==='create')
				<!-- Password -->
				<div class="form-group {{{ $errors->has('password') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="password">Password</label>
					<div class="col-md-6">
						<input class="form-control" type="password" name="password" id="password" value="" />
						{{{ $errors->first('password', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ password -->

				<!-- Password Confirm -->
				<div class="form-group {{{ $errors->has('password_confirmation') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="password_confirmation">Password Confirm</label>
					<div class="col-md-6">
						<input class="form-control" type="password" name="password_confirmation" id="password_confirmation" value="" />
						{{{ $errors->first('password_confirmation', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
                @endif
				<!-- ./ password confirm -->

			</div>
			<!-- ./ general tab -->

		</div>
		<!-- ./ tabs content -->

		<!-- Form Actions -->
		<div class="form-group">
			<div class="col-md-offset-2 col-md-6">
				<element class="btn btn-warning  close_popup">Cancel</element>
				<button type="submit" class="btn btn-success">OK</button>
			</div>
		</div>
		<!-- ./ form actions -->
	</form>
@stop
@section('scripts')
@if('mode'==='create')
{{ HTML::script('/app_assets/admin/js/userValidator.js') }}
@endif
@stop
