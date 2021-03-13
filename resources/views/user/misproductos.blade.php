@extends('layouts.app')
@section('content')
    <h2>Mis Productos</h2>
    <p>{{$usuario->name}}</p>
    @forelse ($usuario->productos as $producto)
        <p>Editar</a>{{$producto->nombre}}</p>
    @empty
        <p>Aun no tienes productos en venta<p>
    @endforelse
@endsection