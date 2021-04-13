@extends('admin.layouts.appadmin')

@section('content')
<div class="content-register container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-6 registro-main">
            <div class="editar-izquierda">
                <div class="header-editar">
                    <h2>Actualizar Producto</h2>
                    <hr>
                </div>
                <div class="body-editar">
                    <form action="{{route('producto.updateadmin', $producto)}}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PATCH')
                        <input type="hidden" name="producto_id" value="{{$producto->id}}" />
                        <div class="nombre-editar">
                            <label for="nombre" class="">Nombre del producto</label>
                            <input id="nombre" type="text" name="nombre" class="form-control" required autocomplete="nombre" value="{{$producto->nombre}}">
                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="precio-editar">
                            <label for="precio" class="">Precio</label>
                            <input id="precio" type="number" name="precio" class="form-control" required autocomplete="precio" value="{{$producto->precio}}">
                            @error('precio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="estado-editar">
                            <label for="estado" class="">Estado</label>
                                <select id="estado" name="estado" class="form-control" required autocomplete="estado" value="{{$producto->estado}}">
                                    <option value="">Seleccione</option>
                                    <option value="Disponible">Disponible</option>
                                    <option value="Vendido">Vendido</option>
                                </select>
                                @error('estado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="garantia-editar">
                            <label for="garantia" class="">Garantia</label>
                            <select id="garantia" name="garantia" class="form-control" required autocomplete="garantia" value="{{$producto->garantia}}">
                                <option value="">Seleccione</option>
                                <option value="Fabrica">De Fabrica</option>
                                <option value="Vendedor">De vendedor</option>
                                <option value="Sin">Sin garantia</option>
                            </select>
                            @error('garantia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="categoria-editar">
                            <label for="categoria_id" class="col-md-4 col-form-label text-md-right">{{ __('Categoria') }}</label>
                            <select id="categoria" name="categoria" class="form-control" required autocomplete="categoria">
                                <option value="">Seleccione</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>                                            
                                @endforeach
                            </select>
                        </div>
                        <div class="noexistencia-register">
                            <label for="noexistencia" class="">Existentencia</label>
                            <input id="noexistencia" type="number" name="noexistencia" class="form-control" required autocomplete="noexistencia" value="{{$producto->noexistencia}}">
                            @error('noexistencia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="descripcion-editar">
                            <label for="descripcion" class="">Descripcion</label>
                            <textarea id="descripcion" type="" name="descripcion" class="form-control" required autocomplete="descripcion">{{$producto->descripcion}}</textarea> 
                            @error('descripcion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="foto-editar">
                            <label for="image" class="">Foto</label>
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image " autocomplete="image">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="btn-editar mt-4">
                            <button type="submit" class="btn btn-warning btn-actualizar">
                                {{ __('Actualizar') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="editar-derecha">
                <div class="title-imagen">
                    <h3>Imagen Acutual</h3>
                </div>
                <div class="img-derecha">
                    @include('includes.fotoproducto')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
