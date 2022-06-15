@extends('adminlte::page')
@section('title', 'Inicio')

@section('content_header')
    <h1>Creación de categorias</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'categories.store']) !!}
            @include('categories.partials.form')
            {!! Form::submit('Crear categoria', ['class' => 'btn btn-primary btn-sm']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
