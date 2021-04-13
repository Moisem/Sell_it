@extends('admin.layouts.appadmin')

@section('content')
<div class="container">
<h2>Reportes</h2>
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <h5 class="card-title">Reporte De Categorias</h5>
      <p class="card-text">Lo que contiene es una tabla de todas las categorias exitentes dentro del sitio web</p>
      <a href="{{route ('PDF.categorias')}}" class="btn btn-sm btn-primary">Imprimir PDF Categorias</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Reporte Mensual de Porductos</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Reporte Mensual de Porductos</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Reporte Mensual de Porductos</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
</div>
</div>
@endsection

