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
        <a href="{{{ URL::to('admin/policy/create') }}}"
              class="btn btn-small btn-info iframe">
              <span class="glyphicon glyphicon-plus-sign"></span>
              Create Policy</a>
			</div>
			@endif
		</h3>
	</div>

	<table id="scheme" class="table table-striped table-hover">
		<thead>
			<tr>
				<th class = "col-md-1">Policy No</th>
				<th class = "col-md-1">Name</th>
				<th class = "col-md-1">Associate</th>
				<th class = "col-md-1">Scheme Type</th>
				<th class = "col-md-1">Date</th>
				<th class = "col-md-1">Actions</th>
				<th class = "col-md-1">Receipts</th>
				<th class = "col-md-1">Commission</th>
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
		        "sAjaxSource": "{{ URL::to('admin/policy/data') }}",
		        "fnDrawCallback": function ( oSettings ) {
	           		$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
	     		}
			});
		});
	</script>
@stop
