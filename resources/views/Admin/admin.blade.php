@extends('admin.layouts.appadmin')

@section('content')
<div class="container">
<h2>Reportes</h2>
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <h5 class="card-title">Reporte De Categorias</h5>
      <p class="card-text">Lo que contiene es una tabla de todas las categorias existentes dentro del sitio web.</p>
      <a href="{{route ('PDF.categorias')}}" class="btn btn-sm btn-primary">Imprimir PDF Categorias</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Reporte Mensual de Porductos</h5>
        <p class="card-text">Lo que contiene es una tabla de todos los productos posteado el ultimo mes.</p>
        <a href="{{route ('PDF.mensualproductos')}}" class="btn btn-sm btn-primary">Imprimir PDF Mensual</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Reporte Mensual de Usuarios</h5>
        <p class="card-text">Lo que contiene es una tabla de todos los usuarios que se unieron el ultimo mes.</p>
        <a href="{{route ('PDF.mensualusers')}}" class="btn btn-sm btn-primary">Imprimir PDF Mensual</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Reporte De Productos</h5>
        <p class="card-text">Lo que contiene es una tabla de todos los productos disponibles y ya vendidos.</p>
        <a href="{{route ('PDF.productosdisponibles')}}" class="btn btn-sm btn-danger">Imprimir PDF Disponibles</a>
        <a href="{{route ('PDF.productosvendidos')}}" class="btn btn-sm btn-success">Imprimir PDF Vendidos</a>
        
      </div>
    </div>
  </div>
</div>

</div>
@endsection

