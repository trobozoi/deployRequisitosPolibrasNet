@extends('layouts.master')

@section('content')

<h1>Application</h1>
<p class="lead">Index</p>
<hr>
<a class="btn btn-success" role="button" href="{!!URL::route('application.create')!!}">Create New Application</a>

<table class="table table-striped">
	<thead>
		<tr>
			<td>Id</td>
			<td>Name</td>
			<td></td>
		</tr>
	</thead>
	<tbody>
	@foreach($applications as $application)
		<tr>
			<td>{{$application->id}}</td>
			<td>{{$application->name}}</td>
			<td>
				<a class="btn btn-info" role="button" href="{!!URL::route('application.show', $application->id)!!}">Show Application</a>
				<a class="btn btn-warning" role="button" href="{!!URL::route('application.edit', $application->id)!!}">Edit Application</a>
				<div class="pull-right">
				{!! Form::open([
					'method' => 'DELETE',
					'route' => ['application.destroy', $application->id]
				]) !!}
				{!! Form::submit('Delete this Application?', ['class' => 'btn btn-danger']) !!}
				{!! Form::close() !!}
				</div>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
{!! $applications->render() !!}


@stop