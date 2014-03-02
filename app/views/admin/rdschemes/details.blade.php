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
			$total_interest =  floor(($schemes->amount*$rdscheme->years*$rdscheme->interest)/100);
			$total_amount = $schemes->amount + $total_interest;
			?>
			<tr>
				<th class="col-md-2">{{ number_format($schemes->amount,2,'.',',')}}</th>
				<th class="col-md-2">{{ number_format($total_interest ,2,'.',',')}}</th>
				<th class="col-md-2">{{ number_format($total_amount   ,2,'.',',')}}</th>
			</tr>
			@endforeach
		</tbody>
	</table>
	
@stop

