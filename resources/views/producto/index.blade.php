@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @include('includes.message')

        @foreach($productos as $producto)
            @include('includes.productos',['producto'=>$producto])
        @endforeach
        
        <div class="clearfix"></div>
        {{$productos->links()}}
        </div>
    </div>
</div>
@endsection

