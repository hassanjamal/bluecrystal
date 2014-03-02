@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
	<!-- Tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
		</ul>
	<!-- ./ tabs -->

	{{-- Create User Form --}}
	<form class="form-horizontal" method="post" action="@if (isset($user)){{ URL::to('admin/users/' . $user->id . '/edit') }}@endif" autocomplete="off">
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

				<!-- branch_id -->
				<div class="form-group {{{ $errors->has('branch_id') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="branch_id">Branch ID</label>
					<div class="col-md-10">
						<input readonly class="form-control" type="text" name="branch_id" id="branch_id" value="{{{ $branch_id }}}" />
						<span class="help-block">
							{{'You are only authorized for branch '. $branch_name->name . ' ( located at '. $branch_name->address .' )' }}
						</span>
					</div>
				</div>
				<!-- ./ branch_id -->

				<!-- Email -->
				<div class="form-group {{{ $errors->has('email') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="email">Email</label>
					<div class="col-md-10">
						<input class="form-control" type="text" name="email" id="email" value="{{{ Input::old('email', isset($user) ? $user->email : null) }}}" />
						{{{ $errors->first('email', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ email -->

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
				@if($mode != 'create')

					<!-- Activation Status -->
					<div class="form-group {{{ $errors->has('activated') || $errors->has('confirm') ? 'error' : '' }}}">
						<label class="col-md-2 control-label" for="confirm">Activate User?</label>
						<div class="col-md-6">
								<select class="form-control" name="confirm" id="confirm">
									<option value="1"{{{ (Input::old('confirm', 0) === 1 ? ' selected="selected"' : '') }}}>Yes</option>
									<option value="0"{{{ (Input::old('confirm', 0) === 0 ? ' selected="selected"' : '') }}}>No</option>
								</select>
							{{{ $errors->first('confirm', '<span class="help-inline">:message</span>') }}}
						</div>
					</div>
					
					<!-- ./ activation status -->

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

				@endif <!-- end of if mode = create condition -->

			</div>
			<!-- ./ general tab -->

		</div>
		<!-- ./ tabs content -->

		<!-- Form Actions -->
		<div class="form-group">
			<div class="col-md-offset-2 col-md-10">
				<element class="btn-cancel close_popup">Cancel</element>
				<button type="reset" class="btn btn-default">Reset</button>
				<button type="submit" class="btn btn-success">OK</button>
			</div>
		</div>
		<!-- ./ form actions -->
	</form>
@stop