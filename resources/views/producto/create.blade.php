@extends('layouts.app')

@section('content')
<div class="content-register container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-6 registro-main">
            <div class="guardar-izquierda">
                <div class="header-guardar">
                    <h2>Crear Producto</h2>
                    <hr>
                </div>
                <div class="body-guardar">
                    <form method="POST" action="{{route('producto.save')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="nombre-guardar">
                            <label for="nombre" class="">Nombre del producto</label>
                            <input id="nombre" type="text" name="nombre" class="form-control" required autocomplete="nombre">
                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="precio-guardar">
                            <label for="precio" class="">Precio</label>
                            <input id="precio" type="number" name="precio" class="form-control" required autocomplete="precio">
                            @error('precio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="estado-guardar">
                            <label for="estado" class="">Estado</label>
                                <select id="estado" name="estado" class="form-control" required autocomplete="estado">
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
                        <div class="garantia-guardar">
                            <label for="garantia" class="">Garantia</label>
                            <select id="garantia" name="garantia" class="form-control" required autocomplete="garantia">
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
                        <div class="categoria-guardar">
                            <label for="categoria_id" class="">{{ __('Categoria') }}</label>
                            <select id="categoria" name="categoria" class="form-control" required autocomplete="categoria">
                                <option value="">Seleccione</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>                                            
                                @endforeach
                            </select>
                        </div>
                        <div class="noexistencia-register">
                            <label for="noexistencia" class="">Existentencia</label>
                            <input id="noexistencia" type="number" name="noexistencia" class="form-control" required autocomplete="noexistencia">
                            @error('noexistencia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="descripcion-guardar">
                            <label for="descripcion" class="">Descripcion</label>
                            <textarea id="descripcion" type="" name="descripcion" class="form-control" required autocomplete="descripcion"></textarea> 
                            @error('descripcion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="foto-guardar">
                            <label for="image" class="">Foto</label>
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" required autocomplete="descripcion">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="btn-guardar mt-4">
                            <button type="submit" class="btn btn-warning btn-guardar">
                                {{ __('Guardar') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 