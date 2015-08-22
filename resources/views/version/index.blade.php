@extends('layouts.master')

@section('content')

<h1>Version</h1>
<p class="lead">Index</p>
<hr>
<a class="btn btn-success" role="button" href="{!!URL::route('version.create')!!}">Create New Version</a>

<table class="table table-striped">
	<thead>
		<tr>
			<td>Id</td>
			<td>Name</td>
			<td>Application</td>
			<td></td>
		</tr>
	</thead>
	<tbody>
	@foreach($versions as $version)
		<tr>
			<td>{{$version->id}}</td>
			<td>{{$version->name}}</td>
			<td>{{$version->application->name}}</td>
			<td>
				<a class="btn btn-info" role="button" href="{!!URL::route('version.show', $version->id)!!}">Show Version</a>
				<a class="btn btn-warning" role="button" href="{!!URL::route('version.edit', $version->id)!!}">Edit Version</a>
				<div class="pull-right">
				{!! Form::open([
					'method' => 'DELETE',
					'route' => ['version.destroy', $version->id]
				]) !!}
				{!! Form::submit('Delete this Version?', ['class' => 'btn btn-danger']) !!}
				{!! Form::close() !!}
				</div>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
{!! $versions->render() !!}


@stop