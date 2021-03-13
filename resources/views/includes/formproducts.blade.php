<!-- Button trigger modal -->
<button type="button" class="btn btn-success my-3" data-toggle="modal" data-target="#exampleModal">
    Publicar Producto
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Publicar Productos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
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
                    <label for="noexistencia" class="col-md-4 col-form-label text-md-right">Producto Existente</label>
                    <div class="col-md-6">
                        <input id="noexistencia" type="number" name="existencia" class="form-control" required autocomplete="noexistencia">
                        @error('existencia')
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
                 <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  