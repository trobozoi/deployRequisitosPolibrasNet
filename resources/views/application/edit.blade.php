@extends('layouts.master')

@section('content')

<h1>Edit a New Application</h1>
<p class="lead">Edit to your Application list below.</p>
<hr>

@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif

{!! Form::open([
	'method' => 'PATCH',
    'route' => ['application.update', $application->id]
]) !!}


<div class="form-group">
    {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
    {!! Form::text('name', $application->name, ['class' => 'form-control']) !!}
		
</div>

{!! Form::submit('Update Application', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop