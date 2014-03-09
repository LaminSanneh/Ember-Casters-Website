@extends('layouts.default')

@section('body')
<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<tr>
			<th>Title</th>
			<th>Embed Code</th>
			<th>Description</th>
			<th></th>
			<th></th>
		</tr>  	
		<tr>
			<td>Stuff</td>
			<td>stuff</td>
			<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi, nemo, ipsam non nisi unde voluptates et cupiditate voluptatum asperiores aperiam quasi impedit quos aliquid molestiae soluta sint exercitationem repellat veritatis.</td>
			<td>
				{{ link_to_route('admin.lessons.destroy','Delete',null, array('class' => 'btn btn-danger')) }}
			</td>
			<td>
				{{ link_to_route('admin.lessons.edit','Edit',null, array('class' => 'btn btn-primary')) }}
			</td>
		</tr>
	</table>
</div>
@stop