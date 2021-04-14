@extends('layouts.app')
@section('content')
@if(session('message'))
<div class="alert alert-success">
    {{ session('message')}}
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
                <div class="col-md-12 contacto content-center">
                <form action="{{route('contactanos')}}" method="Post" class="form-contacto" >
                    @csrf
                        <p class="h3 text-center"> Contactanos</p>
                        <div class="form-section ">
                            <br>
                            <input type="text" name="nombre" class="@error('nombre') is-invalid @enderror" placeholder="Nombre" required autocomplete="nombre">
                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-section">
                            <br>
                            <input type="text" name="apellidos" class="@error('apellidos') is-invalid @enderror" placeholder="Apellidos" required autocomplete="apellidos">
                            @error('apellidos')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-section">
                            <br>
                            <input type="email" class="@error('email') is-invalid @enderror" name="email" placeholder="Correo electrinico" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-section">
                            <br>
                            <textarea class="Comentarios-contacto @error('comentarios') is-invalid @enderror" name="comentarios" placeholder="Comentarios" required autocomplete="comentarios"></textarea>
                            @error('comentarios')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-section buscar">
                            <br>
                            <button type="submit"  class="btn btn-info" style="width:100%">Enviar</button>
                        </div>
                        <br>
                    </form>
            </div>
            </div>
        </div>
    </div>
</section>
@endsection