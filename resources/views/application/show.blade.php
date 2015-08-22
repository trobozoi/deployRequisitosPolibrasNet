@extends('layouts.master')

@section('content')

<h1>Application</h1>
<p class="lead">Id: {{$application->id}}</p>
<p class="lead">Name: {{$application->name}}</p>
<hr>

<h2>Versions</h2>
<table class="table table-striped">
	<thead>
		<tr>
			<td>Id</td>
			<td>Name</td>
			<td></td>
		</tr>
	</thead>
	<tbody>
	@foreach($application->versions as $version)
		<tr>
			<td>{{$version->id}}</td>
			<td>{{$version->name}}</td>
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
@stop