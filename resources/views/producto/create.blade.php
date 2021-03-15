@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Subir Producto</div>


                    <div class="card-body">
                        <form method="POST" action="{{route('producto.save')}}" enctype="multipart/form-data">
                            @csrf 
                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre del producto</label>
                                <div class="col-md-6">
                                    <input id="nombre" type="text" name="nombre" class="form-control" required autocomplete="nombre">
                                    @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="precio" class="col-md-4 col-form-label text-md-right">Precio</label>
                                <div class="col-md-6">
                                    <input id="precio" type="number" name="precio" class="form-control" required autocomplete="precio">
                                    @error('precio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="estado" class="col-md-4 col-form-label text-md-right">Estado</label>
                                <div class="col-md-6">
                                        <select id="estado" name="estado" class="form-control" required autocomplete="estado">
                                            <option value="">Seleccione</option>
                                            <option value="Disponible">Disponible</option>
                                            <option value="Vendido">Vendido</option>
                                        </select>
                                    @error('noexistencia')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="garantia" class="col-md-4 col-form-label text-md-right">Garantia</label>
                                <div class="col-md-6">
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
                            </div>
                            <div class="form-group row">
                                <label for="categoria_id" class="col-md-4 col-form-label text-md-right">{{ __('Categoria') }}</label>
                                <div class="col-md-6">
                                    <select id="categoria" name="categoria" class="form-control" required autocomplete="categoria">
                                        <option value="">Seleccione</option>
                                        @foreach ($categoria as $categoria)
                                            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>                                            
                                        @endforeach
                                    </select>
                                </div>
                             </div>
                            <div class="form-group row">
                                <label for="noexistencia" class="col-md-4 col-form-label text-md-right">Producto Existente</label>
                                <div class="col-md-6">
                                    <input id="noexistencia" type="number" name="noexistencia" class="form-control" required autocomplete="noexistencia">
                                    @error('noexistencia')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion</label>
                                <div class="col-md-6">
                                    <textarea id="descripcion" type="" name="descripcion" class="form-control" required autocomplete="descripcion"></textarea> 
                                    @error('descripcion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Foto del producto') }}</label>
                                <div class="col-md-7">
                                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" required autocomplete="descripcion">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                             </div>
                             
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Guardar
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection 