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
                            <h1 class="m-0">Comentarios</h1>
                            
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
                            <th scope="col">Comentario de: </th>
                            <th scope="col">Email</th>
                            <th scope="col">Comentario</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($emails as $email)
                        <tr>
                            <td>{{$email->id}}</th>
                            <td>{{$email->nombre.' '.$email->apellidos}}</th>
                            <td>{{$email->email}}</th>
                            <td>{{$email->comentarios}}</th>
                            
                            <td><a href="{{route('responde', $email)}}"><button type="button" class="btn btn-success">Responder</button></a></td>
                            
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
