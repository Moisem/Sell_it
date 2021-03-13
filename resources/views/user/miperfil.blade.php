@extends('layouts.app')

@section('content')
    <div class="content-profile container-fluid">
        <div class="row content-row">
            <aside class="datos-profile col-sm-12 col-md-3">
                <div class="img-profile mt-5">
                    <img src="https://uybor.uz/borless/uybor/img/user-images/user_no_photo_300x300.png" alt="">
                    <div class="content-modal">
                        <a href="{{route('producto.create')}}" class="btn btn-publicar">Publicar Producto</a>
                    </div>
                </div>
                <div class="info-profile mt-5">
                    <h3>{{$usuario->name}}  {{$usuario->apellidopaterno}}</h3>
                    <hr>
                    <p>Se unio: {{$usuario->created_at}}</p>
                    <hr>
                    <p>Correo: {{$usuario->email}}</p>
                    <p>Numero: {{$usuario->numtelefonico}}</p>
                </div>
            </aside>
            <div class="table-products col-sm-12 col-md-9 my-5">
                <table class="table">
                    <thead class="thead-products">
                        <tr>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Estado</th>
                            <th>Garantia</th>
                            <th>Existencia</th>
                            <th>Descripcion</th>
                            <th>Imagen</th>
                            <th>Categoria</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    @forelse ($usuario->productos as $producto)
                    <tbody>
                        <tr>
                            <td>{{$producto->nombre}}</td>
                            <td>{{$producto->precio}}</td>
                            <td>{{$producto->estado}}</td>
                            <td>{{$producto->garantia}}</td>
                            <td>{{$producto->estado}}</td>
                            <td>{{$producto->existencia}}</td>
                            <td>{{$producto->descripcion}}</td>
                            <td>{{$producto->categoria->nombre}}</td>
                            <td><a href="" class="btn btn-info">Editar</a></td>
                            <td>
                                <form action="{{route('user.delete', $producto)}}" method="POST">
                                    @csrf @method('DELETE') 
                                    <button class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                    @empty
                        <div class="alert alert-success col-sm-9" role="alert">
                            Aún no tienes productos en venta
                        </div>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
@endsection