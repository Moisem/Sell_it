<div class="col-sm-12 col-md-4 col-lg-3">
        <div class="content-product">
            <div class="img-product">
                <img src="{{route('producto.image',['filename'=>$producto->image])}}" alt="">
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
                    <a class="btn ver-mas"href="{{route('producto.show', $producto)}}">Ver más</a>
                    <a href="{{route('miperfil',['id'=> $producto->user->id])}}" class="btn btn-perfil">Ver Perfil</a>
                </div>
            </div>
        </div>
    </div>