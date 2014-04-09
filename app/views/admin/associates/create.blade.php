@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
	<!-- Tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab-official" data-toggle="tab">Official Details </a></li>
			<li ><a href="#tab-general" data-toggle="tab">Personal Details</a></li>
			<li ><a href="#tab-banking" data-toggle="tab">Banking Details</a></li>
			<li ><a href="#tab-payment" data-toggle="tab">Payment Details </a></li>
			<li ><a href="#tab-nominee" data-toggle="tab">Nominee Details </a></li>
		</ul>
	<!-- ./ tabs -->

	{{-- Create User Form --}}
	<form class="form-horizontal" method="post" action="" autocomplete="off">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<!-- ./ csrf token -->

		<!-- Tabs Content -->
		<div class="tab-content">
			<!-- official tab -->
			<div class="tab-pane active" id="tab-official">

				{{Form::hidden('to_introducer_id', Input::old('to_introducer_id'),array('id'=>'to_introducer_id'))}}

				<!-- branch_id -->
				<div class="col-md-6">
				<div class="form-group {{{ $errors->has('branch_id') ? 'error' : '' }}}">
					<label class="col-md-3 control-label" for="branch_id">Branch :</label>
					<div class="col-md-9">
						<input readonly class="form-control" type="text" name="branch_id" id="branch_id" value="{{{ Input::old('branch_id', isset($associate) ? $associate->branch_id : $branch_id) }}}" />
						{{{ $errors->first('branch_id', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				</div>
				<!-- ./ branch_id -->

				<!-- introducer_id -->
				<div class="col-md-6">
				<div class="form-group {{{ $errors->has('introducer_id') ? 'error' : '' }}}">
					<label class="col-md-3 control-label" for="introducer_id">Introducer :</label>
					<div class="col-md-9">
						<input class="form-control" type="text" name="introducer_id" id="introducer_id" value="{{{ Input::old('introducer_id', isset($associate) ? $associate->introducer_id : null) }}}" />
						{{{ $errors->first('introducer_id', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				</div>
				<!-- ./ introducer_id -->

				<!-- rank_id -->
				<div class="col-md-6">
				<div class="form-group {{{ $errors->has('rank_id') ? 'error' : '' }}}">
					<label class="col-md-3 control-label" for="rank_id">Rank :</label>
					<div class="col-md-9">
        				{{Form::select('rank_id',$rank ,isset($associate) ? $associate->rank_id : null, array('class'=>'form-control ' ,'id' =>'rank_id'))}} 
						{{{ $errors->first('rank_id', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				</div>
				<!-- ./ rank_id -->

				<!-- start_date -->
				<div class="col-md-6">
				<div class="form-group {{{ $errors->has('start_date') ? 'error' : '' }}}">
					<label class="col-md-3 control-label" for="start_date">Start Date :</label>
					<div class="col-md-9">
						<div class="input-appended">	
							<input class="date-picker form-control" type="text" name="start_date" id="start_date" 
							value="{{{ Input::old('start_date', isset($associate) ? $associate->start_date : date("Y-m-d")) }}}" />
							{{{ $errors->first('start_date', '<span class="help-inline">:message</span>') }}}
							<label for="start_date" class="add-on"><i class="icon-calendar"></i></label>
						</div>
					</div>
				</div>
				</div>	
				<!-- ./ start_date -->

				<!-- activate -->
				<div class="col-md-6">
				<div class="form-group {{{ $errors->has('activate') ? 'error' : '' }}}">
					<label class="col-md-3 control-label" for="activate">Activate :</label>
					<div class="col-md-9">
						{{Form::select('activate',array(
									'1' => 'Yes',
									'0' =>  'No'
						) ,isset($associate) ? $associate->activate : null, array('class'=>'form-control '))}}
					</div>
				</div>
				</div>
				<!-- ./ activate -->

			</div>
			<!-- ./official tab -->
			<!-- General tab -->
			<div class="tab-pane " id="tab-general">
			<div class="col-md-6">
				<!-- Name -->
				<div class="form-group {{{ $errors->has('name') ? 'error' : '' }}}">
					<label class="col-md-3 control-label" for="name">Name :</label>
					<div class="col-md-9">
						<input class="form-control" type="text" name="name" id="name" value="{{{ Input::old('name', isset($associate) ? $associate->name : null) }}}" />
						{{{ $errors->first('name', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ Name -->
				</div>
				<div class="col-md-6">
				<!-- age start -->
				<div class="form-group {{{ $errors->has('age') ? 'error' : '' }}}">
					<label class="col-md-3 control-label" for="age">Age :</label>
					<div class="col-md-9">
						{{Form::selectRange('age', 10, 70,isset($associate) ? $associate->age : 35, array('class'=>'form-control '))}}
						{{{ $errors->first('age', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- age end -->
				</div>

				<div class="col-md-6">
				<!-- Guardian Name start -->
				<div class="form-group {{{ $errors->has('guardian_name') ? 'error' : '' }}}">
					<label class="col-md-3 control-label" for="guardian_name">Guardian :</label>
					<div class="col-md-9">
						<input class="form-control" type="text" name="guardian_name" id="guardian_name" value="{{{ Input::old('guardian_name', isset($associate) ? $associate->guardian_name : null) }}}" />
						{{{ $errors->first('guardian_name', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- Guardian Name end -->
				</div>

				<div class="col-md-6">
				<!-- Guardian start -->
				<div class="form-group {{{ $errors->has('guardian_type') ? 'error' : '' }}}">
					<label class="col-md-3 control-label" for="guardian_type"> Type :</label>
					<div class="col-md-9">
						{{Form::select('guardian_type',array(
									'father'  => 'Father',
									'husband' => 'Husband',
									'other'   => 'Others'
						) ,isset($associate) ? $associate->guardian_type : null, array('class'=>'form-control '))}}
						{{{ $errors->first('guardian_type', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- Guardian end -->
				</div>

				<div class="col-md-6">
				<!-- sex -->
				<div class="form-group {{{ $errors->has('sex') ? 'error' : '' }}}">
					<label class="col-md-3 control-label" for="sex">Sex :</label>
					<div class="col-md-9">
						{{Form::select('sex',array(
									'Male'   => 'Male',
									'female' => 'Female'
						) ,isset($associate) ? $associate->sex : null, array('class'=>'form-control '))}}
						{{{ $errors->first('sex', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ Sex -->
				</div>
				
				<div class="col-md-6">
				<!-- date_of_birth -->
				<div class="form-group {{{ $errors->has('date_of_birth') ? 'error' : '' }}}">
					<label class="col-md-3 control-label" for="date_of_birth">BirthDate :</label>
					<div class="col-md-9">
						<div class="input-appended">
							<input class="date-picker form-control" type="text" name="date_of_birth" id="date_of_birth" value="{{{ Input::old('date_of_birth', isset($associate) ? $associate->date_of_birth : date("Y-m-d") ) }}}" />
							{{{ $errors->first('date_of_birth', '<span class="help-inline">:message</span>') }}}
						<label for="date_of_birth" class="add-on"><i class="icon-calendar"></i></label>
						</div>
					</div>
				</div>
				<!-- ./ date_of_birth -->
				</div>

				<div class="col-md-6">
				<!-- mobile -->
				<div class="form-group {{{ $errors->has('mobile') ? 'error' : '' }}}">
					<label class="col-md-3 control-label" for="mobile">Mobile :</label>
					<div class="col-md-9">
						<input class="form-control" type="text" name="mobile" id="mobile" value="{{{ Input::old('mobile', isset($associate) ? $associate->mobile : null) }}}" />
						{{{ $errors->first('mobile', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ mobile -->
				</div>

				<div class="col-md-6">
				<!-- address -->
				<div class="form-group {{{ $errors->has('address') ? 'error' : '' }}}">
					<label class="col-md-3 control-label" for="address">Address :</label>
					<div class="col-md-9">
						<input class="form-control" type="text" name="address" id="address" value="{{{ Input::old('address', isset($associate) ? $associate->address : null) }}}" />
						{{{ $errors->first('address', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ address -->
				</div>
				<div class="col-md-6">
				<!-- city -->
				<div class="form-group {{{ $errors->has('city') ? 'error' : '' }}}">
					<label class="col-md-3 control-label" for="city">City :</label>
					<div class="col-md-9">
						<input class="form-control" type="text" name="city" id="city" value="{{{ Input::old('city', isset($associate) ? $associate->city : null) }}}" />
						{{{ $errors->first('city', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ city -->
				</div>

				<div class="col-md-6">
				<!-- state -->
				<div class="form-group {{{ $errors->has('state') ? 'error' : '' }}}">
					<label class="col-md-3 control-label" for="state">State :</label>
					<div class="col-md-9">
						<input class="form-control" type="text" name="state" id="state" value="{{{ Input::old('state', isset($associate) ? $associate->state : null) }}}" />
						{{{ $errors->first('state', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ state -->
				</div>

				<div class="col-md-6">
				<!-- pincode -->
				<div class="form-group {{{ $errors->has('pincode') ? 'error' : '' }}}">
					<label class="col-md-3 control-label" for="pincode">Pincode :</label>
					<div class="col-md-9">
						<input class="form-control" type="text" name="pincode" id="pincode" value="{{{ Input::old('pincode', isset($associate) ? $associate->pincode : null) }}}" />
						{{{ $errors->first('pincode', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ pincode -->
				</div>

			</div>
			<!--  banking tab -->
			<div class="tab-pane" id="tab-banking">

				<!-- bank_name -->
				<div class="col-md-6">
				<div class="form-group {{{ $errors->has('bank_name') ? 'error' : '' }}}">
					<label class="col-md-3 control-label" for="bank_name">Bank Name :</label>
					<div class="col-md-9">
						<input class="form-control" type="text" name="bank_name" id="bank_name" value="{{{ Input::old('bank_name', isset($associate) ? $associate->bank_name : null) }}}" />
						{{{ $errors->first('bank_name', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				</div>
				<!-- ./ bank_name -->

				<!-- bank_address -->
				<div class="col-md-6">
				<div class="form-group {{{ $errors->has('bank_address') ? 'error' : '' }}}">
					<label class="col-md-3 control-label" for="bank_address">Address :</label>
					<div class="col-md-9">
						<input class="form-control" type="text" name="bank_address" id="bank_address" value="{{{ Input::old('bank_address', isset($associate) ? $associate->bank_address : null) }}}" />
						{{{ $errors->first('bank_address', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				</div>
				<!-- ./ bank_address -->

				<!-- account_no -->
				<div class="col-md-6">
				<div class="form-group {{{ $errors->has('account_no') ? 'error' : '' }}}">
					<label class="col-md-3 control-label" for="account_no">A/C No :</label>
					<div class="col-md-9">
						<input class="form-control" type="text" name="account_no" id="account_no" value="{{{ Input::old('account_no', isset($associate) ? $associate->account_no : null) }}}" />
						{{{ $errors->first('account_no', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				</div>
				<!-- ./ account_no -->

				<!-- pan_no -->
				<div class="col-md-6">
				<div class="form-group {{{ $errors->has('pan_no') ? 'error' : '' }}}">
					<label class="col-md-3 control-label" for="pan_no">PAN No :</label>
					<div class="col-md-9">
						<input class="form-control" type="text" name="pan_no" id="pan_no" value="{{{ Input::old('pan_no', isset($associate) ? $associate->pan_no : null) }}}" />
						{{{ $errors->first('pan_no', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				</div>
				<!-- ./ pan_no -->

			</div>
			<!-- ./ banking tab -->

			<!--  payment tab -->
			<div class="tab-pane" id="tab-payment">
				<!-- payment_mode -->
				<div class="col-md-6">
				<div class="form-group {{{ $errors->has('payment_mode') ? 'error' : '' }}}">
					<label class="col-md-3 control-label" for="payment_mode">Mode :</label>
					<div class="col-md-9">
						{{Form::select('payment_mode',array(
										'cash'   =>  'Cash',
										'cheque' => 'Cheque',
										'dd' 	 =>  'DD',
						) ,isset($associate) ? $associate->payment_mode : null, array('class'=>'form-control ', 'id' => 'payment_mode'))}}
						{{{ $errors->first('payment_mode', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				</div>
				<!-- ./ payment_mode -->

				<!-- associate_fees -->
				<div class="col-md-6">
				<div class="form-group {{{ $errors->has('associate_fees') ? 'error' : '' }}}">
					<label class="col-md-3 control-label" for="associate_fees">Amount :</label>
					<div class="col-md-9">
						<input readonly class="form-control" type="text" name="associate_fees" id="associate_fees" value="500" />
						{{{ $errors->first('associate_fees', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				</div>
				<!-- ./ associate_fees -->

				<!-- drawee_bank -->
				<div class="col-md-6" id="drawee_bank_block">
				<div class="form-group {{{ $errors->has('drawee_bank') ? 'error' : '' }}}">
					<label class="col-md-3 control-label" for="drawee_bank">Drawee Bank :</label>
					<div class="col-md-9">
						<input class="form-control" type="text" name="drawee_bank" id="drawee_bank" value="{{{ Input::old('drawee_bank', isset($associate) ? $associate->drawee_bank : null) }}}" />
						{{{ $errors->first('drawee_bank', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				</div>
				<!-- ./ drawee_bank -->

				<!-- drawee_branch -->
				<div class="col-md-6" id="drawee_branch_block">
				<div class="form-group {{{ $errors->has('drawee_branch') ? 'error' : '' }}}">
					<label class="col-md-3 control-label" for="drawee_branch">Drawee Branch :</label>
					<div class="col-md-9">
						<input class="form-control" type="text" name="drawee_branch" id="drawee_branch" value="{{{ Input::old('drawee_branch', isset($associate) ? $associate->drawee_branch : null) }}}" />
						{{{ $errors->first('drawee_branch', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				</div>
				<!-- ./ drawee_branch -->

				<!-- drawn_date -->
				<div class="col-md-6" id="drawn_date_block">
				<div class="form-group {{{ $errors->has('drawn_date') ? 'error' : '' }}}">
					<label class="col-md-3 control-label" for="drawn_date">Drawn Date :</label>
					<div class="col-md-9">
						<div class="input-appended">
							<input class="date-picker form-control" type="text" name="drawn_date" id="drawn_date" value="{{{ Input::old('drawn_date', isset($associate) ? $associate->drawn_date : date("Y-m-d")) }}}" />
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
					<label class="col-md-3 control-label" for="cheque_no">Cheque/DD No :</label>
					<div class="col-md-9">
						<input class="form-control" type="text" name="cheque_no" id="cheque_no" value="{{{ Input::old('cheque_no', isset($associate) ? $associate->cheque_no : null) }}}" />
						{{{ $errors->first('cheque_no', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				</div>
				<!-- ./ cheque_no -->

				<!-- paid -->
				<div class="col-md-6">
				<div class="form-group {{{ $errors->has('paid') ? 'error' : '' }}}">
					<label class="col-md-3 control-label" for="paid">Paid :</label>
					<div class="col-md-9">
						{{Form::select('paid',array(
															'paid' => 'Paid',
															'due' 	 =>  'Due'
						) ,isset($associate) ? $associate->paid : null, array('class'=>'form-control '))}}
						{{{ $errors->first('paid', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				</div>
				<!-- ./ paid -->

			</div>
			<!-- ./ payment tab -->
			<!--  nominee tab -->
			<div class="tab-pane" id="tab-nominee">

				<!-- nominee_name -->
				<div class="col-md-6">
				<div class="form-group {{{ $errors->has('nominee_name') ? 'error' : '' }}}">
					<label class="col-md-3 control-label" for="nominee_name">Nominee Name :</label>
					<div class="col-md-9">
						<input class="form-control" type="text" name="nominee_name" id="nominee_name" value="{{{ Input::old('nominee_name', isset($associate) ? $associate->nominee_name : null) }}}" />
						{{{ $errors->first('nominee_name', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				</div>
				<!-- ./ nominee_name -->

				<!-- nominee_add -->
				<div class="col-md-6">
				<div class="form-group {{{ $errors->has('nominee_add') ? 'error' : '' }}}">
					<label class="col-md-3 control-label" for="nominee_add">Nominee Add :</label>
					<div class="col-md-9">
						<input class="form-control" type="text" name="nominee_add" id="nominee_add" value="{{{ Input::old('nominee_add', isset($associate) ? $associate->nominee_add : null) }}}" />
						{{{ $errors->first('nominee_add', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				</div>
				<!-- ./ nominee_add -->

				<!-- nominee_relation -->
				<div class="col-md-6">
				<div class="form-group {{{ $errors->has('nominee_relation') ? 'error' : '' }}}">
					<label class="col-md-3 control-label" for="nominee_relation">Relation :</label>
					<div class="col-md-9">
						<input class="form-control" type="text" name="nominee_relation" id="nominee_relation" value="{{{ Input::old('nominee_relation', isset($associate) ? $associate->nominee_relation : null) }}}" />
						{{{ $errors->first('nominee_relation', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				</div>
				<!-- ./ nominee_relation -->

				<!-- nominee_age -->
				<div class="col-md-6">
				<div class="form-group {{{ $errors->has('nominee_age') ? 'error' : '' }}}">
					<label class="col-md-3 control-label" for="nominee_age">Age :</label>
					<div class="col-md-9">
						<input class="form-control" type="text" name="nominee_age" id="nominee_age" value="{{{ Input::old('nominee_age', isset($associate) ? $associate->nominee_age : null) }}}" />
						{{{ $errors->first('nominee_age', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				</div>
				<!-- ./ nominee_age -->

			</div>
			<!-- ./ nominee tab -->

		</div>
		<!-- ./ tabs content -->

		<!-- Form Actions -->
		<div class="form-group">
			<div class="col-md-offset-2 col-md-9">
				<element class = "btn btn-danger close_popup">Cancel</element>
				<button type   = "reset" class="btn btn-info">Reset</button>
				<button type   = "submit" class="btn btn-success">OK</button>
			</div>
		</div>
		<!-- ./ form actions -->
	</form>
@stop
@section('scripts')
<script type="text/javascript">
	$(function(){
		$(".date-picker").datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: "-70:+0"
		});
	});
	$(function(){
		if($('#payment_mode').val() === 'cash')
		{
			$("#drawee_bank_block").hide("slow");
			$("#drawee_branch_block").hide("slow");
			$("#cheque_no_block").hide("slow");
		}
		$("#payment_mode").on('change',function() {
			var mode = $(this).val();
			if(mode === 'cash')
			{
				$("#drawee_bank_block").hide("slow");
				$("#drawee_branch_block").hide("slow");
				$("#cheque_no_block").hide("slow");

				return false;
			}
			$("#drawee_bank_block").show("slow");
			$("#drawee_branch_block").show("slow");
			$("#cheque_no_block").show("slow");

		});
	});

	$(function(){
		$('#introducer_id').autocomplete({
			source: "add_to_introducer_id",
			select: function(event, ui){
				$('#to_introducer_id').val(ui.item.id);
				$.get("add_to_rank_list",{rank_id: ui.item.rank_id}, function(data,status){
					$('#rank_id').empty();
					$.each(data, function(index, item) {
			            var opt = $('<option />');
			            opt.val(data[index].id);
			            opt.text(data[index].rankname);
			            $('#rank_id').append(opt);
        			});
				});
			}
		});
	});

</script>

@stop
