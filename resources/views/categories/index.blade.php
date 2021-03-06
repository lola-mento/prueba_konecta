@extends('adminlte::page')
@section('title', 'Inicio')

@section('content_header')
<a class="btn btn-secondary btn-sm float-right" href="{{route('categories.create')}}">Crear categoria</a>
<h1>Gestion de categorias</h1>
@stop

@section('content')
@include('sweetalert::alert')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td width="10px"><a href="{{route('categories.edit',$category)}}" class="btn btn-primary btn-sm">Editar</a></td>
                            <td width="10px">
                                <form action="{{route('categories.destroy',$category)}}" class="d-line formulario-eliminar" method="POST">
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
      'La categoria ha sido eliminada.',
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
            text: "Esta acci??n no la puedes revertir!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Elim??nalo'
            }).then((result) => {
            if (result.isConfirmed)
            {
                this.submit();
            }
        })
    });
</script>
@endpush
