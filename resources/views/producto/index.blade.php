@extends('layouts.app')

@section('content')
@include('includes.sliderProductos')
<div class="container">
    <div class="row ">
        <div class="col-md-12">
        @include('includes.message')
        </div>
        <div class="row">
            @foreach ($productos as $producto)
                @include('includes.productos')
            @endforeach
        </div>
        <div class="clearfix"></div>
        {{$productos->links()}}
    </div>
</div>
@endsection

