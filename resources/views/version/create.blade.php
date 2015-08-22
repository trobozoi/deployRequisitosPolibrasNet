@extends('layouts.master')

@section('content')

<h1>Add a New Version</h1>
<p class="lead">Add to your Version list below.</p>
<hr>

{!! Form::open([
    'route' => 'version.store'
]) !!}


<div class="form-group">
    {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('application_id', 'Application:', ['class' => 'control-label']) !!}
    {!! Form::select('application_id', $application) !!}
</div>

<div class="form-group">
    {!! Form::label('file', 'File:', ['class' => 'control-label']) !!}
    {!! Form::text('file', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Create New Version', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop