@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
	{{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')
	<div class="page-header">
		<h3>
			{{{ $title }}}
			@if(Sentry::getUser()->isSuperUser() || Sentry::getUser()->hasAccess('policy-create'))
			<div class="pull-right">
                <a href="{{{ URL::to('admin/policy/mis_schemes/'.$policy->id.'\PayInstallment') }}}"
                    class="btn btn-small btn-info iframe">
              <span class="glyphicon glyphicon-plus-sign"></span>
              Next Installment</a>
			</div>
			@endif
		</h3>
	</div>

	<table id="scheme" class="table table-striped table-hover">
		<thead>
			<tr>
				<th class = "col-md-1">Installment</th>
				<th class = "col-md-1">Date</th>
				<th class = "col-md-1">Deposit Amount</th>
				<th class = "col-md-1">Next Installment</th>
				<th class = "col-md-1">Receipt</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
@stop

{{-- Scripts --}}
@section('scripts')
	<script type="text/javascript">
		var oTable;
		$(document).ready(function() {
				oTable = $('#scheme').dataTable( {
				"sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
				"sPaginationType": "bootstrap",
				"oLanguage": {
					"sLengthMenu": "_MENU_ records per page"
				},
				"bProcessing": true,
		        "bServerSide": true,
                "sAjaxSource": '{{ URL::to('admin/policy/mis_schemes/'.$policy->id.'\/MisSchmeInstallments') }}',
		        "fnDrawCallback": function ( oSettings ) {
	           		$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
	     		}
			});
		});
	</script>
@stop
