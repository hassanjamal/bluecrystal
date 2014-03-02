@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
<!-- Tabs -->
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-official" data-toggle="tab">Policy Details </a></li>
	<li><a href="#tab-general" data-toggle="tab">Personal Details</a></li>
	<li><a href="#tab-nominee" data-toggle="tab">Nominee Details </a></li>
</ul>
<!-- ./ tabs -->

{{-- Create User Form --}}
<form class="form-horizontal" method="post" action="" autocomplete="off">
<!-- CSRF Token -->
<input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
<!-- ./ csrf token -->

<!-- Tabs Content -->
<div class="tab-content">

<!-- Official Detail -->

<div class="tab-pane active" id="tab-official">

{{Form::hidden('to_associate_id', Input::old('to_associate_id'),array('id'=>'to_associate_id'))}}
{{Form::hidden('to_scheme_id', Input::old('to_scheme_id'),array('id'=>'to_scheme_id'))}}
{{Form::hidden('to_scheme_interest', Input::old('to_scheme_interest'),array('id'=>'to_scheme_interest'))}}
{{Form::hidden('to_scheme_description', Input::old('to_scheme_description'),array('id'=>'to_scheme_description'))}}
{{Form::hidden('to_scheme_years', Input::old('to_scheme_years'),array('id'=>'to_scheme_years'))}}
<div class="row well">
	<blockquote>
		<p class="lead">Official Details For New Policy</p>
	</blockquote>
	<!-- branch_id -->
	<div class="col-md-6">
		<div class="form-group {{{ $errors->has('branch_id') ? 'error' : '' }}}">
			<label class="col-md-4 control-label" for="branch_id">Branch :</label>

			<div class="col-md-8">
				<input readonly class="form-control" type="text" name="branch_id" id="branch_id"
						 value="{{{ Input::old('branch_id', isset($policy) ? $policy->branch_id : $branch_id) }}}"/>
				{{{ $errors->first('branch_id', '<span class="help-inline">:message</span>') }}}
			</div>
		</div>
	</div>
	<!-- ./ branch_id -->

	<!-- associate_no -->
	<div class="col-md-6">
		<div class="form-group {{{ $errors->has('associate_no') ? 'error' : '' }}}">
			<label class="col-md-4 control-label" for="associate_no">Associate :</label>

			<div class="col-md-8">

				<input class="form-control" type="text" name="associate_no" id="associate_no"
						 value="{{{ Input::old('associate_no', isset($policy) ? $policy->associate_no : null) }}}"/>
				{{{ $errors->first('associate_no', '<span class="help-inline">:message</span>') }}}
			</div>
		</div>
	</div>
	<!-- ./ associate_no -->

	<!-- scheme_type -->
	<div class="col-md-6">
		<div class="form-group {{{ $errors->has('scheme_type') ? 'error' : '' }}}">
			<label class="col-md-4 control-label" for="scheme_type">Scheme Type :</label>

			<div class="col-md-8">
				{{Form::select('scheme_type',array(
				'FD' => 'Fixed Deposit',
				'RD' => 'Recurring Deposit',
				'MIS'=>'Monthly Installment'
				) ,isset($policy) ? $policy->scheme_type : null, array('class'=>'form-control ' , 'id' =>'scheme_type'))}}
			</div>
		</div>
	</div>
	<!-- ./ scheme_type -->


	<!-- scheme_name -->
	<div class="col-md-6">
		<div class="form-group {{{ $errors->has('scheme_name') ? 'error' : '' }}}">
			<label class="col-md-4 control-label" for="scheme_name">Scheme Name :</label>

			<div class="col-md-8">

				<input class="form-control" type="text" name="scheme_name" id="scheme_name"
						 value="{{{ Input::old('scheme_name', isset($policy) ? $policy->scheme_name : null) }}}"/>
				{{{ $errors->first('scheme_name', '<span class="help-inline">:message</span>') }}}
			</div>
		</div>
	</div>
</div>


<!-- ./ scheme_id -->
<div class="row">
	<div class="col-md-12" id="fd_scheme_details_block">
		<div class="well form-group">
			<blockquote>
				<p class="lead">Fixed Deposit Plan </p>
			</blockquote>
			<!-- scheme amount -->
			<div class="col-md-6" id="fd_scheme_amount_block">
				<div class="form-group {{{ $errors->has('fd_scheme_amount') ? 'error' : '' }}}">
					<label class="col-md-4 control-label" for="fd_scheme_amount">Scheme Amount :</label>

					<div class="col-md-8">
						<input class="form-control" type="text" name="fd_scheme_amount" id="fd_scheme_amount"
								 value="{{{ Input::old('fd_scheme_amount', isset($policy) ? $policy->fd_scheme_amount : null) }}}"/>
						{{{ $errors->first('fd_scheme_amount', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
			</div>
			<!-- ./scheme amount -->

			<!-- Maturity amount -->
			<div class="col-md-6" id="fd_maturity_amount_block">
				<div class="form-group {{{ $errors->has('fd_maturity_amount') ? 'error' : '' }}}">
					<label class="col-md-4 control-label" for="fd_maturity_amount">Maturity Amount :</label>

					<div class="col-md-8">
						<input readonly class="form-control" type="text" name="fd_maturity_amount" id="fd_maturity_amount"
								 value=""/>
						{{{ $errors->first('fd_maturity_amount', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
			</div>
			<!-- ./Maturity amount -->
		</div>
	</div>

	<div class="col-md-12" id="rd_scheme_details_block">
		<div class="well form-group">
			<blockquote>
				<p class="lead">Recurring Deposit Plan</p>
			</blockquote>
			<!-- scheme amount -->
			<div class="col-md-6" id="rd_scheme_amount_block">
				<div class="form-group {{{ $errors->has('rd_scheme_amount') ? 'error' : '' }}}">
					<label class="col-md-4 control-label" for="rd_scheme_amount">Scheme Amount :</label>

					<div class="col-md-8">
						<input class="form-control" type="text" name="rd_scheme_amount" id="rd_scheme_amount"
								 value="{{{ Input::old('rd_scheme_amount', isset($policy) ? $policy->rd_scheme_amount : null) }}}"/>
						{{{ $errors->first('rd_scheme_amount', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
			</div>
			<!-- ./scheme amount -->

			<!-- Maturity amount -->
			<div class="col-md-6" id="rd_maturity_amount_block">
				<div class="form-group {{{ $errors->has('rd_maturity_amount') ? 'error' : '' }}}">
					<label class="col-md-4 control-label" for="rd_maturity_amount">Maturity Amount :</label>

					<div class="col-md-8">
						<input readonly class="form-control" type="text" name="rd_maturity_amount" id="rd_maturity_amount"
								 value=""/>
						{{{ $errors->first('rd_maturity_amount', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
			</div>
			<!-- ./Maturity amount -->

			<!-- No Of Installment -->
			<div class="col-md-6" id="rd_total_installment_block">
				<div class="form-group {{{ $errors->has('rd_total_installment') ? 'error' : '' }}}">
					<label class="col-md-4 control-label" for="rd_total_installment">Total Installment :</label>

					<div class="col-md-8">
						<input readonly class="form-control" type="text" name="rd_total_installment" id="rd_total_installment"
								 value=""/>
						{{{ $errors->first('rd_total_installment', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
			</div>
			<!-- ./No Of Installment -->
		</div>
	</div>


	<div class="col-md-12" id="mis_scheme_details_block">
		<div class="well form-group">
			<blockquote>
				<p class="lead">MIS PLAN Coming soon</p>
			</blockquote>
		</div>
	</div>
</div>

<div class="row well" id="payment_block">
	<blockquote>
		<p class="lead">Payment Details </p>
	</blockquote>
	<!-- payment_mode -->
	<div class="col-md-6">
		<div class="form-group {{{ $errors->has('payment_mode') ? 'error' : '' }}}">
			<label class="col-md-4 control-label" for="payment_mode">Mode :</label>

			<div class="col-md-8">
				{{Form::select('payment_mode',array(
				'cash' => 'Cash',
				'cheque' => 'Cheque',
				'dd' => 'DD',
				) ,isset($policy) ? $policy->payment_mode : 'cash', array('class'=>'form-control ', 'id' =>
				'payment_mode'))}}
				{{{ $errors->first('payment_mode', '<span class="help-inline">:message</span>') }}}
			</div>
		</div>
	</div>
	<!-- ./ payment_mode -->

	<!-- drawee_bank -->
	<div class="col-md-6" id="drawee_bank_block">
		<div class="form-group {{{ $errors->has('drawee_bank') ? 'error' : '' }}}">
			<label class="col-md-4 control-label" for="drawee_bank">Drawee Bank :</label>

			<div class="col-md-8">
				<input class="form-control" type="text" name="drawee_bank" id="drawee_bank"
						 value="{{{ Input::old('drawee_bank', isset($policy) ? $policy->drawee_bank : null) }}}"/>
				{{{ $errors->first('drawee_bank', '<span class="help-inline">:message</span>') }}}
			</div>
		</div>
	</div>
	<!-- ./ drawee_bank -->

	<!-- drawee_branch -->
	<div class="col-md-6" id="drawee_branch_block">
		<div class="form-group {{{ $errors->has('drawee_branch') ? 'error' : '' }}}">
			<label class="col-md-4 control-label" for="drawee_branch">Drawee Branch :</label>

			<div class="col-md-8">
				<input class="form-control" type="text" name="drawee_branch" id="drawee_branch"
						 value="{{{ Input::old('drawee_branch', isset($policy) ? $policy->drawee_branch : null) }}}"/>
				{{{ $errors->first('drawee_branch', '<span class="help-inline">:message</span>') }}}
			</div>
		</div>
	</div>
	<!-- ./ drawee_branch -->

	<!-- drawn_date -->
	<div class="col-md-6" id="drawn_date_block">
		<div class="form-group {{{ $errors->has('drawn_date') ? 'error' : '' }}}">
			<label class="col-md-4 control-label" for="drawn_date">Drawn Date :</label>

			<div class="col-md-8">
				<div class="input-appended">
				<input class="date-picker form-control" type="text" name="drawn_date" id="drawn_date"
						 value="{{{ Input::old('drawn_date', isset($policy) ? $policy->drawn_date : date("Y-m-d")) }}}"/>
				{{{ $errors->first('drawn_date', '<span class="help-inline">:message</span>') }}}
				<label for="drawn_date" class="add-on"><i class="icon-calendar"></i></label>
				</div>

			</div>
		</div>
	</div>
	<!-- ./ drawn_date -->

	<!-- cheque_no -->
	<div class="col-md-6" id="cheque_no_block">
		<div class="form-group {{{ $errors->has('cheque_no') ? 'error' : '' }}}">
			<label class="col-md-4 control-label" for="cheque_no">Cheque/DD No :</label>

			<div class="col-md-8">
				<input class="form-control" type="text" name="cheque_no" id="cheque_no"
						 value="{{{ Input::old('cheque_no', isset($policy) ? $policy->cheque_no : null) }}}"/>
				{{{ $errors->first('cheque_no', '<span class="help-inline">:message</span>') }}}
			</div>
		</div>
	</div>
	<!-- ./ cheque_no -->

	<!-- paid -->
	<div class="col-md-6" id="paid_block">
		<div class="form-group {{{ $errors->has('paid') ? 'error' : '' }}}">
			<label class="col-md-4 control-label" for="paid">Paid :</label>

			<div class="col-md-8">
				{{Form::select('paid',array(
				'paid' => 'Paid',
				'due' => 'Due'
				) ,isset($policy) ? $policy->paid : null, array('class'=>'form-control '))}}
				{{{ $errors->first('paid', '<span class="help-inline">:message</span>') }}}
			</div>
		</div>
	</div>
	<!-- ./ paid -->
</div>
</div>

<!-- ./Official Detail -->


<!-- General tab -->
<div class="tab-pane " id="tab-general">
	<div class="row well">
		<blockquote>
			<p class="lead">Personal Details Of Customer</p>
		</blockquote>
		<!-- Name -->
		<div class="col-md-6">
			<div class="form-group {{{ $errors->has('name') ? 'error' : '' }}}">
				<label class="col-md-4 control-label" for="name">Name :</label>

				<div class="col-md-8">
					<input class="form-control" type="text" name="name" id="name"
							 value="{{{ Input::old('name', isset($policy) ? $policy->name : null) }}}"/>
					{{{ $errors->first('name', '<span class="help-inline">:message</span>') }}}
				</div>
				<!-- ./ Name -->
			</div>
		</div>
		<!-- age start -->
		<div class="col-md-6">
			<div class="form-group {{{ $errors->has('age') ? 'error' : '' }}}">
				<label class="col-md-4 control-label" for="age">Age :</label>

				<div class="col-md-8">
					{{Form::selectRange('age', 10, 70,isset($policy) ? $policy->age : 35, array('class'=>'form-control '))}}
					{{{ $errors->first('age', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
		</div>
		<!-- age end -->

		<!-- Guardian Name start -->
		<div class="col-md-6">
			<div class="form-group {{{ $errors->has('guardian_name') ? 'error' : '' }}}">
				<label class="col-md-4 control-label" for="guardian_name">Guardian :</label>

				<div class="col-md-8">
					<input class="form-control" type="text" name="guardian_name" id="guardian_name"
							 value="{{{ Input::old('guardian_name', isset($policy) ? $policy->guardian_name : null) }}}"/>
					{{{ $errors->first('guardian_name', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
		</div>
		<!-- Guardian Name end -->

		<!-- Guardian start -->
		<div class="col-md-6">
			<div class="form-group {{{ $errors->has('guardian_type') ? 'error' : '' }}}">
				<label class="col-md-4 control-label" for="guardian_type"> Type :</label>

				<div class="col-md-8">
					{{Form::select('guardian_type',array(
					'father' => 'Father',
					'husband' => 'Husband',
					'other' => 'Others'
					) ,isset($policy) ? $policy->guardian_type : null, array('class'=>'form-control '))}}
					{{{ $errors->first('guardian_type', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
		</div>
		<!-- Guardian end -->

		<!-- Pan no -->
		<div class="col-md-6">
			<div class="form-group {{{ $errors->has('pan_no') ? 'error' : '' }}}">
				<label class="col-md-4 control-label" for="pan_no">PAN No :</label>

				<div class="col-md-8">
					<input class="form-control"
							 type="text"
							 name="pan_no"
							 id="pan_no"
							 value="{{{ Input::old('pan_no', isset($policy) ? $policy->pan_no : null) }}}"/>
					{{{ $errors->first('pan_no', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
		</div>
		<!-- ./Pan no -->

		<!-- sex -->
		<div class="col-md-6">
			<div class="form-group {{{ $errors->has('sex') ? 'error' : '' }}}">
				<label class="col-md-4 control-label" for="sex">Sex :</label>

				<div class="col-md-8">
					{{Form::select('sex',array(
					'Male' => 'Male',
					'female' => 'Female'
					) ,isset($policy) ? $policy->sex : null, array('class'=>'form-control '))}}
					{{{ $errors->first('sex', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
		</div>
		<!-- ./ Sex -->

		<!-- date_of_birth -->
		<div class="col-md-6">
			<div class="form-group {{{ $errors->has('date_of_birth') ? 'error' : '' }}}">
				<label class="col-md-4 control-label" for="date_of_birth">BirthDate :</label>

				<div class="col-md-8">
					<div class="input-appended">
					<input class="date-picker form-control"
							 type="text"
							 name="date_of_birth"
							 id="date_of_birth"
							 value="{{{ Input::old('date_of_birth', isset($policy) ? $policy->date_of_birth : date("Y-m-d") ) }}}"/>
					{{{ $errors->first('date_of_birth', '<span class="help-inline">:message</span>') }}}
					<label for="date_of_birth" class="add-on"><i class="icon-calendar"></i></label>
					</div>
				</div>

			</div>
		</div>
		<!-- ./ date_of_birth -->


		<!-- mobile -->
		<div class="col-md-6">
			<div class="form-group {{{ $errors->has('mobile') ? 'error' : '' }}}">
				<label class="col-md-4 control-label" for="mobile">Mobile :</label>

				<div class="col-md-8">
					<input class="form-control" type="text" name="mobile" id="mobile"
							 value="{{{ Input::old('mobile', isset($policy) ? $policy->mobile : null) }}}"/>
					{{{ $errors->first('mobile', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
		</div>
		<!-- ./ mobile -->

		<!-- address -->
		<div class="col-md-6">
			<div class="form-group {{{ $errors->has('address') ? 'error' : '' }}}">
				<label class="col-md-4 control-label" for="address">Address :</label>

				<div class="col-md-8">
					<input class="form-control" type="text" name="address" id="address"
							 value="{{{ Input::old('address', isset($policy) ? $policy->address : null) }}}"/>
					{{{ $errors->first('address', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
		</div>
		<!-- ./ address -->

		<!-- city -->
		<div class="col-md-6">
			<div class="form-group {{{ $errors->has('city') ? 'error' : '' }}}">
				<label class="col-md-4 control-label" for="city">City :</label>

				<div class="col-md-8">
					<input class="form-control" type="text" name="city" id="city"
							 value="{{{ Input::old('city', isset($policy) ? $policy->city : null) }}}"/>
					{{{ $errors->first('city', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
		</div>
		<!-- ./ city -->

		<!-- state -->
		<div class="col-md-6">
			<div class="form-group {{{ $errors->has('state') ? 'error' : '' }}}">
				<label class="col-md-4 control-label" for="state">State :</label>

				<div class="col-md-8">
					<input class="form-control" type="text" name="state" id="state"
							 value="{{{ Input::old('state', isset($policy) ? $policy->state : null) }}}"/>
					{{{ $errors->first('state', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
		</div>
		<!-- ./ state -->

		<!-- pincode -->
		<div class="col-md-6">
			<div class="form-group {{{ $errors->has('pincode') ? 'error' : '' }}}">
				<label class="col-md-4 control-label" for="pincode">Pincode :</label>

				<div class="col-md-8">
					<input class="form-control" type="text" name="pincode" id="pincode"
							 value="{{{ Input::old('pincode', isset($policy) ? $policy->pincode : null) }}}"/>
					{{{ $errors->first('pincode', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
		</div>
		<!-- ./ pincode -->
	</div>
</div>

<!--  nominee tab -->
<div class="tab-pane" id="tab-nominee">
	<div class="row well">
		<blockquote>
			<p class="lead">Nominee Details of Customer</p>
		</blockquote>

		<!-- nominee_name -->
		<div class="col-md-6">
			<div class="form-group {{{ $errors->has('nominee_name') ? 'error' : '' }}}">
				<label class="col-md-4 control-label" for="nominee_name">Nominee Name :</label>

				<div class="col-md-8">
					<input class="form-control" type="text" name="nominee_name" id="nominee_name"
							 value="{{{ Input::old('nominee_name', isset($policy) ? $policy->nominee_name : null) }}}"/>
					{{{ $errors->first('nominee_name', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
		</div>
		<!-- ./ nominee_name -->

		<!-- nominee_add -->
		<div class="col-md-6">
			<div class="form-group {{{ $errors->has('nominee_add') ? 'error' : '' }}}">
				<label class="col-md-4 control-label" for="nominee_add">Nominee Add :</label>

				<div class="col-md-8">
					<input class="form-control" type="text" name="nominee_add" id="nominee_add"
							 value="{{{ Input::old('nominee_add', isset($policy) ? $policy->nominee_add : null) }}}"/>
					{{{ $errors->first('nominee_add', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
		</div>
		<!-- ./ nominee_add -->

		<!-- nominee_relation -->
		<div class="col-md-6">
			<div class="form-group {{{ $errors->has('nominee_relation') ? 'error' : '' }}}">
				<label class="col-md-4 control-label" for="nominee_relation">Relation :</label>

				<div class="col-md-8">
					<input class="form-control" type="text" name="nominee_relation" id="nominee_relation"
							 value="{{{ Input::old('nominee_relation', isset($policy) ? $policy->nominee_relation : null) }}}"/>
					{{{ $errors->first('nominee_relation', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
		</div>
		<!-- ./ nominee_relation -->

		<!-- nominee_age -->
		<div class="col-md-6">
			<div class="form-group {{{ $errors->has('nominee_age') ? 'error' : '' }}}">
				<label class="col-md-4 control-label" for="nominee_age">Age :</label>

				<div class="col-md-8">
					<input class="form-control" type="text" name="nominee_age" id="nominee_age"
							 value="{{{ Input::old('nominee_age', isset($policy) ? $policy->nominee_age : null) }}}"/>
					{{{ $errors->first('nominee_age', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
		</div>
		<!-- ./ nominee_age -->
	</div>
</div>
<!-- ./ nominee tab -->

</div>
<!-- ./ tabs content -->

<!-- Form Actions -->
<div class="form-group">
	<div class="col-md-offset-4 col-md-8">
		<element class="btn-cancel close_popup">Cancel</element>
		<button type="reset" class="btn btn-default">Reset</button>
		<button type="submit" class="btn btn-success">OK</button>
	</div>
</div>
<!-- ./ form actions -->
</form>
@stop
@section('scripts')
<script type="text/javascript">
	// tooltip block
	$('#associate_no').tooltip({
		'trigger': 'focus',
		'trigger': 'hover',
		'title':   'Enter Associate No or Name. Autosearch Enabled !!'});
	$('#scheme_name').tooltip({
		'trigger': 'focus',
		'trigger': 'hover',
		'title': 'Enter Scheme Name. Autosearch Enabled !!'});
	$('#rd_scheme_amount').tooltip({
		'trigger': 'focus',
		'trigger': 'hover',
		'title': 'Please Change figure If you have changed Scheme Name to Re-Calculate!!'});
	$('#fd_scheme_amount').tooltip({
		'trigger': 'focus',
		'trigger': 'hover',
		'title': 'Please Change figure If you have changed Scheme Name to Re-Calculate!!'});
	// ./tooltip block

	$(function () {
		$('#fd_scheme_amount').on('keyup paste change', function () {
			if ($('#to_scheme_interest').val() > 0) {
				$('#fd_maturity_amount').val(Number(parseInt($('#fd_scheme_amount').val()) + (($('#to_scheme_interest').val() * $('#to_scheme_years').val() * $('#fd_scheme_amount').val()) / 100)).toFixed(2));
			}

		});

		$('#rd_scheme_amount').on('keyup paste change', function () {

			if ($('#to_scheme_interest').val() > 0) {
				$('#rd_total_installment').val($('#to_scheme_years').val() * 12);
				var expected_maturity_amount = 0;
				for (var i = ($('#rd_total_installment').val()); i >= 1; i--) {
					var calculated_amount = parseInt($('#rd_scheme_amount').val()) *
						Math.pow(
							(1 + ($('#to_scheme_interest').val() / (100 * 12))),
							i
						);
					expected_maturity_amount = expected_maturity_amount + calculated_amount;
				}
				$('#rd_maturity_amount').val(Number(expected_maturity_amount).toFixed(2));
			}
		});
	});
	// dropdown change block
	$(function () {
		if ($('#payment_mode').val() === 'cash') {
			$("#drawee_bank_block").hide("slow");
			$("#drawee_branch_block").hide("slow");
			$("#cheque_no_block").hide("slow");
			$("#paid_block").hide("slow");
		}
		$("#payment_mode").on('change', function () {
			var mode = $(this).val();
			if (mode === 'cash') {
				$("#drawee_bank_block").hide("slow");
				$("#drawee_branch_block").hide("slow");
				$("#cheque_no_block").hide("slow");
				$("#paid_block").hide("slow");

				return false;
			}
			$("#drawee_bank_block").show("slow");
			$("#drawee_branch_block").show("slow");
			$("#cheque_no_block").show("slow");
			$("#paid_block").show("slow");

		});
	});
	$(function () {
		// $("#fd_scheme_details_block").hide();
		$("#rd_scheme_details_block").hide();
		$("#mis_scheme_details_block").hide();
		$('#scheme_name').autocomplete({
			source: "add_to_fd_scheme_id",
			select: function (event, ui) {
				$('#to_scheme_id').val(ui.item.id);
				$('#to_scheme_interest').val(ui.item.interest);
				$('#to_scheme_description').val(ui.item.description);
				$('#to_scheme_years').val(ui.item.years);

			}
		});
	});
	// ./dropdown change block
	// autocomplete block
	$(function () {
		$("#scheme_type").change(function () {
			var mode = $(this).val();
			if (mode === 'FD') {
				$("#fd_scheme_details_block").show(500);
				$("#rd_scheme_details_block").hide();
				$("#mis_scheme_details_block").hide();
				// return false;

				$('#scheme_name').autocomplete({
					source: "add_to_fd_scheme_id",
					select: function (event, ui) {
						$('#to_scheme_id').val(ui.item.id);
						$('#to_scheme_interest').val(ui.item.interest);
						$('#to_scheme_description').val(ui.item.description);
						$('#to_scheme_years').val(ui.item.years);
					}
				});
			}
			else if (mode === 'RD') {
				$("#fd_scheme_details_block").hide();
				$("#rd_scheme_details_block").show(500);
				$("#mis_scheme_details_block").hide();

				$('#scheme_name').autocomplete({
					source: "add_to_rd_scheme_id",
					select: function (event, ui) {
						$('#to_scheme_id').val(ui.item.id);
						$('#to_scheme_interest').val(ui.item.interest);
						$('#to_scheme_description').val(ui.item.description);
						$('#to_scheme_years').val(ui.item.years);
					}
				});

			}
			else if (mode === 'MIS') {
				$("#fd_scheme_details_block").hide();
				$("#rd_scheme_details_block").hide();
				$("#mis_scheme_details_block").show(500);
				// return false;
			}
		});

	});

	//autosearch form associate id
	$(function () {
		$('#associate_no').autocomplete({
			source: "add_to_associate_id",
			select: function (event, ui) {
				$('#to_associate_id').val(ui.item.id);
			}
		});
	});

	$(function(){
		$(".date-picker").datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: "-70:+0"
		});
	});
	// autocomplete block

	// var nowTemp = new Date();
	// var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

	// var dob = $('#date_of_birth').datepicker({
	// 	format: 'dd/mm/yyyy',
	// 	onRender: function (date) {
	// 		return date.valueOf() < now.valueOf() ? 'disabled' : '';
	// 	}
	// }).on('changeDate',function (ev) {
	// 		dob.hide();
	// 	}).data('datepicker');

	// var dw = $('#drawn_date').datepicker({
	// 	format: 'dd/mm/yyyy',
	// 	onRender: function (date) {
	// 		return date.valueOf() < now.valueOf() ? 'disabled' : '';
	// 	}
	// }).on('changeDate',function (ev) {
	// 		dw.hide();
	// 	}).data('datepicker');

	// var sd = $('#start_date').datepicker({
	// 	format: 'dd/mm/yyyy',
	// 	onRender: function (date) {
	// 		return date.valueOf() < now.valueOf() ? 'disabled' : '';
	// 	}
	// }).on('changeDate',function (ev) {
	// 		sd.hide();
	// 	}).data('datepicker');
</script>

@stop
