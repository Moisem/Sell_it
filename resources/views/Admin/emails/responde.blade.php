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
                            <h1 class="m-0">Responde</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
           
            <form action="{{route('email.responde', $email)}}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        <input type="hidden" name="email" value="{{$email->email}}" />
                        <div class="form-section">
                            <br>
                            <textarea class="form-control @error('comentarios') is-invalid @enderror" name="comentarios" placeholder="Comentarios" required autocomplete="comentarios"></textarea>
                            @error('comentarios')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-section buscar">
                            <br>
                            <button type="submit"  class="btn btn-info" style="width:100%">Enviar</button>
                        </div>
                        <br>
                    </form>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    </div>
@endsection
