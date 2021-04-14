@extends('layouts.app')
@section('content')
@if(session('message'))
<div class="alert alert-success">
    {{ session('message')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<section class="hero-nosotros mb-5">
</section>
<section class="info">
    <div class="container">
    <div class="row content-row">
        <div class="col-md-12 topmargin-lg">
            <div class="informacion">
                <h2 class="content-center">SELL-IT</h2>
                <p>Somos una empresa dedicada al comercio en linea, durante estos ultimos años detectamos que 
                    se ha incrementado la venta o promoción de productos en linea y más ahora duarnte la pandemia que 
                    vivimos actualmente, por lo que desarrollamos una platafa en la cual los usuarios puedan
                    promocionar sus productos y de esa forma nace SELL-IT
                </p>
            </div>
        </div>
        <hr class="div-footer">
        <div class="col-sm-12 col-md-4 info-nosotros">
            <img src="https://image.flaticon.com/icons/png/512/1310/1310587.png">
            <div class="detalles-nosotros">
                <p>
                    Gana dinero promocionando tus productos o servicios con nosotros.
                </p>
            </div>
            </div>
                <div class="col-sm-12 col-md-4 info-nosotros">
                    <img src="https://image.flaticon.com/icons/png/512/1370/1370310.png">
                    <div class="detalles-nosotros">
                        <p>
                            Se parte del mercado local, ayudando a otros a conseguir productos
                            a bajo consto con una buena rentabilidad.
                        </p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 info-nosotros">
                    <img src="https://image.flaticon.com/icons/png/512/1628/1628441.png">
                    <div class="detalles-nosotros">
                        <p>
                            Obten beeficios siendo parte de nuestros clientes concentidos
                            adquiriendo nuestra membrecia.
                        </p>
                    </div>
                </div>
<<<<<<< HEAD
                <div class="col-md-12 contacto content-center m-auto">
                <form action="{{route('comentarios')}}" method="Post" class="form-contacto" >
=======
                <div class="col-md-12 contacto content-center">
                <form action="{{route('contactanos')}}" method="Post" class="form-contacto" >
>>>>>>> c7911c6d1d56bac0d78f23eca1deb05e29616eda
                    @csrf
                        <p class="h3 text-center"> Contactanos</p>
                        <div class="form-section ">
                            <br>
                            <input type="text" name="nombre"  id="nombre" class="@error('nombre') is-invalid @enderror" placeholder="Nombre" required autocomplete="nombre">
                            <p id="error"></p>
                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-section">
                            <br>
                            <input type="text" name="apellidos" id="apellidos" class="@error('apellidos') is-invalid @enderror" placeholder="Apellidos" required autocomplete="apellidos">
                            <p id="error2"></p>
                            @error('apellidos')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-section">
                            <br>
                            <input type="email" id="email" class="@error('email') is-invalid @enderror" name="email" placeholder="Correo electrinico" required autocomplete="email">
                            <p id="error3"></p>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-section">
                            <br>
                            <textarea  id="comentarios" class="Comentarios-contacto @error('comentarios') is-invalid @enderror" name="comentarios" placeholder="Comentarios" required autocomplete="comentarios"></textarea>
                            <p id="error4"></p>
                            @error('comentarios')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-section buscar">
                            <br>
                            <button type="submit"  id="btnEnviar" class="btn btn-info" style="width:100%">Enviar</button>
                        </div>
                        <br>
                    </form>
            </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        console.log('hola');
        $('#btnEnviar').click(function(){
            var nombre = $('#nombre').val();
            var exp=/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
            var apellidos = $('#apellidos').val();
            var email = $('#email').val();
            var comentarios = $('#comentarios').val();

            if(nombre==''){
                $('#error').text('El campo nombre debe ser completado').css({"color": "red"});
                return false;
            }else{
                if(nombre.length<=3){
                    $('#error').text('El campo nombre debe tener mas de 3 caracteres').css({"color": "red"});
                    return false;
                }else{
                    $('#error').text('');
                    if (apellidos=='') {
                        $('#error2').text('El campo apellidos debe ser completado').css({"color": "red"});
                        return false;
                    } else {
                        if(apellidos.length<=5){
                        $('#error2').text('El campo nombre debe tener mas de 5 caracteres').css({"color": "red"});
                        return false;
                    }else{
                        $('#error2').text('');
                        if(email==''){
                            $('#error3').text('El campo correo debe ser completado').css({"color": "red"});
                            return false;
                        }else{
                            if(!exp.test(email)){
                                $('#error3').text('Debe de ser un correo valido').css({"color": "red"});
                                return false;
                            }else{
                                $('#error3').text('');
                                if(comentarios==''){
                                $('#error4').text('El campo correo debe ser completado').css({"color": "red"});
                                return false;
                                }else{
                                    if(comentarios.length<=10){
                                    $('#error4').text('El campo nombre debe tener mas de 10 caracteres').css({"color": "red"});
                                    return false;
                                }
                            }
                        }
                    }
                }
            }
        }
        }
        });
    });
</script>
@endsection
