@extends('layouts.master')

@section('content')

<h1>Edit a New File</h1>
<p class="lead">Edit to your File list below.</p>
<hr>

@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif

{!! Form::open([
	'method' => 'PATCH',
    'route' => ['file.update', $file->id]
]) !!}


<div class="form-group">
    {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
    {!! Form::text('name', $file->name, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('version_id', 'Version:', ['class' => 'control-label']) !!}
    {!! Form::select('version_id', $version, $file->version->id) !!}
</div>

{!! Form::submit('Update File', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop