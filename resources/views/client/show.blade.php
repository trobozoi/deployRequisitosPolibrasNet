@extends('layouts.master')

@section('content')

<h1>Client</h1>
<p class="lead">Id: {{$client->id}}</p>
<p class="lead">Name: {{$client->name}}</p>
<p class="lead">Version: {{$client->version->name}}</p>
<hr>

@stop