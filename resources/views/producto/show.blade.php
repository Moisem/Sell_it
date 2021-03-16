@extends('layouts.app')
@section('content')
   <section class="show-content container-fluid">
       <div class="row">
            <div class="show-header">
            </div>
            <div class="show-productos col-sm-12 col-md-8">
                <div class="show-img">
                <img src="{{route('producto.image',['filename'=>$producto->image])}}" alt="">
                </div>
            </div>
            <div class="show-info col-sm-12 col-md-4">
                <div class="show-description">
                    <h2>{{$producto->nombre}}</h2>
                    <h3>Precio: ${{$producto->precio}}</h3>
                    <p>Descripción: {{$producto->descripcion}}</p>
                    <p>Estado: {{$producto->estado}}</p>
                    <p>Disponibilidad: {{$producto->existencia}}</p>
                    <p>Garantia: {{$producto->garantia}}</p>
                    <div class="show-footer">
                        <a href="#" class="btn btn-producto">Contactar al vendedor</a>
                    </div>
                </div>
                <div class="show-vendedor">
                @if($producto->user->image)
                        <img src="{{ route('user.image',['filename'=>$producto->user->image]) }}" class="image">  
                @endif
                    <h4>{{$producto->user->name}} {{$producto->user->apellidopaterno}} {{$producto->user->apellidomaterno}}</h4>
                    <p>Número: {{$producto->user->numtelefonico}}</p>
                    <P>Correo: {{$producto->user->email}}</P>
                    <a href="#" class="btn btn-visitar-perfil">Visitar perfil</a>
                </div>
            </div>
            <div class="productos-relacionados col-sm-12">
                <div class="title-relacionados my-5">
                    <h3>Productos Relacionados</h3>
                </div>
                <div class="content-relacionados row">
                    @foreach ($productos as $producto)
                    <div class="col-sm-12 col-md-4 products">
                        <div class="content-product">
                            <div class="img-product">
                                <img src="{{route('producto.image',['filename'=>$producto->image])}}" alt="">
                            </div>
                            <div class="body-product">
                                <h2>{{$producto->nombre}}</h2>
                                <p>Precio: ${{$producto->precio}}</p>
                                <a href="#" class=" btn ver-mas">Ver mas</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
   </section>
@endsection