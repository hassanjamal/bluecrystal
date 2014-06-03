@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#policy_details">
          <span class="lead">Policy Details</span>
        </a>
      </h4>
    </div>
    <div id="policy_details" class="panel-collapse collapse in">
      <div class="panel-body">
      	<table class="table">
      		<tbody>
      			<tr>
      				<td><strong class='text-danger'>PERSONAL DETAILS</strong></td>
      				<td>
      				<div class="row">
	      				<div class="col-md-4"><span style="color:grey">{{"NAME:-"}}</span></div>
	      				<div class="col-md-8">{{$policy->name}}</div>
      				</div>
      				<div class="row">
	      				<div class="col-md-4"><span style="color:grey">{{"AGE:-"}}</span></div>
	      				<div class="col-md-8">{{$policy->age}}</div>
	      			</div>
	      			<div class="row">
	      				<div class="col-md-4"><span style="color:grey">{{"GUARDIAN NAME:-"}}</span></div>
	      				<div class="col-md-8">{{$policy->guardian_name}}</div>
	      			</div>
	      			<div class="row">
	      				<div class="col-md-4"><span style="color:grey">{{"GUARDIAN TYPE:-"}}</span></div>
	      				<div class="col-md-8">{{$policy->guardian_type}}</div>
      				</div>
      				<div class="row">
	      				<div class="col-md-4"><span style="color:grey">{{"GENDER:-"}}</span></div>
	      				<div class="col-md-8">{{$policy->sex}}</div>
      				</div>
      				<div class="row">
	      				<div class="col-md-4"><span style="color:grey">{{"PAN:-"}}</span></div>
	      				<div class="col-md-8">{{$policy->pan}}</div>
      				</div>
      				<div class="row">
	      				<div class="col-md-4"><span style="color:grey">{{"DATE OF BIRTH:-"}}</span></div>
	      				<div class="col-md-8">{{$policy->date_of_birth}}</div>
      				</div>
      				<div class="row">
	      				<div class="col-md-4"><span style="color:grey">{{"ADDRESS:-"}}</span></div>
	      				<div class="col-md-8">
	      					{{$policy->address}}<br>
	      					{{$policy->city}}<br>
	      					{{$policy->state}}<br>
	      					{{$policy->pincode}}<br>
	      				</div>
      				</div>
      				</td>
      			</tr>
      			<tr>
      				<td><strong class='text-danger'>NOMINEE DETAILS</strong></td>
      				<td>
      				<div class="row">
	      				<div class="col-md-4"><span style="color:grey">{{"NAME:-"}}</span></div>
	      				<div class="col-md-8">{{$policy->nominee_name}}</div>
      				</div>
      				<div class="row">
	      				<div class="col-md-4"><span style="color:grey">{{"AGE:-"}}</span></div>
	      				<div class="col-md-8">{{$policy->nominee_age}}</div>
	      			</div>
	      			<div class="row">
	      				<div class="col-md-4"><span style="color:grey">{{"RELATION:-"}}</span></div>
	      				<div class="col-md-8">{{$policy->nominee_relation}}</div>
	      			</div>
	      			<div class="row">
	      				<div class="col-md-4"><span style="color:grey">{{"ADDRESS:-"}}</span></div>
	      				<div class="col-md-8">{{$policy->nominee_add}}</div>
      				</div>
      				</td>
      			</tr>
      		</tbody>
      	</table>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#scheme_details">
          <span class="lead">Scheme Details</span>
        </a>
      </h4>
    </div>
    <div id="scheme_details" class="panel-collapse collapse">
      <div class="panel-body">
      	<table class="table">
      		<tbody>
      			<tr>
      				<td><strong class='text-danger'>SCHEME DETAILS</strong></td>
      				<td>
      				<div class="row">
	      				<div class="col-md-4"><span style="color:grey">{{"SCHEME TYPE:-"}}</span></div>
	      				<div class="col-md-8">{{$policy->scheme_type}}</div>
      				</div>
      				<div class="row">
	      				<div class="col-md-4"><span style="color:grey">{{"SCHEME NAME:-"}}</span></div>
	      				<div class="col-md-8">{{$policy->scheme_name}}</div>
	      			</div>
	      			<div class="row">
	      				<div class="col-md-4"><span style="color:grey">{{"ASSOCIATE NO:-"}}</span></div>
	      				<div class="col-md-8">{{$policy->associate_no}}</div>
	      			</div>
	      			<div class="row">
	      				<div class="col-md-4"><span style="color:grey">{{"POLICY DATE:-"}}</span></div>
	      				<div class="col-md-8">{{$policy->created_at}}</div>
      				</div>
      				</td>
      			</tr>
      		</tbody>
      	</table>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#payment_details">
          <span class="lead">Payment Details</span>
        </a>
      </h4>
    </div>
    <div id="payment_details" class="panel-collapse collapse">
      <div class="panel-body">
      <table class="table">
      		<tbody>
      		@foreach ($scheme_payments as $payment)
      		<?php
      		$counter = 1;
      		?>
      			<tr>
      				<td><strong class='text-danger'>PAYMENT {{ $counter}}</strong></td>
      				<td>
      				<div class="row">
	      				<div class="col-md-4"><span style="color:grey">{{"PAYMENT MODE:-"}}</span></div>
	      				<div class="col-md-8">{{$payment->payment_mode}}</div>
      				</div>
      				<div class="row">
	      				<div class="col-md-4"><span style="color:grey">{{"DEPOSIT AMOUNT:-"}}</span></div>
	      				<div class="col-md-8">{{number_format($payment->deposit_amount)}}</div>
	      			</div>
	      			<div class="row">
	      				<div class="col-md-4"><span style="color:grey">{{"MATURE AMOUNT:-"}}</span></div>
	      				<div class="col-md-8">{{number_format($payment->mature_amount)}}</div>
	      			</div>
	      			<div class="row">
	      				<div class="col-md-4"><span style="color:grey">{{"STATUS:-"}}</span></div>
	      				<div class="col-md-8">{{$payment->paid}}</div>
      				</div>

      				@if ($policy->scheme_type == 'RD')
					<div class="row">
	      				<div class="col-md-4"><span style="color:grey">{{"TOTAL INSTALLMENT:-"}}</span></div>
	      				<div class="col-md-8">{{$payment->total_installment}}</div>
      				</div>
      				<div class="row">
	      				<div class="col-md-4"><span style="color:grey">{{"PAID INSTALLMENT:-"}}</span></div>
	      				<div class="col-md-8">{{$payment->paid_installment}}</div>
      				</div>
      				@endif


      				</td>
      			</tr>
      		<?php
      		$counter++ ;
      		?>
      		@endforeach
      		</tbody>
      	</table>
      </div>
    </div>
  </div>
</div>
@stop

