@extends('adminlte::page')
@section('title', 'Inicio')

@section('content_header')

@stop

@section('content')
<hr>
<div class="row">
    &nbsp;&nbsp;&nbsp;&nbsp;
    <div class="col-2rem">
        <div class="card text-center" style="width: 8rem">
            <div class="card-body">
                {{$ProdhigerQuantity}} <br>
                {{$higerQuantity}} unidades
            </div>
            <div class="card-footer text-muted text-center">
               <h6>Producto con mas Stock</h6>
              </div>
        </div>
    </div>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <div class="col-2rem">
        <div class="card text-center" style="width: 8rem">
            <div class="card-body">
                {{$most_seller}}
            </div>
            <div class="card-footer text-muted text-center">
               <h6>Producto mas vendido</h6>
              </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
