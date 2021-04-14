@extends('layouts.app')

@section('content')
<div class="content-register container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-6 registro-main">
            <div class="register-izquierda">
                <div class="header-register">
                    <h2>Crear Cuenta</h2>
                    <hr>
                </div>
                <div class="body-register">
                    <form action="{{route('register')}}" method="POST">
                        @csrf
                        <div class="name-register">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombre">
                            <p id="error"></p>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="app-register">
                            <input id="apellidopaterno" type="text" class="form-control @error('apellidopaterno') is-invalid @enderror" name="apellidopaterno" value="{{ old('apellidopaterno') }}" required autocomplete="apellidopaterno" placeholder="Apellido Paterno">
                            <p id="error2"></p>
                            @error('apellidopaterno')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="apm-register">
                            <input id="apellidomaterno" type="text" class="form-control @error('apellidomaterno') is-invalid @enderror" name="apellidomaterno" value="{{ old('apellidomaterno') }}" required autocomplete="apellidomaterno" placeholder="Apellido Materno">
                            <p id="error3"></p>
                            @error('apellidomaterno')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="num-register">
                            <input id="numtelefonico" type="text" class="form-control @error('numtelefonico') is-invalid @enderror" name="numtelefonico" value="{{ old('numtelefonico') }}" required autocomplete="numtelefonico" placeholder="Telefono">
                            <p id="error4"></p>
                            @error('numtelefonico')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="email-register">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo Electronico">
                            <p id="error5"></p>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="pass-register">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña">
                            <p id="error6"></p>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="confirm-pass-register">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar Contraseña">
                            <p id="error7"></p>
                        </div>
                        <div class="btn-register">
                            <button type="submit" class="btn btn-registrar" id="registrar">
                                {{ __('Registrate') }}
                            </button>
                            <p class="cuenta-exist"><a href="{{route('login')}}">Ya tengo cuenta</a></p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="register-derecha">

            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            console.log('hola');
            $('#registrar').click(function(){
                var nombre=$('#name').val();
                var app=$('#apellidopaterno').val();
                var apm=$('#apellidomaterno').val();
                var num=$('#numtelefonico').val();
                var email=$('#email').val();
                var pass=$('#password').val();
                var pass2=$('#password-confirm').val();
                var exp=/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
                var expNum=/^\d*$/; 
                var expPass=/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/;
                if(nombre==''){
                    $('#error').text('El campo debe ser completado').css({"color": "red"});
                    return false;
                }else{
                    $('#error').text('');
                    if(app==''){
                        $('#error2').text('El campo debe ser completado').css({"color": "red"});
                        return false;
                    }else{
                        $('#error2').text('');
                        if(apm==''){
                            $('#error3').text('El campo debe ser completado').css({"color": "red"});
                            return false;
                        }else{
                            $('#error3').text('');
                            if(num==''){
                                $('#error4').text('El campo debe ser completado').css({"color": "red"});
                                return false;
                            }else{
                                if(!expNum.test(num)){
                                    $('#error4').text('El campo requiere numeros').css({"color": "red"});
                                    return false;
                                }else{
                                    if(num.length<10 || num.length>10){
                                        $('#error4').text('El campo requiere 10 numeros').css({"color": "red"});
                                        return false;
                                    }else{
                                        $('#error4').text('');
                                        if(email==''){
                                            $('#error5').text('El campo debe ser completado').css({"color": "red"});
                                            return false;
                                        }else{
                                            if(!exp.test(email)){
                                                $('#error5').text('Debe de ser un correo valido').css({"color": "red"});
                                                return false;
                                            }else{
                                                $('#error5').text('');
                                                if(pass==''){
                                                    $('#error6').text('El campo debe ser completado').css({"color": "red"});
                                                    return false;
                                                }else{
                                                    if(!expPass.test(pass)){
                                                        $('#error6').text('El campo debe tener -Minimo 8 caracteres -Maximo 16 -Al menos una letra mayúscula -Al menos una letra minucula').css({"color": "red"});
                                                        return false; 
                                                    }else{
                                                        $('#error6').text('');
                                                        if(pass2==''){
                                                            $('#error7').text('El campo debe ser completado').css({"color": "red"});
                                                            return false; 
                                                        }else{
                                                            if(pass!=pass2){
                                                                $('#error7').text('La contraseña no coincide').css({"color": "red"});
                                                                return false;
                                                            }
                                                        }
                                                    }
                                                }
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