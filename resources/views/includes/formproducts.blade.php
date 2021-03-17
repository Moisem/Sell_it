
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('producto.update', $producto)}}" enctype="multipart/form-data">
                @csrf @method('PATCH')
                <div class="form-group row">
                    <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre del producto</label>
                    <div class="col-md-6">
                        <input id="nombre" type="text" name="nombre" class="form-control" required autocomplete="nombre"
                        value={{$producto->nombre}}>
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
                        <input id="precio" type="number" name="precio" class="form-control" required autocomplete="precio"
                        value="{{$producto->precio}}">
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
                        <select id="estado" name="estado" class="form-control" required autocomplete="estado" value="{{$producto->estado}}">
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
                </div>
                <div class="form-group row">
                    <label for="categoria_id" class="col-md-4 col-form-label text-md-right">{{ __('Categoria') }}</label>
                    <div class="col-md-6">
                        <select id="categoria" name="categoria" class="form-control" required autocomplete="categoria">
                            <option value=""></option>
                            @foreach ($categoria as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>                                            
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="noexistencia" class="col-md-4 col-form-label text-md-right">Producto Existente</label>
                    <div class="col-md-6">
                        <input id="noexistencia" type="number" name="noexistencia" class="form-control" required autocomplete="noexistencia"
                        value="{{$producto->noexistencia}}">
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
                        <textarea id="descripcion" type="" name="descripcion" class="form-control" required autocomplete="descripcion">{{$producto->descripcion}}</textarea> 
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
                        <input id="image" type="file" value="{{$producto->image}}" class="form-control @error('image') is-invalid @enderror" name="image" required autocomplete="image">
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
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>