@extends('admin.layouts.modal')
{{-- Content --}}
@section('content')

<div class="container" id="rootwizard">
    <form class="form-horizontal" method="post" action="" autocomplete="off" id="policy">
        <!-- CSRF Token -->
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
        {{ Form::hidden('to_introducer_id', Input::old('to_introducer_id'),array('id'=>'to_introducer_id'))}}
        <div class="row">
            <ul>
                <li><a href="#step-1" data-toggle="tab">
                        <h5 class="list-group-item-heading">Step 1</h5>
                        <p class=" lead list-group-item-text">Official Details</p>
                </a></li>
                <li><a href="#step-2" data-toggle="tab">
                        <h5 class="list-group-item-heading">Step 2</h5>
                        <p class=" lead list-group-item-text">Personal Details</p>
                </a></li>
                <li><a href="#step-3" data-toggle="tab">
                        <h5 class="list-group-item-heading">Step 3</h5>
                        <p class=" lead list-group-item-text">Banking Details</p>
                </a></li>
                <li><a href="#step-4" data-toggle="tab">
                        <h5 class="list-group-item-heading">Step 4</h5>
                        <p class=" lead list-group-item-text">Nominee Details</p>
                </a></li>
            </ul>
        </div>
        <!-- end of ist row within container -->
        <div class="tab-content">
            <div class="tab-pane" id="step-1">
                <div class="row well">
                    <blockquote>
                        <p class="lead">Personal Details Of Customer</p>
                    </blockquote>
                    <!-- branch_id -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="branch_id">Branch :</label>
                            <div class="col-md-8">
                                <input readonly class="form-control" type="text" name="branch_id" id="branch_id" value="{{{ Input::old('branch_id', isset($associate) ? $associate->branch_id : $branch_id) }}}" />
                            </div>
                        </div>
                    </div>
                    <!-- ./ branch_id -->

                    <!-- introducer_id -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="introducer_no">Introducer :</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="introducer_no" id="introducer_no" value="{{{ Input::old('introducer_no', isset($associate) ? $associate->introducer_no : null) }}}" />
                            </div>
                        </div>
                    </div>
                    <!-- ./ introducer_id -->

                    <!-- rank_id -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="rank_id">Rank :</label>
                            <div class="col-md-8">
                                {{ Form::select('rank_id',$rank ,isset($associate) ? $associate->rank_id : null, array('class'=>'form-control ' ,'id' =>'rank_id'))}} 
                            </div>
                        </div>
                    </div>
                    <!-- ./ rank_id -->

                    <!-- start_date -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="start_date">Start Date :</label>
                            <div class="col-md-8">
                                <div class="input-appended">	
                                    <input class="date-picker form-control" type="text" name="start_date" id="start_date" 
                                    value="{{{ Input::old('start_date', isset($associate) ? $associate->start_date : date("Y-m-d")) }}}" />
                                </div>
                            </div>
                        </div>
                    </div>	
                    <!-- ./ start_date -->

                    <!-- activate -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="activate">Activate :</label>
                            <div class="col-md-8">
                                {{ Form::select('activate',array(
                                '1' => 'Yes',
                                '0' =>  'No'
                                ) ,isset($associate) ? $associate->activate : null, array('class'=>'form-control '))}}
                            </div>
                        </div>
                    </div>
                    <!-- ./ activate -->

                </div>
                <!-- end of main policy block -->
                <!-- end of FD/RD/MIS block -->
                <div class="row well" id="payment_block">
                    <blockquote>
                        <p class="lead">Payment Details Of Associate</p>
                    </blockquote>
                    <!-- payment_mode -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="payment_mode">Mode :</label>
                            <div class="col-md-8">
                                {{ Form::select('payment_mode',array(
                                'cash'   =>  'Cash',
                                'cheque' => 'Cheque',
                                'dd' 	 =>  'DD',
                                ) ,isset($associate) ? $associate->payment_mode : null, array('class'=>'form-control ', 'id' => 'payment_mode'))}}
                            </div>
                        </div>
                    </div>
                    <!-- ./ payment_mode -->

                    <!-- associate_fees -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="associate_fees">Amount :</label>
                            <div class="col-md-8">
                                <input readonly class="form-control" type="text" name="associate_fees" id="associate_fees" value="500" />
                            </div>
                        </div>
                    </div>
                    <!-- ./ associate_fees -->

                    <!-- drawee_bank -->
                    <div class="col-md-6" id="drawee_bank_block">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="drawee_bank">Drawee Bank :</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="drawee_bank" id="drawee_bank" value="{{{ Input::old('drawee_bank', isset($associate) ? $associate->drawee_bank : null) }}}" />
                            </div>
                        </div>
                    </div>
                    <!-- ./ drawee_bank -->

                    <!-- drawee_branch -->
                    <div class="col-md-6" id="drawee_branch_block">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="drawee_branch">Drawee Branch :</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="drawee_branch" id="drawee_branch" value="{{{ Input::old('drawee_branch', isset($associate) ? $associate->drawee_branch : null) }}}" />
                            </div>
                        </div>
                    </div>
                    <!-- ./ drawee_branch -->

                    <!-- drawn_date -->
                    <div class="col-md-6" id="drawn_date_block">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="drawn_date">Drawn Date :</label>
                            <div class="col-md-8">
                                <div class="input-appended">
                                    <input class="date-picker form-control" type="text" name="drawn_date" id="drawn_date" value="{{{ Input::old('drawn_date', isset($associate) ? $associate->drawn_date : date("Y-m-d")) }}}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ./ drawn_date -->

                    <!-- cheque_no -->
                    <div class="col-md-6" id="cheque_no_block">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="cheque_no">Cheque/DD No :</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="cheque_no" id="cheque_no" value="{{{ Input::old('cheque_no', isset($associate) ? $associate->cheque_no : null) }}}" />
                            </div>
                        </div>
                    </div>
                    <!-- ./ cheque_no -->

                    <!-- paid -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="paid">Paid :</label>
                            <div class="col-md-8">
                                {{ Form::select('paid',array(
                                'paid' => 'Paid',
                                'due' 	 =>  'Due'
                                ) ,isset($associate) ? $associate->paid : null, array('class'=>'form-control '))}}
                            </div>
                        </div>
                    </div>
                    <!-- ./ paid -->

                </div>
                <!-- end of payment block -->
            </div>
            <!-- end of official step -->
            <div class="tab-pane" id="step-2">
                <div class="row well">
                    <blockquote>
                        <p class="lead">Personal Details of Associate</p>
                    </blockquote>
                    <div class="col-md-6">
                        <!-- Name -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="name">Name :</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="name" id="name" value="{{{ Input::old('name', isset($associate) ? $associate->name : null) }}}" />
                            </div>
                        </div>
                        <!-- ./ Name -->
                    </div>
                    <div class="col-md-6">
                        <!-- age start -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="age">Age :</label>
                            <div class="col-md-8">
                                {{ Form::selectRange('age', 10, 70,isset($associate) ? $associate->age : 35, array('class'=>'form-control '))}}
                            </div>
                        </div>
                        <!-- age end -->
                    </div>

                    <div class="col-md-6">
                        <!-- Guardian Name start -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="guardian_name">Guardian :</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="guardian_name" id="guardian_name" value="{{{ Input::old('guardian_name', isset($associate) ? $associate->guardian_name : null) }}}" />
                            </div>
                        </div>
                        <!-- Guardian Name end -->
                    </div>

                    <div class="col-md-6">
                        <!-- Guardian start -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="guardian_type"> Type :</label>
                            <div class="col-md-8">
                                {{ Form::select('guardian_type',array(
                                'father'  => 'Father',
                                'husband' => 'Husband',
                                'other'   => 'Others'
                                ) ,isset($associate) ? $associate->guardian_type : null, array('class'=>'form-control '))}}
                            </div>
                        </div>
                        <!-- Guardian end -->
                    </div>

                    <div class="col-md-6">
                        <!-- sex -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="sex">Sex :</label>
                            <div class="col-md-8">
                                {{ Form::select('sex',array(
                                'Male'   => 'Male',
                                'female' => 'Female'
                                ) ,isset($associate) ? $associate->sex : null, array('class'=>'form-control '))}}
                            </div>
                        </div>
                        <!-- ./ Sex -->
                    </div>

                    <div class="col-md-6">
                        <!-- date_of_birth -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="date_of_birth">BirthDate :</label>
                            <div class="col-md-8">
                                <div class="input-appended">
                                    <input class="date-picker form-control" type="text" name="date_of_birth" id="date_of_birth" value="{{{ Input::old('date_of_birth', isset($associate) ? $associate->date_of_birth : date("Y-m-d") ) }}}" />
                                </div>
                            </div>
                        </div>
                        <!-- ./ date_of_birth -->
                    </div>

                    <div class="col-md-6">
                        <!-- mobile -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="mobile">Mobile :</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="mobile" id="mobile" value="{{{ Input::old('mobile', isset($associate) ? $associate->mobile : null) }}}" />
                            </div>
                        </div>
                        <!-- ./ mobile -->
                    </div>

                    <div class="col-md-6">
                        <!-- address -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="address">Address :</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="address" id="address" value="{{{ Input::old('address', isset($associate) ? $associate->address : null) }}}" />
                            </div>
                        </div>
                        <!-- ./ address -->
                    </div>
                    <div class="col-md-6">
                        <!-- city -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="city">City :</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="city" id="city" value="{{{ Input::old('city', isset($associate) ? $associate->city : null) }}}" />
                            </div>
                        </div>
                        <!-- ./ city -->
                    </div>

                    <div class="col-md-6">
                        <!-- state -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="state">State :</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="state" id="state" value="{{{ Input::old('state', isset($associate) ? $associate->state : null) }}}" />
                            </div>
                        </div>
                        <!-- ./ state -->
                    </div>

                    <div class="col-md-6">
                        <!-- pincode -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="pincode">Pincode :</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="pincode" id="pincode" value="{{{ Input::old('pincode', isset($associate) ? $associate->pincode : null) }}}" />
                            </div>
                        </div>
                        <!-- ./ pincode -->
                    </div>

                </div>
                <!-- end of geneal tab -->
            </div>
            <!-- end of general step -->

            <div class="tab-pane" id="step-3">
                <div class="row well">
                    <blockquote>
                        <p class="lead">Banking Details of Customer</p>
                    </blockquote>
                    <!-- bank_name -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="bank_name">Bank Name :</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="bank_name" id="bank_name" value="{{{ Input::old('bank_name', isset($associate) ? $associate->bank_name : null) }}}" />
                            </div>
                        </div>
                    </div>
                    <!-- ./ bank_name -->

                    <!-- bank_address -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="bank_address">Address :</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="bank_address" id="bank_address" value="{{{ Input::old('bank_address', isset($associate) ? $associate->bank_address : null) }}}" />
                            </div>
                        </div>
                    </div>
                    <!-- ./ bank_address -->

                    <!-- account_no -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="account_no">A/C No :</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="account_no" id="account_no" value="{{{ Input::old('account_no', isset($associate) ? $associate->account_no : null) }}}" />
                            </div>
                        </div>
                    </div>
                    <!-- ./ account_no -->

                    <!-- pan_no -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="pan_no">PAN No :</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="pan_no" id="pan_no" value="{{{ Input::old('pan_no', isset($associate) ? $associate->pan_no : null) }}}" />
                            </div>
                        </div>
                    </div>
                    <!-- ./ pan_no -->
                </div>
            </div>
            <!-- Nominee Details Starts -->
            <div class="tab-pane" id="step-4">
                <div class="row well">
                    <blockquote>
                        <p class="lead">Nominee Details Of Customer</p>
                    </blockquote>
                    <!-- nominee_name -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="nominee_name">Nominee Name :</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="nominee_name" id="nominee_name" value="{{{ Input::old('nominee_name', isset($associate) ? $associate->nominee_name : null) }}}" />
                            </div>
                        </div>
                    </div>
                    <!-- ./ nominee_name -->

                    <!-- nominee_add -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="nominee_add">Nominee Add :</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="nominee_add" id="nominee_add" value="{{{ Input::old('nominee_add', isset($associate) ? $associate->nominee_add : null) }}}" />
                            </div>
                        </div>
                    </div>
                    <!-- ./ nominee_add -->

                    <!-- nominee_relation -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="nominee_relation">Relation :</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="nominee_relation" id="nominee_relation" value="{{{ Input::old('nominee_relation', isset($associate) ? $associate->nominee_relation : null) }}}" />
                            </div>
                        </div>
                    </div>
                    <!-- ./ nominee_relation -->

                    <!-- nominee_age -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="nominee_age">Age :</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="nominee_age" id="nominee_age" value="{{{ Input::old('nominee_age', isset($associate) ? $associate->nominee_age : null) }}}" />
                            </div>
                        </div>
                    </div>
                    <!-- ./ nominee_age -->

                </div>
                <!-- end of nominee block -->
            </div>
            <div class="row" style="margin-bottom:4em">
                <div class="col-xs-2" >
                    <input type='button' class='btn btn-info btn-block button-previous' name='previous' value='Previous'/>
                </div>
                <div class="col-xs-2 col-md-offset-8">
                    <input type='button' class='btn btn-info btn-block button-next' name='next' value='Next' />
                    <input type='submit' class='btn btn-success btn-block button-finish' name='finish' value='Finish' style="display:none" />
                </div>
            </div>
        </div>
    </form>
</div>
<!-- end of main container -->
@stop
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#rootwizard').bootstrapWizard(
            {
            'tabClass': 'nav nav-pills thumbnail nav-justified',
            'nextSelector': '.button-next', 
            'previousSelector': '.button-previous',
            'onTabClick': function(tab, navigation, index){
                return false;
            },
            'onTabShow':function(tab , navigation, index){
                var $total = navigation.find('li').length;
                var $current = index+1;
                var $percent = ($current/$total) * 100;
                // $('#rootwizard').find('.bar').css({width:$percent+'%'});

                // If it's the last tab then hide the last button and show the finish instead
                if($current >= $total) {
                    $('#rootwizard').find('.button-next').hide();
                    $('#rootwizard').find('.button-finish').show();
                    $('#rootwizard').find('.button-finish').removeClass('disabled');
                } else {
                    $('#rootwizard').find('.button-next').show();
                    $('#rootwizard').find('.button-finish').hide();
                }
            }
        }
        );
    });

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
		$('#introducer_no').autocomplete({
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
{{ HTML::script('/app_assets/admin/js/associateValidator.js') }}
@stop

