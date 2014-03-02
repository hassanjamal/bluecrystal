@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
	<!-- Tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
			<!-- <li><a href="#tab-permissions" data-toggle="tab">Permissions</a></li> -->
		</ul>
	<!-- ./ tabs -->

	{{-- Create Role Form --}}
	<form class="form-horizontal" method="post" action="" autocomplete="off">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<!-- ./ csrf token -->

		<!-- Tabs Content -->
		<div class="tab-content">
			<!-- Tab General -->
			<div class="tab-pane active" id="tab-general">
				<!-- Name -->
				<div class="form-group {{{ $errors->has('name') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="name">Name</label>
                    <div class="col-md-10">
    					<input class="form-control" type="text" name="name" id="name" value="{{{ Input::old('name') }}}" />
    					{{{ $errors->first('name', '<span class="help-inline">:message</span>') }}}
                    </div>
				</div>
				<!-- ./ name -->
				
				<!-- checkbox for permission -->
        		<div class="form-group">
        			<label class="col-md-2 control-label" for="name">Permission</label>
        			<div class="col-md-10">
	            		<label class="checkbox-inline">
	                		{{ Form::checkbox('adminPermissions', 1) }} Admin
	            		</label>
	            		<label class="checkbox-inline">
	                		{{ Form::checkbox('userPermissions', 1) }} User
	            		</label>
            		</div>
        		</div>
			</div>
			<!-- ./ tab general -->
		</div>
		<!-- ./ tabs content -->

		<!-- Form Actions -->
		<div class="form-group">
            <div class="col-md-offset-2 col-md-10">
				<element class="btn-cancel close_popup">Cancel</element>
				<button type="reset" class="btn btn-default">Reset</button>
				<button type="submit" class="btn btn-success">Create Role</button>
            </div>
		</div>
		<!-- ./ form actions -->
	</form>
@stop
