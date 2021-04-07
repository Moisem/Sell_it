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
        @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message')}}
                </div>
        @endif
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
                    @if ($sus=="vencida")
                    <h2>Los mejores productos</h2>
                    @foreach ($productos as $item)
                    <h3>{{$item->nombre}}</h3>
                        @endforeach
                    @endif
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
                        @foreach ($membrecia as $item)
                        <div class="col-sm-4 promotion">
                            <div class="promotion-card">
                                <div class="title-promotion">
                                    <h3>{{$item->precio}}</h3>
                                </div>
                                <div class="body-promotion">
                                    <h3>{{$item->tipo}}</h3>
                                    <hr class="line-basico">
                                </div>
                                <div class="footer-promotion">
                                    <form action="{{route('guardar', $item->id)}}" method="POST">
                                        @csrf
                                        <button class=" btn elegir">Comprar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <br><br><br><br><br>
                </section>
          </div>
        @endsection
    </body>
</html>
