@extends('admin.layouts.modal')
@section('content')
<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>ASSOCIATE NAME</th>
			<th>ASSOCIATE NO</th>
			<th>RANK</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($associate_list as $associate)
        {{{ $rank_name = Rank::where('id', $associate->rank_id)->pluck('rankname') }}}
		<tr>
			<td>{{$associate->name}}</td>
			<td>{{$associate->associate_no}}</td>
			<td>{{$rank_name}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@stop

