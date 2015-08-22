@extends('layouts.master')

@section('content')

<h1>Add a New Application</h1>
<p class="lead">Add to your Application list below.</p>
<hr>

{!! Form::open([
    'route' => 'application.store'
]) !!}


<div class="form-group">
    {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Create New Application', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop