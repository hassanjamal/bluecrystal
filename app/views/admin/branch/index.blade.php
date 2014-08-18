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

			<div class="pull-right">
				@if(Sentry::getUser()->isSuperUser())
				<a href="{{{ URL::to('admin/branch/create') }}}"
        class="btn btn-small btn-info iframe"><span class="glyphicon glyphicon-plus-sign"></span> Create Branch</a>
				@endif
			</div>
		</h3>
	</div>

	<table id="scheme" class="table table-striped table-hover">
		<thead>
			<tr>
				<th class="col-md-2">{{{ Lang::get('admin/branch/branch.branchname') }}}</th>
				<th class="col-md-2">{{{ Lang::get('admin/branch/branch.city') }}}</th>
				<th class="col-md-2">{{{ Lang::get('admin/branch/branch.phone') }}}</th>
				<th class="col-md-2">{{{ Lang::get('admin/branch/branch.managername') }}}</th>
				<th class="col-md-2">{{{ Lang::get('table.actions') }}}</th>
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
		        "sAjaxSource": "{{ URL::to('admin/branch/data') }}",
		        "fnDrawCallback": function ( oSettings ) {
	           		$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
	     		}
			});
		});
	</script>
@stop
