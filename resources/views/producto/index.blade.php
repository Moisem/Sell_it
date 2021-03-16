@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @include('includes.message')
        @foreach($productos as $producto)
            <div class="card pub_producto">
                <div class="card-header">
                @if($producto->user->image)
                        <div class="container-image">
                            <img src="{{ route('user.image',['filename'=>$producto->user->image]) }}" class="image">
                        </div>
                @endif
                    <div class="nombre-user">
                        {{ $producto->user->name.' '.$producto->user->apellidopaterno}}
                    </div>
                
                </div>

                <div class="card-body">
                    <h6 class="card-subtitle mb-2 date">{{\FormatTime::LongTimeFilter($producto->created_at) }}</h6>
                    <div class="img-content-productos"> 
                        <img class="img-publicacion"src="{{route('producto.image',['filename'=>$producto->image])}}" alt="">
                    </div>
                    <div class="body-card-productos">
                        <h5 class="card-title ">{{$producto->nombre}}</h5>
                        <h6 class="card-subtitle mb-2 ">{{'Precio: $'.$producto->precio}}</h6>
                        <h6 class="card-subtitle mb-2 ">{{$producto->estado}}</h6>
                        <h6 class="card-subtitle mb-2 ">{{'Garantia: '.$producto->garantia}}</h6>
                        <h6 class="card-subtitle mb-2 ">{{'Productos existentes: '.$producto->noexiencia}}</h6>
                        <p class="card-text ">{{$producto->descripcion}}</p>
                        <a href="{{route('producto.show', $producto)}}" class="btn btn-success">Ver Detalles</a> 
                    </div>
                </div>
            </div>
        @endforeach
        <div class="clearfix"></div>
        {{$productos->links()}}
        </div>
    </div>
</div>
@endsection
