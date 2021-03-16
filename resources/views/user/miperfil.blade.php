@extends('layouts.app')

@section('content')
    <div class="content-profile container-fluid">
        <div class="row content-row">
            <aside class="datos-profile col-sm-12 col-md-3">
                <div class="img-profile mt-5">
                @include('includes.fotoperfil')
                    <div class="content-modal">
                        <a href="{{route('modificarperfil')}}" class="btn btn-publicar">Editar</a>
                    </div>
                </div>
                <div class="info-profile mt-5">
                    <h3>{{$usuario->name}}  {{$usuario->apellidopaterno}}</h3>
                    <hr>
                    <p>Se unio: {{$usuario->created_at}}</p>
                    <hr>
                    <p>Correo: {{$usuario->email}}</p>
                    <p>Numero: {{$usuario->numtelefonico}}</p>
                </div>
            </aside>
        </div>
    </div>
@endsection