@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#personal_details">
          <span class="lead">Personal Details</span>
        </a>
      </h4>
    </div>
    <div id="personal_details" class="panel-collapse collapse in">
      <div class="panel-body">
      	<table class="table">
      		<tbody>
      			<tr>
      				<td><strong class='text-danger'>PERSONAL DETAILS</strong></td>
      				<td>
      				<div class="row">  
	      				<div class="col-md-4"><span style="color:#666666">{{"NAME:-"}}</span></div>	
	      				<div class="col-md-8">{{$associate->name}}</div>
      				</div>
      				<div class="row">	
	      				<div class="col-md-4"><span style="color:#666666">{{"AGE:-"}}</span></div>	
	      				<div class="col-md-8">{{$associate->age}}</div>	
	      			</div>
	      			<div class="row">
	      				<div class="col-md-4"><span style="color:#666666">{{"GUARDIAN NAME:-"}}</span></div>	
	      				<div class="col-md-8">{{$associate->guardian_name}}</div>	
	      			</div>
	      			<div class="row">
	      				<div class="col-md-4"><span style="color:#666666">{{"GUARDIAN TYPE:-"}}</span></div>	
	      				<div class="col-md-8">{{$associate->guardian_type}}</div>	
      				</div>
      				<div class="row">
	      				<div class="col-md-4"><span style="color:#666666">{{"GENDER:-"}}</span></div>	
	      				<div class="col-md-8">{{$associate->sex}}</div>	
      				</div>
      				<div class="row">
	      				<div class="col-md-4"><span style="color:#666666">{{"MOBILE:-"}}</span></div>	
	      				<div class="col-md-8">{{$associate->mobile}}</div>	
      				</div>
      				<div class="row">
	      				<div class="col-md-4"><span style="color:#666666">{{"DATE OF BIRTH:-"}}</span></div>	
	      				<div class="col-md-8">{{$associate->date_of_birth}}</div>	
      				</div> 
      				<div class="row">
	      				<div class="col-md-4"><span style="color:#666666">{{"ADDRESS:-"}}</span></div>	
	      				<div class="col-md-8">
	      					{{$associate->address}}<br>
	      					{{$associate->city}}<br>
	      					{{$associate->state}}<br>
	      					{{$associate->pincode}}<br>
	      				</div>	
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
        <a data-toggle="collapse" data-parent="#accordion" href="#banking_details">
          <span class="lead">Banking Details</span>
        </a>
      </h4>
    </div>
    <div id="banking_details" class="panel-collapse collapse">
      <div class="panel-body">
      	<table class="table">
      		<tbody>
      			<tr>
      				<td><strong class='text-danger'>BANKING DETAILS</strong></td>
      				<td>
      				<div class="row">  
	      				<div class="col-md-4"><span style="color:#666666">{{"BANK NAME:-"}}</span></div>	
	      				<div class="col-md-8">{{$associate->bank_name}}</div>
      				</div>
      				<div class="row">	
	      				<div class="col-md-4"><span style="color:#666666">{{"BANK ADDRESS:-"}}</span></div>	
	      				<div class="col-md-8">{{$associate->bank_address}}</div>	
	      			</div>
	      			<div class="row">
	      				<div class="col-md-4"><span style="color:#666666">{{"ACCOUNT:-"}}</span></div>	
	      				<div class="col-md-8">{{$associate->account_no}}</div>	
	      			</div>
	      			<div class="row">
	      				<div class="col-md-4"><span style="color:#666666">{{"PAN:-"}}</span></div>	
	      				<div class="col-md-8">{{$associate->pan_no}}</div>	
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
        <a data-toggle="collapse" data-parent="#accordion" href="#nominee_details">
          <span class="lead">Nominee Details</span>
        </a>
      </h4>
    </div>
    <div id="nominee_details" class="panel-collapse collapse">
      <div class="panel-body">
      <table class="table">
      		<tbody>
      			<tr>
      				<td><strong class='text-danger'>NOMINEE DETAILS </strong></td>
      				<td>
      				<div class="row">  
	      				<div class="col-md-4"><span style="color:#666666">{{"NOMINEE NAME:-"}}</span></div>	
	      				<div class="col-md-8">{{$associate->nominee_name}}</div>
      				</div>
      				<div class="row">
	      				<div class="col-md-4"><span style="color:#666666">{{"NOMINEE AGE:-"}}</span></div>	
	      				<div class="col-md-8">{{$associate->nominee_age}}</div>	
      				</div>
      				<div class="row">	
	      				<div class="col-md-4"><span style="color:#666666">{{"NOMINEE ADDRESS"}}</span></div>	
	      				<div class="col-md-8">{{$associate->nominee_add}}</div>	
	      			</div>
	      			<div class="row">
	      				<div class="col-md-4"><span style="color:#666666">{{"NOMINEE RELATION:-"}}</span></div>	
	      				<div class="col-md-8">{{$associate->nominee_relation}}</div>	
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
        <a data-toggle="collapse" data-parent="#accordion" href="#official_details">
          <span class="lead">Official Details</span>
        </a>
      </h4>
    </div>
    <div id="official_details" class="panel-collapse collapse">
      <div class="panel-body">
      <table class="table">
      		<tbody>
      			<tr>
      				<td><strong class='text-danger'>OFFICIAL DETAILS </strong></td>
      				<td>
      				<div class="row">  
	      				<div class="col-md-4"><span style="color:#666666">{{"BRANCH NAME:-"}}</span></div>	
	      				<div class="col-md-8">{{$branch_name}}</div>
      				</div>
      				<div class="row">
	      				<div class="col-md-4"><span style="color:#666666">{{"RANK :-"}}</span></div>	
	      				<div class="col-md-8">{{$rank_name}}</div>	
      				</div>
      				<div class="row">	
	      				<div class="col-md-4"><span style="color:#666666">{{"INTRODUCER"}}</span></div>	
	      				<div class="col-md-8">{{$introducer_no}}</div>	
	      			</div>
	      			<div class="row">
	      				<div class="col-md-4"><span style="color:#666666">{{"START DATE:-"}}</span></div>	
	      				<div class="col-md-8">{{$associate->start_date}}</div>	
	      			</div>
      				</td>
      			</tr>
      		</tbody>
      	</table>
      </div>
    </div>
  </div>
</div>
@stop

