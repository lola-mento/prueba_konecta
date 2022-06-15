@extends('adminlte::page')
@section('title', 'Inicio')

@section('content_header')
<a class="btn btn-secondary btn-sm float-right" href="{{route('products.create')}}">Crear producto</a>
<h1>Gestion de productos</h1>
@stop

@section('content')
@include('sweetalert::alert')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Referencia</th>
                        <th>Precio</th>
                        <th>Peso</th>
                        <th>Categoria</th>
                        <th>Stock</th>
                        <th>Fecha de creación</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$product->reference}}</td>
                            <td>$ {{number_format($product->price)}}</td>
                            <td>{{$product->weight}} kg</td>
                            <td>{{$product->category->name}}</td>
                            @if ($product->stock<=0)
                                <td><span class="badge bg-danger">{{$product->stock}}</span></td>
                            @else
                                <td><span class="badge bg-success">{{$product->stock}}</span></td>
                            @endif
                            <td>{{$product->created_at}}</td>
                            <td width="10px"><a href="{{route('products.edit',$product)}}" class="btn btn-primary btn-sm">Editar</a></td>
                            <td width="10px">
                                <form action="{{route('products.destroy',$product)}}" class="d-line formulario-eliminar" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@push('js')
@if(session('eliminar') == 'ok')
    <script>
        Swal.fire(
      'Eliminado!',
      'El producto ha sido eliminado.',
      'success'
        )
    </script>
@endif
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.formulario-eliminar').submit(function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Estas seguro de que deseas eliminarlo?',
            text: "Esta acción no la puedes revertir!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Elimínalo'
            }).then((result) => {
            if (result.isConfirmed)
            {
                this.submit();
            }
        })
    });
</script>
@endpush
