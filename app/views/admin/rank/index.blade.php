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
			@if(Sentry::getUser()->hasAccess('create-rank'))
			<div class="pull-right">
				<a href="{{{ URL::to('admin/rank/create') }}}" class="btn btn-small btn-info iframe"><span class="glyphicon glyphicon-plus-sign"></span> Create</a>
			</div>
			@endif
		</h3>
	</div>

	<table id="scheme" class="table table-striped table-hover">
		<thead>
			<tr>
				<th class="col-md-2">Rank Id</th>
				<th class="col-md-2">Designation</th>
				<th class="col-md-2">Commission</th>
				@if(Sentry::getUser()->isSuperUser())
				<th class="col-md-2">Action</th>
				@endif
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
		        "sAjaxSource": "{{ URL::to('admin/rank/data') }}",
		        "fnDrawCallback": function ( oSettings ) {
	           		$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
	     		}
			});
		});
	</script>
@stop