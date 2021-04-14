@extends('layouts.app')
@section('content')
<div class="content-register container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-6 registro-main">
            <div class="editar-izquierda">
                <div class="header-editar">
                    <h2>Actualizar Producto</h2>
                    <hr>
                </div>
                <div class="body-editar">
                    <form action="{{route('producto.update', $producto)}}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PATCH')
                        <input type="hidden" name="producto_id" value="{{$producto->id}}" />
                        <div class="nombre-editar">
                            <label for="nombre" class="">Nombre del producto</label>
                            <input id="nombre" type="text" name="nombre" class="form-control" required autocomplete="nombre" value="{{$producto->nombre}}">
                            <span id="error1"></span>
                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="precio-editar">
                            <label for="precio" class="">Precio</label>
                            <input id="precio" type="number" name="precio" class="form-control" required autocomplete="precio" value="{{$producto->precio}}">
                            <span id="error2"></span>
                            @error('precio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="estado-editar">
                            <label for="estado" class="">Estado</label>
                                <select id="estado" name="estado" class="form-control" required autocomplete="estado" value="{{$producto->estado}}">
                                    <option value="">Seleccione</option>
                                    <option value="Disponible">Disponible</option>
                                    <option value="Vendido">Vendido</option>
                                </select>
                                <span id="error3"></span>
                                @error('estado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="garantia-editar">
                            <label for="garantia" class="">Garantia</label>
                            <select id="garantia" name="garantia" class="form-control" required autocomplete="garantia" value="{{$producto->garantia}}">
                                <option value="">Seleccione</option>
                                <option value="Fabrica">De Fabrica</option>
                                <option value="Vendedor">De vendedor</option>
                                <option value="Sin">Sin garantia</option>
                            </select>
                            <span id="error4"></span>
                            @error('garantia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="categoria-editar">
                            <label for="categoria_id" class="col-md-4 col-form-label text-md-right">{{ __('Categoria') }}</label>
                            <select id="categoria" name="categoria" class="form-control" required autocomplete="categoria">
                                <option value="">Seleccione</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>                                            
                                @endforeach
                            </select>
                            <span id="error5"></span>
                        </div>
                        <div class="noexistencia-register">
                            <label for="noexistencia" class="">Existentencia</label>
                            <input id="noexistencia" type="number" name="noexistencia" class="form-control" required autocomplete="noexistencia" value="{{$producto->noexistencia}}">
                            <span id="error6"></span>
                            @error('noexistencia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="descripcion-editar">
                            <label for="descripcion" class="">Descripcion</label>
                            <textarea id="descripcion" type="" name="descripcion" class="form-control" required autocomplete="descripcion">{{$producto->descripcion}}</textarea> 
                            <span id="error7"></span>
                            @error('descripcion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="foto-editar">
                            <label for="image" class="">Foto</label>
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image " autocomplete="image">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="btn-editar mt-4">
                            <button type="submit" id="btnEnviar" class="btn btn-warning btn-actualizar">
                                {{ __('Actualizar') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="editar-derecha">
                <div class="title-imagen">
                    <h3>Imagen Acutual</h3>
                </div>
                <div class="img-derecha">
                    @include('includes.fotoproducto')
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#precio').keyup(function() {
            this.value = (this.value + '').replace(/[^1-9,.]/g, '').replace(/,/g, '.');
            var txtprecio = $("#precio").val();
            var formatoprecio = /[^1-9,.]/g;
            if (formatoprecio.test(txtprecio)) {
                $("span#error2").text("Solo numeros").css({
                    "color": "red",
                    "visibility": "visible"
                })
                $('#btnEnviar').addClass('disabled');    
          document.getElementById('btnEnviar').disabled = true;   
            } else {
                $("span#error2").text("Correcto").css({
                    "color": "green",
                    "visibility": "visible"
                })
            }
            if ($('#precio').val().trim() === '') {
                $("span#error2").text("Coloque un precio").css({
                    "color": "red",
                    "visibility": "visible"
                });
                $('#btnEnviar').addClass('disabled');    
          document.getElementById('btnEnviar').disabled = true;   
            } else {

                $("span#error2").text("Campo correcto").css({
                    "color": "green",
                    "visibility": "visible"
                });
            }
        });
        $('#noexistencia').keyup(function() {
            this.value = (this.value + '').replace(/[^1-9]/g, '');
            var txte = $("#noexistencia").val();
            var formatoe = /[^1-9]/g;
            var cero = 0;
            if (formatoe.test(txte)) {
                $("span#error6").text("Solo numeros").css({
                    "color": "red",
                    "visibility": "visible"
                })
                $('#btnEnviar').addClass('disabled');    
          document.getElementById('btnEnviar').disabled = true;   
            } else {
                $("span#error6").text("Correcto").css({
                    "color": "green",
                    "visibility": "visible"
                })
            }
            
            if ($('#noexistencia').val().trim() === '') {
$("span#error6").text("Coloque el numero existente del producto").css({
                    "color": "red",
                    "visibility": "visible"
                });
                $('#btnEnviar').addClass('disabled');    
          document.getElementById('btnEnviar').disabled = true;   

            } else {

                $("span#error6").text("Campo correcto").css({
                    "color": "green",
                    "visibility": "visible"
                });
            }
        });
        $("#nombre").keyup(function() {
            var txtname = $("#nombre").val();
            var formato = /^[a-zA-Z0-9  ]+$/;
            if (formato.test(txtname)) {
                $("span#error1").text("Correcto").css({
                    "color": "green",
                    "visibility": "visible"
                })
            } else {
                $("span#error1").text("Coloque un nombre al producto").css({
                    "color": "red",
                    "visibility": "visible"
                });
                $('#btnEnviar').addClass('disabled');    
          document.getElementById('btnEnviar').disabled = true;   
            }
        });
        $('#estado').click(function() {

            if ($('#estado').val().trim() === '') {
                $("span#error3").text("Seleccione una opcion").css({
                    "color": "red",
                    "visibility": "visible"
                });
                $('#btnEnviar').addClass('disabled');    
          document.getElementById('btnEnviar').disabled = true;   
            } else {

                $("span#error3").text("Campo correcto").css({
                    "color": "green",
                    "visibility": "visible"
                });
            }
        });
        $('#garantia').click(function() {

if ($('#garantia').val().trim() === '') {
    $("span#error4").text("Seleccione una opcion").css({
        "color": "red",
        "visibility": "visible"
        
    });
    $('#btnEnviar').addClass('disabled');    
          document.getElementById('btnEnviar').disabled = true;   

} else {

    $("span#error4").text("Campo correcto").css({
        "color": "green",
        "visibility": "visible"
    });
}
});
$('#categoria').click(function() {

if ($('#categoria').val().trim() === '') {
    $("span#error5").text("Seleccione una opcion").css({
        "color": "red",
        "visibility": "visible"
    });
    $('#btnEnviar').addClass('disabled');    
          document.getElementById('btnEnviar').disabled = true;   

} else {

    $("span#error5").text("Campo correcto").css({
        "color": "green",
        "visibility": "visible"
    });
}
});
$('#descripcion').keydown(function() {
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

$("#formproducto").validate({
    rules: {
        image: {
            required: true,
            extension: "jpg|jpeg|png|ico|bmp"
        }
    },
    messages: {
        image: {
            required: "Please upload file.",
            extension: "Please upload file in these format only (jpg, jpeg, png, ico, bmp)."
        }
    },
});
    });
</script>
@endsection 


