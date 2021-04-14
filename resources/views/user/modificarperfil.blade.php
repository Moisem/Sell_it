@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(session('message'))
            <div class="alert alert-success">
                {{ session('message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="card mi-perfil">
                <div class="mi-perfil-head">{{ __('Mi Perfil') }} <hr class="hr-perfil"></div>
                <div class="buttons-perfil">
                    <a href="{{route('miperfil',['id'=> Auth::user()->id])}}" class="btn btn-dark">Ver como Visistante</a>
                    @if ($rol)
                        <a href="{{route('admin')}}" class="btn btn-success">Admin</a>
                    @endif
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.update')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>
                                <p id="error"></p>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellidopaterno" class="col-md-4 col-form-label text-md-right">{{ __('Apellido Paterno') }}</label>

                            <div class="col-md-6">
                                <input id="apellidopaterno" type="text" class="form-control @error('apellidopaterno') is-invalid @enderror" name="apellidopaterno" value="{{ Auth::user()->apellidopaterno }}" required autocomplete="apellidopaterno">
                                <p id="error2"></p>
                                @error('apellidopaterno')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellidopmaterno" class="col-md-4 col-form-label text-md-right">{{ __('Apellido Materno') }}</label>
                            
                            <div class="col-md-6">
                                <input id="apellidomaterno" type="text" class="form-control @error('apellidomaterno') is-invalid @enderror" name="apellidomaterno" value="{{ Auth::user()->apellidomaterno }}" required autocomplete="apellidomaterno">
                                <p id="error3"></p>
                                @error('apellidomaterno')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="numtelefonico" class="col-md-4 col-form-label text-md-right">{{ __('Numero Telefonico') }}</label>

                            <div class="col-md-6">
                                <input id="numtelefonico" type="text" class="form-control @error('numtelefonico') is-invalid @enderror" name="numtelefonico" value="{{ Auth::user()->numtelefonico }}" required autocomplete="numtelefonico">
                                <p id="error4"></p>
                                @error('numtelefonico')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email">
                                <p id="error5"></p>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Foto de perfil') }}</label>

                            <div class="col-md-6">
                                @include('includes.fotoperfil')
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image">

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-registrar" id="perfil">
                                    Guardar Cambios
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!---->
                    <button class="btn btn-dark" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                      Mas opciones
                    </button>
                  <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <div class="card-header mi-perfil-head">{{ __('Cambiar Contraseña') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{url('user/updatepassword')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="mypassword" class="col-md-4 col-form-label text-md-right">Introduce tu actual password:</label>
                                    <div class="col-md-6">
                                        <input type="password" name="mypassword" class="form-control" id="pass">
                                        <p id="passe1"></p>
                                        <span class="text-danger">{{$errors->first('mypassword')}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Nuevo password:</label>
                                    <div class="col-md-6">
                                        <input type="password" name="password" class="form-control" id="pass2">
                                        <p id="passe2"></p>
                                        <span class="text-danger">{{$errors->first('password')}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mypassword" class="col-md-4 col-form-label text-md-right">Confirma tu nuevo password:</label>
                                    <div class="col-md-6">
                                        <input type="password" name="password_confirmation" class="form-control" id="pass3">
                                        <p id="passe3"></p>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-registrar" id="contraseña">
                                            Cambiar Contraseña
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                  </div>
                <!---->
            </div>
        </div>
    </div>
    @endsection
    @section('scripts')
    <script>
        $(document).ready(function(){
            $('#perfil').click(function(){
                var nombre=$('#name').val();
                console.log(nombre);
                var app=$('#apellidopaterno').val();
                var apm=$('#apellidomaterno').val();
                var num=$('#numtelefonico').val();
                var email=$('#email').val();
                var exp=/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
                var expNum=/^\d*$/; 
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
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }

            });
            

            $('#contraseña').click(function(){
                var pass=$('#pass').val();
                var pass2=$('#pass2').val();
                var pass3=$('#pass3').val();
                var expPass=/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/;

                if(pass==''){
                    $('#passe1').text('El campo debe ser completado').css({"color": "red"});
                    return false;
                }else{
                    $('#passe1').text('');
                    if(pass2==''){
                        $('#passe1').text('El campo debe ser completado').css({"color": "red"});
                        return false;
                    }else{
                        if(!expPass.test(pass2)){
                            $('#passe2').text('El campo debe tener -Minimo 8 caracteres -Maximo 16 -Al menos una letra mayúscula -Al menos una letra minucula').css({"color": "red"});
                            return false; 
                        }else{
                            $('#passe2').text('');
                            if(pass3==''){
                                $('#passe3').text('El campo debe ser completado').css({"color": "red"});
                                return false;
                            }else{
                                if(pass2!=pass3){
                                    $('#passe3').text('La contraseña no coincide').css({"color": "red"});
                                    return false;
                                }
                            }
                        }
                    }
                }
            })

        });
    </script>
    @endsection