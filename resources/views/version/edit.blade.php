@extends('layouts.master')

@section('content')

<h1>Edit a New Version</h1>
<p class="lead">Edit to your Version list below.</p>
<hr>

@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif

{!! Form::open([
	'method' => 'PATCH',
    'route' => ['version.update', $version->id]
]) !!}


<div class="form-group">
    {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
    {!! Form::text('name', $version->name, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('application_id', 'Version:', ['class' => 'control-label']) !!}
    {!! Form::select('application_id', $application, $version->application->id) !!}
</div>

{!! Form::submit('Update Version', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop