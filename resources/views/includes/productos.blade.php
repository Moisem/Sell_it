<div class="pub_producto">
            <div class="header-producto">
                <div class="name-user">
                    @if($producto->user->image)
                    <img src="{{ route('user.image',['filename'=>$producto->user->image]) }}" class="img-profile">
                    @endif
                   <a href="{{route('miperfil',['id'=> $producto->user->id])}}" >
                        {{ $producto->user->name.' '.$producto->user->apellidopaterno}}
                </a>
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
                        @if (Route::is('misproductos'))
                            @if(Auth::user() && Auth::user()->id == $producto->user->id)
                            <div>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">Actualizar</button>
                                @include('includes.formproducts')
                            </div>
                            <form action="{{route('user.delete', $producto)}}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</a>
                            </form>
                            @endif
                        @endif
                    </div>
                </div>
            </div>

        </div>