@extends('admin.layouts.appadmin')

@section('content')
<div class="container">
<div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
            @include('includes.message')
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Categorias</h1>
                            
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                   <a href="{{route('categorias.add')}}"> <button type="button" class="btn btn-success">Añadir</button></a>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
            
                <table class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $categoria)
                        <tr>
                            <td>{{$categoria->id}}</th>
                            <td>{{$categoria->nombre}}</th>
                            <td><a href="{{route('categoria.edit', ['id'=>$categoria->id])}}"><button type="button" class="btn btn-primary">Editar</button></a></td>
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
