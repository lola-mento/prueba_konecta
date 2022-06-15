@extends('adminlte::page')
@section('title', 'Inicio')

@section('content_header')
    <h1>Editar categorias</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($category, ['route' => ['categories.update',$category],'method' => 'put']) !!}
                @include('categories.partials.form')
                {!! Form::submit('Editar categoria', ['class' => 'btn btn-primary btn-sm']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

