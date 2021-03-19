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
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="app-register">
                            <input id="apellidopaterno" type="text" class="form-control @error('apellidopaterno') is-invalid @enderror" name="apellidopaterno" value="{{ old('apellidopaterno') }}" required autocomplete="apellidopaterno" placeholder="Apellido Paterno">
                            @error('apellidopaterno')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="apm-register">
                            <input id="apellidomaterno" type="text" class="form-control @error('apellidomaterno') is-invalid @enderror" name="apellidomaterno" value="{{ old('apellidomaterno') }}" required autocomplete="apellidomaterno" placeholder="Apellido Materno">
                            @error('apellidomaterno')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="num-register">
                            <input id="numtelefonico" type="text" class="form-control @error('numtelefonico') is-invalid @enderror" name="numtelefonico" value="{{ old('numtelefonico') }}" required autocomplete="numtelefonico" placeholder="Telefono">
                            @error('numtelefonico')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="email-register">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo Electronico">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="pass-register">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="confirm-pass-register">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar Contraseña">
                        </div>
                        <div class="btn-register">
                            <button type="submit" class="btn btn-registrar">
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
