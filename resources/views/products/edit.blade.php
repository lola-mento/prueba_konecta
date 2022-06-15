@extends('adminlte::page')
@section('title', 'Inicio')

@section('content_header')
    <h1>Editar productos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($product, ['route' => ['products.update',$product],'method' => 'put']) !!}
                @include('products.partials.form')
                {!! Form::submit('Editar categoria', ['class' => 'btn btn-primary btn-sm']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

