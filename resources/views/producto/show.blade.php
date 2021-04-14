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
                    <p>Disponibilidad: {{$producto->noexistencia}}</p>
                    <p>Garantia: {{$producto->garantia}}</p>
                </div>
                <div class="show-vendedor">
                <div class="name-vendedor">
                    @if($producto->user->image)
                        <img src="{{ route('user.image',['filename'=>$producto->user->image]) }}" class="img-profile">  
                @endif
                    <h4>{{$producto->user->name}} {{$producto->user->apellidopaterno}} {{$producto->user->apellidomaterno}}</h4>
                </div>
                    <p>Número: {{$producto->user->numtelefonico}}</p>
                    <P>Correo: {{$producto->user->email}}</P>
                    <a href="{{route('miperfil',['id'=> $producto->user->id])}}" class="btn btn-visitar-perfil">Visitar perfil</a>
                </div>
            </div>
            <div class="productos-relacionados col-sm-12">
                <div class="title-relacionados my-5">
                    <h3>Productos Relacionados</h3>
                </div>
                <div class="row">
                    @foreach ($productos as $producto)
                        @include('includes.productos')
                    @endforeach
                </div>
            </div>
        </div>
   </section>
@endsection