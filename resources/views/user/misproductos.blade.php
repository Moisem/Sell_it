@extends('layouts.app')
@section('content')
    <div class="content-misproductos container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-6 main-productos">
                <div class="title-misproductos">
                    <h2>Mis Productos</h2>
                </div>
                @forelse ($usuario->productos as $producto)
                @include('includes.misproductos')
                @empty
                <div class="alert alert-success text-center my-5" role="alert">
                    No tienes productos en venta
                </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection