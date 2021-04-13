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
                            <h1 class="m-0">Usuarios</h1>
                            
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
            
                <table class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido Paterno</th>
                            <th scope="col">Apellido Materno</th>
                            <th scope="col">Numero Telefonico</th>
                            <th scope="col">Email</th>
                            <th scope="col">Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}
                            </th>
                            <td>foto</th>
                            <td><a href="{{route('PDF.Userproductos',['id'=> $user->id])}}" >{{$user->name}}</a></th>
                            <td>{{$user->apellidopaterno}}</th>
                            <td>{{$user->apellidomaterno}}</th>
                            <td>{{$user->numtelefonico}}</th>
                            <td>{{$user->email}}</th>
                            
                            <td><a href=""><button type="button" class="btn btn-primary">Editar</button></a></td>
                            
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
