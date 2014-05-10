@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
	

	<table id="scheme" class="table table-striped table-hover">
		<thead>
			<tr>
				<th class="col-md-2">{{{ Lang::get('admin/scheme/scheme.deposit') }}}</th>
				<th class="col-md-2">{{{ "Interest Amount" }}}</th>
				<th class="col-md-2">{{{ Lang::get('admin/scheme/scheme.total_amount') }}}</th>
				<th class="col-md-2">{{{ "Special Interest Amount" }}}</th>
				<th class="col-md-2">{{{ "Special Total Amount" }}}</th>
			</tr>
		</thead>
		<tbody>
			@foreach ( Schemeamount::all() as $schemes)
			<?php
			$total_interest =  floor(($schemes->amount*$fdscheme->years*$fdscheme->interest)/100);
			$total_special_interest =  floor(($schemes->amount*$fdscheme->years*$fdscheme->special_interest)/100);
			$total_amount = $schemes->amount + $total_interest;
			$total_special_amount = $schemes->amount + $total_special_interest;
			?>
			<tr>
				<th class="col-md-2">{{ number_format($schemes->amount,2,'.',',')}}</th>
				<th class="col-md-2">{{ number_format($total_interest ,2,'.',',')}}</th>
				<th class="col-md-2">{{ number_format($total_amount   ,2,'.',',')}}</th>
				<th class="col-md-2">{{ number_format($total_special_interest ,2,'.',',')}}</th>
				<th class="col-md-2">{{ number_format($total_special_amount   ,2,'.',',')}}</th>
			</tr>
			@endforeach
		</tbody>
	</table>
	
@stop

