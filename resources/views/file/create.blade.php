@extends('layouts.master')

@section('content')

<h1>Add a New File</h1>
<p class="lead">Add to your File list below.</p>
<hr>

{!! Form::open([
    'route' => 'file.store'
]) !!}


<div class="form-group">
    {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('version_id', 'Version:', ['class' => 'control-label']) !!}
    {!! Form::select('version_id', $version) !!}
</div>

{!! Form::submit('Create New File', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop