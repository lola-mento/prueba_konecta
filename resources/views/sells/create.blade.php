@extends('adminlte::page')
@section('title', 'Inicio')

@section('content_header')
    <h1>Creación de ventas</h1>
@stop

@section('content')
@include('sweetalert::alert')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'sells.store']) !!}

        <div class="form-group">
            {!! Form::label('product_id', 'Seleccione producto') !!}
            {!! Form::select('product_id', $products, null, ['class' => 'form-control'. ($errors->has('product') ? ' is-invalid' : null)]) !!}
            @error('product_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('quantity', 'Cantidad') !!}
            {!! Form::number('quantity', null, ['class' => 'form-control'. ($errors->has('quantity') ? ' is-invalid' : null), 'placeholder' => 'Cantidad a vender']) !!}
            @error('quantity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

            {!! Form::submit('Crear venta', ['class' => 'btn btn-primary btn-sm']) !!}
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
