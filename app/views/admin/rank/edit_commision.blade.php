@extends('admin.layouts.modal')

<!-- FD Scheme Create / Edit Form -->

{{-- Content --}}
@section('content')
	<!-- Tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab-fd_scheme" data-toggle="tab">FD Scheme</a></li>
			<li ><a href="#tab-rd_scheme" data-toggle="tab">RD Scheme</a></li>
			<li ><a href="#tab-mis_scheme" data-toggle="tab">MIS Scheme</a></li>
		</ul>
	<!-- ./ tabs -->

	{{-- Create User Form --}}
	<form class="form-horizontal" method="post" action="" autocomplete="off">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<!-- ./ csrf token -->

		<!-- Tabs Content -->
		<div class="tab-content">
			<!-- fd_scheme tab -->
			<div class="tab-pane active" id="tab-fd_scheme">
			<!-- Scheme 1 -->
				<div class="form-group {{{ $errors->has('fdfirst') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="fdfirst">1 Year</label>
					<div class="col-md-10">
						<input class="form-control" type="text" name="fdfirst" id="fdfirst" value="{{{ Input::old('fdfirst', isset($rank) ? number_format($fd_commisions->one,2,'.',',') : null) }}}" />
						{{{ $errors->first('fdfirst', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ Scheme 1 -->
				<!-- Scheme 2 -->
				<div class="form-group {{{ $errors->has('fdsecond') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="fdsecond">2 Years</label>
					<div class="col-md-10">
						<input class="form-control" type="text" name="fdsecond" id="fdsecond" value="{{{ Input::old('fdsecond', isset($rank) ? number_format($fd_commisions->two,2,'.',',') : null) }}}" />
						{{{ $errors->first('fdsecond', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ Scheme 2 -->
				<!-- Scheme 3 -->
				<div class="form-group {{{ $errors->has('fdthird') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="fdthird">3 Years</label>
					<div class="col-md-10">
						<input class="form-control" type="text" name="fdthird" id="fdthird" value="{{{ Input::old('fdthird', isset($rank) ? number_format($fd_commisions->three,2,'.',',') : null) }}}" />
						{{{ $errors->first('fdthird', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ Scheme 3 -->
				<!-- Scheme 4 -->
					<div class="form-group {{{ $errors->has('fdfourth') ? 'error' : '' }}}">
						<label class="col-md-2 control-label" for="fdfourth">4 Years</label>
						<div class="col-md-10">
							<input class="form-control" type="text" name="fdfourth" id="fdfourth" value="{{{ Input::old('fdfourth', isset($rank) ? number_format($fd_commisions->four,2,'.',',') : null) }}}" />
							{{{ $errors->first('fdfourth', '<span class="help-inline">:message</span>') }}}
						</div>
					</div>
				<!-- ./ Scheme 4 -->
				<!-- Scheme 5 -->
				<div class="form-group {{{ $errors->has('fdfifth') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="fdfifth">5 Years</label>
					<div class="col-md-10">
						<input class="form-control" type="text" name="fdfifth" id="fdfifth" value="{{{ Input::old('fdfifth', isset($rank) ? number_format($fd_commisions->five,2,'.',',') : null) }}}" />
						{{{ $errors->first('fdfifth', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ Scheme 5 -->
			</div>
			<!-- ./ fd_scheme tab -->

			<!-- rd_scheme tab -->
			<div class="tab-pane" id="tab-rd_scheme">

				<!-- Scheme 1 -->
				<div class="form-group {{{ $errors->has('rdfirst') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="rdfirst">1 Year</label>
					<div class="col-md-10">
						<input class="form-control" type="text" name="rdfirst" id="rdfirst" value="{{{ Input::old('rdfirst', isset($rank) ? number_format($rd_commisions->one,2,'.',',') : null) }}}" />
						{{{ $errors->first('rdfirst', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ Scheme 1 -->
				<!-- Scheme 2 -->
				<div class="form-group {{{ $errors->has('rdsecond') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="rdsecond">2 Years</label>
					<div class="col-md-10">
						<input class="form-control" type="text" name="rdsecond" id="rdsecond" value="{{{ Input::old('rdsecond', isset($rank) ? number_format($rd_commisions->two,2,'.',',') : null) }}}" />
						{{{ $errors->first('rdsecond', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ Scheme 2 -->
				<!-- Scheme 3 -->
				<div class="form-group {{{ $errors->has('rdthird') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="rdthird">3 Years</label>
					<div class="col-md-10">
						<input class="form-control" type="text" name="rdthird" id="rdthird" value="{{{ Input::old('rdthird', isset($rank) ? number_format($rd_commisions->three,2,'.',',') : null) }}}" />
						{{{ $errors->first('rdthird', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ Scheme 3 -->
				<!-- Scheme 4 -->
				<!-- <div class="form-group {{{ $errors->has('rdfourth') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="rdfourth">4 Years</label>
					<div class="col-md-10">
						<input class="form-control" type="text" name="rdfourth" id="rdfourth" value="{{{ Input::old('rdfourth', isset($rank) ? number_format($rd_commisions->four,2,'.',',') : null) }}}" />
						{{{ $errors->first('rdfourth', '<span class="help-inline">:message</span>') }}}
					</div>
				</div> -->
				<!-- ./ Scheme 4 -->
				<!-- Scheme 5 -->
				<!-- <div class="form-group {{{ $errors->has('rdfifth') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="rdfifth">5 Years</label>
					<div class="col-md-10">
						<input class="form-control" type="text" name="rdfifth" id="rdfifth" value="{{{ Input::old('rdfifth', isset($rank) ? number_format($rd_commisions->five,2,'.',',') : null) }}}" />
						{{{ $errors->first('rdfifth', '<span class="help-inline">:message</span>') }}}
					</div>
				</div> -->
				<!-- ./ Scheme 5 -->
			</div>
			<!-- ./ rd_scheme tab -->

		<div class="tab-pane " id="tab-mis_scheme">
			<!-- Scheme 1 -->
				<div class="form-group {{{ $errors->has('misfirst') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="misfirst">1 Year</label>
					<div class="col-md-10">
						<input class="form-control" type="text" name="misfirst" id="misfirst" value="" />
					</div>
				</div>
				<!-- ./ Scheme 1 -->
				<!-- Scheme 2 -->
				<div class="form-group {{{ $errors->has('missecond') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="missecond">2 Years</label>
					<div class="col-md-10">
						<input class="form-control" type="text" name="missecond" id="missecond" value="" />
					</div>
				</div>
				<!-- ./ Scheme 2 -->
				<!-- Scheme 3 -->
				<div class="form-group {{{ $errors->has('misthird') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="misthird">3 Years</label>
					<div class="col-md-10">
						<input class="form-control" type="text" name="misthird" id="misthird" value="" />
					</div>
				</div>
				<!-- ./ Scheme 3 -->
				<!-- Scheme 4 -->
					<div class="form-group {{{ $errors->has('misfourth') ? 'error' : '' }}}">
						<label class="col-md-2 control-label" for="misfourth">4 Years</label>
						<div class="col-md-10">
							<input class="form-control" type="text" name="misfourth" id="misfourth" value="" />
						</div>
					</div>
				<!-- ./ Scheme 4 -->
				<!-- Scheme 5 -->
				<div class="form-group {{{ $errors->has('misfifth') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="misfifth">5 Years</label>
					<div class="col-md-10">
						<input class="form-control" type="text" name="misfifth" id="misfifth" value="" />
					</div>
				</div>

				<div class="form-group {{{ $errors->has('missixth') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="missixth">6 Years</label>
					<div class="col-md-10">
						<input class="form-control" type="text" name="missixth" id="fdfifth" value="" />
					</div>
				</div>
				<!-- ./ Scheme 5 -->
			</div>	

		</div>
		<!-- ./ tabs content -->

		<!-- Form Actions -->
		@if(Sentry::getUser()->isSuperUser())
		<div class="form-group">
			<div class="col-md-offset-2 col-md-10">
				<element class="btn btn-danger close_popup">Cancel</element>
				<button type="reset" class="btn btn-info">Reset</button>
				<button type="submit" class="btn btn-success">OK</button>
			</div>
		</div>
		@else
		<div class="form-group">
			<div class="col-md-offset-2 col-md-10">
				<element class="btn-cancel close_popup">Close</element>
			</div>
		</div>
		@endif
		<!-- ./ form actions -->
	</form>
@stop
