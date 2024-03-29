@extends('layouts.app')

@section('content')
<!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recuerdame') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tu contarseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
<div class="row container-fluid main-login">
    <div class="col-sm-12 col-md-7 full-content">
        <div class="contenedor-login">
            <div class="login-izquierda">
            </div>
            <div class="login-derecha">
                <form action="{{route('login')}}" method="POST">
                    @csrf
                    <div class="title-login">
                        <h2>Sell it</h2>
                        <hr>
                    </div>
                    <div class="content-inputs">
                        <div  class="input-email">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Correo Electronico" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <p id="error"></p>
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="input-pass">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="current-password">
                            <p id="error2"></p>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="btn-login">
                            <button type="submit" class="btn btn-iniciar" id="login">
                                {{ __('Login') }}
                            </button>
                        </div>
                        <div class="recuerdame">
                            <input type="checkbox" name="" id="check" class="check-recuerdame">
                            <label for="check">Recuerdame</label>   
                        </div>
                        <hr>
                        <div class="sesion">
                            <p><a href="{{route('register')}}">Crear Cuenta</a></p>
                        </div>
                        @if (Route::has('password.request'))
                                    <a class="sesion" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tu contarseña?') }}
                                    </a>
                                @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('#login').click(function(){
            var email=$('#email').val();
            var pass=$('#password').val();
            var exp=/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;

            if(email==''){
                $('#error').text('El campo nombre debe ser completado').css({"color": "red"});
                return false;
            }else{
                if(!exp.test(email)){
                    $('#error').text('Debe de ser un correo valido').css({"color": "red"});
                    return false;
                }else{
                    $('#error').text('');
                    if(pass==''){
                        $('#error2').text('El campo nombre debe ser completado').css({"color": "red"});
                        return false;
                    }
                }
            }
        });
    });
</script>
    
@endsection