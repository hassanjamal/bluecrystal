@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
	
	<table id="scheme" class="table table-striped table-hover">
		<thead>
			<tr>
				<th class="col-md-2">Branch Name</th>
				<th class="col-md-2">Address</th>
				<th class="col-md-2">Manager Details</th>
				<th class="col-md-2">Contact Details</th>
			</tr>
		</thead>

		<tbody>
			<th >{{$branch->name}}</th>
			<th >{{$branch->address}} <br> 
				 {{$branch->city}} <br>
				 {{$branch->state}} <br>
				 {{$branch->pincode}} <br>
			</th>
			<th >{{$branch->managername}} <br> 
				 {{$branch->managerphone}} <br>
			</th>
			<th >{{$branch->email}} <br> 
				 {{$branch->phone}} <br>
			</th>
		</tbody>
	</table>
	
@stop

