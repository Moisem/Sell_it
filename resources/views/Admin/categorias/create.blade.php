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
                            <span id="error7"></span>
                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="btn-guardar mt-4">
                            <button type="submit" id="btnEnviar" class="btn btn-warning btn-guardar">
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
    <script>
    $(document).ready(function() {
    $('#nombre').keydown(function() {
    var max = 15;
      var len = $(this).val().length;
      if (len >= max) {
          $('span#error7').text('Has llegado al límite').css({
        "color": "red",
    });// Aquí enviamos el mensaje a mostrar          
          $('span#error7').addClass('text-danger');
          $('#btnEnviar').addClass('disabled');    
          document.getElementById('btnEnviar').disabled = true;                    
      } 
      else {
          var ch = max - len;
          $('span#error7').text(ch + ' carácteres restantes');
          $('span#error7').removeClass('text-danger');           
          $('#btnEnviar').removeClass('disabled');
          document.getElementById('btnEnviar').disabled = false;            
      }
});
});
    </script>
@endsection
