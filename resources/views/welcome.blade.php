@extends('layouts.master')

@section('content')
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
        <div class="container">
            <div class="content">
                <div class="title">Laravel 5</div>
				<a class="btn btn-success" role="button" href="{!!URL::route('application.index')!!}">Applications</a>
				<a class="btn btn-success" role="button" href="{!!URL::route('version.index')!!}">Versions</a>
				<a class="btn btn-success" role="button" href="{!!URL::route('file.index')!!}">Files</a>
				<a class="btn btn-success" role="button" href="{!!URL::route('client.index')!!}">Clients</a>
            </div>
        </div>
@stop
