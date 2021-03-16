@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @include('includes.message')
        @foreach($productos as $producto)
        <div class="pub_producto">
            <div class="header-producto">
                <div class="name-user">
                    @if($producto->user->image)
                    <img src="{{ route('user.image',['filename'=>$producto->user->image]) }}" class="img-profile">
                    @endif
                    {{ $producto->user->name.' '.$producto->user->apellidopaterno}}
                </div>
                <div class="time"><h6>{{\FormatTime::LongTimeFilter($producto->created_at) }}</h6></div>
            </div>
            <div class="body-producto">
                <div class="img-producto">
                    <img class="img-publicacion"src="{{route('producto.image',['filename'=>$producto->image])}}" alt="">
                </div>
                <div class="desc-producto">
                    <h3 class="my-3">{{$producto->nombre}}</h3>
                    <h4>${{$producto->precio}}</h4>
                    <hr>
                    <p>Garantia: {{$producto->garantia}}</p>
                    <p>Disponibilidad: {{$producto->noexistencia}}</p>
                    <div class="footer-producto">
                        <a href="{{route('producto.show', $producto)}}" class="btn btn-primary">Ver Detalles</a> 
                    </div>
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
