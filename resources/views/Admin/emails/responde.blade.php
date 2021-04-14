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
                            <textarea id="comentarios" class="form-control @error('comentarios') is-invalid @enderror" name="comentarios" placeholder="Comentarios" required autocomplete="comentarios"></textarea>
                            <span id="error7"></span>
                            @error('comentarios')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-section buscar">
                            <br>
                            <button type="submit" id="btnEnviar" class="btn btn-info" style="width:100%">Enviar</button>
                        </div>
                        <br>
                    </form>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    </div>
    <script>
    
    $(document).ready(function() {
    $('#comentarios').keydown(function() {
    var max = 100;
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
