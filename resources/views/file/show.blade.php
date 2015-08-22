@extends('layouts.master')

@section('content')

<h1>File</h1>
<p class="lead">Id: {{$file->id}}</p>
<p class="lead">Name: {{$file->name}}</p>
<p class="lead">Version: {{$file->version->name}}</p>
<hr>

@stop