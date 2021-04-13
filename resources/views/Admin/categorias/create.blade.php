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
                            <h1 class="m-0">Añadir Una Categoria</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
            <form method="POST" action="{{route('categoria.save')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="nombre-guardar">
                            <label for="nombre" class="">Nombre de la categoria</label>
                            <input id="nombre" type="text" name="nombre" class="form-control" required autocomplete="nombre">
                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="btn-guardar mt-4">
                            <button type="submit" class="btn btn-warning btn-guardar">
                                {{ __('Guardar') }}
                            </button>
                        </div>
                    </form>
            
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    </div>
@endsection
