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
                            <a href="{{route('login')}}" class="btn login-index">Iniciar</a>
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
                    <!--<div class="row content-row">
                        @foreach ($productos as $producto)
                        <div class="col-sm-6  col-lg-4 product">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="data:image/jpeg;base64,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" alt="Card image cap">
                                <div class="card-body">
                                  <h5 class="card-title">{{$producto->nombre}}</h5>
                                  <p class="card-text">{{$producto->descripcion}}</p>
                                  @guest
                                  <a href="{{route('login', $producto)}}" class="btn btn-warning">Ver mas</a>
                                @else
                                <a href="{{route('producto.show', $producto)}}" class="btn btn-primary">Ver mas</a>
                                  @endguest
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>-->
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-4 products">
                            <div class="content-product">
                                <div class="img-product">
                                    <img src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg" alt="">
                                </div>
                                <div class="body-product">
                                    <h2>Samsung Galaxy Note 9</h2>
                                    <p>Precio:$4000</p>
                                    <a href="#" class=" btn ver-mas">Ver mas</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 products">
                            <div class="content-product">
                                <div class="img-product">
                                    <img src="https://i.pinimg.com/originals/a4/f8/f9/a4f8f91b31d2c63a015ed34ae8c13bbd.jpg" alt="">
                                </div>
                                <div class="body-product">
                                    <h2>Samsung Galaxy Note 9</h2>
                                    <p>Precio:$4000</p>
                                    <a href="#" class=" btn ver-mas">Ver mas</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 products">
                            <div class="content-product">
                                <div class="img-product">
                                    <img src="https://codigofuente.io/wp-content/uploads/2019/10/estructura-de-tarjeta.jpg" alt="">
                                </div>
                                <div class="body-product">
                                    <h2>Samsung Galaxy Note 9</h2>
                                    <p>Precio:$4000</p>
                                    <a href="#" class=" btn ver-mas">Ver mas</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6  col-md-6 col-lg-4 products">
                            <div class="content-product">
                                <div class="img-product">
                                    <img src="https://codigofuente.io/wp-content/uploads/2019/10/estructura-de-tarjeta.jpg" alt="">
                                </div>
                                <div class="body-product">
                                    <h2>Samsung Galaxy Note 9</h2>
                                    <p>Precio:$4000</p>
                                    <a href="#" class=" btn ver-mas">Ver mas</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 products">
                            <div class="content-product">
                                <div class="img-product">
                                    <img src="https://codigofuente.io/wp-content/uploads/2019/10/estructura-de-tarjeta.jpg" alt="">
                                </div>
                                <div class="body-product">
                                    <h2>Samsung Galaxy Note 9</h2>
                                    <p>Precio:$4000</p>
                                    <a href="#" class=" btn ver-mas">Ver mas</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 products">
                            <div class="content-product">
                                <div class="img-product">
                                    <img src="https://codigofuente.io/wp-content/uploads/2019/10/estructura-de-tarjeta.jpg" alt="">
                                </div>
                                <div class="body-product">
                                    <h2>Samsung Galaxy Note 9</h2>
                                    <p>Precio:$4000</p>
                                    <a href="#" class=" btn ver-mas">Ver mas</a>
                                </div>
                            </div>
                        </div>
                    </div>
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
