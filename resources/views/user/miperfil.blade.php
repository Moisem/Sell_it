@extends('layouts.app')

@section('content')
    <div class="content-profile container-fluid">
        <div class="row content-row">
            <aside class="datos-profile col-sm-12 col-md-4 my-5">
                @if($user->image)
                    <img class="miperfil-img"src="{{ route('user.image',['filename'=>$user->image]) }}">
                @endif
                <div class="info-profile mt-5">
                    <h3>{{$user->name}} {{$user->apellidopaterno}}</h3>
                    <hr>
                    <p>{{$user->email}}</p>
                    <p>{{$user->numtelefonico}}</p>
                    <p>Se unio: {{\FormatTime::LongTimeFilter($user->created_at) }}</p>
                </div>
            </aside>
        </div>
        @forelse ($productos as $producto)
            @include('includes.productos')
        @empty
        <div class="alert alert-success col-sm-12 col-md-6 m-auto  text-center my-5" role="alert">
            El usuario no tiene productos en venta
        </div>
        @endforelse
    </div>
@endsection