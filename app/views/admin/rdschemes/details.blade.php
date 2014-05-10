@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
	

	<table id="scheme" class="table table-striped table-hover">
		<thead>
			<tr>
				<th class="col-md-2">{{{ "Total Deposit Annual" }}}</th>
				<th class="col-md-2">{{{ "Monthly Installment" }}}</th>
				<th class="col-md-2">{{{ "Interest Amount" }}}</th>
				<th class="col-md-2">{{{ Lang::get('admin/scheme/scheme.total_amount') }}}</th>
				<th class="col-md-2">{{{ "Special Interest Amount" }}}</th>
				<th class="col-md-2">{{{ "Special Total Amount" }}}</th>
			</tr>
		</thead>
		<tbody>
			@foreach ( Schemeamount::all() as $schemes)
			<?php

            $total_installments = ($rdscheme->years)*12;
            $principal_amount   = $schemes->amount/$total_installments;
            $total_amount = 0;
            $total_interest = 0;
            $total_special_amount = 0;
            $total_special_interest = 0;
            for($i=$total_installments; $i>=1; $i-- )
            {
            $cal_interest = pow((1+($rdscheme->interest)/(100*12)),$i)*$principal_amount;
            $total_amount = floor($total_amount + $cal_interest);
            $cal_special_interest = pow((1+($rdscheme->special_interest)/(100*12)),$i)*$principal_amount;
            $total_special_amount = floor($total_special_amount + $cal_special_interest);
            }
            $total_interest = $total_amount - $schemes->amount;
            $total_special_interest = $total_special_amount - $schemes->amount;
			?>
			<tr>
				<th class="col-md-2">{{ number_format($schemes->amount,2,'.',',')}}</th>
				<th class="col-md-2">{{ number_format($principal_amount,2,'.',',')}}</th>
				<th class="col-md-2">{{ number_format($total_interest ,2,'.',',')}}</th>
				<th class="col-md-2">{{ number_format($total_amount   ,2,'.',',')}}</th>
				<th class="col-md-2">{{ number_format($total_special_interest ,2,'.',',')}}</th>
				<th class="col-md-2">{{ number_format($total_special_amount   ,2,'.',',')}}</th>
			</tr>
			@endforeach
		</tbody>
	</table>
	
@stop

