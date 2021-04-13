@extends('admin.layouts.appadmin')

@section('content')
<div class="container">
<div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Productos</h1>
                            
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                   <a href=""> <button type="button" class="btn btn-success">Añadir</button></a>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
            @include('includes.message')
                <table class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Garantia</th>
                            <th scope="col">Cantidad Disponible</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                        <tr>
                            <td>{{$producto->id}}</th>
                            <td>{{$producto->nombre}}</th>
                            <td>Foto</th>
                            <td>{{$producto->precio}}</th>
                            <td>{{$producto->estado}}</th>
                            <td>{{$producto->garantia}}</th>
                            <td>{{$producto->noexistencia}}</th>
                            <td>{{$producto->descripcion}}</th>
                            <td><a href="{{route('producto.editadmin', $producto)}}"><button type="button" class="btn btn-primary">Editar</button></a></td>
                            <td><form action="{{route('admin.deleteadmin', $producto)}}" method="POST">
                                    @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger mx-2">Eliminar</button>
                                </form></td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    </div>
@endsection
