@extends('layouts.master')

@section('content')

<h1>Add a New Client</h1>
<p class="lead">Add to your Client list below.</p>
<hr>

{!! Form::open([
    'route' => 'client.store'
]) !!}


<div class="form-group">
    {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('version_id', 'Version:', ['class' => 'control-label']) !!}
    {!! Form::select('version_id', $version) !!}
</div>

{!! Form::submit('Create New Client', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop