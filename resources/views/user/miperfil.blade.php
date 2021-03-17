@extends('layouts.app')

@section('content')
    <div class="content-profile container-fluid">
        <div class="row content-row">
            <aside class="datos-profile col-sm-12 col-md-3">
                <div class="img-profile">
                @if($user->image)
                    <img src="{{ route('user.image',['filename'=>$user->image]) }}">
                @endif
                </div>
                <div class="info-profile mt-5">
                    <h3>{{$user->name}} {{$user->apellidopaterno}}</h3>
                    <hr>
                    <p>{{$user->email}}</p>
                    <hr>
                    <p>{{$user->numtelefonico}}</p>
                    <p>Se unio: {{\FormatTime::LongTimeFilter($user->created_at) }}</p>
                </div>
            </aside>
            <div class="table-products col-sm-12 col-md-6 my-5">
                <table class="table">
                    @foreach($user->productos as $producto)
                        @include('includes.productos',['producto'=>$producto])
                    @endforeach
                </table>
                 </div>
        </div>
    </div>
@endsection