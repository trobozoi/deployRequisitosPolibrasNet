@extends('layouts.master')

@section('content')

<h1>Client</h1>
<p class="lead">Index</p>
<hr>
<a class="btn btn-success" role="button" href="{!!URL::route('client.create')!!}">Create New Client</a>

<table class="table table-striped">
	<thead>
		<tr>
			<td>Id</td>
			<td>Name</td>
			<td>Version</td>
			<td></td>
		</tr>
	</thead>
	<tbody>
	@foreach($clients as $client)
		<tr>
			<td>{{$client->id}}</td>
			<td>{{$client->name}}</td>
			<td>{{$client->version->name}}</td>
			<td>
				<a class="btn btn-info" role="button" href="{!!URL::route('client.show', $client->id)!!}">Show Client</a>
				<a class="btn btn-warning" role="button" href="{!!URL::route('client.edit', $client->id)!!}">Edit Client</a>
				<div class="pull-right">
				{!! Form::open([
					'method' => 'DELETE',
					'route' => ['client.destroy', $client->id]
				]) !!}
				{!! Form::submit('Delete this Client?', ['class' => 'btn btn-danger']) !!}
				{!! Form::close() !!}
				</div>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
{!! $clients->render() !!}


@stop