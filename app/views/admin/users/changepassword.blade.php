@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
<!-- Tabs -->
	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
	</ul>
<!-- ./ tabs -->

<!-- Tabs Content -->
<div class="tab-content">
	<!-- General tab -->
	<div class="tab-pane active" id="tab-general">
		<form class="form-horizontal" method="post" action="" autocomplete="off" id="form-password">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<!-- ./ csrf token -->
		<!-- Password -->
			<div class="form-group {{{ $errors->has('password') ? 'error' : '' }}}">
				<label class="col-md-2 control-label" for="password">Password</label>
				<div class="col-md-6">
					<input class="form-control" type="password" name="password" id="password" value="" />
				</div>
			</div>
		<!-- ./ password -->

		<!-- Password Confirm -->
			<div class="form-group {{{ $errors->has('password_confirmation') ? 'error' : '' }}}">
				<label class="col-md-2 control-label" for="password_confirmation">Password Confirm</label>
				<div class="col-md-6">
					<input class="form-control" type="password" name="password_confirmation" id="password_confirmation" value="" />
				</div>
			</div>
		<!-- ./ password confirm -->
		<!-- Form Actions -->
		<div class="form-group">
			<div class="col-md-offset-2 col-md-6">
				<button type="submit" class="btn btn-success">Update Password</button>
			</div>
		</div>
		<!-- ./ form actions -->
		</form>
	</div>
	<!-- ./ general tab -->
</div>
<!-- ./ tabs content -->
@stop
@section('scripts')
{{ HTML::script('/app_assets/admin/js/passwordValidator.js') }}
@stop
