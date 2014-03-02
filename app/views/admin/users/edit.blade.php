@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
<!-- Tabs -->
	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
		<li><a href="#tab-permissions" data-toggle="tab">Permissions</a></li>
	</ul>
<!-- ./ tabs -->

<!-- Tabs Content -->
<div class="tab-content">
	<!-- General tab -->
	<div class="tab-pane active" id="tab-general">
		<form class="form-horizontal" method="post" action="" autocomplete="off">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<!-- ./ csrf token -->
		<!-- first_name -->
			<div class="form-group {{{ $errors->has('first_name') ? 'error' : '' }}}">
				<label class="col-md-2 control-label" for="first_name">First Name</label>
				<div class="col-md-10">
					<input class="form-control" type="text" name="first_name" id="first_name" value="{{{ Input::old('first_name', isset($user) ? $user->first_name : null) }}}" />
					{{{ $errors->first('first_name', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
		<!-- ./ first_name -->

		<!-- last_name -->
			<div class="form-group {{{ $errors->has('last_name') ? 'error' : '' }}}">
				<label class="col-md-2 control-label" for="last_name">Last Name</label>
				<div class="col-md-10">
					<input class="form-control" type="text" name="last_name" id="last_name" value="{{{ Input::old('last_name', isset($user) ? $user->last_name : null) }}}" />
					{{{ $errors->first('last_name', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
		<!-- ./ last_name -->
		<!-- Groups -->
			<div class="form-group {{{ $errors->has('groups') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="groups">groups</label>
                <div class="col-md-6">
	                <select class="form-control" name="groups" id="groups">
	                        @foreach ($groups as $group)
	                        <option value="{{{ $group->id }}}">{{{ $group->name }}}</option>
	                        @endforeach
					</select>

					<span class="help-block">
						Select a group to assign to the user, remember that a user takes on the permissions of the group they are assigned.
					</span>
            	</div>
			</div>
		<!-- ./ groups -->
		<!-- Form Actions -->
		<div class="form-group">
			<div class="col-md-offset-2 col-md-10">
				<element class="btn-cancel close_popup">Cancel</element>
				<button type="reset" class="btn btn-default">Reset</button>
				<button type="submit" class="btn btn-success">Update User</button>
			</div>
		</div>
		<!-- ./ form actions -->
		</form>
	</div>
	<!-- ./ general tab -->

	<!-- Permissions tab -->
	<div class="tab-pane" id="tab-permissions">
		<form class="form-horizontal" method="post" action="" autocomplete="off">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<!-- Password -->
			<div class="form-group {{{ $errors->has('password') ? 'error' : '' }}}">
				<label class="col-md-2 control-label" for="password">Password</label>
				<div class="col-md-10">
					<input class="form-control" type="password" name="password" id="password" value="" />
					{{{ $errors->first('password', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
		<!-- ./ password -->

		<!-- Password Confirm -->
			<div class="form-group {{{ $errors->has('password_confirmation') ? 'error' : '' }}}">
				<label class="col-md-2 control-label" for="password_confirmation">Password Confirm</label>
				<div class="col-md-10">
					<input class="form-control" type="password" name="password_confirmation" id="password_confirmation" value="" />
					{{{ $errors->first('password_confirmation', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
		<!-- ./ password confirm -->
		<!-- Form Actions -->
			<div class="form-group">
				<div class="col-md-offset-2 col-md-10">
					<element class="btn-cancel close_popup">Cancel</element>
					<button type="reset" class="btn btn-default">Reset</button>
					<button type="submit" class="btn btn-success">Change Password</button>
				</div>
			</div>
		<!-- ./ form actions -->
		</form>
	</div>
	<!-- ./ permissions tab -->
</div>
<!-- ./ tabs content -->
@stop
