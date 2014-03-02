@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
	

	<table id="scheme" class="table table-striped table-hover">
		<thead>
			<tr>
				<th class="col-md-2">{{{ Lang::get('admin/scheme/scheme.deposit') }}}</th>
				<th class="col-md-2">{{{ Lang::get('admin/scheme/scheme.interest') }}}</th>
				<th class="col-md-2">{{{ Lang::get('admin/scheme/scheme.total_amount') }}}</th>
			</tr>
		</thead>
		<tbody>
			@foreach ( Schemeamount::all() as $schemes)
			<?php
			$total_interest =  floor(($schemes->amount*$fdscheme->years*$fdscheme->interest)/100);
			$total_amount = $schemes->amount + $total_interest;
			?>
			<tr>
				<th class="col-md-2">{{ $schemes->amount}}</th>
				<th class="col-md-2">{{ $total_interest }}</th>
				<th class="col-md-2">{{ $total_amount   }}</th>
			</tr>
			@endforeach
		</tbody>
	</table>
	
@stop

