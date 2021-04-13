@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(session('message'))
            <div class="alert alert-success">
                {{ session('message')}}
            </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Mi Perfil') }}</div>
                <a href="{{route('miperfil',['id'=> Auth::user()->id])}}" class="btn btn-publicar">Ver como Visistante</a>
                <a href="{{route('admin')}}" class="btn btn-publicar">admin</a>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.update')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>

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
                                <button type="submit" class="btn btn-primary">
                                    Guardar Cambios
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card">
                    <div class="card-header">{{ __('Cambiar Contraseña') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{url('user/updatepassword')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="mypassword" class="col-md-4 col-form-label text-md-right">Introduce tu actual password:</label>
                                <div class="col-md-6">
                                    <input type="password" name="mypassword" class="form-control">
                                    <span class="text-danger">{{$errors->first('mypassword')}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Nuevo password:</label>
                                <div class="col-md-6">
                                    <input type="password" name="password" class="form-control">
                                    <span class="text-danger">{{$errors->first('password')}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mypassword" class="col-md-4 col-form-label text-md-right">Confirma tu nuevo password:</label>
                                <div class="col-md-6">
                                    <input type="password" name="password_confirmation" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Cambiar Contraseña
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endsection