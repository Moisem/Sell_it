<div class="pub_producto">
    <div class="header-producto">
        <div class="name-user">
            @if($producto->user->image)
                <img src="{{ route('user.image',['filename'=>$producto->user->image]) }}" class="img-profile">
            @endif
            <a href="{{route('miperfil',['id'=> $producto->user->id])}}">
                {{ $producto->user->name.' '.$producto->user->apellidopaterno}}
            </a>
        </div>
        <div class="time"><h6>{{$producto->created_at->diffForHumans()}}</h6></div>
    </div>
    <div class="body-producto">
        <div class="img-producto">
            <img class="img-publicacion"src="{{route('producto.image',['filename'=>$producto->image])}}" alt="">
        </div>
        <div class="desc-producto">
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
                    @if($producto->estado=="Disponible")
                        <a href="{{route('producto.show', $producto)}}" class="btn ver-mas">Ver Detalles</a>
                    @endif
                        @if (Route::is('misproductos'))
                            @if(Auth::user() && Auth::user()->id == $producto->user->id)
                                <a href="{{route('producto.edit', $producto)}}" class="btn btn-warning">Actualizar</a>
                                <form action="{{route('user.delete', $producto)}}" method="POST">
                                    @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger mx-2">Eliminar</button>
                                </form>
                            @endif
                        @endif
                    </div>
                </div>
        </div>
    </div>
</div>