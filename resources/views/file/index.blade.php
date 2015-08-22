@extends('layouts.master')

@section('content')

<h1>File</h1>
<p class="lead">Index</p>
<hr>
<a class="btn btn-success" role="button" href="{!!URL::route('file.create')!!}">Create New File</a>

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
	@foreach($files as $file)
		<tr>
			<td>{{$file->id}}</td>
			<td>{{$file->name}}</td>
			<td>{{$file->version->name}}</td>
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
{!! $files->render() !!}


@stop