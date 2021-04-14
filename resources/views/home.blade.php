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
                        <h4 class="title-info">¡Tus clientes más infelices son tu mayor fuente de aprendizaje!

                        </h4>
                    </div>
                </div>
            </div>
            <div class="derecha">
            </div>
        </section>
        <section class="products-index container-fluid">
            <div class="title-index">
                <h2 class="my-5">Recomendados para ti</h2>
                <div class="row">
                    @if($sus)
                    @foreach ($sus as $product)
                    <div class="col-sm-12 col-md-4 col-lg-3">
                        <div class="content-product">
                            <div class="img-product">
                                <img src="{{route('producto.image',['filename'=>$product->image])}}" alt="">
                            </div>
                            <div class="body-product">
                                <div class="header-body">
                                    <h5>{{$product->nombre}}</h5>
                                </div>
                                <div class="body-body">
                                    <h6>${{$product->precio}}</h6>
                                    <p>Estado: {{$product->estado}}</p>
                                    <p>Tipo de Garantia: {{$product->garantia}}</p>
                                </div>
                                <div class="footer-product">
                                    <a class="btn ver-mas" href="{{route('producto.show', $product->id)}}">Ver más</a>
                                    <a href="{{route('miperfil',['id'=> $product->user_id])}}" class="btn btn-perfil">Ver Perfil</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                <h2 class="my-5">Compra mas gastando menos</h2>
            </div>
            <div class="row">
                @foreach ($productos as $producto)
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <div class="content-product">
                        <div class="img-product">
                            <img src="{{route('welcome.image',['filename'=>$producto->image])}}">
                        </div>
                        <div class="body-product">
                            <div class="header-body">
                                <h5>{{$producto->nombre}}</h5>
                            </div>
                            <div class="body-body">
                                <h6>${{$producto->precio}}</h6>
                                <p>Estado: {{$producto->estado}}</p>
                                <p>Tipo de Garantia: {{$producto->garantia}}</p>
                            </div>
                            <div class="footer-product">
                                <a class="btn ver-mas" href="{{route('producto.show', $producto)}}">Ver más</a>
                                <a href="{{route('miperfil',['id'=> $producto->user->id])}}" class="btn btn-perfil">Ver Perfil</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
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