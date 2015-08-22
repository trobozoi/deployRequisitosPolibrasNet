@extends('layouts.master')

@section('content')

<h1>Version</h1>
<p class="lead">Id: {{$version->id}}</p>
<p class="lead">Name: {{$version->name}}</p>
<p class="lead">Application: {{$version->application->name}}</p>
<hr>

<h2>Files</h2>
<table class="table table-striped">
	<thead>
		<tr>
			<td>Id</td>
			<td>Name</td>
			<td></td>
		</tr>
	</thead>
	<tbody>
	@foreach($version->files as $file)
		<tr>
			<td>{{$file->id}}</td>
			<td>{{$file->name}}</td>
			<td>
				<a class="btn btn-info" role="button" href="{!!URL::route('file.show', $file->id)!!}">Show File</a>
				<a class="btn btn-warning" role="button" href="{!!URL::route('file.edit', $file->id)!!}">Edit File</a>
				<div class="pull-right">
				{!! Form::open([
					'method' => 'DELETE',
					'route' => ['file.destroy', $file->id]
				]) !!}
				{!! Form::submit('Delete this File?', ['class' => 'btn btn-danger']) !!}
				{!! Form::close() !!}
				</div>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>

<h2>Clients</h2>
<table class="table table-striped">
	<thead>
		<tr>
			<td>Id</td>
			<td>Name</td>
			<td></td>
		</tr>
	</thead>
	<tbody>
	@foreach($version->clients as $client)
		<tr>
			<td>{{$client->id}}</td>
			<td>{{$client->name}}</td>
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

@stop