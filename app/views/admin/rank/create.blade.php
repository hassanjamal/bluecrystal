@extends('admin.layouts.modal')

<!-- FD Scheme Create / Edit Form -->

{{-- Content --}}
@section('content')
	<!-- Tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
		</ul>
	<!-- ./ tabs -->

	{{-- Create User Form --}}
	<form class="form-horizontal" method="post" action="@if (isset($rank)){{ URL::to('admin/rank/' . $rank->id . '/edit') }}@endif" autocomplete="off">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<!-- ./ csrf token -->

		<!-- Tabs Content -->
		<div class="tab-content">
			<!-- General tab -->
			<div class="tab-pane active" id="tab-general">
				
				<!-- Designation -->
				<div class="form-group {{{ $errors->has('rankname') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="rankname">Designation</label>
					<div class="col-md-10">
						<input class="form-control" type="text" name="rankname" id="rankname" value="{{{ Input::old('rankname', isset($rank) ? $rank->rankname : null) }}}" />
						{{{ $errors->first('rankname', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ Designation -->
			
			</div>
			<!-- ./ general tab -->

		</div>
		<!-- ./ tabs content -->

		<!-- Form Actions -->
		<div class="form-group">
			<div class="col-md-offset-2 col-md-10">
				<element class="btn btn-danger close_popup">Cancel</element>
				<button type="reset" class="btn btn-info">Reset</button>
				<button type="submit" class="btn btn-success">OK</button>
			</div>
		</div>
		<!-- ./ form actions -->
	</form>
@stop
