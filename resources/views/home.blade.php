<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
    </head>
    <body>
        @extends('layouts.app')
        @section('content')
          <div class="content">
                <section class="img-index">
                   <div class="izquierda">
                    <div class="container">
                        <h1 class="title">SELL IT</h1>
                        <div class="info-content">
                            <h4 class="title-info">Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                                Soluta quam aspernatur debitis repellendus sit eveniet illum 
                                praesentium doloremque explicabo, ea e
                            </h4>
                            <a href="{{route('productos')}}" class="btn login-index">Iniciar</a>
                        </div>
                    </div>
                   </div>
                   <div class="derecha">
                   </div>
                </section>
                <section class="products-index container-fluid">
                    <div class="title-index">
                        <h2 class="my-5">Compra mas gastando menos</h2>
                    </div>
                    @include('includes.productos')
                </section>
                <section class="promotion-index container-fluid">
                    <div class="title-promotion">
                        <h2 class="my-5">Conoce nuetras membrecias y convierte en un socio más</h2>
                    </div>
                    <div class="row content-row content-promotion">
                        <div class="col-sm-4 promotion">
                            <div class="promotion-card">
                                <div class="title-promotion">
                                    <h3>$150</h3>
                                </div>
                                <div class="body-promotion">
                                    <h3>Basico</h3>
                                    <hr class="line-basico">
                                </div>
                                <div class="footer-promotion">
                                    <button class="btn elegir">Elegir</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 promotion">
                            <div class="promotion-card">
                                <div class="title-promotion">
                                    <h3>$150</h3>
                                </div>
                                <div class="body-promotion">
                                    <h3>Basico</h3>
                                    <hr class="line-basico">
                                </div>
                                <div class="footer-promotion">
                                    <button class="btn elegir">Elegir</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 promotion">
                            <div class="promotion-card">
                                <div class="title-promotion">
                                    <h3>$150</h3>
                                </div>
                                <div class="body-promotion">
                                    <h3>Basico</h3>
                                    <hr class="line-basico">
                                </div>
                                <div class="footer-promotion">
                                    <button class="btn elegir">Elegir</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br><br><br><br>
                </section>
          </div>
        @endsection
    </body>
</html>
